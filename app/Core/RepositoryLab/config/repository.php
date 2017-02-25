<?php
/*
|--------------------------------------------------------------------------
| RepositoryLab Repository Config
|--------------------------------------------------------------------------
|
|
*/
return [

    /*
    |--------------------------------------------------------------------------
    | Repository Pagination Limit Default
    |--------------------------------------------------------------------------
    |
    */
    'pagination'=>[
        'limit'=>10
    ],

    /*
    |--------------------------------------------------------------------------
    | Fractal Presenter Config
    |--------------------------------------------------------------------------
    |

    Available serializers:
    ArraySerializer
    DataArraySerializer
    JsonApiSerializer

    */
    'fractal'=>[
        'params'=>[
            'include'=>'include'
        ],
        'serializer' => League\Fractal\Serializer\JsonApiSerializer::class
    ],

    /*
    |--------------------------------------------------------------------------
    | Cache Config
    |--------------------------------------------------------------------------
    |
    */
//    'cache'=>[
//        /*
//         |--------------------------------------------------------------------------
//         | Cache Status
//         |--------------------------------------------------------------------------
//         |
//         | Enable or disable cache
//         |
//         */
//        'enabled'   => true,
//
//        /*
//         |--------------------------------------------------------------------------
//         | Cache Minutes
//         |--------------------------------------------------------------------------
//         |
//         | Time of expiration cache
//         |
//         */
//        'minutes'   => 30,
//
//        /*
//         |--------------------------------------------------------------------------
//         | Cache Repository
//         |--------------------------------------------------------------------------
//         |
//         | Instance of Illuminate\Contracts\Cache\Repository
//         |
//         */
//        'repository'=> Illuminate\Contracts\Cache\Repository::class,
//
//        /*
//          |--------------------------------------------------------------------------
//          | Cache Clean Listener
//          |--------------------------------------------------------------------------
//          |
//          |
//          |
//          */
//        'clean'     => [
//
//            /*
//              |--------------------------------------------------------------------------
//              | Enable clear cache on repository changes
//              |--------------------------------------------------------------------------
//              |
//              */
//            'enabled' => true,
//
//            /*
//              |--------------------------------------------------------------------------
//              | Actions in Repository
//              |--------------------------------------------------------------------------
//              |
//              | create : Clear Cache on create Entry in repository
//              | update : Clear Cache on update Entry in repository
//              | delete : Clear Cache on delete Entry in repository
//              |
//              */
//            'on' => [
//                'create'=>true,
//                'update'=>true,
//                'delete'=>true,
//            ]
//        ],
//
//        'params'    => [
//            /*
//            |--------------------------------------------------------------------------
//            | Skip Cache Params
//            |--------------------------------------------------------------------------
//            |
//            |
//            | Ex: http://prettus.local/?search=lorem&skipCache=true
//            |
//            */
//            'skipCache'=>'skipCache'
//        ],
//
//        /*
//       |--------------------------------------------------------------------------
//       | Methods Allowed
//       |--------------------------------------------------------------------------
//       |
//       | methods cacheable : all, paginate, find, findByField, findWhere, getByCriteria
//       |
//       | Ex:
//       |
//       | 'only'  =>['all','paginate'],
//       |
//       | or
//       |
//       | 'except'  =>['find'],
//       */
//        'allowed'=>[
//            'only'  =>['all', 'paginate','find'],
//            'except'=>null
//        ]
//    ],
    'cache'=>[
        //Enable or disable cache repositories
        'enabled'   => false,

        //Lifetime of cache
        'minutes'   => 30,

        //Repository Cache, implementation Illuminate\Contracts\Cache\Repository
        'repository'=> 'cache',

        //Sets clearing the cache
        'clean'     => [
            //Enable, disable clearing the cache on changes
            'enabled' => true,

            'on' => [
                //Enable, disable clearing the cache when you create an item
                'create'=>true,

                //Enable, disable clearing the cache when upgrading an item
                'update'=>true,

                //Enable, disable clearing the cache when you delete an item
                'delete'=>true,
            ]
        ],
        'params' => [
            //Request parameter that will be used to bypass the cache repository
            'skipCache'=>'skipCache'
        ],
        'allowed'=>[
            //Allow caching only for some methods
            'only'  =>['all', 'paginate', 'find'],

            //Allow caching for all available methods, except
            'except'=>null
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Criteria Config
    |--------------------------------------------------------------------------
    |
    | Settings of request parameters names that will be used by Criteria
    |
    */
    'criteria'=>[
        /*
        |--------------------------------------------------------------------------
        | Accepted Conditions
        |--------------------------------------------------------------------------
        |
        | Conditions accepted in consultations where the Criteria
        |
        | Ex:
        |
        | 'acceptedConditions'=>['=','like']
        |
        | $query->where('foo','=','bar')
        | $query->where('foo','like','bar')
        |
        */
        'acceptedConditions'=>[
            '=','like'
        ],
        /*
        |--------------------------------------------------------------------------
        | Request Params
        |--------------------------------------------------------------------------
        |
        | Request parameters that will be used to filter the query in the repository
        |
        | Params :
        |
        | - search : Searched value
        |   Ex: http://prettus.local/?search=lorem
        |
        | - searchFields : Fields in which research should be carried out
        |   Ex:
        |    http://prettus.local/?search=lorem&searchFields=name;email
        |    http://prettus.local/?search=lorem&searchFields=name:like;email
        |    http://prettus.local/?search=lorem&searchFields=name:like
        |
        | - filter : Fields that must be returned to the response object
        |   Ex:
        |   http://prettus.local/?search=lorem&filter=id,name
        |
        | - orderBy : Order By
        |   Ex:
        |   http://prettus.local/?search=lorem&orderBy=id
        |
        | - sortedBy : Sort
        |   Ex:
        |   http://prettus.local/?search=lorem&orderBy=id&sortedBy=asc
        |   http://prettus.local/?search=lorem&orderBy=id&sortedBy=desc
        |
        */
        'params'=>[
            'search'        =>'q',
            'searchFields'  =>'searchFields',
            'filter'        =>'filter',
            'orderBy'       =>'orderBy',
            'sortedBy'      =>'sortedBy',
            'with'          =>'with'
        ]
    ],
    /*
    |--------------------------------------------------------------------------
    | Generator Config
    |--------------------------------------------------------------------------
    |
    */
    'generator'=>[
        'basePath'=>base_path('FBA'),
        'rootNamespace'=>'FBA\\',
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