<?php session_start();

include('../admin/config/connection.php');

$invoice = $_GET['invoice'];
$query = mysqli_query($conn, "SELECT konfirmasi.*,transaksi.no FROM konfirmasi inner join transaksi on transaksi.invoice=konfirmasi.invoice where konfirmasi.invoice='$invoice' limit 1");
$trans = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
    <title>Cetak Invoice</title>
</head>

<body style="font-family: 'Arial Narrow', Arial, sans-serif; padding: 10px;">
    <table style="width: 100%;">
        <tr>
            <td>
                <h3>Griya Herbal Larieskaa</h3>
            </td>
            <td align="right">
                <h3>Date: <?php echo Date('d-m-Y'); ?></h3>
            </td>
        </tr>
    </table>

    <table style="width: 100%;">
        <tr>
            <td style="width: 33%;"><b>From:</b></td>
            <td style="width: 33%;"><b>To:</b></td>
            <td style="width: 33%;"><b>Invoice: <?php echo $_GET['invoice']; ?></b></td>
        </tr>
        <tr>
            <td><b>Griya Herbal Larieskaa</b><br>Sikepluh Raya, Kecamatan Kramat<br>Kabupaten Tegal<br>Indonesia - Jawa Tengah<br>Phone +62 815-4803-2872
            </td>
            <td><b><?php echo $_SESSION['name'] ?></b><br><?php echo $_SESSION['addrs'] ?><br><?php echo $_SESSION['phone'] ?><br><?php echo $_SESSION['email'] ?></td>
            <td><b>Transaction Code: <?php echo $trans['no']; ?><br>Payment Date: <?php echo date('d-m-Y', strtotime($trans['tanggal'])); ?><br>Bank transfer: <?php echo $trans['bank']; ?></b></td>
        </tr>
    </table><br>
    <table class="table table-striped" style="width: 100%;">
        <tr>
            <th><b>Qty</b></th>
            <th><b>Product</b></th>
            <th><b>Price</b></th>
        </tr>
        <?php
        $total = 0;
        $result = mysqli_query($conn, "SELECT * FROM transaksi_detail where invoice='$invoice'");
        while ($user_data = mysqli_fetch_array($result)) { ?>
            <tr>
                <td style="width: 5%; text-align: center;"><?php echo $user_data['qty'] ?></td>
                <td style="width: 85%;"><?php echo $user_data['nama'] ?></td>
                <td style="width: 20%; text-align: right;"><?php echo number_format($user_data['harga'], 0, ',', '.') ?></td>
            </tr>
        <?php
            $total += $user_data['harga'];
        }
        ?>
        <tr>
            <td colspan="2" align="right" style="font-size: 14pt; font-weight: bold;">Total:</td>
            <td align="right" style="font-size: 14pt; font-weight: bold;"><?php echo number_format($total, 0, ',', '.') ?></td>
        </tr>
    </table>
</body>
<script>
  window.addEventListener("load", window.print());
</script>

</html>