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
          <h1 class="m-0">Penilaian Produk</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
            <li class="breadcrumb-item active">Rating </li>
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
                <form action="../controller/save_rating.php" method="POST">

                <div class="form-group form-control">
                    <input type="radio" name="rate" value="5">
                    <span class="fa fa-star checked-1"></span>
                    <span class="fa fa-star checked-2"></span>
                    <span class="fa fa-star checked-3"></span>
                    <span class="fa fa-star checked-4"></span>
                    <span class="fa fa-star checked-5"></span> Sangat Baik
                  </div>
                <div class="form-group form-control">
                    <input type="radio" name="rate" value="4">
                    <span class="fa fa-star checked-1"></span>
                    <span class="fa fa-star checked-2"></span>
                    <span class="fa fa-star checked-3"></span>
                    <span class="fa fa-star checked-4"></span> Baik
                  </div>
                <div class="form-group form-control">
                    <input type="radio" name="rate" value="3">
                    <span class="fa fa-star checked-1"></span>
                    <span class="fa fa-star checked-2"></span>
                    <span class="fa fa-star checked-3"></span> Cukup
                  </div>
                <div class="form-group form-control">
                    <input type="radio" name="rate" value="2">
                    <span class="fa fa-star checked-1"></span>
                    <span class="fa fa-star checked-2"></span> Kurang
                  </div>
                <div class="form-group form-control">
                    <input type="radio" name="rate" value="1">
                    <span class="fa fa-star checked-1"></span> Jelek
                  </div>
                <div class="form-group form-control">
                    <input type="hidden" name="id_produk" value="<?php echo $_GET['id_produk'] ?>">
                    <input type="text" name="pesan" placeholder="Tulis komentar disini" class="form-control">
                  </div>


                  <button type="submit" class="btn btn-success">SIMPAN</button>
                  <button type="reset" class="btn btn-warning">RESET</button>
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
