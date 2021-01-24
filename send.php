<?php

include_once '../recipes/admin/includes/helpers.inc.html.php';
// This is for I drive;
// ************************************************************

$message = $_REQUEST['message'];
// Line needed for the php.ini file, so it knows
// which email to send the message

ini_set("SMTP", "smtp.gre.ac.uk");
ini_set("sendmail_from", "mh9530z@gre.ac.uk");

if(mail("mh9530z@gre.ac.uk", "the subject - testing e-mail connection", $message)){
    echo "This worked!";
}else {
    echo "Not Successful";
}
// ***********************************************************

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sent</title>
</head>
<body>
  <button><a href="index.php">Back</a></button>  
</body>
</html>