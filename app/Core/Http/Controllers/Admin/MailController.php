<?php

namespace App\Core\Http\Controllers\Admin;

use App\Core\Models\Folder;
use App\Core\Models\Mail;
use App\Core\Repositories\MailRepository;
use Illuminate\Http\Request;

/**
 * Class MailController.
 */
class MailController extends BaseController
{
    /**
     * @var string
     */
    public $viewPathBase = 'admin.mail.';

    /**
     * @var string
     */
    public $errorRedirectPath = 'admin/mail';

    /**
     * @var MailRepository
     */
    private $repository;

    /**
     * MailController constructor.
     *
     * @param MailRepository $repository
     */
    public function __construct(MailRepository $repository)
    {
        $this->repository = $repository;
        $this->middleware('role:Admin');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $mails = $this->repository->paginate();

        $no = $mails->firstItem();

        return $this->view('index', compact('mails', 'no'));
    }

    /**
     * @param Request $request
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, $id)
    {
        $mail = $this->repository->find($id);

        return view('show', compact('mail'));
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        $mail = new Mail();

        return $this->view('create', compact('mail'));
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function getTmpMails(Request $request)
    {
        $folder = Folder::find(4);
        $mail = $this->repository->getTmpMail($file = null);

        return $mail;
    }

    /**
     * @param $file
     *
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
     *
     * @return mixed
     */
    public function getHistoryTmpMail($folder, $filename)
    {
        $mail = $this->repository->getHistoryTmpMail($folder, $filename);

        return $this->view('show-campaign-history', compact('mail'));
    }
}
