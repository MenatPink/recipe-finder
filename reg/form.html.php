<?php include_once "../admin/includes/header.html.php" ?>
<link rel="stylesheet" href="../styles/main.css">
<link rel="stylesheet" href="../styles/strength.css">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="navbarsExampleDefault">
    <div class = "container-fluid">
      <a class = "navbar-brand" href="#">Your Recipes</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="..">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href='../user/'>Your Own Recipes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href='#'>Register</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
    <h1 class="text-center mt-4">Register</h1>
    <div class="container">
        <form name="registration" action="?addform" method="post">
        <div class = "mb-3">
            <label class = "form-label" for="name">Name:</label>
            <input type="text" class="form-control" name="name">
            <span class="error"><?php echo $nameErr;?></span>
          </div>
          <br/>
          <div class = "mb-3">
            <label class = "form-label" for="email">Email:</label>
            <input class="form-control" type="text" name="email">
            <span class="error"><?php echo $emailErr;?></span>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            <br/>
        </div>
            <label class = "form-label" for="password">Password:</label>
            <input class="form-control" type="password" id = "reg-password" name="password">
            <br/>
            <button value="Register" type="submit" class="btn btn-primary">Submit</button>
            <div class="g-recaptcha" data-sitekey="6LdQGYkaAAAAABeJMHsaBpNvkxbVRFEFXviXaJ-x"></div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script
			  src="https://code.jquery.com/jquery-3.6.0.min.js"
			  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
			  crossorigin="anonymous"></script>
        <script type="text/javascript" src="../admin/app/src/strength.js"></script>
        <script type="text/javascript" src="../admin/app/jquery.validate.min.js"></script>
        <script type="text/javascript" src = "../admin/app/app.js"></script>

</body>
</html>