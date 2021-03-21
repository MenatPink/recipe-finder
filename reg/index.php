<?php 

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include '../admin/includes/helpers.inc.html.php';

$nameErr = $emailErr = "";
$name = $email = "";

//Insert new user

if (isset($_GET['addform']))
{
    include '../admin/includes/db.inc.php';
    try
    {
        //Declare Emails and Error Variables

// *****************************************
// SERVER SIDE NAME CHECKS

        //Run a function asking if name is empty
        if(empty($_POST['name'])){
            echo $nameErr = "Name is required";
            exit();
        } else {
            $name = filter(testInput($_POST["name"]));
        }
        //Check if name contains anything other letters and whitespace
        // if (!preg_match('/^[a-zA-Z-\' ]$/',$name)) {
        //     echo $nameErr = "Only letters and white space allowed";
        //     exit();
        //   }

// ************************************************
// SERVER SIDE EMAIL CHECKS

        //Run a function asking if email is empty
        if(empty($_POST['email'])){
            echo $emailErr = "Email is required";
            exit();
        } else {
            $email = testInput($_POST["email"]);
        }
        //Check if email contains correct email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo $emailErr = "Invalid email format";
            exit();
          }

//*************************************************** */
//PASSWORD CHECKS

            //Run a function asking if password is empty
            if(empty($_POST['password'])){
                echo "Password cannot be empty.";
                exit();
            }


        $sql = 'INSERT INTO author SET 
                name = :name,
                email = :email,
                password = :password';
        $s = $pdo->prepare($sql); 
        $s -> bindValue(':name', $name);
        $s -> bindValue(':email', $email);
        $s -> bindValue(':password', md5($_POST['password']));
        $s -> execute();
    }
    catch (PDOException $e){
        $error = 'Error with registration. ' . $e -> getMessage();
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

include 'form.html.php';


?>