<?php

require('admin/konekcija.php');
if($_SESSION['user']=='acmilan')
{

$data = array();
$q = "SELECT * FROM images";
$r = @mysqli_query($dbc, $q); //Izvrsavanje upita
// Brojanje prikazanih redova:
$num = mysqli_num_rows($r);

if ($num > 0) { // Ako je rezultat upita broj redova  veci od nula
  // Štampaj Broj destinacija:
 
   /* echo "<div class='container'>";
    echo "<div class='row'>";
*/
  // Prolazak kroz redove zapisa rezultata upita:
  while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
      $data[]=$row;
    /*    echo '<div class="card" style="width: 16rem;">
        
         <div id="'.$row['id'].'" class="card-body">
          <h5 class="card-title">'.$row['country'].'<br>'.$row['city'].' - '.$row['price'].'€</h5>
          <p class="card-text">'.$row['description'].'</p>
          <p>'.$row['date'].'</p>
          <button name="btnobrisi" onclick="obrisi('.$row['id'].')">Obrisi</button>
          </div>
      </div>';*/
  }
  mysqli_free_result ($r); // Oslobadjanje resursa zauzetih od strane upita.
}
 }
 elseif($_SESSION['user'])
{
  header("Location:../index.php");
}
else { // Ako nema zapisa za prikaz.
  header("Location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/lightbox.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>
    <style>

  
    </style>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href=""><img src="../img/log.png" alt="" style="width:45px; height:45px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav m-auto">
      <li class="nav-item">
        <a class="nav-link" href="lazna.php">  <i id="faadmin" class="fa fa-2x fa-home mx-auto mb-2"></i> <span class="sr-only"></span></a>
       </li>
      <li class="nav-item">
        <a class="nav-link" href="admindestination.php">   <i id="faadmin" class="fa fa-2x fa-map-marker-alt mx-auto mb-2"></i> <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admingalery.php">  <i id="faadmin" class="fa fa-2x fa-image mx-auto mb-2"></i> <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="adminuser.php">      <i id="faadmin" class="fa fa-2x fa-user mx-auto mb-2"></i><span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="adminorders.php">     <i id="faadmin" class="fa fa-2x fa-shopping-bag mx-auto mb-2"></i> <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">    <i id="faadmin" class="fa fa-2x fa-user-cog mx-auto mb-2"></i> <span class="sr-only"></span></a>
      </li>
    </ul>
    <span ml-auto>
    <a href="admin/destroysesion.php" style="color:black;" type="button" class="btn btn-light">Odjava</a>
  </span>
  </div>
</nav>
    <div class="col-md-12">
            <?php
             echo "<img style='width:30px; height:30px; margin:20px;' src='images/galery.png'><span id='br'> $num </span>  <hr>\n";
            ?>
            <form id="formphoto" class="text-center"   name="myFormImage"  action="admin/upload.php" enctype="multipart/form-data"  onsubmit="return validacijaslika(spisakzaposlenih)"  method="POST">
 Izaberite fotografije:
  <input type="file" name="files[]" id="fileToUpload" multiple>
  <input class="btn btn-success" type="submit"  name="submit" value="Dodaj Fotografiju">
</form>
 <div class="form-outline mb-2" id="srcdest">
            <input type="text" onkeyup="searchimages(this.value)" class="form-control" placeholder="Pretrazi...">
          </div>
<hr>
            <div class="row homeca">
            
           </div>
        </div>
        </div>
    </div>

    <div id="myModal" class="modal">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <div class="modal-content">

    <div class="mySlides">
      <div class="numbertext"></div>
      <img src="img1_wide.jpg" style="width:100%">
    </div>
  </div>

    <script src="js/funckije.js"></script>
    <script>
  spisakzaposlenih=[];
   
  let destination = <?php echo json_encode($data) ?>;
  let html = document.querySelector('.homeca');
  for(let i of destination)
  {
    spisakzaposlenih.push(i);
  }
  for(let i of spisakzaposlenih)
  {

    
    html.innerHTML+=`
    <div class="col-md-3 mt-4">
    <div class="card"">
    <a class="example-image-link" href="uploads/${i['file_name']}" data-lightbox="example-2" data-title="Optional caption."><img style="width:100%; height:150px;" class="example-image" src="uploads/${i['file_name']}" alt="image-${i}"></a>
  <p class="text-center">${i['file_name']}</p>
  </div>
  </div>
    `
    
   
  }

  // Open the Modal
  function openModal() {
  document.getElementById("myModal").style.display = "block";
}

// Close the Modal
function closeModal() {
  document.getElementById("myModal").style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}

console.log(spisakzaposlenih);
</script>
<script src="js/lightbox-plus-jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
