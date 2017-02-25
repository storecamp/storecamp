<?php

namespace App\Core\Http\Controllers\Auth;

use App\Core\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'admin';

    /**
     * LoginController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * @param $redirector
     * @param $user
     * @return mixed
     */
    private function redirectTo(Redirector $redirector, $user) {
        if($user->hasRole('Admin')) {
            return $redirector->to($this->redirectTo);
        } else {
            return $redirector->intended($this->redirectTo);
        }
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param Request $request
     * @return mixed
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user())
            ?: $this->redirectTo(redirect(), $this->guard()->user());
    }
}
