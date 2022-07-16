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
          <h1 class="m-0">Input Nomor Resi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Resi</li>
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
                <form action="../controller/input_resi.php" method="POST">
                  <div class="form-group">
                    <input type="hidden" name="invoice" value="<?php echo $_GET['invoice'] ?>" required>
                    <label>Nomor Resi</label>
                    <input type="text" name="resi" placeholder="Masukkan Nomor Resi" class="form-control" required>
                  </div>
                  <button type="submit" class="btn btn-success">SIMPAN</button>
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
