<?php

namespace App\Core\Logic;

use App\Core\Contracts\ProductReviewSystemContract;
use App\Core\Models\ProductReview;
use App\Core\Models\User;
use App\Core\Models\Message;
use App\Core\Models\Product;

/**
 * Class ProductReviewSystem.
 */
class ProductReviewSystem implements ProductReviewSystemContract
{
    /**
     * @var Product
     */
    public $product;

    /**
     * @var User
     */
    public $user;

    /**
     * @var ProductReview
     */
    public $productReview;

    /**
     * @var Message
     */
    public $message;

    /**
     * ProductReviewSystem constructor.
     *
     * @param Product $product
     * @param User $user
     * @param ProductReview $productReview
     * @param Message $message
     */
    public function __construct(Product $product,
                                User $user,
                                ProductReview $productReview,
                                Message $message)
    {
        $this->product = $product;
        $this->user = $user;
        $this->productReview = $productReview;
        $this->message = $message;
    }

    /**
     * @param $data
     * @param null $id
     * @param array $with
     *
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
     *
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
     *
     * @return mixed
     */
    public function toggleVisibility($id, array $data)
    {
        $productReview = $this->productReview->findOrFail($id);
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
        $productReview = $this->productReview->with('comments')->findOrFail($id);
        $currentUser = \Auth::user();
        $productReview->comments->first()->markAsRead($currentUser->id);
    }

    /**
     * @param array $data
     * @param int|string $messageId
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|mixed
     */
    public function editMessage(array $data, $messageId)
    {
        $message = $this->message->findOrFail($messageId);
        $message->body = $data['reply_message'];
        $message->save();

        return $message;
    }

    /**
     * @param int|string $messageId
     * @param array $data
     * @return bool|mixed|null
     * @throws \Exception
     */
    public function deleteMessage($messageId, array $data = [])
    {
        $deleted = $this->message->findOrFail($messageId)->delete();

        return $deleted;
    }

    /**
     * @param array $data
     *
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
                'subject' => $subject,
            ]);
        $user = new User();
        $adminArr = $user->getUsersByRole('Admin');
        if ($adminArr) {
            $thread->addParticipants($adminArr);
        }

        return $review;
    }

    /**
     * @param array $data
     * @param $reviewId
     *
     * @return mixed
     */
    public function update(array $data, $reviewId)
    {
        $review = $this->productReview->findOrFail($reviewId)->update($data);

        return $review;
    }

    /**
     * @param $id
     * @param array $data
     * @return int
     * @throws \Exception
     */
    public function delete($id, array $data = []): int
    {
        $deleted = $this->productReview->findOrFail($id)->delete();

        return $deleted;
    }
}
