<?php

include_once("database-connect.php");

$uid=$_GET["uid"];
$pass=$_GET["pass"];
$mobile=$_GET["mobile"];
$category=$_GET["category"];
//$status=$_GET["status"];



$query="insert into users(uid,pass,mobile,category,curdate) values('$uid','$pass','$mobile','$category',CURDATE())";
mysqli_query($dbpro,$query);
$msg=mysqli_error($dbpro);
if($msg=="")
{
	
	echo "You are signed up successfully!";
}
else
	echo $msg;


?>
