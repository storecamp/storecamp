<?php

namespace App\Core\Http\Controllers\Api;

use App\Core\Models\User;
use Illuminate\Http\Request;
use App\Core\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function authenticate(Request $request)
    {
        // grab credentials from the request
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return response()->json(compact('token'));
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAuthenticatedUser()
    {
        try {

            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }

        // the token is valid and we have found the user via the sub claim
        return response()->json(compact('user'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required|min:8',
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'msg' => $validator->getMessageBag()->all()], 400);
        }

        $credentials = $request->only('name', 'email', 'password');
        $password = \Hash::make($request->input('password'));
        $credentials['password'] = $password;
//        $credentials['type'] = 2;
        try {
            $user = User::create($credentials);
            $token_creds = $request->only('email', 'password');

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()], 409);
        }
        if (!$token = JWTAuth::attempt($token_creds)) {
            return response()->json(['error' => 'invalid_credentials'], 401);
        } else {
            return response()->json(compact('user', 'token'));
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUsers()
    {
        $users = User::all();

        return response()->json(compact('users'));

    }

}
