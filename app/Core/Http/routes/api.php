<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
if (\App::environment('local', 'staging')) {
    // cors not working from middleware
    header('Access-Control-Allow-Origin:  *');
    header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PATCH, PUT, DELETE');
    header('Access-Control-Allow-Headers:  Content-Type, X-Auth_old-Token, X-CSRF-Token, Origin, Authorization');
}


Route::group(['middleware' => ['api'], 'as' => 'api.'], function () {
    Route::post('/register', [
        'uses' => 'Api\AuthController@register',
    ]);

    Route::post('/signin', [
        'uses' => 'Api\AuthController@signin',
    ]);
    Route::get('/user', function (Request $request) {
        $data = [];
        $data['id'] = $request->user()->id;
        $data['name'] = $request->user()->name;
        $data['email'] = $request->user()->email;
        $data['roles'] = $request->user()->roles;
        return response()->json([
            'data' => $data,
        ]);
    })->middleware('jwt.auth');
});