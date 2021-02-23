<?php 
include_once '../includes/helpers.inc.html.php';
include_once '../includes/header.html.php'

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Categories</title>
</head>
<body>
<h1 class = "text-center mt-5">Manage Categories</h1>
<p class = "d-flex justify-content-center mt-5"><a class = "btn btn-primary" href="?add">Add new Categories</a></p>
<table class = "table">
    <?php foreach ($categories as $category): ?>
    <form action="" method="post">
        <tr>
            <td><?php html($category['name']); ?></td>
            <input type="hidden" name='id' value='<?php echo $category['id']; ?>'>
            <td><input class = "btn btn-primary" type="submit" name="action" value="Edit"></td>
            <td><input class = "btn btn-primary" type="submit" name="action" value="Delete"></td>
        </tr>
    </form>
<?php endforeach; ?>
</table>
<p class = "d-flex justify-content-center mt-5"><a class = "btn btn-primary" href="..">Return to CMS home</a></p>
<?php include '../logout.inc.html.php' ?>
</body>
</html>