<?php


require('konekcija.php');
    $id = $_COOKIE['iddesttodelete'];
    $sql = "DELETE FROM orders WHERE id  = $id";
    if(mysqli_query($dbc,$sql)){
       
    }
    else{
    echo 'query error: ' . mysqli_error($dbc);
  }
?>


