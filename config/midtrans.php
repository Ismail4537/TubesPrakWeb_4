<?php

return [
    'server_key' => env('MIDTRANS_SERVER_KEY'),
    'client_key' => env('MIDTRANS_CLIENT_KEY'),
    'is_production' => env('MIDTRANS_IS_PRODUCTION', false),
    'snap_base_url' => env('MIDTRANS_IS_PRODUCTION', false)
        ? 'https://app.midtrans.com/snap/v1/'
        : 'https://app.sandbox.midtrans.com/snap/v1/',
    'core_api_base_url' => env('MIDTRANS_IS_PRODUCTION', false)
        ? 'https://api.midtrans.com/v2/'
        : 'https://api.sandbox.midtrans.com/v2/',
];
