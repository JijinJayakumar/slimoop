<?php
namespace v1\src\app\Controllers;

use v1\src\config\Api_Controller;
use v1\src\config\Mail_Controller;


class Email extends Api_Controller
{
     public function __construct($app)
    {
        parent::__construct();
       $this->email=new Mail_Controller();

    }

    public function support_email()
    {

        $userid = $this->input['userid'];
        $subject = $this->input['subject'];
        $from = $this->input['from'];
        $message = $this->input['message'];
        $useremail = "jijin.......@gmail.com";
        $maildata = array(
            "to" => $useremail,
            'subject' => $from . ' - ' . $subject,
            'view_page' => 'emails/support_email.html',
            'view_data' => array(
                'email' => $useremail,
                'message' => $message,
            ),
        );

        if ($this->email->send_mail($maildata)) {
            $output = array(
                "status" => true,
                "message" => "Support sent successfully",
            );

        } else {
            $output = array(
                "status" => false,
                "message" => "An error occured while sending the email",
            );

        }
        return $this->response->withJson($output);

    }
}
