<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id'     => '309269612844696',
        'client_secret' => 'c577748cd2eedf8a85755c8f927e2a9a',
        'redirect'      => 'http://localhost/shop/callback',
    ],

    'google' => [
        'client_id'     => '954350328779-3ek9ab8j9nr78i9qap6302oqae2b9ckh.apps.googleusercontent.com',
        'client_secret' => 'T4IkJIMcCzZX-d7c3KZjWfcE',
        'redirect'      => 'http://localhost/shop/callback/google',
    ],

];
