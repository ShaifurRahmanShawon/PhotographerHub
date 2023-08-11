<?php
$connect = mysqli_connect("localhost", "root", "", "photographer");
if(isset($_POST["email"]))
{
 $query = "DELETE FROM feedback WHERE Registered_Email = '".$_POST["email"]."'";
 if(mysqli_query($connect, $query))
 {  
	echo "";
 }
}
?>