<?php
//include('vendor/autoload.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
  

require __DIR__ . "/vendor/autoload.php";
$mail = new PHPMailer(true);

//$mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
//$mail->SMTPAuth = false;
$mail->SMTPAuth = true;
//$mail->SMTPAutoTLS = true;


$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = 'tls';
//$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->Username = "jonathanlibesa@gmail.com";
$mail->Password = "ibsodmfcinbftayp";

$mail->isHtml(true);

return $mail;
//$mail->isSMTP();
//$mail->Host = 'localhost';
//$mail->SMTPAuth = false;
//$mail->SMTPAutoTLS = false; 
//$mail->Port = 25; 
