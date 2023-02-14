<?php
session_start();

if(!isset($_SESSION['user'])){

  header("Location:../login.php");
}
// Database configuration
$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "AW";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Neuspela konekcija sa bazom: " . $db->connect_error);
}
?>