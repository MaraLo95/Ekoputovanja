<?php

require('admin/konekcija.php');
if($_SESSION['user']=='acmilan')
{
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
else{
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>
  <style>
    #br{
      padding:5px 10px 5px 5px;
      background-color: black;
      color:white;
      font-weight:bolder;
      font-size:22px;
      border-radius:10px;
    }
  </style>
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
             echo "<img style='width:30px; height:30px; margin:20px;' src='images/destination.png'><span id='br'> $num</span> <hr>\n";
            ?>
            <div class="form-outline mb-2" id="srcdest">
            <input type="text" onkeyup="searchorders(this.value)" class="form-control" placeholder="Pretrazi...">
          </div>
            <div class="row homeca">
           <form style="width:100%;" action="admin/adminorderdelete.php" method="POST">
           <table class="table">
  <thead class="thead-dark">
    <tr>
    <th scope="col">#</th>
      <th scope="col">Ime</th>
      <th scope="col">Email</th>
      <th scope="col">Telefon</th>
      <th scope="col">Drzava</th>
      <th scope="col">Grad</th>
      <th scope="col">Cena/Brdana</th>
      <th scope="col"></th>
    </tr>
    <tbody>
    </tbody>
  </thead>
  
<table>
           </div>
        </div>
        </div>
    </div>

    <script src="js/funckije.js"></script>
    <script>
  spisakzaposlenih=[];
   
  let destination = <?php echo json_encode($data) ?>;
  let html = document.querySelector('tbody');
  for(let i of destination)
  {
    spisakzaposlenih.push(i);
  }
  let br=0;
  for(let i of spisakzaposlenih)
  {

    br++;
    html.innerHTML+=`
    
    <tr>
      <th scope="row">${br}</th>
      <td>${i['name']}</td>
      <td>${i['email']}</td>
      <td>${i['phone']}</td>
      <td>${i['country']}</td>
      <td>${i['city']}</td>
      <td>${i['price']}€/${i['days']}</td>
      <td class="text-right"> <input name="delete" type="submit"  class="btn btn-success mx-2" value="Obrisi"></td>
    </tr>
    <input type="hidden" name="iduser" value="${i['iduser']}">
    <input type="hidden" name="iddest" value="${i['iddestination']}">
   </form>
    `
   
  }

  let id = getCookie('idizmena');
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
