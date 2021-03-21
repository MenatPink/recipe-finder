<?php 
//Connection for Greenwich System
    // $dbServername = 'mysql.cms.gre.ac.uk';
    // $dbUsername = "mh9530z";
    // $dbPassword = "mh9530z";
    // $dbName = "mdb_mh9530z";


// Connection for XAMP folders
    $dbServername = 'localhost';
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "mdb_mh9530z";

try
{
    // new PDO('mysql:host=mysql.cms.gre.ac.uk; dbname=mdb_mh9530z', 'mh9530z', 'mh9530z');
    $pdo = new PDO('mysql:host=localhost; dbname=mdb_mh9530z', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8"');
} catch(PDOException $e) {

    $error = 'Unable to connect to database server:' . $e->getMessage();
    // $error = 'Unable to connect to database server';
    include '../error.html.php';    
    exit();
}

$con = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

//Check this connection

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    // echo "connection has been made with mysqli";
}


date_default_timezone_set('Europe/London')

// echo 'Database connection is established';

?>