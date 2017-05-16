<?php 
include 'dbconnect.php';

$cid=addslashes($_POST['carousel_id']);
$c_name=addslashes($_POST['carousel_name']);
$carousel_image=$_FILES['carousel_image']['tmp_name'];
	// if (!getimagesize($image)) {
	// 	echo "select images";
	// }else{
		
		// $date=date('20y-m-d');
		$carousel_image=addslashes($carousel_image);
		$carousel_image=file_get_contents($carousel_image);
		$carousel_image=base64_encode($carousel_image);
		$sql="UPDATE carausel SET carausel_name='$c_name',carausel_image='$carousel_image' WHERE carausel_id='$cid'";
		$sql_post_insert=mysqli_query($conn,$sql);
		
		if($sql_post_insert){
			header('location:index.php');
		}
		else{
			echo "error";
		}
		#header("Location: index.php");

?>