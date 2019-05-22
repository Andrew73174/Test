<?php
require 'php/db_connection.php';

// initializing variables
$errors = array(); 

// connect to the database
// TO DO:
//$db_conn = new PDO($db_setup, $DB_USER , $DB_PASS);

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form

  $vorname = !empty($_POST['Vorname']) ? trim($_POST['Vorname']) : null;
  $nachname = !empty($_POST['Nachname']) ? trim($_POST['Nachname']) : null;
  $firma = !empty($_POST['Firma']) ? trim($_POST['Firma']) : null;
  $kundennr = !empty($_POST['KundenNr']) ? trim($_POST['KundenNr']) : null;
  
  $password_1 = !empty($_POST['password_1']) ? trim($_POST['password_1']) : null;
  $password_2 = !empty($_POST['password_2']) ? trim($_POST['password_2']) : null;

  // ERROR CHECK
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($kundennr)) { array_push($errors, "Username is required"); }
  if (empty($firma)) { array_push($errors, "Companyname is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username
  $query = "SELECT COUNT(kundennr) AS num FROM Kunden WHERE KundenNr =:kundennr";

  $statement = $db_conn->prepare($query);
  $statement->bindValue(':kundennr', $kundennr);
  $statement->execute();
  $row = $statement->fetch(PDO::FETCH_ASSOC);

  if($row['num'] > 0)
  {
    array_push($errors, "User already exists");
  }
  // Finally, register user if there are no errors in the form
  foreach ($errors as $error)
  {
   echo $error;
  }
  if (count($errors) == 0) {
  	$passwordHash = password_hash($password_1, PASSWORD_BCRYPT, array("cost" => 12)); //encrypt the password before saving in the database

    $query = "INSERT INTO Kunden (KundenNr, Firma, Nachname, Vorname, Telefon, Strasse, Ort, PLZ, Land, Kundenbetreuer, Kreditlimit)
	VALUES (".$kundennr.",'".$firma."','".$nachname."','".$vorname."','0123456789','Hohfederstr', 'Nuernberg', '90413', 'Schweden', 1501, 0)";

	echo $query;

    $statement = $db_conn->prepare($query);
    //$statement->bindValue(':kundennr', $kundennr);
	//$statement->bindValue(':firma', $firma);
	//$statement->bindValue(':nachname', $vorname);
	//$statement->bindValue(':vorname', $nachname);

    //$statement->bindValue(':password', $passwordHash);

    $result = $statement->execute();

	unset($GLOBALS['reg_user']);
    if ($result)
    {
      $_SESSION['kundennr'] = $kundennr;
      $_SESSION['success'] = "You are now logged in";
      // Redirect back to homepage
      header('location: home.php');
    }
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) 
{
  $kundennr = !empty($_POST['kundennr']) ? trim($_POST['kundennr']) : null;
  $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;

  $query = "SELECT KundenNr FROM Kunden WHERE kundennr = :kundennr";

  $statement = $db_conn->prepare($query);
  $statement->bindValue(':kundennr', $kundennr);
  $statement->execute();

  $user = $statement->fetch(PDO::FETCH_ASSOC);

  if ($user === false) 
  {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) 
  {
  	array_push($errors, "Password is required");
  }
  if (count($errors) == 0) 
  {
    $validPassword = password_verify($passwordAttempt, $user['password']);

    if($validPassword)
    {          
      //Provide the user with a login session.
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['logged_in'] = time();
      // Redirect back to homepage
      header('location: home.php');
      exit;
    }
    else 
    {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}
?>