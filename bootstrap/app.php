<?php

session_start();

require __DIR__ . '/../vendor/autoload.php';



$app = new \Slim\App([

    'settings' => [
        'displayErrorDetails' => TRUE,
    ]
        ]);

$app->get('/', function($request, $response) {

    echo "Welcome to Slim 3.0 based API";
});

require __DIR__ .'/../app/routes.php';
