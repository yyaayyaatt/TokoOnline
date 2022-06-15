<?php

include('../admin/config/connection.php');

//get id
$id_keranjang = $_GET['id_keranjang'];

$query = "DELETE FROM keranjang WHERE id_keranjang = '$id_keranjang'";

if($conn->query($query)) {
  header("location: ../view/keranjang.php");
} else {
    echo "DATA GAGAL DIHAPUS!";
}

?>
