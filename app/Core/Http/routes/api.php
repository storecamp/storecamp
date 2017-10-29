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
        Route::get('/count', [
            'as' => 'count',
            'uses' => 'Api\UsersController@count'
        ]);
        Route::get('/{id}', [
            'as' => 'show',
            'uses' => 'Api\UsersController@show'
        ]);
        Route::delete('/{id}', [
            'as' => 'delete',
            'uses' => 'Api\UsersController@destroy',
            'middleware' => ['canBeDeleted']
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
            $this->post('delete', [
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

    Route::group(['prefix' => 'access', 'middleware' => ['jwt.auth', 'role:Admin'], 'as' => 'access.'],
        function () {
            Route::get('/getAllRoles', [
                'as' => 'roles',
                'uses' => 'Api\AccessController@getAllRoles'
            ]);
            Route::get('/getRolesCount', [
                'as' => 'roles.count',
                'uses' => 'Api\AccessController@getRolesCount'
            ]);
            Route::get('/roles', [
                'as' => 'roles',
                'uses' => 'Api\AccessController@indexRoles'
            ]);
            Route::post('/roles/store', [
                'as' => 'roles.store',
                'uses' => 'Api\AccessController@store'
            ]);
            Route::put('/roles/update/{id}', [
                'as' => 'roles.put',
                'uses' => 'Api\AccessController@update'
            ]);
            Route::get('/roles/{id}', [
                'as' => 'roles',
                'uses' => 'Api\AccessController@show'
            ]);
            Route::get('/getAllPermissions', [
                'as' => 'permissions',
                'uses' => 'Api\AccessController@getAllPermissions'
            ]);
            Route::get('/permissions', [
                'as' => 'permissions',
                'uses' => 'Api\AccessController@indexPermissions'
            ]);
        });
    
    Route::group(['prefix' => 'media', 'as' => 'media::'], function () {
        $this->get('/index', [
            'uses' => 'Api\FileSystemController@index',
            'as' => 'indexs',
        ]);
        $this->get('/index/{disk}/{path?}', [
            'uses' => 'Api\FileSystemController@index',
            'as' => 'index',
        ]);

        $this->get('getIndex/{disk}/{path?}/', [
            'uses' => 'Api\FileSystemController@getIndex',
            'as' => 'get.index',
        ]);

        $this->post('file_linker/{disk}/{folder?}', [
            'uses' => 'Api\FileSystemController@filesLinker',
            'as' => 'file_linker',
        ]);

        $this->get('/getIndexFolders/{disk}/{folder?}', [
            'uses' => 'Api\FileSystemController@getIndexFolders',
            'as' => 'get.index.folders',
        ]);

        $this->get('download/{disk}/{id}/{folder}', [
            'uses' => 'Api\FileSystemController@download',
            'as' => 'download',
        ]);

        $this->post('/makeDirectory/{disk}', [
            'uses' => 'Api\FileSystemController@makeFolder',
            'as' => 'make.directory',
        ]);

        $this->post('/renameDirectory/{disk}', [
            'uses' => 'Api\FileSystemController@renameFolder',
            'as' => 'rename.directory',
        ])->middleware('folderLocked');

        $this->post('/renameFile/{disk}', [
            'uses' => 'Api\FileSystemController@renameFile',
            'as' => 'rename.file',
        ]);

        $this->delete('{id}', [
            'uses' => 'Api\FileSystemController@destroy',
            'as' => 'delete',
        ]);

        $this->post('upload/{disk}', [
            'uses' => 'Api\FileSystemController@upload',
            'as' => 'upload',
        ]);

        $this->get('delete/{id}', [
            'uses' => 'Api\FileSystemController@destroy',
            'as' => 'get.delete',
        ]);

        $this->get('delete/folder/{disk}/{folder}', [
            'uses' => 'Api\FileSystemController@folderDestroy',
            'as' => 'get.folder.delete',
        ])->middleware('folderLocked');
    });

});