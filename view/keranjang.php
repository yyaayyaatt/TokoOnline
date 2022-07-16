<?php
session_start();

if (!isset($_SESSION['id_pel'])) {
    header('location:view/login.php');
} else if ($_SESSION['role'] == 'admin') {
    header('location:../admin/index.php');
} else if ($_SESSION['role'] == 'super') {
    header('location:../sadmin/index.php');
}

include('../admin/config/connection.php');

?>
<!DOCTYPE html>
<html>

<head>
    <title>Griya Herbal Larieskaa</title>
    <link rel="shorcut icon" type="=image/png" href="icon/logo.png" />
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Falenda Flora, Ruben Agung Santoso" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //for-mobile-apps -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />

    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- font-awesome icons -->
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/skdslider.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!-- //js -->
    <!-- <link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'> -->
    <!-- start-smoth-scrolling -->
    <!-- start-smoth-scrolling -->
</head>

<body>

    <!-- header -->
    <div class="agileits_header">
        <div class="container">
            <div class="w3l_offers">
                <p>DAPATKAN PENAWARAN MENARIK KHUSUS HARI INI, BELANJA SEKARANG!</p>
            </div>
            <div class="agile-login">
                <ul>
                    <a href="keranjang.php"><button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
                    </a>
                    <?php
                    if (!isset($_SESSION['id_pel'])) { ?>

                        <li><a href="register.php"> Daftar</a></li>
                        <li><a href="view/login.php">Masuk</a></li>

                        <?php } else {

                        if ($_SESSION['role'] == 'member') { ?>

                            <li style="color:white">Halo, <?php echo $_SESSION["name"] ?>
                            <li><a href="../controller/logout.php">Keluar?</a></li>
                    <?php
                        }
                    }
                    ?>

                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
  <div class="logo_products">
    <div class="container">
      <div class="w3ls_logo_products_left1">
        <ul class="phone_email">
          <li><i class="fa fa-phone" aria-hidden="true"></i>Hubungi Kami : (+62) 815-4803-2872</li>
        </ul>
      </div>
      <div class="w3ls_logo_products_left">
        <h2><a href="index.php" style="color: orange;">Griya Herbal Larieskaa</a></h2>
      </div>
      <div class="w3l_search">
        <form action="cari_produk.php" method="post">
          <input type="search" name="Search" placeholder="Cari produk...">
          <button type="submit" class="btn btn-default search" aria-label="Left Align">
            <i class="fa fa-search" aria-hidden="true"> </i>
          </button>
          <div class="clearfix"></div>
        </form>
      </div>

      <div class="clearfix"> </div>
    </div>
  </div><!-- navigation -->

  <div style="background-color: #FF8C00;">
    <nav class="navbar navbar-expand-sm navbar-light">
      <div class="container">
        <a href="view/dashboard.php" class="navbar-brand">
          <!-- <img src="admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
          <!-- <span class="brand-text font-weight-light">Griya Herbal Larieskaa</span> -->
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3 " id="navbarCollapse">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="../index.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Kategori Produk</a>
              <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li class="dropdown-divider"></li>
                <?php
                $kat = mysqli_query($conn, "SELECT * from kategori order by id_kat ASC");
                while ($p = mysqli_fetch_array($kat)) {

                ?>
                  <li><a href="produk.php?id_kat=<?php echo $p['id_kat'] ?>" class="dropdown-item"><?php echo $p['nm_kat'] ?></a></li>

                <?php
                }
                ?>
                <!-- <li><a href="#" class="dropdown-item">Some action </a></li>
              <li><a href="#" class="dropdown-item">Some other action</a></li> -->
              </ul>
            </li>
            <li class="nav-item">
              <a href="keranjang.php" class="nav-link">Keranjang Pesanan</a>
            </li>
            <li class="nav-item">
              <a href="transaksi.php" class="nav-link">Transaksi</a>
            </li>
            <li class="nav-item">
              <a href="ganti_pass.php" class="nav-link">Ganti Password</a>
            </li>
          </ul>
        </div>
      </div>
  </div>
  </nav><br>

  <?php
  $pelanggan = $_SESSION['id_pel'];
  $result = mysqli_query($conn, "SELECT keranjang.id_keranjang FROM keranjang INNER JOIN produk on produk.id_produk=keranjang.id_produk INNER JOIN pelanggan on pelanggan.id_pel = keranjang.pelanggan WHERE keranjang.pelanggan='$pelanggan' limit 1");
  // var_dump($pelanggan);
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Keranjang Belanja</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
              <li class="breadcrumb-item active">Keranjang Belanja</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row">
            <table class="table table-striped">
              <tr>
                <th>BARANG</th>
                <th>FOTO</th>
                <th>QTY</th>
                <th>HARGA</th>
              </tr>
              <?php if (mysqli_num_rows($result) > 0) {
                $subtotal = 0;
                $result = mysqli_query($conn, "SELECT produk.*,keranjang.*,pelanggan.*,sum(qty)as qty,sum(harga)as total,produk.nama as barang FROM keranjang INNER JOIN produk on produk.id_produk=keranjang.id_produk INNER JOIN pelanggan on pelanggan.id_pel = keranjang.pelanggan WHERE keranjang.pelanggan='$pelanggan' GROUP BY keranjang.id_produk ORDER BY keranjang.id_produk");
                while ($user_data = mysqli_fetch_array($result)) { ?>
                  <tr>
                    <td><?php echo $user_data['barang'] ?></td>
                    <td><img src="../admin/img/produk/<?php echo $user_data['foto1'] ?>" width="80"></td>
                    <td width="5%" style="text-align: center;"><a href='../controller/delete_keranjang.php?id_keranjang=<?php echo $user_data['id_keranjang'] ?>'><i class="fa fa-minus text-danger"></i></a>
                      <?php echo $user_data['qty'] ?>
                      <a href='../controller/add_keranjang.php?id_produk=<?php echo $user_data['id_produk'] ?>'><i class="fa fa-plus text-success"></i></a>
                    </td>
                    <td align="right" width="10%">Rp <?php echo number_format($user_data['total'], 0, ',', '.') ?></td>
                    <!-- <td width="10%"><a href='../controller/delete_keranjang.php?id_keranjang=<?php echo $user_data['id_keranjang'] ?>'><i class="fa fa-trash text-danger swalDefaultSuccess"> Hapus</i></a></td> -->
                  </tr>
                <?php
                  $subtotal += $user_data['total'];
                } ?>
                <tr>
                  <td colspan="3" align="right">
                    <h3>Sub Total: Rp <?php echo number_format($subtotal, 0, ',', '.') ?></h3>
                  </td>
                  <td><a href='checkout.php' class="btn btn-success btn-sm">Lanjutkan Transaksi</a></td>
                </tr>
              <?php } else { ?>
                <tr>
                  <td colspan="5" align="center">Keranjang masih Kosong</td>
                </tr>
              <?php } ?>
            </table>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <!--<nav aria-label="Contacts Page Navigation">
            <ul class="pagination justify-content-center m-0">
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">5</a></li>
            </ul>
          </nav> -->
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include "../layout/footer.php" ?>
  <script>
    $(function() {
      var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

      $('.swalDefaultSuccess').click(function() {
        Toast.fire({
          icon: 'success',
          title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        })
      });
    });