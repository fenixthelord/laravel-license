<?php
return [
    'route_prefix' => 'api/auth',
    'models' => [
        'user' => \App\Models\User::class
    ],
    'token_expiration' => 3600 * 24 * 30, // 30 days
];