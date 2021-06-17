<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>My account-fushiony</title>  
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
				<a class="navbar-brand" href="menu.php">
					<img src="images/logo.png" alt=""  width="100" height="100"/>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
						<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="menu.php">Menu</a></li>
						<li class="nav-item "><a class="nav-link" href="shopping-cart.php">Shopping Cart</a></li>
						<li class="nav-item active"><a class="nav-link" href="account.php">Account</a></li>
						<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
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
				  <h1>My fushiony</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	<?php
    	include("login-config.php");
		$userID = $username = $password = $rePassword = $pw_hash = $email = $phone = $address = $message = $message2 = "";
		$generalError = $usernameError = $passwordError = $emailError = $phoneError = $addressError = $generalError2 = "";
		$ordercount = 0;
		$username = $_SESSION['username'];
		$userID = $_SESSION['userID'];
		$sql = "SELECT accountName, email, phoneNo, address FROM Account WHERE accountID='$userID';";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		$username = $row['accountName'];
		$email = $row['email'];
		$phone = $row['phoneNo'];
		$address = $row['address'];
			
		$errorCount = $updatecount = 0;
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			

			if (!empty($_POST['changePassword']) ){
				$oldpassword = $_POST['OLDpassword'];
				$newpassword = $_POST['NEWpassword'];
				$newrepassword = $_POST['NEWrepassword'];
				$old_hash = hash("sha256", $oldpassword);
				$sql2 = "SELECT passwordHash FROM Account WHERE accountID='$userID';";
				$result2 = mysqli_query($conn, $sql2);
				$row2 = mysqli_fetch_array($result2);
				if ($row2['passwordHash'] == $old_hash){
					if ($newpassword != $newrepassword){
						$passwordError = "Error: The two password must be identital.";
						$errorCount++;
					}
					else {
						$pw_hash = hash("sha256", $newpassword);
						$sql2 = "UPDATE Account 
								SET passwordHash='$pw_hash'
								WHERE accountName='$username';";
						if (mysqli_query($conn, $sql2)) {
							$message2 = "Password updated successfully";
						}
						else {
							$generalError2 = "ERROR: Fail to update password, please try again later";

						}
					}
				}
				else{
					$generalError2 = "your old pasasword does not match record";
				}
			}
			if (!empty($_POST['email'])){
				$updatecount++;
				$email = $_POST['email'];
				$sql = "SELECT COUNT(accountID) FROM Account WHERE email='$email'";
				$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_array($result);
				if ($row['COUNT(accountID)'] == 1) {
					$emailError = "ERROR: email address already in use";
					$errorCount++;
					
				}
			}
			if (!empty($_POST['phone'])){
				$updatecount++;
				$phone = $_POST['phone'];
				if ($phone < 10000000 || $phone >99999999){
					$phoneError = "ERROR: phone Number format incorrect";
					$errorCount++;
				}
			}
			if (!empty($_POST['address'])){
				$address = $_POST['address'];
				$updatecount++;
			}
			if ($errorCount == 0) {
				if ($updatecount !=0){
					//echo "{Prepare for Insert}";
					$sql = "UPDATE Account 
							SET email='$email',phoneNo='$phone', address='$address'
							WHERE accountName='$username';";
					#$sql = "INSERT INTO account (accountName, joinDate, email, phoneNo, address, passwordHash, administrator) VALUES
					#			('$username', CURDATE() ,'$email' ,'$phone', '$address', '$pw_hash', FALSE)";
					//echo $sql;
					if (mysqli_query($conn, $sql)) {
						$message = "Account updated successfully";
					}
					else {
						$generalError = "ERROR: Fail to update, please try again later";
					}
				}
			}
			else{
				$generalError = "There are error(s) in the form, please double check.";
			}
		}
	
		
		/*GET the number of order by this user*/
		$sql_order_count = "SELECT COUNT(orderID) FROM Orders WHERE customerID='$userID';";
		//echo $sql_order_count;
		$result_order_count = mysqli_query($conn, $sql_order_count);	
		$row_ordercount = mysqli_fetch_array($result_order_count);
		$ordercount = $row_ordercount['COUNT(orderID)'];
		//echo $ordercount;
		/*GET the noumber of order by this user*/
		$sql_order_history = "SELECT orderID, orderDate, total FROM Orders WHERE customerID='$userID';";
		$result_order_history = mysqli_query($conn, $sql_order_history);

	?>
	<!-- Start Reservation -->
	<div class="reservation-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
					  <h2>Personal details</h2>
					  <p>please tick the check box if you wish to change it </p>
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
									<h3 style='color:red;'><?php echo $generalError; ?></h3>
									<h3 style='color:red;'><?php echo $generalError2; ?></h3>
									<h3 style='color:green;'><?php echo $message; ?></h3>
									<h3 style='color:green;'><?php echo $message2; ?></h3>
									<div class="col-md-12">
										<div class="form-group">
										  <input type="checkbox" id=changePassword name='changePassword' value=true>
											<label for='changePassword'> Change Password</label>
										  <input type="password" class="form-control" id="OLDpassweord" name="OLDpassword" placeholder="Old Password" >
										</div>                                 
									</div>
									<div class="col-md-12">
										<div class="form-group">
										  <input type="password" class="form-control" id="NEWpassweord" name="NEWpassword" placeholder="News Password">
										</div>                                 
									</div>
									<div class="col-md-12">
										<div class="form-group">
										  <input type="password" class="form-control" id="NEWrepassword" name="NEWrepassword" placeholder="Re-enter new password">
											<h5 style='color:red;'><?php echo $passwordError; ?></h5>
										</div>                                 
									</div>
									<div class="col-md-12">
										<div class="form-group">
										  <input type="checkbox" id=changeEmail name='changeEmail' value=true>
											<label for='changEmail'> Change Email<br></label>
											<p>Current Email:&nbsp <?php echo $email; ?></p>
											<input type="text" placeholder="" id="email" class="form-control" name="email" >
											<h5 style='color:red;'><?php echo $emailError; ?></h5>
										</div> 
									</div>
	
									<div class="col-md-12">
										<div class="form-group">
										  <input type="checkbox" id=changePhone name='changePhone' value=true>
											<label for='changPhone'> Change Phone Number<br></label>
											<p>Current phone:&nbsp <?php echo $phone; ?></p>
											<input type="text" placeholder="" id="phone" class="form-control" name="phone" ></div>
											<h5 style='color:red;'><?php echo $phoneError; ?></h5>
										</div> 
									</div>
									<div class="col-md-12">
										<div class="form-group">
										  <input type="checkbox" id=changeAddress name='changeAddress' value=true>
											<label for='changAddress'> Change Address<br></label>
											<p>Current Address:&nbsp <?php echo $address; ?></p>
											<input type="text" placeholder="" id="address" class="form-control" name="address">
										</div> 
									</div>

							  </div>
								<div class="col-md-12">
									<div class="submit-button text-center">
										<button class="btn btn-common" id="submit" type="submit">Change</button>
										<div id="msgSubmit" class="h3 text-center hidden"></div> 
										<div class="clearfix"></div> 
									</div>
								</div>
							</div>            
						</form>
					</div>
				</div>
			</div>
			<div class="container">
			  <div class="row">
				<div class="col-lg-12">
						<div class="heading-title text-center">
							<br><br>
						  <h2>Order History</h2>
						
						</div>
					</div>
					<div>				
						<?php
							for ($i = 0; $i < $ordercount; $i++) {
								$row_order_history = mysqli_fetch_array($result_order_history);
							?>

								<h3>OrderID: &nbsp<?php echo $row_order_history['orderID']; ?><br></h3	>
								<h4 style="color:orangered;">Price: $<?php echo $row_order_history['total']; ?></h4>
								<h4>Date &nbsp<?php echo $row_order_history['orderDate']; ?><br></h4>
								<button class="btn btn-common" onclick="document.location='order-detail.php?orderID=<?php echo $row_order_history['orderID']; ?>'">Order Detail</button>
								<br><br>
							<?php 
							} 
						?>
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
							3456 7890
						</p>
					</div>
				</div>
				<div class="col-md-4 arrow-right">
					<i class="fa fa-envelope"></i>
					<div class="overflow-hidden">
						<h4>Email</h4>
						<p class="lead">
							fushiony@gmail.com
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-map-marker"></i>
					<div class="overflow-hidden">
						<h4>Location</h4>
						<p class="lead">
							11 Yuk Choi Rd, Hung Hom, Hong Kong
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
					<p>
					Every meal is fully pack with nutrients designed by our passionate professional chefs and conveniently delivered to you.
					We want to help you feel your best during your busy work schedule by serving you with
					all natural and delicious meals free from any preservatives and MSG.
					We pay full attention in every ingredients that we select for each meal
					and we don't add any more or any less than what is is necessary for the meal.</p>
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
					<p class="lead">11 Yuk Choi Rd, Hung Hom, Hong Kong</p>
					<p class="lead"><a href="#">3456 7890 </a></p>
					<p><a href="#"> info@admin.com</a></p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Opening hours</h3>
					<p><span class="text-color">Monday: </span> 9:30 A.M. - 8 P.M.</p>
					<p><span class="text-color">Tue-Wed :</span> 9:30 A.M. - 8 P.M.</p>
					<p><span class="text-color">Thu-Fri :</span> 9:30 A.M. - 8 P.M.</p>
					<p><span class="text-color">Sat-Sun :</span> 11:30 A.M. - 6 P.M.</p>
				</div>
			</div>
		</div>
		
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<p class="company-name">All Rights Reserved. &copy; 2020 <a href="#">Fushiony</a>
					</p>
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