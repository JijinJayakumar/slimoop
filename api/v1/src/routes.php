<?php

$app->any('/', function ($request, $response, $args) { //Default route method , of slim
    $name = (isset($args['name'])) ? $args['name'] : " Bot";
    $response->getBody()->write("<font size='100'>Welcome to Slim OOP v 0.1 😉😇</font>");
    return $response;
});


   //method         //url       class:Functionaname
$app->get('/users', 'User:getAllUsers');  
$app->get('/users/{id}', 'User:viewSingle');

