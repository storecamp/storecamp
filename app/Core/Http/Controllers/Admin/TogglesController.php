<?php

namespace App\Core\Http\Controllers\Admin;

use Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

/**
 * Class TogglessController.
 */
class TogglesController extends BaseController
{
    public function __construct()
    {
        $this->middleware('role:Admin');
    }

    /**
     * @param Request $request
     * @param $class_name
     * @param $object_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function toggleBan(Request $request, $class_name, $object_id)
    {
        try {
            $class = 'App\Core\Models\\'.$class_name;
            $object = $class::find($object_id);
            if ($class_name == 'User') {
                if ($object->hasRole('Admin')) {
                    $this->flash('error', '<b>Not allowed</b>'.'Can\'t be banned!');

                    return redirect()->back();
                } else {
                    if (Auth::user()->hasRole('Admin')) {
                        if ($object->banned === 0) {
                            $this->flash('warning', (strtolower($class_name).' Banned'));
                            $object->banned = 1;
                        } else {
                            $this->flash('info', (strtolower($class_name).' UnBanned'));
                            $object->banned = 0;
                        }
                        $object->save();
                    } else {
                        $this->flash('error', '<b>Not allowed</b>'.'Can\'t be banned!');

                        return redirect()->back();
                    }
                }

                return redirect()->back();
            } else {
                if (\Auth::user()->id === $object->user->id || ! \Auth::user()->hasRole('Admin')) {
                    $this->flash('error', '<b>Not allowed</b>'.'Can\'t be banned!');

                    return redirect()->back();
                } else {
                    if ($object->banned === false) {
                        $this->flash('warning', (strtolower($class_name).' Banned'));
                        $object->banned = true;
                    } else {
                        $this->flash('info', (strtolower($class_name).' UnBanned'));
                        $object->banned = false;
                    }
                    $object->save();
                }
            }

            return redirect()->back();
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound();
        }
    }
}
