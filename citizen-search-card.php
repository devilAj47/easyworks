<?php
	include_once("database-connect.php");
$category=$_GET["category"];
$city=$_GET["city"];
//"delete from requirement where curdate<now() - interval 2 DAY";
$query="select * from requirement where category='$category' and city='$city' and DATE_SUB(curdate(),INTERVAL 10 DAY)<=curdate";
//mysql>="delete from requirement where curdate<now() - interval 2 DAY"
//$query="select * from workers where  city='$city'";
$table=mysqli_query($dbpro,$query);//table will have 0 or 1 record

$ary=array();//JSON-1

while($row=mysqli_fetch_array($table))
{
	
	$ary[]=$row;
}
echo json_encode($ary);
?>