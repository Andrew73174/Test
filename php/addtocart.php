<?php
	session_start();
	
	
	if (isset($_GET['amount']) && isset($_GET['ArtNr'])){
    $amount = $_GET['amount'];
	$ArtNr = $_GET['ArtNr'];

	if ($amount >0){

	$item = array($ArtNr, $amount);
	$_SESSION['cart'][count($_SESSION['cart'])+1]=$item;
	}
}
else 
{
	
}

		
		  


        header("Location: ../home.php"); /* Redirect browser */

?>