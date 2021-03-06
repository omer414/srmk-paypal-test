<?php
/**
 * PayPal Setting & API Credentials
 * Created by Raza Mehdi <srmk@outlook.com>
 */

return [
    'mode' => 'sandbox', // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
    'sandbox' => [
        'username' => env('PAYPAL_SANDBOX_API_USERNAME', 'warlox414-merchant_api1.gmail.com'),
        'password' => env('PAYPAL_SANDBOX_API_PASSWORD', 'Z9VFDKJA2FJQ5DZW'),
        'secret' => env('PAYPAL_SANDBOX_API_SECRET', 'ALGGHNwYi1b3f.SAFEBGIVyGMKAwAxeOTUcB8qI8ZeSPXiP02XSlsQtG'),
        'certificate' => env('PAYPAL_SANDBOX_API_CERTIFICATE', storage_path('cert_key_pem.txt')), // link to paypal's pem file
        //'app_id' => 'APP-80W284485P519543T',    // Used for testing Adaptive Payments API in sandbox mode
    ],
    'live' => [
        'username' => env('PAYPAL_LIVE_API_USERNAME', ''),
        'password' => env('PAYPAL_LIVE_API_PASSWORD', ''),
        'secret' => env('PAYPAL_LIVE_API_SECRET', ''),
        'certificate' => env('PAYPAL_LIVE_API_CERTIFICATE', ''),        
        //'app_id' => '',         // Used for Adaptive Payments API
    ],

    'payment_action' => 'Sale', // Can Only Be 'Sale', 'Authorization', 'Order'
    'currency' => 'USD',
    'notify_url' => 'http://phpstack-15617-53267-142418.cloudwaysapps.com/payment/notify', // Change this accordingly for your application.
];
