<?php

namespace App\Core\Http\Controllers\Site;

use Illuminate\Http\Request;
/**
 * Class TogglesController
 * @package App\Http\Controllers
 */
class TogglesController extends BaseController
{
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
        $auth = app('Illuminate\Contracts\Auth\Factory');
        if ($auth->user()) {
            $class = 'App\Core\Models\\' . $class_name;
            $object = $class::find($object_id);
            if ($object->liked($auth->user())) {
                if ($object->dislike($auth->user())) {
                    $type = 'disliked';
                } else {
                    $type = 'error';
                }
                if ($request->ajax()) {
                    return response()->json([$type, $object->getLikeCount()]);
                } else {
                    \Flash::info($type . '! '.$class_name.' DisLiked.');

                    return redirect()->back();
                }
            } else {
                if ($object->like($auth->user())) {
                    $type = 'liked';
                } else {
                    $type = 'error';
                }
                if ($request->ajax()) {
                    return response()->json([$type, $object->getLikeCount(), 'message' => 'like']);
                } else {
                    \Flash::info($type . '! '.$class_name.' Liked.');
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
}
