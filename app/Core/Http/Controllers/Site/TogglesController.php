<?php

namespace App\Core\Http\Controllers\Site;

use Illuminate\Http\Request;

/**
 * Class TogglesController.
 */
class TogglesController extends BaseController
{
    protected $auth;

    /**
     * TogglesController constructor.
     * @param \Illuminate\Contracts\Auth\Factory $auth
     */
    public function __construct(\Illuminate\Contracts\Auth\Factory $auth)
    {
        $this->auth = $auth;
    }

    /**
     * like-Action to call with class_name and object_id.
     *
     * @param Request $request
     * @param $class_name
     * @param $object_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function likeDis(Request $request, $class_name, $object_id)
    {
        if ($this->auth->user()) {
            $class = 'App\Core\Models\\'.$class_name;
            $object = $class::find($object_id);
            if ($object->liked($this->auth->user())) {
                if ($object->dislike($this->auth->user())) {
                    $type = 'disliked';
                } else {
                    $type = 'error';
                }
                if ($request->ajax()) {
                    return response()->json([$type, $object->getLikeCount()]);
                } else {
                    $this->flash('info', $type.'! '.$class_name.' DisLiked.');

                    return redirect()->back();
                }
            } else {
                if ($object->like($this->auth->user())) {
                    $type = 'liked';
                } else {
                    $type = 'error';
                }
                if ($request->ajax()) {
                    return response()->json([$type, $object->getLikeCount(), 'message' => 'like']);
                } else {
                    $this->flash('info', $type.'! '.$class_name.' Liked.');

                    return redirect()->back();
                }
            }
        } else {
            if ($request->ajax()) {
                return response()->json(['message' => 'user not authorized'], 401);
            } else {
                \Toastr::warning('Please login or register to LIKE or DISLIKE!', $title = 'login required', $options = []);

                return redirect()->to(route('login'));
            }
        }
    }

    public function toggleLanguage(Request $request, $key)
    {
        $previous = \URL::previous();
        $localization = app('Mcamara\LaravelLocalization\LaravelLocalization');
        $url = $localization->getLocalizedURL($key, $previous);

        return redirect()->to($url)->withCookie(cookie('locale', $key, 525600));
    }
}
