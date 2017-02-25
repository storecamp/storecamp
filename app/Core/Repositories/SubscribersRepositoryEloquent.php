<?php

namespace App\Core\Repositories;

use App\Core\Models\Mail;
use App\Events\MailSentTOReceiver;
use App\Jobs\SendCampaignEmails;
use App\Core\Models\User;
use RepositoryLab\Repository\Contracts\CacheableInterface;
use RepositoryLab\Repository\Eloquent\BaseRepository;
use RepositoryLab\Repository\Criteria\RequestCriteria;
use RepositoryLab\Repository\Traits\CacheableRepository;
use App\Core\Repositories\SubscribersRepository;
use App\Core\Models\Subscribers;

use Illuminate\Container\Container as Application;
use Illuminate\Contracts\Bus\Dispatcher;
use League\Csv\Writer;
use League\Csv\Reader;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Mail\Mailer;

/**
 * Class SubscribersRepositoryEloquent
 * @package App\Core\Repositories
 */
class SubscribersRepositoryEloquent extends BaseRepository implements \App\Core\Repositories\SubscribersRepository, CacheableInterface
{

    use CacheableRepository;
    /**
     * @var RolesRepository
     */
    protected $roleRepository;
    /**
     * @var CampaignRepository
     */
    protected $campaignRepository;
    /**
     * @var User
     */
    protected $user;
    /**
     * @var Dispatcher
     */
    protected $dispatcher;

    /**
     * SubscribersRepositoryEloquent constructor.
     * @param Application $app
     * @param Dispatcher $dispatcher
     * @param RolesRepository $roleRepository
     * @param CampaignRepository $campaignRepository
     */
    public function __construct(Application $app, Dispatcher $dispatcher,
                                RolesRepository $roleRepository,
                                CampaignRepository $campaignRepository
    )
    {
        parent::__construct($app, $dispatcher);

        $this->roleRepository = $roleRepository;
        $this->campaignRepository = $campaignRepository;
        $this->user = new User();
        $this->dispatcher = $dispatcher;
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Subscribers::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * get the model
     *
     * @return mixed
     */
    public function getModel()
    {
        $model = new Subscribers();

        return $model;
    }

    /**
     * @param $email
     * @return mixed
     */
    public function findSubscriber($email)
    {

        $subscriber = $this->getModel()->where('email', $email)->first();

        return $subscriber;
    }

    /**
     * @param $data
     * @param $list
     * @return bool
     */
    private function createSubscriber($data, $list)
    {
        $subscriber = $this->getModel();
        foreach ($data as $key => $value) {
            $subscriber->{$key} = $value;
        }
        $subscriber->save();
        if (!is_null($list)) {
            $list->subscribers()->attach($subscriber);
            $list->save();
        }
        return true;
    }

    /**
     * @param $request
     * @param $campaignId
     * @return bool
     */
    public function createSubscription($request, $campaignId)
    {
        $mail = $request->get('subscriber_email');
        $list = $this->campaignRepository->find($campaignId);
        $info = [
            'email' => $mail
        ];

        if (is_null($subscriber = $this->getModel()->where('email', $mail)->first())) {
            if (!is_null($list)) {
                $list->subscribers()->attach($subscriber);
                $list->save();
                $this->createSubscriber($info, $list);
                return true;
            } else {
                return false;
            }
        } else {
            $countListEmail = $list->subscribers()->where("email", $mail)->count();

            if ($countListEmail == 0) {
                $subscriber = $this->getModel()->mails($mail)->first();
                $list->subscribers()->sync([$subscriber->id]);
                return true;
            } else return false;
        }
    }

    /**
     * @param $request
     * @param $type
     * @param $subscription_id
     * @return bool|\Illuminate\Http\RedirectResponse
     */
    public function deleteSubscription($request, $type, $subscription_id)
    {
        $mail = $request->get('subscriber_email');
        $subscriber = $this->getModel()->where('email', $mail)->first();

        if (is_null($subscriber)) {
            \Toastr::warning("Subscriber Not Found. Sorry!!!");
            return redirect()->back();
        }

        foreach ($subscriber->newsList as $list) {
            if ($list->name == $type || $type === NULL) {
                $list->subscribers()->detach($subscriber);
            }
        }
        if (is_null($type)) {
            $subscriber->delete();
            return true;
        }

    }

    /**
     * @param null $type
     * @return mixed
     */
    public function getNewsList($type = null)
    {
        if (is_null($type)) {
            return $this->campaignRepository->all();
        } else {
            return $this->campaignRepository->findByField("listName", $type);
        }
    }

}
