<?php

namespace App\Core\Logic;

use App\Core\Components\Messenger\Models\Message;
use App\Core\Contracts\ProductReviewSystemContract;
use App\Core\Models\User;
use App\Core\Repositories\ProductReviewRepository;
use App\Core\Repositories\ProductsRepository;
use App\Core\Repositories\UserRepository;
use Illuminate\Http\Request;

/**
 * Class ProductReviewSystem
 * @package App\Core\Logic
 */
class ProductReviewSystem implements ProductReviewSystemContract
{
    /**
     * @var ProductsRepository
     */
    public $product;

    /**
     * @var UserRepository
     */
    public $user;

    /**
     * @var ProductReviewRepository
     */
    public $productReview;

    public $message;

    /**
     * ProductReviewSystem constructor.
     * @param ProductsRepository $product
     * @param UserRepository $user
     * @param ProductReviewRepository $productReview
     */
    public function __construct(ProductsRepository $product,
                                UserRepository $user,
                                ProductReviewRepository $productReview)
    {
        $this->product = $product;
        $this->user = $user;
        $this->productReview = $productReview;
        $this->message = new Message();
    }

    /**
     * @param $data
     * @param null $id
     * @param array $with
     * @return mixed
     */
    public function present(array $data, $id = null, array $with = [])
    {
        if ($id) {
            $reviews = $this->productReview->find($id);
        } else {
            if (!empty($with)) {
                $reviews = $this->productReview->with($with)->paginate();
            } else {
                $reviews = $this->productReview->paginate();
            }
        }
        return $reviews;
    }

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function replyProductReview($id, array $data)
    {
        $productReview = $this->productReview->replyProductReview($id, $data['reply_message']);
        return $productReview;
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function toggleVisibility($id, array $data)
    {
        $productReview = $this->productReview->find($id);
        if ($productReview->hidden == 0) {
            $productReview->hidden = 1;
        } else {
            $productReview->hidden = 0;
        }
        return $productReview->save();
    }

    /**
     * @param $id
     * @param $data
     */
    public function markAsRead($id, $data)
    {
        $productReview = $this->productReview->with('comments')->find($id);
        $currentUser = \Auth::user();
        $productReview->comments->first()->markAsRead($currentUser->id);
    }

    /**
     * @param array $data
     * @param int $messageId
     * @return bool
     */
    public function editMessage(array $data, int $messageId)
    {
        $message = $this->message->find($messageId);
        $message->body = $data['reply_message'];
        $message->save();
        return $message;
    }

    /**
     * @param int $messageId
     * @param array $data
     * @return mixed
     */
    public function deleteMessage(int $messageId, array $data = [])
    {
        $deleted = $this->message->find($messageId)->delete();
        return $deleted;
    }


    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $product = $this->product->find($data['product_id']);
        unset($data['product_id']);
        $review = $product->productReview()->create($data);
        $subject = $product->title;
        $thread = $review->comments()->create(
            [
                'subject' => $subject
            ]);
        $user = new User();
        $adminArr = $user->getUsersByRole("Admin");
        if($adminArr) {
            $thread->addParticipants($adminArr);
        }
        return $review;
    }

    /**
     * @param array $data
     * @param $reviewId
     * @return mixed
     */
    public function update(array $data, $reviewId)
    {
        $review = $this->productReview->update($data, $reviewId);
        return $review;
    }

    /**
     * @param $id
     * @param array $data
     * @return int
     */
    public function delete($id, array $data = []): int
    {
        $deleted = $this->productReview->delete($id);
        return $deleted;
    }
}