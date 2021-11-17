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
    'user'      => [
        'model'     => App\Models\User::class,
        'slug'      => 'user',
        'table'     => [
            'name'          => env('CUSTOM_USER_USERS_DATABASE_TABLE', 'users'),
            'primary_key'   => env('CUSTOM_USER_USERS_DATABASE_TABLE_PRIMARY_KEY', 'id'),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Bunch of features or options to enable or disable.
    |--------------------------------------------------------------------------
    */

    'enabled'   => [

        
    ],

    /*
    |--------------------------------------------------------------------------
    | Attributes or columns you can add to customize your users table
    |--------------------------------------------------------------------------
    */

    'attributes'    => [
        /**
         * Important attributes that can almostly required
         */

        'first_name'    => [
            'enabled'   => true,
        ],

        'phone_number'  => [
            'enabled'   => true,
        ],

        /**
         * Extra attributes which are optional
         */

        'extra'         => [

            'gender'    => [
                'enabled'   => true,
                'name'      => 'gender',
                'type'      => 'string'
            ],

            'agree_with_policy_and_terms'    => [
                'enabled'   => true,
                'name'      => 'has_agreed_with_policy_and_terms_at',
                'type'      => 'timestamp'
            ],

            'last_login'    => [
                'enabled'   => true,
                'name'      => 'last_login_at',
                'type'      => 'string'
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Add uuid support
    |--------------------------------------------------------------------------
    */

    'uuids'     => [
        'enabled'   => true,
        'column'    => '_id'
    ],
];