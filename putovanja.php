<?php
require('php/admin/konekcija.php');
$kor = '';
if($_SESSION)
{
    $idus = $_SESSION['iduser'];
$kor = $_SESSION['user'];
$data = array();
$orders = array();
$q = "SELECT * FROM destination
ORDER BY country ASC";
$r = @mysqli_query($dbc, $q); 
$q2 = "SELECT * FROM orders";
$r2 = @mysqli_query($dbc, $q2); //Izvrsavanje upita

// Brojanje prikazanih redova:
$num2 = mysqli_num_rows($r2);
$num = mysqli_num_rows($r);
if ($num2 > 0) { 
    while ($row = mysqli_fetch_array($r2, MYSQLI_ASSOC)) {
        $orders[]=$row;
    }
    mysqli_free_result ($r2); // Oslobadjanje resursa zauzetih od strane upita.
  } 
if ($num > 0) { 
  // Prolazak kroz redove zapisa rezultata upita:
  while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
      $data[]=$row;
  }
  mysqli_free_result ($r); // Oslobadjanje resursa zauzetih od strane upita.
} 
if($_SESSION['user']=='acmilan')
{
    header("Location:php/lazna.php");
}
}
else
{$data = array();
    $q = "SELECT * FROM destination";
    $r = @mysqli_query($dbc, $q); 
    $num = mysqli_num_rows($r);
    if ($num > 0) { 
        // Prolazak kroz redove zapisa rezultata upita:
        while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
            $data[]=$row;
        }
        mysqli_free_result ($r); // Oslobadjanje resursa zauzetih od strane upita.
      } 

      $idus=0;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EkoPutovanja - Ponuda Putovanja</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 

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
                        <a href="index.php" class="nav-item nav-link ">Početna</a>
                        <a href="putovanja.php" class="nav-item nav-link active">Putovanja</a>
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
                        <a href="index.php#usluge" class="nav-item nav-link">Usluge</a>
                        <a href="index.php#blog" class="nav-item nav-link">Blog</a>
                        <a href="index.php#kontakt" class="nav-item nav-link">Kontakt</a>
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

   
  <!-- Packages Start -->

     <div class="homeca">
  <div class="container-fluid py-2">
     <div>
        <form action="putovanja.html" method="post">
          <fieldset>
            <div class="row">
           <div class="col-md-3">
            <legend id="naslovFiltera">Država</legend>
            <hr>      
            <?php  
            for( $i=0; $i<count($data);$i++){

              
              if($i<count($data) - 1)
              {
                if($data[$i+1]['country'] != $data[$i]['country']){
                echo ' <input type="checkbox" id="izbor" class="dodatno" value='.$data[$i]['country'].'> '.$data[$i]['country'].'<br> ';
                }
            }
            else if($i<count($data))
            {
                echo '<input type="checkbox" id="izbor" class="dodatno" value='.$data[$i]['country'].'> '.$data[$i]['country'].'<br>';
            }
            }
            ?> 
        </div>
        <div class="col-md-3">
            <legend id="naslovFiltera">Smestaj</legend>    
            <hr>  
            <?php  
            for( $i=0; $i<count($data);$i++){

              
              if($i<count($data) - 1)
              {
                if(($data[$i+1]['apartmansway'] != $data[$i]['apartmansway']) && $data[$i]['apartmansway']!=''){
                echo ' <input type="checkbox" id="izbor" class="smestaj" value='.$data[$i]['apartmansway'].'> '.$data[$i]['apartmansway'].'<br> ';
                }
            }
            else if($i<count($data) && $data[$i]['apartmansway']!='')
            {
                echo '<input type="checkbox" id="izbor" class="smestaj" value='.$data[$i]['apartmansway'].'> '.$data[$i]['apartmansway'].'<br>';
            }
            }
            ?>     
        </div>     

        <div class="col-md-3">
            <legend id="naslovFiltera">Prevoz</legend>      
            <hr>
            <?php  
            for( $i=0; $i<count($data);$i++){

              
              if($i<count($data) - 1)
              {
                if(($data[$i+1]['transportway'] != $data[$i]['transportway']) && $data[$i]['transportway']!=''){
                echo ' <input type="checkbox" id="izbor" class="prevoz" value='.$data[$i]['transportway'].'> '.$data[$i]['transportway'].'<br> ';
                }
            }
            else if($i<count($data) && $data[$i]['transportway']!='')
            {
                echo '<input type="checkbox" id="izbor" class="prevoz" value='.$data[$i]['transportway'].'> '.$data[$i]['transportway'].'<br>';
            }
            }
            ?>             
        </div>
     
        <div class="col-md-3 dugme">
            <button class="btn btn-primary py-md-3 px-md-5 mt-2" onclick="prikazisort()" id="dugme">Pretrazi</button>
        </div>
        </div>
          </fieldset>
        </form>
     </div>
    </div>

        <div class="container-fluid py-2">
        <div class="col-lg-12">
            <h1 class="mb-3" style="text-align: center;">PUTOVANJA</h1>
            <div class="row">
                


                <?php
                foreach($data as $row)
                {
                    echo' <div class="col-lg-4 col-md-4 mb-4">
                    <div class="package-item bg-white mb-2">
                        <img style="width:100%; height:150px;" class="img-fluid" src="php/uploads/'.$row['pocetna'].'" alt="">
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
                          <div class="row  m-1 pb-4 text-right"> 
                <div class="col-sm-12 col-md-12">
                  <input type="hidden" name="id" value="'.$row['id'].'">
                  <button type="submit"  name="btn2" id="btn2" class="btn btn-success py-2 px-4" style="border-radius:7px;" onclick="prikazputo('.$row['id'].','.$idus.')">Prikazi</button>
                 </div>
                 </div>
                
                  </div>
                  </div> ';
                }
                
                
                ?>
              </div>
        </div>
    
   </div>
</div>

            </div>
    
           


     <!-- Footer Start -->
     <div class="container-fluid bg-dark text-white-50 py-5 px-sm-3 px-lg-5" style="margin-top: 90px;">
        <div class="row pt-5">
            <<div class="col-lg-4 col-md-6 mb-5">
                <a href="" class="navbar-brand">
                    <img src="img/ekologow.png" alt="ekoputovanja" class="logo">
                </a>
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
                    <a class="text-white-50 mb-2" href="#putovanja"><i class="fa fa-angle-right mr-2"></i>Putovanja</a>
                    <a class="text-white-50 mb-2" href="#onama"><i class="fa fa-angle-right mr-2"></i>O nama</a>
                    <a class="text-white-50 mb-2" href="#usluge"><i class="fa fa-angle-right mr-2"></i>Usluge</a>
                    <a class="text-white-50 mb-2" href="#blog"><i class="fa fa-angle-right mr-2"></i>Blog</a>
                    <a class="text-white-50 mb-2" href="#kontakt"><i class="fa fa-angle-right mr-2"></i>Kontakt</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Kontaktirajte nas</h5>
                <p><i class="fa fa-map-marker-alt mr-2"></i>123 Street, New York, USA</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
                <p><i class="fa fa-envelope mr-2"></i>info@example.com</p>
                <h6 class="text-white text-uppercase mt-4 mb-3" style="letter-spacing: 5px;">Newsletter</h6>
                <div class="w-100">
                   
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="row">
            <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white-50">Copyright &copy; <a href="#">Kaktus travel</a>. All Rights Reserved.</a>
                </p>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <script>
       
  spisakzaposlenih=[];
  let idus;
  let destination = <?php echo json_encode($data) ?>;
  orders=[];
  let nizorders = <?php echo json_encode($orders) ?>;
  let html = document.querySelector('.homeca');
  for(let i of destination)
  {
    spisakzaposlenih.push(i);
  }
  for(let i of nizorders)
  {
    orders.push(i);
  }
  for(let i of orders)
  {
    if(<?php echo $_SESSION['iduser']?>==i['iduser'])
    {
        idus = i['iduser'];
    }
  }
  
  if(spisakzaposlenih.length>0)
 {
  }
  else{
    html.innerHTML=`
      <div>Nemate  destinacija za prikaz</div>
    `
  }
  let listadrzava=[];
  let listasmestaj=[];
  let listaprevoz=[];
  let prevoz  = document.querySelectorAll(".prevoz");
  let smestaj  = document.querySelectorAll(".smestaj");
   let dodatno  = document.querySelectorAll(".dodatno");
   for(let c of dodatno)
   {
    c.addEventListener('click',function(){
        if(this.checked == true)
        {
            listadrzava.push(this.value);
            console.log(listadrzava);
        } else{
            listadrzava = listadrzava.filter(e=> e !== this.value);
            console.log(listadrzava);
        }
    })
   }
   for(let c of smestaj)
   {
    c.addEventListener('click',function(){
        if(this.checked == true)
        {
            listasmestaj.push(this.value);
            console.log(listasmestaj);
        } else{
            listasmestaj = listasmestaj.filter(e=> e !== this.value);
            console.log(listasmestaj);
        }
    })
   }
   for(let c of prevoz)
   {
    c.addEventListener('click',function(){
        if(this.checked == true)
        {
            listaprevoz.push(this.value);
            console.log(listaprevoz);
        } else{
            listaprevoz = listaprevoz.filter(e=> e !== this.value);
            console.log(listaprevoz);
        }
    })
   }
   

</script>
    <script src="php/js/funckije.js"></script>
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