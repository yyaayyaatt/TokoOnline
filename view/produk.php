<?php include "../layout/header.php" ?>
<?php include_once("../admin/config/connection.php"); ?>
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
          $result = mysqli_query($conn, "SELECT * FROM produk INNER JOIN kategori on kategori.id_kat=produk.kategori where produk.kategori like '%$kat%' ORDER BY id_produk ASC limit 20");
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
                         $rate=0;
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
                        <i class="fa fa-shopping-basket"></i> Keranjang
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
