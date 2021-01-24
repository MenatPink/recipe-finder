<?php include_once '../includes/helpers.inc.html.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php html($action); ?></title>
</head>
<body>
    <h1><?php html($pageTitle);?></h1>
    <form action="?<?php html($action); ?>" method = "post">
<div>
  <label for="name">Type your recipe name here:</label>
  <textarea name="name" id="name" cols="30" rows="1"><?php html($name); ?></textarea>
  <br>
    <label for="text">Type your recipe here:</label>
    <textarea name="text" id="text" cols="40" rows="3"><?php html($text); ?></textarea>
</div>
<div>
    <label for="author">Author:</label>
    <select name="author" id="author">
        <option value="">Select One</option>
        <?php foreach ($authors as $author): ?>
            <option value="<?php html($author['id']);?>"
            <?php
                if ($author['id'] == $authorid){
                    echo ' selected';
                }
                ?>
                ><?php html($author['name']); ?></option>
                <?php endforeach; ?>
    </select>
</div>
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