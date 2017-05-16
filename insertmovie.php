<?php 
include 'dbconnect.php';

$movie_name=addslashes($_POST['movie_name']);
$movie_status=addslashes($_POST['movie_status']);
$trailer=$_POST['trailer'];
$d=$_POST['description'];
$a_id=$_POST['auditorium'];
$movie_image=$_FILES['movie_image']['tmp_name'];
	// if (!getimagesize($image)) {
	// 	echo "select images";
	// }else{
		
		// $date=date('20y-m-d');
		$movie_image=addslashes($movie_image);
		$movie_image=file_get_contents($movie_image);
		$movie_image=base64_encode($movie_image);
		$sql_post_insert=mysqli_query($conn,"INSERT INTO movie (movie_name,movie_image,movie_status,trailer_link,audiorium_id,movie_description) VALUES ('$movie_name','$movie_image','$movie_status','$trailer','$a_id','$d')");
		

		header("Location: index.php");

?>