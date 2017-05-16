<?php
session_start();
include 'navbar.php';
include 'dbconnect.php';
$username=$_SESSION['username'];
$user_id=$_SESSION['userid'];

$sql=mysqli_query($conn,"SELECT * from users where user_name='$username'");
$data=mysqli_fetch_array($sql);
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



<hr style="padding :0px ;margin:0px;">


<h3 style="color:#d2cbf3;background-color: #17161a;padding-top: 10px; height: 40px; padding-left: 45%; margin:0px">User Profile

</h3>
<hr style="padding :0px ;margin:0px;">
<div class="white">
<br>
<div class="container">
      <div class="row">
      <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
      
      
<p class=" text-info">Today's Date :- <?php echo date("Y-m-d");?></p>
      </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $data['user_name'];?> </h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img src="data:image/jpeg;base64, <?php echo $data['user_image'];?>" style="width: 130; height:130" class="img-circle"/> </div>
                
                <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                  <dl>
                    <dt>DEPARTMENT:</dt>
                    <dd>Administrator</dd>
                    <dt>HIRE DATE</dt>
                    <dd>11/12/2013</dd>
                    <dt>DATE OF BIRTH</dt>
                       <dd>11/12/2013</dd>
                    <dt>GENDER</dt>
                    <dd>Male</dd>
                  </dl>
                </div>-->
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Name : </td>
                        <td><?php echo $data['user_name'];?></td>
                      </tr>
                      
                   
                         <tr>
                             <tr>
                        <td>Gender</td>
                        <td><?php echo $data['gender']?></td>
                      </tr>
                        <tr>
                        <td>Home Address</td>
                        <td><?php echo $data['location'];?></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><a href="mailto:info@support.com"><?php echo $data['user_email'];?></a></td>
                      </tr>
                        <td>Mobile Number</td>
                        <td><?php echo $data['mobile'];?> </td>
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
                  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Update Profile</button>
                  <a href="logout.php" class="btn btn-primary btn-lg">Log Out</a>
		</div>
                  

                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        
                    </div>
            
          </div>
        </div>
      </div>
    </div>

<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title"><strong>Update Information</strong></h4>
		      </div>
		      <div class="modal-body">
		       
		      		<form method="post" action="userupdate.php" enctype="multipart/form-data">

           		
           		<!--id:<input type="text" name="id">;-->
           		 <div class="form-group">
    				<label for="Enter-Name">Name:</label>
    				<input type="text" class="form-control"  name="Name" value="<?php echo $_SESSION['username'] ?>" >
  				</div>
  				 
  				<div class="form-group">
    				<label for="Enter-Email">Email address:</label>
    				<input type="email" class="form-control" id="Email" placeholder="Email" name="Email" value="<?php echo $data['user_email'] ?>">
  				</div>
 				<div class="form-group">
    				<label for="Enter-Password">Password:</label>
    				<input type="password"  name="Password" value="<?php echo $data['password'] ?>">
  				</div>
  				<div class="form-group">
    				<label for="Mobile">Mobile No.:</label>
    				<input type="longint"  name="mobile" value="<?php echo $data['mobile'] ?>">
  				</div>

  				<div class="form-group">
    				<label for="Image">Profile Image:</label><br>
    				<img src="data:image/jpeg;base64, <?php echo $data['user_image'];?>" style="width:160; height:160;" class="img-thumbnail">
    				<input type="file" name="movie_image" id="movie_image" accept="image/*"  onchange="readURL(this);"/><br/>
    				<img id="show_post_image" src="#" alt="your image"  />
    				
  				</div>



  				<div class="modal-footer">
  				<input type="submit" value="Update" class="btn btn-success pull-left">
  				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  				</div>
  				</form>

</div>
</div>
</div>
</div>
		      </div>
<?php include'footer.php';?>