<?php
$userid=$_GET["uid"];
//echo "Welcome : ".$userid;
include_once("database-connect.php");
$query="select * from users where uid='$userid'";
$table=mysqli_query($dbpro,$query);//0-1
if(mysqli_num_rows($table)==1)
	echo "Not Available";
else
	echo "Available";
?>