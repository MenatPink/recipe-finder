<?php include_once 'admin/includes/helpers.inc.html.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Recipes</title>
</head>
<body>
<!-- <p><a href="?addrecipe">Add your own recipe</a></p> -->
    <p>Here are five random recipes from the database</p>
    <!-- into a table -->
    <table border = "1">
    <?php foreach ($recipes as $recipe): ?>
        <tr>
            <td><?php html($recipe['recipename']); ?></td>
            <td><?php html($recipe['recipetext']); ?></td>
            <td>
                <img 
                src= '<?php html($recipe['image'])?>'
                alt='Image of <?php html($recipe['recipename']) ?>'>
                
            </td>
    <td><?php html($recipe['reciperating']); ?></td>
    <td>
        <input type="hidden" name="id" value="<?php echo $recipe['id'];?>">
    (by 
    <a href="mailto:<?php html($recipe['email']); ?>">
    <?php html($recipe['authorname']); ?></a>)
</td>
    </tr>
    <?php endforeach;?>
    </table>
    <button>
        <a href="contact.html.php">
            Contact
    </a>
    </button>
</body>
</html>