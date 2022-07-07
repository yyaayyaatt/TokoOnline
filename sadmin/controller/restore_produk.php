<?php

include('../config/connection.php');

//get id
$id_produk = $_GET['id_produk'];
$foto = $_GET['foto'];
$url = "../img/produk/". $foto;
if(file_exists($url)){
  unlink($url);
}

$query = "update produk SET status='1' WHERE id_produk = '$id_produk'";

if($conn->query($query)) {
  header("location: ../view/produk.php");
} else {
    header("location: ../view/produk.php");
}

?>
