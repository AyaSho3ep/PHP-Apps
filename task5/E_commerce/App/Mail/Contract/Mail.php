<?php
namespace App\Mail\Contract;

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;

abstract class Mail {
    private string $mailHost = 'smtp.mailtrap.io';
    private string $mailUserName = 'bdf7e0af715d73';
    private string $mailPassword = 'dea0048518cefc';
    private int $mailPort = 587;
    private string $mailEncryption = 'tls';
    protected PHPMailer $mail;
    protected $mailTo,$subject,$body;
    public function __construct($mailTo,$subject,$body) {


        $this->mailTo = $mailTo;
        $this->subject = $subject;
        $this->body = $body;

        $this->mail = new PHPMailer(true);


        $this->mail->SMTPDebug = SMTP::DEBUG_OFF;
        $this->mail->isSMTP();
        $this->mail->Host= $this->mailHost;
        $this->mail->SMTPAuth= true;
        $this->mail->Username= $this->mailUserName;
        $this->mail->Password= $this->mailPassword;
        $this->mail->SMTPSecure= $this->mailEncryption;
        $this->mail->Port= $this->mailPort;
    }
    public abstract function send() :bool;
}