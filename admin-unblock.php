<?php
include_once("database-connect.php");
$uid=$_GET["uid"];
$query="update users set status='1' where uid='$uid'";
mysqli_query($dbpro,$query);
$msg=mysqli_error($dbpro);
if($msg=="")
    echo "UnBLOCKED";
else
    echo $msg;
?>