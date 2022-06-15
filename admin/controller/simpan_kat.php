<?php

//include koneksi database
include('../config/connection.php');

//get data dari form
$nm_kat           = $_POST['nm_kat'];
//query insert data ke dalam database
$query = "INSERT INTO kategori (nm_kat) VALUES ('$nm_kat')";

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($conn->query($query)) {

    //redirect ke halaman index.php
    header("location: ../view/kategori.php");

} else {

    //pesan error gagal insert data
    echo "Data Gagal Disimpan!";

}

?>
