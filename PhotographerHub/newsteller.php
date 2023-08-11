<?php
function newstellerfunction(){
    
    $Email = $_POST['s_email'];

    $conn = mysqli_connect("localhost","root","","photographer")

    or die("cannot connected");
    
        $query = "INSERT INTO newsteller (Email)
        VALUES ('$Email')";
        
        $query_run = mysqli_query ($conn,$query);
      
        if ($query_run) {
          echo '<script type="text/javascript">swal("Subscribed!!", "Thank you", "success");</script>';
        }
      
        else {
           echo '<script type="text/javascript">swal("Already subscribed!!", "", "error");</script>';
        }
     

        
    



  }

?>