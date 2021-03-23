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

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="navbarsExampleDefault">
    <div class = "container-fluid">
      <a class = "navbar-brand" href="#">Your Recipes</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href='#'>Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href='../reg/'>Register</a>
          </li>
        </ul>
        <!-- <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
      </div>
    </div>
  </nav>
  
    <h1>Log In</h1>
    <p>Please log in to view the page that your requested.</p>
    <?php if (isset($loginError)): ?>
        <p><?php echo($loginError); ?></p>
        <?php endif; ?>
        <form action="" method="post">
            <div>
                <label for="email">Email: <input type="text" name="email" id="email"></label>
            </div>
            <div>
                <label for="password">Password: <input type="password" name="password" id="password"></label>
            </div>
            <div>
                <input type="hidden" name="action" value="login">
                <input type="submit" value="Log in">
            </div>
            <div>
            <button class="btn btn-outline-success" type="submit">
            <a href="../forgottenpassword/">Forgotten Password?</a>
            </button>
            </div>
        </form>
        <p><a href="..">Return to CMS home</a></p>
        <?php
  if(isset($_GET["passwordupdated"])){
    echo "Your password has been updated";
  }
  ?>
</body>
</html>
