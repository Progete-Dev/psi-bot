<?php

return [
    'google' => [
        'api_key'       => env('GOOGLE_API_KEY'),
        'client_id'     => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect_uri'  => env('APP_URL') . env('GOOGLE_REDIRECT_URI'),
        'redirect_uri_wizard'  => env('APP_URL') . env('GOOGLE_REDIRECT_URI_WIZARD',  '/team/setup'),
    ]
];
