<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Order Detail-fushiony</title>  
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
					<img src="images/logo.png" alt="" width="100" height="100"/>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="menu.php">Menu</a></li>
						<li class="nav-item"><a class="nav-link" href="shopping-cart.php">Shopping Cart</a></li>
						<li class="nav-item"><a class="nav-link" href="account.php">Account</a></li>
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
					<h1>Order Detail</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	<?php
		include("login-config.php");	
		$userID = $_SESSION['userID'];
		$orderID = "";
		$accessDenied = 1;
		
		if (!empty($_GET['orderID'])) {
			$orderID = $_GET['orderID'];
			$sql1 = "SELECT COUNT(orderID) FROM Orders WHERE orderID=$orderID AND customerID=$userID;";
			$result1 = mysqli_query($conn, $sql1);
			$row1 = mysqli_fetch_array($result1);
			if ($row1['COUNT(orderID)'] == 1){
				$accessDenied = 0;
				
				$sql2 = "SELECT orderDate, address, remark, total FROM Orders WHERE orderID=$orderID AND customerID=$userID;";
				$result2 = mysqli_query($conn, $sql2);
				$row2 = mysqli_fetch_array($result2);
				$orderDate = $row2['orderDate'];
				$address = $row2['address'];
				$remark = $row2['remark'];
				$total = $row2['total'];
				
				$sql3 = "SELECT COUNT(orderID) FROM OrderItems WHERE orderID='$orderID';";
				$result3 = mysqli_query($conn, $sql3);
				$row3 = mysqli_fetch_array($result3);
				$subitem = $row3['COUNT(orderID)'];
				$sql4 = "SELECT itemNo, productName FROM OrderItems, Product WHERE OrderItems.orderID='$orderID' AND OrderItems.productID=Product.productID;";
				$result4 = mysqli_query($conn, $sql4);
			} 
		}
		else{
		//	$accessDenied = 0;
		}

		
		
	?>
	<!-- Start blog -->
	<div class="cart-box">
		<div class="container">
			<div class="row">
                <?php if ($accessDenied == 0){ ?>
				<div class="col-lg-12">
					<div class="heading-title text-center">
					  <h2>Order Detail:</h2>
					</div>
				</div>
				<div>
					<h3>Order ID: &nbsp<?php echo $orderID; ?></h3>
					<h3>Order Date: &nbsp<?php echo $orderDate; ?></h3>
					<h3>Delivery Address: &nbsp<?php echo $address; ?></h3>
					<br>
					<h3>Items Ordered:</h3>
					<div>
					<?php
						for ($i = 0; $i < $subitem; $i++) {
							$row4 = mysqli_fetch_array($result4);
							?>

								<h4>Product Name: &nbsp<?php echo $row4['productName']; ?><br></h4>
								<h4>Quantity: &nbsp<?php echo $row4['itemNo']; ?><br></h4>
								<br><br>
							<?php 
						} 
					?>
					</div>
					<h3>Order Remark: &nbsp<?php echo $remark; ?></h3>
					<h3>Order Total: &nbsp$<?php echo $total; ?></h3>
					<button class="btn btn-common" onclick="document.location='account.php'">Return</button>

				</div>
                <?php }else{ ?>
                    <div class="col-lg-12">
					    <div class="heading-title text-center">
                                <br><br>
					      <h1>ACCESS DENIED</h1>
					    </div>
				    </div>
               <?php } ?>
			</div>
			<div class="row"> </div>
		</div>
	</div>
	<br><br>
	<!-- End blog -->
	
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
	<script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>