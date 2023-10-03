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
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'adsense' => [
        'enabled' => env('ADSENSE_ENABLED', false),
    ],

    'convertkit' => [
        'api_key' => env('CONVERTKIT_API_KEY'),
        'api_secret' => env('CONVERTKIT_API_SECRET'),
        'form_id' => env('CONVERTKIT_FORM_ID'),
        'main_tag_id' => env('CONVERTKIT_MAIN_TAG_ID'),
    ],

    'lemonsqueezy' => [
        'sponsored_content' => env('SPONSORED_CONTENT_CHECKOUT_LINK'),
        'sponsorships' => [
            'monthly' => env('MONTHLY_SPONSORSHIP_CHECKOUT_LINK'),
            'yearly' => env('YEARLY_SPONSORSHIP_CHECKOUT_LINK'),
        ],
    ],

    'pirsch' => [
        'access_key' => env('PIRSCH_ACCESS_KEY'),
        'client_id' => env('PIRSCH_CLIENT_ID'),
        'client_secret' => env('PIRSCH_CLIENT_SECRET'),
        'domain_id' => env('PIRSCH_DOMAIN_ID'),
    ],

    'openai' => [
        'api_key' => env('OPENAI_API_KEY'),
    ],
];
