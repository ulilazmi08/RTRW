<?php

return [
    'secret' => env('NOCAPTCHA_SECRET'),
    'sitekey' => env('NOCAPTCHA_SITEKEY'),
    'hl' => 'id',
    'options' => [
        'timeout' => 30,
    ],
];
