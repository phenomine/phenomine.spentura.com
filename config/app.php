<?php

return [
    'name' => env('APP_NAME', 'Phenomine'),
    'env' => env('APP_ENV', 'local'),
    'url' => env('APP_URL', 'http://localhost:8000'),

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is utilized by Laravel's encryption services and should be set
    | to a random, 32 character string to ensure that all encrypted values
    | are secure. You should do this prior to deploying the application.
    |
    */

    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY'),

    /*
     *
     */
    'page_router' => env('PAGE_ROUTER', true),
    'use_htmx' => env('USE_HTMX', true),

    'tailwindcss' => [
        'source' => 'res/css/app.css',
        'output' => 'public/build/css/app.css',
    ],

    'csrf' => [
        'enabled' => true,
        'except' => [
            '/api*'
        ]
    ]
];
