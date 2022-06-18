<?php

//include koneksi database
session_start();
include_once("../admin/config/connection.php");

//get data dari form
$invoice            = date('Ymdhis');
$tanggal            = date('Y-m-d');
$pelanggan          = $_SESSION['id_pel']; //dari session
$total              = $_GET['total'];
$status             = "Menunggu Pembayaran";
$id_produk          = $_GET['id_produk'];
$nama               = $_GET['barang'];
$harga              = $_GET['harga'];
$qty                = '1';

mysqli_autocommit($conn, FALSE);

//query insert data ke dalam database
mysqli_query($conn, "INSERT INTO transaksi (invoice,tanggal,pelanggan,total,status) 
VALUES ('$invoice','$tanggal','$pelanggan','$harga','$status')");

$query1 = "INSERT INTO transaksi_detail (invoice,id_produk,nama,qty,harga) 
    VALUES ('$invoice','$id_produk','$nama','$qty','$harga')";
mysqli_query($conn, $query1);

mysqli_query($conn,"UPDATE `produk` SET `stok` = stok-1 WHERE `produk`.`id_produk` = '$id_produk'");

if (!mysqli_commit($conn)) {
    echo "Commit transaction failed";
    exit();
}

// Close connection
mysqli_close($conn);
header("location: ../view/transaksi.php");
