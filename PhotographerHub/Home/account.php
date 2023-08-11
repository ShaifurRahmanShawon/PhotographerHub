<?php
 include "newsteller.php";
 session_start();
 if (isset($_SESSION['is_log_in'])){
     if($_SESSION['type'] == 'Client'){
        header('location:client.php');
     }
    
     else {
        header('location:photographer.php');
    }
 }
 
 
 ?>