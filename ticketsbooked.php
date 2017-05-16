<?php
session_start();
include 'dbconnect.php';
include 'navbar.php';
$datetime=new Datetime('tomorrow');
$newdatetime=new Datetime('tomorrow');
$newdatetime->modify('+1 day');
?>
<script type="text/javascript">
function cancel()	{
var txt;
var r = confirm("Are you sure you have Reserved the ticket for the user?");
if (r == true) {
    
} else {
    event.preventDefault();
}
}

function rem()	{
var txt;
var r = confirm("Are you sure you want to delete the shift tickets?");
if (r == true) {
    
} else {
    event.preventDefault();
}
}
</script>
&nbsp
<br>
<button type="button" class="btn btn-info btn-lg pull-right" data-toggle="modal" data-target="#deleteModal">Delete time up tickets</button>
 <!-- Modal -->
  <div class="modal fade" id="deleteModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete shift tickets</h4>
        </div>
        <div class="modal-body">
            
            <!-- post form START -->
        <div class="post-form">
          <form id="remove_post" action="deleteshowtimetickets.php" method="POST" >

            <div class="form-group">
 			Select date :-  <select name="date">
						  <option value=<?php echo date("Y-m-d");?>><?php echo date("Y-m-d");?></option>
						 <option value=<?php echo $datetime->format("Y-m-d");?>><?php echo $datetime->format("Y-m-d");?></option>
						  <option value=<?php echo $newdatetime->format("Y-m-d");?>><?php echo $newdatetime->format("Y-m-d");?></option>

						</select>       
            

 			</div>
            <div class="form-group">
			Select Time :- <select name="time">
						<option value=7:00 AM >7:00 AM</option>
						<option value=12:00 PM>12:00 PM</option>
						<option value=4:00 PM>4:00 PM</option>
						</select>
			</div>
            
            
            <input type="submit" name="posts" value="Remove" class="btn-primary-btn" onclick='rem()'>
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


<div class="page-header" style="padding: 0px">
  <h1>Tickets <small>Booked by different users</small></h1>



</div>
<?php
      $sql = "SELECT * from booking";
      $sql=mysqli_query($conn,$sql);
    	
      
      
      ?>
<table class="table table-condensed">
 <tr> 
 <th> #Booking ID</th>
 <th> #User ID</th>
 <th> User Name</th>
 <th> Movie  Name</th>
 <th> Show time</th>
 <th> Show date </th>
 <th> Number of Tickets </th>
  <th> Ticket Reserved </th>
 </tr>

 <?php
  while($ticket=mysqli_fetch_array($sql)){;

      ?>
 <tr> 
 <td> <?php echo $ticket['booking_id']; ?></td>
 <td> <?php echo $ticket['user_id']; ?></td> 
 <td> <?php echo $ticket['username']; ?></td>
 <td> <?php echo $ticket['booked_movie_name']; ?>e</td>
 <td> <?php echo $ticket['Timee']; ?></td>
 <td> <?php echo $ticket['Datee']; ?> </td>
 <td><?php echo $ticket['no_of_seats']; ?></td>
 <td> <?php echo "<a href='reserved.php?booking_id=".$ticket['booking_id']."&user_id=".$ticket['user_id']."'class='btn btn-primary' role='button' onclick='cancel()' >Reserved</a>" ?> </td>
 </tr>
 <?php }?>
</table>

<?php

include'footer.php';
?>