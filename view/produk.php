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
  $kat = "";
  if (isset($_GET['id_kat'])) {
    $kat = $_GET['id_kat'];
  }
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Daftar Produk</li>
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
            <?php
            $result = mysqli_query($conn, "SELECT * FROM produk INNER JOIN kategori on kategori.id_kat=produk.kategori where produk.kategori like '%$kat%' and status='1' ORDER BY id_produk ASC limit 20");
            while ($user_data = mysqli_fetch_array($result)) { ?>

              <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">

                  <form action="../controller/add_chart.php" method="POST">
                    <div class="card-header text-muted border-bottom-0 text-center">
                      <input type="hidden" name="id_produk" value="<?php echo $user_data['id_produk']; ?>">
                      <input type="hidden" name="pelanggan" value="<?php echo $_SESSION['id_pel']; ?>">
                      <h2 class="lead"><b><?php echo $user_data['nama']; ?></b></h2>
                    </div>
                    <div class="card-body pt-0">
                      <div class="row">
                        <div class="col-12 text-center">
                          <img src="../admin/img/produk/<?php echo $user_data['foto1'] ?>" alt="produk" width="200px" height="230px" class="product-image"><br>
                        </div>
                        <div class="col-12 text-center">
                          <h1 class="lead"><b>Rp.<?php echo number_format($user_data['harga'], 0, ',', '.') ?></b></h1>

                          <?php
                          $rates = mysqli_query($conn, "SELECT (SUM(rating.rate) / COUNT(id_produk)) as rate FROM produk 
                        LEFT JOIN rating on rating.produk=produk.id_produk 
                        LEFT JOIN pelanggan on pelanggan.id_pel=rating.pelanggan 
                        WHERE rating.produk = " . $user_data['id_produk'] . " GROUP BY produk.id_produk ASC");
                          $rate = 0;
                          while ($data = mysqli_fetch_array($rates)) {
                            $rate = $data['rate'];
                          }
                          settype($rate, "integer");
                          // var_dump($rate);
                          if ($rate == 5) {
                          ?><span class="fa fa-star checked-1"></span>
                            <span class="fa fa-star checked-2"></span>
                            <span class="fa fa-star checked-3"></span>
                            <span class="fa fa-star checked-4"></span>
                            <span class="fa fa-star checked-5"></span>
                          <?php } else if ($rate == 4) { ?>
                            <span class="fa fa-star checked-1"></span>
                            <span class="fa fa-star checked-2"></span>
                            <span class="fa fa-star checked-3"></span>
                            <span class="fa fa-star checked-4"></span>
                            <span class="fa fa-star"></span>
                          <?php } else if ($rate == 3) { ?>
                            <span class="fa fa-star checked-1"></span>
                            <span class="fa fa-star checked-2"></span>
                            <span class="fa fa-star checked-3"></span>
                            <span class="fa fa-star "></span>
                            <span class="fa fa-star "></span>
                          <?php } else if ($rate == 2) { ?>
                            <span class="fa fa-star checked-1"></span>
                            <span class="fa fa-star checked-2"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                          <?php } else if ($rate == 1) { ?>
                            <span class="fa fa-star checked-1"></span>
                            <span class="fa fa-star "></span>
                            <span class="fa fa-star "></span>
                            <span class="fa fa-star "></span>
                            <span class="fa fa-star "></span>
                          <?php  } else if ($rate == 0) { ?>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                          <?php  } else if (empty($rate)) { ?>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                          <?php  }
                          ?>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <div class="text-right">
                        <button type="submit" class="btn btn-sm btn-warning">
                          <i class="fa fa-shopping-basket"></i>
                        </button>
                        <a href="detail_produk.php?id_produk=<?php echo $user_data['id_produk'] ?>" class="btn btn-sm btn-info">
                          <i class="fa fa-eye"></i> Lihat
                        </a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div><br>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include "../layout/footer.php" ?>