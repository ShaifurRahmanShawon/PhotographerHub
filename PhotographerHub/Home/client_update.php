<?php  
include "config.php";
session_start();
if (isset($_SESSION['is_log_in'])) { 

 if(!empty($_POST))  
 {  
      $output = ''; 
      $message = '';  
      $Name = mysqli_real_escape_string($conn, $_POST["name"]);
      $Contact = mysqli_real_escape_string($conn, $_POST["contact"]);  
      $About = mysqli_real_escape_string($conn, $_POST["about"]);

      if($_SESSION["email"] != '')  
      {  
           $query = "  
           UPDATE client   
           SET 
           Name='$Name', 
           Contact = '$Contact',
           About  ='$About'
           WHERE Email ='".$_SESSION["email"]."'";  
           $message = 'Data Update';  
      }    
      if(mysqli_query($conn, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM client WHERE Email = '".$_SESSION["email"]."'";  
           $result = mysqli_query($conn, $select_query);  

           $row = mysqli_fetch_array($result);
           $output .= '  

           <table class="table_info" id="client_table">
                 
                <tr>
                <td>
                <input class="btn btn-dark float-right edit_data" type="button" name="edit" value="Edit" id=" echo '.$row["Email"].'"  />
                </td>
                </tr>

                  <tr>
                    <td> <i class="fas fa-user"></i>'.$row["Name"].' </td>
                  </tr>

                  <tr>
                    <td> <i class="fas fa-envelope"></i>  '.$row["Email"].'</td>
                  </tr>

                  <tr>
                    <td> <i class="fas fa-phone-square-alt"></i>  '.$row["Contact"].'</td>
                  </tr>
                  
                  <tr>
                    <td> <i class="fab fa-accusoft"></i>'.$row["About"].'</td>
                  </tr>
                    
                
                </table> 
                '; 
      }  
      echo $output;  
 } 
 }
 else {
  	header("location:/Group 7/Home/index.php");
  } 
 ?>