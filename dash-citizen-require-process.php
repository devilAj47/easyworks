<?php

include_once("database-connect.php");

$uid=$_GET["uid"];
$category=$_GET["category"];
$fault=$_GET["fault"];
$location=$_GET["location"];
$city=$_GET["city"];





$query="insert into requirement(uid,category,fault,location,city,curdate) values('$uid','$category','$fault','$location','$city',CURDATE())";
mysqli_query($dbpro,$query);
$msg=mysqli_error($dbpro);
if($msg=="")
{
	
	echo "Your requirement is posted!!";
}
else
	echo $msg;
