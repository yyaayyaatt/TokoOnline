<?php
session_start();

if (!isset($_SESSION['id_pel'])) {
  header('location:view/login.php');
};

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

  <!-- <link rel="stylesheet" href="../admin/dist/css/adminlte.min.css"> -->
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
            } else { ?>
              <li style="color:white">Halo, <?php echo $_SESSION["name"] ?>
              <li><a href="../admin">Admin Panel</a></li>
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
$id = $_GET['id_produk'];
$query = "SELECT * FROM produk WHERE id_produk = $id LIMIT 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Detail Produk</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Detail Produk</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card card-solid">
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-sm-6">
            <h3 class="d-inline-block d-sm-none"><?php echo $row['nama']; ?></h3>
            <div class="col-12">
              <img src="../admin/img/produk/<?php echo $row['foto1'] ?>" width="400px" height="460px" alt="Product Image">
            </div>
          </div>
          <div class="col-12 col-sm-6">
            <h3 class="my-3"><?php echo $row['nama']; ?></h3>
            <p><?php echo $row['ket']; ?></p>

            <hr>
            <div class="bg-gray py-2 px-3 mt-4">
              <h2 class="mb-0">
                Rp.<?php echo number_format($row['harga'], 0, ',', '.') ?>
              </h2>
              <?php
              $rates = mysqli_query($conn, "SELECT (SUM(rating.rate) / COUNT(id_produk)) as rate FROM produk 
                        LEFT JOIN rating on rating.produk=produk.id_produk 
                        LEFT JOIN pelanggan on pelanggan.id_pel=rating.pelanggan 
                        WHERE rating.produk = " . $row['id_produk'] . " GROUP BY produk.id_produk ASC");
              $rate = 0;
              while ($data = mysqli_fetch_array($rates)) {
                $rate = $data['rate'];
              }
              settype($rate, "integer");
              // var_dump($rate);
              if ($rate == 5) {
              ?><h4><span class="fa fa-star checked-1"></span>
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
              ?></h4>
              <p>Tersedia <b><?php echo $row['stok']; ?></b> Item</p>
            </div>

            <div class="mt-4">
              <form action="../controller/add_chart.php" method="POST">
                <input type="hidden" name="id_produk" value="<?php echo $row['id_produk']; ?>">
                <input type="hidden" name="pelanggan" value="<?php echo $_SESSION['id_pel'] ?>">
                <div>
                  <button class="btn btn-primary btn-lg btn-flat" type="submit">
                    <i class="fa fa-cart-plus fa-lg mr-2"></i>
                    Masukkan keranjang
                  </button>
              </form>

              <a href="../controller/beli.php?id_produk=<?php echo $row['id_produk']; ?>&barang=<?php echo $row['nama']; ?>&harga=<?php echo $row['harga']; ?>" class="btn btn-success btn-lg btn-flat">
                <i class="fa fa-dollar fa-lg mr-2"></i>
                Beli
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

</section>
<!-- /.content -->
</div><br>


<?php include "../layout/footer.php" ?>