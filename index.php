<?php
session_start();

if (!isset($_SESSION['id_pel'])) {
  header('location:view/login.php');
};

include('admin/config/connection.php');

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
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
  <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- font-awesome icons -->
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/skdslider.css" rel="stylesheet">
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
          <?php
          if (!isset($_SESSION['id_pel'])) {?>
          
					<li><a href="register.php"> Daftar</a></li>
					<li><a href="view/login.php">Masuk</a></li>
					
          <?php } else {

            if ($_SESSION['role'] == 'member') {?>
            
					<li style="color:white">Halo,  <?php echo $_SESSION["name"] ?>
					<li><a href="controller/logout.php">Keluar?</a></li>
					<?php 
            } else { ?>
					<li style="color:white">Halo,   <?php echo $_SESSION["name"] ?>
					<li><a href="admin">Admin Panel</a></li>
					<li><a href="controller/logout.php">Keluar?</a></li>
					<?php
            }
          }
          ?>

        </ul>
      </div>
      <div class="product_list_header">
        <a href="view/keranjang.php"><button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
        </a>
      </div>
      <div class="clearfix"> </div>
    </div>
  </div>

  <div class="logo_products">
    <div class="container">
      <div class="w3ls_logo_products_left1">
        <ul class="phone_email">
          <li><i class="fa fa-phone" aria-hidden="true"></i>Hubungi Kami : (+62) 8970 674 135</li>
        </ul>
      </div>
      <div class="w3ls_logo_products_left">
        <h2><a href="index.php" style="color: orange;">Griya Herbal Larieskaa</a></h2>
      </div>
      <div class="w3l_search">
        <form action="view/cari_produk.php" method="post">
          <input type="search" name="Search" placeholder="Cari produk...">
          <button type="submit" class="btn btn-default search" aria-label="Left Align">
            <i class="fa fa-search" aria-hidden="true"> </i>
          </button>
          <div class="clearfix"></div>
        </form>
      </div>

      <div class="clearfix"> </div>
    </div>
  </div>
  <!-- //header -->
  <!-- navigation -->
  <div style="background-color: #FF8C00;">
    <nav class="navbar navbar-expand-sm navbar-light">
      <div class="container">
        <a href="view/dashboard.php" class="navbar-brand">
          <!-- <img src="admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Griya Herbal Larieskaa</span> -->
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="index.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Kategori Produk</a>
              <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li class="dropdown-divider"></li>
                <?php
                $kat = mysqli_query($conn, "SELECT * from kategori order by id_kat ASC");
                while ($p = mysqli_fetch_array($kat)) {

                ?>
                  <li><a href="view/produk.php?id_kat=<?php echo $p['id_kat'] ?>" class="dropdown-item"><?php echo $p['nm_kat'] ?></a></li>

                <?php
                }
                ?>
                <!-- <li><a href="#" class="dropdown-item">Some action </a></li>
              <li><a href="#" class="dropdown-item">Some other action</a></li> -->
              </ul>
            </li>
            <li class="nav-item">
              <a href="view/keranjang.php" class="nav-link">Keranjang Pesanan</a>
            </li>
            <li class="nav-item">
              <a href="view/transaksi.php" class="nav-link">Transaksi</a>
            </li>
            <li class="nav-item">
              <a href="view/ganti_pass.php" class="nav-link">Ganti Password</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  <div class="corousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/slide1.jpg" width="100%" alt="" />
      </div>
      <div class="carousel-item">
        <img src="images/slide1.jpg" width="100%" alt="" />
      </div>
      <div class="carousel-item">
        <img src="images/slide1.jpg" width="100%" alt="" />
      </div>
      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  <div style="padding-top: 10px; padding-bottom: 10px;">
    <div class="card card-solid">
      <div class="card-body pb-0">
        <h3 align="center">Produk Kami</h3><br>
        <div class="row" align="center">
          <?php
          $result = mysqli_query($conn, "SELECT * FROM produk INNER JOIN kategori on kategori.id_kat=produk.kategori ORDER BY id_produk ASC limit 16");
          while ($user_data = mysqli_fetch_array($result)) { ?>

            <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">

                <form action="./controller/add_chart.php" method="POST">
                  <div class="card-header text-muted border-bottom-0 text-center">
                    <input type="hidden" name="id_produk" value="<?php echo $user_data['id_produk']; ?>">
                    <h2 class="lead"><b><?php echo $user_data['nama']; ?></b></h2>
                  </div>
                  <div class="card-body pt-0">
                    <div class="row">
                      <div class="col-12 text-center">
                        <img src="admin/img/produk/<?php echo $user_data['foto1'] ?>" alt="produk" width="200px" height="230px">
                      </div>
                      <div class="col-12">
                        <h1 class="lead"><b>Rp.<?php echo number_format($user_data['harga'], 0, ',', '.') ?></b></h1><strike>Rp.<?php echo number_format($user_data['harga_disc'], 0, ',', '.') ?></strike>


                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="text-right">
                      <button type="submit" class="btn btn-sm btn-warning">
                        <i class="fas fa-basket"></i> Keranjang
                      </button>
                      <a href="view/detail_produk.php?id_produk=<?php echo $user_data['id_produk'] ?>&pelanggan=<?php echo $_SESSION['id_pel'] ?>" class="btn btn-sm btn-info">
                        <i class="fas fa-basket"></i> Lihat
                      </a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  <div style="background-color: #FF8C00;">
  <footer class="main-footer">
    <div class="row" style="padding: 40px;">
      <div class="col-sm-8 text text-light" style="padding: 20px;">
        <h2>Kontak</h2><br>
        <i class="fa fa-user"></i> Jl. Sikepluh Raya, Kec. Kramat, Kab. Tegal<br>
        <i class="fa fa-phone"></i> +62 815-4803-2872 <br>
      </div>
      <div class="col-sm-4 text text-light" style="padding: 20px;">
        <h2>Sosial Media</h2><br>
        <i class="fa fa-facebook"> <a href="https://www.facebook.com/profile.php?id=100078120048945" class=" text-light">Facebook</a></i> <br>
        <i class="fa fa-instagram text-light"> <a href="https://instagram.com/larieskaaherbal?igshid=YmMyMTA2M2Y=" class=" text-light">Instagram</a></i> <br>
      </div>
    <div class="col-sm-12 text text-light" style="padding-top: 20px; text-align: center;">
      <hr class="new5">
      Copyright &copy; 2014-2021 <a href="#" class=" text-light">Griya Herbal Larieskaa</a>.
      All rights reserved.
    </div>
  </footer>
  </div>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- main slider-banner -->
  <script src="js/skdslider.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/move-top.js"></script>
  <script type="text/javascript" src="js/easing.js"></script>
  <script src="js/carousel.js"></script>
  <script src="../admin/dist/js/adminlte.js"></script>
  <!-- js -->
  <script src="admin/plugins/jquery/jquery.min.js"></script>
  <script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>