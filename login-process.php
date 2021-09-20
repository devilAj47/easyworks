<?php
session_start();

include_once("database-connect.php");


$uid=$_GET["uid"];
$pass=$_GET["pass"];




$query="select * from users where uid='$uid' && pass='$pass' and status=1" ;
$table=mysqli_query($dbpro,$query);
$msg=mysqli_error($dbpro);
if(mysqli_num_rows($table)==0)
{
	echo "You have entered invalid username or password";
    return;
    //echo[uid];
}
else if(mysqli_num_rows($table)==1){
     $row=mysqli_fetch_array($table);


    //echo "login successfully as ";
    echo $row["category"];
    $_SESSION["user"]=$uid;
    
    
}




?>