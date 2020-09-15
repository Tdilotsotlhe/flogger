<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once("../config/config.php");

include_once("userfunctions.php");
 //var_dump($_POST);
// var_dump($_SESSION);

    // session_destroy();
   


    if(isset($_POST['username']) && isset($_POST['pass']))
    {
        // echo "hello";
        $query = "SELECT * FROM users WHERE `username`= :username";// AND password1 = :pass";
         $uname = $_POST['username'];

        $pass = $_POST['pass'];
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':username', $uname);

        $stmt->execute();
       // $stmt->execute(array(':email' => $email, ':pass' => $pass));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
       // var_dump($row);
        if($row['user_id'] > 0 && password_verify($pass, $row['hashpass']))
        {
            // echo 1;
          //  print_r($_SESSION);
          session_start();
          $_SESSION['id'] = $row['user_id'];
          header("location: ../reportForm.html#welcome");
        }else {
           // echo 0;
           header("location:../login.html#loginfail");
        //    var_dump($row);
        }
    

    
    }

?>