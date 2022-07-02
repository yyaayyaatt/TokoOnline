<?php

//include koneksi database
include('../config/connection.php');

//get data dari form
$nama           = $_POST['nama'];
$email           = $_POST['email'];
$telp           = $_POST['telp'];
$alamat           = $_POST['alamat'];
$role           = $_POST['role'];
//query insert data ke dalam database
$query = "INSERT INTO pelanggan (nama,email,telp,alamat,role) VALUES ('$nama','$email','$telp','$alamat','$role')";

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($conn->query($query)) {

    //redirect ke halaman index.php
    header("location: ../view/pelanggan.php");

} else {

    //pesan error gagal insert data
    Alert ("Data Gagal Disimpan!");
    header("location: ../view/pelanggan.php");

}

?>
