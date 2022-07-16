<?php

//include koneksi database
include('../config/connection.php');

//get data dari form
$invoice           = $_POST['invoice'];
$resi           = $_POST['resi'];
//query update data ke dalam database
$query = "UPDATE transaksi SET resi = '$resi'
 WHERE invoice = '$invoice'";

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if ($conn->query($query)) {

  //redirect ke halaman index.php
  header("location: ../view/transaksi.php");
} else {

  //pesan error gagal insert data
  echo "Data Gagal Diubah!";
  header("location: ../view/transaksi.php");
}
