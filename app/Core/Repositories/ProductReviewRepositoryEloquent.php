<?php

namespace App\Core\Repositories;

use App\Core\Validators\ProductReview\ProductReviewFormRequest;
use App\Core\Validators\ProductReview\UpdateProductReviewFormRequest;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use RepositoryLab\Repository\Contracts\CacheableInterface;
use RepositoryLab\Repository\Eloquent\BaseRepository;
use RepositoryLab\Repository\Criteria\RequestCriteria;
use RepositoryLab\Repository\Traits\CacheableRepository;
use App\Core\Models\Product;
use App\Core\Repositories\ProductReviewRepository;
use App\Core\Models\ProductReview;
use Illuminate\Container\Container as Application;
use Illuminate\Contracts\Bus\Dispatcher;
use App\Core\Components\Messenger\Models\Thread;
use App\Core\Components\Messenger\Models\Message;
use App\Core\Components\Messenger\Models\Participant;

/**
 * Class ProductReviewRepositoryEloquent
 * @package App\Core\Repositories
 */
class ProductReviewRepositoryEloquent extends BaseRepository implements ProductReviewRepository
{

    /**
     * @var RolesRepository
     */
    protected $roleRepository;
    /**
     * @var ProductsRepository
     */
    protected $product;
    /**
     * @var Thread
     */
    protected $thread;
    /**
     * @var Message
     */
    protected $message;
    /**
     * @var
     */
    protected $productDescription;
    /**
     * @var Participant
     */
    protected $participant;

    /**
     * ProductReviewRepositoryEloquent constructor.
     * @param Application $app
     * @param Dispatcher $dispatcher
     * @param RolesRepository $roleRepository
     * @param ProductsRepository $product
     */
    public function __construct(Application $app,
                                Dispatcher $dispatcher,
                                RolesRepository $roleRepository,
                                ProductsRepository $product)
    {
        parent::__construct($app, $dispatcher);
        $this->roleRepository = $roleRepository;
        $this->product = $product;
        $this->thread = new Thread();
        $this->message = new Message();
        $this->participant = new Participant();
    }

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'rating' => '=',
        'hidden' => '='
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        $productReview = ProductReview::class;
        return $productReview;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(\RepositoryLab\Repository\Criteria\RequestCriteria::class));

    }


    /**
     * @return ProductReview
     */
    public function getModel()
    {

        $model = new ProductReview();

        return $model;
    }

    /**
     * return the number of user's products
     * @return mixed
     */
    public function countUserProductReviews()
    {
        return $this->with('user')->where('user_id', '=', \Auth::id())->count();
    }
    /**
     * get all Products
     * @return mixed
     */
    public function getAll()
    {

        return $this->getModel()->latest('created_at')->paginate();

    }

    /**
     * get all current logged in user Feedbacks
     * @return mixed
     */
    public function getAllUsers()
    {

        return $this->getModel()->latest('created_at')->users()->paginate();

    }

    /**
     * get the specific to user id feedbacks
     * @param $id
     * @return mixed
     */
    public function getAllUserById($id)
    {

        return $this->getModel()->latest('created_at')->usersById($id)->paginate();
    }


    /**
     * @param $id
     * @param $message
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function replyProductReview($id, $message)
    {
        $productReview = $this->with('comments')->find($id);
        $thread = $productReview->comments->first();
        $thread->activateAllParticipants();
        $user_id = \Auth::user()->id;
        // Message
        $this->message->create(
            [
                'thread_id' => $thread->id,
                'user_id' => $user_id,
                'body' => $message,
            ]
        );

        // Add replier as a participant
        $participant = $this->participant->firstOrCreate(
            [
                'thread_id' => $thread->id,
                'user_id' => $user_id
            ]
        );
        $participant->last_read = new Carbon();
        $participant->save();
        return $productReview;
    }
}
