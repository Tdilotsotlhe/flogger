<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once("../config/config.php");

include_once("userfunctions.php");

     session_start();
   


    if(isset($_SESSION['id']))
    {
        // echo "hello";
        $query = "SELECT * FROM faults WHERE `reporters_id`= :id";// AND password1 = :pass";
        $repid = $_SESSION['id'];

        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $repid);

        $stmt->execute();
       // $stmt->execute(array(':email' => $email, ':pass' => $pass));
       $returnList = "";
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            $returnList .=  '<li class="collection-item avatar">
            <i class="material-icons circle">folder</i>
            <span class="title">Title</span>
            <p>Ref#: '.$row['fault_id'].' <br>
               Fault: '.$row['fault_type'].'<br>
               Date: '.$row["date_added"].'<br>
               Status: '.$row["status"].'
            </p>
            <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
          </li>';

            // $returnList .= '<li class="collection-item avatar valign-wrapper">

            // <img src="'.$val["imgpath"].'" alt="" style="width:40px;" class="circle">
            // <span class="title">'.$val["title"].' ('.$val["size"].') R'.$val["unit_price"].' X '.$val["qty"].'</span>
            // <div class="secondary-content right"> 
            //   <button href="#!" data-title="'.$val["title"].'" data-action="rem" data-id="'.$val["prod_id"].'" class="cartRemove waves-effect waves-light btn-small black right" style="margin:3px;" onclick="removeItem(this)"><i class="tiny material-icons ">remove</i></button>
            //   <a href="#!" data-title="'.$val["title"].'" data-action="add" data-id="'.$val["prod_id"].'" class="cartRemove waves-effect waves-light btn-small black right" style="margin:3px;"  onclick="addItem(this)"><i class="tiny material-icons ">add</i></a>
     
            // </div>
          
          
            
            //  </li>';
        }

        echo $returnList;
   


       //response
        // if()
        // {
        //     // echo 1;
         
        // }else {
        //    // echo 0;
        
        // }
    

    
    }

?>