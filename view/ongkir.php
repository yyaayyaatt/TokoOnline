<?php
session_start();

if (!isset($_SESSION['id_pel'])) {
    header('location:view/login.php');
};

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
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/> -->
    <!-- <link rel="stylesheet" href="../admin/dist/css/adminlte.min.css"> -->
    <!-- font-awesome icons -->
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/skdslider.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"> </script>
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
                    <li>
                        <a href="keranjang.php"><button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
                        </a>
                    </li>
                    <li><a href="chat.php">Chat</a></li>
                    <?php
                    if (!isset($_SESSION['id_pel'])) { ?>

                        <li><a href="register.php"> Daftar</a></li>
                        <li><a href="view/login.php">Masuk</a></li>

                        <?php } else {

                        if ($_SESSION['role'] == 'member') { ?>

                            <li style="color:white">Halo, <?php echo $_SESSION["name"] ?>
                            <li><a href="../controller/logout.php">Keluar?</a></li>
                        <?php
                        } else if ($_SESSION['role'] == 'admin') { ?>
                            <li style="color:white">Halo, <?php echo $_SESSION["name"] ?>
                            <li><a href="../admin">Admin Panel</a></li>
                            <li><a href="../controller/logout.php">Keluar?</a></li>
                        <?php } else if ($_SESSION['role'] == 'super') { ?>
                            <li style="color:white">Halo, <?php echo $_SESSION["name"] ?>
                            <li><a href="../sadmin">Super Admin Panel</a></li>
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
    </nav><br>
    <?php
    //Get Data Provinsi
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: 9240d09aecd264c3966f4013d598c38b"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    ?>

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
                        <div class="col-sm-12">
                            <label>Provinsi</label><br>
                            <select name='provinsi' id='provinsi' class="form-control">";
                                <option>Pilih Provinsi</option>
                                <?php
                                $get = json_decode($response, true);
                                for ($i = 0; $i < count($get['rajaongkir']['results']); $i++) :
                                ?>
                                    <option value="<?php echo $get['rajaongkir']['results'][$i]['province_id']; ?>"><?php echo $get['rajaongkir']['results'][$i]['province']; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <label>Kabupaten</label><br>
                            <select id="kabupaten" name="kabupaten" class="form-control">
                                <!-- Data kabupaten akan diload menggunakan AJAX -->
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <label>Kurir</label><br>
                            <select class="form-control" id="kurir" name="kurir">
                                <option value="">Pilih Kurir</option>
                                <option value="jne">JNE</option>
                                <option value="tiki">TIKI</option>
                                <option value="pos">POS INDONESIA</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div id="tampil_ongkir"> </div>
    </section>
    <div style="background-color: #FF8C00;">
        <footer class="main-footer">
            <div class="row" style="padding: 40px;">
                <div class="col-sm-8 text text-light" style="padding: 20px;">
                    <h2>Kontak</h2><br>
                    <i class="fa fa-user"></i> Jl. Sikepluh Raya, Kec. Kramat, Kab. Tegal<br>
                    <i class="fa fa-phone"></i> +62 815-4803-2872 <br>
                </div>
                <div class="col-sm-4 text text-light" style="padding: 20px;">
                    <h2>Sosial Media</h2><br>
                    <i class="fa fa-facebook"> <a href="https://www.facebook.com/profile.php?id=100078120048945" class=" text-light">Facebook</a></i> <br>
                    <i class="fa fa-instagram text-light"> <a href="https://instagram.com/larieskaaherbal?igshid=YmMyMTA2M2Y=" class=" text-light">Instagram</a></i> <br>
                </div>
                <div class="col-sm-12 text text-light" style="padding-top: 20px; text-align: center;">
                    <hr class="new5">
                    Copyright &copy; 2014-2021 <a href="#" class=" text-light">Griya Herbal Larieskaa</a>.
                    All rights reserved.
                </div>
        </footer>
    </div>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <script>
        $('#provinsi').change(function() {

            //Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax
            var prov = $('#provinsi').val();
            var nama_provinsi = $(this).attr("nama_provinsi");
            $.ajax({
                type: 'GET',
                url: 'ambil-kabupaten.php',
                data: 'prov_id=' + prov,
                success: function(data) {
                    //jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
                    $("#kabupaten").html(data);
                }
            });
        });

        $('#kurir').change(function() {

            //Mengambil value dari option select provinsi asal, kabupaten, kurir kemudian parameternya dikirim menggunakan ajax
            var kab = $('#kabupaten').val();
            var kurir = $('#kurir').val();

            $.ajax({
                type: 'POST',
                url: 'tabel-ongkir.php',
                data: {
                    'kab_id': kab,
                    'kurir': kurir
                },
                success: function(data) {
                    console.log(data);
                    //jika data berhasil didapatkan, tampilkan ke dalam element div tampil_ongkir
                    $("#tampil_ongkir").html(data);
                }
            });
        });
    </script>
</body>

</html>