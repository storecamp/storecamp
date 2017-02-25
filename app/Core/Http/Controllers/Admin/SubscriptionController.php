<?php

namespace App\Core\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Core\Http\Requests;
use App\Core\Http\Controllers\Controller;
use App\Core\Repositories\SubscribersRepository;

class SubscriptionController extends BaseController
{

    /**
     * @var string
     */
    public $viewPathBase = "admin.subscribers.";

    /**
     * @var string
     */
    public $errorRedirectPath = "admin/subscribers";

    /**
     * @var SubscribersRepository
     */
    private $repository;

    /**
     * SubscriptionController constructor.
     * @param SubscribersRepository $repository
     *
     */
    public function __construct(SubscribersRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {

        $lists = $this->repository->getNewsList();

        $subscribers = $this->repository->paginate();

        return $this->view('index', compact('subscribers', 'lists'));

    }

    /**
     * @param Request $request
     * @param $uid
     * @return mixed
     */
    public function show(Request $request, $uid)
    {

        if (!is_null($uid)) {

            $lists = $this->repository->getNewsList();

            $newslist = $this->repository->findList($uid);

            $subscribers = $newslist->subscribers()->paginate();

            return $this->view("index", compact('lists', 'newslist', 'subscribers', 'mails'));

        } else {

            \Toastr::error("Subscriber Not found!", $title = "Try once more.", $options = []);

            return redirect()->to(route('admin::newsletter::subscribe::index'));
        }
    }

    /**
     * @param Request $request
     * @param $type
     * @param $email
     * @return mixed
     */
    public function showUser(Request $request, $type, $email)
    {

        if ($type) {
            $lists = $this->repository->getNewsList();

            $subscriber = $this->repository->findSubscriber($email);

            return $this->view("showUser", compact('lists', 'subscriber'));

        } else {
            $lists = $this->repository->getNewsList();

            $subscribers = $this->repository->getModel()->all();

            \Toastr::error("Subscriber Not found!", $title = "Try once more.", $options = []);

            return redirect()->back();

        }

    }

    /**
     * @param Request $request
     * @param $uid
     * @return mixed
     */
    public function showGenerate(Request $request, $uid)
    {

        if (!is_null($uid)) {

            $mails = $this->repository->resolveTmpMails();

            $mailHistory = $this->repository->resolveMailHistory($uid);

            $lists = $this->repository->getNewsList();

            $newslist = $this->repository->findList($uid);

            if (empty($newslist)) {
                \Toastr::error("News list not found", "Please specify the correct newsletter uid.");
                return \Redirect::route('admin::newsletter::subscribe::index');
            }
            return $this->view("generate", compact('lists', 'newslist', 'mails', 'mailHistory'));

        } else return $this->redirectError();

    }

    /**
     * @param $file
     * @return mixed
     */
    public function getTmpMail($file)
    {

        $mail = $this->repository->getTmpMail($file);
        return $mail;
    }

    /**
     * @param $folder
     * @param $filename
     * @return mixed
     */
    public function getHistoryTmpMail($folder, $filename)
    {

        $mail = $this->repository->getHistoryTmpMail($folder, $filename);

        return $this->view('show-campaign-history', compact('mail'));
    }

    /**
     * @param Request $request
     * @param $uid
     * @param $type
     */
    public function generate(Request $request, $uid, $type)
    {
        $this->repository->generateCampaign($request, $uid, $type);
    }
}
