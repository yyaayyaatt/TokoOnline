<?php

//include koneksi database
include('../config/connection.php');

//get data dari form
$id_pel           = $_POST['id_pel'];
$nama           = $_POST['nama'];
$email           = $_POST['email'];
$telp           = $_POST['telp'];
$alamat           = $_POST['alamat'];
//query update data ke dalam database
$query = "UPDATE pelanggan SET nama = '$nama',email = '$email', telp = '$telp', alamat='$alamat'
 WHERE id_pel = '$id_pel'";

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($conn->query($query)) {

    //redirect ke halaman index.php
    header("location: ../view/pelanggan.php");

} else {

    //pesan error gagal insert data
    echo "Data Gagal Diubah!";

}

?>
