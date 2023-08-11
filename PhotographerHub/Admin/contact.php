<?php
include "config.php";
 session_start();
 if (isset($_SESSION['is_log_in'])) {
   $query ="SELECT * FROM contact";  
   $result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <meta charset="UTF-8">
    <title>Contact Details</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link href="assets/css/dashboard.css" rel="stylesheet">
    <link href="assets/css/all.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="assets/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="assets/js/all.js"></script>
 
</head>
<body>

  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a href="dashboard.php" class="navbar-brand">
        <img src="assets/images/logo.jpg" height="59px" alt="Photographer Hub" style="border-radius:8px">
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse" style="margin-left: 6%;">
        <div class="navbar-nav">
            <a href="dashboard.php" class="nav-item nav-link">Home</a>
            <a href="client.php" class="nav-item nav-link">Client</a>
            <a href="photographer.php" class="nav-item nav-link">Photographer</a>
            <a href="feedback.php" class="nav-item nav-link">Feedback</a>
            <a href="contact.php" class="nav-item nav-link">Contact</a>
            
        </div>
        <div class="navbar-nav ml-auto">
        <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Account
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="admin.php"> <i class="fas fa-user"></i> <?php echo $_SESSION['name']?></a>
                  <a class="dropdown-item" href="logout.php"> <i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
              </div>
        </div>
    </div>
</nav>
    

<div class="container" style="height: 900px; border: solid 2px whitesmoke;">
   <br>
   <h2>Contact Details</h2>
   <br>
<div class="table-responsive">  
                     <table id="contact_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>Subject</td>  
                                    <td>Email</td>  
                                    <td>Details</td>  
                                    <td>Delete</td>
                               </tr>  
                          </thead> 
                          <tbody>
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["Subject"].'</td>  
                                    <td>'.$row["Email"].'</td>  
                                    <td>'.$row["Query"].'</td>  
                                    <td> <input type="button" name="view" value="Delete" id="'.$row["Email"].'" class="btn btn-danger btn-xs delete"/> </td> 
                                    
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
            <p class="text">Copyright © 2020. All rights reserved. Template by EditZone </p>
          </div>
      </footer>   
</body>
</html>


<script>  
 $(document).ready(function(){  
     $('.delete').click(function(){
      var email = $(this).attr("id");
      $.ajax({
      url:"contact_delete.php",
      method:"POST",
      data:{email:email},
      success:function(data){
          
           location.reload();
           
          }
       });

    });



 }); 
 </script>


<script>  
 $(document).ready(function(){  
      $('#contact_data').DataTable();  
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
    header('location:index.php');
}

?>