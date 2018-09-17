<?php
namespace src\app\Middleware;

use mukto90\Ncrypt;
use src\app\Models\User as Users;
use src\config\Api_Controller;

class JAuth extends Api_Controller
{

    public function __construct()
    {
        $this->ncrypt = new Ncrypt();
        $this->ncrypt->set_secret_key($this->env['oauth_secret_key']);
        $this->ncrypt->set_secret_iv($this->env['oauth_secret_iv']);
        $this->ncrypt->set_cipher('AES-256-CBC'); //optional

    }

    public function __invoke($request, $response, $next) //calling middle ware

    {
        ($this->key_check()) ? '' : die($this->key_failed());
        $response = $next($request, $response);
        //after
        return $response;
    }
    public function key_check()
    {
       //code

    }

    public function key_failed()
    {
        $output = array(
            "status" => false,
            "data" => array(),
            "message" => "access token failed",

        );
        return $this->response->withJson($output)->withStatus(401);

    }
}
