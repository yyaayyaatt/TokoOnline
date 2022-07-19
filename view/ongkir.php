<?php
session_start();

if (!isset($_SESSION['id_pel'])) {
    header('location:view/login.php');
};

include('../admin/config/connection.php');

?>
<!DOCTYPE html>

<head>
    <title>Fitur Ongkos Kirim Menggunakan API RajaOngkir</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
    <script src="../js/jquery-3.6.0.min.js"></script>
</head>

<body>
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
          <li><a href="view/chat.php">Chat</a></li>
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
    <div class="container">
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
                "key:9240d09aecd264c3966f4013d598c38b"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        ?>
        <label>Provinsi</label><br>
        <select name='provinsi' class="form-control" id='provinsi' required>";
            <option>Pilih Provinsi</option>
            <?php
            $get = json_decode($response, true);
            for ($i = 0; $i < count($get['rajaongkir']['results']); $i++) :
            ?>
                <option value="<?php echo $get['rajaongkir']['results'][$i]['province_id']; ?>"><?php echo $get['rajaongkir']['results'][$i]['province']; ?></option>
            <?php endfor; ?>
        </select><br>

        <label>Kabupaten</label><br>
        <select id="kabupaten" class="form-control" name="kabupaten" required>
            <!-- Data kabupaten akan diload menggunakan AJAX -->
        </select> <br>

        <label>Kurir</label><br>
        <select class="form-control" id="kurir" name="kurir">
            <option value="">Pilih Kurir</option>
            <option value="jne">JNE</option>
            <option value="tiki">TIKI</option>
            <option value="pos">POS INDONESIA</option>
        </select>

        <div id="tampil_ongkir"> </div>
        <input type="hidden" id="invoice" name="invoice" value="<?php echo $_GET['invoice'] ?>"><br>
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
            var invoice = $('#invoice').val();

            $.ajax({
                type: 'POST',
                url: 'tabel-ongkir.php',
                data: {
                    'kab_id': kab,
                    'kurir': kurir,
                    'invoice': invoice
                },
                success: function(data) {
                    //jika data berhasil didapatkan, tampilkan ke dalam element div tampil_ongkir
                    $("#tampil_ongkir").html(data);
                }
            });
        });
    </script>
    <?php include "../layout/footer.php" ?>
    <!-- </body>
</html> -->