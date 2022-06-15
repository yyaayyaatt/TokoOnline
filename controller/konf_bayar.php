<?php

session_start();
//include koneksi database
include('../admin/config/connection.php');

//get data dari form
$nama     = $_POST['nama'];
$bank     = $_POST['bank'];
$nominal     = $_POST['nominal'];
$invoice     = $_POST['invoice'];
$customer     = $_SESSION['id_pel'];
$file_tmp = $_FILES['bukti']['tmp_name'];

$eks  = array('png', 'jpg');
$bukti = $_FILES['bukti']['name'];
$x = explode('.', $bukti);
$ekstensi = strtolower(end($x));

if (in_array($ekstensi, $eks) === true) {
    move_uploaded_file($file_tmp, '../admin/img/konfirmasi/' . $bukti);
    //query insert data ke dalam database
    $query = "INSERT INTO konfirmasi (nama,bank,nominal,invoice,customer,bukti) 
VALUES ('$nama','$bank','$nominal','$invoice','$customer','$bukti')";

    //kondisi pengecekan apakah data berhasil dimasukkan atau tidak
    if ($conn->query($query)) {
        $query1 = "UPDATE transaksi SET status = 'Menunggu Konfirmasi' 
        WHERE invoice = '$invoice'";

        //kondisi pengecekan apakah data berhasil dimasukkan atau tidak
        if ($conn->query($query1)) {
            header("location: ../view/transaksi.php");
        }
    } else {

        //pesan error gagal insert data
        echo "Data Gagal Disimpan!";
        header("location: ../view/transaksi.php");
    }
} else {
    echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
}
