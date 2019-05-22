<?php //NO CONTENT!
require 'php/db_connection.php';


session_start();

if (  empty( $_POST ) ) {
	//session_unset();
	//session_destroy();
	echo'<p> This is a page you were not supposed to visit. As punishment you´ve been logged out and your session has been deleted!</p><br>
	<a href="../home.php">asdf</a>';    
}
list($date, $time) = explode('|', date('d.m.Y|Gi.s', $_SERVER['REQUEST_TIME']));
$planeddate = date('Y.m.d', strtotime($date. ' + 30 days'));

$status='in Bearbeitung';
$userid= $_SESSION['user'][0];
$reservation = $userid .'-'. $_SERVER['REQUEST_TIME'];


try{
$sql = "INSERT INTO auftraege (Auftragsdatum, Plantermin, Status, Bemerkungen, KundenNr)
	VALUES (:orderdate, :planeddate, :orderstatus,:bemerkung, :customerid)";
	$db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$statement = $db_conn->prepare($sql);
$statement ->bindParam(':orderdate', $date);
$statement ->bindParam(':planeddate', $planeddate);
$statement ->bindParam(':bemerkung', $reservation);
$statement ->bindParam(':orderstatus', $status);
$statement ->bindParam(':customerid', $userid);
$statement-> execute(); 

$sql="SELECT auftragsnr FROM auftraege WHERE Bemerkungen like :bemerkung";

$db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$statement = $db_conn->prepare($sql);
$statement ->bindParam(':bemerkung', $reservation);
$statement-> execute();
$article = $statement -> fetch(PDO::FETCH_ASSOC);
$auftragsnr = $article['auftragsnr'];

//print_r($auftragsnr);

$sql="UPDATE auftraege SET Bemerkungen='' where auftragsnr=:auftragsnr";

$statement = $db_conn->prepare($sql);
$statement ->bindParam(':auftragsnr', $auftragsnr);
$statement-> execute();

$pos = 1;
$indexer = 0;
foreach	($_SESSION['cart'] as $orderarticle)
{
	$artikelnr = $orderarticle[0];
	$menge= $orderarticle[1];
	$sql="SELECT Listenpreis FROM Artikel WHERE artikelnr = :artikelnr";

	$db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$statement = $db_conn->prepare($sql);
	$statement ->bindParam(':artikelnr', $artikelnr);
	$statement-> execute();
	$verkaufspreis[] = $statement -> fetch(PDO::FETCH_ASSOC);

	//print_r($verkaufspreis);
		$pos++;
	$sql = "INSERT INTO auftragspositionen (AuftragsNr, ArtikelNr, Bestellmenge, Verkaufspreis, PositionsNr)
	VALUES (:auftragsnr, :artikelnr, :menge,:vk, :pos)";
	$db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$statement = $db_conn->prepare($sql);
	$statement ->bindParam(':auftragsnr', $auftragsnr);
	$statement ->bindParam(':artikelnr', $artikelnr);
	$statement ->bindParam(':menge', $menge);
	$statement ->bindParam(':vk', $verkaufspreis[$indexer]['Listenpreis']);
	$statement ->bindParam(':pos', $pos);
	$statement-> execute(); 

	
	$indexer++;
	$pos++;
}
	unset($_SESSION['cart']);
}
catch(PDOException $e)
    {
    echo $sql . "<br>asdf" . $e->getMessage();
    }

?>
	
<?php //CONTENT
require 'php/header.php';

	

require 'php/footer.php';
?>