<?php
  include "newsteller.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <title>Photographer Hub</title>

  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="assets/css/style.css" rel="stylesheet">

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



  <div class="container" style="height: 1700px; border: solid 2px whitesmoke;">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="assets/images/slide-1.jpeg" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="assets/images/slide-2.jpg" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="assets/images/slide-3.jpeg" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

   <h4 class="top_head">Top Three Photographer</h4>
  <div class="card" style="float: left;">
    <img class="card-img-top" src="assets/images/photographer-1.png" >
    <div class="card-body">
      <h5 class="card-title">Shahidul Alam</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
  </div>
  <div class="card" style="float: left;">
    <img class="card-img-top" src="assets/images/photographer-2.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Annie Leibovitz</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
  </div>
  <div class="card" style="float: left;">
    <img class="card-img-top" src="assets/images/photographer-3.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Steve McCurry</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
  </div>
  <div class="card text-center">
    <div class="card-body">
      <h5 class="title">Our Goal</h5>
      <p class="text">"Will you like to see your moment framed by thousands of clicks? And we will!
        It's simple: we list the best portfolio of photographers online, help you to make your event successful at the best rates, arrange them in a heartbeat to frame your special events!
        Intrigued? Today, let 's begin our partnership!
        Just stay tuned!"</p>
    </div>
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