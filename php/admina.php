<?php
 
 require('admin/konekcija.php');
if(!($_SESSION['user'])=='acmilan'){
  header("Location:login.php");
}
else{
$data = array();
$q = "SELECT * FROM images";
$r = @mysqli_query($dbc, $q); 
while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
  $data[]=$row;
}
   echo '
   
<form id="formacpanel" name="myForm" action="admin/dbsend.php" enctype="multipart/form-data" onsubmit="return validacija()" method="POST">
<hr>  
<div class="row">
  <div class="col-md-9">
  <div class="row">
    <div class="col-md-6">
  <input class="form-control" name="country"   placeholder="Drzava" type="text">  <br>
   <input type="date" name="datestart" id=""> - 
  <input type="date" name="dateend" id="">  
   <hr>
  <span class="span">Izaberite nacin prevoza:</span>
  <hr>
  <input  type="radio" onclick="showtransport(1)"   style="width:20px;" class="ml-2"  id="transportda" name="transport" value="da">
        <label class="labeladmina"   for="da">Da</label> 
         <input   style="width:20px;" onclick="showtransport(0)" class="ml-2" type="radio" id="transportne" name="transport" value="ne">
        <label class="labeladmina"  for="ne">Ne</label> <br>
        <span id="spantransport"  style="margin: 0; padding:0;">
        <select name="transportway" id="seltran" class="form-select" aria-label="Default select example">
        <option value="" disabled selected hidden>Izaberite</option>
        <option value="Avion">Avion</option>
        <option value="Autobus">Autobus</option>
        </select>
</span>
<br>
       
  </div>
  <div class="col-md-6">
  <input class="form-control" name="city" placeholder="Grad" type="text"> <br>
 
               <span class="span">Dodatno:</span>
               <hr>
              
               <div class="row">
               <div class="col-md-5">        
                    
                       <input style="width:20px;"  type="checkbox"  name="dodatno[]" value="Parking"> 
                       <label class="labeladmina"  for="parking">Parking</label>  <br> 
                       <input style="width:20px;" type="checkbox"  name="dodatno[]" value="Wifi">
                       <label class="labeladmina"  for="wifi">Wi-Fi</label>  <br>
                       <input class="ml-2" style="width:20px;" type="checkbox"  id="W" name="dodatno[]" value="Restoran">
                       <label class="labeladmina"  for="restoran">Restoran</label> <br>
                       </div>
                       <div class="col-md-7" id="spanright">
                       <label class="labeladmina"  for="osiguranje">Osiguranje</label>
                      <input  style="width:20px;" type="checkbox"  name="dodatno[]" value="Osiguranje"> <br>       
                      <label class="labeladmina"  for="transport">Transfer</label>
                      <input  style="width:20px;" type="checkbox"  name="dodatno[]" value="Transfer">
                      <br>
                      <label class="labeladmina"  for="pogled">Pogled na plazu</label> 
                      <input  style="width:20px;" type="checkbox"   name="dodatno[]" value="Pogled">
                      <br>  
                      <label class="labeladmina"  for="akcija">Akcija</label> 
                      <input  style="width:20px;" type="checkbox" name="dodatno[]" value="Akcija">
                      
                 </div>
                 </div>
  </div>
  <div class="col-md-12">
  <select name="pocetna" id="sel"  class="form-select form-select-lg mb-3" required>
  <option value="" disabled selected hidden>Pocetna </option>
  
 ';
 foreach ($data as $value) {
        echo '<option name="pocetna" value="'.$value['file_name'].'">'.$value['file_name'].'</option>';
  }
  echo '
  
</select>

<select name="slider1" id="sel" class="form-select" required aria-label="Default select example">
<option value="" disabled selected hidden>Slider1</option>

';
foreach ($data as $value) {
      echo '<option name="slider1" value="'.$value['file_name'].'">'.$value['file_name'].'</option>';
}
echo '

</select>
<select name="slider2" id="sel" class="form-select" required aria-label="Default select example">
<option value="" disabled selected hidden>Slider2</option>

';
foreach ($data as $value) {
      echo '<option name="slider2" value='.$value['file_name'].'>'.$value['file_name'].'</option>';
}
echo '

</select>
<select name="slider3" id="sel" class="form-select" required aria-label="Default select example">
<option value="" disabled selected hidden>Slider3</option>

';
foreach ($data as $value) {
      echo '<option name="slider3" value='.$value['file_name'].'>'.$value['file_name'].'</option>';
}
echo '

</select>
<select name="slider4" id="sel" class="form-select" required aria-label="Default select example">
<option value="" disabled selected hidden>Slider4</option>
';
foreach ($data as $value) {
      echo '<option name="slider4" value='.$value['file_name'].'>'.$value['file_name'].'</option>';
}

echo '

</select>
<hr>
  <textarea class="form-control" name="description" style="width:100%;height:150px;" placeholder="Opis" type="text"></textarea> <br></div>
 </div>
 </div>
 <div class="col-md-3">
  <div class="col-md-12">
  <input class="form-control" name="price" placeholder="Cena" type="number"> <br>

<span class="span">Smestaj:</span> 
<hr>
        <input  type="radio" onclick="show(1)"   style="width:20px;" class="ml-2"  id="smestajda" name="smestaj" value="da">
        <label class="labeladmina"   for="da">Da</label> 
         <input   style="width:20px;" onclick="show(0)" class="ml-2" type="radio" id="smestajne" name="smestaj" value="ne">
        <label class="labeladmina"  for="ne">Ne</label> <br>
        <span id="spanhotel" style="margin: 0; padding:0;display:none;">
         <select name="smestajmodel" class="form-select mb-3">
         <option value="" disabled selected hidden>Izaberite smestaj</option>
         <option value="Hotel">Hotel</option>
         <option value="Apartman">Apartman</option>
         </select> <br>
        <input class="form-control" type="text" name="smestajime" placeholder="Unesite ime Hotela/Apartamana"> <br>
        
        </span>
       <br>
  <span class="span">Hrana:</span>
    
               <hr>
        <input type="radio" onclick="showfood(1)"   style="width:20px;" class="ml-2"  id="hranada" name="hrana" value="da">
        <label class="labeladmina"   for="da">Da</label>   
        <input style="width:20px;" onclick="showfood(0)"  class="ml-2" type="radio" id="hranane" name="hrana" value="ne">
        <label class="labeladmina"  for="ne">Ne</label> <br>    
         <span id="spanhrana">    
            <select name="hranaway"  class="form-select">
            <option value="" disabled selected hidden>Izaberite</option>
            <option value="Dorucak">Dorucak</option>
            <option value="Polupansion">Polupansion</option>
            <option value="Punpansion">Punpansion</option>
            </select> <br>
        </span>
</div>
</div>
<input type="submit" style="width:100%;" class="btn btn-success" name="btn"  value="Dodaj">
</form>
 ';

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <title>Kaktus - Travel</title>
</head>
<body>
   <style>
      #formacpanel{
       
         padding:30px;
         width:100%;
         background-color:;
        
      }
     
      #spanright{
        text-align:right;
      }
      #spanhrana{
        display:none;
        background-color:#F3F3F3;
      }
      #spanhotel{
        display:none;
         background-color:#F3F3F3;
      }
      #spantransport{
        display:none;
        background-color:#F3F3F3;
      }
      .span{
        padding:9px;
        background-color: grey !important;
        color:white;
        border-radius:5px;
      }
      .labeladmina{
        padding:5px;
        background-color:  ;
        color:black;
        border-radius:5px;
      }
     #srcdest{
      display:none;
     }
    
   </style>
   
   <script src="js/funckije.js"></script>
  
</body>
</html>