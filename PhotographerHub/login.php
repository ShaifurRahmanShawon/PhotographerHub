<?php
   include "config.php";
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="assets/css/login.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
       integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" 
       integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
       <script type="text/javascript" src="assets/js/sweetalert.min.js"></script>
       <script type="text/javascript" src="assets/js/login.js"></script>
       

    
    <title>Login</title>
</head>
<body class="text-center">
    <div class="container">
    <div class="part1">
        <form class="form-signin"  name="form" action="" onsubmit="return validateForm()" method="POST">

            <img class="mb-4" src="assets/images/logo.jpg" width="80%">
            <label for="email" class="sr-only">Email address</label>
            <input type="email" id="email" class="form-control" name="email" placeholder="Email address" autofocus="">
            <span class="error"><p id="email_error"></p></span>

            <label for="password" class="sr-only">Password</label>
            <input type="password" id="password" class="form-control" name="password" placeholder="Password" >
            <span class="error"><p id="pass_error"></p></span>

            <input type="checkbox" id="checkbox"  name="checkbox" style="marign-top:20px;">
            <label>Remember Me</label>

            <button class="btn btn-lg btn-dark btn-block" type="submit" name="submit">Sign in</button>

            <label>
                <a href="#">Forgot password?</a>
                <p style="color: #343f4b;">Don't have an account?<a href="signup.php"> Create here..</a></p>
              </label>
          </form>
    </div>
    <div class="part2">
        <img src="assets/images/side_logo.jpg" height="500px" alt="">
    </div>
    </div>

</body>
</html>

<?php

if(isset($_COOKIE['email']) and isset($_COOKIE['password'])){
    
    $email = $_COOKIE['email'];
    $password = $_COOKIE['password'];

    echo " <script>
      document.getElementById('email').value = '$email';
      document.getElementById('password').value = '$password';
    </script> ";
}

if(isset($_POST['submit']))
{
  $email = $_POST['email'];
  $password = $_POST['password'];

  $result = mysqli_query($conn,"SELECT * FROM client WHERE Email='" . $_POST["email"] . "'");
  $row = mysqli_fetch_array($result);

  if(mysqli_num_rows($result)<=0){
    echo '<script> swal("Invalid Email","","error");</script>';
  }

   if($email == $row['Email'] && $password == $row['Password']){
    if(isset($_POST['checkbox']))
    {
      setcookie('email', $email, time()+60*60*7);
      setcookie('password', $password, time()+60*60*7);
    }
    
    $_SESSION['is_log_in'] = true;
    $_SESSION["name"] = $row['Name'];
    $_SESSION["email"] = $row['Email']; 
    $_SESSION["type"] = $row['Type'];
  }


    else {
      echo '<script> swal("Invalid Password","","error");</script>';
    }

    if(isset($_SESSION["email"])) {
      header("location:/Group 7/Home/home.php");
      } 
    }  

?>

<?php

if(isset($_COOKIE['email']) and isset($_COOKIE['password'])){
    
    $email = $_COOKIE['email'];
    $password = $_COOKIE['password'];

    echo " <script>
      document.getElementById('email').value = '$email';
      document.getElementById('password').value = '$password';
    </script> ";
}

if(isset($_POST['submit']))
{
  $email = $_POST['email'];
  $password = $_POST['password'];

  $result = mysqli_query($conn,"SELECT * FROM photographer WHERE Email='" . $_POST["email"] . "'");
  $row = mysqli_fetch_array($result);

  if(mysqli_num_rows($result)<=0){
    echo '<script> swal("Invalid Email","","error");</script>';
  }

   if($email == $row['Email'] && $password == $row['Password']){
    if(isset($_POST['checkbox']))
    {
      setcookie('email', $email, time()+60*60*7);
      setcookie('password', $password, time()+60*60*7);
    }
    
    $_SESSION['is_log_in'] = true;
    $_SESSION["name"] = $row['Name'];
    $_SESSION["email"] = $row['Email']; 
    $_SESSION["type"] = $row['Type'];
  }


    else {
      echo '<script> swal("Invalid Password","","error");</script>';
    }

    if(isset($_SESSION["email"])) {
      header("location:/Group 7/Home/home.php");
      } 
    }  

?>

<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>