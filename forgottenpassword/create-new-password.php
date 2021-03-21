<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password</title>
</head>
<body>
<?php
//Get the tokens from the GET methods
    $selector = $_GET["selector"];
    $validator = $_GET["validator"];

//Check if the selector or the validator is empty
    if (empty($selector) || empty($validator)) {
        echo "Could not validate your request!";
    } else {
//Check if the selector is a hexadecimal digit
        if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
            ?>

            <form action="reset-password.inc.php" method="post">
            <!-- Send the hidden value of selector -->
                <input type="hidden" name="selector" value="<?php echo $selector ?>">
            <!-- Send the hidden value of validator -->
                <input type="hidden" name="validator" value="<?php echo $validator ?>">
            <!-- Send the new password -->
                <input type="password" name="pwd" placeholder="Enter a new password...">
                <!-- Password Confirmation -->
                <input type="password" name="pwd-repeat" placeholder="Repeat new password...">
                <button type="submit" name ="reset-password-submit">Reset Password</button>
            </form>
            <?php
            
        }
    }
?>
</body>
</html>