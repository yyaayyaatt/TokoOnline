<?php include "../layout/header.php" ?>
<?php include_once("../admin/config/connection.php");
$pelanggan = $_SESSION['id_pel']; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Details Transaksi</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
            <li class="breadcrumb-item active">Transaksi</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card card-solid">
      <div class="card-body pb-0">
        <div class="row">

          <table class="table table-striped">
            <tr>
              <th>NO.</th>
              <th>NO. INVOICE</th>
              <th>TANGGAL</th>
              <th>PELANGGAN</th>
              <th>TOTAL</th>
              <th>STATUS</th>
              <th width="20%">AKSI</th>
            </tr>
            <?php
            $subtotal = 0;
            $result = mysqli_query(
              $conn,
              "SELECT produk.*,transaksi.*,transaksi_detail.*,pelanggan.*,transaksi_detail.qty,transaksi_detail.harga,transaksi_detail.nama as barang 
          FROM transaksi_detail 
          INNER JOIN produk on produk.id_produk=transaksi_detail.id_produk 
          INNER JOIN transaksi on transaksi.invoice=transaksi_detail.invoice 
          INNER JOIN pelanggan on pelanggan.id_pel = transaksi.pelanggan 
          WHERE transaksi.pelanggan='$pelanggan'  
          GROUP BY transaksi_detail.invoice 
          ORDER BY transaksi_detail.id_detail"
            );
            while ($user_data = mysqli_fetch_array($result)) { ?>
              <tr>
                <td><?php echo $user_data['no'] ?></td>
                <td><?php echo $user_data['invoice'] ?></td>
                <td><?php echo $user_data['tanggal'] ?></td>
                <td><?php echo $user_data['nama'] ?></td>
                <td align="right" width="10%">Rp <?php echo number_format($user_data['total'], 0, ',', '.') ?></td>
                <td>
                  <?php if ($user_data['status'] == "Menunggu Pembayaran") { ?>
                    <span class="badge badge-warning"> <?php echo $user_data['status'] ?></span>
                  <?php } else if ($user_data['status'] == "Menunggu Konfirmasi") {  ?>
                    <span class="badge badge-info"> <?php echo $user_data['status'] ?></span>
                  <?php } else if ($user_data['status'] == "Bayar") {  ?>
                    <span class="badge badge-success"> <?php echo $user_data['status'] ?></span>
                  <?php } else if ($user_data['status'] == "Batal") {  ?>
                    <span class="badge badge-danger"> <?php echo $user_data['status'] ?></span>
                  <?php } else if ($user_data['status'] == "Proses Pengiriman") { ?>
                    <span class="badge badge-dark"> <?php echo $user_data['status'] ?></span>
                  <?php } else if ($user_data['status'] == "Selesai") { ?>
                    <span class="badge badge-light"> <?php echo $user_data['status'] ?></span>
                  <?php } ?>
                </td>
                <td>
                  <?php if ($user_data['status'] == "Menunggu Pembayaran") { ?>
                    <span class="badge badge-info fa fa-check"><a href='../view/konf_bayar.php?invoice=<?php echo $user_data['invoice'] ?>' style="color:white"> Konfirmasi Bayar</a></span>
                  <?php } ?>
                  <?php if ($user_data['status'] == "Menunggu Konfirmasi" || $user_data['status'] == "Bayar") { ?>
                    <span class="badge badge-success fa fa-print"><a href='../view/cetak_invoice.php?invoice=<?php echo $user_data['invoice'] ?>' style="color:white" target="_blank"> Cetak Invoice</a></span>
                  <?php } ?>
                  <?php if ($user_data['status'] == "Proses Pengiriman") { ?>
                    <span class="badge badge-primary fa fa-box"><a href='../controller/konfirmasi.php?invoice=<?php echo $user_data['invoice'] ?>&stts=Selesai' style="color:white" > Selesaikan Transaksi</a></span>
                  <?php } ?>
                  <?php if ($user_data['status'] == "Selesai") { ?>
                    <span class="badge badge-warning fa fa-star"><a href='../view/rating.php?id_produk=<?php echo $user_data['id_produk'] ?>&foto=<?php echo $user_data['foto1'] ?>' style="color:white" > Nilai Produk</a></span>
                  <?php } ?>
                </td>
              </tr>
            <?php
              $subtotal += $user_data['total'];
            } ?>
            <!-- <tr>
              <input type="hidden" value="<?php echo $subtotal ?>" name="total">
              <td colspan="4" align="right">
                <h3>Sub Total: Rp <?php echo number_format($subtotal, 0, ',', '.') ?></h3>
              </td>
              <td><a href='../controller/simpan_transaksi.php?total=<?php echo $subtotal ?>' class="btn btn-success btn-sm">Simpan Transaksi</a></td>
            </tr> -->
          </table>
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <!--<nav aria-label="Contacts Page Navigation">
            <ul class="pagination justify-content-center m-0">
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">5</a></li>
            </ul>
          </nav> -->
      </div>
      <!-- /.card-footer -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include "../layout/footer.php" ?>
<script>
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        icon: 'success',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
  });