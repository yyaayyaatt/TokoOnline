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
          <h1 class="m-0">Konfirmasi Pembayaran</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
            <li class="breadcrumb-item active">Konfirmasi </li>
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
                <div class="form-group">
                    <table class="table table-striped">
                  <tr>
                    <th>No. Rekening</th>
                    <td>89897998</td>
                  </tr>
                  <tr>
                    <th>Atas Nama</th>
                    <td>Griya Herbal Larieskaa</td>
                  </tr>
                  <tr>
                    <th>Bank</th>
                    <td>BRI</td>
                  </tr>
                </table>
                <label>Mohon melakukan transfer ke nomor rekening diatas, kemudian setelah itu lakukan konfirmasi pembayaran dengan mengisi form berikut ini:</label>
                </div>
                <form action="../controller/konf_bayar.php" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label>Nama Rekening</label>
                    <input type="hidden" name="invoice" value="<?php echo $_GET['invoice']; ?>" required>
                    <input type="text" name="nama" placeholder="a.n. rekening bank anda" class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label>Nomoinal</label>
                    <input type="text" name="nominal" placeholder="Masukkan Nominal transfer" class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label>Bank Transfer</label>
                    <select name ="bank" class="form-control">
                      <option disabled selected>-- Bank --</option>
                      <option value="BRI">BRI</option>
                      <option value="BNI">BNI</option>
                      <option value="MANDIRI">MANDIRI</option>
                      <option value="BCA">BCA</option>
                      <option value="BSI">BSI</option>
                      <option value="BTN">BTN</option>
                      <option value="BTPN">BTPN</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Bukti Transfer</label>
                    <input type="file" name="bukti"  class="form-control">
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
