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

    'google' => [
        'client_id' => '968475026403-koejreauji5pdfpqvv4vc93o79584l9r.apps.googleusercontent.com',
        'client_secret' => '4bPx00QD4g8HaLMVPzaFe5zs',
        'redirect' => 'http://localhost:8000/callback/google',
    ],
    'facebook' => [
        'client_id' => '129176942572264',
        'client_secret' => '80db1860ba1f4a3cac9671cacff5b694',
        'redirect' => 'http://localhost:8000/callback/facebook',
    ],

];
