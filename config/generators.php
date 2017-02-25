<?php

return [
    /*
   |--------------------------------------------------------------------------
   | Generator Config
   |--------------------------------------------------------------------------
   |
   */
    'generator'=>[
        'basePath'=> app_path().'/Core',
        'rootNamespace'=>'App\\Core\\',
        'controllerBasePath'=> app_path().'/Core/Http/Controllers',
        'customControllerNamespace'=>'App\\Core\\Http\\Controllers\\',
        'paths'=>[
            'models'=>'Models',
            'repositories'=>'Repositories',
            'controllers'=> 'Controllers',
            'interfaces'=>'Repositories',
            'transformers'=>'Transformers',
            'presenters'=>'Presenters'
        ]
    ]
];