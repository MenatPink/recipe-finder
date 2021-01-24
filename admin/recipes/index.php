<?php 

//error_reporting(0);

/***********************************************/
//add new joke link has been clicked
//
if (isset($_GET['add']))
{
	$pageTitle = 'New Recipe';
	$action = 'addform';
	$text = '';
	$authorid ='';
	$id = '';
	$button = 'Add Recipe';

	include '../includes/db.inc.php';

	//build list of authors
	try
	{
		$result = $pdo->query(
            'SELECT authorID, 
            name FROM author');
	}
	catch (PDOException $e)
{
	$error = 'Error fetching list of authors';
	include 'error.html.php';
	exit();
}

foreach ($result as $row) {
    $authors[] = array(
    'id' => $row['authorID'], 
    'name' => $row['name'] );
}
echo ($author['name']);

//build list of categories
	try
	{
		$result =$pdo->query('SELECT categoryID, name FROM category');
	}
	catch (PDOException $e)
{
	$error = 'Error fetching list of categories';
	include 'error.html.php';
	exit();
}

foreach ($result as $row) {
	$categories[] = array(
        'id' => $row['categoryID'], 
        'name' => $row['name'], 
        'selected' => FALSE );
}
//show the add joke form
include 'form.html.php';
exit();
}

/*******************************************************************************/
// insert the joke.

if (isset($_GET['addform']))
{
	include '../includes/db.inc.php';

	//if($_POST['author'] == '' or $_POST['categories'] == FALSE)

	if($_POST['author'] == '')
	{
		$error = 'You must choose an author for this Recipe, Click back and try again';
		include 'error.html.php';
		exit();
    }
    if($_POST['name'] == '')
    {
        $error = 'You must name your recipe, click back and try again.';
        include 'error.html.php';
        exit();
    }

	try{
		$sql = 'INSERT INTO recipes SET
        name = :recipename,
		recipetext = :recipetext,
        authorID = :authorid,
        categoryID = :categoryid';
        $s = $pdo->prepare($sql);
        $s->bindValue(':recipename', $_POST['name']);
		$s->bindValue(':recipetext', $_POST['text']);
        $s->bindValue(':authorid', $_POST['author']);
        $s->bindValue('categoryid', $categoryid);
		$s->execute();
	}
		catch (PDOException $e)
{
	$error = 'Error adding submitted recipe';
	include 'error.html.php';
	exit();
}

$recipeid = $pdo->lastInsertId();

// insert record into recipecategory table

if (isset($_POST['categories']))
  {
  	
try {
      $sql = 'INSERT INTO recipecategory SET
          recipeID = :recipeid,
          categoryID = :categoryid';
      $s = $pdo->prepare($sql);
      foreach ($_POST['categories'] as $categoryid)
      {
		$s->bindValue(':recipeid', $recipeid);
		$s->bindValue(':categoryid', $categoryid);  
		$s->execute();
		}
	}
    catch (PDOException $e)
    {
      $error = 'Error inserting recipe into selected categories.';
      include 'error.html.php';
      exit();
	} 
}
  header('Location: .');
exit(); 
}


/********************************************************************************/
//Edit joke button has been clicked


if (isset($_POST['action']) and $_POST['action'] == 'Edit')
{
	include '../includes/db.inc.php';
try
{
	$sql = 'SELECT name, recipeID, recipetext, authorID FROM recipes WHERE recipeID = :id';
	$s = $pdo->prepare($sql);
	$s->bindValue(':id', $_POST['id']);
	$s->execute();
}
catch (PDOException $e)
{
	$error = 'Error fetching recipe details.';
	include 'error.html.php';
	exit();
}
$row = $s->fetch();

	$pageTitle = 'Edit Recipe';
    $action = 'editform';
    $name = $row['name'];
	$text = $row['recipetext'];
	$authorid = $row['authorID'];
	$id = $row['id'];//Maybe this is wrong? not sure
	$button = 'Update Recipe';



// 	//build list of authors
	try
	{
		$result =$pdo->query(
            'SELECT authorID, 
            name FROM author'
            );
	}
	catch (PDOException $e)
{
	$error = 'Error fetching list of authors';
	include 'error.html.php';
	exit();
}

foreach ($result as $row) {
	$authors[] = array(
        'id' => $row['authorID'], 
        'name' => $row['name']
    );
}

//Get list of categories containing this recipe
//THIS IS WHERE YOU ARE! YOU ARE TRYING TO FIX THIS.

try
{
	$sql = 'SELECT categoryID FROM recipes WHERE categoryID = :id';
	$s = $pdo->prepare($sql);
	$s->bindValue(':id', $id);
	$s->execute();
}
catch (PDOException $e)
{
	$error = 'Error fetching list of selected categories.';
	include 'error.html.php';
	exit();
}
foreach ($s as $row) {
	$selectedCategories[] = $row['categoryID'];
}

echo var_dump($selectedCategories);
//build list of categories
	try
	{
		$result = $pdo->query(
            'SELECT categoryID, 
            name FROM category'
            );
	}
	catch (PDOException $e)
{
	$error = 'Error fetching list of categories';
	include 'error.html.php';
	exit();
}

foreach ($result as $row) {
	$categories[] = array(
        'id' => $row['categoryID'], 
		'name' => $row['name'],
		'selected' => in_array($row['id'], $selectedCategories));
}

//show the edit recipe version of the form
include 'form.html.php';
exit();
}

/*****************************************************************************/
//update the edited joke.
// if (isset($_GET['editform']))
// {
//   include '../includes/db.inc.php';
//   if ($_POST['author'] == '')
//   {
//     $error = 'You must choose an author for this Recipe. Click back and try again.';
//     include 'error.html.php';
//     exit(); 
// }
// try 
// {
//     $sql = 'UPDATE recipe SET
//         recipetext = :recipetext,
//         authorID = :authorid
//         WHERE id = :id';
//     $s = $pdo->prepare($sql);
//     $s->bindValue(':id', $_POST['recipeID']);
//     $s->bindValue(':recipetext', $_POST['text']);
//     $s->bindValue(':authorID', $_POST['author']);
//     $s->execute();
//   }
//   catch (PDOException $e)
//   {
//     $error = 'Error updating submitted joke.';
//     include 'error.html.php';
//     exit();
// }

// try
// {
//     $sql = 'DELETE FROM recipecategory WHERE recipeID = :id';
//     $s = $pdo->prepare($sql);
//     $s->bindValue(':id', $_POST['recipeID']);
//     $s->execute();
//   }
//   catch (PDOException $e)
//   {
//     $error = 'Error removing obsolete recipe category entries.';
//     include 'error.html.php';
//     exit();
// }
//   if (isset($_POST['categories']))
//   {
// try
// {
//       $sql = 'INSERT INTO recipecategory SET
//           recipeID = :recipeid,
//           categoryID = :categoryid';
//       $s = $pdo->prepare($sql);
//       foreach ($_POST['categories'] as $categoryid)
//       {
//         $s->bindValue(':recipeid', $_POST['recipeID']);
//         $s->bindValue(':categoryid', $categoryid);
//         $s->execute();
// 	}
// }
//     catch (PDOException $e)
//     {
//       $error = 'Error inserting recipe into selected categories.';
//       include 'error.html.php';
//       exit();
// 	} 
// }
//   header('Location: .');
// exit(); 
// }


/********************************************************************************/
//Delete joke block

//Ask if certain?

if (isset($_POST['action']) and $_POST['action'] == 'Delete')
{
  include '../includes/db.inc.php';
 
  try
  {
    $sql = 'SELECT recipeID, name FROM recipes WHERE recipeID = :id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_POST['id']);
    $s->execute();
  }

  catch (PDOException $e)
  {
    $error = 'Error deleting recipe.' . $e -> getMessage();
    include 'error.html.php';
    exit();
}
    //Fetch the author row from the sent id
    $row = $s->fetch();

    $name = $row['name'];
    $id = $row['recipeID'];

    include 'confirm_delete.html.php';
    exit();
}

if (isset($_POST['action']) and $_POST['action'] == 'Yes') {
    include '../includes/db.inc.php';
    try {
        $sql = 'DELETE FROM recipes WHERE recipeID = :id';
        $s = $pdo->prepare($sql);
        $s->bindvalue(':id', $_POST['id']);
        $s->execute();
    } catch (PDOException $e) {
        $error = 'Error deleting recipe.';
        include 'error.html.php';
        exit();
    }
    header('Location: .');
    exit();
}




/******************************************************************************/

//build search query and show results

if(isset($_GET['action']) and $_GET['action'] == 'search')
{
    include '../includes/db.inc.php';

    $select = 'SELECT recipes.recipeID, Name, recipetext';
    $from = ' FROM recipes';
    $where = ' WHERE TRUE';
    // $group = ' GROUP BY recipes.Name';
    $placeholders = array();

    //author search
    if($_GET['author'] != '')
    {
        $where .= ' AND authorID = :authorid';
        $placeholders[':authorid'] = $_GET['author'];
    }
    //category search
    if($_GET['category'] != '')
    {
        $from .= ' INNER JOIN recipecategory ON recipes.recipeID = recipecategory.recipeID';
        $where .= ' AND recipecategory.categoryID = :categoryid';
        $placeholders[':categoryid'] = $_GET['category'];
    }
    //text search
    if($_GET['text'] != ''){
        $where .= " AND recipetext OR Name LIKE :recipetext";
        $placeholders[':recipetext'] = '%' . $_GET['text'] . '%';
    }
    
        try{
            $sql = $select . $from . $where;
            // echo $sql;
            $s = $pdo->prepare($sql);
            $s->execute($placeholders);
        }catch(PDOException $e){
            $error = 'Error fetching recipes ' . $e -> getMessage();
            include 'error.html.php';
            exit();
        };
    
    foreach($s as $row){
        $recipes[] = array(
            'name' => $row['Name'],
            'id' => $row['recipeID'],
            'text' => $row['recipetext']);
        };
        //Show Search Results
        include 'recipes.html.php';
        exit();
        
};
        
        include '../includes/db.inc.php';

//Build authors array
try
{
    $result = $pdo->query('SELECT authorID, name FROM author');
}catch(PDOException $e){
    $error = 'Error fetching authors from database.' . $e -> getMessage();
    include 'error.html.php';
    exit();
}

foreach($result as $row){
    $authors[] = array(
        'id' => $row['authorID'],
        'name'=> $row['name']
    );
}

//build categories array
try{
    $result = $pdo->query('SELECT categoryID, name FROM category');
} catch(PDOException $e){
    $error = 'Error fetching categories from database.' . $e -> getMessage();
    include 'error.html.php';
    exit();
}

foreach($result as $row){
    $categories[] = array(
        'id' => $row['categoryID'],
        'name' => $row['name']
    );
}

include 'searchform.html.php';


?>