<?php

return [
    'user' => [
        'model' => 'App\User',
    ],
    'broadcast' => [
        'enable' => true,
        'app_name' => 'Medicall-development',
        'pusher' => [
            'app_id'        => env('PUSHER_APP_ID'),
            'app_key'       => env('PUSHER_APP_KEY'),
            'app_secret'    => env('PUSHER_APP_SECRET')
        ],
    ],
];
