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
          <h1 class="m-0">Rating Pelanggan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Kategori</li>
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
        <div class="col-lg-12 col-6 ">

          <table class="table table-striped">
            <tr>
              <th>NO</th>
              <th>PELANGGAN</th>
              <th>PRODUK</th>
              <th>PESAN</th>
              <th>RATE</th>
            </tr>
            <?php $x=0;
            $result = mysqli_query($conn, "SELECT pelanggan.*,produk.*,rating.*,pelanggan.nama as pelanggan,produk.nama as produk FROM rating INNER JOIN pelanggan on pelanggan.id_pel=rating.pelanggan INNER JOIN produk on produk.id_produk=rating.produk ORDER BY id_rate ASC");
            while ($user_data = mysqli_fetch_array($result)) {?>
              <tr>
              <td><?php echo $x +=1; ?></td>
              <td><?php echo $user_data['pelanggan'] ?></td>
              <td><?php echo $user_data['produk'] ?></td>
              <td><?php echo $user_data['pesan'] ?></td>
              <td><?php
                $rates = mysqli_query($conn, "SELECT rate FROM rating WHERE rating.pelanggan = " . $user_data['id_pel']);
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
