<?php


namespace App\Core\Logic;


use App\Core\Contracts\MailCampaignSystemContract;
use App\Core\Models\Mail;
use App\Core\Repositories\MailRepository;
use App\Core\Repositories\SubscribersRepository;
use App\Events\MailSentTOReceiver;
use App\Jobs\SendCampaignEmails;
use App\Core\Models\User;
use League\Csv\Writer;
use League\Csv\Reader;
use Illuminate\Contracts\Bus\Dispatcher;

/**
 * Class MailCampaignSystem
 * @package App\Core\Logic
 */
class MailCampaignSystem implements MailCampaignSystemContract
{

    /**
     * @var SubscribersRepository
     */
    public $subscriber;
    /**
     * @var MailRepository
     */
    public $mail;
    /**
     * @var Dispatcher
     */
    protected $dispatcher;

    /**
     * MailCampaignSystem constructor.
     * @param SubscribersRepository $subscriber
     * @param MailRepository $mail
     * @param Dispatcher $dispatcher
     */
    public function __construct(SubscribersRepository $subscriber, MailRepository $mail, Dispatcher $dispatcher)
    {
        $this->subscriber = $subscriber;
        $this->mail = $mail;
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param array $data
     */
    public function composeCampaign(array $data)
    {
    }

    /**
     * @param array $data
     */
    public function composeMail(array $data)
    {
    }

    /**
     * @return array
     */
    public function resolveTmpMails()
    {
        $mails = [];

        $emailArr = \File::allFiles(base_path('resources/views/tmp_mails'));

        foreach ($emailArr as $path) {
            $mails[] = pathinfo($path);
        }

        return $mails;
    }

    /**
     * @param $uid
     * @return array
     */
    public function resolveMailHistory($uid)
    {
        $mailHistory = [];
        $pathToHistory = base_path('resources/views/storage/tmp_mails/' . $uid);
        if (\File::exists($pathToHistory)) {
            $emailArr = \File::allFiles($pathToHistory);

            foreach ($emailArr as $path) {
                if (pathinfo($path)['extension'] == 'php') {
                    $mailHistory[] = pathinfo($path);
                }
            }
        }
        return $mailHistory;
    }

    /**
     * @param $file
     * @return mixed
     */
    public function getTmpMail($file)
    {
        $path = base_path('resources/views/tmp_mails/');

        try {
            $path = $path . $file . ".html";

            return \File::get($path);

        } catch (\Throwable $e) {
            return back()->withErrors($e);
        }
    }

    /**
     * @param $folder
     * @param $filename
     * @return null|string
     */
    public function getHistoryTmpMail($folder, $filename)
    {
        $path = base_path('resources/views/storage/tmp_mails/');

        try {
            $path = $path . '/' . $folder . '/' . $filename . ".php";

            if (\File::exists($path)) {
                return \File::get($path);
            } else {
                return null;
            }

        } catch (\Throwable $e) {

            return back()->withErrors($e);
        }

    }

    /**
     * @param $request
     * @param $uid
     * @param $type
     */
    public function generateCampaign($request, $uid, $type)
    {
        $pathArr = $this->putMail($request, $uid);
        $path = $pathArr["path"];
        $root = $pathArr["root"];
        $viewFolder = $pathArr["viewFolder"];
        $rows = $this->subscriber->findList($uid)->subscribers();
        $csvPath = $this->putCSV($root);
        $csv = Writer::createFromPath($csvPath);
        //we insert the CSV header
        $csv->insertOne(['email']);

        foreach ($rows->get(['email']) as $person) {
            $personArr = $person->toArray();
            unset($personArr['pivot']);
            $csv->insertOne($personArr);
        }
        $sender_email = env('MAIL_FROM');
        $sender_name = strstr($sender_email, '@', true); // As of PHP 5.3.0
        $typeArr = explode(" ", $type);
        $type = implode("_", $typeArr);
        $this->handleCampaign($type, $sender_email, $sender_name, $viewFolder, $csvPath);
        Mail::create([
            'user_id' => \Auth::check() ? \Auth::id() : null,
            'from' => $sender_email,
            'to' => $type,
            'subject' => $request->subject ? $request->subject : "StoreCamp Online Store",
            'message' => $request->message ? $request->message : " StoreCamp Message Here!",
        ]);
//      $cmd = "mail:campaign " . $csvPath . " --view=" . $viewFolder . " -f=" . $sender_email . " --sender_name=" . $sender_name . " -t=" . ".$type." . "";
//        return \Artisan::call("mail:campaign", [
//                '-t' => "$type",
//                '-f' => "$sender_email",
//                '--sender_name' => "$sender_name",
//                '-b' => "$viewFolder",
//                "file" => $csvPath
//            ]);
    }

    /**
     * @param $type
     * @param $sender_email
     * @param $sender_name
     * @param $viewFolder
     * @param $csvPath
     */
    private function handleCampaign($type, $sender_email, $sender_name, $viewFolder, $csvPath)
    {
        $file = $csvPath;
        $mails = $this->mailFromFile($file);
        $c = count($mails);
        echo "total : " . $c . "\n" . "<br>";
        $emails = [];
        $start = 0;
        $end = $c - 1;
        $view = $viewFolder;
        $senderAddr = $sender_email;
        $senderName = $sender_name;
        $subject = $type;
        foreach (range($start, $end) as $num) {
            if ($num > count($mails) - 1) {
                echo "\n Maximum reached";
                return;
            }
            $name = isset($mails[$num][1]) ? trim($mails[$num][1]) : null;
            $receiverMail = trim($mails[$num][0]);

            $this->dispatcher->dispatch(new SendCampaignEmails($view, $subject, $receiverMail, $senderAddr, $senderName, $name));
            \Event::fire(new MailSentTOReceiver ("<br>" . " send email: " . $receiverMail . "<strong>" . " finished " . "</strong>" . "<br>"));
            echo "\n\n Email sent to - " . $receiverMail . "<br>";
        }
        echo "\n <h3 class='text-info'>All done</h3>";
    }
    /**
     * @param $request
     * @param $uid
     * @return array
     */
    private function putMail($request, $uid)
    {
        $root = base_path('resources/views/storage/tmp_mails') . "/" . $uid . "/";
        if (!\File::exists($root))
        {
            \File::makeDirectory($root, 0775, true, true);
        }
        $randomStr = str_random(5);
        $filename = $randomStr . ".blade.php";
        $path = $root . $filename;
        $viewFolder = "storage/tmp_mails" . "/" . $uid . "/" . $randomStr;
        \File::put($path, $request->mail);

        return array("root" => $root, "path" => $path, "viewFolder" => $viewFolder);

    }

    /**
     * @param $root
     * @return string
     */
    private function putCSV($root)
    {
        if (!\File::exists($root))
        {
            \File::makeDirectory($root, 0775, true, true);
        }
        $path = $root . str_random(5) . ".csv";
        \File::put($path, null);

        return $path;

    }

    /**
     * @param $file
     * @return array
     */
    private function mailFromFile($file)
    {
        $reader = Reader::createFromPath($file, 'r');
        $reader->setOffset(1);
        $result = $reader->fetchAll();
        return $result;
    }

}