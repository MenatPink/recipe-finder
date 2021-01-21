<?php include_once '../includes/helpers.inc.html.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Authors</title>
</head>
<body>
    <h2>Manage Authors</h2>
    <p><a href="?add">Add new author</a></p>
    <table border="1px">
        <?php foreach ($authors as $author): ?>
            <form action="" method="post">
                <tr>
                    <td> <?php html($author['authorname']); ?></td>
                    <input type="hidden" name="id" value="<?php echo $author['id']; ?>">
                    <td><input type="submit" name="action" value="Edit"></td>
                    <td><input type="submit" name="action" value="Delete"></td>
                </tr>
            </form>
        <?php endforeach; ?>
    </table>
    <p><a href="..">Return to CMS home</a></p>
</body>
</html>