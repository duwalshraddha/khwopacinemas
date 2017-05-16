<?php
session_start();
include 'dbconnect.php';
include 'navbar.php';

?>
<script type="text/javascript">
function cancel()	{
var txt;
var r = confirm("Are you sure you want to cancel the ticket?");
if (r == true) {
    
} else {
    event.preventDefault();
}
}
</script>

 &nbsp
<div class="page-header" style="padding: 0px">
  <h1>Your Tickets <br/><small>&nbsp	Please come one hour before the booking time</small><br/>
  <small>&nbsp	Your confirmation code is #<?php echo $_SESSION['code'];?></small></h1>
</div>
<?php
$name=$_SESSION['username'];


 $sql = "SELECT * from booking where username='$name' ";
      $sql=mysqli_query($conn,$sql);
       
      ?>  
<table class="table table-striped">
  <tr> 
 <th> #User id</th>
 <th> #User Name</th>
 <th> Movie Name</th>
 <th> Show Date</th>
 <th> Show Time </th>
 <th> Number of tickets </th>
 <th> Total Price </th>
 <th>Cancel Ticket</th>
 </tr>
 <?php
while($ticket=mysqli_fetch_array($sql)){ ; 
 ?>
 <tr>
 <td><?php echo $ticket['user_id'];?></td>
 <td><?php echo $ticket['username'];?></td>
 <td><?php echo $ticket['booked_movie_name'];?></td>
 <td><?php echo $ticket['Datee'];?></td>
 <td><?php echo $ticket['Timee'];?></td>
 <td><?php echo $ticket['no_of_seats'];?></td>
 <td><?php echo $ticket['no_of_seats']*450;?></td>
 <td><?php echo "<a href='cancelticket.php?booking_id=".$ticket['booking_id']."&user_id=".$ticket['user_id']."' class='btn btn-primary' role='button' data-dismiss='alert' onclick='cancel()'>Cancel Ticket</a>" ?></td>

 </tr>
 <?php 
}

?>
</table>



<br/>
Note :- Confirmation code is for confirmation for your profile.
<?php
include 'footer.php';

?>


