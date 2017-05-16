<?php
session_start();
include'dbconnect.php';
include'navbar.php';

$date=$_POST['date'];
$time=$_POST['time'];
$a_id=$_GET['a_id'];
$movie_name=$_POST['movie_name'];
$m_id=$_POST['movie_id'];
$sql = "SELECT * from movie where movie_id='$m_id'";
$query=mysqli_query($conn,$sql);
$movie=mysqli_fetch_array($query);



//echo $date."\n".$time."\n".$a_id;

?>


<div class="demo">

  			
			
   		<div id="seat-map">
			<div class="front">SCREEN</div>					
		</div>
		
		
		<div class="booking-details">
		<br><br>

		<form method="POST" action="booking.php?a_id=<?php echo $movie['audiorium_id'];?>" id="bookform" name="bookform">
			<div class="form-group">	
			<p>Movie: <span> <input type=text name="movie_name" value="<?php echo $movie['movie_name']?>" readonly></span></p>
			<input type=hidden name="movie_id" value="<?php echo $movie['movie_id']?>">
			<input type=hidden name="date" value="<?php echo $date?>">
			<input type=hidden name="time" value="<?php echo $time?>">

			</div>
		


			<div class="form-group">
			
			<p>Seat: </p>

			</div>
			<ul id="selected-seats"></ul>

			<div class="form-group">
				<p>Tickets: <span id="counter">0</span></p>
				<input type=hidden name="counterliney" id="counterliney" value="">
				


					
				<input type=hidden name="seat" id="seat" value="">
			</div>



			<p>Total: <b>Rs.<span id="total">0</span></b></p>
			<button class="btn btn-info btn">Book</button>
				</form>	
			<!--<button class="checkout-button">Book</button>-->
					
			<div id="legend"></div>
		</div>
		<div style="clear:both"></div>
   </div>


</div>




<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.seat-charts.min.js"></script> 
<!-- <script type="text/javascript" src="js/yoyo.js"></script> 	 -->
<?php

include 'footer.php'
?>

<?php 

				$sql5="SELECT * from seats where Dateee='$date' and Timeee='$time' and auditorium_id='$a_id'";
				$qury=mysqli_query($conn,$sql5);
				$sum="";
				while ($result=mysqli_fetch_array($qury)){;
				 $r=substr($result['row'],-1);

					$c=substr($result['col'],-1);
				$con=$r.'_'.$c; 
				$sum=$sum.'+'.$con;
				

				
				
				

			 } echo $sum;
				?>

		



<?php $s="['2_3','3_5','4_5']" ?>
<script type="text/javascript">
	var price = 450; //price
$(document).ready(function() {
	var $cart = $('#selected-seats'), //Sitting Area
	$counter = $('#counter'), //Votes
	$total = $('#total'); //Total money
	
	var sc = $('#seat-map').seatCharts({
		map: [  //Seating chart
			'__aaaaaa__',
            'aaaaaaaaa_',
            '__________',
            '_aa_aa_aa_',
            'aaaaaaaaa_',
			'aaaaaaaaa_',
			'aaaaaaaaa_',
			'aaaaaaaaa_',
			'aaaaaaaaa_',
            //'__________'
		],
		naming : {
			top : false,
			getLabel : function (character, row, column) {
				return column;
			}
		},
		legend : { //Definition legend
			node : $('#legend'),
			items : [
				[ 'a', 'available',   'available' ],
				[ 'a', 'unavailable', 'Booked']
			]					
		},
		click: function () { //Click event
			if (this.status() == 'available') { //optional seat
				$('<li>R'+(this.settings.row+1)+',S'+this.settings.label+'</li>')
					.attr('id', 'cart-item-'+this.settings.id)
					.data('seatId', this.settings.id)
					.appendTo($cart);

				$counter.text(sc.find('selected').length+1);
				$total.text(recalculateTotal(sc)+price);
							
				return 'selected';
			} else if (this.status() == 'selected') { //Checked
					//Update Number
					$counter.text(sc.find('selected').length-1);
					//update totalnum
					$total.text(recalculateTotal(sc)-price);
						
					//Delete reservation
					$('#cart-item-'+this.settings.id).remove();
					//optional
					return 'available';
			} else if (this.status() == 'unavailable') { //sold
				return 'unavailable';
			} else {
				return this.style();
			}
		}
	});
	//sold seat
	//
	

// sc.get(['2_4','7_6']).status('unavailable');
	
		
});
//sum total money
function recalculateTotal(sc) {
	var total = 0;
	sc.find('selected').each(function () {
		total += price;
	});
			
	return total;
}





//to navigate to bookingpage
$(document).ready(function(){
	  $( "#bookform" ).submit(function(event) {
    var  counter = $("#counter").text();
    // event.preventDefault();
    $("#counterliney").val(counter);
    var seat=null;
    $('#selected-seats li').each(function (i) {
        var index = $(this).text();
      	seat = seat +","+ index;
    }); 
    
	    $("#seat").val(seat);

	    if (counter>8)
	    	{ alert("You can only book 8 tickets. Thank you!!!");
	    		event.preventDefault();
	    	}
	    	else{
			var r = confirm("Are you sure,you want to book ticket!");
			if (r == true) {
	    		
			} else {
			    event.preventDefault();
			}
		}
			    
	});
});


</script>
<script type=text/javascript>
				var sum = "<?php echo $sum; ?>";
				var res = sum.split("+");
					$(document).ready(function(){
						var i;
						for (i = 1; i < res.length; ++i) {
    						   $("#"+res[i]).removeClass('available').addClass('unavailable');

						}

   					});	








				</script>





