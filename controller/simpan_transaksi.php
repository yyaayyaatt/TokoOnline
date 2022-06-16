<?php

//include koneksi database
session_start();
include_once("../admin/config/connection.php");

//get data dari form
$invoice           = date('Ymdhis');
$tanggal           = date('Y-m-d');
$pelanggan           = $_SESSION['id_pel']; //dari session
$total               = $_GET['total'];
$status = "Menunggu Pembayaran";

mysqli_autocommit($conn, FALSE);

//query insert data ke dalam database
mysqli_query($conn, "INSERT INTO transaksi (invoice,tanggal,pelanggan,total,status) 
VALUES ('$invoice','$tanggal','$pelanggan','$total','$status')");

$keranjang = mysqli_query($conn, "SELECT produk.*,keranjang.*,pelanggan.*,produk.nama as barang FROM keranjang INNER JOIN produk on produk.id_produk=keranjang.id_produk INNER JOIN pelanggan on pelanggan.id_pel = keranjang.pelanggan WHERE keranjang.pelanggan='$pelanggan' ORDER BY keranjang.id_produk");

while ($user_data = mysqli_fetch_array($keranjang)) {
    $id_produk = $user_data['id_produk'];
    $id_keranjang = $user_data['id_keranjang'];
    $nama = $user_data['barang'];
    $harga = $user_data['harga'];
    $qty = $user_data['qty'];
    $query1 = "INSERT INTO transaksi_detail (invoice,id_produk,nama,qty,harga) 
    VALUES ('$invoice','$id_produk','$nama','$qty','$harga')";
    mysqli_query($conn, $query1);
    
    $del_keranjang = "DELETE FROM keranjang WHERE id_keranjang = '$id_keranjang'";
    mysqli_query($conn, $del_keranjang);
}


if (!mysqli_commit($conn)) {
    echo "Commit transaction failed";
    exit();
}

// Close connection
mysqli_close($conn);
header("location: ../view/transaksi.php");
