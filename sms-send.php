<?php
include_once("SMS_OK_sms.php");
include_once("database-connect.php");

$uid=$_GET["uid"];

$query="select * from users where uid='$uid'";
$table=mysqli_query($dbpro,$query);
$row=mysqli_fetch_array($table);

if($row)
{
    $p=$row["pass"];
    $m=$row["mobile"];
    $n=$row["uid"];


    $mobile=$m;
    $msg="$n, your password is: $p,this is your recover password ";

    $msg=SendSMS($mobile,$msg);
    
    echo "Message sent to your mobile number.";
}
else
{
    echo "Enter correct ID!";
}
?>