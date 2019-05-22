<?php
// Output all error messages for debugging
error_reporting(E_ALL);
ini_set("display_errors", 1);



$DB_HOST = "db-training.informatik.fh-nuernberg.de";
$DB_PORT = "3306";
$DB_USER = "min19_chamberlainan73174";
$DB_PASS = "min19_chamberlainan73174";
$DB_NAME = "min19_chamberlainan73174";
$db_setup = 'mysql:host=' .$DB_HOST .'; dbname='. $DB_NAME;


try {
    // Connection to Database (Will be closed when script is done)
   $db_conn = new PDO($db_setup, $DB_USER , $DB_PASS);
   // set the PDO error mode to exception
   //$db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   echo "Connected successfully";
   }
catch(PDOException $e)
   {
   echo "Connection failed: " . $e->getMessage();
   }


   // Connection can be closed like this aswell
   // $db_conn = null;
?>