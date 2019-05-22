<?php
$pdo = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);

$searchValue = "Flugzeug";

// Prepared statement to protect against SQL Injection combined with LIKE
$statement = $pdo->prepare("SELECT * FROM artikel WHERE warengruppe LIKE :warengruppe");
$statement->execute(array('warengruppe' => "%$searchValue%"));   
while($row = $statement->fetch()) {
   // Show 
   echo'afsdffffffffffffffffffffffffffffffffffffffffffffffffffffffffasdf';
}
?>