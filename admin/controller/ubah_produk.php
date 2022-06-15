<?php

//include koneksi database
include('../config/connection.php');

//get data dari form
$id_produk            = $_POST['id_produk'];
$nama            = $_POST['nama'];
$kategori        = $_POST['kategori'];
$ket           = $_POST['ket'];
$harga           = $_POST['harga'];
$foto1           = $_FILES['foto']['name'];
$foto_current    = $_POST['foto_current'];

if (!empty($foto1)) {
  $eks  = array('png', 'jpg');
  $x = explode('.', $foto1);
  $ekstensi = strtolower(end($x));
  $ukuran  = $_FILES['foto']['size'];
  $file_tmp = $_FILES['foto']['tmp_name'];

  if (in_array($ekstensi, $eks) === true) {
    if ($ukuran < 1044070) {
      move_uploaded_file($file_tmp, '../img/produk/' . $foto1);
      // $query = mysql_query("INSERT INTO upload VALUES(NULL, '$nama')");
      $query = "UPDATE produk set nama='$nama',ket='$ket',kategori='$kategori',harga='$harga',foto1='$foto1' where id_produk='$id_produk'";
      if ($query) {
        echo 'FILE BERHASIL DI UPLOAD';
      } else {
        echo 'GAGAL MENGUPLOAD GAMBAR';
      }
    } else {
      echo 'UKURAN FILE TERLALU BESAR';
    }
  } else {
    echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
  }

  //kondisi pengecekan apakah data berhasil dimasukkan atau tidak
  if ($conn->query($query)) {

    //redirect ke halaman index.php
    header("location: ../view/produk.php");
  } else {

    //pesan error gagal insert data
    echo "Data Gagal Disimpan!";
  }
} else if (empty($foto1)) {
  $query = "UPDATE produk set nama='$nama',ket='$ket',kategori='$kategori',harga='$harga',foto1='$foto_current' where id_produk='$id_produk'";
      if ($query) {
        echo 'FILE BERHASIL DI UPLOAD';
      } else {
        echo 'GAGAL MENGUPLOAD GAMBAR';
      }
      if ($conn->query($query)) {

        //redirect ke halaman index.php
        header("location: ../view/produk.php");
      } else {

        //pesan error gagal insert data
        echo "Data Gagal Disimpan!";
      }
}
