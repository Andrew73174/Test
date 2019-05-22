<?php //NO CONTENT!
require 'php/db_connection.php';
require 'php/header.php';

session_start();
?>
	
<?php //CONTENT

	if(isset($_SESSION['cart']))
	{
		
			//print_r($_SESSION['cart']);
			foreach	($_SESSION['cart'] as $cartitem)
			{
					echo'
					<!-- Start of cart content -->
					<section class="wrapper_nolimit content_spacer printarea">
	
						<h1 class="grid_layout_35 row_1">Your shopping cart content:</h1>
	
					<!-- Start of Site content -->', $cartitem[0],'
						<article class="row_2 grid_layout_30 wrapper_article">
							<img class="cart_image center_item" src="images/0001.png">
							<h1 class=" cart_title center_item"> Title </h1>
							<p class="cart_priceeach center_item"> Price per item €</p>
							<p class="cart_amount center_item"> Amount</p>
							<p class="cart_price center_item"> Sum €</p>
						</article>
		
			
					<!-- End of Site content -->
					</section>	
					<!-- End of cart content -->';	
			}
			if (isset($_SESSION['loggedin']))
			{
				echo'
					<form action="order.php" method="post" class="search_header menu_item center_item search_form">
						<section class="search_header_wrapper">
							<input class="" type="submit" value="Order now!">
						</section>
					</form>		';
			}
			else {
				echo'<p>Please login to be able to order <a href="login.php" alt"">Go to Login Page</a></p> ';
}

	}
	else
	{
		echo '<p> It seems like you didn´t add any item to your cart yet.<br>
		<a href="home.php" alt="home">Click here</a> to browse our store</p> ';
	}


require 'php/footer.php';
?>