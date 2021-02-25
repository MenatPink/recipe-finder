<?php
require_once '../includes/access.inc.php';

if(!userIsLoggedIn()){
    include '../login.html.php';
    exit();
}

if (!userHasRole('Account Administrator'))
{
    $error = 'Only Account Administrators may access this page.';
    include '../accessdenied.html.php';
    exit();
}

//new author form
// include_once('../includes/helpers.inc.html.php');

if (isset($_GET['add'])) {
    include '../includes/db.inc.php';

    $pageTitle = 'New Author';
    $action = 'addform';
    $name = '';
    $email = '';
    $id = '';
    $button = 'Add Author';


    //Build a list of roles
	try
	{
		$result = $pdo->query('SELECT id, description FROM role');
	}
	catch (PDOException $e)
	{
		$error = 'Error fetching list of roles.';
		include 'error.html.php';
		exit();
	}
	foreach ($result as $row)
	{
		$roles[] = array('id' => $row['id'], 'description' => $row['description'], 'selected' => FALSE);
	}

    include 'form.html.php';
    exit();
}


//insert new author
if (isset($_GET['addform'])) {
    include '../includes/db.inc.php';
    try {
        $sql = 'INSERT INTO author SET name = :name, email = :email';
        $s = $pdo->prepare($sql);
        $s->bindvalue(':name', $_POST['name']);
        $s->bindvalue(':email', $_POST['email']);
        $s->execute();

    } catch (PDOException $e) {
        $error = 'Error adding submitted author.';
        include 'error.html.php';
        exit();
    }

    $authorid = $pdo->lastInsertId();

    if ($_POST['password'] != '')
	{
		$password = md5($_POST['password']);

		try
		{
			$sql = 'UPDATE author SET
				password = :password
				WHERE authorID = :id';
			$s = $pdo->prepare($sql);
			$s->bindvalue(':password', $password);
			$s->bindvalue(':id', $authorid);
			$s->execute();
		}
		catch (PDOException $e)
		{
			$error = 'Error setting author password.';
			include 'error.html.php';
			exit();
		}
    }

    if (isset($_POST['roles']))
	{
		foreach ($_POST['roles'] as $role) {
			try
			{
			$sql = 'INSERT INTO authorrole SET
				authorid = :authorid,
				roleid = :roleid';
			$s = $pdo->prepare($sql);
			$s->bindValue(':authorid', $authorid);
			$s->bindValue(':roleid', $role);
			$s->execute();
			}
			catch (PDOException $e)
		{
			$error = 'Error assigning selected role to author.';
			include 'error.html.php';
			exit();
		}
		}
	}

    header('Location: .');
    exit();
}


//edit authors
if (isset($_POST['action']) and $_POST['action'] == 'Edit') {
    include '../includes/db.inc.php';

    try
    {
        $sql = 'SELECT authorID, name, email FROM author WHERE authorID = :id';
        $s = $pdo->prepare($sql);
        $s->bindvalue(':id', $_POST['id']);
        $s->execute();
    } catch (PDOException $e) {
        $error = 'Error fetching author details.';
        include 'error.html.php';
        exit();
    }
//populate form
    $row = $s->fetch();

    $pageTitle = 'Edit Author';
    $action = 'editform';
    $name = $row['name'];
    $email = $row['email'];
    $id = $row['authorID'];
    $button = 'update Author';

    //get list of roles assigned to this author
    try{
        $sql = 'SELECT roleid FROM authorrole WHERE authorid = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $id);
        $s->execute();
    } catch (PDOException $e){
        $error = 'Error fetching list of assigned roles.';
        include 'error.html.php';
        exit();
    }
    $selectedRoles = array();
    foreach($s as $row)
    {
        $selectedRoles[] = $row['roleid'];
    }

    //Build the list of all roles
    try{
        $result = $pdo->query('SELECT id, description FROM role');
    } catch(PDOException $e){
        $error = 'Error fetching list of roles.';
        include 'error.html.php';
        exit();
    }
    foreach ($result as $row)
    {
        $roles[] = array(
            'id' => $row['id'],
            'description' => $row['description'],
            'selected' => in_array($row['id'], $selectedRoles));
    }

    include 'form.html.php';
    exit();
}

//update the authors details
if (isset($_GET['editform'])) {
    include '../includes/helpers.inc.html.php';
    include '../includes/db.inc.php';
    try
    {
        $sql = 'UPDATE author SET
        name = :name,
        email = :email
        WHERE authorID = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->bindValue(':name', filter($_POST['name']));
        $s->bindValue(':email', $_POST['email']);
        $s->execute();
    } catch (PDOException $e) {
        $error = 'Error updating submitted author.' . $e -> getMessage();
        include 'error.html.php';
        exit();
    }

    if ($_POST['password'] != '')
  {
    $password = md5($_POST['password']);
    try
    {
      $sql = 'UPDATE author SET
          password = :password
          WHERE authorID = :id';
      $s = $pdo->prepare($sql);
      $s->bindValue(':password', $password);
      $s->bindValue(':id', $_POST['id']);
      $s->execute();
    }
    catch (PDOException $e)
    {
      $error = 'Error setting author password.';
      include 'error.html.php';
      exit();
    }
  }

  try
  {
    $sql = 'DELETE FROM authorrole WHERE authorid = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Error removing obsolete author role entries.';
    include 'error.html.php';
    exit();
  }
  if (isset($_POST['roles']))
  {
    foreach ($_POST['roles'] as $role)
    {
      try
      {
        $sql = 'INSERT INTO authorrole SET
            authorid = :authorid,
            roleid = :roleid';
        $s = $pdo->prepare($sql);
        $s->bindValue(':authorid', $_POST['id']);
        $s->bindValue(':roleid', $role);
        $s->execute();
      }
      catch (PDOException $e)
      {
        $error = 'Error assigning selected role to author.';
        include 'error.html.php';
        exit();
      }
    }
  }

    header('Location: .');
    exit();
}

//delete confirm, ask if certain?
if (isset($_POST['action']) and $_POST['action'] == 'Delete') {

    include '../includes/db.inc.php';

    try {
        $sql = 'SELECT authorID, name FROM author WHERE authorID = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->execute();
    } catch (PDOException $e) {
        $error = 'Error fetching author from the data.';
        include 'error.html.php';
        exit();
    }
    //Fetch the author row from the sent id
    $row = $s->fetch();

    $name = $row['name'];
    $id = $row['authorID'];

    include 'confirm_delete.html.php';
    exit();
}

//Delete the Author, his recipes and links to the table data

if (isset($_POST['action']) and $_POST['action'] == 'Yes') {
    include '../includes/db.inc.php';

    //Delete role assignments for the author
    try
    {
      $sql = 'DELETE FROM authorrole WHERE authorid = :id';
      $s = $pdo->prepare($sql);
      $s->bindValue(':id', $_POST['id']);
      $s->execute();
    }
    catch (PDOException $e)
    {
      $error = 'Error removing author from roles.';
      include 'error.html.php';
      exit();
    }

    try {
        $sql = 'DELETE FROM author WHERE authorID = :id';
        $s = $pdo->prepare($sql);
        $s->bindvalue(':id', $_POST['id']);
        $s->execute();
    } catch (PDOException $e) {
        $error = 'Error deleting author.';
        include 'error.html.php';
        exit();
    }
    header('Location: .');
    exit();
}

// if no return to main list
if(isset($_POST['action']) and $_POST['action'] == 'No')
{
	header('Location: .');
	exit();
}


//list all authors
include '../includes/db.inc.php';

try {
    $sql = 'SELECT * FROM author';
    $result = $pdo->query($sql);
} catch (PDOException $e) {
    $error = 'Error fetching authors from the database' . $e->getMessage();
    include 'error.html.php';
    exit();
}

foreach ($result as $row) {
    $authors[] = array(
        'id' => $row['authorID'],
        'authorname' => $row['name'],
        'email' => $row['email'],
    );
}

include 'authors.html.php';
