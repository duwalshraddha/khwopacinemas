<html>
<head>
<title>
Movie Ticket Booking
</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/mystyle.css">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">


</head>
<body >
<div class="container">
<div class="container">

<nav class="navbar-transparent  " role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
    
      
      <a  href="index.php"><img src="logo/final.png"  alt="our logo" height="90x" width="320px"></a>
    </div>
    
     <ul class="nav navbar-nav navbar-right">
        
        
        <?php if(!isset($_SESSION['username'])) {?>
        <li>
		<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="modal" data-target="#Loginmodalbox" aria-haspopup="true" aria-expanded="false">LOG IN/ SIGN UP</button>
        </li>
        <br>
        <br>
        <br>
        <?php }?>


      <?php if (isset($_SESSION['username'])) { ?>
        
<a href="profile.php"><button class="btn btn-primary" type="button">Welcome <?php echo ($_SESSION['username']); ?>  !!!</button></a>
        
<br>
        <a href="logout.php">
<button class="btn btn-primary dropdown-toggle" type="button">LOG OUT</button></a>
        
        
    

        <?php  } ?>
      </ul>
      </div>
</nav>
<br>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
  <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>
    </div>
   

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home<span class="sr-only">(current)</span></a></li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Movies<span class="caret"></span></a>
          <ul class="dropdown-menu">
          
            <li><a href="nowshowing.php">Now Showing</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="comingsoon.php">Coming Soon</a></li>
          </ul>
        </li>
        
      <li><a href="contact.php">Contact</a></li>

      <?php if(isset($_SESSION['admin'])){ ?>
        <li><a href="updatemovies.php">Update</a></li>
        <li><a href="ticketsbooked.php">Tickets Booked</a></li>
      <?php } ?>
    
     <?php if (isset($_SESSION['username'])) { ?>

        <li><a href="mytickets.php"> My Tickets </a> </li>
        </ul> 
 <?php  } ?>
 	</ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a  class="fa fa-facebook" href="#"> </a></li>
      </ul>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!--Grey background suru-->
<div class="white">



<!--modal box ko start-->

<div class="modal fade" tabindex="-1" role="dialog" id="Loginmodalbox">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">LOG IN</h4>
      </div>
      <div class="modal-body">
        <FORM method="POST" action="signin.php">
          <div class="form-group">
                    <label for="username" class="col-sm-3 control-label">Username:</label>
                    <div class="col-sm-9">
                        <input type="username" id="username" placeholder="Username" class="form-control" name="username">
                    </div>
                    </div>
          &nbsp
                    
          <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password:</label>
                    <div class="col-sm-9">
                        <input type="password" id="password" placeholder="Password" class="form-control" name="password">
                        &nbsp
                    </div>
                </div>


 

          <div align="right" style="position:relative;">
          Forgot your Password? <input type=submit class="btn btn-info" value="Submit">


          </div>
          <div style="position: absolute;">

                Login with Facebook <a class="fa fa-facebook"></a>
              </div>
               </FORM>

          
          

          
      </div>
      <div class="modal-footer">

       Don't have an Account? <a href="register.php" >
        <button type="button" class="btn btn-danger">Register</button></a>

      </div>
      <?php include'footer.php';?>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>


</html>