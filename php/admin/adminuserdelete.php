<?php


require('konekcija.php');
if(isset($_POST['delete'])){
    $id_to_delete = mysqli_real_escape_string($dbc,$_POST['id_to_delete']);

    $sql = "DELETE FROM users WHERE id = $id_to_delete";
    if(mysqli_query($dbc,$sql)){
      $url = "../adminuser.php";
      header("Location: ".$url); 
    }
    else{
        
  }
}
?>


