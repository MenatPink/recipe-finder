<?php 
include_once '../includes/helpers.inc.html.php';
include_once '../includes/header.html.php'

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Recipes: Search Results</title>
</head>
<body>
    <h1 class = "text-center mt-5">Search Results</h1>
    <?php if(isset($recipes)): ?>
    <table class = "table">
        <thead>
            <tr>
                <th>Recipe Name</th>
                <th>Recipe Text</th>
                <th>Options</th>
            </tr>
        </thead>
        <?php foreach ($recipes as $recipe): ?>
        <tr>
            <td><?php html($recipe['name']); ?></td>
            <td><?php html($recipe['text']); ?></td>
            <td>
                <form action="?" method="post">
                    <input type="hidden" name="id" value="<?php echo $recipe['id']; ?>">
                    <!-- <input type="submit" name="action" value="Edit"> -->
                    <input class = "btn btn-primary" type="submit" name="action" value="Delete">
                </form>
            </td>
        </tr>
<?php endforeach;?>
    </table>
        <?php endif; ?>
        <p class = "d-flex justify-content-center"><a class = "btn btn-primary" href="?">New search</a></p>
        <p class = "d-flex justify-content-center"><a class = "btn btn-primary" href="..">Return CMS home</a></p>
</body>
</html>