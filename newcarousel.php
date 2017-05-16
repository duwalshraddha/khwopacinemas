
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators ">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">

<?php
  $sql1="SELECT * from carausel where carausel_id='1'";
  $query1=mysqli_query($conn,$sql1);
  $car1=mysqli_fetch_array($query1);
    ?>

    
	 <img src="data:image/jpeg;base64, <?php echo ($car1['carausel_image']);?>" style="width: 100%; height:50%">
     
    </div>




    <div class="item" >


    <?php
  $sql2="SELECT * from carausel where carausel_id='2'";
  $query2=mysqli_query($conn,$sql2);
  $car2=mysqli_fetch_array($query2);
    ?>
      <img src="data:image/jpeg;base64, <?php echo ($car2['carausel_image']);?>" style="width: 100%; height:50%">
      
    </div>
 
   <div class="item">

<?php
  $sql3="SELECT * from carausel where carausel_id='3'";
  $query3=mysqli_query($conn,$sql3);
  $car3=mysqli_fetch_array($query3);
    ?>

      <img src="data:image/jpeg;base64, <?php echo ($car3['carausel_image']);?>" style="width: 100%; height:50%">
      
    </div>



<div class="item">

<?php
  $sql4="SELECT * from carausel where carausel_id='4'";
  $query4=mysqli_query($conn,$sql4);
  $car4=mysqli_fetch_array($query4);
    ?>

      <img src="data:image/jpeg;base64, <?php echo ($car4['carausel_image']);?>" style="width: 100%; height:50%">
      
    </div>


    
  </div>



  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
