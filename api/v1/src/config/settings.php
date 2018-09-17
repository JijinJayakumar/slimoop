<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to true in production
        'addContentLengthHeader' => false,
        'determineRouteBeforeAppMiddleware' => true,
        "db" => [
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'slimoop',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ],
    ],

]

?>
