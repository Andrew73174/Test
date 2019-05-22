<?php 
$time = $_SERVER['REQUEST_TIME'];

$timeout_duration = 20;

if (isset($_SESSION['LAST_ACTIVITY']) &&  ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration)
{
		session_unset();
		session_destroy();
}

$_SESSION['LAST_ACTIVITY']=$time;

if ( isset( $_SESSION['user'] ) ) {
    $user = $_SESSION['user'];
		print_r($user);
}
else {
		$_SESSION['user']= array("Firma"=>"Gast", "Nachname"=>"Gast", "Kundennummer"=>"Gast");
		$user = $_SESSION['user'];
}

if (isset($_GET['Keyword']))
{
    $searchbarcont = $_GET['Keyword'];
}
else 
{
	$searchbarcont = '';
}

require 'scripts/Validator.js';
echo '
<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ToyModelsShop</title>
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/responsiveGrid.css">
	<link rel="stylesheet" href="css/responsive.css">
		<link rel="stylesheet" href="css/phone.css">
	<link rel="stylesheet" href="css/tablet.css">
		<link rel="stylesheet" href="css/desktop.css">
	<link rel="stylesheet" href="css/default.css">
  </head>
  <body>
	<header class="header_menu">
	<!-- Start of main menu -->
		<nav id="" class="wrapper_menu animate_menu">
			<!-- LOGO-->
			<a class="grid_layout_34 row_14 menu_item center_item" href="home.php">
				<img class="logo_adjust" src="images/Logo_White.png" alt="">
			</a>
			
			<!-- Start of Search -->
			<form action="" method="GET" class="search_header menu_item center_item search_form" onsubmit="return ValidateSearch()">
				<section class="search_header_wrapper">
					<input class="search_bar " type="text" name="Keyword" id="Keyword" value=',$searchbarcont,'>



					<input class="search_btn menu_btn btn_disable" type="submit" value="Search">
					<input class="btn_nav btn_search " type="image" id="image" alt="Login" src="images/search.png">

				
				</section>
			</form>		
			
			<div class="center_item menu_item menu_container">

				<!--Searchbutton jumpmark-->
				<form class="search_footer center_btn" action="#searchbar">					
					<input class="btn_nav btn_login" type="image" id="image" alt="Login" src="images/search.png">
				</form>

				<!--CART-->
				<form class="center_btn" action="shoppingcart.php">
					<input class="btn_nav btn_disable menu_btn"  name="shoppingcartMenuButton" type="submit" value="Shopping Cart"/>
					<input class="btn_nav btn_cart" type="image" id="image" alt="Login" src="images/cart.png">
				</form>
					
				<!--LOGIN-->
				<form class=" center_btn" action="login.php">
					<input class="btn_seperator btn_nav btn_disable menu_btn" name="loginMenuButton" type="submit" value="Login" />
					<input class="btn_nav btn_login" type="image" id="image" alt="Login" src="images/user.png">
				</form>
			</div>
			
		</nav>
		<section class="grouptags_section animate_menu">
				<form class="grouptags_wrapper" action="">
						<input class=" btn_nav group_btn menu_btn" name="Filter" type="submit" value="All" />
						<input class="btn_seperator btn_nav group_btn menu_btn" name="Filter" type="submit" value="Vintage Cars" />
												<input class="btn_seperator btn_nav group_btn menu_btn" name="Filter" type="submit" value="Motorcycles" />
						<input class="btn_seperator btn_nav group_btn menu_btn" name="Filter" type="submit" value="Trains" />
												<input class="btn_seperator btn_nav group_btn menu_btn" name="Filter" type="submit" value="Trucks and Buses" />
						<input class="btn_seperator btn_nav group_btn menu_btn" name="Filter" type="submit" value="Planes" />
						<input class="btn_seperator btn_nav group_btn menu_btn" name="Filter" type="submit" value="Classic Cars" />
						<input class="btn_seperator btn_nav group_btn menu_btn" name="Filter" type="submit" value="Streetcars" />
				</form>
		</section>
	<!-- End of main menu -->
	</header>

	<section class="animate_content wrapper_content content_spacer">';

	?>