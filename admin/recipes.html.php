<?php include_once 'includes/helpers.inc.html.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Recipes</title>
</head>
<body>
<p><a href="?addrecipe">Add your own recipe</a></p>
    <p>Here are all the recipes in the database</p>
    <!-- into a table -->
    <table border = "1">
    <?php foreach ($recipes as $recipe): ?>
    <form action="?deleterecipe" method="post">
    <tr>
    <td><?php html($recipe['recipename']); ?></td>
    <td><?php html($recipe['recipetext']); ?></td>
    <td><?php html($recipe['reciperating']); ?></td>
    <td><input type="hidden" name="id" value="<?php echo $recipe['id'];?>">
    <input type="submit" value="Delete"></td>
    </tr>
    <?php endforeach;?>
    </table>
    <?php include 'includes/footer.inc.html.php';?>
</body>
</html>