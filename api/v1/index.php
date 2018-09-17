<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
require '../vendor/autoload.php';
date_default_timezone_set('Asia/Kolkata'); //Africa/Lagos

$settings = require 'src/config/settings.php';
$app = new \Slim\App($settings);
require '../jfunctions.php'; //example for cretaing global functionss
require 'src/includes.php'; //load all model and controllers
require 'src/dependencies.php';
require 'src/config/Environment.php';
$amw = new src\app\Middleware\JAuth(); //not requierd, can remove this , and from includes

require 'src/routes.php';

$app->run();
