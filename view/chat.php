<?php
session_start();

if (!isset($_SESSION['id_pel'])) {
    header('location:view/login.php');
} else if ($_SESSION['role'] == 'admin') {
    header('location:../admin/index.php');
} else if ($_SESSION['role'] == 'super') {
    header('location:../sadmin/index.php');
}

include('../admin/config/connection.php');

?>
<!DOCTYPE html>
<html>

<head>
    <title>Griya Herbal Larieskaa</title>
    <link rel="shorcut icon" type="=image/png" href="icon/logo.png" />
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Falenda Flora, Ruben Agung Santoso" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //for-mobile-apps -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />

    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- font-awesome icons -->
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/skdslider.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!-- //js -->
    <!-- <link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'> -->
    <!-- start-smoth-scrolling -->
    <!-- start-smoth-scrolling -->
</head>

<body>

    <!-- header -->
    <div class="agileits_header">
        <div class="container">
            <div class="w3l_offers">
                <p>DAPATKAN PENAWARAN MENARIK KHUSUS HARI INI, BELANJA SEKARANG!</p>
            </div>
            <div class="agile-login">
                <ul>
                    <a href="keranjang.php"><button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
                    </a>
          <li><a href="../view/chat.php">Chat</a></li>
                    <?php
                    if (!isset($_SESSION['id_pel'])) { ?>

                        <li><a href="register.php"> Daftar</a></li>
                        <li><a href="view/login.php">Masuk</a></li>

                        <?php } else {

                        if ($_SESSION['role'] == 'member') { ?>

                            <li style="color:white">Halo, <?php echo $_SESSION["name"] ?>
                            <li><a href="../controller/logout.php">Keluar?</a></li>
                    <?php
                        }
                    }
                    ?>

                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>

    <div class="logo_products">
        <div class="container">
            <div class="w3ls_logo_products_left1">
                <ul class="phone_email">
                    <li><i class="fa fa-phone" aria-hidden="true"></i>Hubungi Kami : (+62) 815-4803-2872</li>
                </ul>
            </div>
            <div class="w3ls_logo_products_left">
                <h2><a href="index.php" style="color: orange;">Griya Herbal Larieskaa</a></h2>
            </div>
            <div class="w3l_search">
                <form action="cari_produk.php" method="post">
                    <input type="search" name="Search" placeholder="Cari produk...">
                    <button type="submit" class="btn btn-default search" aria-label="Left Align">
                        <i class="fa fa-search" aria-hidden="true"> </i>
                    </button>
                    <div class="clearfix"></div>
                </form>
            </div>

            <div class="clearfix"> </div>
        </div>
    </div><!-- navigation -->

    <div style="background-color: #FF8C00;">
        <nav class="navbar navbar-expand-sm navbar-light">
            <div class="container">
                <a href="view/dashboard.php" class="navbar-brand">
                    <!-- <img src="admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
                    <!-- <span class="brand-text font-weight-light">Griya Herbal Larieskaa</span> -->
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3 " id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="../index.php" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Kategori Produk</a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <li class="dropdown-divider"></li>
                                <?php
                                $kat = mysqli_query($conn, "SELECT * from kategori order by id_kat ASC");
                                while ($p = mysqli_fetch_array($kat)) {

                                ?>
                                    <li><a href="produk.php?id_kat=<?php echo $p['id_kat'] ?>" class="dropdown-item"><?php echo $p['nm_kat'] ?></a></li>

                                <?php
                                }
                                ?>
                                <!-- <li><a href="#" class="dropdown-item">Some action </a></li>
              <li><a href="#" class="dropdown-item">Some other action</a></li> -->
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="keranjang.php" class="nav-link">Keranjang Pesanan</a>
                        </li>
                        <li class="nav-item">
                            <a href="transaksi.php" class="nav-link">Transaksi</a>
                        </li>
                        <li class="nav-item">
                            <a href="ganti_pass.php" class="nav-link">Ganti Password</a>
                        </li>
                    </ul>
                </div>
            </div>
    </div>
    </nav>

    <div class="container">
        <form method="POST" name="chat" action="#" enctype="application/x-www-form-urlencoded">
            <br>
            <h4>Obrolan</h4> <br>
            <p>Admin Tujuan</p>
            <select class="form-control" name="id_tujuan" style="width: 95%;" required>
                <option value="none">-- Pilih admin --</option>
                <?php
                $admin = "SELECT * FROM pelanggan where role='admin'";
                $query = mysqli_query($conn, $admin);
                while ($hasil = mysqli_fetch_array($query)) { ?>
                    <option value="<?php echo $hasil['id_pel'] ?>"><?php echo $hasil['nama'] ?></option>
            </select>
        <?php } ?><br><br>
        <p>Pesan Obrolan</p>
        <textarea class="form-control" placeholder=" Obrolan Anda" name="pesan" rows="2" cols="40" maxlength="120" style="width: 95%;" required></textarea><br><br>
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
    </div>
    <div class="container"><br>
        <h4>Daftar Obrolan</h4><br>
        <table class="art-article" border="0" cellspacing="0" cellpadding="0" style=" margin: 0; width: 100%;">
            <tbody>
                <?php
                $Tampil = "SELECT * FROM chat inner join pelanggan on pelanggan.id_pel=id_pelanggan where id_pel='" . $_SESSION['id_pel'] . "'or id_tujuan='" . $_SESSION['id_pel'] . "' ORDER BY tanggal DESC LIMIT 99;";
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
        </table>
    </div><br>
    <script src="js/skdslider.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script src="js/carousel.js"></script>
    <script src="../admin/dist/js/adminlte.js"></script>
    <!-- js -->
    <script src="admin/plugins/jquery/jquery.min.js"></script>
    <script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
<?php include "../layout/footer.php" ?>