<?php

include_once("database-connect.php");
$btn=$_POST["btn"];
if($btn=="Save")
	doSave($dbpro);

else
    if($btn=="update")
    doupdate($dbpro);

function doSave($dbpro)
{

$uid=$_POST["txtuid"];
$name=$_POST["txtname"];
$mobile=$_POST["txtmob"];
$address=$_POST["txtadd"];
$city=$_POST["txtcity"];    
$state=$_POST["txtstat"];
$email=$_POST["txtemail"];


    $orgName=$_FILES["profilePic"]["name"];
$tmpName=$_FILES["profilePic"]["tmp_name"];


/*creating query-------------------------------------------*/
$query="insert into citizens values('$uid','$name','$mobile','$address','$city','$state','$orgName','$email')";
mysqli_query($dbpro,$query);
$msg=mysqli_error($dbpro);
if($msg=="")
{
	move_uploaded_file($tmpName,"upload/".$orgName);
	echo "your data save successfully</h2>";
}
else
	echo $msg;
}

function doupdate($dbpro)

{
  $uid=$_POST["txtuid"]; 
$name=$_POST["txtname"];
$mobile=$_POST["txtmob"];
$address=$_POST["txtadd"];
$city=$_POST["txtcity"];    
$state=$_POST["txtstat"];
$hdn=$_POST["hdn"];
   $orgName=$_FILES["profilePic"]["name"];
    $tmpName=$_FILES["profilePic"]["tmp_name"];
    $email=$_POST["txtemail"];

$size=$_FILES["profilePic"]["size"];
$type=$_FILES["profilePic"]["type"];
if($orgName=="")
	{
		$fileName=$hdn;
	}
	else //user want to change the pic
	{
		$fileName=$orgName;//new name assigned
		move_uploaded_file($tmpName,"upload/".$orgName);
	}
	

$query="update citizens SET  name='$name',mobile='$mobile',address='$address',city='$city',state='$state',orgName='$orgName',email='$email' where uid='$uid'";
mysqli_query($dbpro,$query);
$msg=mysqli_error($dbpro);
if($msg=="")
{
	$rows=mysqli_affected_rows($dbpro);
    if($rows==0)
	echo"invalid id";
    else
    {
    echo $rows."<h2>Your data is updated successfully.</h2>";
    }
}
else
	echo $msg;
}


?>