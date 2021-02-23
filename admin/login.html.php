<?php 
include_once 'includes/helpers.inc.html.php'; 
include_once 'includes/header.html.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Log In</h1>
    <p>Please log in to view the page that your requested.</p>
    <?php if (isset($loginError)): ?>
        <p><?php echo($loginError); ?></p>
        <?php endif; ?>
        <form action="" method="post">
            <div>
                <label for="email">Email: <input type="text" name="email" id="email"></label>
            </div>
            <div>
                <label for="password">Password: <input type="password" name="password" id="password"></label>
            </div>
            <div>
                <input type="hidden" name="action" value="login">
                <input type="submit" value="Log in">
            </div>
        </form>
        <p><a href="..">Return to CMS home</a></p>
</body>
</html>
