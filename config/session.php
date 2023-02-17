<?php

use Illuminate\Support\Str;
return [
    'driver' => env('SESSION_DRIVER', 'file'),
    'lifetime' => env('SESSION_LIFETIME', 120),
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => storage_path('framework/sessions'),
    'connection' => env('SESSION_CONNECTION', null),
    'table' => 'sessions',
    'store' => env('SESSION_STORE', null),
    'lottery' => [2, 100],
    'cookie' => env(
        'SESSION_COOKIE',
        'laravel_session'
    ),
    'path' => '/',
    'domain' => env('SESSION_DOMAIN', null),
    'secure' => env('SESSION_SECURE_COOKIE'),
    'http_only' => true,
    'same_site' => 'lax',
    'drivers' => [
        'admin' => [
            'driver' => 'file',
            'lifetime' => 120,
            'expire_on_close' => false,
            'encrypt' => false,
            'files' => storage_path('framework/sessions/admin'),
            'connection' => null,
            'table' => 'sessions',
            'store' => null,
            'lottery' => [2, 100],
            'cookie' => env(
                'ADMIN_SESSION_COOKIE',
                'laravel_admin_session'
            ),
            'path' => '/admin',
            'domain' => 'shop_system.com',
            'secure' => env('ADMIN_SESSION_SECURE_COOKIE'),
            'http_only' => true,
            'same_site' => 'lax',
        ],
        'web' => [
            'driver' => 'file',
            'lifetime' => 120,
            'expire_on_close' => false,
            'encrypt' => false,
            'files' => storage_path('framework/sessions/web'),
            'connection' => null,
            'table' => 'sessions',
            'store' => null,
            'lottery' => [2, 100],
            'cookie' => env(
                'WEB_SESSION_COOKIE',
                'laravel_web_session'
            ),
            'path' => '/',
            'domain' => 'shop_system.com',
            'secure' => env('WEB_SESSION_SECURE_COOKIE'),
            'http_only' => true,
            'same_site' => 'lax',
        ],
    ],
];
