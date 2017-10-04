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

    Route::group(['prefix' => 'users', 'middleware' => ['jwt.auth', 'role:Admin'], 'as' => 'users.'], function () {
        Route::get('/', [
            'as' => 'all',
            'uses' => 'Api\UsersController@index'
        ]);
        Route::post('/store', [
            'as' => 'store',
            'uses' => 'Api\UsersController@store'
        ]);
        Route::put('/update/{id}', [
            'as' => 'update',
            'uses' => 'Api\UsersController@update'
        ]);
        Route::get('toggleBan/{id}', [
            'uses' => 'Api\UsersController@toggleBan',
            'as' => 'toggleBan'
        ])->where('id', '[0-9]+');
        Route::get('/{id}', [
            'as' => 'show',
            'uses' => 'Api\UsersController@show'
        ]);
        Route::delete('/{id}', [
            'as' => 'delete',
            'uses' => 'Api\UsersController@destroy'
        ]);
    });


    Route::group(
        ['prefix' => '/backlogs'], function () {
        $this->get('/', [
            'as' => 'log-viewer::dashboard',
            'uses' => 'Api\LogsController@index',
        ]);
        $this->group(['prefix' => '/logs'], function () {
            $this->get('/', [
                'as' => 'log-viewer::logs.list',
                'uses' => 'Api\LogsController@listLogs',
            ]);
            $this->delete('delete', [
                'as' => 'log-viewer::logs.delete',
                'uses' => 'Api\LogsController@delete',
            ]);
        });

        Route::group(['prefix' => '/{date}'], function () {
            $this->get('/', [
                'as' => 'log-viewer::logs.show',
                'uses' => 'Api\LogsController@show',
            ]);

            $this->get('download', [
                'as' => 'log-viewer::logs.download',
                'uses' => 'Api\LogsController@download',
            ]);
            $this->get('{level}', [
                'as' => 'log-viewer::logs.filter',
                'uses' => 'Api\LogsController@showByLevel',
            ]);
        });
    });

    Route::group(['prefix' => 'role_perm', 'middleware' => ['jwt.auth', 'role:Admin'], 'as' => 'role_permission.'], function () {
        Route::get('/roles', [
            'as' => 'roles',
            'uses' => 'Api\RolePermissionController@getAllRoles'
        ]);
        Route::get('/permissions', [
            'as' => 'permissions',
            'uses' => 'Api\RolePermissionController@getAllPermissions'
        ]);
    });
});