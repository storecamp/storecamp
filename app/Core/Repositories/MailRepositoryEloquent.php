<?php

namespace App\Core\Repositories;

use Illuminate\Container\Container as Application;
use Illuminate\Contracts\Bus\Dispatcher;
use RepositoryLab\Repository\Eloquent\BaseRepository;
use RepositoryLab\Repository\Criteria\RequestCriteria;
use App\Core\Repositories\MailRepository;
use App\Core\Models\Mail;

/**
 * Class MailRepositoryEloquent
 * @package namespace App\Core\Repositories;
 */
class MailRepositoryEloquent extends BaseRepository implements MailRepository
{

    protected $defaultTemplatesPath;
    protected $personalTemplatesPath;

    public function __construct(Application $app, Dispatcher $dispatcher)
    {
        parent::__construct($app, $dispatcher);
        $this->defaultTemplatesPath = config('mail.default_mail_templates_path', 'uploads/mails/');
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Mail::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * @return mixed
     */
    public function getDefaultMailTemplatesPath() {

        return config('mail.default_mail_templates_path');

    }

    /**
     * @return mixed
     */
    public function getCustomMailTemplatesPath() {

        return config('mail.personal_mail_templates_path');

    }

    /**
     * @return array
     */
    public function resolveTmpMails()
    {
        $mails = [];

        $emailArr = \File::allFiles(base_path('public/views/tmp_mails'));

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
        $path = base_path($this->defaultTemplatesPath);

        try {
            $path = $path . $file . ".html";
            if(\File::exists($path)) {
                return \File::get($path);
            }

        } catch (\Throwable $e) {
            return back()->withErrors($e);
        }
    }


    /**
     * @param $folder
     * @param $filename
     * @return $this|null|string
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
     * @return array
     */
    private function putMail($request, $uid)
    {
        $root = base_path('resources/views/storage/tmp_mails') . "/" . $uid . "/";
        if (!\File::exists($root)) {

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
        if (!\File::exists($root)) {

            \File::makeDirectory($root, 0775, true, true);
        }

        $path = $root . str_random(5) . ".csv";
        \File::put($path, null);

        return $path;

    }

}
