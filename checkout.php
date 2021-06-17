<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Checkout-fushiony</title>  
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
					<h1>Checnkout</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	<?php
		include("cart-config.php");	
		$userID = $_SESSION['userID'];
		$accountAddress = $orderAddress = $remark = "";
		$emptyerror = $addresserror = "" ;
		$cartItem = $overallPrice = $empty = $orderID = $errorcount = $delivery_charge = 0;
		
		$sql = "SELECT COUNT(productID) FROM ShoppingCart WHERE accountID=$userID;";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		if ($row != "")
		{
			$cartItem = $row['COUNT(productID)'];
			$sql = "SELECT Product.productName, Product.price, ShoppingCart.qty, ShoppingCart.productID 
					FROM Product, ShoppingCart 
					WHERE Product.productID=ShoppingCart.productID AND ShoppingCart.accountID=$userID;";
			if ($cartItem == 0) {
				$empty = 1;
				$emptyerror = "The cart is empty";
			}
			$result = mysqli_query($conn, $sql);
			$result3 = $result;
			$result5 = $result;
			$sql = "SELECT address FROM Account WHERE accountID=$userID";
			//echo $sql;
			$result2 = mysqli_query($conn, $sql);
			$row2 = mysqli_fetch_array($result2);
			$accountAddress = $row2['address'];

		//	for ($i = 0; $i < $cartItem; $i++){
		//		$row = mysqli_fetch_array($result);
		//		echo $row['productName'],$row['qty'];
		//		echo "<br>";
		//	}
		}
		else
		{
			$empty = 1;
			$emptyerror = "The cart is empty";
		}
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			if ($empty == 0){
				if ($_POST['address'] == "exist"){
					$orderAddress = $accountAddress;
				}
				else {
					if (!empty($_POST['newaddress'])){
						$orderAddress = $_POST['newaddress'];
						}
				}
				$remark = $_POST['remark'];
				if (!empty($_SESSION['overallPrice'])){ $overallPrice = $_SESSION['overallPrice']; }
				if($orderAddress != ""){
					// get the last orderID FROM DB
					$sql = "SELECT MAX(orderID) FROM Orders;";
					//echo $sql;
					$result4 = mysqli_query($conn, $sql);
					$row4 = mysqli_fetch_array($result4);
					if ($row4 == "") { $orderID = 1;}
					else { $orderID = $row4['MAX(orderID)'] + 1;}
					if ($overallPrice < 400){
						$delivery_charge = 1;
						$overallPrice = $overallPrice + 100;
					}
					$sql = "INSERT INTO Orders (orderID, customerID, orderDate, address, competed, remark, total) VALUES
								($orderID, $userID, CURDATE(), '$orderAddress', FALSE, '$remark', $overallPrice);";
					//echo $sql;
					if (mysqli_query($conn, $sql)) {
                	//	echo "Order Created Successfully";
            		}
					else {
						echo "ERROR: Fail to create a new order, please try again later;";
						$errorcount++;
					}
					for ($x = 0; $x < $cartItem; $x++) {
						$row = mysqli_fetch_array($result3);
						$qty2 = $row['qty'];
						$productID2 = $row['productID'];
						$sql = "INSERT INTO OrderItems (orderID, itemNo, productID) VALUES
									($orderID, $qty2, $productID2 )";
						echo $sql;
						if (mysqli_query($conn, $sql)) {
                		//	echo "Item Added Successfully";
            			}
						else {
							echo "ERROR: Fail to create a new item, please try again later;";
							$errorcount++;
						}
						$sql_delete = "DELETE FROM ShoppingCart WHERE accountID=$userID;";
						if (mysqli_query($conn, $sql_delete)) {
                		//	echo "Item Added Successfully";
            			}
						else {
							echo "ERROR: something went wrong, please try again later;";
							$errorcount++;
						}

					}
					if ($delivery_charge == 1) {
						$sql = "INSERT INTO OrderItems (orderID, itemNo, productID) VALUES
									($orderID, 1, 1 )";
						echo $sql;
						if (mysqli_query($conn, $sql)) {
                		//	echo "Item Added Successfully";
            			}
						else {
							echo "ERROR: Fail to create a new item, please try again later;";
							$errorcount++;
						}

					}
				}
				else{
					$addresserror = "Empty Address, please select 'same as account' or enter a new address.";
					$errorcount++;
				}

			}
			else{
				$emptyerror = "Cannot Checkout, The cart is empty";
				$errorcount++;

			}
			if ($errorcount == 0){ header("Location: payment.html");}
		}

	?>
	<!-- Start blog -->
	<div class="cart-box">
		<div class="container">
			<form id="checkoutForm" action = "" method = "post">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
					  <h2 data_temp_dwid="1">Items </h2>
					  <p style='color:red;'><?php echo $emptyerror; ?><p>
					  <p style='color:red;'><?php echo $addresserror; ?><p>
					</div>
				</div>
				<div>
				<?php
					for ($i = 0; $i < $cartItem; $i++) {
						$result = $result5;
						$row = mysqli_fetch_array($result);
						?>
						
							<h3>Item Name: &nbsp<?php echo $row['productName']; ?><br></h3	>
							<h4 style="color:orangered;">1 Unit: $<?php echo $row['price']; ?></h4>
							<h4>Quantity: &nbsp<?php echo $row['qty']; ?><br></h4>
							<h4 style="color:orangered;">Price: $<?php echo ($row['price']*$row['qty']); $overallPrice=$overallPrice+($row['price']*$row['qty']); ?></h4>
							<br><br>
						<?php 
					}
					if ($overallPrice < 400){
					?>
					<h3> There will be a Delivery fee of $100 if the order is less than $400 <br></h3>
					<h3 style="color:orangered;">Total Price: $<?php echo ($overallPrice +100); $_SESSION['overallPrice']=$overallPrice;  ?></h3>
					<?php		 
					} else {
					?>
					<h3 style="color:orangered;">Total Price: $<?php echo $overallPrice; $_SESSION['overallPrice']=$overallPrice;  ?></h3>
				<?php }?>
				<p>Please select devliery address:</p>
  				<input type="radio" id="exist" name="address" value="exist" checked="checked">
  				<label for="exist">Same as Account</label><br>
  				<input type="radio" id="new" name="address" value="new">
  				<label for="new">Use another address</label><br>
 				<label for="fname"></label>
  				<input type="text" id="newaddress" name="newaddress">
				<br><br>
				Order Remark:
				<input type="text" id="remark" name="remark" value="N/A">

				</div>
			</div>
			<div class="heading-title text-center">
				<button class="btn btn-common" id="submit" type="submit">Confirm Order</button>
			</div>
			</form>
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