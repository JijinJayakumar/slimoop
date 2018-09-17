<?php
namespace src\app\Helpers;

use src\app\Models\Wallet;

class HWallet
{

    public function __construct($app)
    {
        // parent::__construct();

    }

    public static function balance($userid)
    {

        $walletBalance = Wallet::select('w_amount as balance')->where('w_user_id', $userid)->first();

        return $walletBalance;

    }

}
