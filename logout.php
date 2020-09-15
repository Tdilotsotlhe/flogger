<?php
 session_start();
 if(isset($_SESSION['id'])){
    session_unset();
      session_destroy();
    //    session_set_cookie_params(3600 * 24 * 7);
   
    header("Location: login.html");
   }

?>