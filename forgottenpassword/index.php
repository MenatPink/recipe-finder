<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';
include '../admin/includes/db.inc.php';

require '../vendor/autoload.php';

if (isset($_POST["reset-request-submit"])){

   $selector = bin2hex(random_bytes(8));
   $token = random_bytes(32);

   $url = "http://localhost:8080/recipes2/forgottenpassword/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);

    $expires = date("U") + 1800;

   require '../admin/includes/db.inc.php';
// Fetch the email input from the user form
   $userEmail = $_POST["email"];
// Delete any leftover tokens in the database
   $sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?";
   //Prepare the sql statement 
   $stmt = mysqli_stmt_init($con);
if (!mysqli_stmt_prepare($stmt, $sql)){
   //Print out any error
   echo "There was an error: " . mysqli_error($con);
   exit();
} else {
   //Replace any 
   mysqli_stmt_bind_param($stmt, "s", $userEmail);
   mysqli_stmt_execute($stmt);
}

$sql = "INSERT INTO pwdreset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?)";
//Prepare the sql statement 
$stmt = mysqli_stmt_init($con);
if (!mysqli_stmt_prepare($stmt, $sql)){
   //Print out any error
   echo "There was an error!";
   exit();
} else {
   //Hash sensitive data
   $hashedToken = password_hash($token, PASSWORD_DEFAULT);
   //Replace any 
   mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
   mysqli_stmt_execute($stmt);
}

mysqli_stmt_close($stmt);
mysqli_close($con);

// Writing out E-mail Content
   //Who the email is being sent to
      $to = $userEmail;
   //Subject Email
      $subject = 'Reset your password for my recipes';
   //Email Body Message
      $message = '<p>We recieved a password reset request.
      The link to reset your password is here. If you did not make this request, you can ignore this
      email</p>';
      $message .= '<p>Here is your password reset link: </br>';
      $message .= '<a href="' . $url . '">' . $url . '</a></p>';

      // $headers = "From MyRecipes <noreply@myrecipes.com\r\n";
      // $headers .= "Content-type: text/html\r\n";


      $mail = new PHPMailer();

      try{
         //Server settings
         // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
         $mail->isSMTP();                                            //Send using SMTP
         $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
         $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
         $mail->Username   = 'menatpink@gmail.com';                     //SMTP username
         $mail->Password   = 'P#sswordp1nk';                               //SMTP password
         $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
         $mail->Port       = 587;  
     
         //Recipients
         $mail->setFrom('no-reply@myrecipes.com', 'Mailer');
         $mail->addAddress($to);
     
          //Content
         $mail->isHTML(true);                                  //Set email format to HTML
         $mail->Subject = $subject;
         $mail->Body    = $message;
         $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
     
         $mail->send();
         echo 'Message has been sent';
     } catch(Exception $e){
         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
     };

     header("Location ../passwordreset.html.php?reset=success");

} else {

}


include 'passwordreset.html.php';
