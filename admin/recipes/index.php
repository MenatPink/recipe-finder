<?php

//build search query

if(isset($_GET['action']) and $_GET['action'] == 'search'){

    include '../includes/db.inc.php';

$select = 'SELECT recipes.recipeID, recipetext'; //Add other column
$from = ' FROM recipes';
$where = ' WHERE TRUE';
$placeholders = array();
}

if($_GET['author'] != '') //An author is selected
{
    $where .= " AND authorID = :authorid";
    $placeholders[':authorid'] = $_GET['author'];
}

if($_GET['category'] != '') //A category is selected
{
    $from .= ' INNER JOIN recipecategory ON recipes.recipeID = recipecategory.recipeID';
    $where .= " AND recipecategory.categoryID = :categoryid";
    $placeholders[':categoryid'] = $_GET['category'];
}

if($_GET['text'] != '') //Some search text was specified
{
    $where .= " AND recipetext LIKE :recipetext";
    $placeholders[':recipetext'] = '%' . $_GET['text'] . '%';
}


include '../includes/db.inc.php';

try
{
    $sql = $select . $from . $where;
    $s = $pdo->prepare($sql);
    $s->execute($placeholders);
    echo ' this function is running';
} catch(PDOException $e){
    $error = 'Error fetching recipes. ';
    include 'error.html.php';
    exit();
}

foreach($s as $row)
{
    $recipes[] = array('id' => $row['recipeID'],'text' => $row['recipetext']
    );
    //show search results
    include 'recipes.html.php';
    exit();
};



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

require 'searchform.html.php';


?>