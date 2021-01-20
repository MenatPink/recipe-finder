<?php 

if(isset($_GET['addrecipe'])){
    include 'form.html.php';
    exit();
}

//insert block
if(isset($_POST['recipetext'])){
    include 'includes/db.inc.php';
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
    include 'includes/db.inc.php';
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

include 'includes/db.inc.php';

// $sql = 'SELECT recipes.recipeID, recipes.name, recipes.rating, recipetext, author.name, author.email
// FROM recipes INNER JOIN author
// ON recipes.authorID = author.authorID';

try //selection block
{
    $sql = 'SELECT * FROM recipes 
            INNER JOIN author 
            ON recipes.authorID = author.authorID';
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
        'email' => $row['email']

    );
}

include 'recipes.html.php'

?>