<?php
 include "newsteller.php";
 include "config.php";
 session_start();
 if (isset($_SESSION['is_log_in'])) { 

   if(isset($_POST["upload"]))  
   {  
        $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
        $query = "UPDATE client(images)  VALUES ('$file') WHERE Email = '".$_SESSION["email"]."'";  
        if(mysqli_query($conn, $query))  
        {  
             echo '<script>alert("Image Inserted into Database")</script>';  
        }  
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">   
  <meta charset="UTF-8">
    <title>User Profile</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/client.css" rel="stylesheet">
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
    
    
    <!-- Profile picture update -->
    <div class="container" style="height: 800px; border: solid 2px whitesmoke;">
    <div class="card">
                <?php 
                    $mysqli = new mysqli("localhost", "root", "", "photographer");
                    $query = "SELECT * FROM client WHERE `Email` = '".$_SESSION["email"]."'";
                    $result = $mysqli->query($query);
                      if($result){
                        while($pic=$result->fetch_assoc()){
                ?>
                  <img src="<?php echo $pic['images']; ?>" class="card-img-top" alt="...">
                  <div class="card-body">
                    <a href="profile_pic.php" class="btn btn-light">Upload Profile Picture</a>
                  </div>
                <?php } } ?>
                </div>
              
           
                <div class="card">
                <table class="table table-bordered">  
                <?php  
                $query = "SELECT * FROM client WHERE Email = '".$_SESSION["email"]."' ";  
                $result = mysqli_query($conn, $query);  
                $row = mysqli_fetch_array($result);  
                  
                     
                  
                ?>  
                </table>  
                <form method="post" enctype="multipart/form-data">  
                     <input type="file" name="image" id="image" />  
                     <br />  
                     <input type="submit" name="upload" id="upload" value="Upload" class="btn btn-info" />  
                </form> 
                </div>
              
              <div class="info">
              <table class="table_info" id="client_table">
                <tr>
                <td>
                <input class="btn btn-dark float-right edit_data" type="button" name="edit" value="Edit" id="<?php echo $row["Email"]; ?>"  />
                </td>
                </tr>
                  <tr>
                    <td> <i class="fas fa-user"></i> <?php echo $row["Name"]; ?> </td>
                  </tr>
                  <tr>
                    <td> <i class="fas fa-envelope"></i>  <?php echo $row["Email"]; ?></td>
                  </tr>
                  <tr>
                    <td> <i class="fas fa-phone-square-alt"></i>  <?php echo $row["Contact"]; ?> </td>
                  </tr>
                  <tr>
                    <td> <i class="fab fa-accusoft"></i>  <?php echo $row["About"]; ?></td>
                  </tr>
                    
                
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


<div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                      
                     <h4 class="modal-title"> Info Update</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">  
                          <label>Name</label>  
                          <input type="text" name="name" id="name" class="form-control" />  
                          <br />  
                          <label>Phone Number</label>  
                          <input type="text" name="contact" minlength="11" maxlength="11"  id="contact" class="form-control" />  
                          <br />
                          <label>About</label>  
                          <input type="textarea" name="about" id="about" class="form-control" />  
                          <br />   
                          <input type="hidden" name="email" id="email" />  
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  



 <script> 

$(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });

$(document).on('click', '.edit_data', function(){  
           var email = $(this).attr("id");  
           $.ajax({  
                url:"client_fetch.php",  
                method:"POST",  
                data:{email:email},  
                dataType:"json",  
                success:function(data){  
                     $('#name').val(data.Name);
                     $('#contact').val(data.Contact);
                     $('#about').val(data.About);    
                     $('#Email').val(data.Email);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
 });

$('#insert_form').on("submit", function(event){  
           event.preventDefault();  
            
                $.ajax({  
                     url:"client_update.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#client_table').html(data);  
                     }  
                });  
             
      });  

});
</script>

<script>  
 $(document).ready(function(){  
      $('#upload').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
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