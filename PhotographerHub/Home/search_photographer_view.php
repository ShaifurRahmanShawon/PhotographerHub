<?php  
 if(isset($_POST["email"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "photographer");  
      $query = "SELECT * FROM photographer WHERE Email = '".$_POST["email"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      $row = mysqli_fetch_array($result);
      $rating = mysqli_query($connect,"SELECT ROUND(AVG(Rating),1) as Rate FROM feedback WHERE Photographer_Name = '".$row["Name"]."' ");
      $outcome = mysqli_fetch_array($rating);
       
           $output .= '  
                <tr>  
                     <td width="30%"><label>Name</label></td>  
                     <td width="70%">'.$row["Name"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Email</label></td>  
                     <td width="70%">'.$row["Email"].'</td>  
                </tr>  
                
                <tr>  
                     <td width="30%"><label>Contact</label></td>  
                     <td width="70%">'.$row["Contact"].'</td> 
                      
                </tr>    
                <tr>  
                     <td width="30%"><label>Pricing</label></td>  
                     <td width="70%">
                     '.$row["Pricing1"].' <br>
                     '.$row["Pricing2"].' <br>
                     '.$row["Pricing3"].' <br>
                     '.$row["Pricing4"].' 
                     </td> 
                      
                </tr> 

                <tr>  
                     <td width="30%"><label>Weekly Schedule</label></td>  
                     <td width="70%">
                     '.$row["Day1"].' <br>
                     '.$row["Day2"].' <br>
                     '.$row["Day3"].' <br>
                     '.$row["Day4"].' <br>
                     '.$row["Day5"].' <br>
                     '.$row["Day6"].' <br>
                     '.$row["Day7"].' 
                     </td> 
                      
                </tr> 

                <tr>  
                     <td width="30%"><label>Rating</label></td>  
                     <td width="70%">'.$outcome["Rate"].' out of 5.0</td> 
                      
                </tr>
                ';  
       
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>