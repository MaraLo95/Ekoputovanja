<?php

require('admin/konekcija.php');
$_SESSION['path'] = 'admindestination.php';
if($_SESSION['user']=='acmilan')
{
 
 
$data = array();
$q = "SELECT * FROM destination";
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


    <div class="pr-4"  style="text-align:right; background-color:#F3F3F3;">
        <button  id='ad' class="btn" onclick='dodaj()'><i id="fasovi" class="fas fa-plus"></i></button>  
    </div>
  
  <div  style="background-color:#F3F3F3">
  <div class="form-outline mb-2" id="srcdest">
  <input type="text" onkeyup="searchdestination(this.value)" class="form-control" placeholder="Pretrazi...">
  </div>
            <div style="width:95%;" class="row homeca m-auto">
            
           </div>
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
  if(spisakzaposlenih.length>0)
  {
  for(let i of spisakzaposlenih)
  {

    html.innerHTML+=`
   
    <div class="col-lg-3 col-md-3 mb-4">
                    <div class="package-item bg-white mb-2">
                        <img style="width:100%; height:150px;" class="img-fluid" src="uploads/${i['pocetna']}" alt="">
                        <div class="p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="m-0"><i id="fasovi" class="fa fa-map-marker-alt text-primary mr-2"></i> ${i['country']} </small>
                                <small class="m-0"><i id="fasovi" class="fa fa-calendar-alt text-primary mr-2"></i> ${i['days']} </small>
                                <small class="m-0"><i id="fasovi" class="fa fa-user text-primary mr-2"></i>2</small>
                            </div>
                            <p class="h5 text-decoration-none" href="">${i['description']}</p>
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="m-0"><i id="fasovi" class="fa fa-star text-primary mr-2"></i>4.5 <small>(250)</small></h6>
                                    <h5 class="m-0">${i['price']}€</h5>
                                </div>
                            </div>
                            </div>
                          <div class="row" style="width:102%;"> 
                          <div class="col-sm-12 col-md-4">
                        <form  action="admin/snimi.php" method="POST">
                        <input type="hidden" name="id_to_delete" value="${i['id']}">
                <button  name="delete" type="submit"  class="btn btn-success" >Obriši</button>
    </form>
    </div>
    <div class="col-sm-12 col-md-4">
     <button   class="btn btn-success " onclick="izmenadest(${i['id']})">Izmeni</button>
    </div>
    <div class="col-sm-12 col-md-4">
      <input type="hidden" name="id" value="${i['id']}">
      <button type="submit"  name="btn2" id="btn2" class="btn btn-success " onclick="asss(${i['id']})">Prikazi</button>
     </div>
     </div>
    
      </div>
      </div>
    `
  }
}
  else{
    html.innerHTML='Nema podataka za prikaz!';
  }
  let id = getCookie('idizmena');
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
