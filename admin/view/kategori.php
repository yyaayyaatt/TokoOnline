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
          <h1 class="m-0">Kategori</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Kategori</li>
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
        <div class="col-lg-12 col-6 ">
          <div class=" float-sm-right">
            <a href="add_kat.php" class="btn btn-info">Tambah Data</a><br />
          </div><br><br>
          <table class="table table-striped">
            <tr>
              <th>ID</th>
              <th>KATEGORI</th>
              <th width="20%">AKSI</th>
            </tr>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM kategori ORDER BY id_kat ASC");
            while ($user_data = mysqli_fetch_array($result)) {?>
              <tr>
              <td><?php echo $user_data['id_kat'] ?></td>
              <td><?php echo $user_data['nm_kat'] ?></td>
              <td><a href='edit_kat.php?id_kat=<?php echo $user_data['id_kat']?>'>Edit</a> | <a href='../controller/delete_kat.php?id_kat=<?php echo $user_data['id_kat'] ?>'>Delete</a></td>
              </tr>
            <?php }
            ?>
          </table>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.card -->
  </section>
</div>

<?php include "../layout/footer.php" ?>
