<?php

$container = $app->getContainer();
///////////////// DEFAULT VALUES STARTS HERE ///////////////////

$container['db'] = function ($container) { //configuring DB FOR ELOQUENT, in setings s
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($container['settings']['db']);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();
    return $capsule;
};

$container['profile_pic_upload'] = "../uploads/";

$container['logger'] = function ($c) {
    $logger = new \Monolog\Logger('JJ_Logger');
    $file_handler = new \Monolog\Handler\StreamHandler('../logs/' . date('Y/m/d-m-Y') . '.log');
    $file_handler->setFormatter(new Monolog\Formatter\HtmlFormatter());
    $logger->pushHandler($file_handler);
    return $logger;
};

$container['view'] = function ($container) { //implimenting TWIg layout to view pages
    $view = new \Slim\Views\Twig('src/app/views', [
        'cache' => false,
    ]);
    $basePath = rtrim(str_ireplace('index.php', '', $container->get('request')->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container->get('router'), $basePath));

    return $view;
};

$container['notFoundHandler'] = function ($c) { //Custom 404 ,
    return function ($request, $response) use ($c) {
        $data = array("message" => "404  The item does not exist 🚕");
        return $c['response']->withStatus(404)->withHeader('Content-Type', 'application/json')->withJson($data);
    };
};

// $container['JAuth'] = function ($container) { //Middleware
//     return new src\app\Middleware\JAuth($container);
// };

///////////////// DEFAULT VALUES ENDS HERE ///////////////////

///////////////////// Custom classes STARTS here /////////////////
//its shouldn't  be here, but ....  ,


$container['User'] = function ($container) {
    return new v1\src\app\Controllers\User($container);
};
$container['Wallet'] = function ($container) {
    return new v1\src\app\Controllers\Wallet($container);
};
$container['Email'] = function ($container) {
    return new v1\src\app\Controllers\Email($container);
};
