<?php

namespace App\Core\Components\EmailMarketer;

use Illuminate\Console\Command;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Mail\Mailer;
use League\Csv\Reader;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class MailCampaigner extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'mail:campaign';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send newsletter mail';
    protected $file;
    protected $mailer;

    /**
     * MailCampaigner constructor.
     * @param Filesystem $file
     * @param Mailer $mailer
     * @param UrlGenerator $urlhelper
     */
    public function __construct(Filesystem $file, Mailer $mailer, UrlGenerator $urlhelper)
    {

        parent::__construct();
        $this->file = $file;
        $this->mailer = $mailer;
        $this->urlhelper = $urlhelper;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $file = $this->argument('file');
        $mails = $this->mailFromFile($file);
        $c = count($mails);
        print_r("total : " . $c . "\n");
        $emails = [];
        $start = $this->option('start');
        $end = $this->option('end');
        $view = $this->option('view');
        $senderAddr = $this->option('sender_address');
        $senderName = $this->option('sender_name');
        $subject = $this->option('subject');
        $bar = $this->output->createProgressBar(count($c));
        foreach (range($start, $end) as $num) {
            if ($num > count($mails) - 1) {
                echo $this->info("\n Maximum reached");
                break;
            }
            echo ($num . ',') . "<br/>";
            $name = isset($mails[$num][1]) ? trim($mails[$num][1]) : null;
            $this->sendMail($view, $subject, trim($mails[$num][0]), $senderAddr, $senderName, $name);
            $bar->advance();
            echo "# " . $num . " - subscriber done!";
        }
        $bar->finish();
        $this->info("\n All done");
    }

    /**
     * Use to send mails to each emails
     *
     * @var string $view template to use
     * @var string $subject template to use
     * @var string $receiverEmail receiver's email address
     * @var string $senderEmail sender's email address
     * @var string $senderName sender's name
     *
     */
    public function sendMail($view, $subject, $receiverEmail, $senderEmail, $senderName = null, $name = null)
    {
        $this->urlhelper->forceRootUrl(config('app.url'));
        $this->mailer->send($view, ['name' => $name], function ($m) use ($receiverEmail, $subject, $senderEmail, $senderName) {
            $m->to($receiverEmail)->subject($subject);
            $m->from($senderEmail, $senderName);
        });
        sleep(5);
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['file', InputArgument::REQUIRED, 'A file to be extracted.'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['subject', 't', InputOption::VALUE_REQUIRED, 'subject of mail', 'Hello'],
            ['sender_address', 'f', InputOption::VALUE_REQUIRED, 'Address of sender'],
            ['sender_name', null, InputOption::VALUE_REQUIRED, 'Name of sender'],
            ['view', 'b', InputOption::VALUE_REQUIRED, 'View to use'],
            ['start', 's', InputOption::VALUE_OPTIONAL, 'number to start from.', 0],
            ['end', 'e', InputOption::VALUE_OPTIONAL, 'number to end with', 500],
        ];
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
////		$mails=['vmayaki@techneeks.com.ng','vmeregini@techneeks.com.ng','nohadoma@techneeks.com.ng'];
// 		$rawMails=file_get_contents(storage_path()."/".$file);
        // $rawMails=preg_replace('/\s+|(<|>)/S', '', $rawMails);
// 		$mails=explode("\n",trim(trim($rawMails)));
// 		$mails=array_filter($mails);
        return $result;
    }

}