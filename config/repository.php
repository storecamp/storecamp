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
        'limit'=>10,
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
            'include'=>'include',
        ],
        'serializer' => League\Fractal\Serializer\JsonApiSerializer::class,
    ],

    'cache'=>[
        //Enable or disable cache repositories
        'enabled'   => false,

        //Lifetime of cache
        'minutes'   => 30,

        //Repository Cache, implementation Illuminate\Contracts\Cache\Repository
        'repository'=> Illuminate\Contracts\Cache\Repository::class,

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
            ],
        ],
        'params' => [
            //Request parameter that will be used to bypass the cache repository
            'skipCache'=>'skipCache',
        ],
        'allowed'=>[
            //Allow caching only for some methods
            'only'  =>['all', 'paginate', 'find'],

            //Allow caching for all available methods, except
            'except'=>null,
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
            '=', 'like',
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
        |   Ex: http://dev.local/?search=lorem
        |
        | - searchFields : Fields in which research should be carried out
        |   Ex:
        |    http://dev.local/?search=lorem&searchFields=name;email
        |    http://dev.local/?search=lorem&searchFields=name:like;email
        |    http://dev.local/?search=lorem&searchFields=name:like
        |
        | - filter : Fields that must be returned to the response object
        |   Ex:
        |   http://dev.local/?search=lorem&filter=id,name
        |
        | - orderBy : Order By
        |   Ex:
        |   http://dev.local/?search=lorem&orderBy=id
        |
        | - sortedBy : Sort
        |   Ex:
        |   http://dev.local/?search=lorem&orderBy=id&sortedBy=asc
        |   http://dev.local/?search=lorem&orderBy=id&sortedBy=desc
        |
        */
        'params'=>[
            'search'        =>'search',
            'searchFields'  =>'searchFields',
            'filter'        =>'filter',
            'orderBy'       =>'orderBy',
            'sortedBy'      =>'sortedBy',
            'with'          =>'with',
        ],
    ],
];
