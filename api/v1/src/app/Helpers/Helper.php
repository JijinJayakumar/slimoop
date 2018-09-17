<?php
namespace src\app\Helpers;

use src\app\Models\User as Users;

class Helper
{

    public function __construct($app)
    {
        // parent::__construct();

    }

    public static function get_email($userid)
    {

        return Users::select('w_amount')->where('w_user_id', $userid)->first();

    }

    public static function get_user($userid)
    {

        return Users::select("*")->where('u_id', $userid)->first();

    }

}
