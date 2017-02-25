<?php

namespace App\Core\Http\Controllers\Admin;

use App\Core\Repositories\CampaignRepository;
use App\Core\Repositories\MailRepository;
use Illuminate\Http\Request;
use App\Core\Http\Controllers\Controller;

class CampaignController extends BaseController
{
    /**
     * @var string
     */
    public $viewPathBase = "admin.campaigns.";

    /**
     * @var string
     */
    public $errorRedirectPath = "admin/campaigns";

    /**
     * @var MailRepository
     */
    private $mailRepository;

    /**
     * @var CampaignRepository
     */
    private $campaignRepository;

    /**
     * CampaignController constructor.
     * @param MailRepository $mailRepository
     * @param CampaignRepository $campaignRepository
     */
    public function __construct(MailRepository $mailRepository, CampaignRepository $campaignRepository)
    {
        $this->mailRepository = $mailRepository;
        $this->campaignRepository = $campaignRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {

        $lists = $this->mailRepository->getNewsList();

        $subscribers = $this->mailRepository->getModel()->paginate();

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

            $lists = $this->mailRepository->getNewsList();

            $newslist = $this->mailRepository->findList($uid);

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
    public function subscribers(Request $request, $type, $email)
    {

        if ($type) {
            $lists = $this->campaignRepository->getCampainList();

            $subscriber = $this->campaignRepository->findSubscriber($email);

            return $this->view("subscriber", compact('lists', 'subscriber'));

        } else {

            \Toastr::error("Subscriber Not found!", $title = "Try once more.", $options = []);

            return redirect()->back();

        }

    }

    /**
     * @param Request $request
     * @param $uid
     * @return mixed
     */
    public function create(Request $request, $uid)
    {

        if (!is_null($uid)) {

            $mails = $this->mailRepository->resolveTmpMails();

            $mailHistory = $this->mailRepository->resolveMailHistory($uid);

            $lists = $this->campaignRepository->getNewsList();

            $newslist = $this->campaignRepository->findList($uid);

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

        $mail = $this->mailRepository->getTmpMail($file);
        return $mail;
    }

    /**
     * @param $folder
     * @param $filename
     * @return mixed
     */
    public function getHistoryTmpMail($folder, $filename)
    {

        $mail = $this->mailRepository->getHistoryTmpMail($folder, $filename);

        return $this->view('show-campaign-history', compact('mail'));
    }

    /**
     * @param Request $request
     * @param $uid
     * @param $type
     */
    public function generate(Request $request, $uid, $type)
    {
        $this->campaignRepository->generateCampaign($request, $uid, $type);
    }

    /**
     * get groups name in json format
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getJson(Request $request) {
        $query = $this->parserSearchValue($request->get('search'));
        $attrGroup = $this->campaignRepository->getModel()->where("campaign", "like", $query)->select('campaign', 'id')->get();
        $attrGroupArr = [];
        foreach ($attrGroup as $key => $attrGroupItem) {
            $attrGroupArr[$key]['text'] = $attrGroupItem['campaign'];
            $attrGroupArr[$key]['id'] = $attrGroupItem['id'];
        }
        return \Response::json($attrGroupArr);
    }
}
