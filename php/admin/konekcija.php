<?php
session_start();


// Definisanje podataka za pristup bazi:
define('DB_USER', 'root'); //$username="root"
define('DB_PASSWORD', '');//$lozinka=""
define('DB_HOST', 'localhost');//$server="localhost"
define('DB_NAME', 'AW');//$baza="AW"

// Uspostavljanje konekcije:
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die('Neuspela konekcija na bazu: ' . mysqli_connect_error() );

//$dbc = @mysqli_connect($server, $username, $lozinka, $baza) OR die('Neuspela konekcija na bazu: ' . mysqli_connect_error() );

// Postavljanje kodiranja...
mysqli_set_charset($dbc, 'utf8');
?>