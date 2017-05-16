
<?php 
session_start();
include 'dbconnect.php';
include 'navbar.php';

?>

<hr style="padding :0px ;margin:0px;">


<h3 style="color:#d2cbf3;background-color: #17161a;padding-top: 10px; height: 40px; padding-left: 45%; margin:0px">Coming Soon

</h3>
<hr style="padding :0px ;margin:0px">
<br>

<div class="padbox">
<!--bhitra ko suru!-->

<div class="row">

<?php
	$sql="SELECT * from movie where movie_status='comingsoon' ";
	$sql=mysqli_query($conn,$sql);
	while ($movie=mysqli_fetch_array($sql)){
?>
	
   
  			<div class="col-xs-6 col-md-3">
    			<a href="bookticket.php?movie_id=<?php echo $movie['movie_id']?>" class="thumbnail">
     				<img src="data:image/jpeg;base64, <?php echo  $movie['movie_image'];?>" style="width: 400; height:350"/>
     			 
          </a>

     			<center>
    			<div class="caption">

        		<h3 style="color:black;"><?php echo $movie['movie_name']?></h3>
        
        		
      			</div>
      			</center>
  			</div>

<?php }?>
</div>

</div>

 
  
</div>

<?php include 'footer.php';?>