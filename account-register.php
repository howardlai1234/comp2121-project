<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Live Dinner Restaurant - Responsive HTML5 Template</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">    
	<!-- Pickadate CSS -->
    <link rel="stylesheet" href="css/classic.css">    
	<link rel="stylesheet" href="css/classic.date.css">    
	<link rel="stylesheet" href="css/classic.time.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="index.html">
					<img src="images/logo.png" alt=""  width="100" height="100"/>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
							<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
							<li class="nav-item active"><a class="nav-link" href="account-register.php">Registration</a></li>
						</ul>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	
	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
				  <h1>Registration</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	<?php
    	include("login-config.php");
		$username = $password = $rePassword = $pw_hash = $email = $phone = $address = $message = "";
		$generalError = $usernameError = $passwordError = $emailError = $phoneError = $addressError = "";
		$errorCount = 0;
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$rePassword = $_POST['repassword'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$address = $_POST['address'];
			
			$sql = "SELECT COUNT(accountID) FROM Account WHERE accountName='$username'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_array($result);
			if ($row['COUNT(accountID)'] == 1) {
				$usernameError = "ERROR: User Name already in use";
				$errorCount++;
			}
			
			if ($password != $rePassword){
				$passwordError = "Error: The two password must be identital.";
				$errorCount++;
			}
			else {
				$pw_hash = hash("sha256", $password);
			}
			
			$sql = "SELECT COUNT(accountID) FROM Account WHERE email='$email'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_array($result);
			if ($row['COUNT(accountID)'] == 1) {
				$emailError = "ERROR: email address already in use";
				$errorCount++;
			}
			
			if ($phone < 10000000 || $phone >99999999){
				$phoneError = "ERROR: phone Number format incorrect";
				$errorCount++;
			}
			
			if ($errorCount == 0) {
				$sql = "INSERT INTO Account (accountName, joinDate, email, phoneNo, address, passwordHash, administrator) VALUES
							('$username', CURDATE() ,'$email' ,'$phone', '$address', '$pw_hash', FALSE)";
				if (mysqli_query($conn, $sql)) {
                	$message = "A new account created successfully, Please login on the login page";
            	}
				else {
					$generalError = "ERROR: Fail to create a new account, please try again later";
				}
			}
			else{
				$generalError = "There are error(s) in the form, please double check.";
			}
		}
	?>
	<!-- Start Reservation -->
	<div class="reservation-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
					  <h2>Registration</h2>
					  <p>Please enter your personal detail to register an account </p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-sm-12 col-xs-12">
					<div class="contact-block">
						<form id="RegistrationForm" action = "" method = "post">
							<div class="row">
								<div class="col-md-6">
			    					<h3>Contact Details</h3>
									<h5 style="color:red;">**Please enter all fields**</h5>
									<h3 style='color:red;'><?php echo $generalError; ?></h3>
									<h3 style='color:green;'><?php echo $message; ?></h3>
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" class="form-control" id="name" name="username" placeholder="Username" required data-error="Username cannot be empty">
											<div class="help-block with-errors"></div>
											<h5 style='color:red;'><?php echo $usernameError; ?></h5>
										</div>                                 
									</div>
									<div class="col-md-12">
										<div class="form-group">
										  <input type="password" class="form-control" id="passweord" name="password" placeholder="Password" required data-error="password cannot be empty">
											<div class="help-block with-errors"></div>
										</div>                                 
									</div>
									<div class="col-md-12">
										<div class="form-group">
										  <input type="password" class="form-control" id="repassweord" name="repassword" placeholder="Re-enter password" required data-error="Please re-enter yout password">
											<div class="help-block with-errors"></div>
											<h5 style='color:red;'><?php echo $passwordError; ?></h5>
										</div>                                 
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" placeholder="Your Email" id="email" class="form-control" name="email" required data-error="Email cannot be empty">
											<div class="help-block with-errors"></div>
											<h5 style='color:red;'><?php echo $emailError; ?></h5>
										</div> 
									</div>
	
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" placeholder="Phone Number" id="phone" class="form-control" name="phone" required data-error="Phone Number cannot be empty">
											<div class="help-block with-errors"></div>
											<h5 style='color:red;'><?php echo $phoneError; ?></h5>
										</div> 
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" placeholder="Address" id="address" class="form-control" name="address" required data-error="Address cannot be empty">
											<div class="help-block with-errors"></div>
										</div> 
									</div>

							  </div>
								<div class="col-md-12">
									<div class="submit-button text-center">
										<button class="btn btn-common" id="submit" type="submit">Register</button>
										<div id="msgSubmit" class="h3 text-center hidden"></div> 
										<div class="clearfix"></div> 
									</div>
								</div>
							</div>            
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Reservation -->
	
	<!-- Start Customer Reviews -->	<!-- End Customer Reviews -->
	
	<!-- Start Contact info -->
	<div class="contact-imfo-box">
		<div class="container">
			<div class="row">
				<div class="col-md-4 arrow-right">
					<i class="fa fa-volume-control-phone"></i>
					<div class="overflow-hidden">
						<h4>Phone</h4>
						<p class="lead">
							+01 123-456-4590
						</p>
					</div>
				</div>
				<div class="col-md-4 arrow-right">
					<i class="fa fa-envelope"></i>
					<div class="overflow-hidden">
						<h4>Email</h4>
						<p class="lead">
							yourmail@gmail.com
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-map-marker"></i>
					<div class="overflow-hidden">
						<h4>Location</h4>
						<p class="lead">
							800, Lorem Street, US
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact info -->
	
	<!-- Start Footer -->
	<footer class="footer-area bg-f">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<h3>About Us</h3>
					<p>Integer cursus scelerisque ipsum id efficitur. Donec a dui fringilla, gravida lorem ac, semper magna. Aenean rhoncus ac lectus a interdum. Vivamus semper posuere dui.</p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Subscribe</h3>
					<div class="subscribe_form">
						<form class="subscribe_form">
							<input name="EMAIL" id="subs-email" class="form_input" placeholder="Email Address..." type="email">
							<button type="submit" class="submit">SUBSCRIBE</button>
							<div class="clearfix"></div>
						</form>
					</div>
					<ul class="list-inline f-social">
						<li class="list-inline-item"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Contact information</h3>
					<p class="lead">Ipsum Street, Lorem Tower, MO, Columbia, 508000</p>
					<p class="lead"><a href="#">+01 2000 800 9999</a></p>
					<p><a href="#"> info@admin.com</a></p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Opening hours</h3>
					<p><span class="text-color">Monday: </span>Closed</p>
					<p><span class="text-color">Tue-Wed :</span> 9:Am - 10PM</p>
					<p><span class="text-color">Thu-Fri :</span> 9:Am - 10PM</p>
					<p><span class="text-color">Sat-Sun :</span> 5:PM - 10PM</p>
				</div>
			</div>
		</div>
		
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<p class="company-name">All Rights Reserved. &copy; 2018 <a href="#">Live Dinner Restaurant</a> Design By : 
					<a href="https://html.design/">html design</a></p>
					</div>
				</div>
			</div>
		</div>
		
	</footer>
	<!-- End Footer -->
	
	<a href="#" id="back-to-top" title="Back to top" style="display: none;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>

	<!-- ALL JS FILES -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
	<script src="js/jquery.superslides.min.js"></script>
	<script src="js/images-loded.min.js"></script>
	<script src="js/isotope.min.js"></script>
	<script src="js/baguetteBox.min.js"></script>
	<script src="js/picker.js"></script>
	<script src="js/picker.date.js"></script>
	<script src="js/picker.time.js"></script>
	<script src="js/legacy.js"></script>
	<script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>