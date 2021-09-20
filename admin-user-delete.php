<?php
	include_once("database-connect.php");
$uid=$_GET["uid"];


$query="delete from users where uid='$uid'";
mysqli_query($dbpro,$query);
$msg=mysqli_error($dbpro);
if($msg=="")
    echo "DELETED";
else
    echo $msg;
?>