<?php

/**
 * This file is part of Access,
 * a role & permission management solution for Laravel.
 *
 * @license MIT
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Access Role Model
    |--------------------------------------------------------------------------
    |
    | This is the Role model used by Access to create correct relations.  Update
    | the role if it is in a different namespace.
    |
    */
    'role' => 'App\Role',

    /*
    |--------------------------------------------------------------------------
    | Access Roles Table
    |--------------------------------------------------------------------------
    |
    | This is the roles table used by Access to save roles to the database.
    |
    */
    'roles_table' => 'roles',

    /*
    |--------------------------------------------------------------------------
    | Access Permission Model
    |--------------------------------------------------------------------------
    |
    | This is the Permission model used by Access to create correct relations.
    | Update the permission if it is in a different namespace.
    |
    */
    'permission' => 'App\Permission',

    /*
    |--------------------------------------------------------------------------
    | Access Permissions Table
    |--------------------------------------------------------------------------
    |
    | This is the permissions table used by Access to save permissions to the
    | database.
    |
    */
    'permissions_table' => 'permissions',

    /*
    |--------------------------------------------------------------------------
    | Access permission_role Table
    |--------------------------------------------------------------------------
    |
    | This is the permission_role table used by Access to save relationship
    | between permissions and roles to the database.
    |
    */
    'permission_role_table' => 'permission_role',

    /*
    |--------------------------------------------------------------------------
    | Access role_user Table
    |--------------------------------------------------------------------------
    |
    | This is the role_user table used by Access to save assigned roles to the
    | database.
    |
    */
    'role_user_table' => 'role_customer',

];
