<?php
session_start(); //Ganz wichtig


if(!isset($_SESSION['usr'])) {
   die("Bitte erst einloggen"); //Mit die beenden wir den weiteren Scriptablauf   
}
 
//In $userID den Wert der Session speichern
$userID = $_SESSION['usr'];
 
//Text ausgeben
echo "Du heißt immer noch: $userID
<br />
<a href=\"login.php\">Login</a>
<br />
<a href=\"home.html\">Home</a>";



setcookie(userIDCookie, $userID, time() + 300);



?>