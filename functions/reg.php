<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once("../config/config.php");

include_once("userfunctions.php");
// print_r($_POST);
// echo $_POST['formValues'][0]['value'];
// die();

// var_dump($_POST);
// $name = filter_var($_POST['formValues'][0]['value'], FILTER_SANITIZE_STRING);
// $surname = filter_var($_POST['formValues'][1]['value'], FILTER_SANITIZE_STRING);
// $email = filter_var($_POST['formValues'][2]['value'], FILTER_SANITIZE_STRING);

$name = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);
$surname = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
$email = "noemail";//filter_var($_POST['email'], FILTER_SANITIZE_STRING);


//hash pass
$pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
$pass2 = filter_var($_POST['pass2'], FILTER_SANITIZE_STRING);
$gps = "lat:1|lng:1";//filter_var($_POST['gps'], FILTER_SANITIZE_STRING);
$phone = filter_var($_POST['phoneNumber'], FILTER_SANITIZE_STRING);
$username = filter_var($_POST['Username'], FILTER_SANITIZE_STRING);
if(func::register($email,$pass,$gps,$name,$surname,$dbh,$phone,$username) == true){
   header("Location: ../login.html");
  //echo 1;
}else{
 //   echo 0;
     header("Location: register.html?fail");
}


?>