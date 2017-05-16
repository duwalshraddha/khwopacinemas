<?php
session_start();
include 'dbconnect.php';

$u_id=$_SESSION['userid'];
$id=$_GET['booking_id'];


		$sql="DELETE  FROM booking where booking_id ='$id' ";
		$qury=mysqli_query($conn,$sql);
		$sql1="DELETE  FROM seats where user_id ='$u_id' ";
		 $qury1=mysqli_query($conn,$sql1);
			if($qury){

		 		
		 header("Location: mytickets.php");
}

		 ?>