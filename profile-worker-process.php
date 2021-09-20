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
$email=$_POST["txtemail"];
$address=$_POST["txtadd"];
    $stat=$_POST["txtstat"];
$city=$_POST["txtcity"];    
$shop=$_POST["txtshop"];    
$category=$_POST["txtcategory"];    
$special=$_POST["txtspec"];    
$exp=$_POST["txtexp"];    
$other=$_POST["txtother"];    




    $orgName=$_FILES["profilePic"]["name"];
$tmpName=$_FILES["profilePic"]["tmp_name"];
       $adharname=$_FILES["profilePics"]["name"];
$tmpname=$_FILES["profilePics"]["tmp_name"];


/*creating query-------------------------------------------*/
//$query="insert into workers values('$uid','$name','$mobile','$email','$address','$stat','$city','$shop','$category','$special','$exp','$other', '$orgName','$adharname')";
    $query="insert into workers(uid,name,mobile,email,address,stat,city,shop,category,special,exp,other,orgName,adharname) values('$uid','$name','$mobile','$email','$address','$stat','$city','$shop','$category','$special','$exp','$other', '$orgName','$adharname') ";
mysqli_query($dbpro,$query);
$msg=mysqli_error($dbpro);
if($msg=="")
{
	move_uploaded_file($tmpName,"uploads/".$orgName);
    move_uploaded_file($tmpname,"uploads/".$adharname);
	echo "your data save successfully</h2>";
}
else
	echo $msg;
}
/**************************************************************************************/
function doupdate($dbpro)

{
 $uid=$_POST["txtuid"];
$name=$_POST["txtname"];
$mobile=$_POST["txtmob"];
$email=$_POST["txtemail"];
$address=$_POST["txtadd"];
    $stat=$_POST["txtstat"];
$city=$_POST["txtcity"];    
$shop=$_POST["txtshop"];    
$category=$_POST["txtcategory"];    
$special=$_POST["txtspec"];    
$exp=$_POST["txtexp"];    
$other=$_POST["txtother"];
    $hdn=$_POST["hdn"];
    $hdnad=$_POST["hdnad"];

    $orgName=$_FILES["profilePic"]["name"];
$tmpName=$_FILES["profilePic"]["tmp_name"];
       $adharname=$_FILES["profilePics"]["name"];
$tmpname=$_FILES["profilePics"]["tmp_name"];
    
    $size=$_FILES["profilePic"]["size"];
$type=$_FILES["profilePic"]["type"];
    
    $size=$_FILES["profilePics"]["size"];
$type=$_FILES["profilePics"]["type"];
    
if($orgName=="")
	{
		$fileName=$hdn;
	}
	else //user want to change the pic
	{
		$fileName=$orgName;//new name assigned
		move_uploaded_file($tmpName,"uploads/".$orgName);
	}
    /*****************************************/
    if($adharname=="")
	{
		$filename=$hdnad;
	}
	else //user want to change the pic
	{
		$filename=$adharname;//new name assigned
		move_uploaded_file($tmpname,"uploads/".$adharname);
	}
	

$query="update workers SET  name='$name',mobile='$mobile',email='$email',address='$address',city='$city',stat='$stat',city='$city',
shop='$shop',category='$category',special='$special',exp='$exp',other='$other',orgName='$fileName',adharname='$filename' where uid='$uid'";
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