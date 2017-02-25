<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    */

    'name' => 'Laravel',

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services your application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Logging Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log settings for your application. Out of
    | the box, Laravel uses the Monolog PHP logging library. This gives
    | you a variety of powerful log handlers / formatters to utilize.
    |
    | Available Settings: "single", "daily", "syslog", "errorlog"
    |
    */

    'log' => env('APP_LOG', 'single'),

    'log_level' => env('APP_LOG_LEVEL', 'debug'),

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => [

        /*
         * Laravel Framework Service Providers...
         */
        Illuminate\Auth\AuthServiceProvider::class,
        Illuminate\Broadcasting\BroadcastServiceProvider::class,
        Illuminate\Bus\BusServiceProvider::class,
        Illuminate\Cache\CacheServiceProvider::class,
        Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Illuminate\Cookie\CookieServiceProvider::class,
        Illuminate\Database\DatabaseServiceProvider::class,
        Illuminate\Encryption\EncryptionServiceProvider::class,
        Illuminate\Filesystem\FilesystemServiceProvider::class,
        Illuminate\Foundation\Providers\FoundationServiceProvider::class,
        Illuminate\Hashing\HashServiceProvider::class,
        Illuminate\Mail\MailServiceProvider::class,
        Illuminate\Notifications\NotificationServiceProvider::class,
        Illuminate\Pagination\PaginationServiceProvider::class,
        Illuminate\Pipeline\PipelineServiceProvider::class,
        Illuminate\Queue\QueueServiceProvider::class,
        Illuminate\Redis\RedisServiceProvider::class,
        Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
        Illuminate\Session\SessionServiceProvider::class,
        Illuminate\Translation\TranslationServiceProvider::class,
        Illuminate\Validation\ValidationServiceProvider::class,
        Illuminate\View\ViewServiceProvider::class,

        /*
         * Package Service Providers...
         */

        Tymon\JWTAuth\Providers\JWTAuthServiceProvider::class,
        Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class,

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,

        //Instances Providers
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
        \RepositoryLab\Repository\RepositoryServiceProvider::class,
        App\Providers\PresentersServiceProvider::class,
        App\Providers\RepositoriesServiceProvider::class,
        App\Providers\TransformersServiceProvider::class,
        \Robbo\Presenter\PresenterServiceProvider::class,
        \App\Providers\LogicServiceProvider::class,
        \App\Providers\SupportProvider::class,
        \App\Providers\ViewComposerServiceProvider::class,

        \App\Providers\AttributeGroupDescriptionServiceProvider::class,
        \App\Providers\AttributeGroupServiceProvider::class,
        \App\Providers\CategoryServiceProvider::class,
        \App\Providers\FolderServiceProvider::class,
        \App\Providers\MediaServiceProvider::class,
        \App\Providers\PermissionServiceProvider::class,
        \App\Providers\ProductServiceProvider::class,
        \App\Providers\RoleServiceProvider::class,
        \App\Providers\UserServiceProvider::class,
        \App\Providers\CustomValidatorServiceProvider::class,
        \App\Providers\SubscriberServiceProvider::class,
        \App\Providers\GeneratorsServiceProvider::class,
        \App\Core\Components\EmailMarketer\EmailMarketerServiceProvider::class,
        \App\Core\Components\Messenger\MessengerServiceProvider::class,
        \App\Core\Components\Auditing\AuditingServiceProvider::class,
        \App\Providers\MailServiceProvider::class,
        \App\Providers\MenuBuilderProvider::class,
        //Apis service providers
        \App\Core\APIs\Youtube\YoutubeServiceProviderLaravel5::class,
        //End of API service providers

        //Vendor Providers
        DaveJamesMiller\Breadcrumbs\ServiceProvider::class,
        Cviebrock\EloquentSluggable\ServiceProvider::class,
        Laracasts\Flash\FlashServiceProvider::class,
        Laravel\Socialite\SocialiteServiceProvider::class,
        Collective\Html\HtmlServiceProvider::class,
        App\Core\Access\AccessServiceProvider::class,
        Laracasts\Generators\GeneratorsServiceProvider::class,
        Webpatser\Countries\CountriesServiceProvider::class,
        Camroncade\Timezone\TimezoneServiceProvider::class,
        A6digital\Image\DefaultProfileImageServiceProvider::class,
        Intervention\Image\ImageServiceProvider::class,
        Arcanedev\LogViewer\LogViewerServiceProvider::class,
        \Cviebrock\ImageValidator\ImageValidatorServiceProvider::class,

        Plank\Mediable\MediableServiceProvider::class,
        That0n3guy\Transliteration\TransliterationServiceProvider::class,
        App\Core\Components\ActiveItem\ActiveServiceProvider::class,
        \App\Core\Components\Flash\FlashServiceProvider::class,
        \Webpatser\Countries\CountriesServiceProvider::class,
        Barryvdh\Debugbar\ServiceProvider::class,
        nilsenj\Toastr\ToastrServiceProvider::class,
        Vinkla\Hashids\HashidsServiceProvider::class,
        JeroenG\Packager\PackagerServiceProvider::class,
        Mpociot\ApiDoc\ApiDocGeneratorServiceProvider::class,
        storecamp\htmlelements\HtmlElementsServiceProvider::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => [

        'App' => Illuminate\Support\Facades\App::class,
        'Artisan' => Illuminate\Support\Facades\Artisan::class,
        'Auth' => Illuminate\Support\Facades\Auth::class,
        'Blade' => Illuminate\Support\Facades\Blade::class,
        'Bus' => Illuminate\Support\Facades\Bus::class,
        'Cache' => Illuminate\Support\Facades\Cache::class,
        'Config' => Illuminate\Support\Facades\Config::class,
        'Cookie' => Illuminate\Support\Facades\Cookie::class,
        'Crypt' => Illuminate\Support\Facades\Crypt::class,
        'DB' => Illuminate\Support\Facades\DB::class,
        'Eloquent' => Illuminate\Database\Eloquent\Model::class,
        'Event' => Illuminate\Support\Facades\Event::class,
        'File' => Illuminate\Support\Facades\File::class,
        'Gate' => Illuminate\Support\Facades\Gate::class,
        'Hash' => Illuminate\Support\Facades\Hash::class,
        'Lang' => Illuminate\Support\Facades\Lang::class,
        'Log' => Illuminate\Support\Facades\Log::class,
        'Mail' => Illuminate\Support\Facades\Mail::class,
        'Notification' => Illuminate\Support\Facades\Notification::class,
        'Password' => Illuminate\Support\Facades\Password::class,
        'Queue' => Illuminate\Support\Facades\Queue::class,
        'Redirect' => Illuminate\Support\Facades\Redirect::class,
        'Redis' => Illuminate\Support\Facades\Redis::class,
        'Request' => Illuminate\Support\Facades\Request::class,
        'Response' => Illuminate\Support\Facades\Response::class,
        'Route' => Illuminate\Support\Facades\Route::class,
        'Schema' => Illuminate\Support\Facades\Schema::class,
        'Session' => Illuminate\Support\Facades\Session::class,
        'Storage' => Illuminate\Support\Facades\Storage::class,
        'URL' => Illuminate\Support\Facades\URL::class,
        'Validator' => Illuminate\Support\Facades\Validator::class,
        'View' => Illuminate\Support\Facades\View::class,
        'JWTAuth' => Tymon\JWTAuth\Facades\JWTAuth::class,
        'JWTFactory' => Tymon\JWTAuth\Facades\JWTFactory::class,
        'Youtube' => App\Core\APIs\Youtube\Facades\Youtube::class,
        'Form' => Collective\Html\FormFacade::class,
        'Html' => Collective\Html\HtmlFacade::class,
        'Image' => 'Intervention\Image\Facades\Image',
        'Socialite' => 'Laravel\Socialite\Facades\Socialite',
        'Access' => \App\Core\Access\AccessFacade::class,
        'MediaUploader' => Plank\Mediable\MediaUploaderFacade::class,
        'Countries' => Webpatser\Countries\CountriesFacade::class,
        'Active' => App\Core\Components\ActiveItem\Facades\Active::class,
        'Flash' => App\Core\Components\Flash\Flash::class,
        'Debugbar' => Barryvdh\Debugbar\Facade::class,
        'Toastr' => nilsenj\Toastr\Facades\Toastr::class,
        'Hashids' => Vinkla\Hashids\Facades\Hashids::class,
        'Accordion' => 'storecamp\htmlelements\Facades\Accordion',
        'Alert' => 'storecamp\htmlelements\Facades\Alert',
        'Badge' => 'storecamp\htmlelements\Facades\Badge',
        'Breadcrumb' => 'storecamp\htmlelements\Facades\Breadcrumb',
        'Button' => 'storecamp\htmlelements\Facades\Button',
        'ButtonGroup' => 'storecamp\htmlelements\Facades\ButtonGroup',
        'Carousel' => 'storecamp\htmlelements\Facades\Carousel',
        'ControlGroup' => 'storecamp\htmlelements\Facades\ControlGroup',
        'DropdownButton' => 'storecamp\htmlelements\Facades\DropdownButton',
        'Forms' => 'storecamp\htmlelements\Facades\Form',
        'Helpers' => 'storecamp\htmlelements\Facades\Helpers',
        'Icon' => 'storecamp\htmlelements\Facades\Icon',
        'InputGroup' => 'storecamp\htmlelements\Facades\InputGroup',
        'Images' => 'storecamp\htmlelements\Facades\Image',
        'Label' => 'storecamp\htmlelements\Facades\Label',
        'MediaObject' => 'storecamp\htmlelements\Facades\MediaObject',
        'Modal' => 'storecamp\htmlelements\Facades\Modal',
        'Navbar' => 'storecamp\htmlelements\Facades\Navbar',
        'Navigation' => 'storecamp\htmlelements\Facades\Navigation',
        'Panel' => 'storecamp\htmlelements\Facades\Panel',
        'ProgressBar' => 'storecamp\htmlelements\Facades\ProgressBar',
        'Tabbable' => 'storecamp\htmlelements\Facades\Tabbable',
        'Table' => 'storecamp\htmlelements\Facades\Table',
        'Thumbnail' => 'storecamp\htmlelements\Facades\Thumbnail',
        'Menu' => \storecamp\htmlelements\Facades\Menu::class,
        'Breadcrumbs' => DaveJamesMiller\Breadcrumbs\Facade::class,
    ],

];
