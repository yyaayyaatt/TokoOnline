<?php
session_start();
//include koneksi database
include('../admin/config/connection.php');

//get data dari form
$id_pel           = $_SESSION['id_pel'];
$user           = $_POST['user'];
$pass           = md5($_POST['pass']);
$passx           = md5($_POST['passx']);
//query update data ke dalam database
// var_dump($pass!=$passx);
if($pass!=$passx){
    header("location: ../view/ganti_pass.php");
}else{
$query = "UPDATE pelanggan SET user = '$user', password = '$pass' 
 WHERE id_pel = '$id_pel'";

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($conn->query($query)) {

    //redirect ke halaman index.php
    header("location: ../index.php");

} else {

    //pesan error gagal insert data
    echo "Data Gagal Diubah!";
    header("location: ../view/ganti_pass.php");

}
}
