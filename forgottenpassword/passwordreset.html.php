<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password</title>
</head>
<body>
<h1>Reset Your Password</h1>
    <p>An e-mail will be sent to you with instructions on how to reset your password.</p>
    <form action="?reset" method="post">
    <input type="text" name="email" placeholder="Enter your e-mail address....">
    <button type = "submit" name = "reset-request-submit">Receive New Password by E-mail</button>
    </form>
    <?php
    if(isset($_GET["reset"])){
        if ($_GET["reset"] == "success") {
            echo '<p class="signupsuccess">Check your e-mail!</p>';
        }
    } 
    ?>
</body>
</html>
