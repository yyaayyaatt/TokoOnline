<?php

session_start();
//include koneksi database
include('../admin/config/connection.php');

//get data dari form
$id_produk     = $_POST['id_produk'];
$pelanggan     = $_SESSION['id_pel'];
//query insert data ke dalam database
$query = "INSERT INTO keranjang (id_produk,qty,pelanggan) VALUES ('$id_produk','1','$pelanggan')";

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($conn->query($query)) {
    header("location: ../view/produk.php");
} else {

    //pesan error gagal insert data
    echo "Data Gagal Disimpan!";
    header("location: ../view/produk.php");

}

?>
