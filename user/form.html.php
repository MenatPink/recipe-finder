<?php include_once '../admin/includes/helpers.inc.html.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;1,600&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/main.css">
        <title>Menat's Recipes</title>
    </head>
<body>
    <h1 class = "text-center mt-5"><?php html($pageTitle);?></h1>
    <form class = "form-group" action="?<?php html($action); ?>" method = "post">
<div>
  <label for="name">Type your recipe name here:</label>
  <textarea name="name" id="name" cols="30" rows="1"><?php html($name); ?></textarea>
  <br>
    <label for="text">Type your recipe here:</label>
    <textarea name="text" id="text" cols="40" rows="3"><?php html($text); ?></textarea>
</div>
<input type="hidden" name="author" value="<?php html($_SESSION['aid']);?>">
<fieldset>
        <legend>Categories:</legend>
        <?php foreach ($categories as $category): ?>
          <div><label>
              <input type="checkbox" name="categories[]"
              value="<?php html($category['id']); ?>"<?php
              if ($category['selected'])
              {
                echo ' checked';
              }
              ?>><?php html($category['name']); ?></label></div>
        <?php endforeach; ?>
      </fieldset>
      <div>
        <input type="hidden" name="id" value="<?php html($id); ?>">
        <input type="submit" value="<?php html($button); ?>">
      </div>
    </form>
  </body>
</html>