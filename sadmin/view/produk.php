<?php include "../layout/header.php" ?>
<?php include "../layout/navbar.php" ?>
<?php include "../layout/sidebar.php" ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Produk</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Produk</li>
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
        <div class="col-lg-12 col-6">
          <div class=" float-sm-right">
          <a href="add_produk.php" class="btn btn-info"><i class="fas fa-plus"> Tambah Data</i></a><br /><br />
          </div>
          <table class="table table-striped">
            <tr>
              <th>ID</th>
              <th>NAMA</th>
              <th>KATEGORI</th>
              <th>HARGA</th>
              <th>STOK</th>
              <th>RATING</th>
              <th>FOTO</th>
              <th>STATUS</th>
              <th width="20%">AKSI</th>
            </tr>
            <?php
            $X=1;
            $result = mysqli_query($conn, "SELECT * FROM produk INNER JOIN kategori on kategori.id_kat=produk.kategori ORDER BY id_produk ASC");
            while ($user_data = mysqli_fetch_array($result)) {?>
              <tr>
              <td><?php echo $X++ ?></td>
              <td><?php echo $user_data['nama'] ?></td>
              <td><?php echo $user_data['nm_kat'] ?></td>
              <td>Rp.<?php echo number_format($user_data['harga'],2,',','.') ?></td>
              <td><?php echo $user_data['stok'] ?></td>
              <td>
              <?php
                        $rates = mysqli_query($conn, "SELECT (SUM(rating.rate) / COUNT(id_produk)) as rate FROM produk
                        LEFT JOIN rating on rating.produk=produk.id_produk
                        LEFT JOIN pelanggan on pelanggan.id_pel=rating.pelanggan
                        WHERE rating.produk = " . $user_data['id_produk'] . " GROUP BY produk.id_produk");
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
              </td>
              <td><img src="../img/produk/<?php echo $user_data['foto1'] ?>" alt="foto produk" width="50px"></td>
              <td><?php if ($user_data['status'] == "1") { ?>
                    <span class="badge badge-success"> Aktif</span>
                  <?php } else if ($user_data['status'] == "0") { ?>
                    <span class="badge badge-danger"> Terhapus</span>
                  <?php } ?></td>

                <td><?php
                if ($user_data['status'] == "1") { ?>
                    <a href='edit_pel.php?id_pel=<?php echo $user_data['id_pel'] ?>'><i class="fas fa-edit"> Edit</i></a>
                    <?php
                    if ($_SESSION['role'] == "super") { ?>
                      | <a href='../controller/delete_produk.php?id_produk=<?php echo $user_data['id_produk'] ?>&foto=<?php echo $user_data['foto1'] ?>'><i class="fas fa-trash text text-danger"> Delete</i></a>
                    <?php }
                    } else if ($user_data['status'] == "0") {
                      if ($_SESSION['role'] == "super") { ?>
                    <a href='../controller/restore_produk.php?id_produk=<?php echo $user_data['id_produk'] ?>&foto=<?php echo $user_data['foto1'] ?>'><i class="fas fa-refresh text text-success"> Restore</i></a>
                  <?php }}
                  ?>
                </td>
              </tr>
            <?php }
            ?>
          </table>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.card -->
  </section>
</div>

<?php include "../layout/footer.php" ?>
