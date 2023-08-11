<?php
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
    <title>Photographers Details</title>
    
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
   <h2>Photographer Details</h2>
   <br>
<div class="table-responsive">  
                     <table id="photographer_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>Name</td>  
                                    <td>Email</td>  
                                    <td>Contact</td>  
                                    <td>View</td>
                                    <td>Suspend</td>
                                    <td>Delete</td>
                               </tr>  
                          </thead> 
                          <tbody>
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr id='.$row["Email"].'>  
                                    <td>'.$row["Name"].'</td>  
                                    <td>'.$row["Email"].'</td>  
                                    <td>'.$row["Contact"].'</td>  
                                    <td> <input type="button" name="view" value="View" id="'.$row["Email"].' " class="btn btn-info btn-xs view_data"/> </td>
                                    <td> <input type="button" name="view" value="Suspend"  class="btn btn-warning btn-xs"/> </td>
                                    <td> <input type="button" name="view"  value="Delete" id="'.$row["Email"].'" class="btn btn-danger btn-xs delete"/> </td>  
                                    
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
      $('.view_data').click(function(){  
           var email = $(this).attr("id");  
           $.ajax({  
                url:"photographer_view.php",  
                method:"post",  
                data:{email:email},  
                success:function(data){  
                     $('#photographer_detail').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      }); 

        $('.delete').click(function(){
   var email = $(this).attr("id");
    $.ajax({
     url:"photographer_delete.php",
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
      $('#photographer_data').DataTable();  
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