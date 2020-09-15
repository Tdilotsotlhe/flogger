<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once("../config/config.php");

include_once("userfunctions.php");

$name = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);
$surname = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
$email = "noemail";//filter_var($_POST['email'], FILTER_SANITIZE_STRING);


// //hash pass
// $pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
// $pass2 = filter_var($_POST['pass2'], FILTER_SANITIZE_STRING);
// $gps = "lat:1|lng:1";//filter_var($_POST['gps'], FILTER_SANITIZE_STRING);
// $phone = filter_var($_POST['phoneNumber'], FILTER_SANITIZE_STRING);
// $username = filter_var($_POST['Username'], FILTER_SANITIZE_STRING);

if(isset($_POST['username']) && isset($_POST['pass']))
{
    // echo "hello";
    $query = "SELECT * FROM users WHERE `username`= :username";// AND password1 = :pass";
     $uname = $_POST['username'];

    $pass = $_POST['pass'];
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':first_name', $first);
    $stmt->bindParam(':last_name', $last);
    $stmt->bindParam(':pass', $pass);
    $stmt->execute();
   // $stmt->execute(array(':email' => $email, ':pass' => $pass));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
   // var_dump($row);
    if($row['user_id'] > 0 && password_verify($pass, $row['hashpass']))
    {
        // echo 1;
      //  print_r($_SESSION);
      
      header("location: ../reportForm.html#welcome");
    }else {
       // echo 0;
       header("location:../login.html#loginfail");
    //    var_dump($row);
    }



}













if(func::register($email,$pass,$gps,$name,$surname,$dbh,$phone,$username) == true){
   header("Location: ../login.html");
  //echo 1;
}else{
 //   echo 0;
     header("Location: register.html?fail");
}








?>