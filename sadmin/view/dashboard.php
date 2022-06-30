<?php include "../layout/header.php" ?>
<?php include "../layout/navbar.php" ?>
<?php include "../layout/sidebar.php" ?>
<?php
$pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan ORDER BY id_pel ASC");
$produk = mysqli_query($conn, "SELECT * FROM produk ORDER BY id_produk ASC");
$invoice = mysqli_query($conn, "SELECT * FROM transaksi ORDER BY no ASC");

?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h2><?php echo mysqli_num_rows($pelanggan); ?></h2>

                  <h4>Pelanggan</h4>
                </div>
                <div class="icon">
                  <i class="fas fa-user"></i>
                </div>
                <a href="pelanggan.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h2><?php echo mysqli_num_rows($produk); ?></h2>

                  <h4>Produk</h4>
                </div>
                <div class="icon">
                  <i class="fas fa-box"></i>
                </div>
                <a href="produk.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h2><?php echo mysqli_num_rows($invoice); ?></h2>

                  <h4>Transaksi</h4>
                </div>
                <div class="icon">
                  <i class="fas fa-bars"></i>
                </div>
                <a href="transaksi.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.card -->
      </section>
    </div>

<?php include"../layout/footer.php" ?>
