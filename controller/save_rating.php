<?php

session_start();
//include koneksi database
include('../admin/config/connection.php');

//get data dari form
$rate     = $_POST['rate'];
$id_produk     = $_POST['id_produk'];
$pesan     = $_POST['pesan'];
$invoice     = $_POST['invoice'];
$customer     = $_SESSION['id_pel'];

$cek = "Select COUNT(id_rate) from rating where invoice = '$invoice'";
$query = mysqli_query($conn, $cek);
// var_dump(isset($query));
if (!isset($query)) {
    //query insert data ke dalam database
    $query2 = "INSERT INTO rating (pelanggan,rate,produk,pesan,invoice) 
VALUES ('$customer','$rate','$id_produk','$pesan','$invoice')";
    mysqli_query($conn, $query2);
} else {
    $query1 = "UPDATE rating SET rate = '$rate', pesan = '$pesan' 
        WHERE invoice = '$invoice'";

    //kondisi pengecekan apakah data berhasil dimasukkan atau tidak
    if ($conn->query($query1)) {
        header("location: ../view/transaksi.php");
    }
}
