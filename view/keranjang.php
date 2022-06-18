<?php include "../layout/header.php" ?>

<?php
$pelanggan = $_SESSION['id_pel'];
$result = mysqli_query($conn, "SELECT keranjang.id_keranjang FROM keranjang INNER JOIN produk on produk.id_produk=keranjang.id_produk INNER JOIN pelanggan on pelanggan.id_pel = keranjang.pelanggan WHERE keranjang.pelanggan='$pelanggan' limit 1");
// var_dump($pelanggan);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Keranjang Belanja</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
            <li class="breadcrumb-item active">Keranjang Belanja</li>
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
              <th>BARANG</th>
              <th>FOTO</th>
              <th>QTY</th>
              <th>HARGA</th>
              <th width="20%">AKSI</th>
            </tr>
            <?php if (mysqli_num_rows($result)>0) {
              $subtotal = 0;
              $result = mysqli_query($conn, "SELECT produk.*,keranjang.*,pelanggan.*,sum(qty)as qty,sum(harga)as total,produk.nama as barang FROM keranjang INNER JOIN produk on produk.id_produk=keranjang.id_produk INNER JOIN pelanggan on pelanggan.id_pel = keranjang.pelanggan WHERE keranjang.pelanggan='$pelanggan' GROUP BY keranjang.id_produk ORDER BY keranjang.id_produk");
              while ($user_data = mysqli_fetch_array($result)) { ?>
                <tr>
                  <td><?php echo $user_data['barang'] ?></td>
                  <td><img src="../admin/img/produk/<?php echo $user_data['foto1'] ?>" width="80"></td>
                  <td width="5%" align="center"><?php echo $user_data['qty'] ?></td>
                  <td align="right" width="10%">Rp <?php echo number_format($user_data['total'], 0, ',', '.') ?></td>
                  <td width="10%"><a href='../controller/delete_keranjang.php?id_keranjang=<?php echo $user_data['id_keranjang'] ?>'><i class="fa fa-trash text-danger swalDefaultSuccess"> Hapus</i></a></td>
                </tr>
              <?php
                $subtotal += $user_data['total'];
              } ?>
              <tr>
                <td colspan="4" align="right">
                  <h3>Sub Total: Rp <?php echo number_format($subtotal, 0, ',', '.') ?></h3>
                </td>
                <td><a href='checkout.php?id_pelanggan=<?php echo $user_data['pelanggan'] ?>' class="btn btn-success btn-sm">Lanjutkan Transaksi</a></td>
              </tr>
        <?php } else { ?>
          <tr>
            <td colspan="5" align="center">Keranjang masih Kosong</td>
          </tr>
        <?php } ?>
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