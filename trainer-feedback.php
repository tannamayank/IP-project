<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Gym management</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="site.php">Cliffy's Gymnasium</a>
	      <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          </button>
          <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav nav ml-auto">
              <li class="nav-item"><a href="trainerwelcome.php" class="nav-link"><span>Profile</span></a></li>
              <li class="nav-item"><a href="trainer-users.php" class="nav-link"><span>Users</span></a></li>
              <li class="nav-item"><a href="trainer-feedback.php" class="nav-link"><span>Feedbacks</span></a></li>
              <li class="nav-item"><a href="logout.php" class="nav-link"><span>Log Out</span></a></li>
</ul>
</div>
</div>
          </nav>
          <br><br><br><br><br><br><br>

          <div class="row justify-content-center mb-5 pb-3">
		<div class="col-md-7 heading-section text-center ftco-animate">
			<span class="subheading" style="color: #42c0fb;"><strong>Trainer Access</strong></span>
			<h2 class="mb-4">Feedbacks</h2>
		</div>
	</div>
            
			<div style = "margin : 40px 40px 40px 40px;">
			  <div class="bg-light p-4 p-md-5 contact-form">
				<div class="form-group" style="text-align : center; font-size : 20px;">

        <?php
session_start();
if(!$_SESSION['IsLogged'])
{
    session_destroy();
    header("location:errorpage.php");
}
include('mysqlconnection.php');
?>

<?php

$trainer_id = $_SESSION['trainer_id'];

$sql = "SELECT * FROM customer_trainer_feedback where trainer_id like '$trainer_id';";

if(($result=$conn->query($sql))->num_rows>0)
{
  //$_SESSION["feedback_exist"] = FALSE;

  #if(($result=$conn->query($sql))->num_rows>0)
  #{

    while($row=$result->fetch_assoc())
    { 
      //echo "<h1>here</h1>";
      echo "<table style='margin : auto;'>";
      $customer_id = (int)$row['customer_id'];
      #echo $customer_id;
      $trainer_id = (int)$row['trainer_id'];
      $feedback = $row['feedback'];
      $rating = $row['trainer_rating'];
      $feedback_date = $row['feedback_date'];
      $sql1 = "SELECT name from customer where customer_id like '$customer_id'";
      if(($result1=$conn->query($sql1))->num_rows>0)
      {
      //echo "<h1>here</h1>";
      #$resut1 = $conn->query($sql1);  
      $row1 = $result1->fetch_assoc();
      $customer_name = $row1['name'];
      #echo $customer_name;
      }
      else{
        continue;
      }
      
      echo "<tr><td colspan='12'><a href='admin-customerprofile.php?data=".$customer_id."' style='color : #42c0fb;'>".$customer_name."</a> Says : </td><td colspan='12'>".$feedback_date."</td></tr>";
      echo "<tr><td>".$feedback."</td></tr>";
      echo "<tr><td>Rating: ".$rating."</td></tr>";
      echo "</table>";
      }
      
      echo "</div>";

      


  #}

  #else{
  #  echo"<h2>No Feed back recorded</h2>";
#  }

}
else{
  echo"<h2>No Feed back recorded</h2>";
}

?>
<br>
<br>
<?php

$trainer_id = $_SESSION['trainer_id'];

$sql = "SELECT AVG(trainer_rating) FROM customer_trainer_feedback where trainer_id like '$trainer_id';";
if(($result=$conn->query($sql))->num_rows>0)
{
  $row = $result->fetch_assoc();
  $rating = (float)$row['AVG(trainer_rating)'];
  echo "<label style='margin-left : 500px;'>The average rating is ".$rating."</label>";
}

?>

</div>
</div>
</div>


    <footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">About <span><a href="index.html">Slim.</a></span></h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Links</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Home</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>About</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Services</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Cocahes</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Schedule</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Services</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Gym Fitness</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Crossfit</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Yoa</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Aerobics</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">


            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  
  <script src="js/main.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script>
  $('#user-facility-feedback-div').hide();
  $('#user-facility-feedback').on('click',function(){

  $('#user-facility-feedback-div').toggle();

  });

  </script>
    
  </body>
</html>