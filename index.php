<?php
require("php/admin/konekcija.php");
$kor = '';
if($_SESSION)
{
    $kor = $_SESSION['user'];
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Eko Putovanja - Turistricki agent</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="" class="navbar-brand">
                    <img src="img/ekologo.png" alt="ekoputovanja" class="logo">
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="index.php" class="nav-item nav-link active">Početna</a>
                        <a href="putovanja.php" class="nav-item nav-link">Putovanja</a>
                        <?php
                        if($kor !='')
                        {
                            echo '<a href="php/usermojaputovanja.php" class="nav-item nav-link">Moja Putovanja</a>';
                        }
                        else
                        {
                            echo '';
                        }
                        
                        ?>
                        <a href="#usluge" class="nav-item nav-link">Usluge</a>
                        <a href="#blog" class="nav-item nav-link">Blog</a>
                        <a href="#kontakt" class="nav-item nav-link">Kontakt</a>
                        <?php
                        if($kor !='')
                        {
                            echo '<a href="php/admin/destroysesion.php" class="nav-item nav-link"><i style="color:#7AB730;" class="fa fa-sign-out-alt"></i></a>';
                        }
                        else
                        {
                            echo '<a href="php/login.php" class="nav-item nav-link"><i style="color:#7AB730;" class="fa fa-user"></i></a>';
                            
                        }
                        ?>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    

    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/luvr1.jpg" alt="ekoputovanja pariz">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Putuj u grad ljubavi za samo 199 eur</h4>
                            <h1 class="display-3 text-white mb-md-4">Poseti Pariz</h1>
                            <a href="putovanja.html" class="btn btn-primary py-md-3 px-md-5 mt-2">Pogledaj više</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/malta.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Uzivaj na malti</h4>
                            <h1 class="display-3 text-white mb-md-4">Otkrij stari grad i prelepe plaze</h1>
                            <a href="putovanja.html" class="btn btn-primary py-md-3 px-md-5 mt-2">Pogledaj više</a>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->


    <section id="putovanja">
        <div class="container-fluid py-5">
            <div class="container">
                <div class="text-center mb-3 pb-3">
                    <h1 style="color: #7AB730;">DESTINACIJE</h1>
                </div>

                <div class="owl-carousel testimonial-carousel">
                <?php
                $data  = array();
                
                $q = "SELECT * FROM destination
                ORDER BY RAND()
                LIMIT 5;
                ";
                $r = mysqli_query($dbc,$q);
                if($r)
                {
                        $num = mysqli_num_rows($r);
                        if($num>0)
                        {
                            while($row = mysqli_fetch_array($r,MYSQLI_ASSOC))
                            {
                               echo '
                               <div class="package-item bg-white mb-2">
                               <img style="height:200px;"  class="img-fluid" src="php/uploads/'.$row['pocetna'].'" alt="Fotografija">
                               <div class="p-4">
                                   <div class="d-flex justify-content-between mb-3">
                                       <small class="m-0"><i id="fasovi" class="fa fa-map-marker-alt text-primary mr-2"></i> '.$row['country'].' </small>
                                       <small class="m-0"><i id="fasovi" class="fa fa-calendar-alt text-primary mr-2"></i> '.$row['days'].' </small>
                                       <small class="m-0"><i id="fasovi" class="fa fa-user text-primary mr-2"></i>2</small>
                                   </div>
                                   <p class="h5 text-decoration-none" href="">'.$row['description'].'</p>
                                   <div class="border-top mt-4 pt-4">
                                       <div class="d-flex justify-content-between">
                                           <h6 class="m-0"><i id="fasovi" class="fa fa-star text-primary mr-2"></i>4.5 <small>(250)</small></h6>
                                           <h5 class="m-0">'.$row['price'].'€</h5>
                                       </div>
                                   </div>
                                   </div>
                                   </div>
                      
                               ';
                            }
                        }
                        else
                        {
                            echo 'Greska u sistemu 2!'; 
                        }
                }
                else{
                    echo 'Greska u sistemu!';
                }
                
                ?>
                
                      
                    </div>
                </div>
            </div>
    </section>



    <!-- Feature Start -->
    <!--
    <div class="container-fluid pb-5">
        <div class="container pb-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-money-check-alt text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Competitive Pricing</h5>
                            <p class="m-0">Magna sit magna dolor duo dolor labore rebum amet elitr est diam sea</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-award text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Best Services</h5>
                            <p class="m-0">Magna sit magna dolor duo dolor labore rebum amet elitr est diam sea</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-globe text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Worldwide Coverage</h5>
                            <p class="m-0">Magna sit magna dolor duo dolor labore rebum amet elitr est diam sea</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
-->
    <!-- Feature End -->

    

   <section id="onama">    
    <div class="container-fluid py-5">
        <h1 style="text-align: center; color: #7AB730;">O NAMA</h1>
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-6" style="min-height: 500px;">
                    <div class="position-relative h-100" >
                        <img class="position-absolute w-100 h-100 " src="img/pr.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 pt-5 pb-lg-5">
                    <div class="about-text bg-white p-4 p-lg-5 my-lg-5">
                        <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">O Nama</h6>
                        <h1 class="mb-3">Putovanje Za Tebe</h1>
                        <p>Mi se bavimo <b>Personalizovanim</b> individualnim i grupnim putovanjima. </p>
                   
                        <p>Kod nas mozete pronaci i vec postojece aranžmane sa exkluzivnim destinacijama. Sva putovanja ukljucuju avio prevoz.</p>
                        <ul>
                            <li class="li">Na osnovu vaših željenih destinacija i datuma pravimo aranžman specijalno za Vas</li>
                            <li class="li">Ekskluzivne destinacije poput Maldiva, Sejšela..</li>
                            <li class="li">Pokriveno osiguranje</li>
                            <li class="li">Mogućnost organizovanja aerodromskog transfera</li>
                        </ul>

                        <div class="row mb-4">
                            <div class="col-6">
                                <img class="img-fluid" src="img/about-1.jpg" alt="">
                            </div>
                            <div class="col-6">
                                <img class="img-fluid" src="img/rim2.jpg" alt="">
                            </div>
                        </div>
                        <a href="putovanja.php" class="btn btn-primary mt-1">Pogledajte Ponudu</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
   </section>

     <!-- Service Start -->
     
     <section id="usluge">
     <div class="container-fluid py-5 usluge">
        <div class="container">
            <div class="text-center mb-3 pb-3">
                <h1 style="color: #7AB730;">USLUGE</h1>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4 kartica">
                        <i class="fa fa-2x fa-plane-departure mx-auto mb-4"></i>
                        <h5 class="mb-2 uslugeNaslov">Prevoz</h5> <br>
                        <p class="m-0">Nudimo usluge pronalazenja i kupovine avio karata.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 col-sm-12">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4 kartica">
                        <i class="fa fa-2x fa-hotel mx-auto mb-4"></i>
                        <h5 class="mb-2 uslugeNaslov">Smeštaj</h5> <br>
                        <p class="m-0 ">Posedujemo veliki broj hotela i apartmana u ponudi.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 col-sm-12">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4 kartica">
                        <i class="fa fa-2x fa-user-shield mx-auto mb-4"></i>
                        <h5 class="mb-2 uslugeNaslov">Osiguranje</h5> <br>
                        <p class="m-0 ">Obavite sve online. Putno osiguranje ukljuceno u cenu.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="service-item bg-white text-center mb-2 py-5 px-4 kartica">
                        <i class="fa fa-2x fa-car mx-auto mb-4"></i>
                        <h5 class="mb-2 uslugeNaslov">Rent-a-car</h5> <br>
                        <p class="m-0">Mogućnost prevoza od aerodroma do hotela i iznajmljivanje vozila.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- Service End -->




    <!-- Blog Start -->
    <section id="blog">
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h1 style="color: #7AB730;">BLOG</h1>
            </div>
            <div class="row pb-3">
                <div class="col-lg-4 col-md-6 mb-4 pb-2">
                    <div class="blog-item">
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="img/blog-1.jpg" alt="">
                            <div class="blog-date">
                                <h6 class="font-weight-bold mb-n1">03</h6>
                                <small class="text-white text-uppercase">Mart</small>
                            </div>
                        </div>
                        <div class="bg-white p-4">
                            <div class="d-flex mb-2">
                                <p class="text-primary text-uppercase text-decoration-none" href="">SIGURNOST NA PUTOVANJU: Kako biti i ostati siguran</p>
                            </div>
                            <p class="h5 m-0 text-decoration-none" href="">Koliko je sigurnost na putovanju važna, najbolje govori činjenica da svi volimo da putujemo bez puno briga. Tačnije, bez briga uopšte.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 pb-2">
                    <div class="blog-item">
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="img/blog-2.jpg" alt="">
                            <div class="blog-date">
                                <h6 class="font-weight-bold mb-n1">15</h6>
                                <small class="text-white text-uppercase">Mart</small>
                            </div>
                        </div>
                        <div class="bg-white p-4">
                            <div class="d-flex mb-2">
                                <p class="text-primary text-uppercase text-decoration-none" href="">SAVETI ZA PAKOVANJE</p>
                            </div>
                            <p class="h5 m-0 text-decoration-none" href="">Pakovanje. Nekome prijatelj, nekome neprijatelj. Dok neki uživaju u procesu pakovanja pred put, neki bi radije preskočili taj korak..</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 pb-2">
                    <div class="blog-item">
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="img/blog-3.jpg" alt="">
                            <div class="blog-date">
                                <h6 class="font-weight-bold mb-n1">22</h6>
                                <small class="text-white text-uppercase">Mart</small>
                            </div>
                        </div>
                        <div class="bg-white p-4">
                            <div class="d-flex mb-2">
                                <p class="text-primary text-uppercase text-decoration-none" href="">JEFTINA PUTOVANJA: 7 saveta koji vam mogu pomoći da putujete više</p>
                            </div>
                            <p class="h5 m-0 text-decoration-none" href="">Koji su to saveti za jeftina putovanja i kako putovati jeftinije ili bolje rečeno ekonomičnije?! Procitajte clanak i saznajte..</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- Blog End -->


     <!-- Registration Start -->
     
     <section id="kontakt">
     <div class="container-fluid bg-registration py-5" style="margin: 90px 0;">
        <h1 style="text-align: center; color: #7AB730;">KONTAKTIRAJTE NAS</h1>
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-4 mb-5 mb-lg-0 kontaktIkonice">
                    <div class="row">
                        <div class="col-md-12" >
                          <div class="dbox w-100 text-center" >
                            <div class="icon d-flex align-items-center justify-content-center" style="padding-top: 20px;">
                                <img src="img/t.png" class="ikona" alt="phone">
                              </div>
                            <div class="text tekst">
                              <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
                            </div>
                            
                          </div>
                        </div>
                       </div>
                       <div class="row">
                        <div class="col-md-12">
                          <div class="dbox w-100 text-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                             <img src="img/putovanjaslika (3).png" class="ikona" alt="email">
                           </div>
                            <div class="text tekst">
                              <p><span>Email:</span> <a href="mailto:info@yoursite.com">kaktustravel@gmail.com</a></p>
                            </div>
                          
                          </div>
                        </div>
                       </div>
                       <div class="row">
                        <div class="col-md-12">
                          <div class="dbox w-100 text-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                             <img src="img/putovanjaslika (4).png" class="ikona" alt="site">
                           </div>
                            <div class="text tekst">
                              <p><span>Website</span> <a href="#">kaktustravel.com</a></p>
                            </div>
                          </div>
                        </div>
        
                       </div>
                </div>
                <div class="col-lg-8">
                    <form action="izlazna.html" method="post" class="forma">
                        <div class="row">
                         <div class="col-md-6">
                           <i class="fas fa-user-check" ></i>
                           <label for="ime" id="ime" > Ime</label><br>
                           <input onkeypress="returns /[a-z]/i.test(event.key)" required type="text"  minlength="2" class="form-control" placeholder="Ime" >
                         </div>
                         <div class="col-md-6">
                           <i class="fas fa-user-check" ></i>
                           <label for="prezime"  id="prezime"> Prezime</label>
                           <input onkeypress="returns /[a-z]/i.test(event.key)" required minlength="2"   type="text" class="form-control" placeholder="Prezime" >
                         </div>
                        </div>
                        
                        <div class="row">
                        <div class="col-md-6">
                          <br>
                          <i class="fas fa-phone" ></i>
                          <label for="email" class="form-label" id="telefon" > Telefon</label><br>
                          <input type="tel" id="phone" class="form-control" name="phone" pattern="[0-9]{3}/[0-9]{3}-[0-9]{4}" placeholder="064/357-4879"> 
                        </div>
                        <div class="col-md-6">
                          <br>
                          <i class="fas fa-envelope" ></i>
                          <label for="email" class="form-label" id="email" > E-mail adresa</label>
                           <input type="email" required class="form-control"    placeholder="mikamikic@gmail.com">
                        </div>
                        
                        </div>
                        <br>
                        
                        <div class="mb-3">
                        <i class="fas fa-comment-alt" ></i>
                        <label for="poruka" class="form-label"  id="poruka"> Poruka</label>
                        <textarea class="form-control" id="poruka"  rows="3"  required placeholder="Unesite Vašu poruku"></textarea>
                        </div>
                        <button type="submit" class="btn  dugme" style="background-color: #7AB730; color: white;">Pošalji</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Registration End -->

    
    
   

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 py-5 px-sm-3 px-lg-5" style="margin-top: 90px;">
        <div class="row pt-5">
            <div class="col-lg-4 col-md-6 mb-5">
                <a href="" class="navbar-brand">
                    <img src="img/ekologow.png" alt="ekoputovanja" class="logo">
                </a>
                <!-- <p>Sed ipsum clita tempor ipsum ipsum amet sit ipsum lorem amet labore rebum lorem ipsum dolor. No sed vero lorem dolor dolor</p> -->
                <h6 class="text-white text-uppercase mt-4 mb-3" style="letter-spacing: 5px;">Follow Us</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-outline-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Šta nudimo?</h5>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white-50 mb-2" href="putovanja.php"><i class="fa fa-angle-right mr-2"></i>Putovanja</a>
                    <a class="text-white-50 mb-2" href="#onama"><i class="fa fa-angle-right mr-2"></i>O nama</a>
                    <a class="text-white-50 mb-2" href="#usluge"><i class="fa fa-angle-right mr-2"></i>Usluge</a>
                    <a class="text-white-50 mb-2" href="#blog"><i class="fa fa-angle-right mr-2"></i>Blog</a>
                    <a class="text-white-50 mb-2" href="#kontakt"><i class="fa fa-angle-right mr-2"></i>Kontakt</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Kontaktirajte nas</h5>
                <p><i class="fa fa-map-marker-alt mr-2"></i>Beograd, Republika Srbija</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+38163 772</p>
                <p><i class="fa fa-envelope mr-2"></i>office@ekoputovanja.com</p>
                <h6 class="text-white text-uppercase mt-4 mb-3" style="letter-spacing: 5px;">Newsletter</h6>
                <div class="w-100">
                   
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="row">
            <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white-50">Copyright &copy; <a href="#">EkoPutovanja</a></a>
                </p>
            </div>
         
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>