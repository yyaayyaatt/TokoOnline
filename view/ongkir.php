<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mari Belajar Coding</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/skdslider.css" rel="stylesheet">
    <script src="../js/skdslider.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/move-top.js"></script>
    <script type="text/javascript" src="../js/easing.js"></script>
    <script src="../js/carousel.js"></script>
    <script src="../admin/dist/js/adminlte.js"></script>
    <!-- js -->
    <script src="../admin/plugins/jquery/jquery.min.js"></script>
    <script src="../admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/app.js"></script>
</head>

<body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Mari Belajar Coding</a>
            </div>

        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form class="form-horizontal" id="ongkir" method="POST">
                            <div class="form-group">
                                <label class="control-label col-sm-3">Kota Asal:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="kota_asal" name="kota_asal" required="">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Kota Tujuan</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="kota_tujuan" name="kota_tujuan" required="">
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Kurir</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="kurir" name="kurir" required="">
                                        <option value="jne">JNE</option>
                                        <option value="tiki">TIKI</option>
                                        <option value="pos">POS INDONESIA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Berat (Kg)</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="berat" name="berat" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-8">
                                    <button type="submit" class="btn btn-default">Cek</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7" id="response_ongkir">
            </div>
        </div>
    </div>
</body>

</html>