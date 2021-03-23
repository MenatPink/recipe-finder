<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST["reset-password-submit"])) {

    $selector = $_POST["selector"];
    echo $selector;
    $validator = $_POST["validator"];
    $password = $_POST["pwd"];
    $passwordRepeat = $_POST["pwd-repeat"];

    if (empty($password) || empty($passwordRepeat)) {
        header("Location: ../create-new-password.php?selector=" . $selector . "&validator=" . $validator . "&newpwd=empty");
        exit();
    } else if ($password != $passwordRepeat){
        header("Location: ../create-new-password.php?selector=" . $selector . "&validator=" . $validator . "&newpwd=pwdnotsame");
        exit();     
    }

$currentDate = date("U");

require '../admin/includes/db.inc.php';

$sql = "SELECT * FROM pwdreset 
        WHERE pwdResetSelector = ?";
   $stmt = mysqli_stmt_init($con);
if (!mysqli_stmt_prepare($stmt, "SELECT * FROM pwdreset WHERE pwdResetSelector = ?")){
   //Print out any error
   echo "There was an error: " . mysqli_error($con);
   exit();
} else {
    //Replace any 
    mysqli_stmt_bind_param($stmt, "s", $selector);
    mysqli_stmt_execute($stmt);

   $result = mysqli_stmt_get_result($stmt);

   if (!$row = mysqli_fetch_assoc($result)) {
       echo "Hello World";
       exit();
       

} else {
    $tokenBin = hex2bin($validator);
    $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

    if ($tokenCheck === false) {
        echo "You need to re-submit your reset reques." . mysqli_error($con);
        exit();
    } elseif ($tokenCheck === true) {

        $tokenEmail = $row['pwdResetEmail'];

        $sql = "SELECT * FROM author WHERE email=?;";
        $stmt = mysqli_stmt_init($con);
        if (!mysqli_stmt_prepare($stmt, $sql)){
           //Print out any error
           echo "There was an error: " . mysqli_error($con);
           exit();
        } else {
          mysqli_stmt_bind_param($stmt, 's', $tokenEmail);
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);
          if (!$row = mysqli_fetch_assoc($result)) {
              echo "There was an error!";
              exit();
       } else {

        $sql = "UPDATE author SET password=? WHERE email=?";
        $stmt = mysqli_stmt_init($con);
        if (!mysqli_stmt_prepare($stmt, $sql)){
           //Print out any error
           echo "There was an error: " . mysqli_error($con);
           exit();
        } else {
            $newPwdHash = md5($password);
          mysqli_stmt_bind_param($stmt, 'ss', $newPwdHash, $tokenEmail);
          mysqli_stmt_execute($stmt);

          $sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?";
          //Prepare the sql statement 
          $stmt = mysqli_stmt_init($con);
       if (!mysqli_stmt_prepare($stmt, $sql)){
          //Print out any error
          echo "There was an error: " . mysqli_error($con);
          exit();
       } else {
          //Replace any 
          mysqli_stmt_bind_param($stmt, "s", $userEmail);
          mysqli_stmt_execute($stmt);
          header("Location: ../user/index.php?passwordupdated");
       }
        }
       }

        }

    }

}

}

} else {

    header("Location: ../index.php");
}

