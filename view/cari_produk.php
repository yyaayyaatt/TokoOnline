<?php include "../layout/header.php" ?>
<?php include_once("../admin/config/connection.php"); ?>
<?php 
          $Search="";
          if(isset($_POST['Search'])){
          $Search = $_POST['Search'];
          } 
          ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pencarian Produk</h1>
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
          $result = mysqli_query($conn, "SELECT * FROM produk INNER JOIN kategori on kategori.id_kat=produk.kategori 
          where produk.nama like '%$Search%' or kategori.nm_kat like '%$Search%' ORDER BY id_produk ASC limit 20");
          while ($user_data = mysqli_fetch_array($result)) { ?>

            <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">

                <form action="../controller/add_chart.php" method="POST">
                  <div class="card-header text-muted border-bottom-0 text-center">
                    <input type="hidden" name="id_produk" value ="<?php echo $user_data['id_produk']; ?>">
                    <input type="hidden" name="pelanggan" value ="<?php echo $_SESSION['id_pel']; ?>">
                    <h2 class="lead"><b><?php echo $user_data['nama']; ?></b></h2>
                  </div>
                  <div class="card-body pt-0">
                    <div class="row">
                      <div class="col-12 text-center">
                        <img src="../admin/img/produk/<?php echo $user_data['foto1'] ?>" alt="produk"  width="200px" height="230px" class="product-image">
                      </div>
                      <div class="col-12">
                        <h1 class="lead"><b>Rp.<?php echo number_format($user_data['harga'], 0, ',', '.') ?></b></h1>
                        <p class="text-muted text-sm"><?php echo $user_data['nama']; ?></p>

                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="text-right">
                      <button type="submit" class="btn btn-sm btn-warning">
                        <i class="fas fa-basket"></i> Keranjang
                      </button>
                      <a href="detail_produk.php?id_produk=<?php echo $user_data['id_produk'] ?>" class="btn btn-sm btn-info">
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
      <!-- /.card-body -->
      <!-- <div class="card-footer">
          <nav aria-label="Contacts Page Navigation">
            <ul class="pagination justify-content-center m-0">
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">5</a></li>
            </ul>
          </nav>
        </div> -->
      <!-- /.card-footer -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include "../layout/footer.php" ?>