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

  <form method="POST" name="chat" action="#" enctype="application/x-www-form-urlencoded">
    <br>
    <h4>Obrolan</h4> <br>
    <p>Customer</p>
    <input type="text" id="id" name="id" class="form-control" value="<?php echo $_SESSION['id_pel'] ?>" readonly></p><br>
    <input type="text" id="id_tujuan" name="id_tujuan" class="form-control" value="<?php echo $_GET['id_pelanggan'] ?>" readonly></p><br>
    <input type="text" id="nama" name="nama" class="form-control" value="<?php echo $_GET['nama'] ?>" readonly></p><br>
    <p>Pesan Obrolan</p>
    <textarea class="form-control" placeholder=" Obrolan Anda" name="pesan" rows="2" cols="40" maxlength="120" required></textarea><br><br>
    <input type="submit" name="submit" value="Kirim Pesan" class="btn btn-success"></input>
    <input type="reset" name="reset" value="Bersihkan" class="btn btn-danger"></input>
    <br><br><?php
            if (isset($_POST['submit'])) {
              $id_pel    = $_SESSION['id_pel'];
              $pesan    = $_POST['pesan'];
              $tanggal    = date("Y-m-d, H:i a");
              $status    = $_POST['cek'];
              $id_tujuan    = $_POST['id_tujuan'];
              if ($_POST['nama'] == 'Admin') { //validasi kata admin
            ?>
        <script language="JavaScript">
          alert('Anda bukan Admin !');
          document.location = 'index.php';
        </script>
      <?php
              }
              if (empty($pesan) || empty($id_pel)) { //validasi data
      ?>
        <script language="JavaScript">
          alert('Data yang Anda masukan tidak lengkap !');
          document.location = '../view/chat.php';
        </script>
      <?php
              }
              // if (empty($_POST['cek'])) { //validasi data
              //
      ?>
      // <script language="JavaScript">
        //         alert('Please Checklist - Confirm you are NOT a spammer !');
        //         document.location = '../view/chat.php';
        //
      </script>
      // <?php
              // } else {
              $input_chat = "INSERT INTO chat (id_pelanggan, pesan, tanggal, status,id_tujuan)
                VALUES ('$id_pel', '$pesan', '$tanggal', '$status','$id_tujuan')";
              $query_input = mysqli_query($conn, $input_chat);
              if ($query_input) {
          ?>
        <script language="JavaScript">
          document.location = '../index.php';
        </script>
    <?php
              } else {
                echo 'Dbase E';
              }
              // }
            }
    ?>
  </form>
  <h4>Daftar Obrolan</h4><br>
  <table class="art-article" border="0" cellspacing="0" cellpadding="0" style=" margin: 0; width: 100%;">
    <tbody>
      <?php
      $Tampil = "SELECT * FROM chat inner join pelanggan on pelanggan.id_pel=chat.id_pelanggan where id_pel='" . $_SESSION['id_pel'] . "'or id_tujuan='" . $_SESSION['id_pel'] . "' ORDER BY tanggal DESC LIMIT 99;";
      $query = mysqli_query($conn, $Tampil);
      while ($hasil = mysqli_fetch_array($query)) {
        $pesan = stripslashes($hasil['pesan']);
        $tanggal = stripslashes($hasil['tanggal']);
        $nama = stripslashes($hasil['nama']);
      ?>
        <style type="text/css">
          #atas {
            border-bottom-width: 1px;
            border-bottom-style: ridge;
            border-bottom-color: #CCC;
            margin-top: 1px;
            margin-right: 1px;
            margin-bottom: 2px;
            margin-left: 0px;
            padding-bottom: 1px;
            color: #FFA500;
          }

          #pesan {
            padding-right: 1px;
            padding-left: 0px;
            margin-bottom: 10px;
            color: #080808;
          }

          .waktu {
            float: right;
            color: #871214;
            font-family: Arial;
            font-size: 9px;
          }
        </style>
      <?php
        echo "
                <div id='atas'>$hasil[nama]<span class='waktu'>$hasil[tanggal]</span></div>
                <div id='pesan'>$hasil[pesan]</div>";
      }
      ?>
    </tbody>
  </table><br>
</div>
<?php include "../layout/footer.php" ?>
