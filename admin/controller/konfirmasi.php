<?php
session_start();
//include koneksi database
include('../config/connection.php');

//get data dari form
$invoice           = $_GET['invoice'];
$stts           = $_GET['stts'];
$pelanggan  = $_SESSION['id_pel'];

//query update data ke dalam database
$query = "UPDATE transaksi SET status = '$stts'
 WHERE invoice = '$invoice' and pelanggan= '$pelanggan'";

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($conn->query($query)) {

    //redirect ke halaman index.php
    header("location: ../view/transaksi.php");

} else {

    //pesan error gagal insert data
    echo "Data Gagal Diubah!";

}

?>
