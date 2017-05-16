<?php
session_start();
include 'dbconnect.php';
$id=$_SESSION['userid'];
$username=$_SESSION['username'];
$movie_name=$_POST['movie_name'];
$date=$_POST['date'];
$time=$_POST['time'];
$counter= $_POST["counterliney"];
$m_id=$_POST['movie_id'];
$u_id=$_SESSION['userid'];
$seat = $_POST['seat'];
$a_id=$_GET['a_id'];


$seat1= explode(",",$seat);

for ($x = 1; $x < count($seat1); $x+=2) {
  	$col=$seat1[$x+1];
  	echo $col;
  	$row=$seat1[$x];
  	echo $row;

 	
$sqlseat="INSERT into seats (row,col,auditorium_id,Dateee,Timeee,user_id) values ('$row','$col','$a_id','$date','$time','$id')";
$qury1=mysqli_query($conn,$sqlseat);

} 



$sql="INSERT into booking (movie_id,user_id,username,booked_movie_name,datee,timee,no_of_seats) values ('$m_id','$u_id','$username','$movie_name','$date','$time','$counter')";
$qury=mysqli_query($conn,$sql);

if($qury){

		header("Location:mytickets.php");


}
else
{
	echo $m_id;
	echo $u_id;
}





?>