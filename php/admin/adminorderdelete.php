<?php


require('konekcija.php');
if(isset($_POST['delete'])){
    $iduser = mysqli_real_escape_string($dbc,$_POST['iduser']);
    $iddest = mysqli_real_escape_string($dbc,$_POST['iddest']);
    $sql = "DELETE FROM orders WHERE iduser = $iduser and iddestination = $iddest";
    if(mysqli_query($dbc,$sql)){
      $url = "../adminorders.php";
      header("Location: ".$url); 
    }
    else{
    echo 'query error: ' . mysqli_error($dbc);
  }
}
?>


