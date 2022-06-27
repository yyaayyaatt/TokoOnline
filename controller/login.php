<?php
session_start();
//include koneksi database
include('../admin/config/connection.php');

//get data dari form
$user     = $_POST['user'];
$password     = md5($_POST['password']);
//query insert data ke dalam database
$query = mysqli_query($conn, "SELECT * FROM pelanggan where user='$user' and password='$password' limit 1");

$row = mysqli_fetch_assoc($query);

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
// var_dump($row['nama']);
if($row != NULL) {
    $_SESSION['id_pel'] = $row['id_pel'];
    $_SESSION['name'] = $row['nama'];
    $_SESSION['addrs'] = $row['alamat'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['phone'] = $row['telp'];
    $_SESSION['role'] = $row['role'];
    $_SESSION['log'] = "Logged";
    header("location: ../index.php");
} else {

    //pesan error gagal insert data
    echo "<script>alert('Login Gagal');window.location.href='../view/login.php';</script>";
    // header("location:../view/login.php");

}

?>
