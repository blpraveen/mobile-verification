<?php

return [

    /*
     |--------------------------------------------------------------------------
     | Default User Table Name
     |--------------------------------------------------------------------------
     |
     | Here you should specify name of your users table in database.
     |
     */
    'user_table' => 'users',


    /*
    |--------------------------------------------------------------------------
    | Default Controller Namespace
    |--------------------------------------------------------------------------
    |
    | This is the namespace of default controller. Feel free
    | to change this namespace to anything you like.
    */
    'controller_namespace' => 'Blpraveen\MobileVerification\Http\Controllers',

    /*
    |--------------------------------------------------------------------------
    | Routes Prefix
    |--------------------------------------------------------------------------
    |
    | This is the routes prefix where Mobile-Verifier controller will be accessible from. Feel free
    | to change this path to anything you like.
    |
    */
    'routes_prefix' => 'auth',

    /*
     |--------------------------------------------------------------------------
     | Controller Routes
     |--------------------------------------------------------------------------
     |
     | Here you can specify your desired routes for verify and resend actions.
     |
     */
    'routes' => [
        'verify' => '/phone/verify',
        'resend' => '/phone/resend',
    ],

    /*
     |--------------------------------------------------------------------------
     | Throttle
     |--------------------------------------------------------------------------
     |
     | Here you can specify throttle for verify/resend routes
     |
     */
    'throttle' => 10,

    /*
     |--------------------------------------------------------------------------
     | Middleware
     |--------------------------------------------------------------------------
     |
     | Here you can specify which middleware you want to use for the APIs
     | For example: 'web', 'auth', 'auth:api'
     |
     */
    'middleware' => ['web', 'auth'],
];
