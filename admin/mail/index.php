<?php
// require 'PHPMailerAutoload.php';
// $mail = new PHPMailer;

// $mail->setFrom('noreply@gmail.com', 'My Recipe');
// $mail->addAddress('menatpink@gmail.com', 'Menat Pink');
// $mail->Subject  = 'First PHPMailer Message';
// $mail->Body     = 'Hi! This is my first e-mail sent through PHPMailer.';
// if(!$mail->send()) {
//   echo 'Message was not sent.';
//   echo 'Mailer error: ' . $mail->ErrorInfo;
// } else {
//   echo 'Message has been sent.';
// }

?>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/SMTP.php';

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require '../../vendor/autoload.php';

$mail = new PHPMailer();

try{
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'menatpink@gmail.com';                     //SMTP username
    $mail->Password   = 'P#sswordp1nk';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;  

    //Recipients
    $mail->setFrom('no-reply@myrecipes.com', 'Mailer');
    $mail->addAddress('menatpink@gmail.com');

     //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch(Exception $e){
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
};
?>