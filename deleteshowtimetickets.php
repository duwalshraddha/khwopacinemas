<?php
session_start();
include 'dbconnect.php';

$timee=$_POST['time'];
$datee=$_POST['date'];

echo $u_id;

		$sql="DELETE  FROM booking where Datee='$datee' and Timee='$timee' ";
		$qury=mysqli_query($conn,$sql);
		$sql1="DELETE  FROM seats where Dateee='$datee' and Timeee='$timee' ";
		 $qury1=mysqli_query($conn,$sql1);
		 	if($qury){

		 		
		 header("Location:ticketsbooked.php");
}

		 ?>