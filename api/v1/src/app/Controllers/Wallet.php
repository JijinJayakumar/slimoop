<?php
namespace src\app\Controllers;

use src\app\Helpers\HWallet;
use src\config\Api_Controller;

class Wallet extends Api_Controller
{

    public function view_balance($request, $response, $args) //to access parameters via URI

    {
        $user = $args['id'];

        $balance = HWallet::balance($user); //calling helper class, can use model also

        if (!empty($balance)) {

            $wallets['wallet_balance'] = (float) $balance['balance'];
        } else {
            $wallets['wallet_balance'] = 0;

        }

        return $this->response->withJson($wallets); 
    }

}
