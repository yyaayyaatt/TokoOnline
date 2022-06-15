<?php

//include koneksi database
include('../admin/config/connection.php');

//get data dari form
$user     = $_POST['user'];
$password     = md5($_POST['password']);
$nama     = $_POST['nama'];
$email     = $_POST['email'];
$telp     = $_POST['telp'];
$alamat     = $_POST['alamat'];
$role     = $_POST['role'];
//query insert data ke dalam database
$query = "INSERT INTO pelanggan (user,password,nama,email,telp,alamat,role) 
VALUES ('$user','$password','$nama','$email','$telp','$alamat','$role')";

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($conn->query($query)) {
    header("location: ../view/login.php");
} else {

    //pesan error gagal insert data
    echo "Data Gagal Disimpan!";
    header("location: register.php");

}

?>
