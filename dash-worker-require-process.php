<?php

include_once("database-connect.php");

$citizenid=$_GET["citizenid"];
$workerid=$_GET["workerid"];

$query="insert into ratings(citizenid,workerid) values('$citizenid','$workerid')";
mysqli_query($dbpro,$query);
$msg=mysqli_error($dbpro);
if($msg=="")
{
	
	echo "Your request has been sent!!";
}
else
	echo $msg;
