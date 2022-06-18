<?php session_start();

include('../config/connection.php');

$tglawal = $_GET['tglawal'];
$tglahir = $_GET['tglahir'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="../plugins/google-apis-font/font.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../plugins/ionicons/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../admin/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
</head>

<body style="font-family: 'Arial Narrow', Arial, sans-serif; padding: 10px;">
<table style="width: 100%;">
        <tr>
            <td align="center">
            <P><h3>Griya Herbal Larieskaa</h3>
                <h2>LAPORAN TRANSAKSI</h2>
                Periode: <?php echo $_GET['tglawal'] .' s/d '. $_GET['tglahir'] ?></P>
            </td>
        </tr>
    </table>
<table class="table table-striped">
                <tr>
                  <th>ID</th>
                  <th>TANGGAL</th>
                  <th>INVOICE</th>
                  <th>PELANGGAN</th>
                  <th>STATUS</th>
                  <th>TOTAL</th>
                </tr>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM transaksi INNER JOIN pelanggan on pelanggan.id_pel=transaksi.pelanggan WHERE transaksi.tanggal BETWEEN '$tglawal' AND '$tglahir' ORDER BY no ASC");
$sub = 0;
                while ($user_data = mysqli_fetch_array($result)) { ?>
                  <tr>
                    <td><?php echo $user_data['no'] ?></td>
                    <td><?php echo $user_data['tanggal'] ?></td>
                    <td><?php echo $user_data['invoice'] ?></td>
                    <td><?php echo $user_data['nama'] ?></td>
                    <td><?php if ($user_data['status'] == "Menunggu Pembayaran") { ?>
                        <span class="badge badge-warning"> <?php echo $user_data['status'] ?></span>
                      <?php } else if ($user_data['status'] == "Menunggu Konfirmasi") {  ?>
                        <span class="badge badge-primary"> <?php echo $user_data['status'] ?></span>
                      <?php } else if ($user_data['status'] == "Bayar") {  ?>
                        <span class="badge badge-success"> <?php echo $user_data['status'] ?></span>
                      <?php } else if ($user_data['status'] == "Batal") {  ?>
                        <span class="badge badge-danger"> <?php echo $user_data['status'] ?></span>
                      <?php } else if ($user_data['status'] == "Proses Pengiriman") { ?>
                        <span class="badge badge-dark"> <?php echo $user_data['status'] ?></span>
                      <?php } else if ($user_data['status'] == "Selesai") { ?>
                        <span class="badge badge-light"> <?php echo $user_data['status'] ?></span>
                      <?php } ?>
                    </td>
                    <td  align="right"><?php echo number_format($user_data['total'], 0, ',', '.') ?></td>
                  </tr>
                <?php
              $sub += $user_data['total'];
              }
                ?>
                <tr><td style="font-size: 20px" colspan="5" align="right">Sub Total :</td>
                <td style="font-size: 20px" align="right">Rp. <?php echo number_format($sub, 0, ',', '.') ?></td></tr>
              </table>
</body>
<script>
  window.addEventListener("load", window.print());
</script>

</html>
