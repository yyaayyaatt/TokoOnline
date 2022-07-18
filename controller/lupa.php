<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';
require '../vendor/autoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer();
//Set PHPMailer to use the sendmail transport

$mail->IsSMTP();

$mail->SMTPSecure = 'ssl';

$mail->Host = "mail.griyaherballarieskaa.com"; //hostname masing-masing provider email
$mail->SMTPDebug = 2;
$mail->Port = 587; //465
$mail->SMTPAuth = true;

$mail->Timeout = 60; // timeout pengiriman (dalam detik)
$mail->SMTPKeepAlive = true;

$mail->Username = "admin@griyaherballarieskaa.com"; //user email
$mail->Password = "griyaherballarieskaa"; //password email

//Set who the message is to be sent from
$mail->setFrom('admin@griyaherballarieskaa.com', 'First Last');
//Set an alternative reply-to address
// $mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress('yyaayyaatt@gmail.com', 'John Doe');
//Set the subject line
$mail->Subject = 'PHPMailer sendmail test';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML("Pengiriman dari website");
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
// $mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message sent!';
}?>