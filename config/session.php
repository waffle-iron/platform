<?php

return [

    /*
    |
    | Supported: "file", "cookie", "database", "apc",
    |            "memcached", "redis", "array"
    |
    */

    'driver' => env('SESSION_DRIVER', 'database'),

    'lifetime' => 2000000,

    'expire_on_close' => false,

    'encrypt' => false,

    'files' => storage_path('framework/sessions'),

    'connection' => null,

    'table' => 'sessions',

    'lottery' => [2, 100],

    'cookie' => 'laravel_session',

    'path' => '/',

    'domain' => null,

    'secure' => true,

];
