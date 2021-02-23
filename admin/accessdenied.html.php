<?php 
include_once 'includes/helpers.inc.html.php'; 
include_once 'includes/header.html.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Denied</title>
</head>
<body>
    <h1>Access Denied</h1>
    <p>
        <?php html($error); ?>
    </p>
   <?php include_once 'logout.inc.html.php' ?>
</body>
</html>
