<?php include_once 'admin/includes/helpers.inc.html.php';?>
<?php include_once 'admin/includes/header.html.php';?>
<!-- <p><a href="?addrecipe">Add your own recipe</a></p> -->
    <p class = "text-center">Here are our latest recipes, at random!</p>
<div class="container">
<div class="row justify-content-center">
<?php foreach ($recipes as $recipe): ?>
<div class="col-md-6 col-sm-12 top-buffer">
<div class="card text-center mx-auto" style="width: 18rem;">
  <img src="<?php html($recipe['image'])?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php html($recipe['recipename']);?></h5>
    <p class="card-text"><?php html($recipe['recipetext']);?></p>
    <p class="card-text"><?php html($recipe['reciperating']);?></p>
    <p class="card-text"> <input type="hidden" name="id" value="<?php echo $recipe['id']; ?>">
    (by
    <a href="mailto:<?php html($recipe['email']);?>">
    <?php html($recipe['authorname']);?></a>)</p>
  </div>
</div>
</div>
  <?php endforeach;?>
</div>
</div>
<?php include_once 'admin/includes/footer.inc.html.php' ?>
</body>
</html>