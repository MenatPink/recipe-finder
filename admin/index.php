<?php 

if(isset($_GET['addrecipe'])){
    include 'form.html.php';
    exit();
}

include 'includes/db.inc.php';

try //selection block
{
    $sql = 'SELECT * FROM recipes';
    $result = $pdo -> query($sql);
} catch (PDOException $e) {
    $error = 'Error fetching recipes' . $e -> getMessage();
    include 'error.html.php';
    exit();
}

foreach($result as $row){
    $recipes[] = array(
        'recipetext' => $row['Name'],
        'reciperating' => $row['Rating'],

    );
}

include 'recipes.html.php'

?>