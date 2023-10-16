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

    'lemonsqueezy' => [
        'job_offer' => env('LEMONSQUEEZY_JOB_OFFER_CHECKOUT_LINK'),
        'sponsored_content' => env('LEMONSQUEEZY_SPONSORED_CONTENT_CHECKOUT_LINK'),
        'sponsorships' => [
            'monthly' => env('LEMONSQUEEZY_MONTHLY_SPONSORSHIP_CHECKOUT_LINK'),
            'yearly' => env('LEMONSQUEEZY_YEARLY_SPONSORSHIP_CHECKOUT_LINK'),
            'one_time' => env('LEMONSQUEEZY_MONTHLY_ONE_TIME_SPONSORSHIP_CHECKOUT_LINK'),
            'monthly_superhero' => env('LEMONSQUEEZY_MONTHLY_SUPERHERO_SPONSORSHIP_CHECKOUT_LINK'),
            'monthly_demigod' => env('LEMONSQUEEZY_MONTHLY_DEMIGOD_SPONSORSHIP_CHECKOUT_LINK'),
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
