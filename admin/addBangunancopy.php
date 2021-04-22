<?php
session_start();

if (!isset($_SESSION["username"])) {
    echo "Anda harus login dulu <br><a href='index.php'>Klik disini</a>";
    exit;
}

$id_user = $_SESSION["id_user"];
$username = $_SESSION["username"];
$nama = $_SESSION["nama"];
$role = $_SESSION["role"];
$foto_user = $_SESSION["foto"];

?>
<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/form_wizard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Oct 2017 15:26:22 GMT -->

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Data Bangunan</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon_2.png">

</head>

<body>

    <div id="wrapper">

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                                <?php echo "<img alt='image' src='dokumen/$foto_user' class='img-circle' width='50px'/>"; ?>
                            </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear"> <span class="block m-t-xs"> <strong
                                            class="font-bold"><?php echo $nama; ?></strong>
                                    </span> <span class="text-muted text-xs block"><?php echo $role; ?> </span> </span>
                            </a>
                        </div>
                        <div class="logo-element">
                            <img src="img/favicon_2.png">
                        </div>
                    </li>
                    <!-- <li>
                        <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>

                    </li> -->
                    <li>
                        <a href='dashboard.php'><i class='fa fa-th'></i> <span class='nav-label'>Dashboards</span></a>

                    </li>
                    <li class="active">
                        <a href="bangunan.php"><i class="fa fa-building-o"></i> <span class="nav-label">Bangunan
                                Gedung</span></a>
                    </li>
                    <li>
                        <a href="opd.php"><i class="fa fa-database"></i> <span class="nav-label">OPD</span></a>
                    </li>
                    <li>
                        <a href="instansi.php"><i class="fa fa-institution"></i> <span
                                class="nav-label">Instansi</span></a>
                    </li>
                    <li>
                        <a href="fungsi.php"><i class="fa fa-diamond"></i> <span class="nav-label">Fungsi</span></a>
                    </li>
                    <?php
if ( $role == 'Super Admin' ) {
    ?>
                    <li>
                        <a href='pengguna.php'><i class='fa fa-user'></i> <span class='nav-label'>Pengguna</span></a>
                    </li>
                    <?php
}
?>
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i
                                class="fa fa-bars"></i> </a>

                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Dinas Pengerjaan Umum & Tata Ruang</span>
                        </li>

                        <li>
                            <a href="database/logout.php">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>
            <div class="row wrapper border-bottom page-heading">
                <div class="col-lg-12">
                    <h2><b>Data Bangunan/Gedung</b><a href="addBangunan.php"></h2>

                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5>Edit Data</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>

                                </div>
                            </div>
                            <?php
                            include 'database/config.php';
                            $id = $_GET['id_bangunan'];

                            // Fetech user data based on id
                            $result = mysqli_query($mysqli, "SELECT * FROM tb_bagunan WHERE id_bangunan='$id'");

                            while ($user_data = mysqli_fetch_array($result)) {
                                $id_bangunan = $user_data['id_bangunan'];
                                $nama = $user_data['nama'];
                                $alamat = $user_data['alamat'];
                                $kecamatan = $user_data['kecamatan'];
                                $kelurahan = $user_data['kelurahan'];
                                $kota = $user_data['kota'];
                                $provinsi = $user_data['provinsi'];
                                $luas = $user_data['luas'];
                                $jumlah_lantai = $user_data['jumlah_lantai'];
                                $ketinggian = $user_data['ketinggian'];
                                $didirikan = $user_data['didirikan'];
                                $selesai_konstuksi = $user_data['selesai_konstuksi'];
                                $imb = $user_data['imb'];
                                $slf = $user_data['slf'];
                                $id_pln = $user_data['id_pln'];
                                $id_pdam = $user_data['id_pdam'];
                                $kondisi = $user_data['kondisi'];
                                $koordinat = $user_data['koordinat'];
                                // $foto = $user_data['foto'];
                                $fungsi = $user_data['fungsi'];
                                $odp = $user_data['odp'];
                                $instruktur = $user_data['instruktur'];
                            }
                            ?>
                            <div class="ibox-content">
                                <form id="form" enctype="multipart/form-data" class="wizard-big"
                                    action="database/prosesaddBangunan.php" method="post" name="form1">
                                    <h1>Data Bangunan/Gedung</h1>
                                    <fieldset>
                                        <h2>Data Bangunan/Gedung</h2>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>No. ID Bangunan/Gedung</label>
                                                    <input id="id_bangunan" name="id_bangunan" type="text"
                                                        class="form-control required"
                                                        value="<?php echo $id_bangunan; ?>" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nama Bangunan/Gedung</label>
                                                    <input id="nama_bg" name="nama_bg" type="text"
                                                        value="<?php echo $nama; ?>" class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Alamat</label>
                                                    <input id="alamat_bg" name="alamat_bg" type="text"
                                                        value="<?php echo $alamat; ?>" class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Kecamatan</label>
                                                    <input id="kecamatan" name="kecamatan" type="text"
                                                        value="<?php echo $kecamatan; ?>" class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Kelurahan / Desa</label>
                                                    <input id="kelurahan" name="kelurahan" type="text"
                                                        value="<?php echo $kelurahan; ?>" class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Kabupaten / Kota</label>
                                                    <input id="kota" name="kota" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Provinsi</label>
                                                    <input id="prov" name="prov" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Luas Bangunan</label>
                                                    <input id="luas_bg" name="luas_bg" type="number"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Jumlah Lantai</label>
                                                    <input id="lantai" name="lantai" type="number"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Ketinggian Per Lantai (m)</label>
                                                    <input id="ketinggian_bg" name="ketinggian_bg" type="number"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Didirikan</label>
                                                    <input id="didirkan" name="didirkan" type="date"
                                                        class="form-control required">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Selesai Konstruksi</label>
                                                    <input id="konstruksi" name="konstruksi" type="date"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>No. Izin Mendirikan Bagunan (IMB)</label>
                                                    <input id="imb" name="imb" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>No. Sertifikat Layak Fungsi (SLF)</label>
                                                    <input id="slf" name="slf" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>No. ID Pelanggan PLN</label>
                                                    <input id="id_pln" name="id_pln" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>No. ID Pelanggan PDAM</label>
                                                    <input id="id_pdam" name="id_pdam" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Fungsi</label>
                                                    <select class="form-control required" name="fungsi">
                                                        <?php
                                                        include 'database/config.php';
                                                        $data = mysqli_query($mysqli, "select * from tb_fungsi");
                                                        while ($d = mysqli_fetch_array($data)) {
                                                        ?>
                                                        <option value="<?php echo $d['nama_fungsi']; ?>">
                                                            <?php echo $d['nama_fungsi']; ?>
                                                        </option>

                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Organisasi Perangkat Daerah (OPD)</label>
                                                    <select class="form-control required" name="opd">
                                                        <?php
                                                        include 'database/config.php';
                                                        $data2 = mysqli_query($mysqli, "select * from tb_opd");
                                                        while ($d2 = mysqli_fetch_array($data2)) {
                                                        ?>
                                                        <option value="<?php echo $d2['nama_opd']; ?>">
                                                            <?php echo $d2['nama_opd']; ?>
                                                        </option>

                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Instansti</label>
                                                    <select class="form-control required" name="instansi">
                                                        <?php
                                                        include 'database/config.php';
                                                        $data3 = mysqli_query($mysqli, "select * from tb_instansi");
                                                        while ($d3 = mysqli_fetch_array($data3)) {
                                                        ?>
                                                        <option value="<?php echo $d3['nama_instansi']; ?>">
                                                            <?php echo $d3['nama_instansi']; ?>
                                                        </option>

                                                        <?php
                                                        }
                                                        ?>
                                                    </select>

                                                </div>
                                                <div class="form-group">
                                                    <label>Kondisi Bangunan</label>
                                                    <input id="kondisi" name="kondisi" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Titik Koordinat Lokasi</label>
                                                    <input id="koordinat" name="koordinat" type="text"
                                                        class="form-control required">
                                                </div>

                                            </div>
                                        </div>
                                    </fieldset>

                                    <h1>Data Gambar</h1>
                                    <fieldset>
                                        <h2>Data Gambar Bangunan</h2>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>No. Bukti Kepemilikan Tanah</label>
                                                    <input id="bukti_tn" name="bukti_tn" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>No. Identitas Pemilik Tanah</label>
                                                    <input id="identitas_tn" name="identitas_tn" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Nama Pemilik Tanah</label>
                                                    <input id="pemilik_tn" name="pemilik_tn" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Jenis Kepemilikan Tanah</label>
                                                    <input id="jenis_tn" name="jenis_tn" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Alamat Tanah</label>
                                                    <input id="alamat_tn" name="alamat_tn" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Luas Tanah</label>
                                                    <input id="luas_tn" name="luas_tn" type="number"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Koofisien Dasar Bangunan (KDB)</label>
                                                    <input id="kdb" name="kdb" type="text"
                                                        class="form-control required">
                                                </div>
                                            </div>

                                        </div>
                                    </fieldset>



                                    <!-- 
                                    <h1>Finish</h1>
                                    <fieldset>
                                        <h2>Terms and Conditions</h2>
                                        <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required">
                                        <label for="acceptTerms">I agree with the Terms and Conditions.</label>
                                    </fieldset> -->
                                    <!-- <input type="submit" name="submit" value="Add"> -->
                                </form>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="footer">

            </div>

        </div>
    </div>



    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Steps -->
    <script src="js/plugins/steps/jquery.steps.min.js"></script>

    <!-- Jquery Validate -->
    <script src="js/plugins/validate/jquery.validate.min.js"></script>


    <script>
    $(document).ready(function() {
        $("#wizard").steps();
        $("#form").steps({
            bodyTag: "fieldset",
            onStepChanging: function(event, currentIndex, newIndex) {
                // Always allow going backward even if the current step contains invalid fields!
                if (currentIndex > newIndex) {
                    return true;
                }

                // Forbid suppressing "Warning" step if the user is to young
                if (newIndex === 3 && Number($("#age").val()) < 18) {
                    return false;
                }

                var form = $(this);

                // Clean up if user went backward before
                if (currentIndex < newIndex) {
                    // To remove error styles
                    $(".body:eq(" + newIndex + ") label.error", form).remove();
                    $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                }

                // Disable validation on fields that are disabled or hidden.
                form.validate().settings.ignore = ":disabled,:hidden";

                // Start validation; Prevent going forward if false
                return form.valid();
            },
            onStepChanged: function(event, currentIndex, priorIndex) {
                // Suppress (skip) "Warning" step if the user is old enough.
                if (currentIndex === 2 && Number($("#age").val()) >= 18) {
                    $(this).steps("next");
                }

                // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                if (currentIndex === 2 && priorIndex === 3) {
                    $(this).steps("previous");
                }
            },
            onFinishing: function(event, currentIndex) {
                var form = $(this);

                // Disable validation on fields that are disabled.
                // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                form.validate().settings.ignore = ":disabled";

                // Start validation; Prevent form submission if false
                return form.valid();
            },
            onFinished: function(event, currentIndex) {
                var form = $(this);

                // Submit form input
                form.submit();
            }
        }).validate({
            errorPlacement: function(error, element) {
                element.before(error);
            },
            rules: {
                confirm: {
                    equalTo: "#password"
                }
            }
        });
    });
    </script>

</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/form_wizard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Oct 2017 15:26:24 GMT -->

</html>