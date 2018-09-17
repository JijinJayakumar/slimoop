<?php
namespace src\config;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use src\config\Api_Controller;

class Mail_Controller extends Api_Controller {
    private $sender_email;
    private $sender_email_password;
    
    public function __construct() {
       
        $this->sender_email          = "jjiji.....@gmail.com";
        $this->sender_email_password = '************';
        $this->sender_host           = 'smtp.gmail.com';
        $this->sender_port           = '587';
        $this->sender_name           = 'Mail test user';
        parent::__construct();
        
    }
    public function send_mail($details = array()) {
        $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host       = $this->sender_host;
            $mail->SMTPAuth   = true;
            $mail->Username   = $this->sender_email;
            $mail->Password   = $this->sender_email_password;
            $mail->SMTPSecure = 'tls';
            $mail->Port       = $this->sender_port;
            $mail->setFrom($this->sender_email, $this->sender_name);
            $mail->addAddress($details['to']);
            // $mail->addReplyTo($this->sender_email, 'Information');
            $mail->isHTML(true);
            $mail->Subject = $details['subject'];
            $mail->Body    = $this->app->view->fetch($details['view_page'], $details['view_data']);
            $mail->send();
            return TRUE;
        }
        catch (Exception $e) {
            // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            return FALSE;
        }
    }
}
?>