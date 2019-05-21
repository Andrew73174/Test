
<?php
session_start();
require 'php/db_connection.php';
require 'php/header.php';
require 'scripts/Filter.js';

// User visits the site for the first time: Set them as guest user
// They can put things in the cart but they have to log in to complete the order (means the guest's cart state has to be transferred)

// User logged in? Greet them.
// They can put things in the cart and complete their order



// Log in user as Guest when they first visit the site
if(!isset($_SESSION["userID"]))
{
    $guest = "Gast";
    $_SESSION["userID"] = $guest;
}

$sql = "SELECT * FROM artikel, warengruppen where artikel.gruppennr = warengruppen.gruppennr";

$rowCounter = 0;
$colCounter = 1;
$gridCells = 34;

foreach ($db_conn->query($sql) as $row) {
   //echo $row['ArtikelNr']."<br />";
   
   

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
	
</div>		';

  //$gridCells = $gridCells+22;
  //$rowCounter= $colCounter==4 ? $rowCounter+1: $rowCounter;
  //$colCounter= $colCounter==4 ? 0 : $colCounter;
  //$gridCells = $gridCells == 122 ? 34 : $gridCells;

}

echo '    <script>jQuery(document).ready(function() {
    $(".article_title").matchHeight();
    }); </script>';

require 'php/footer.php';
?>
