<?php  
include "config.php";
session_start();
if (isset($_SESSION['is_log_in'])) { 

 if(!empty($_POST))  
 {  
      $output = '' ; 
      $message = '' ;  
      $Name = mysqli_real_escape_string($conn, $_POST["name"]);
      $Contact = mysqli_real_escape_string($conn, $_POST["contact"]);  
      $Pricing1 = mysqli_real_escape_string($conn, $_POST["pricing1"]);
      $Pricing2 = mysqli_real_escape_string($conn, $_POST["pricing2"]);
      $Pricing3 = mysqli_real_escape_string($conn, $_POST["pricing3"]);
      $Pricing4 = mysqli_real_escape_string($conn, $_POST["pricing4"]);
      $Day1 = mysqli_real_escape_string($conn, $_POST["day1"]);
      $Day2 = mysqli_real_escape_string($conn, $_POST["day2"]);
      $Day3 = mysqli_real_escape_string($conn, $_POST["day3"]);
      $Day4 = mysqli_real_escape_string($conn, $_POST["day4"]);
      $Day5 = mysqli_real_escape_string($conn, $_POST["day5"]);
      $Day6 = mysqli_real_escape_string($conn, $_POST["day6"]);
      $Day7 = mysqli_real_escape_string($conn, $_POST["day7"]);

      if($_SESSION["email"] != '')  
      {  
           $query = "  
           UPDATE photographer   
           SET 
           Name = '$Name', 
           Contact = '$Contact',
           Pricing1  = '$Pricing1',
           Pricing2  = '$Pricing2',
           Pricing3  = '$Pricing3',
           Pricing4  = '$Pricing4',
           Day1  = '$Day1',
           Day2  = '$Day2',
           Day3  = '$Day3',
           Day4  = '$Day4',
           Day5  = '$Day5',
           Day6  = '$Day6',
           Day7  = '$Day7'
           WHERE Email ='".$_SESSION["email"]."'";  
           $message = 'Data Updated';  
      }    
      if(mysqli_query($conn, $query))  
      {  
           $output .= '<label class="text-success">' .$message. '</label>';  
           $select_query = "SELECT * FROM photographer WHERE Email = '".$_SESSION["email"]."'";  
           $result = mysqli_query($conn, $select_query);  
           
           $row = mysqli_fetch_array($result);
           $output .= '  

           <table class="table_info" id="photographer_table">
                 
                <tr>
                <td><input class="btn btn-dark float-right edit_data" type="button" name="edit" value="Edit" id="'.$row["Email"].'"/></td>
                </tr>

                  <tr>
                    <td> <i class="fas fa-user"></i> '.$row["Name"].' </td>
                  </tr>

                  <tr>
                    <td> <i class="fas fa-camera-retro"></i> '.$row["Type"].' </td>
                  </tr>

                  <tr>
                    <td> <i class="fas fa-envelope"></i> '.$row["Email"].'</td>
                  </tr>

                  <tr>
                    <td> <i class="fas fa-phone-square-alt"></i>'.$row["Contact"].' </td>
                  </tr>

                  <tr>
                    <td><i class="fas fa-dollar-sign"></i> <b>Pricing:</b> </td>
                  </tr>

                  <tr>
                  <td>'.$row["Pricing1"].'</td>
                  </tr>
                
                  <tr>
                    <td>'.$row["Pricing2"].'</td>
                  </tr>
                  
                  <tr>
                    <td>'.$row["Pricing3"].'</td>
                  </tr>
                  
                  <tr>
                    <td>'.$row["Pricing4"].'</td>
                  </tr>

                  <tr>
                    <td> <i class="fas fa-calendar-alt"></i> <b>Schedule:</b> </td>
                  </tr>

                  <tr>
                    <td>'.$row["Day1"].'</td>
                  </tr>
   
                  <tr>
                    <td>'.$row["Day2"].'</td>
                  </tr>

                  <tr>
                    <td>'.$row["Day3"].'</td>
                  </tr>

                  <tr>
                    <td>'.$row["Day4"].'</td>
                  </tr>

                  <tr>
                    <td>'.$row["Day5"].'</td>
                  </tr>

                  <tr>
                    <td>'.$row["Day6"].'</td>
                  </tr>

                  <tr>
                    <td>'.$row["Day7"].'</td>
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