<?php 
include_once 'admin/includes/helpers.inc.html.php';


//Check if the user came with a Password Successfully Updated

if(isset($_GET["newpwd"])){
    if ($_GET["newpwd"] == "passwordupdated") {
        echo '<p class="passwordChangedSuccess">Your password has been reset!</p>';
    }
}



/******************************************************************************/


//insert block
if(isset($_POST['recipetext'])){
    include 'admin/includes/db.inc.php';
    try{
        //prepared statement
        $sql = 'INSERT INTO recipes SET
        recipetext = :recipetext';
        $s = $pdo->prepare($sql);
        $s->bindValue(':recipetext', $_POST['recipetext']);
        $s->execute();
    } catch (PDOException $e){
        $error = 'Error adding submitted recipe ' . $e->getMessage();
        include 'error.html.php';
        exit();
    }
header('Location: .');
exit(); 
}

if(isset($_GET['deleterecipe'])){
    include 'admin/includes/db.inc.php';
    try
    {
        $sql = 'DELETE FROM recipes WHERE recipeID = :id';
        $s = $pdo->prepare($sql);
        $s->bindValue(':id', $_POST['id']);
        $s->execute();

    } catch(PDOException $e){
        $error = 'Error deleting recipe ' . $e->getMessage();
        include 'error.html.php';
        exit();
    }
    header('Location: .');
    exit();
}

include 'admin/includes/db.inc.php';

    try //selection block
    {
        $sql = 'SELECT * FROM recipes 
                INNER JOIN author 
                ON recipes.authorID = author.authorID
                ORDER BY rand() LIMIT 2';
        $result = $pdo -> query($sql);
    } catch (PDOException $e) {
        $error = 'Error fetching recipes' . $e -> getMessage();
        include 'error.html.php';
        exit();
    }
    
    foreach($result as $row){
        $recipes[] = array(
            'id' => $row['recipeID'],
            'recipename' => $row['Name'],
            'recipetext' => $row['recipetext'],
            'reciperating' => $row['Rating'],
            'authorname' => $row['name'],
            'email' => $row['email'],
            'image' => $row['image']
    
        );
    }
    
      include_once "./recipes.html.php";


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
        $searchresults[] = array(
            'name' => $row['Name'],
            'id' => $row['recipeID'],
            'text' => $row['recipetext']);
        };
        //Show Search Results
        include 'searchresults.html.php';
        exit();
        
};
        
        include './admin/includes/db.inc.php';

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