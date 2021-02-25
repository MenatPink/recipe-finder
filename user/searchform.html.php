<?php 
include_once '../admin/includes/helpers.inc.html.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;1,600&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" 
              rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" 
              crossorigin="anonymous">
        <link rel="stylesheet" href="styles/main.css">
        <title>Menat's Recipes</title>
    </head>
<body>
    <h1 class = "text-center mt-5">Manage Recipes</h1>
    <p class = "text-center"><a class = "btn btn-primary" href="?add">Add new recipe</a></p>
    <form action="" method="get">
        <p class = "text-center">View Recipes satisfying the following criteria:</p>
        <input type="hidden" name="author" value="<?php html($_SESSION['aid']);?>">
        <div class = "d-flex justify-content-center mt-5">
            <label for="category">By category:</label>
            <select name="category" id="category">
                <option value="">Any category</option>
                <?php foreach ($categories as $category): ?>
                <option value="<?php html($category['id']);?>"><?php html($category['name']);?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class = "d-flex justify-content-center mt-5">
            <label for="text">Containing text:</label>
            <input type="text" name="text" id="text">
        </div>
        <div class = "d-flex justify-content-center mt-5">
            <input class = "btn btn-primary" type="submit" name="action" value="search">
        </div>
                </form>
                <p class = "d-flex justify-content-center mt-5"><a class = "btn btn-primary" href="..">Return to CMS</a></p>
</body>
</html>