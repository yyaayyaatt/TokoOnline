<?php

//include koneksi database
include('../config/connection.php');

//get data dari form
$id_kat           = $_POST['id_kat'];
$nm_kat           = $_POST['nm_kat'];
//query update data ke dalam database
$query = "UPDATE kategori SET nm_kat = '$nm_kat'
 WHERE id_kat = '$id_kat'";

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($conn->query($query)) {

    //redirect ke halaman index.php
    header("location: ../view/kategori.php");

} else {

    //pesan error gagal insert data
    echo "Data Gagal Diubah!";

}

?>
