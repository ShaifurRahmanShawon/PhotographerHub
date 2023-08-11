<?php  
 include "config.php"; 
 //if(isset($_POST["insert"]))  
 /*{  
      $file = addslashes(file_get_contents($_FILES["images"]["tmp_name"]));  
      $query = "INSERT INTO client(images) VALUES ('$file')";  
      if(mysqli_query($conn, $query))  
      {  
           echo '<script>alert("images Inserted into Database")</script>';  
      }
 }*/
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     //$images= mysqli_real_escape_string($db->link, $_POST['images']);

     $permited  = array('jpg', 'jpeg', 'png');
     $file_name = $_FILES['images']['name'];
     $file_size = $_FILES['images']['size'];
     $file_temp = $_FILES['images']['tmp_name'];

     $div = explode('.', $file_name);
     $file_ext = strtolower(end($div));
     $same_images = 'images'. '.' . $file_ext;
     $uploaded_images = "uploads/" . $same_images;

     if (!empty($file_name)) {
          if ($file_size > 1048567) {
               echo "<span class='error'>images Size should be less then 1MB!</span>";
          } elseif (in_array($file_ext, $permited) === false) {
               echo "<span class='error'>You can upload only:-"
                    . implode(',', $permited) . "</span>";
          } else {
               move_uploaded_file($file_temp, $uploaded_images);
               $query = " UPDATE client
                    SET 
                    `images`	='$uploaded_images'
                      WHERE `Email` = '".$_SESSION["Email"]."'";
               $mysqli = new mysqli("localhost", "root", "", "photographer");
               $update_row = $mysqli ->query($query);
               if ($update_row) {
                    echo "<span class='success'>Data Updated Successfully.</span>";
               }
          }
     }
}
 ?>
 <!DOCTYPE html>
 <html>
      <head>
           <title>Upload a profile picture</title>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      </head>
      <body>
           <br /><br />
           <div class="container" style="width:500px;">
                <h3 align="center">Insert and Display imagess From Mysql Database in PHP</h3>
                <br />
                <form method="post" enctype="multipart/form-data">
                     <input type="file" name="images" id="images" />
                     <br />
                     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />
                </form>
                <br />  
                <br />  
                <table class="table table-bordered">  
                     <tr>  
                          <th>images</th>  
                     </tr>  
                <?php  
                $query = "SELECT * FROM client ORDER BY id DESC";  
                $result = mysqli_query($conn, $query);  
                while($row = mysqli_fetch_array($result)){ ?>
                          <tr>  
                               <td>  
                                    <img src="<?php echo $row['images'];?>" height="400" width="400" class="img-thumnail" />  
                               </td>  
                          </tr>  
                     
               <?php  } ?>  
                </table>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var images_name = $('#images').val();  
           if(images_name == '')  
           {  
                alert("Please Select images");  
                return false;  
           }  
           else  
           {  
                var extension = $('#images').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid images File');  
                     $('#images').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script>  