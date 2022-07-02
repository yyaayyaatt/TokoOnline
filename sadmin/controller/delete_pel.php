<?php

include('../config/connection.php');

//get id
$id_pel = $_GET['id_pel'];

$query = "UPDATE pelanggan SET status='0' WHERE id_pel = '$id_pel'";

if($conn->query($query)) {
  header("location: ../view/pelanggan.php");
} else {
    echo "DATA GAGAL DIHAPUS!";
    header("location: ../view/pelanggan.php");
}

?>
