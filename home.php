
<?php
session_start();
require 'php/db_connection.php';
require 'php/header.php';
?>
<!--The Filter need a Dom Target since AJAX is unavailable. Just some Stupid ID 
<div id="dom-target" style="display: none;">
    <?php 
        //$Filter = 0; //Again, do some operation, get the output.
        //echo htmlspecialchars($Filter); /* You have to escape because the result
        //                                   will not be valid HTML otherwise. */
    ?>
</div>		Funktioniert nicht kann nur zu script geben.-->
<?php
require 'scripts/Filter.js';
$queryString = strstr($_SERVER['REQUEST_URI'], '?');    // $queryString enthält jetzt "?arg1=foo&arg2=bar" oder (bool)false falls keine Parameter definiert wurden
    $queryString = ($queryString===false) ? '' : substr($queryString, 1);
 
    // Parameter als Array
    $parameters = array();
    parse_str(($queryString!==false)?$queryString:'', $parameters); // $parameters enthält jetzt array("arg1" => "foo", "arg2" => "bar")
//echo implode("",$parameters);
//$Filter = $parameters[0]; //verschieben? WTF PHP 

//function getURLArg() {
	//$queryString = strstr($_SERVER['REQUEST_URI'], '?');    // $queryString enthält jetzt "?arg1=foo&arg2=bar" oder (bool)false falls keine Parameter definiert wurden
    //$queryString = ($queryString===false) ? '' : substr($queryString, 1);
 
    // Parameter als Array
    //$parameters = array();
    //parse_str(($queryString!==false)?$queryString:'', $parameters); // $parameters enthält jetzt array("arg1" => "foo", "arg2" => "bar")
   //return $parameters;
   
//}
// seit PHP 5.4
//$Filter = getURLArg()[0]; // Funktioniert nicht WTF PHP


switch (implode("",$parameters)) { //theoretisch könnte man es auch in einer Variable Speichern, aber wie Zeile drüber zeigt geht das von $parameter nicht direkt, da Params ein Array ist und arrayelemente nicht immer mit array[x] genommen werden dürfen WTF PHP, also hab ich einfach den sql verwendet. Könnte man auch nur als Variable speichern aber dann müsste man es mit dem SQL mergen. + anscheinend wird Filter komplett ignoriert in der URL gibt nur 0,1,2,3,4,5,6,7,NULL aus was ziemlich bescheuert ist.
    case "1":
        //echo "Vintage Cars";
			$sql = 'SELECT * FROM artikel, warengruppen where artikel.gruppennr = warengruppen.gruppennr and warengruppen.gruppenname = "Vintage Cars"';
        break;
    case "2":
        //echo "Trains";
			$sql = 'SELECT * FROM artikel, warengruppen where artikel.gruppennr = warengruppen.gruppennr and warengruppen.gruppenname = "Trains"';
        break;
    case "3":
        //echo "Planes";
			$sql = 'SELECT * FROM artikel, warengruppen where artikel.gruppennr = warengruppen.gruppennr and warengruppen.gruppenname = "Planes"';
        break;
	case "4":
		//echo "Motorcycles";
			$sql = 'SELECT * FROM artikel, warengruppen where artikel.gruppennr = warengruppen.gruppennr and warengruppen.gruppenname = "Motorcycles"';
        break;
	case "5":
		//echo "Classic Cars";
			$sql = 'SELECT * FROM artikel, warengruppen where artikel.gruppennr = warengruppen.gruppennr and warengruppen.gruppenname = "Classic Cars"';
        break;
	case "6":
        //echo "Trucks and Buses";
			$sql = 'SELECT * FROM artikel, warengruppen where artikel.gruppennr = warengruppen.gruppennr and warengruppen.gruppenname = "Trucks and Buses"';
        break;
	case "7":
		//echo "Streetcars";
			$sql = 'SELECT * FROM artikel, warengruppen where artikel.gruppennr = warengruppen.gruppennr and warengruppen.gruppenname = "Streetcars"';
		break;
    default:
        //echo "All";
		$sql = 'SELECT * FROM artikel, warengruppen where artikel.gruppennr = warengruppen.gruppennr';
}	


 





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
//echo $Filter;
// Filter to show only selected warengruppen
//if($Filter === NULL)
//{

//}
//else
//{
//	$sql = 'SELECT * FROM artikel, warengruppen where artikel.gruppennr = warengruppen.gruppennr and warengruppen.gruppenname =',$Filter;';
//} Ist nicht gute Lösung. Zu serverseitig. 
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
</div>';

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
