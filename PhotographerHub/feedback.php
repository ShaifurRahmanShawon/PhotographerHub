<?php 
session_start();
if (isset($_SESSION['is_log_in'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Feedback</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/feedback.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
                <img src="assets/images/Feedback.jpg" height="500px" alt="">
            </div>
    
            <div class="part2">
                <form class="form-feedback">
                    <label for="inputEmail" class="sr-only">Registered Email address</label>
                    <input type="email" id="inputEmail" class="form-control" placeholder="Registered Email.." required="" autofocus="">
    
                    <label for="inputPhotographer" class="sr-only">Photographer Name</label>
                    <input type="text" id="inputPhotographer" class="form-control" placeholder="Photographer Name.." required="">
    
                    <textarea name="inputText" id="inputText" class="form-control" cols="30" rows="5" placeholder="Go ahead we'r listening.."></textarea>
                    <button class="btn btn-lg btn-dark btn-block" type="submit">Submit</button>
                </form>
            
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
                 <div class= "sec_2">
                   <input type="email" placeholder="Email address.."></input>
                   <button type="submit"> Subscribe</button>
                 </div> 
                 
           </div>
          </div>
      </footer>  
</body>
</html>

<?php
}
else {
    header('location:login.php');
}

?>