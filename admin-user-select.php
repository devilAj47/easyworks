<?php
	include_once("database-connect.php");
$category=$_GET["category"];


$query="select * from users where category='$category'";
//$query="select * from workers where  city='$city'";
$table=mysqli_query($dbpro,$query);//table will have 0 or 1 record

$ary=array();//JSON-1

while($row=mysqli_fetch_array($table))
{
	
	$ary[]=$row;
}
echo json_encode($ary);
?>