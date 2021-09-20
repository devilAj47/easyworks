<?php

include_once("database-connect.php");

$uid=$_GET["uid"];
$pass=$_GET["pass"];

//$status=$_GET["status"];



$query="update users set pass='$pass' where uid='$uid' ";
mysqli_query($dbpro,$query);
$msg=mysqli_error($dbpro);
if($msg=="")
{
	
	echo "Your password change successfully!";
}
else
	echo $msg;

?>
