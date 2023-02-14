<?php
   require_once('konekcija.php'); 
           $name = $_POST['name'];
           $email = $_POST['email'];
           $phone = $_POST['phone'];
           $pass = $_POST['pass'];
               // Konekcija na bazu podataka-u ovom slucaju prijavljivanje.
             
                // Kreiranje upita:
                $q = "INSERT INTO `users` (`name`,`email`,`phone`,`pass`) VALUES ('$name', '$email','$phone','$pass')";
                $r = @mysqli_query($dbc, $q); // Izvrsavanje upita.
                
                if ($r) { // AKo je upit OK.
        
                    // Štampanje poruke: 
                    $url = "../login.php";
                        header("Location: ".$url);  
                 
                } else { // Ako nije OK.
        
                   echo "Niste se registrovali!";
                    // Poruka za javnost:
                    /*echo '<h1>Sistemska greška</h1>
                    <p class="error">Nije uspelo dodavanje destinacije!</p>';
        
                    // Poruka za otklanjanje gresaka:
                    echo '<p>' . mysqli_error($dbc) . '<br><br>Upit: ' . $q . '</p>';
                        */
                } // Kraj uslova ($r) IF.
        
                mysqli_close($dbc); // Zatvaranje konekcije sa bazom podataka
        
                // Ukljucivanje futera i izlazak iz skripta:
        ?>

