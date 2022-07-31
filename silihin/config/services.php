<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    // 'google' => [
    //     'client_id'     => env('GOOGLE_ID', '510836180007-jsfpmqanltmp8kr5rjibe1k3v1tbo7h1.apps.googleusercontent.com'),
    //     'client_secret' => env('GOOGLE_SECRET', '0BOe7AsiXr5tedgbKf2g_wJO'),
    //     'redirect'      => env('GOOGLE_URL', 'http://silihin.co.vu/auth/google/callback'),
    // ],

    'google' => [
        'client_id'     => env('GOOGLE_ID', '510836180007-255gactlsrvnlfjih36op1if4ijdomkj.apps.googleusercontent.com'),
        'client_secret' => env('GOOGLE_SECRET', 'NryGCPlVseDRQikWwL4nV9XK'),
        'redirect'      => env('GOOGLE_URL', 'http://127.0.0.1:8000/auth/google/callback'),
    ],

    'twilio' => [
        'sid' => 'AC9cbc525487bdcdb2bd96f29efe8f31fb',
        'token' => '768790ab9a106988d5abaf3bb71f59ab',
        'whatsapp_from' => '083862169726'
    ],

];
