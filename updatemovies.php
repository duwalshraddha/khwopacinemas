<?php
session_start();
include 'dbconnect.php';
include 'navbar.php';
?>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">

 // post image show START
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#show_post_image').css({visibility: 'visible'});
                    $('#show_post_image')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(200);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        // post image show END
</script>




<div class="white">
<br>
<div class="well well-lg">

<div class="page-header">
<h1><center>Admin Access</center></h1>
</div>
</div><!-- well closed-->
<br>
<div  style="padding-left:60px; padding-right:60px;">
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addModal">Add Movie</button>

<!-- Modal -->
  <div class="modal fade" id="addModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Add ko Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Movie</h4>
        </div>
        <div class="modal-body">
            
            <!-- post form START -->
        <div class="post-form">
          <form id="insert_post" action="insertmovie.php" method="POST" enctype="multipart/form-data">
			<div class="form-group">
			<input type="text" name="movie_name" id="postarea" class="postarea" placeholder="Movie Name" required>
			</div>
			<div class="form-group">

			<input type="text" name="trailer" id="trailer"  placeholder="Trailer Link" required>
			</div>
			<div class="form-group">

			<input type="text" name="description" id="description"  placeholder="Movie description" required>
			</div>

			<div class="form-group">
			Auditorium :- 
			<select name='auditorium'>
			<option value='0'>0</option>
			<option value='1'>1</option>
			<option value='2'>2</option>
			<option value='3'>3</option>
			<option value='4'>4</option>
      <option value='5'>5</option>
      <option value='6'>6</option>
      <option value='7'>7</option>
      <option value='8'>8</option>
			</select>


			</div>

			<br/><br/>
            <input type="file" name="movie_image" accept="image/*"  onchange="readURL(this);"/><br/>
            Movie status: &nbsp<input type="radio" name="movie_status" value="nowshowing" id="nowshowing">&nbsp 
           <label for="nowshowing">Now Showing</label> &nbsp <input type="radio" name="movie_status" value="comingsoon" id="comingsoon">&nbsp <label for="comingsoon">Comming Soon</label><br/>
            
            <img id="show_post_image" src="#" alt="New Movie"  /><br/><br/>
             <div class="modal-footer">
        
            <input type="submit" name="posts" value="Post" class="btn-primary btn pull-left">

              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </form>
              </div>
              </div>
              </div>
              <?php
 				include 'footer.php';

 			?>
  
      </div>
    </div><!-- Add movie content close-->
    </div>

    <button type="button" class="btn btn-info btn-lg pull-right" data-toggle="modal" data-target="#deleteModal">Remove Movie</button><br>


    <!-- Modal -->
  <div class="modal fade" id="deleteModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Remove Movie</h4>
        </div>
        <div class="modal-body">
            
            <!-- post form START -->
        <div class="post-form">
          <form id="remove_post" action="remove.php" method="POST" >
            <input type="text" name="Removie_movie_name" id="postarea" class="postarea" placeholder="Movie Name" required><br/><br/>
            
            
            <input type="submit" name="posts" value="Remove" class="btn-primary-btn">
          </form>
        </div><!-- post form END -->


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      


 			 <?php
 				include 'footer.php';

 			?>
      </div>
    </div>
  </div>

<!-- model end -->
<br>
<div class="panel panel-info">
  <div class="panel-heading">
    <center><h3 class="panel-title">Available Movies List</h3></center>
  </div>
  <div class="panel-body">
    <ul class="list-group">
    <div class="col-md-6">
    <li class="list-group-item"><h3>Now Showing</h3></li>
  <?php
    $sql = "SELECT * from movie WHERE movie_status='nowshowing' ";
      $sql=mysqli_query($conn,$sql);
      
      while($movie=mysqli_fetch_array($sql)){?>
   

  <li class="list-group-item"><?php echo  $movie['movie_name'] ; }?></li>
  </div>

<div class="col-md-6">
    <li class="list-group-item"><h3>Coming Soon</h3></li>
  <?php
    $sql = "SELECT * from movie WHERE movie_status='comingsoon' ";
      $sql=mysqli_query($conn,$sql);
      
      while($movie=mysqli_fetch_array($sql)){?>
   

  <li class="list-group-item"><?php echo  $movie['movie_name'] ; }?></li>
  </div>


  </div>
  </div><!--panel box close-->
  <br>
<center><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#updatecarausel">Update carousel</button></center><br/>
  
<!-- Modal for add carausel-->
  <div class="modal fade" id="updatecarausel" role="dialog">
    <div class="modal-dialog">
    
      <!-- Add ko Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Carousel</h4>
        </div>
        <div class="modal-body">
            
            <!-- post form START -->
        <div class="post-form">
          <form id="update_post" action="carouselupdate.php" method="POST" enctype="multipart/form-data">
		

			<div class="form-group">
			Carousel id :- 
			<select name='carousel_id'>
			<option value='1'>1</option>
			<option value='2'>2</option>
			<option value='3'>3</option>
			<option value='4'>4</option>
			</select>


			</div>

			<br/><br/>
			<input type="text" name="carousel_name" id="carousel_name" class="postarea" placeholder="Carousel Name" required><br/><br/>
            <input type="file" name="carousel_image" accept="image/*"/><br/>
            (Note :- Image must be of long width comparing to the height.)<br/>
            
             <div class="modal-footer">
        
            <input type="submit" name="posts" value="Post" class="btn-primary btn pull-left">

              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </form>
              </div>
              </div>
              </div>
              <?php
 				include 'footer.php';

 			?>
  		</div>
      </div>
    </div><!-- Add movie content close-->



<div class="panel panel-info">
  <div class="panel-heading">
    <center><h3 class="panel-title">Carousel Content</h3></center>
  </div>
  <div class="panel-body">
    <ul class="list-group">
    <div class="col-md-6">
    
  <?php
    $sql2 = "SELECT * from carausel ";
      $sql3=mysqli_query($conn,$sql2);
      
      while($carausel=mysqli_fetch_array($sql3)){?>
   

  <li class="list-group-item"><?php echo  $carausel['carausel_name'] ; }?></li>
  </div>



  </div>
  </div><!--panel box close-->
  




</div><!-- white container close -->


<?php include 'footer.php';?>