<?php

return [

    'method' => env('AUTH_METHOD', 'standard'),

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => env('AUTH_METHOD', 'standard') === 'standard' ? 'eloquent' : env('AUTH_METHOD'),
            'model' => BookStack\User::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'email' => 'emails.password',
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ],

];