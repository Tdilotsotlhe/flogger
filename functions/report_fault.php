
<?php




ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once("../config/config.php");
session_start();
include_once("userfunctions.php");
// print_r($_POST);
// echo $_POST['formValues'][0]['value'];
// die();

// var_dump($_POST);
// $name = filter_var($_POST['formValues'][0]['value'], FILTER_SANITIZE_STRING);
// $surname = filter_var($_POST['formValues'][1]['value'], FILTER_SANITIZE_STRING);
// $email = filter_var($_POST['formValues'][2]['value'], FILTER_SANITIZE_STRING);

$fault = filter_var($_POST['fault_type'], FILTER_SANITIZE_STRING);
$cust_type = filter_var($_POST['customer_type'], FILTER_SANITIZE_STRING);
// $institutionName = filter_var($_POST['institutionName'], FILTER_SANITIZE_STRING);


//hash pass
$notes = filter_var($_POST['notes'], FILTER_SANITIZE_STRING);
$theImage = "NULL";//filter_var($_POST['theImage'], FILTER_SANITIZE_STRING);
     var_dump($_FILES);
     var_dump($_POST);      
if (is_uploaded_file($_POST['theImage']['tmp_name'])) {
    //require_once "../Matcha-2020-master/config/database.php";
   
       $value =$_FILES['theImage']['tmp_name'];
       $imgData = addslashes(file_get_contents($value));
       $imageProperties = getimageSize($value);
       $theImage = $imgData;
 
  }



// if(isset($_FILES['theImage'])){
//     $theImage = filter_var($_FILES['theImage'], FILTER_SANITIZE_STRING);
// }


$gps = NULL;//filter_var($_POST['location'], FILTER_SANITIZE_STRING);
if(isset($_POST['gpsLoc'])){
    $gps = filter_var($_POST['gpsLoc'], FILTER_SANITIZE_STRING);
}else if(isset($_POST['location'])){
    $gps = filter_var($_POST['location'], FILTER_SANITIZE_STRING);
}


$meter = filter_var($_POST['meter'], FILTER_SANITIZE_STRING);
$AccNum = filter_var($_POST['AccNum'], FILTER_SANITIZE_STRING);
$userid = $_SESSION['id'];

$query = "INSERT INTO `faults` (`fault_id`, `fault_type`, `customer_type`, `notes`, `meter`, `acc`, `picture`, `location`,`reporters_id`) VALUES 
(NULL, '$fault', '$cust_type', '$notes', '$meter','$AccNum', '$theImage', '$gps', '$userid')";
$stmt = $dbh->prepare($query);
// $stmt->execute();
// die();


if ($stmt->execute()) {

    header("Location: ../faultHistory.html");
  //  return true;
} else {
    echo $query."<br><br><br>";
    print_r($stmt->errorInfo());
   // header("Location: ../reportForm.html?fail");
    // return false;
}



// if(func::register($email,$pass,$gps,$name,$surname,$dbh,$phone,$username) == true){
//    header("Location: ../faultHistory.html");
//   //echo 1;
// }else{
//  //   echo 0;
//      header("Location: reportForm.html?fail");
// }






?>