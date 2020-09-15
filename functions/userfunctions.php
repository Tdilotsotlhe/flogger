<?php

include_once("../config/config.php");

class func
{

    public static function register($email, $pass, $address, $name, $surname, $dbh, $phone, $username)
    {
        $hashed_pass = password_hash($pass, PASSWORD_BCRYPT);

       // $nq ="INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `location`, `customer_type`, `phone`, `hashpass`, `email`) VALUES (NULL, 'abc', 'abcv', 'asdb', 'adb', 'adb', 'adb', 'adb')"; 
       $query = "INSERT INTO `users`(`user_id`,`first_name`, `Last_name`,`username`,`location`, `customer_type`, `phone`,`hashpass`,`email`)  VALUES (NULL,:fname,:surname,:username,'','',:phone,:pword,'')";
        $stmt = $dbh->prepare($query);
        // $stmt->execute();
        // die();
        
        if ($stmt->execute(array(':fname' => $name, ':surname' => $surname, ':username' => $username, ':phone' => $phone, ':pword' => $hashed_pass))) {
        
            //send welcome email
        
            // $headers = "MIME-Version: 1.0" . "\r\n";
            // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            // $headers .= 'From: <FloggersRus@faultloggers.r.us>' . "\r\n";
            // $to_email = $email;
            // $subject = "Thank you for registering an account";
            // $body = "Hi $name,\n Thank you for registering.We look forward to assisting as best we can";
           // mail($to_email, $subject, $body, 'From:Floggeradmin<noreply@faultloggers.r.us>');

            return true;
        } else {
            return false;
        }
    }

}


?>