<?php

//New category form
if (isset($_GET['add']))
{
    $pageTitle = 'New Category';
    $action = 'addform';
    $name = '';
    $id = '';
    $button = 'Add Category';

    include 'form.html.php';
    exit;
}

//Insert New Category
if (isset($_GET['addform']))
{
    include '../includes/db.inc.php';
    try{
        $sql = 'INSERT INTO category SET name = :name';
        $s = $pdo->prepare($sql);
        $s->bindvalue(':name', $_POST['name']);
        $s->execute();

    } catch(PDOException $e){
        $error = 'Error adding submitted category. ' . $e -> getMessage();
        include 'error.html.php';
        exit();

    }
    header('Location: .');
    exit();
};

//Edit Categories
if(isset($_POST['action']) and $_POST['action'] == 'Edit')
{
    include '../includes/db.inc.php';
    try{
        $sql = 'SELECT categoryID, name FROM category WHERE categoryID = :id';
        $s = $pdo->prepare($sql);
        $s->bindvalue('id', $_POST['id']);
        $s->execute();
    } catch(PDOException $e){
        $error = 'Error fetching category details. ' . $e -> getMessage();;
        include 'error.html.php';
        exit();
    }
    //populate form
    $row = $s->fetch();
    
        $pageTitle = 'Edit Category';
        $action = 'editform';
        $name = $row['name'];
        $id = $row['categoryID'];
        $button = 'Update Category';
    
    include 'form.html.php';
    exit();
}

//update the categories details
if(isset($_GET['editform']))
{
    include '../includes/db.inc.php';
    try
    {
        $sql = 'UPDATE category SET 
        name = :name
        WHERE categoryID = :id';
        $s = $pdo->prepare($sql);
        $s->bindvalue(':id', $_POST['id']);
        $s->bindvalue(':name', $_POST['name']);
        $s->execute();
    } catch(PDOException $e){
        $error = 'Error updating submitted category';
        include 'error.html.php';
        exit();
    }
    header('Location: .');
    exit();
}

//delete confirm, ask if certain
if(isset($_POST['action']) and $_POST['action'] == 'Delete'){
    include '../includes/db.inc.php';
    //list all categories
    try{
        $sql = 'SELECT categoryID, name from category where categoryID = :id';
        $s = $pdo->prepare($sql);
        $s->bindvalue(':id', $_POST['id']);
        $s->execute();
    } catch(PDOException $e){
        $error = 'Error fetchin category from the data';
        include 'error.html.php';
        exit();
    }
    //Fetch the category row from the sent id
    $row = $s->fetch();
        $name = $row['name'];
        $id = $row['categoryID'];

include 'confirm_delete.html.php';
exit();
} 

//Delete category, and relevant linked data
if(isset($_POST['action']) and $_POST['action'] == 'Yes')
{
    include '../includes/db.inc.php';

    try{
        $sql = 'DELETE FROM category WHERE categoryID = :id';
        $s = $pdo->prepare($sql);
        $s->bindvalue(':id', $_POST['id']);
        $s->execute();
    } catch (PDOException $e){
        $error = 'Error deleting category.' . $e -> getMessage();
        include 'error.html.php';
        exit();
    };
    header('Location: .');
    exit();
}


include '../includes/db.inc.php';

    //list all categories
try{
    $sql = 'SELECT * FROM category';
    $result = $pdo->query($sql);
} catch (PDOException $e)
{
    $error = 'Error fetching categories from the database' . $e -> getMessage();
    include 'error.html.php';
    exit();
}

foreach ($result as $row)
{
    $categories[] = array(
        'id' => $row['categoryID'],
        'name' => $row['name'],
    );
}
include 'categories.html.php';
?>