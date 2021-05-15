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

    /*
    |--------------------------------------------------------------------------
    | GitHub 
    |--------------------------------------------------------------------------
    |
    | @link https://docs.github.com/en/developers/apps/scopes-for-oauth-apps#available-scopes
    |
    */
    
    'github' => [
        
        'client_id' => env('GITHUB_CLIENT_ID'),

        'client_secret' => env('GITHUB_CLIENT_SECRET'),

        'redirect' => env('GITHUB_CLIENT_REDIRECT'),

        'scopes' => [
            'read:user', // Grants access to read a user's profile data.
            'user:email', // Grants read access to a user's email addresses.
            'write:repo_hook', // Grants read, write, and ping access to hooks in public or private repositories.
            'repo', // Grants full access to repositories, including private repositories.
        ],

        'webhooks' => [

            'url' => env('GITHUB_WEBHOOK_CLIENT_URL'),

            'signing_secret' => env('GITHUB_WEBHOOK_CLIENT_SECRET')

        ]

    ],

];
