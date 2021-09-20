<?php
	include_once("database-connect.php");
$rid=$_GET["rid"];

//$query="select * from onlineusers where uid='$uid'";
$query="delete from requirement where rid='$rid'";
mysqli_query($dbpro,$query);
$msg=mysqli_error($dbpro);
if($msg=="")
    echo "DELETED";
else
    echo $msg;
?>