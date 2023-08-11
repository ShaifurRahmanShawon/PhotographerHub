<?php
$connect = mysqli_connect("localhost", "root", "", "photographer");
if(isset($_POST["email"]))
{
 $query = "DELETE FROM client WHERE Email = '".$_POST["email"]."'";
 if(mysqli_query($connect, $query))
 {  
	echo "";
 }
}
?>