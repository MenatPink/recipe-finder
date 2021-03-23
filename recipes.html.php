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
  <?php include_once 'admin/includes/helpers.inc.html.php';?>
  <?php //include_once 'admin/includes/header.html.php';?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="navbarsExampleDefault">
    <div class = "container-fluid">
      <a class = "navbar-brand" href="#">Your Recipes</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href='user/'>Visit My Recipes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href='reg/'>Register</a>
          </li>
        </ul>
        <form class="d-flex">
        <input class="form-control me-2" type="text" name="text" id="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" name="action" value="search" type="submit">Search</button>
      </form>
      </div>
    </div>
  </nav>
  <h1 class = "text-center recipeTitle"><b>The Best Recipes of 2021</b></h1>

    <p class = "text-center">Here are ours latest recipes, at random!</p>
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
<div>
<p class = "text-center">
  <a href="./user/">Edit Your Own Recipes</a>
</p>
</div>
<script src="https://assets.juicer.io/embed.js" type="text/javascript"></script>
<link href="https://assets.juicer.io/embed.css" media="all" rel="stylesheet" type="text/css" />
<ul class="juicer-feed" data-feed-id="recipes" data-per="5"><h1 class="referral"><a href="https://www.juicer.io">Powered by Juicer.io</a></h1></ul> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script
			  src="https://code.jquery.com/jquery-3.6.0.min.js"
			  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
			  crossorigin="anonymous"></script>
        
<script src = "./admin/app/app.js"></script>
</body>
</html>