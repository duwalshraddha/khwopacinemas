<?php
include 'dbconnect.php';
session_start();
?>
<?php

$uname=ucfirst($_POST['username']);
$pass=$_POST['password'];
$sql="SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";
$qury=mysqli_query($conn,$sql);
$result=mysqli_fetch_array($qury);
		


if ($result)
{
	if($result['access']== 'admin'){

		$_SESSION['admin']=1;
	}
		$_SESSION['username']=$uname;
		$_SESSION['userid']=$result['user_id'];
		$_SESSION['code']=$result['Confirmation_code'];
		
		header('location: index.php');
} else{
			 $message = "Username or Password incorrect.\\nTry again.";
  echo "<script type='text/javascript'>alert('$message'); window.location = 'index.php';</script>";

			
			
			}
			
?>
