<?php include "../layout/header.php" ?>
<?php include "../layout/navbar.php" ?>
<?php include "../layout/sidebar.php" ?>

<?php
  $id = $_GET['id_produk'];
  $query = "SELECT * FROM produk WHERE id_produk = $id LIMIT 1";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);
  ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Ubah Produk</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Ubah Produk</li>
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
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <form action="../controller/ubah_produk.php" method="POST" enctype="multipart/form-data">

                  <div class="form-group">
                    <label>Nama</label>
                    <input type="hidden" name="id_produk" placeholder=" Nama Produk" class="form-control" value="<?php echo $row['id_produk'] ?>" required>
                    <input type="text" name="nama" placeholder=" Nama Produk" class="form-control" value="<?php echo $row['nama'] ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Deskripsi</label>
                    <input type="text" name="ket" placeholder=" Deskripsi Produk" class="form-control" value="<?php echo $row['ket'] ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control" name="kategori" id="kategori" required>
                      <option disabled selected> Pilih Kategori </option>
                      <?php
                      $result = mysqli_query($conn, "SELECT * FROM kategori ORDER BY nm_kat ASC");
                      while ($data = mysqli_fetch_array($result)) {
                      ?>
                        <option value="<?php echo $data['id_kat'] ?>"
                        <?php if($row['kategori'] == $data['id_kat']) :?> selected <?php endif; ?>><?php echo $data['nm_kat'] ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Harga</label>
                    <input type="number" name="harga" placeholder="Harga Produk" class="form-control" value="<?php echo $row['harga'] ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Stok</label>
                    <input type="number" name="stok" placeholder="Stok Produk" class="form-control" value="<?php echo $row['stok'] ?>" required>
                  </div>
                  <div class="form-group">
                    <label>foto Produk</label>
                    <input type="file" id="foto" name="foto" placeholder="Foto Produk" class="form-control">
                    <input type="text" name="foto_current" placeholder="Foto Produk" class="form-control" value="<?php echo $row['foto1'] ?>">
                  </div>

                  <button type="submit" class="btn btn-success">UBAH</button>
                  <button type="reset" class="btn btn-warning">RESET</button>
                  <a href="produk.php" class="btn btn-info ">LIHAT PRODUK</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card -->
  </section>
</div>

<?php include "../layout/footer.php" ?>
