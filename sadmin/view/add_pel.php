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
          <h1 class="m-0">Tambah Pelanggan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Pelanggan</li>
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
                <form action="../controller/simpan_pel.php" method="POST">

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" placeholder="Masukkan Nama" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" placeholder="Masukkan Email" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>No.Telp</label>
                    <input type="text" name="telp" placeholder="Masukkan Telepon" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" placeholder="Masukkan Alamat" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Hak Akses</label>
                    <select type="text" name="role" class="form-control" required>
                      <option value="">--Pilih Hak Akses--</option>
                      <option value="member">Member</option>
                      <option value="admin">Admin</option>
                    </select>
                  </div>

                  <button type="submit" class="btn btn-success">SIMPAN</button>
                  <button type="reset" class="btn btn-warning">RESET</button>
                  <a href="kategori.php"class="btn btn-info ">LIHAT PELANGGAN</a>
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
