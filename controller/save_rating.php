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

$cek = "Select invoice from rating where invoice = '$invoice'";
$query = mysqli_query($conn, $cek);
$data = mysqli_fetch_row($query);
if ($data==null) {
    //query insert data ke dalam database
    $query2 = "INSERT INTO rating (invoice,pelanggan,rate,produk,pesan) 
VALUES ('$invoice','$customer','$rate','$id_produk','$pesan')";
    mysqli_query($conn, $query2);
    header("location: ../view/transaksi.php");
} else {
    $query1 = "UPDATE rating SET rate = '$rate', pesan = '$pesan' 
        WHERE invoice = '$invoice'";

    //kondisi pengecekan apakah data berhasil dimasukkan atau tidak
    if ($conn->query($query1)) {
        header("location: ../view/transaksi.php");
    }
}
