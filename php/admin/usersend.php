<?php
   require_once('konekcija.php'); 
            $iduser = $_SESSION['iduser'];
            $id =$_COOKIE['id'];    
               // Konekcija na bazu podataka-u ovom slucaju prijavljivanje.
               $data = array();
               $q = "SELECT * 
               FROM destination 
               INNER JOIN orders  ON orders.iddestination=destination.id 
               INNER JOIN users  ON users.id=orders.iduser";
               $r = @mysqli_query($dbc, $q); //Izvrsavanje upita
               // Brojanje prikazanih redova:
               $num = mysqli_num_rows($r);
               if ($num > 0) { 
                 // Prolazak kroz redove zapisa rezultata upita:
                 while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                     $data[]=$row;
                 }
                 mysqli_free_result ($r); // Oslobadjanje resursa zauzetih od strane upita.
                }
                // Kreiranje upita:
                $q = "INSERT INTO `orders` (`iduser`,`iddestination`,`date`) VALUES ('$iduser', '$id',NOW())";
                $r = @mysqli_query($dbc, $q); // Izvrsavanje upita.
                
                if ($r) { // AKo je upit OK.
        
                    foreach($data as $d)
                    {
                        if($iduser = $d['iduser'] && $id = $d['iddestination'])
                        {
                        $email = $d['email'];
                        $pocetna = $d['pocetna'];
                        $country = $d['country'];
                        $days = $d['days'];
                        $description = $d['description'];
                        $price = $d['price'];
                        }
                    }
                    $to = "smokemardeljano18@gmail.com";
                    $subject = "REZERVACIJA";
                    $txt = ' <div class="col-lg-4 col-md-4 mb-4">
                    <div class="package-item bg-white mb-2">
                        <img style="width:100%; height:150px;" class="img-fluid" src="php/uploads/'.$pocetna.'" alt="">
                        <div class="p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="m-0"><i id="fasovi" class="fa fa-map-marker-alt text-primary mr-2"></i> '.$country.' </small>
                                <small class="m-0"><i id="fasovi" class="fa fa-calendar-alt text-primary mr-2"></i> '.$days.' </small>
                                <small class="m-0"><i id="fasovi" class="fa fa-user text-primary mr-2"></i>2</small>
                            </div>
                            <p class="h5 text-decoration-none" href="">'.$description.'</p>
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="m-0"><i id="fasovi" class="fa fa-star text-primary mr-2"></i>4.5 <small>(250)</small></h6>
                                    <h5 class="m-0">'.$price.'€</h5>
                                </div>
                            </div>
                            </div>
                
                  </div>
                  </div> ';
                    $headers = "From:".$email."" . "\r\n";
                    mail($to,$subject,$txt,$headers);
                    // Štampanje poruke: 
                    $url = "../../putovanja.php";
                        header("Location: ".$url);
                } else { // Ako nije OK.
                   echo "Niste rezervisali!";
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

