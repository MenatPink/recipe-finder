<?php

include '../includes/db.inc.php';
//list all authors

try{
    $sql = 'SELECT * FROM author';
    $result = $pdo -> query($sql);
} 
catch (PDOException $e){
    $error = 'Error fetching authors from the database' . $e -> getMessage();
    include 'error.html.php';
    exit();
}

foreach($result as $row){
    $authors[] = array(
            'id' => $row['authorID'],
            'authorname' => $row['name'],
            'email' => $row['email']
        );
}

include 'authors.html.php';



?>