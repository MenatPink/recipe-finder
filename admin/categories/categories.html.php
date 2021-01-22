<?php include_once '../includes/helpers.inc.html.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Categories</title>
</head>
<body>
<h1>Manage Categories</h1>
<p><a href="?add">Add new Categories</a></p>
<table border="1px">
    <?php foreach ($categories as $category): ?>
    <form action="" method="post">
        <tr>
            <td><?php html($category['name']); ?></td>
            <input type="hidden" name='id' value='<?php echo $category['id']; ?>'>
            <td><input type="submit" name="action" value="Edit"></td>
            <td><input type="submit" name="action" value="Delete"></td>
        </tr>
    </form>
<?php endforeach; ?>
</table>
<p><a href="..">Return to CMS home</a></p>
</body>
</html>