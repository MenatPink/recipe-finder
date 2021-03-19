<?php 

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

date_default_timezone_set('Europe/London')

// echo 'Database connection is established';

?>