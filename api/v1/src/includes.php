<?php

//Models
require 'src/app/Models/User.php';

require 'src/app/Models/Wallet.php';

//Helpers
require 'src/app/Helpers/HWallet.php';
require 'src/app/Helpers/Helper.php';

//Controllers
require 'src/config/Api_Controller.php';
require 'src/config/Mail_Controller.php';


//user Controllers
require 'src/app/Controllers/User.php';
require 'src/app/Controllers/Wallet.php';
require 'src/app/Controllers/Email.php';


//spl_autoload will trigger error , will update soon
//middle
require 'src/app/Middleware/JAuth.php'; //
