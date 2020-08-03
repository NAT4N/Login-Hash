<?php
$connection = mysqli_connect("localhost", "root", "");
if(!$connection){
	echo "Failed to connect database" . die(mysqli_error($connection));;
}
$dbselect = mysqli_select_db($connection, "dblogin");
if(!$dbselect){
	echo "Failed to Select database" . die(mysqli_error($connection));
}


?>

