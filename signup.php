<?php
session_start();
include "dbconnect.php";

						$name=ucwords($_POST['name']);
						$email=$_POST['email'];
						$password=$_POST['password'];
						$Gender=$_POST['Gender'];
						$Mobile=$_POST['Mobile'];
						$Location=$_POST['Location'];
					//$movie_image=$_FILES['movie_image']['tmp_name'];
	// if (!getimagesize($image)) {
	// 	echo "select images";
	// }else{
		
		// $date=date('20y-m-d');
		//$movie_image=addslashes($movie_image);
		//$movie_image=file_get_contents($movie_image);
		//$movie_image=base64_encode($movie_image);

						$code=rand();
						

				$sql="INSERT into users(user_name,user_email,password,gender,location,mobile,access,Confirmation_code)
				 values('$name','$email','$password','$Gender','$Location','$Mobile','normal','$code')";
		 $qury=mysqli_query($conn,$sql);

		 $sql1="SELECT * FROM users WHERE user_mame='$name'";
		 $result=mysqli_fetch_array($data=mysqli_query($conn,$sql1));

			if($qury){	
			$_SESSION['username'] = $name;
			$_SESSION['userid']= $result['user_id'];
			$_SESSION['code']=$result['Confirmation_code'];
			

			header("Location: index.php");

		}
		else{

			header("Location: register.php");

		}


?>