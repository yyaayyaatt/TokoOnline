
  <?php include "../layout/header.php" ?>
<?php include "../layout/navbar.php" ?>
<?php include "../layout/sidebar.php" ?>

<?php
  $id = $_GET['id_pel'];
  $query = "SELECT * FROM pelanggan WHERE id_pel = $id LIMIT 1";
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
          <h1 class="m-0">Ubah Pelanggan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">pelanggan</li>
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
                <form action="../controller/edit_pel.php" method="POST">

                  <div class="form-group">
                    <input type="hidden" name="id_pel"
                    class="form-control" value="<?php echo $row['id_pel'] ?>" required>
                    <label>Nama Pelanggan</label>
                    <input type="text" name="nama"
                    placeholder="Masukkan Nama"
                    class="form-control" value="<?php echo $row['nama'] ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email"
                    placeholder="Email"
                    class="form-control" value="<?php echo $row['email'] ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Telepon</label>
                    <input type="text" name="telp"
                    placeholder="Telepon"
                    class="form-control" value="<?php echo $row['telp'] ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat"
                    placeholder="Alamat"
                    class="form-control" value="<?php echo $row['alamat'] ?>" required>
                  </div>

                  <button type="submit" class="btn btn-success">UBAH</button>
                  <button type="reset" class="btn btn-warning">RESET</button>
                  <a href="kategori.php"class="btn btn-info ">LIHAT KATEGORI</a>
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
