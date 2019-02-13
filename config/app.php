<?php
return [
    'providers' => [
        \App\Providers\AppServiceProvider::class,
        \App\Providers\LogServiceProvider::class,
    ],

    'log' => [
        'channel' => 'cli',
        'file' => BASE_DIR . '/cli.log',
        'level' => \Monolog\Logger::DEBUG
    ]
];