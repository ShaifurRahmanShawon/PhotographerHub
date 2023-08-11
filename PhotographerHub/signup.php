<?php
   include "config.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Signup</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/signup.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
       integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" 
       inte grity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
       <script type="text/javascript" src="assets/js/signup_validation.js"></script>
       <script type="text/javascript" src="assets/js/sweetalert.min.js"></script>
    
  </head>
  <body>
  <div class="container" style="height: 800px;">
    <div class="logo">
      <img src="assets/images/logo.jpg"  alt="">
    </div>
    <div class="input">
      <form class="form-signin" action="" name="validForm" onsubmit="return validate()" method="POST" >
    
         
        <p id="choose_title" >Signup as:</p>
        <input type="radio" id="profession1" name="profession" value="Client" placeholder="Client">
        <label for="profession1" id="choose">Client</label>

        <input type="radio" id="profession2" name="profession" value="Photographer" placeholder="Photographer">
        <label for="profession2" id="choose">Photographer</label> 

         <span class="error"><p id="profession_error"></p></span>

         <label for="inputName" class="sr-only">Name here..</label>
         <input type="text" id="name" name="name" class="form-control" placeholder="Name here..">
         <span class="error"><p id="name_error"></p></span>

       <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" id="email" name="email" class="form-control" placeholder="Email address.." >
        <span class="error"><p id="email_error"></p></span>

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password..">
        <span class="error"><p id="password_error"></p></span>

        <label for="inputCPassword" class="sr-only">Confirm password</label>
        <input type="password" id="repassword" name="repassword" class="form-control" placeholder="Confirm password..">
        <span class="error"><p id="repassword_error"></p></span>

        <button class="btn btn-lg btn-dark btn-block" type="submit" name="submit">Sign up</button>

        <label>
           <p style="color:whitesmoke;">Already have an account?<a href="login.php" style="color: aqua;"> Login here..</a></p> 
          </label>
      </form>
    </div>
  </div>
    
  
  </body>
</html>
<?php

if (isset($_POST['submit'])) {

  $Email = $_POST['email'];
  $Profession = $_POST['profession'];

  
  $all1 = mysqli_query($conn,"SELECT * from photographer");
  $all2 = mysqli_query($conn,"SELECT * from client");

  $row1  = mysqli_fetch_array($all1);
  $row2  = mysqli_fetch_array($all2);

  $a = mysqli_query($conn,"SELECT * from client WHERE Email = '$Email'");
  $b = mysqli_query($conn,"SELECT * from photographer WHERE Email = '$Email'");


  
  if (empty($row1['Email']) && empty($row2['Email'])) {

      if($Profession == "Photographer"){

        $query = "INSERT INTO photographer (Name,Type,Email,Password)
        VALUES ('".$_POST['name']."','".$_POST['profession']."','".$_POST['email']."','".$_POST['password']."')";
      
      
      
        $query_run = mysqli_query ($conn,$query);
      
        if ($query_run) {
           echo "<script type='text/javascript'>swal({
            title: 'Registration',
            text: 'successful!',
            icon: 'success'
        }).then(function() {
            window.location = 'login.php';
        });
        </script>";
        }
      
      
      
        else {
           echo '<script type="text/javascript">swal("Registration Failed", "", "error");</script>';
        }
  
      }

      if($Profession == "Client"){

        $query = "INSERT INTO client (Name,Type,Email,Password)
        VALUES ('".$_POST['name']."','".$_POST['profession']."','".$_POST['email']."','".$_POST['password']."')";
      
      
      
        $query_run = mysqli_query ($conn,$query);
      
        if ($query_run) {
           echo "<script type='text/javascript'>swal({
            title: 'Registration',
            text: 'successful!',
            icon: 'success'
        }).then(function() {
            window.location = 'login.php';
        });
        </script>";
        }
      
      
      
        else {
           echo '<script type="text/javascript">swal("Registration Failed", "", "error");</script>';
        }
  
      }
}





else if (empty($row1['Email']) && isset($row2['Email'])) {
  

  if(mysqli_num_rows($a)>0){
      
    echo '<script type="text/javascript">swal("Email already exists", "choose another one", "error");</script>';

  }
  else{

    if($Profession == "Photographer"){

      $query = "INSERT INTO photographer (Name,Type,Email,Password)
      VALUES ('".$_POST['name']."','".$_POST['profession']."','".$_POST['email']."','".$_POST['password']."')";
    
    
    
      $query_run = mysqli_query ($conn,$query);
    
      if ($query_run) {
         echo "<script type='text/javascript'>swal({
          title: 'Registration',
          text: 'successful!',
          icon: 'success'
      }).then(function() {
          window.location = 'login.php';
      });
      </script>";
      }
    
    
    
      else {
         echo '<script type="text/javascript">swal("Registration Failed", "", "error");</script>';
      }
  
    }
  
    if($Profession == "Client"){
      $query = "INSERT INTO client (Name,Type,Email,Password)
      VALUES ('".$_POST['name']."','".$_POST['profession']."','".$_POST['email']."','".$_POST['password']."')";
    
    
    
      $query_run = mysqli_query ($conn,$query);
    
      if ($query_run) {
         echo "<script type='text/javascript'>swal({
          title: 'Registration',
          text: 'successful!',
          icon: 'success'
      }).then(function() {
          window.location = 'login.php';
      });
      </script>";
      }
    
    
    
      else {
         echo '<script type="text/javascript">swal("Registration Failed", "", "error");</script>';
      }
  
    }
  }


}


else if (isset($row1['Email']) && empty($row2['Email'])) {
  if(mysqli_num_rows($b)>0){
      
    echo '<script type="text/javascript">swal("Email already exists", "choose another one", "error");</script>';

  }
  else{
    if($Profession == "Photographer"){

      $query = "INSERT INTO photographer (Name,Type,Email,Password)
      VALUES ('".$_POST['name']."','".$_POST['profession']."','".$_POST['email']."','".$_POST['password']."')";
    
    
    
      $query_run = mysqli_query ($conn,$query);
    
      if ($query_run) {
         echo "<script type='text/javascript'>swal({
          title: 'Registration',
          text: 'successful!',
          icon: 'success'
      }).then(function() {
          window.location = 'login.php';
      });
      </script>";
      }
    
    
    
      else {
         echo '<script type="text/javascript">swal("Registration Failed", "", "error");</script>';
      }
  
    }
  
    if($Profession == "Client"){
      $query = "INSERT INTO client (Name,Type,Email,Password)
      VALUES ('".$_POST['name']."','".$_POST['profession']."','".$_POST['email']."','".$_POST['password']."')";
    
    
    
      $query_run = mysqli_query ($conn,$query);
    
      if ($query_run) {
         echo "<script type='text/javascript'>swal({
          title: 'Registration',
          text: 'successful!',
          icon: 'success'
      }).then(function() {
          window.location = 'login.php';
      });
      </script>";
      }
    
    
    
      else {
         echo '<script type="text/javascript">swal("Registration Failed", "", "error");</script>';
      }
  
    }
  }


}



else if (isset($row1['Email']) && isset($row2['Email'])) {
  

  if(mysqli_num_rows($a)>0 || mysqli_num_rows($b)>0){

    echo '<script type="text/javascript">swal("Email already exists", "choose another one", "error");</script>';

  }  

  
  else{
    
    if($Profession == "Photographer"){

      $query = "INSERT INTO photographer (Name,Type,Email,Password)
      VALUES ('".$_POST['name']."','".$_POST['profession']."','".$_POST['email']."','".$_POST['password']."')";
    
    
    
      $query_run = mysqli_query ($conn,$query);
    
      if ($query_run) {
         echo "<script type='text/javascript'>swal({
          title: 'Registration',
          text: 'successful!',
          icon: 'success'
      }).then(function() {
          window.location = 'login.php';
      });
      </script>";
      }
    
    
    
      else {
         echo '<script type="text/javascript">swal("Registration Failed", "", "error");</script>';
      }
  
    }
  
    if($Profession == "Client"){
      $query = "INSERT INTO client (Name,Type,Email,Password)
      VALUES ('".$_POST['name']."','".$_POST['profession']."','".$_POST['email']."','".$_POST['password']."')";
    
    
    
      $query_run = mysqli_query ($conn,$query);
    
      if ($query_run) {
         echo "<script type='text/javascript'>swal({
          title: 'Registration',
          text: 'successful!',
          icon: 'success'
      }).then(function() {
          window.location = 'login.php';
      });
      </script>";
      }
    
    
    
      else {
         echo '<script type="text/javascript">swal("Registration Failed", "", "error");</script>';
      }
  
    }
  }


}





 
}
?>




<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>