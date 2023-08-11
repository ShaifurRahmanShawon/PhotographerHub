<?php
 include "newsteller.php";
 include "config.php";
 session_start();
 if (isset($_SESSION['is_log_in'])) {
   $query = mysqli_query($conn,"SELECT * from photographer WHERE Email = '".$_SESSION["email"]."' ");
   $row = mysqli_fetch_array($query);
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
    
    
           <div class="container" style="height: 900px; border: solid 2px whitesmoke;">
            
              
                <div class="card">
                  <img src="assets/images/profile_pic.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <a href="#" class="btn btn-light">Upload Profile Picture</a>
                  </div>
                </div>
              
              <div class="info">
              <table class="table_info" id="photographer_table">
                 
                <tr>
                <td>
                <input class="btn btn-dark float-right edit_data" type="button" name="edit" value="Edit" id="<?php echo $row["Email"]; ?>"  />
                </td>
                </tr>
                  <tr>
                    <td> <i class="fas fa-user"></i> <?php echo $row["Name"]; ?> </td>
                  </tr>
                  <tr>
                    <td> <i class="fas fa-camera-retro"></i> <?php echo $row["Type"]; ?> </td>
                  </tr>
                  <tr>
                    <td> <i class="fas fa-envelope"></i>  <?php echo $row["Email"]; ?></td>
                  </tr>
                  <tr>
                    <td> <i class="fas fa-phone-square-alt"></i>  <?php echo $row["Contact"]; ?> </td>
                  </tr>

                  <tr>
                    <td><i class="fas fa-dollar-sign"></i> <b>Pricing:</b> </td>
                  </tr>
                  <tr>
                    <td><?php echo $row["Pricing1"]; ?></td>
                  </tr>
                  
                  <tr>
                    <td><?php echo $row["Pricing2"]; ?></td>
                  </tr>
                  
                  <tr>
                    <td><?php echo $row["Pricing3"]; ?></td>
                  </tr>
                  
                  <tr>
                    <td> <?php echo $row["Pricing4"]; ?></td>
                  </tr>

                  <tr>
                    <td> <i class="fas fa-calendar-alt"></i> <b>Schedule:</b> </td>
                  </tr>

                  <tr> 
                    <td><?php echo $row["Day1"]; ?></td>
                  </tr>

                  <tr> 
                    <td><?php echo $row["Day2"]; ?></td>
                  </tr>

                  <tr>
                    <td><?php echo $row["Day3"]; ?></td>
                  </tr>

                  <tr>
                    <td><?php echo $row["Day4"]; ?></td>
                  </tr>

                  <tr>
                    <td><?php echo $row["Day5"]; ?></td>
                  </tr>

                  <tr>
                    <td><?php echo $row["Day6"]; ?></td>
                  </tr>

                  <tr>
                    <td><?php echo $row["Day7"]; ?></td>
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
                     <form method="POST" id="insert_form">  

                          <label>Name</label>  
                          <input type="text" name="name" id="name" class="form-control" />  
                          <br />  
                          <label>Phone Number</label>  
                          <input type="text" name="contact" minlength="11" maxlength="11"  id="contact" class="form-control" />  
                          <br />
                          <label>Pricing1</label>  
                          <input type="text" name="pricing1" id="pricing1" class="form-control" />  
                          <br />
                          <label>Pricing2</label>  
                          <input type="text" name="pricing2" id="pricing2" class="form-control" />  
                          <br />
                          <label>Pricing3</label>  
                          <input type="text" name="pricing3" id="pricing3" class="form-control" />  
                          <br />
                          <label>Pricing4</label>  
                          <input type="text" name="pricing4" id="pricing4" class="form-control" />  
                          <br />
                          <label>Day1</label>  
                          <input type="text" name="day1" id="day1" class="form-control" />  
                          <br />
                          <label>Day2</label>  
                          <input type="text" name="day2" id="day2" class="form-control" />  
                          <br />
                          <label>Day3</label>  
                          <input type="text" name="day3" id="day3" class="form-control" />  
                          <br />
                          <label>Day4</label>  
                          <input type="text" name="day4" id="day4" class="form-control" />  
                          <br />
                          <label>Day5</label>  
                          <input type="text" name="day5" id="day5" class="form-control" />  
                          <br />
                          <label>Day6</label>  
                          <input type="text" name="day6" id="day6" class="form-control" />  
                          <br />
                          <label>Day7</label>  
                          <input type="text" name="day7" id="day7" class="form-control" />  
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
                url:"photographer_fetch.php",  
                method:"POST",  
                data:{email:email},  
                dataType:"json",  
                success:function(data){  
                     $('#name').val(data.Name);
                     $('#contact').val(data.Contact);
                     $('#pricing1').val(data.Pricing1);
                     $('#pricing2').val(data.Pricing2);
                     $('#pricing3').val(data.Pricing3);
                     $('#pricing4').val(data.Pricing4); 
                     $('#day1').val(data.Day1); 
                     $('#day2').val(data.Day2);
                     $('#day3').val(data.Day3);
                     $('#day4').val(data.Day4);
                     $('#day5').val(data.Day5);
                     $('#day6').val(data.Day6);
                     $('#day7').val(data.Day7);  
                     $('#email').val(data.Email);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
 });

$('#insert_form').on("submit", function(event){  
           event.preventDefault();  
            
                $.ajax({  
                     url:"photographer_update.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#photographer_table').html(data);  
                     }  
                });  
             
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
    header('location:Group 7/Home/index.php');
}

?>