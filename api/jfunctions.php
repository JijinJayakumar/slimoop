<?php

//Just use any functions inside class as normal functions :) 
function time_now()
{
    return date("Y-m-d H:i:s");
}


function converToTz($time = "", $toTz = '', $fromTz = 'UTC')
{
    $date = new DateTime($time, new DateTimeZone($fromTz));
    $date->setTimezone(new DateTimeZone($toTz));
    $time = $date->format('Y-m-d H:i:s');
    return $time;
}

function base_url($param = '')
{
    global $app;
    $c = $app->getContainer();
    $request = $c['request'];
    return ($request->getUri()->getBaseUrl() . "" . $param);
}

function randomPassword($length = 8)
{
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array();
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < $length; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass);
}
