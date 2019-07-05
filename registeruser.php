<?php
require "connect.php";
$name=$_GET["name"];
$user_type=$_GET["user_type"];
$user_name=$_GET["user_name"];
$password=$_GET["password"];

$sql="select *from login where user_name='$user_name'";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
	$status="user exist";
}
else{
	$sql="insert into login(name,user_type,user_name,password) values ('$name','$user_type','$user_name','$password')";
	if(mysqli_query($con,$sql)){
		$status="saved successfully";
	}
	else{
		$status="error";
	}
}
echo json_encode(array("response"=>$status));
//echo $status;
mysqli_close($con);
?>
