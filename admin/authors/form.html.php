<?php include_once '../includes/helpers.inc.html.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php html($pageTitle); ?></title>
</head>
<body>
    <h1><?php html($pageTitle); ?></h1>
    <form action="?<?php html($action); ?>" method="post">
    <label for="name">Name: <input type="text" name="name" id="name" value="<?php html($name); ?>"></label><br>
    <label for="email">Email: <input type="text" name="email" id="email" value="<?php html($email); ?>"></label><br>
    <input type="hidden" name="id" value="<?php html($id); ?>">
    <input type="submit" value="<?php  html($button); ?>">
</form>  
</body>
</html>