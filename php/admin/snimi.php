<?php


require('konekcija.php');
if(isset($_POST['delete'])){
    $id_to_delete = $_POST['id_to_delete'];
    $sql = "DELETE FROM destination WHERE id = $id_to_delete";
    if(mysqli_query($dbc,$sql)){
      $url = "../admindestination.php";
      header("Location: ".$url); 
    }
    else{
    echo 'query error: ' . mysqli_error($dbc);
  }
}
?>


