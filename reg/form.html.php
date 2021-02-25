<?php include_once "../admin/includes/header.html.php" ?>
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
            <a class="nav-link" href='../user/'>Login</a>
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
        <form action="?addform" method="post">
        <div class = "mb-3">
            <label class = "form-label" for="name">Name:</label>
            <input type="text" class="form-control" name="name">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
            <br/>
        <div class = "mb-3">
            <label class = "form-label" for="email">Email:</label>
            <input class="form-control" type="text" name="email">
            <br/>
        </div>
            <label class = "form-label" for="password">Password:</label>
            <input class="form-control" type="password" name="password">
            <br/>
            <button value="Register" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>