<?php
 session_start();
 if (isset($_SESSION['is_log_in'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <meta charset="UTF-8">
    <title>Dashboard</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="assets/css/dashboard.css" rel="stylesheet">
    <link href="assets/css/all.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
                  <a class="dropdown-item" href="admin.php"> <i class="fas fa-user"></i> Admin</a>
                  <a class="dropdown-item" href="logout.php"> <i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
              </div>
        </div>
    </div>
</nav>
    

<div class="container" style="height: 900px; border: solid 2px whitesmoke;">

<div class="box">
 <div class="card text-white bg-info mb-3" style="height:180px">
   <div class="card-header"></div>
    <div class="card-body">
      <h4 class="card-title">Manage Client</h4>
        <a class="box1" href="client.php" style="color:whitesmoke">View details</a> 
   </div>
  </div>
</div>


<div class="box" >

<div class="card bg-light mb-3" style="height:180px">
  <div class="card-header"></div>
  <div class="card-body">
    <h4 class="card-title">Manage Photographer</h4>
    <a class="box2" href="photographer.php" style="color:black">View details</a>
  </div>
</div>

</div>
<div class="box">

<div class="card text-white bg-primary mb-3" style="height:180px">
  <div class="card-header"></div>
  <div class="card-body">
    <h4 class="card-title">Manage Feedback</h4>
    <a class="box3" href="feedback.php" style="color:whitesmoke">View details</a>
  </div>
</div> 

</div>

<div class="box">

<div class="card text-white bg-dark mb-3" style="height:180px">
  <div class="card-header"></div>
  <div class="card-body">
    <h4 class="card-title">Manage Contact</h4>
    <a class="box3" href="contact.php" style="color:whitesmoke">View details</a>
  </div>
</div> 

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