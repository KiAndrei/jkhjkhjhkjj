<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Application Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register all of the routes for an application.
    | It is a breeze. Simply tell Laravel the URIs it should respond to
    | and give it the controller to call when that URI is requested.
    |
    */

    'api' => [
        'prefix' => 'api',
        'middleware' => ['api'],
        'namespace' => 'App\Http\Controllers\Api',
    ],

    'web' => [
        'middleware' => ['web'],
        'namespace' => 'App\Http\Controllers',
    ],
]; 