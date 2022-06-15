<?php

//include koneksi database
include('../config/connection.php');

//get data dari form
$nama            = $_POST['nama'];
$kategori        = $_POST['kategori'];
$harga           = $_POST['harga'];
$ket           = $_POST['ket'];
$eks  = array('png', 'jpg');
$foto1 = $_FILES['foto1']['name'];
$x = explode('.', $foto1);
$ekstensi = strtolower(end($x));
$ukuran  = $_FILES['foto1']['size'];
$file_tmp = $_FILES['foto1']['tmp_name'];

if (in_array($ekstensi, $eks) === true) {
  if ($ukuran < 1044070) {
    move_uploaded_file($file_tmp, '../img/produk/' . $foto1);
    // $query = mysql_query("INSERT INTO upload VALUES(NULL, '$nama')");
    $query = "INSERT INTO produk (nama,ket,kategori,harga,foto1)
          VALUES ('$nama','$ket','$kategori','$harga','$foto1')";
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
