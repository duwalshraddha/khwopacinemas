<?php
session_start();

include 'dbconnect.php';
include 'navbar.php';
$id=$_GET['movie_id'];
$sql = "SELECT * from movie where movie_id='$id'";
$query=mysqli_query($conn,$sql);
$movie=mysqli_fetch_array($query);
$datetime=new Datetime('tomorrow');
$newdatetime=new Datetime('tomorrow');
$newdatetime->modify('+1 day');

?>


<iframe width="100%" height="480" src="<?php echo $movie['trailer_link']?>" frameborder="0" allowfullscreen></iframe>
<div class="white">


<br>



 
<div class="page-header">
  <h1><?php echo $movie['movie_name']?><small> Reviews</small> </h1>
</div>

  		<?php
if (isset($_SESSION['username']) && $movie['movie_status']=='nowshowing') {
	
?>
	
		<div class="col-md-8">

<?php
}
?>
		<p><?php echo $movie['movie_description']?></p>
		</div>	



<?php
if (isset($_SESSION['username']) && $movie['movie_status']=='nowshowing') {
	
?>

		<div class="col-md-4">
	
		<form method="POST" action="seats.php?a_id=<?php echo $movie['audiorium_id'];?>" id="bookform" name="bookform">
			<div class="form-group">	
			<p>Movie: <span> <input type=text name="movie_name" value="<?php echo $movie['movie_name']?>" readonly></span></p>
			<input type=hidden name="movie_id" value="<?php echo $movie['movie_id']?>">

			</div>
			<div class="form-group">
			<p>Date:</p><select name="date">
						  <option value=<?php echo date("Y-m-d");?>><?php echo date("Y-m-d");?></option>
						 <option value=<?php echo $datetime->format('Y-m-d');?>><?php echo $datetime->format('Y-m-d');?></option>
						  <option value=<?php echo $newdatetime->format('Y-m-d');?>><?php echo $newdatetime->format('Y-m-d');?></option>

						</select>
			</div>
			<div class="form-group">
			<p>Time:</p><select name="time">
						<option value=7:00 AM >7:00 AM</option>
						<option value=12:00 PM>12:00 PM</option>
						<option value=4:00 PM>4:00 PM</option>
						</select>
			</div>



			
			<button class="btn btn-info btn">View available seats</button>
				</form>	
			<!--<button class="checkout-button">Book</button>-->
					
			<div id="legend"></div>
		</div>
		<div style="clear:both"></div>
   </div>
<?php
}
?>




<?php
include'footer.php';
?>









