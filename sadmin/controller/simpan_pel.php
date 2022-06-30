<?php

//include koneksi database
include('../config/connection.php');

//get data dari form
$nama           = $_POST['nama'];
$email           = $_POST['email'];
$telp           = $_POST['telp'];
$alamat           = $_POST['alamat'];
//query insert data ke dalam database
$query = "INSERT INTO pelanggan (nama,email,telp,alamat) VALUES ('$nama','$email','$telp','$alamat')";

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($conn->query($query)) {

    //redirect ke halaman index.php
    header("location: ../view/pelanggan.php");

} else {

    //pesan error gagal insert data
    echo "Data Gagal Disimpan!";

}

?>
