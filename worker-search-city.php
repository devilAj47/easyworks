<?php
	include_once("database-connect.php");


$query="select distinct city from workers";
//$query="select distinct city from workers";
$table=mysqli_query($dbpro,$query);//table will have 0 or 1 record

$ary=array();//JSON-1

while($row=mysqli_fetch_array($table))
{
	
	$ary[]=$row;
}
echo json_encode($ary);
?>