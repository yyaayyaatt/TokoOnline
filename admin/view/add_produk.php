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
          <h1 class="m-0">Tambah Produk</h1>
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
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <form action="../controller/simpan_produk.php" method="POST" enctype="multipart/form-data">

                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" placeholder=" Nama Produk" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Deskripsi</label>
                    <input type="text" name="ket" placeholder=" Deskripsi Produk" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control" name="kategori" id="kategori" required>
                      <option disabled selected> Pilih Kategori </option>
                      <?php
                      $result = mysqli_query($conn, "SELECT * FROM kategori ORDER BY nm_kat ASC");
                      while ($data = mysqli_fetch_array($result)) {
                      ?>
                        <option value="<?= $data['id_kat'] ?>"><?= $data['nm_kat'] ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Harga</label>
                    <input type="number" name="harga" placeholder="Harga Produk" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>foto Produk</label>
                    <input type="file" name="foto1" placeholder="Foto Produk" class="form-control" required>
                  </div>

                  <button type="submit" class="btn btn-success">SIMPAN</button>
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
