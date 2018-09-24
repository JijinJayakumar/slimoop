<?php
use v1\src\app\Middleware as Middleware;

// use v1\src\app\models as models;
// use v1\src\app\Helpers as Helpers;
// use v1\src\config as config;
// use v1\src\app\Controllers as Controllers;
use \Psr\Http\Message\ServerRequestInterface as Request;
require '../vendor/autoload.php';
date_default_timezone_set('Asia/Kolkata'); //Africa/Lagos

$settings = require 'src/config/settings.php';
$app = new \Slim\App($settings);
require '../jfunctions.php'; //example for cretaing global functionss
require 'src/dependencies.php';
require 'src/config/Environment.php';

$amw = new Middleware\JAuth(); //not requierd, can remove this , and from includes

require 'src/routes.php';

$app->run();

/*important , u need to include class folders in composer.json and

composer dumpautoload
 */
