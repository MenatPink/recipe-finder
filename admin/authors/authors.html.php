<?php 
include_once '../includes/helpers.inc.html.php';
include_once '../includes/header.html.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Authors</title>
</head>
<body>
    <h1 class = "text-center mt-5">Manage Authors</h1>
    <p class = "d-flex justify-content-center mt-5"><a class = "btn btn-primary" href="?add">Add new author</a></p>
    <table class = "table">
        <?php foreach ($authors as $author): ?>
            <form action="" method="post">
                <tr>
                    <td> <?php html($author['authorname']); ?></td>
                    <input type="hidden" name="id" value="<?php echo $author['id']; ?>">
                    <td ><input class = "btn btn-primary" type="submit" name="action" value="Edit"></td>
                    <td><input class = "btn btn-primary" type="submit" name="action" value="Delete"></td>
                </tr>
            </form>
        <?php endforeach; ?>
    </table>
    <p class = "d-flex justify-content-center mt-5"><a class = "btn btn-primary" href="..">Return to CMS home</a></p>
</body>
</html>