<?php
return [
    'disable' => env('CAPTCHA_DISABLE', false),
    'characters' => '23456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
    
    'default' => [
        'length' => 5,
        'width' => 150, // Increased width for clarity
        'height' => 50, // Increased height for better readability
        'quality' => 100, // Maximum quality for better clarity
        'math' => true, // Math disabled for default CAPTCHA
        'expire' => 60,
        'type' => 'alphanumeric',
    ],
    
    'math' => [
        'length' => 7, // Adjust length as needed for clarity
        'width' => 150, // Same width as default
        'height' => 50, // Same height as default
        'quality' => 100, // Maximum quality for clarity
        'math' => true, // Math CAPTCHA enabled
        'type' => 'flat',
    ],
    
    'CAPTCHA_TYPE' => env('MATH_ENABLE', 0),
    
    'fonts' => [public_path('font/Roboto-Regular.ttf')],
];
