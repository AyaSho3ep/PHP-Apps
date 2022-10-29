<?php
namespace App\Mail;

use App\Mail\Contract\Mail;
use PHPMailer\PHPMailer\Exception;

class VerificationCode extends Mail {
    
    public function send() :bool
    {
        try{
            $this->mail->setFrom('e_commerec@g.com', 'E_commerce');
            $this->mail->addAddress($this->mailTo);
            $this->mail->isHTML(true);
            $this->mail->Subject = $this->subject;
            $this->mail->Body = $this->body;
            $this->mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
        
    }
}
