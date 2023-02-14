<?php

  
if(isset($_POST['btn'])){
// Provera slanja obrasca:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$add = $_POST['dodatno'];
	$country= $_POST['country'];
	$city= $_POST['city'];
	$price= $_POST['price'];
	$startdate = $_POST['datestart'];
	$enddate = $_POST['dateend'];
	$description= $_POST['description'];
	$transport= $_POST['transport'];
	$transportway= $_POST['transportway'];
	$hrana= $_POST['hrana'];
	$hranaway = $_POST['hranaway'];
	$smestaj= $_POST['smestaj'];
	$smestajmodel = $_POST['smestajmodel'];
	$smestajime= $_POST['smestajime'];
	$pocetna= $_POST['pocetna'];
	$slider1= $_POST['slider1'];
	$slider2= $_POST['slider2'];
	$slider3= $_POST['slider3'];
	$slider4= $_POST['slider4'];
	$kraj = strtotime($enddate);
    $poc = strtotime($startdate);
    $brdana = ($kraj - $poc)/ 86400;
	$slideri = $slider1.'|'.$slider2.'|'.$slider3.'|'.$slider4; 
	$dodaj="";
	foreach($add as $value)
	{
		$dodaj=$dodaj.'|'.$value;
	}
		require_once('konekcija.php'); // Konekcija na bazu podataka-u ovom slucaju prijavljivanje.
        
		// Kreiranje upita:
		$q = "INSERT INTO `destination` (`country`,`city`,`price`,`transport`,`transportway`,`apartmans`,`apartmansway`,`nameapartamns`,`food`,`foodway`,`description`,`date`,`datestart`,`dateend`,`days`,`add`,`pocetna`,`slideri`) VALUES ('$country', '$city', '$price','$transport','$transportway' ,'$smestaj','$smestajmodel','$smestajime','$hrana','$hranaway','$description', NOW() ,'$startdate','$enddate','$brdana','$dodaj','$pocetna','$slideri')";
		$r = @mysqli_query($dbc, $q); // Izvrsavanje upita.
        
        if ($r) { // AKo je upit OK.

			// Štampanje poruke:
			$url = "../admindestination.php";
				header("Location: ".$url);  
         
		} else { // Ako nije OK.

			echo('Niste dodali destinaciju');
			
			// Poruka za javnost:
			echo '<h1>Sistemska greška</h1>
			<p class="error">Nije uspelo dodavanje destinacije!</p>';

			// Poruka za otklanjanje gresaka:
			echo '<p>' . mysqli_error($dbc) . '<br><br>Upit: ' . $q . '</p>';
				
		} // Kraj uslova ($r) IF.

		mysqli_close($dbc); // Zatvaranje konekcije sa bazom podataka

		// Ukljucivanje futera i izlazak iz skripta:
		
		
	
	} else { // Izvestavanje o greskama.

		echo '<h1>Greške!</h1>
		<p class="error">Desile su sledeće greške:<br>';
		foreach ($errors as $msg) { // Stamapanje svake greske.
			echo " - $msg<br>\n";
		}
		echo '</p><p>Pokušajte ponovo.</p><p><br></p>';

	} // Kraj uslova if (empty($errors)) IF.
}
?>
