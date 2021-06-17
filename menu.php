<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Menu-fushiony</title>  
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
				<a class="navbar-brand" href="menu.php">
					<img src="images/logo.png" alt="" width="100" height="100"/>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="menu.php">Menu</a></li>
						<li class="nav-item "><a class="nav-link" href="shopping-cart.php">Shopping Cart</a></li>
						<li class="nav-item"><a class="nav-link" href="account.php">Account</a></li>
						<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	<?php
	
	?>
	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Welcome,&nbsp<?php echo $_SESSION["username"] ?>!</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	
	<!-- Start Menu -->
	<div class="menu-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
					  <h2>Menu</h2>
					  <p>Here you can found foods from around the world</p>
					</div>
				</div>
			</div>
			
			<div class="row inner-menu-box">
				<div class="col-3">
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">All</a>
						<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Main Course</a>
						<a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Drinks</</a>
						<a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Dessert/Snacks</a>

					</div>
				</div>
				
				<div class="col-9">
					<div class="tab-content" id="v-pills-tabContent">
						<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
							<div class="row">
								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/BbqPorkRice.jpg" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Barbecued pork rice</h4>
											<p>$85</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Barbecued%20Pork%20Rice'">Learn More/Order</button>
										</div>
									</div>
								</div>
								
								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/Gyudon.jpg" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Gyudon</h4>
											<p>$95</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Gyudon'">Learn More/Order</button>	
										</div>
									</div>
								</div>
								
								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/Japcha.jpg" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Japcha</h4>
											<p>$53</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Japcha'">Learn More/Order</button>
										</div>
									</div>
								</div>
								
								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/NasiLemak.jpg" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Nasi Lemak</h4>
											<p>$95</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Nasi%20Lemak'">Learn More/Order</button>
										</div>
									</div>
								</div>
								
								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/PhatKaphraoWithRice.jpg" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Phat Kaphrao With Rice</h4>
											<p>$75</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Phat%20Kaphrao%20With%20Rice'">Learn More/Order</button>
										</div>
									</div>
								</div>
								
								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/DimSum.png" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Dim Sum</h4>
											<p>$96</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Dim%20Sum'">Learn More/Order</button>
										</div>
									</div>
								</div>
												
								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/Samshimi.png" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Sashimi</h4>
											<p>$40</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Sashimi'">Learn More/Order</button>
										</div>
									</div>
								</div>
								
								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/Soba.png" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Soba</h4>
											<p>$80</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Soba'">Learn More/Order</button>
										</div>
									</div>
								</div>
								
								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/LotteMilkis.jpg" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Lotte Milkis</h4>
											<p>$32</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Lotte%20Milkis'">Learn More/Order</button>
										</div>
									</div>
								</div>
								
								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/JapanGreenTea.png" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Japan Green Tea</h4>
											<p>$10</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Japan%20Green%20Tea'">Learn More/Order</button>
										</div>
									</div>
								</div>
							
								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/AmericanoCoffee.png" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Americano Coffee</h4>
											<p>$15</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Americano%20Coffee'">Learn More/Order</button>
										</div>
									</div>
								</div>

								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/BubbleTea.png" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Bubble Tea</h4>
											<p>$30</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Bubble%20Tea'">Learn More/Order</button>
										</div>
									</div>
								</div>

								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/TehTarik.png" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Teh Tarik</h4>
											<p>$50</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Teh%20Tarik'">Learn More/Order</button>
										</div>
									</div>
								</div>

								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/WhiteCoffee.png" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>White Coffee</h4>
											<p>$30</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=White%20Coffee'">Learn More/Order</button>
										</div>
									</div>
								</div>

								
								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/EggTart.png" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Egg Tart</h4>
											<p>$30</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Egg%20Tart'">Learn More/Order</button>
										</div>
									</div>
								</div>
								
								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/LotteYogurtJelly.jpg" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Lotte Yogurt Jelly</h4>
											<p>$21</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Lotte%20Yogurt%20Jelly'">Learn More/Order</button>
										</div>
									</div>
								</div>
								
								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/MarketORealBrowie.jpg" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Market O Real Browie</h4>
											<p>$55</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Market%20O%20Real%20Browie'">Learn More/Order</button>
										</div>
									</div>
								</div>
								
								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/TomsHoneyButterAlmond.jpg" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Tom’s Honey Butter Almond</h4>
											<p>$84</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Tom’s%20Honey%20Butter%20Almond'">Learn More/Order</button>
										</div>
									</div>
								</div>

								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/TomsHoneyButterChips.jpg" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Tom’s Honey Butter Chips</h4>
											<p>$17</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Tom’s%20Honey%20Butter%20Chips'">Learn More/Order</button>
										</div>
									</div>
								</div>

								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/PineappleBun.png" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Pineapple Bun</h4>
											<p>$9</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Pineapple%20Bun'">Learn More/Order</button>
										</div>
									</div>
								</div>
								
								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/SpringRoll.png" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Spring roll</h4>
											<p>$15</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Spring%20roll'">Learn More/Order</button>
										</div>
									</div>
								</div>
								
								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/Onigiri.png" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Onigiri</h4>
											<p>$20</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Onigiri'">Learn More/Order</button>
										</div>
									</div>
								</div>
								
								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/Tempura.png" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Tempura</h4>
											<p>$25</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Tempura'">Learn More/Order</button>
										</div>
									</div>
								</div>
	
							</div>
						</div>
						<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
							<div class="row">
								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/BbqPorkRice.jpg" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Barbecued pork rice</h4>
											<p>$85</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Barbecued%20Pork%20Rice'">Learn More/Order</button>
										</div>
									</div>
								</div>
								
								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/Gyudon.jpg" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Gyudon</h4>
											<p>$95</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Gyudon'">Learn More/Order</button>	
										</div>
									</div>
								</div>
								
								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/Japcha.jpg" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Japcha</h4>
											<p>$53</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Japcha'">Learn More/Order</button>
										</div>
									</div>
								</div>
								
								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/NasiLemak.jpg" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Nasi Lemak</h4>
											<p>$95</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Nasi%20Lemak'">Learn More/Order</button>
										</div>
									</div>
								</div>
								
								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/PhatKaphraoWithRice.jpg" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Phat Kaphrao With Rice</h4>
											<p>$75</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Phat%20Kaphrao%20With%20Rice'">Learn More/Order</button>
										</div>
									</div>
								</div>
								
								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/DimSum.png" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Dim Sum</h4>
											<p>$96</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Dim%20Sum'">Learn More/Order</button>
										</div>
									</div>
								</div>
												
								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/Samshimi.png" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Sashimi</h4>
											<p>$40</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Sashimi'">Learn More/Order</button>
										</div>
									</div>
								</div>
								
								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/Soba.png" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Soba</h4>
											<p>$80</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Soba'">Learn More/Order</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
							<div class="row">
								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/LotteMilkis.jpg" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Lotte Milkis</h4>
											<p>$32</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Lotte%20Milkis'">Learn More/Order</button>
										</div>
									</div>
								</div>
								
								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/JapanGreenTea.png" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Japan Green Tea</h4>
											<p>$10</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Japan%20Green%20Tea'">Learn More/Order</button>
										</div>
									</div>
								</div>
							
								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/AmericanoCoffee.png" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Americano Coffee</h4>
											<p>$15</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Americano%20Coffee'">Learn More/Order</button>
										</div>
									</div>
								</div>

								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/BubbleTea.png" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Bubble Tea</h4>
											<p>$30</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Bubble%20Tea'">Learn More/Order</button>
										</div>
									</div>
								</div>

								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/TehTarik.png" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Teh Tarik</h4>
											<p>$50</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Teh%20Tarik'">Learn More/Order</button>
										</div>
									</div>
								</div>

								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/WhiteCoffee.png" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>White Coffee</h4>
											<p>$30</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=White%20Coffee'">Learn More/Order</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
							<div class="row">
								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/EggTart.png" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Egg Tart</h4>
											<p>$30</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Egg%20Tart'">Learn More/Order</button>
										</div>
									</div>
								</div>
								
								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/LotteYogurtJelly.jpg" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Lotte Yogurt Jelly</h4>
											<p>$21</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Lotte%20Yogurt%20Jelly'">Learn More/Order</button>
										</div>
									</div>
								</div>
								
								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/MarketORealBrowie.jpg" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Market O Real Browie</h4>
											<p>$55</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Market%20O%20Real%20Browie'">Learn More/Order</button>
										</div>
									</div>
								</div>
								
								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/TomsHoneyButterAlmond.jpg" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Tom’s Honey Butter Almond</h4>
											<p>$84</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Tom’s%20Honey%20Butter%20Almond'">Learn More/Order</button>
										</div>
									</div>
								</div>

								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/TomsHoneyButterChips.jpg" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Tom’s Honey Butter Chips</h4>
											<p>$17</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Tom’s%20Honey%20Butter%20Chips'">Learn More/Order</button>
										</div>
									</div>
								</div>

								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/PineappleBun.png" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Pineapple Bun</h4>
											<p>$9</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Pineapple%20Bun'">Learn More/Order</button>
										</div>
									</div>
								</div>
								
								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/SpringRoll.png" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Spring roll</h4>
											<p>$15</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Spring%20roll'">Learn More/Order</button>
										</div>
									</div>
								</div>
								
								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/Onigiri.png" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Onigiri</h4>
											<p>$20</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Onigiri'">Learn More/Order</button>
										</div>
									</div>
								</div>
								
								<div class="col-lg-4 col-md-6 special-grid main">
									<div class="gallery-single fix">
										<img src="images/dishes/Tempura.png" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Tempura</h4>
											<p>$25</p>
											<button class="btn btn-common" onclick="document.location='product/product.php?productname=Tempura'">Learn More/Order</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Menu -->
	
	<!-- Start Customer Reviews -->
	<div class="customer-reviews-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Customer Reviews</h2>
						<p>What our customers think about our food.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 mr-auto ml-auto text-center">
					<div id="reviews" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner mt-4">
							<div class="carousel-item text-center active">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="images/quotations-button.png" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Oralia</strong></h5>
								<h6 class="text-dark m-0">Regular Customer</h6>
								<p class="m-0 pt-3">Best barbecue pork rice I have ever tasted in my life.</p>
							</div>
							<div class="carousel-item text-center">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="images/quotations-button.png" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Skyler</strong></h5>
								<h6 class="text-dark m-0">New Customer</h6>
								<p class="m-0 pt-3">JapChae is very authentic and the portion is big.</p>
							</div>
							<div class="carousel-item text-center">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="images/quotations-button.png" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">MacComiskey</strong></h5>
								<h6 class="text-dark m-0">Frequent Customer</h6>
								<p class="m-0 pt-3">Nasi Lemak is not too spicy and thank you for satisfying my craving!</p>
							</div>
						</div>
						<a class="carousel-control-prev" href="#reviews" role="button" data-slide="prev">
							<i class="fa fa-angle-left" aria-hidden="true"></i>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#reviews" role="button" data-slide="next">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
							<span class="sr-only">Next</span>
						</a>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Customer Reviews -->
	
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