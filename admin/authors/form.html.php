<?php 
include_once '../includes/helpers.inc.html.php';
include_once '../includes/header.html.php'

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php html($pageTitle); ?></title>
</head>
<body>
    <h1 class = "text-center mt-5"><?php html($pageTitle); ?></h1>
    <div class="container">
        <div class="row col-12">
            <form class = "" action="?<?php html($action); ?>" method="post">
            <label class = "form-label" for="name">Name: <input class="form-control" type="text" name="name" id="name" value="<?php html($name); ?>"></label><br>
            <label class = "form-label" for="email">Email: <input class="form-control" type="text" name="email" id="email" value="<?php html($email); ?>"></label><br>
            <input type="hidden" name="id" value="<?php html($id); ?>">
            <input class = "btn btn-primary" type="submit" value="<?php  html($button); ?>">
        </div>
    </div>
</form>  
</body>
</html>