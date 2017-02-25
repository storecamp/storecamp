<?php

/**
 * Client routes
 */
$this->group(['prefix' => '/', 'as' => 'site::'], function(\Illuminate\Routing\Router $router) {
    $router->get('/', [
        'uses' => 'Site\IndexController@home'
    ]);
    $router->get('/home', [
        'uses' => 'Site\IndexController@home',
        'as' => 'home'
    ]);

    $router->group(['prefix' => 'products', 'as' => 'products::'], function (\Illuminate\Routing\Router $router) {
        $router->get('index/{category?}', [
            'uses' => 'Site\ProductController@index',
            'as' => 'index'
        ]);
        $router->get('show/{product}', [
            'uses' => 'Site\ProductController@show',
            'as' => 'show'
        ]);
    });

    $router->group(['prefix' => 'cart', 'as' => 'cart::'], function (\Illuminate\Routing\Router $router) {

        $router->get('show', [
            'uses' => 'Site\CartController@show',
            'as' => 'show'
        ]);

        $router->put('add/{cartId}', [
            'uses' => 'Site\CartController@add',
            'as' => 'add'
        ]);

        $router->put('remove/{itemId}', [
            'uses' => 'Site\CartController@remove',
            'as' => 'remove'
        ]);

        $router->post('delete', [
            'uses' => 'Site\CartController@delete',
            'as' => 'delete'
        ]);
    });

    /**
     * site payment callbacks
     */
    $router->get('callback/payment/{status}/{id}/{shoptoken}', ['as' => 'callback', 'uses' => 'Site\CallbackController@process']);
    $router->post('callback/payment/{status}/{id}/{shoptoken}', ['as' => 'callback', 'uses' => 'Site\CallbackController@process']);
});


/**
 * @param $this \Illuminate\Routing\Route
 */
Auth::routes();
// Password reset routes...
$this->get('password/reset', 'Auth\ResetPasswordController@showResetForm');
$this->get('password/reset/{token}', 'Auth\PasswordController@getReset');
$this->post('password/reset', 'Auth\PasswordController@postReset');
$this->get('/logout', ['uses' => 'Auth\LoginController@logout']);


$this->get('/htmlElements', [
    'uses' => 'Admin\AdminController@htmlElements',
    'as' => 'htmlElements'
]);

$this->group(
    ['prefix' => 'admin', 'as' => 'admin::', 'middleware' => 'auth'], function () {

    $this->get('dashboard', [
        'uses' => 'Admin\AdminController@show',
        'as' => 'dashboard'
    ]);
    $this->get('/', [
        'uses' => 'Admin\AdminController@show',
        'as' => 'dashboard'
    ]);

    $this->group(['prefix' => 'users', 'as' => 'users::'], function () {
        $this->get('/', [
            'uses' => 'Admin\UsersController@index',
            'as' => 'index'
        ]);

        $this->get('/show/{id}', [
            'uses' => 'Admin\UsersController@show',
            'as' => 'show'
        ]);
        $this->get('/create', [
            'uses' => 'Admin\UsersController@create',
            'as' => 'create'
        ]);
        $this->get('/edit/{id}', [
            'uses' => 'Admin\UsersController@edit',
            'as' => 'edit'
        ]);

        $this->put('update/{id}', [
            'uses' => 'Admin\UsersController@update',
            'as' => 'update'
        ])->middleware('shouldLeftAdmin');

        $this->delete('{id}', [
            'uses' => 'Admin\UsersController@destroy',
            'as' => 'delete'
        ])->middleware('notAdmin');

        $this->post('store', [
            'uses' => 'Admin\UsersController@store',
            'as' => 'store'
        ]);

        $this->get('/delete/{id}', [
            'uses' => 'Admin\UsersController@destroy',
            'as' => 'get::delete'
        ])->middleware('notAdmin');
    });
    $this->group(['prefix' => 'media', 'as' => 'media::'], function () {

        $this->get('/index', [
            'uses' => 'Admin\MediaController@index',
            'as' => 'indexs'
        ]);
        $this->get('/index/{disk}/{path?}', [
            'uses' => 'Admin\MediaController@index',
            'as' => 'index'
        ]);

        $this->get('getIndex/{disk}/{path?}/', [
            'uses' => 'Admin\MediaController@getIndex',
            'as' => 'get.index'
        ]);

        $this->post('file_linker/{disk}/{folder?}', [
            'uses' => 'Admin\MediaController@filesLinker',
            'as' => 'file_linker'
        ]);

        $this->get('/getIndexFolders/{disk}/{folder?}', [
            'uses' => 'Admin\MediaController@getIndexFolders',
            'as' => 'get.index.folders'
        ]);

        $this->get('download/{disk}/{id}/{folder}', [
            'uses' => 'Admin\MediaController@download',
            'as' => 'download'
        ]);

        $this->post('/makeDirectory/{disk}', [
            'uses' => 'Admin\MediaController@makeFolder',
            'as' => 'make.directory'
        ]);

        $this->post('/renameDirectory/{disk}', [
            'uses' => 'Admin\MediaController@renameFolder',
            'as' => 'rename.directory'
        ])->middleware('folderLocked');

        $this->post('/renameFile/{disk}', [
            'uses' => 'Admin\MediaController@renameFile',
            'as' => 'rename.file'
        ]);

        $this->delete('{id}', [
            'uses' => 'Admin\MediaController@destroy',
            'as' => 'delete'
        ]);

        $this->post('upload/{disk}', [
            'uses' => 'Admin\MediaController@upload',
            'as' => 'upload'
        ]);

        $this->get('delete/{id}', [
            'uses' => 'Admin\MediaController@destroy',
            'as' => 'get.delete'
        ]);

        $this->get('delete/folder/{disk}/{folder}', [
            'uses' => 'Admin\MediaController@folderDestroy',
            'as' => 'get.folder.delete'
        ])->middleware('folderLocked');

    });

    $this->group(['prefix' => 'roles', 'as' => 'roles::'], function () {

        $this->get('/', [
            'uses' => 'Admin\RolesController@index',
            'as' => 'index'

        ]);

        $this->get('create', [
            'uses' => 'Admin\RolesController@create',
            'as' => 'create'

        ]);

        $this->get('edit/{id}', [
            'uses' => 'Admin\RolesController@edit',
            'as' => 'edit'
        ]);

        $this->put('update/{id}', [
            'uses' => 'Admin\RolesController@update',
            'as' => 'update'
        ])->middleware('notDefaultRole');

        $this->delete('{id}', [
            'uses' => 'Admin\RolesController@destroy',
            'as' => 'delete'
        ])->middleware('notDefaultRole');

        $this->post('store', [
            'uses' => 'Admin\RolesController@store',
            'as' => 'store'
        ]);

        $this->get('perms/json', [
            'uses' => 'Admin\RolesController@getPermsJson',
            'as' => 'permissions::json'
        ]);

        $this->get('/delete/{id}', [
            'uses' => 'Admin\RolesController@destroy',
            'as' => 'get::delete'
        ])->middleware('notDefaultRole');

    });
    $this->group(['prefix' => 'products', 'as' => 'products::'], function () {

        $this->get('/', [
            'uses' => 'Admin\ProductsController@index',
            'as' => 'index'

        ]);

        $this->get('show/{id}', [
            'uses' => 'Admin\ProductsController@show',
            'as' => 'show'
        ]);

        $this->get('create', [
            'uses' => 'Admin\ProductsController@create',
            'as' => 'create'

        ]);

        $this->get('edit/{id}', [
            'uses' => 'Admin\ProductsController@edit',
            'as' => 'edit'
        ]);

        $this->put('update/{id}', [
            'uses' => 'Admin\ProductsController@update',
            'as' => 'update'
        ]);

        $this->delete('{id}', [
            'uses' => 'Admin\ProductsController@destroy',
            'as' => 'delete'
        ]);

        $this->post('store', [
            'uses' => 'Admin\ProductsController@store',
            'as' => 'store'
        ]);

        $this->get('/delete/{id}', [
            'uses' => 'Admin\ProductsController@destroy',
            'as' => 'get::delete'
        ]);
        $this->get('/select', [
            'uses' => 'Admin\ProductsController@getSelect',
            'as' => 'get::select'
        ]);

    });
    $this->group(['prefix' => 'reviews', 'as' => 'reviews::'], function () {

        $this->get('index',
            [
                'uses' => 'Admin\ProductReviewController@index',
                'as' => 'index'
            ]);

        $this->get('show/{id}',
            [
                'uses' => 'Admin\ProductReviewController@show',
                'as' => 'show'
            ]);

        $this->get('delete/{id}', [
            'uses' => 'Admin\ProductReviewController@delete',
            'as' => 'get.delete'
        ]);

        $this->put('reply/review/{id}', [
            'uses' => 'Admin\ProductReviewController@replyFeedback',
            'as' => 'reply'
        ]);

        $this->delete('delete/review/{id}', [
            'uses' => 'Admin\ProductReviewController@delete',
            'as' => 'destroy'
        ]);

        $this->get('create/{productId}', [
            'uses' => 'Admin\ProductReviewController@create',
            'as' => 'create'
        ]);

        $this->get('edit/{productId}', [
            'uses' => 'Admin\ProductReviewController@edit',
            'as' => 'edit'
        ]);

        $this->put('update/{productId}', [
            'uses' => 'Admin\ProductReviewController@update',
            'as' => 'update'
        ]);

        $this->post('store/{productId}', [
            'uses' => 'Admin\ProductReviewController@store',
            'as' => 'store'
        ]);

        $this->get('toggle_visibility/{id}', [
            'uses' => 'Admin\ProductReviewController@visibility',
            'as' => 'visibility'
        ]);

        $this->get('markasread/productReview/{feed}', [
            'uses' => 'Admin\ProductReviewController@markAsRead',
            'as' => 'markasread'
        ]);

        $this->post('editMessage/{messageId}', [
            'uses' => 'Admin\ProductReviewController@editMessage',
            'as' => 'editMessage'
        ])->middleware('belongsToUserOrAdmin');

        $this->post('deleteMessage/{messageId}', [
            'uses' => 'Admin\ProductReviewController@deleteMessage',
            'as' => 'deleteMessage'
        ])->middleware('belongsToUserOrAdmin');
    });

    $this->group(['prefix' => 'categories', 'as' => 'categories::'], function () {

        $this->get('/', [
            'uses' => 'Admin\CategoriesController@index',
            'as' => 'index'

        ]);

        $this->get('create', [
            'uses' => 'Admin\CategoriesController@create',
            'as' => 'create'
        ]);

        $this->get('edit/{id}', [
            'uses' => 'Admin\CategoriesController@edit',
            'as' => 'edit'
        ]);

        $this->put('update/{id}', [
            'uses' => 'Admin\CategoriesController@update',
            'as' => 'update'
        ]);

        $this->delete('{id}', [
            'uses' => 'Admin\CategoriesController@destroy',
            'as' => 'delete'
        ]);

        $this->get('/delete/{id}', [
            'uses' => 'Admin\CategoriesController@destroy',
            'as' => 'get::delete'
        ]);

        $this->post('store', [
            'uses' => 'Admin\CategoriesController@store',
            'as' => 'store'
        ]);

        $this->get('description/{id}', [
            'uses' => 'Admin\CategoriesController@getDescription',
            'as' => 'description'
        ]);
    });

    $this->group(['prefix' => 'attribute_groups', 'as' => 'attribute_groups::'], function () {

        $this->get('/', [
            'uses' => 'Admin\AttributeGroupsController@index',
            'as' => 'index'

        ]);

        $this->get('create', [
            'uses' => 'Admin\AttributeGroupsController@create',
            'as' => 'create'

        ]);

        $this->get('edit/{id}', [
            'uses' => 'Admin\AttributeGroupsController@edit',
            'as' => 'edit'
        ]);

        $this->put('update/{id}', [
            'uses' => 'Admin\AttributeGroupsController@update',
            'as' => 'update'
        ]);

        $this->delete('{id}', [
            'uses' => 'Admin\AttributeGroupsController@destroy',
            'as' => 'delete'
        ]);

        $this->post('store', [
            'uses' => 'Admin\AttributeGroupsController@store',
            'as' => 'store'
        ]);

        $this->get('/delete/{id}', [
            'uses' => 'Admin\AttributeGroupsController@destroy',
            'as' => 'get::delete'
        ]);

        $this->get('/groups/json', [

            'uses' => 'Admin\AttributeGroupsController@getJson',
            'as' => 'get::json'
        ]);
    });

    $this->group(['prefix' => 'attributes', 'as' => 'attributes::'], function () {

        $this->get('/', [
            'uses' => 'Admin\AttributesController@index',
            'as' => 'index'

        ]);

        $this->get('create', [
            'uses' => 'Admin\AttributesController@create',
            'as' => 'create'

        ]);

        $this->get('edit/{id}', [
            'uses' => 'Admin\AttributesController@edit',
            'as' => 'edit'
        ]);

        $this->put('update/{id}', [
            'uses' => 'Admin\AttributesController@update',
            'as' => 'update'
        ]);

        $this->delete('{id}', [
            'uses' => 'Admin\AttributesController@destroy',
            'as' => 'delete'
        ]);

        $this->post('store', [
            'uses' => 'Admin\AttributesController@store',
            'as' => 'store'
        ]);

        $this->get('/delete/{id}', [
            'uses' => 'Admin\AttributesController@destroy',
            'as' => 'get::delete'
        ]);

        $this->get('/attrs/json', [

            'uses' => 'Admin\AttributesController@getJson',
            'as' => 'get::json'
        ]);
    });

    $this->group(['prefix' => 'subscribers', 'as' => 'subscribers::'], function () {

        $this->get('/', ['uses' => 'Admin\SubscriptionController@index', 'as' => 'index']);

        $this->get('/show/{uid}',
            ['uses' => 'Admin\SubscriptionController@show',
                'as' => 'show'
            ]);

        $this->get('/show_user/{user}',
            ['uses' => 'Admin\SubscriptionController@showUser',
                'as' => 'showUser'
            ]);

        $this->get('/generate/{newsList_id}',
            [
                'uses' => 'Admin\SubscriptionController@showGenerate',
                'as' => 'showGenerate'
            ]);

        $this->get('/tmp_mail/{file}',
            [
                'uses' => 'Admin\SubscriptionController@getTmpMail',
                'as' => 'tmp_mail'
            ]);

        $this->get('/history_mail/{folder}/{filename}',
            [
                'uses' => 'Admin\SubscriptionController@getHistoryTmpMail',
                'as' => 'history_mail'
            ]);

        $this->post('/generate/{uid}/{type}',
            [
                'uses' => 'Admin\SubscriptionController@generate',
                'as' => 'generate'
            ]);
    });
    $this->group(['prefix' => 'mail', 'as' => 'mail::'], function () {

        $this->get('/',
            ['uses' => 'Admin\MailController@index', 'as' => 'index'
            ]);

        $this->get('/show/{uid}',
            ['uses' => 'Admin\MailController@show',
                'as' => 'show'
            ]);

        $this->get('/create',
            ['uses' => 'Admin\MailController@create',
                'as' => 'create'
            ]);

        $this->get('/templates',
            ['uses' => 'Admin\MailController@getTmpMails',
                'as' => 'getTmpMails'
            ]);


    });
    $this->group(['prefix' => 'campaign', 'as' => 'campaign::'], function () {

        $this->get('/', ['uses' => 'Admin\CampaignController@index', 'as' => 'index']);

        $this->get('/show/{uid}',
            ['uses' => 'Admin\CampaignController@show',
                'as' => 'show'
            ]);

        $this->get('/subscriber/{user}',
            ['uses' => 'Admin\CampaignController@subscribers',
                'as' => 'subscriber'
            ]);

        $this->get('/generate/{Campaign}',
            [
                'uses' => 'Admin\CampaignController@show',
                'as' => 'show'
            ]);

        $this->get('/tmp_mail/{file}',
            [
                'uses' => 'Admin\CampaignController@getTmpMail',
                'as' => 'tmp_mail'
            ]);

        $this->get('/history_mail/{folder}/{filename}',
            [
                'uses' => 'Admin\CampaignController@getHistoryTmpMail',
                'as' => 'history_mail'
            ]);

        $this->post('/generate/{uid}/{type}',
            [
                'uses' => 'Admin\CampaignController@generate',
                'as' => 'generate'
            ]);
        $this->get('/groups/json', [

            'uses' => 'Admin\CampaignController@getJson',
            'as' => 'get::json'
        ]);
    });

    $this->group(['prefix' => 'design', 'as' => 'design::'], function () {
        $this->group(['prefix' => 'layouts', 'as' => 'layouts::'], function () {

            $this->get('/', [
                'uses' => 'Admin\LayoutController@index',
                'as' => 'index'

            ]);

            $this->get('create', [
                'uses' => 'Admin\LayoutController@create',
                'as' => 'create'

            ]);

            $this->get('edit/{id}', [
                'uses' => 'Admin\LayoutController@edit',
                'as' => 'edit'
            ]);

            $this->put('update/{id}', [
                'uses' => 'Admin\LayoutController@update',
                'as' => 'update'
            ]);

            $this->delete('{id}', [
                'uses' => 'Admin\LayoutController@destroy',
                'as' => 'delete'
            ]);

            $this->post('store', [
                'uses' => 'Admin\LayoutController@store',
                'as' => 'store'
            ]);

            $this->get('/delete/{id}', [
                'uses' => 'Admin\LayoutController@destroy',
                'as' => 'get::delete'
            ]);

            $this->get('/layouts/json', [

                'uses' => 'Admin\LayoutController@getJson',
                'as' => 'get::json'
            ]);
        });
        $this->group(['prefix' => 'banners', 'as' => 'banners::'], function () {

            $this->get('/', [
                'uses' => 'Admin\BannerController@index',
                'as' => 'index'

            ]);

            $this->get('create', [
                'uses' => 'Admin\BannerController@create',
                'as' => 'create'

            ]);

            $this->get('edit/{id}', [
                'uses' => 'Admin\BannerController@edit',
                'as' => 'edit'
            ]);

            $this->put('update/{id}', [
                'uses' => 'Admin\BannerController@update',
                'as' => 'update'
            ]);

            $this->delete('{id}', [
                'uses' => 'Admin\BannerController@destroy',
                'as' => 'delete'
            ]);

            $this->post('store', [
                'uses' => 'Admin\BannerController@store',
                'as' => 'store'
            ]);

            $this->get('/delete/{id}', [
                'uses' => 'Admin\BannerController@destroy',
                'as' => 'get::delete'
            ]);

            $this->get('/layouts/json', [

                'uses' => 'Admin\BannerController@getJson',
                'as' => 'get::json'
            ]);
        });
        $this->group(['prefix' => 'staticPages', 'as' => 'staticPages::'], function () {

            $this->get('/', [
                'uses' => 'Admin\StaticController@index',
                'as' => 'index'

            ]);

            $this->get('create', [
                'uses' => 'Admin\StaticController@create',
                'as' => 'create'

            ]);

            $this->get('edit/{id}', [
                'uses' => 'Admin\StaticController@edit',
                'as' => 'edit'
            ]);

            $this->put('update/{id}', [
                'uses' => 'Admin\StaticController@update',
                'as' => 'update'
            ]);

            $this->delete('{id}', [
                'uses' => 'Admin\StaticController@destroy',
                'as' => 'delete'
            ]);

            $this->post('store', [
                'uses' => 'Admin\StaticController@store',
                'as' => 'store'
            ]);

            $this->get('/delete/{id}', [
                'uses' => 'Admin\StaticController@destroy',
                'as' => 'get::delete'
            ]);

            $this->get('/layouts/json', [

                'uses' => 'Admin\StaticController@getJson',
                'as' => 'get::json'
            ]);
        });
    });

    $this->group(['prefix' => 'audits', 'as' => 'audits::'], function () {
        $this->get('show/{model}/{id}',
            [
                'uses' => 'Admin\AuditsController@show',
                'as' => 'show'
            ]);
    });

    $this->group(['prefix' => 'sales', 'as' => 'sales::'], function () {
        $this->group(['prefix' => 'orders', 'as' => 'orders::'], function () {
            $this->get('/', [
                'uses' => 'Admin\OrdersController@index',
                'as' => 'index'
            ]);
        });
    });
});

$this->group(
    ['prefix' => '/admin/log-viewer',], function () {

    $this->get('/', [
        'as' => 'log-viewer::dashboard',
        'uses' => 'Admin\LogViewerController@index',
    ]);
    $this->group(['prefix' => '/logs',], function () {
        $this->get('/', [
            'as' => 'log-viewer::logs.list',
            'uses' => 'Admin\LogViewerController@listLogs',
        ]);
        $this->delete('delete', [
            'as' => 'log-viewer::logs.delete',
            'uses' => 'Admin\LogViewerController@delete',
        ]);
    });

    $this->group(['prefix' => '/{date}'], function () {
        $this->get('/', [
            'as' => 'log-viewer::logs.show',
            'uses' => 'Admin\LogViewerController@show',
        ]);

        $this->get('download', [
            'as' => 'log-viewer::logs.download',
            'uses' => 'Admin\LogViewerController@download',
        ]);
        $this->get('{level}', [
            'as' => 'log-viewer::logs.filter',
            'uses' => 'Admin\LogViewerController@showByLevel',
        ]);
    });
});
