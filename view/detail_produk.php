<?php include "../layout/header.php" ?>
<?php 
include_once("../admin/config/connection.php"); ?>
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
            </div>

            <div class="mt-4">
              <form action="../controller/add_chart.php" method="POST">
                <input type="hidden" name="id_produk" value="<?php echo $row['id_produk']; ?>">
            <input type="hidden" name="pelanggan" value="<?php echo $_SESSION['id_pel']?>">
                <div>
                  <button class="btn btn-primary btn-lg btn-flat" type="submit">
                    <i class="fa fa-cart-plus fa-lg mr-2"></i>
                    Masukkan keranjang
                  </button>
              </form>

              <a href="../view/checkout.php" class="btn btn-success btn-lg btn-flat">
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