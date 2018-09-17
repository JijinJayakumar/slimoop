<?php
namespace src\config;

class Api_Controller
{
    public $app, $db, $request, $response, $logger, $env;

    public function __construct()
    {
        global $app;
        $this->slim = $app;
        $this->app = $app->getContainer();
        // $this->args=$app->args();
        $this->db = $this->app['db'];
        $this->request = $this->app['request'];
        $this->response = $this->app['response'];
        $this->logger = $this->app['logger'];
        $this->view = $this->app['view'];
        $this->uri = $this->request->getUri();
        $this->input = $this->request->getParsedBody();
        $this->env = $this->app['environment'];
        $this->self = $this->uri->getBaseUrl() . "" . $this->uri->getBasePath() . "/" . $this->uri->getPath();
        $this->pdo = new \Slim\PDO\Database(DB_DSN, DB_USER, DB_PASSWORD); //PDO CONFIGRATION 


    }

}
