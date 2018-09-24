<?php
namespace v1\src\config;

/**
 * @developer you can create as much own environment variables here
 */
//call after dependecy.php
$env = $container['environment'];
$re = $container['request'];

//app details
$env['app_name'] = 'Slim OOP Sample App';
$env['app_url'] = $re->getUri()->getBaseUrl();
$env['app_version'] = 'v1';
$env['app_versions'] = ['v0.1', 'v0.2', 'v1'];
$env['app_c_version_url'] = $env['app_url'] . "/" . $env['app_version'];

$env['app_url_live'] = "http://localhost/slimoop";

$env['oauth_secret_key'] = 'jj^&';
$env['oauth_secret_iv'] = '&^*alliswell#$^*';

//for PDO CONNECTION
if ($_SERVER['HTTP_HOST'] == '127.0.0.1' || $_SERVER['HTTP_HOST'] == 'localhost') {
    define("DB_DSN", 'mysql:host=localhost;dbname=slimoop;charset=utf8');
    define("DB_USER", 'root');
    define("DB_PASSWORD", '');
} else {

    define("DB_DSN", 'mysql:host=samplehost;dbname=slimoop;charset=utf8');
    define("DB_USER", 'sampleuser');
    define("DB_PASSWORD", 'sample#123');
}

$env['google_map_api'] = 'YOUR API KEYS';
