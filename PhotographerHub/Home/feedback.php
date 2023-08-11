<?php
include "config.php";
include "newsteller.php";
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
    <link rel="stylesheet" href="assets/css/all.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
    
       
    
           <div class="container" style="height: 800px; border: solid 2px whitesmoke;">
       
       
            <div class="part1">
                <img src="assets/images/Feedback.jpg" height="500px" alt="">
            </div>
    
            <div class="part2">
                <form class="form-feedback" action="" method="POST">
                    <label for="inputEmail" class="sr-only">Registered Email address</label>
                    <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Registered Email.." value="<?php echo ($_SESSION["email"]);?>"  required="" autofocus="" readonly>
                    
                    <label for="inputPhotographer" class="sr-only">Photographer Name</label>
                    <input type="text" id="inputPhotographer" name="inputPhotographer" class="form-control" placeholder="Photographer Name.." required="">

                    
                    <select name="inputRating" id="inputRating" class="form-control">
                      <option value="1">1 &#xf005;</option> 
                      <option value="2">2 &#xf005;&#xf005;</option>
                      <option value="3">3 &#xf005;&#xf005;&#xf005;</option>
                      <option value="4">4 &#xf005;&#xf005;&#xf005;&#xf005;</option>
                      <option value="5">5 &#xf005;&#xf005;&#xf005;&#xf005;&#xf005;</option>
                    </select>


                    <textarea name="inputDetails" id="inputDetails" class="form-control" cols="30" rows="5" placeholder="Go ahead we'r listening.." required=""></textarea>
                    <button class="btn btn-lg btn-dark btn-block" type="submit" name="submit">Submit</button>
                </form>
            
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


<?php

if(isset($_POST['submit'])){

  $Email = $_SESSION['email'];
  $Name = $_POST['inputPhotographer'];
 
  $a = mysqli_query($conn,"SELECT * FROM photographer WHERE Email ='$Email'");
  $b = mysqli_query($conn,"SELECT * FROM feedback WHERE Photographer_Name = '$Name' and Registered_Email ='$Email'");
  $c =  mysqli_query($conn,"SELECT * FROM photographer WHERE Name ='$Name'");

  if(mysqli_num_rows($a)>0){
    echo '<script type="text/javascript">swal("Photographers not allowed to give feedback", "", "error");</script>';
  } 

  else if(mysqli_num_rows($b)>0){

      echo '<script type="text/javascript">swal("Already give feedback to this photographer", "Try another one!", "error");</script>';
    }
  else if(mysqli_num_rows($c)>0){
    
    $query = "INSERT INTO feedback (Photographer_Name,Registered_Email,Feedback,Rating)
    VALUES ('".$_POST['inputPhotographer']."','".$_POST['inputEmail']."','".$_POST['inputDetails']."','".$_POST['inputRating']."')";
  
  
  
    $query_run = mysqli_query ($conn,$query);
  
    if ($query_run) {
      echo '<script type="text/javascript">swal("Feedback submitted!!", "Thank you", "success");</script>';
    }

    else {
       echo '<script type="text/javascript">swal("Feedback submission failed!!", "Try again!", "error");</script>';
    }
  }
  else{
    echo '<script type="text/javascript">swal("Photographer not found!", "Try different photographer!", "error");</script>';
  }



}

?>



<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>

<?php
}
else {
    header('location:/Projects/Photographer_Hub/index.php');
}

?>