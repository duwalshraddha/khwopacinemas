<?php 
include 'dbconnect.php';
$movie_name=$_POST['Removie_movie_name'];
$sql_post_delete=mysqli_query($conn,"DELETE  From movie WHERE movie_name='$movie_name'");
		header("Location: updatemovies.php");
?>