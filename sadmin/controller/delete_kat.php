<?php

include('../config/connection.php');

//get id
$id_kat = $_GET['id_kat'];

$query = "DELETE FROM kategori WHERE id_kat = '$id_kat'";

if($conn->query($query)) {
  header("location: ../view/kategori.php");
} else {
    echo "DATA GAGAL DIHAPUS!";
}

?>
