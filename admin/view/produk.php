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
          <a href="add_produk.php" class="btn btn-info">Tambah Data</a><br /><br />
          </div>
          <table class="table table-striped">
            <tr>
              <th>ID</th>
              <th>NAMA</th>
              <th>KATEGORI</th>
              <th>HARGA</th>
              <th>FOTO</th>
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
              <td><img src="../img/produk/<?php echo $user_data['foto1'] ?>" alt="foto produk" width="50px"></td>
              <td><a href='edit_produk.php?id_produk=<?php echo $user_data['id_produk']?>'>Edit</a> | <a href='../controller/delete_produk.php?id_produk=<?php echo $user_data['id_produk'] ?>&foto=<?php echo $user_data['foto1'] ?>'>Delete</a></td>
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
