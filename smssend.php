<?php
include_once("database-connect.php");

include_once("SMS_OK_sms.php");
$uid=$_GET["uid"];
$mobile=$_GET["mobile"];
$pass=$_GET["pass"];
$category=$_GET["category"];




$query="select * from users where uid='$uid'";
    


   
    $msg="$uid, your password is: $pass,you have successfully login to our site ";

    $msg=SendSMS($mobile,$msg);
    
    echo "Message sent to your mobile number.";


?>