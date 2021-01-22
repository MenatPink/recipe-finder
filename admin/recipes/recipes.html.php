<?php include_once '../includes/helpers.inc.html.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Recipes: Search Results</title>
</head>
<body>
    <h1>Search Results</h1>
    <?php if(isset($recipes)): ?>
    <table>
        <tr>
            <th>Recipe Text</th>
            <th>Options</th>
        </tr>
        <?php foreach ($recipes as $recipe): ?>
        <tr>
            <td><?php html($recipe['text']); ?></td>
            <td>
                <form action="?" method="post">
                    <input type="hidden" name="id" value="<?php echo $recipe['id']; ?>">
                    <input type="submit" name="action" value="Edit">
                    <input type="submit" name="action" value="Delete">
                </form>
            </td>
        </tr>
<?php endforeach;?>
    </table>
        <?php endif; ?>
        <p><a href="?">New search</a></p>
        <p><a href="..">Return CMS home</a></p>
</body>
</html>