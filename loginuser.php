<?php
require "connect.php";
$user_name=$_GET["user_name"];
$password=$_GET["password"];

$sql="select * from login where user_name='$user_name' and password='$password'";

$result=mysqli_query($con,$sql);
if(!mysqli_num_rows($result)>0){
	$status="login failed";
	echo json_encode(array("response"=>$status));
}
else{
	$row=mysqli_fetch_assoc($result);
	$name=$row['name'];
	$user_type=$row['user_type'];
	if($user_type=="student"){
			$status="student login successful";
	}
	elseif ($user_type=="lec") {
		$status="lec login successful";
	}
	elseif ($user_type=="admin") {
		$status="admin login successful";
	}
	echo json_encode(array("response"=>$status,"name"=>$name,"user_type"=>$user_type));
	//echo "Welcome ".$name;
}
mysqli_close($con);
?>