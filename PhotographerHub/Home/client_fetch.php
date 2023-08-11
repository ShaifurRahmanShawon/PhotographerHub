<?php 
include "config.php"; 
  session_start();
if (isset($_SESSION['is_log_in'])) {
 
 if(isset($_POST["email"]))  
 {  
      $query = "SELECT * FROM client WHERE Email = '".$_SESSION["email"]."'";  
      $result = mysqli_query($conn, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 } 
 }
 else{
 	header("location:/Group 7/Home/index.php");
 } 
 ?>