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
				<img class="logo_adjust" src="images/Logo_White.png" alt=""></img>
			</a>
			
			<!-- Start of Search -->
			<form action="searchLIKE.php" method="GET" class="search_header menu_item center_item search_form">
				<input class="search_bar " type="text" name="Keyword">
				<input class="search_btn menu_btn btn_disable" type="submit" value="Search">
				<input class="btn_nav btn_search " type="image" id="image" alt="Login" src="images/search.png">
				<!--Filter for Search-->
				<input onclick="openFilter()" id="Filter" class="filter_btn menu_btn btn_disable" type="button" value="All">
				<input onclick="openFilter()" id="SFilter" class="btn_nav btn_filter" type="button" value="A">
				<div id="myDropdown" class="dropdown-content">
					<a href="#all"><input onclick="closeFilterAll()" class="filter_element" type="button" value="All"></a>
					<a href="#ships"><input onclick="closeFilterShips()" class="filter_element" type="button" value="Ships"></a>
					<a href="#planes"><input onclick="closeFilterPlanes()" class="filter_element" type="button" value="Planes"></a>
					<a href="#cars"><input onclick="closeFilterCars()" class="filter_element" type="button" value="Cars"></a>
					<a href="#trains"><input onclick="closeFilterTrains()" class="filter_element" type="button" value="Trains"></a>
				</div>
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
	<!-- End of main menu -->
	</header>

	<section class="animate_content wrapper_content content_spacer">