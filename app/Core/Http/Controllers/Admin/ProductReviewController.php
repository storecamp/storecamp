<?php

namespace App\Core\Http\Controllers\Admin;

use App\Core\Contracts\ProductReviewSystemContract;
use App\Core\Models\ProductReview;
use App\Core\Repositories\ProductReviewRepository;
use App\Core\Repositories\ProductsRepository;
use App\Core\Repositories\UserRepository;
use App\Core\Transformers\ReviewDataTransformer;
use App\Core\Validators\ProductReview\ProductReviewFormRequest;
use App\Core\Validators\ProductReview\ReplyProductReviewFormRequest;
use App\Core\Validators\ProductReview\UpdateProductReviewFormRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

/**
 * Class ProductReviewController.
 */
class ProductReviewController extends BaseController
{
    public $viewPathBase = 'admin.reviews.';
    public $errorRedirectPath = 'admin/reviews/index';
    /**
     * @var ProductsRepository
     */
    protected $product;
    /**
     * @var UserRepository
     */
    protected $user;

    /**
     * @var ProductReviewRepository
     */
    protected $reviews;

    /**
     * @var
     */
    protected $productReviewSystem;

    /**
     * ProductReviewController constructor.
     *
     * @param ProductReviewSystemContract $productReviewSystem
     * @param ProductsRepository          $product
     * @param UserRepository              $user
     * @param ProductReviewRepository     $reviews
     */
    public function __construct(ProductReviewSystemContract $productReviewSystem, ProductsRepository $product,
                                UserRepository $user, ProductReviewRepository $reviews)
    {
        $this->productReviewSystem = $productReviewSystem;
        $this->product = $productReviewSystem->product;
        $this->user = $productReviewSystem->user;
        $this->reviews = $productReviewSystem->productReview;
        $this->middleware('role:Admin');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        try {
            return $this->view('index');
        } catch (\Throwable $e) {
            return $this->redirectError($e);
        }
    }

    /**
     * @param Datatables $datatables
     *
     * @return mixed
     */
    public function data(Datatables $datatables)
    {
        $query = ProductReview::with(['product', 'user']);

        return $datatables->eloquent($query)
            ->setTransformer(new ReviewDataTransformer())
            ->make(true);
    }

    /**
     * @param Request $request
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show(Request $request, $id)
    {
        try {
            $data = $request->all();
            $review = $this->productReviewSystem->present($data, $id, ['product', 'user', 'comments']);
            $currentUserId = \Auth::user()->id;
//            $reviews->comments->first()->markAsRead($currentUserId);
            return $this->view('show', compact('review', 'currentUserId'));
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound($e);
        } catch (\Throwable $e) {
            return $this->redirectError($e);
        }
    }

    /**
     * @param Request $request
     * @param $productId
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request, $productId)
    {
        $product = $this->product->find($productId);

        return $this->view('create', compact('product'));
    }

    /**
     * @param ProductReviewFormRequest $request
     * @param $productId
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductReviewFormRequest $request, $productId)
    {
        try {
            $data = $request->all();
            $userId = $request->user()->id;
            $data['user_id'] = $userId;
            $data['product_id'] = $productId;
            $review = $this->productReviewSystem->create($data);

            return redirect()->to(route('admin::reviews::index'));
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound($e);
        } catch (\Throwable $e) {
            return $this->redirectError($e);
        }
    }

    public function update(UpdateProductReviewFormRequest $request, $reviewId)
    {
        try {
            $data = $request->all();
            $review = $this->productReviewSystem->update($data, $reviewId);

            return redirect()->to(route('admin::reviews::index'));
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound($e);
        } catch (\Throwable $e) {
            return $this->redirectError($e);
        }
    }

    /**
     * @param Request $request
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        try {
            $data = $request->all();
            $review = $this->productReviewSystem->present($data, $id, ['product', 'user', 'comments']);
            $product = $review->product;

            return $this->view('edit', compact('review', 'product'));
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound($e);
        } catch (\Throwable $e) {
            return $this->redirectError($e);
        }
    }

    /**
     * edit message in review.
     *
     * @param ReplyProductReviewFormRequest $request
     * @param $messageId
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function editMessage(ReplyProductReviewFormRequest $request, $messageId)
    {
        try {
            $data = $request->all();
            $message = $this->productReviewSystem->editMessage($data, $messageId);
            if ($request->ajax()) {
                return response()->json(['body' => $message->body], 200);
            }

            return redirect()->back();
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound($e);
        } catch (\Throwable $e) {
            return $this->redirectError($e);
        }
    }

    /**
     * delete message in review.
     *
     * @param Request $request
     * @param $messageId
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function deleteMessage(Request $request, $messageId)
    {
        try {
            $data = $request->all();
            $message = $this->productReviewSystem->deleteMessage($messageId, $data);
            if ($request->ajax() && $message) {
                return response()->json(['message' => 'message deleted successfully'], 200);
            }

            return redirect()->back();
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound($e);
        } catch (\Throwable $e) {
            return $this->redirectError($e);
        }
    }

    /**
     * @param ReplyProductReviewFormRequest $request
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function replyFeedback(ReplyProductReviewFormRequest $request, $id)
    {
        try {
            $data = $request->all();
            $reviews = $this->productReviewSystem->replyProductReview($id, $data);
            if ($request->ajax()) {
                $message = $reviews->comments->last()->messages->last();
                $messageView = $this->view('message-item', compact('message'));

                return response()->json(['message' => $messageView->render()]);
            }

            return redirect()->to(route('admin::reviews::show', $reviews->id));
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound($e);
        } catch (\Throwable $e) {
            return $this->redirectError($e);
        }
    }

    /**
     * @param Request $request
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function visibility(Request $request, $id)
    {
        try {
            $data = $request->all();
            $reviews = $this->productReviewSystem->toggleVisibility($id, $data);

            return redirect()->back();
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound($e);
        } catch (\Throwable $e) {
            return $this->redirectError($e);
        }
    }

    /**
     * @param Request $request
     * @param $id
     *
     * @return mixed
     */
    public function markAsRead(Request $request, $id)
    {
        try {
            $data = $request->all();
            if ($request->ajax()) {
                $this->productReviewSystem->markAsRead($id, $data);

                return response()->json(
                    ['message' => 'reviews marked as read', 'messages_count' => \Auth::user()->newMessagesCount()], 200);
            } else {
                return response()->json('not allowed', 400);
            }
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound($e);
        } catch (\Throwable $e) {
            return $this->redirectError($e);
        }
    }

    /**
     * @param Request $request
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete(Request $request, $id)
    {
        try {
            $data = $request->all();
            $deleted = $this->productReviewSystem->delete($id, $data);
            if (!$deleted) {
                \Flash::error('Error appeared! Review not deleted!');
            }

            return redirect('admin/reviews/index');
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound($e);
        } catch (\Throwable $e) {
            return $this->redirectError($e);
        }
    }
}
