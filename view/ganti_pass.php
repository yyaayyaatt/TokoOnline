<?php include "../layout/header.php" ?>
<?php 
include_once("../admin/config/connection.php"); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Ganti Password Customer</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
            <li class="breadcrumb-item active">Customer</li>
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
                <form action="../controller/ubah_pass.php" method="POST">

                <div class="form-group">
                    <label>User</label>
                    <input type="text" name="user" placeholder="Masukkan Nama User baru" class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="pass" placeholder="Masukkan Password baru" class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label>Ulangi Password</label>
                    <input type="text" name="passx" placeholder="Ulangi Password baru" class="form-control" required>
                  </div>

                  <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> SIMPAN</button>
                  <button type="reset" class="btn btn-warning"> <i class="fa fa-reset"></i> RESET</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card -->
  </section>
</div><br>

<?php include "../layout/footer.php" ?>
