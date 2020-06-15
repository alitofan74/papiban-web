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
    'firebase' => [
        'database_url' => env('FIREBASE_DATABASE_URL', ''),
        'project_id' => env('FIREBASE_PROJECT_ID', ''),
        'private_key_id' => env('FIREBASE_PRIVATE_KEY_ID', 'your-key'),
        // replacement needed to get a multiline private key from .env 
        'private_key' => str_replace("\\n", "\n", env('FIREBASE_PRIVATE_KEY', '')),
        'client_email' => env('FIREBASE_CLIENT_EMAIL', 'e@email.com'),
        'client_id' => env('FIREBASE_CLIENT_ID', ''),
        'client_x509_cert_url' => env('FIREBASE_CLIENT_x509_CERT_URL', ''),

        'api_key' => 'AIzaSyAYtZkvDCJAyfGgR_8aj-BrlBUfZ98o90c', // Only used for JS integration
        'auth_domain' => 'intro-2b6f3.firebaseapp.com', // Only used for JS integration
        'database_url' => 'https://intro-2b6f3.firebaseio.com',
        'storage_bucket' => 'intro-2b6f3.appspot.com', // Only used for JS integration
        'appId' => '1:893093757854:web:5bc406debf41ee71818c8f',
        'messagingSenderId'=> '893093757854',
        'project_id'=>'intro-2b6f3',
    ]

];
