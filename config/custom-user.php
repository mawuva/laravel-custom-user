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
    ],
];