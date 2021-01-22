<?php include_once '../includes/helpers.inc.html.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Recipes</title>
</head>
<body>
    <h1>Manage Recipes</h1>
    <p><a href="?add">Add new recipe</a></p>
    <form action="" method="get">
        <p>View Recipes satisfying the following criteria</p>
        <div>
            <label for="author">By author:</label>
            <select name="author" id="author">
                <option value="">Any author</option>
                <?php foreach ($authors as $author): ?>
                    <option value="<?php html($author['id']);?>"><?php html($author['name']);?></option>
                <?php endforeach;?>
                </select>
        </div>
        <div>
            <label for="category">By category:</label>
            <select name="category" id="category">
                <option value="">Any category</option>
                <?php foreach ($categories as $category): ?>
                <option value="<?php html($category['id']);?>"><?php html($category['name']);?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div>
            <label for="text">Containing text:</label>
            <input type="text" name="text" id="text">
        </div>
        <div>
            <input type="submit" name="action" value="search">
        </div>
                </form>
                <p><a href="..">Return to CMS</a></p>
</body>
</html>