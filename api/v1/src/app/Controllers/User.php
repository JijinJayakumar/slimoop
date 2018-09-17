<?php
namespace src\app\Controllers;

use Slim\Http\UploadedFile;
use src\app\Models\User as Users;
use src\config\Api_Controller;

class User extends Api_Controller
{

    public function __construct($app)
    {
        parent::__construct();

    }

    public function getAllUsers()
    {
        $users = Users::all('u_id', 'u_first_name', 'u_email');
        return $this->response->withJson($users);

    }

     public function viewSingle($request, $response, $args) //to access arguments in url
    {
        $userId=$args['id']; //from url 
        $users = Users::all('u_id', 'u_first_name', 'u_email')->where('u_id',$userId);
        return $this->response->withJson($users);

    }
    

    public function fileUploadSample()
    {
        $dir = $this->app->get('profile_pic_upload'); //accessing env variable, u can give direct folder also 

        $uploadedFiles = $this->request->getUploadedFiles();

        if (isset($uploadedFiles['image'])) {

            $uploadedFile = $uploadedFiles['image'];

            if ($uploadedFile->getError() === UPLOAD_ERR_OK) {

                $filename = $this->moveUploadedFile($dir, $uploadedFile);

            } else {

                $filename = "";

            }

        } else {

            $filename = "";

        }

        $output = array("status" => $filename);

        return $this->response->withJson($output);

    }

    public function moveUploadedFile($directory, UploadedFile $uploadedFile) //Helper function , use this to upload files , no need to add or change anything 

    {
        $extension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);
        $basename = bin2hex(random_bytes(8)); // see http://php.net/manual/en/function.random-bytes.php
        $filename = sprintf('%s.%0.8s', $basename, $extension);

        $uploadedFile->moveTo($directory . DIRECTORY_SEPARATOR . $filename);

        return $filename;
    }

}
