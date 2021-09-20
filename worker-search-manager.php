
<?php
	include_once("database-connect.php");
$uid=$_GET["uid"];

//$query="select * from onlineusers where uid='$uid'";
$query="select * from requirement where uid='$uid'";
$table=mysqli_query($dbpro,$query);

$ary=array();//JSON-1

while($row=mysqli_fetch_array($table))
{
	
	$ary[]=$row;
}
echo json_encode($ary);
?>
