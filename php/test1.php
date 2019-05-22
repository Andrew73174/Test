<?php

require 'db_connection.php';
// Always start this first
session_start();

if ( ! empty( $_POST ) ) {

    if ( isset( $_POST['KundenNr'] ) && isset( $_POST['password'] ) ) {
        // Getting submitted user data from database
        $stmt = $db_conn ->prepare("SELECT KundenNr, Firma, Nachname FROM kunden WHERE KundenNr = :KD");
        $stmt->bindParam(':KD', $_POST['KundenNr']); //->bind_param(1, $_POST['KundenNr']);
        $stmt->execute();
        $result = $stmt->fetchAll();
				$user = $result[0];
    			//print_r($user);
					$_SESSION['user'] = $user;
				//print_r($_SESSION['user']['Firma']);

				$_SESSION['loggedin']=true;
				
				$time = $_SERVER['REQUEST_TIME'];
				$_SESSION['LAST_ACTIVITY']=$time;

				header("Location: ../home.php"); /* Redirect browser */
				exit();
    }
}
else {
 session_destroy();
}

//include('../home.php');
?>
<a href="../home.php">asdf</a>