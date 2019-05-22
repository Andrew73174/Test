<?php
session_start();
require 'php/db_connection.php';

require 'php/header.php';
require 'scripts/Filter.js';


$_SESSION['cart']=array
  (
  array("Volvo",22,18),
  array("BMW",15,13),
  array("Saab",5,2),
  array("Land Rover",17,15)
  );

$queryString = strstr($_SERVER['REQUEST_URI'], '?');   
    $queryString = ($queryString===false) ? '' : substr($queryString, 1);
 
    // Parameter als Array
    $parameters = array();
    parse_str(($queryString!==false)?$queryString:'', $parameters);

//$sql = 'SELECT * FROM artikel, warengruppen where artikel.gruppennr = warengruppen.gruppennr';
$prefilt=' and warengruppen.gruppenname like ';
$presearch =' and Artikel.ArtikelName like ';

if (isset($_GET['Filter']))
{
    $filterpara = $_GET['Filter'];

	switch ($filterpara) { 
		case "Vintage Cars":
			//echo "Vintage Cars";
				$filt = "Vintage Cars";
			break;
		case "Trains":
			//echo "Trains";
				$filt = "Trains";
			break;
		case "Planes":
			//echo "Planes";
				$filt = "Planes";
			break;
		case "Motorcycles":
			//echo "Motorcycles";
				$filt = "Motorcycles";
			break;
		case "Classic Cars":
			//echo "Classic Cars";
				$filt = "Classic Cars";
			break;
		case "Trucks and Buses":
			//echo "Trucks and Buses";
				$filt = "Trucks and Buses";
			break;
		case "Streetcars":
			//echo "Streetcars";
				$filt = "Streetcars";
			break;
		case "All":
			//echo "%";
				$filt = "%";
			break;
		default:
			//echo "All";
			$filt = "%";
		}	

	
}
else {
	$filt ="%";
}

if (isset($_GET['Keyword']))
{
    $searchpara ="%". $_GET['Keyword']. "%";
}
else 
{
	$searchpara = "%";
}

$sql = "SELECT * FROM artikel, warengruppen WHERE artikel.gruppennr = warengruppen.gruppennr AND warengruppen.gruppenname like :filter AND Artikel.ArtikelName like :searchword";
$statement = $db_conn->prepare($sql);
$statement ->bindParam(':filter', $filt);
$statement ->bindParam(':searchword', $searchpara);
$statement-> execute(); 
$article = $statement -> fetchAll();

// User visits the site for the first time: Set them as guest user
// They can put things in the cart but they have to log in to complete the order (means the guest's cart state has to be transferred)

// User logged in? Greet them.
// They can put things in the cart and complete their order



//print_r($user);

// Log in user as Guest when they first visit the site


$itemcounter = 0;
foreach ($article as $row) {   

   echo '
<div class="content_container">
   <article class="article_define grid_square_up">
            <ul>
                <li><img class="article_image" src="images/0001.png"></li>
                <li><h2 class="article_title">',$row['ArtikelName'],'<br></h2></li>
                <li class="article_content_wrapper">
                    <ul class="article_layout article_content">
                        <li><h1 class="article_group"> ',$row['GruppenName'],' </h1></li>
												 <li><p class="article_number"> ',$row['ArtikelNr'],' </p></li>
												<li></li>
                        <li><p class="article_price"> ',$row['Listenpreis'],'&#8364;</p></li>
                    </ul>
                </li>
            </ul>
		</article>
		<article class="article_define grid_square_up over">
            <p class = "smallText">amount:  </p>
			<input class="amount_form" type="text" name="amount">
			<input class="add_btn"  name="add" type="submit" value="Add"/>
			<p class="article_description">',$row['Beschreibung'],'</p>
		</article>
</div>';

$itemcounter = $itemcounter+1;
}

if ($itemcounter<1)
{
		echo '
		<div class="noarticle content_container">
   <article class="article_define grid_square_up">
            <ul>
                <li><img class="article_image" src="images/nothing.png"></li>
                <li><h2 class="article_title">These Are Not the Toymodels You Are Looking For</h2></li>
                <li class="article_content_wrapper">
                    <ul class="article_layout article_content">
                        <li><h1 class="article_group"> Sorry :( </h1></li>
												 <li><p class="article_number"> </p></li>
												<li></li>
                        <li><p class="article_price"> </p></li>
                    </ul>
                </li>
            </ul>
		</article>
		</div>';
}

echo '    <script>jQuery(document).ready(function() {
    $(".article_title").matchHeight();
    }); </script>';

require 'php/footer.php';
?>
