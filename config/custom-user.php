<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    /**
     * Default password to register when password is not setted or provided
     */

    'default_password'  => 'password',

    /**
     * User configuration
     */
    'user'  => [
        'model'     => App\Models\User::class,
        'slug'      => 'user',
        'table'     => [
            'name'          => env('CUSTOM_USER_USERS_DATABASE_TABLE', 'users'),
            'primary_key'   => env('CUSTOM_USER_USERS_DATABASE_TABLE_PRIMARY_KEY', 'id'),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Add uuid support
    |--------------------------------------------------------------------------
    */

    'uuids' => [
        'enabled'   => true,
        'column'    => '_id'
    ],
];