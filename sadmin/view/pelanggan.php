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
          <h1 class="m-0">Pelanggan</h1>
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
      <div class="row">
        <div class="col-lg-12 col-6">
          <div class=" float-sm-right">
            <a href="add_pel.php" class="btn btn-info"><i class="fas fa-plus"> Tambah Data</i></a><br /><br />
          </div>
          <table class="table table-striped">
            <tr>
              <th>ID</th>
              <th>NAMA</th>
              <th>EMAIL</th>
              <th>TELP</th>
              <th>ALAMAT</th>
              <th>AKSES</th>
              <th>STATUS</th>
              <th width="20%">AKSI</th>
            </tr>
            <?php
            $x = 1;
            $result = mysqli_query($conn, "SELECT * FROM pelanggan ORDER BY id_pel ASC");
            while ($user_data = mysqli_fetch_array($result)) { ?>
              <tr>
                <td><?php echo $x++ ?></td>
                <td><?php echo $user_data['nama'] ?></td>
                <td><?php echo $user_data['email'] ?></td>
                <td><?php echo $user_data['telp'] ?></td>
                <td><?php echo $user_data['alamat'] ?></td>
                <td><?php if ($user_data['role'] == "member") { ?>
                    <span class="badge badge-info"> Customer</span>
                  <?php
                    } else if ($user_data['role'] == "admin") { ?>
                    <span class="badge badge-warning"> Admin</span>
                  <?php
                    } else if ($user_data['role'] == "super") { ?>
                    <span class="badge badge-danger"> Super Admin</span>
                  <?php
                    } ?>
                </td>
                <td><?php if ($user_data['status'] == "1") { ?>
                    <span class="badge badge-success"> Aktif</span>
                  <?php } else if ($user_data['status'] == "0") { ?>
                    <span class="badge badge-danger"> Terhapus</span>
                  <?php } ?>
                </td>
                <td><?php
                if ($user_data['status'] == "1") { ?>
                    <a href='edit_pel.php?id_pel=<?php echo $user_data['id_pel'] ?>'><i class="fas fa-edit">Edit</i></a>
                    <?php
                    if ($user_data['role'] != "super") { ?>
                      | <a href='../controller/delete_pel.php?id_pel=<?php echo $user_data['id_pel'] ?>'><i class="fas fa-trash text text-danger">Delete</i></a>
                    <?php }
                    } else if ($user_data['status'] == "0") { ?>
                    <a href='../controller/restore_pel.php?id_pel=<?php echo $user_data['id_pel'] ?>'><i class="fas fa-refresh text text-success">Restore</i></a>
                  <?php }
                  ?>
                </td>
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
