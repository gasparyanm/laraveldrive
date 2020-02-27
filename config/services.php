<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, SparkPost and others. This file provides a sane default
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

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'google' => [
        'driver' => 'google',
        'client_id' => env('GOOGLE_DRIVE_CLIENT_ID', '333618473160-06tg1a3arr61p5vu83nfsr32vodbdr0u.apps.googleusercontent.com'),
        'client_secret' => env('GOOGLE_DRIVE_CLIENT_SECRET', 'X4sxgqkQdFUNfdm2-d0pb3Ps'),
        'refreshToken' => env('GOOGLE_DRIVE_REFRESH_TOKEN', '1//041ThZAevFK41CgYIARAAGAQSNwF-L9IrA64Bx1g50ypBBa2EFxjahXf6tIiuoubCEpdaJ0PEdVIiV7eVUN-VR5xjho5F3MtoMpI'),
        'folderId' => env('GOOGLE_DRIVE_FOLDER_ID', '1BkUpPrm6VDcvnp_cBULL0a2oKyT3JtFc'),
        'project_id' => env('GOOGLE_APP_ID', 'laraveldrive-269217'),
        'auth_uri' => 'https://accounts.google.com/o/oauth2/auth',
        'token_uri' => 'https://accounts.google.com/o/oauth2/token',
        'auth_provider_x509_cert_url' => 'https://www.googleapis.com/oauth2/v1/certs',
        'redirect' => env('GOOGLE_REDIRECT'),
    ],

];
