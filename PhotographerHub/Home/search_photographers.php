<?php
 include "newsteller.php";
 include "config.php";
 session_start();
 if (isset($_SESSION['is_log_in'])) {

    $query ="SELECT * FROM photographer";  
    $result = mysqli_query($conn, $query); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <meta charset="UTF-8">
    <title>Photographers</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/all.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/all.js"></script>
    <script type="text/javascript" src="assets/js/sweetalert.min.js"></script>
    
    
 
</head>
<body>

  <nav class="navbar navbar-expand-md navbar-light">
    <a href="home.php" class="navbar-brand">
        <img src="assets/images/logo.jpg" height="59px" alt="Photographer Hub">
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse" style="margin-left: 6%;">
        <div class="navbar-nav">
            <a href="home.php" class="nav-item nav-link">Home</a>
            <a href="about.php" class="nav-item nav-link">About</a>
            <a href="contact.php" class="nav-item nav-link">Contact Us</a>
            <a href="search_photographers.php" class="nav-item nav-link">Photographers</a>
            <a href="feedback.php" class="nav-item nav-link">Feedback</a>
        </div>
        <div class="navbar-nav ml-auto">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Account
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="account.php"> <i class="fas fa-user"></i> <?php echo $_SESSION['name']?></a>
                  <a class="dropdown-item" href="logout.php"> <i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
              </div>
        </div>
    </div>
</nav>
    
<?php 

if(isset($_POST['booking'])){
     $query ="INSERT INTO `booking`(`photographer`, `client`) VALUES ('{$_POST['email']}','{$_SESSION['email']}')";  
    $resultbook = mysqli_query($conn, $query); ;
    if($resultbook){
        echo '<script type="text/javascript">alert("Successfull Booking")</script>';
    }
}

 ?>
    
           <div class="container" style="height: 1000px; border: solid 2px whitesmoke;">
               <br>
               <br>
           <div class="table-responsive">  
                     <table id="photograpger_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>Name</td>  
                                    <td>Email</td>  
                                    <td>Contact</td>  
                                    <td>View Details</td>
                                    <td>Action</td>
                               </tr>  
                          </thead> 
                          <tbody>
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["Name"].'</td>  
                                    <td>'.$row["Email"].'</td>  
                                    <td>'.$row["Contact"].'</td>  
                                    <td> <input type="button" name="view" value="Details" id="'.$row["Email"].' " class="btn btn-info btn-xs view_data"/> </td>
                                    <td><form method="POST" action=""><input type="hidden" name="email" value="'.$row['Email'].'"><input type="submit" class="btn btn-warning" name="booking" value="booking now"></form></td>  
                                    
                               </tr>  
                               ';  
                          }  
                          ?> 
                          </tbody>
                           
                     </table>  
                </div>
    
           
    
        
        </div>    
   
      
      <footer>
         <div class="footer">
           <div class="logo">
            <h5 class="my-0 mr-md-auto font-weight-normal"> <a href="home.php"><img src="assets/images/logo.jpg" style="height: 50px;" alt=""></a></h5>
           </div>
           <div class="f_menu">
            <ul class="list-group list-group-flush">
              <a href="home.php"> Home </a>
              <a href="about.php"> About</a> 
              <a href="contact.php">Contact Us</a>
            </ul>
           </div>
           <div class="newsteller">
                 <div class="sec_1"> <h5>Get Our Newsteller</h5> </div>
                 <form class= "sec_2" action="" method="POST">
                 <input type="email" name="s_email" id="s_email" placeholder="Email address.."></input>
                   <button type="submit" name="sub"> Subscribe</button>
                 </form> 
                <?php
                   
                 if(isset($_POST['sub'])){
                  $Email = $_POST['s_email'];
                   newstellerfunction($Email);
                 }
                    
   
                 ?> 
                 
           </div>
          </div>
      </footer>  
</body>
</html>


<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">   
                     <h4 class="modal-title">Photographer Details</h4>  
                </div>  
                <div class="modal-body" id="photographer_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>



    <script>  
 $(document).ready(function(){  
      $('#photograpger_data').DataTable();  
 });  
 </script>

<script>  
 $(document).ready(function(){  
      $('.view_data').click(function(){  
           var email = $(this).attr("id");  
           $.ajax({  
                url:"search_photographer_view.php",  
                method:"post",  
                data:{email:email},  
                success:function(data){  
                     $('#photographer_detail').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });  
 });  
 </script>


<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

<?php
}
else {
    header('location:/Group 7/Home/index.php');
}

?>