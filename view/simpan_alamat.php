<?php
session_start();
//include koneksi database
include('../admin/config/connection.php');

//get data dari form
$invoice           = $_POST['invoice'];
$ongkir           = $_POST['ongkir'];
$eks           = $_POST['eks'];
$jns           = $_POST['jns'];
$kurir = strtoupper($eks) ." (".$jns.")";
//query update data ke dalam database
// var_dump($ongkir);
$query = "UPDATE transaksi SET ongkir = '$ongkir', eks='$kurir'  
 WHERE invoice = '$invoice'";

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($conn->query($query)) {

    //redirect ke halaman index.php
    header("location: ../view/transaksi.php");

} else {

    //pesan error gagal insert data
    echo "Data Gagal Diubah!";
    header("location: ../view/ganti_pass.php");

}
