<?php 
include 'form.html.php';

//Insert new user

if (isset($_GET['addform']))
{
    include '../admin/includes/db.inc.php';
    try
    {
        $sql = 'INSERT INTO author SET 
                name = :name,
                email = :email,
                password = :password';
        $s = $pdo->prepare($sql);
        $s -> bindValue(':name', $_POST['name']);
        $s -> bindValue(':email', $_POST['email']);
        $s -> bindValue(':password', md5($_POST['password']));
        $s -> execute();
    }
    catch (PDOException $e){
        $error = 'Error with registration.';
        include 'error.html.php';
        exit();
    }

    $authorid = $pdo->lastInsertId();
    
    try{
        $sql = 'INSERT INTO authorrole SET
                authorid = :authorid,
                roleid = :roleid';
        $s = $pdo->prepare($sql);
        $s->bindValue(':authorid', $authorid);
        $s->bindValue(':roleid', 'User');
        $s->execute();
    } catch(PDOException $e){
        $error = 'Error assigning selected role to author.';
        include 'error.html.php';
        exit();
    }
    include 'welcome.html.php';
}


?>