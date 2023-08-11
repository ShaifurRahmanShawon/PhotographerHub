<?php
  include "newsteller.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <meta charset="UTF-8">
    <title>About US</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/about.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/sweetalert.min.js"></script>
 
</head>
<body>

  <nav class="navbar navbar-expand-md navbar-light">
    <a href="index.php" class="navbar-brand">
        <img src="assets/images/logo.jpg" height="59px" alt="Photographer Hub">
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse" style="margin-left: 6%;">
        <div class="navbar-nav">
            <a href="index.php" class="nav-item nav-link">Home</a>
            <a href="about.php" class="nav-item nav-link">About</a>
            <a href="contact.php" class="nav-item nav-link">Contact Us</a>
            <a href="feedback.php" class="nav-item nav-link">Feedback</a>
        </div>
        <div class="navbar-nav ml-auto">
            <a href="login.php" class="btn btn-outline-primary">Login/Sign Up</a>
        </div>
    </div>
</nav>
    

    
           <div class="container" style="height: 800px; border: solid 2px whitesmoke;">
    
            <div class="part1">
             <h1 class="head">About Us</h1>
             <p class="para">"Photographer Hub is representing

                the best wedding photographer
               
                of home and abroad. You can find
               
                their best schedule, their best 
               
               prices. By browsing their 
               
               portfolios, you can choose the 
               
               best photographers.We are here
               
                for providing the best wedding 
               
               events."</p>
            
           </div>

            <div class="part2">
                <img src="assets/images/about.jpg" alt="">
            </div>
    
           
    
        
        </div>    
   
      
      <footer>
         <div class="footer">
           <div class="logo">
            <h5 class="my-0 mr-md-auto font-weight-normal"> <a href="index.php"><img src="assets/images/logo.jpg" style="height: 50px;" alt=""></a></h5>
           </div>
           <div class="f_menu">
            <ul class="list-group list-group-flush">
              <a href="index.php"> Home </a>
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

<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>