<?php

include_once("database-connect.php");

$uid=$_GET["uid"];
$total=$_GET["total"];

//$status=$_GET["status"];



$query="update workers set total= total+'$total' ,count=count+1,rtime=rtime+1  where uid='$uid'";
mysqli_query($dbpro,$query);
$msg=mysqli_error($dbpro);
if($msg=="")
{
	
	echo "ok";
}
else
	echo $msg;

?>
