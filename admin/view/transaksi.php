<?php include "../layout/header.php" ?>
<?php include "../layout/navbar.php" ?>
<?php include "../layout/sidebar.php" ?>
<?php
$tglawal = date('Y-m-d');
$tglahir = date('Y-m-d');
if(isset($_GET['tglawal']) && isset($_GET['tglahir'])){
$tglawal = $_GET['tglawal'];
$tglahir = $_GET['tglahir'];
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Transaksi/Pemesanan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Transaksi</li>
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
        <div class="card col-sm-12">
          <div class="card-body">
            <form method="get" action="transaksi.php">
              <div class="row">
                <div class="col-sm-2">
                  <label class="label-control">Periode :</label>
                </div>
                <div class="col-sm-3">
                  <input class="form-control" type="date" name="tglawal" value="<?php echo $tglawal ? $tglawal: date('Y-m-d') ?>">
                </div>
                <div class="col-sm-3">
                  <input class="form-control" type="date" name="tglahir" value="<?php echo $tglahir ?  $tglahir : date('Y-m-d') ?>">
                </div>
                <div class="col-sm-4">
                  <button class="btn btn-success" type="submit"><i class="fa fa-search"></i> Cari</button>
                  <a href="../view/cetak_trans.php?tglawal=<?php echo $tglawal ?>&tglahir=<?php echo $tglahir ?>" class="btn btn-info" ><i class="fa fa-print"></i> Cetak</a>
                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="card col-sm-12">
          <div class="card-body">
            <div class="col-lg-12 col-6">
              <!-- <a href="add_kat.php">Tambah</a><br /><br /> -->
              <table class="table table-striped">
                <tr>
                  <th>ID</th>
                  <th>TANGGAL</th>
                  <th>INVOICE</th>
                  <th>PELANGGAN</th>
                  <th>TOTAL</th>
                  <th>STATUS</th>
                  <th width="20%">AKSI</th>
                </tr>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM transaksi INNER JOIN pelanggan on pelanggan.id_pel=transaksi.pelanggan WHERE transaksi.tanggal BETWEEN '$tglawal' AND '$tglahir' ORDER BY no ASC");

                while ($user_data = mysqli_fetch_array($result)) { ?>
                  <tr>
                    <td><?php echo $user_data['no'] ?></td>
                    <td><?php echo $user_data['tanggal'] ?></td>
                    <td><?php echo $user_data['invoice'] ?></td>
                    <td><?php echo $user_data['nama'] ?></td>
                    <td><?php echo $user_data['total'] ?></td>
                    <td><?php if ($user_data['status'] == "Menunggu Pembayaran") { ?>
                        <span class="badge badge-warning"> <?php echo $user_data['status'] ?></span>
                      <?php } else if ($user_data['status'] == "Menunggu Konfirmasi") {  ?>
                        <span class="badge badge-primary"> <?php echo $user_data['status'] ?></span>
                      <?php } else if ($user_data['status'] == "Bayar") {  ?>
                        <span class="badge badge-success"> <?php echo $user_data['status'] ?></span>
                      <?php } else if ($user_data['status'] == "Batal") {  ?>
                        <span class="badge badge-danger"> <?php echo $user_data['status'] ?></span>
                      <?php } else if ($user_data['status'] == "Proses Pengiriman") { ?>
                        <span class="badge badge-dark"> <?php echo $user_data['status'] ?></span>
                      <?php } else if ($user_data['status'] == "Selesai") { ?>
                        <span class="badge badge-light"> <?php echo $user_data['status'] ?></span>
                      <?php } ?>
                    <td>
                      <!-- <a href='edit_transaksi.php?no=<?php echo $user_data['no'] ?>' class="btn btn-info fas fa-edit"> </a>
                <a href='../controller/delete_transaksi.php?no=<?php echo $user_data['no'] ?>' class="btn btn-danger"><span class=" fas fa-trash"> </span></a> -->
                      <?php if ($user_data['status'] == 'Menunggu Konfirmasi') { ?>
                        <a href='../controller/konfirmasi.php?invoice=<?php echo $user_data['invoice'] ?>&stts=Bayar' class="btn btn-success"><span class=" fas fa-check"> </span></a>
                      <?php } ?>
                      <?php if ($user_data['status'] == 'Bayar') { ?>
                        <a href='../controller/konfirmasi.php?invoice=<?php echo $user_data['invoice'] ?>&stts=Proses Pengiriman' class="btn btn-primary"><span class=" fas fa-check"> </span> Proses Kirim</a>
                      <?php } ?>
                    </td>
                  </tr>
                <?php }
                ?>
              </table>
            </div>
            <!-- ./col -->
          </div>
        </div>
      </div>
      <!-- /.card -->
  </section>
</div>

<?php include "../layout/footer.php" ?>
