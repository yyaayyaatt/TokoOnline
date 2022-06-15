<?php

include('../config/connection.php');

//get id
$id_pel = $_GET['id_pel'];

$query = "DELETE FROM pelanggan WHERE id_pel = '$id_pel'";

if($conn->query($query)) {
  header("location: ../view/pelanggan.php");
} else {
    echo "DATA GAGAL DIHAPUS!";
}

?>
