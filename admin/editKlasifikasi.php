<?php
session_start();

if ( !isset( $_SESSION['username'] ) ) {
    
    header( 'Location:login.php' );exit;
}

$id_user = $_SESSION['id_user'];
$username = $_SESSION['username'];
$nama = $_SESSION['nama'];
$role = $_SESSION['role'];
$foto_user = $_SESSION['foto'];

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>

    <title>Bangunan</title>

    <link href='css/bootstrap.min.css' rel='stylesheet'>
    <link href='font-awesome/css/font-awesome.css' rel='stylesheet'>

    <link href="css/plugins/dropzone/dropzone.css" rel="stylesheet">

    <link href='css/plugins/dataTables/datatables.min.css' rel='stylesheet'>
    <link href='css/plugins/slick/slick.css' rel='stylesheet'>
    <link href='css/plugins/slick/slick-theme.css' rel='stylesheet'>

    <link href='css/animate.css' rel='stylesheet'>
    <link href='css/style.css' rel='stylesheet'>
    <link rel='shortcut icon' type='image/x-icon' href='img/favicon_2.png'>

    <style>
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        float: none;
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
    }

    .dropdown-content a:hover {
        background-color: #ddd;
    }

    .show {
        display: block;
    }
    </style>

</head>

<body>

    <div id='wrapper'>

        <nav class='navbar-default navbar-static-side' role='navigation'>
            <div class='sidebar-collapse'>
                <ul class='nav metismenu' id='side-menu'>
                    <li class='nav-header'>
                        <div class='dropdown profile-element'> <span>
                                <?php echo "<img alt='image' src='dokumen/$foto_user' class='img-circle' width='50px'/>";
?>
                            </span>
                            <a data-toggle='dropdown' class='dropdown-toggle' href='#'>
                                <span class='clear'> <span class='block m-t-xs'> <strong class='font-bold'><?php echo $nama;
?></strong>
                                    </span> <span class='text-muted text-xs block'><?php echo $role;
?> </span> </span>
                            </a>

                        </div>
                        <div class='logo-element'>
                            <img src='img/favicon_2.png'>
                        </div>
                    </li>


                    <li>
                        <a href='dashboard.php'><i class='fa fa-th'></i> <span class='nav-label'>Dashboards</span></a>

                    </li>
                    <li>
                        <a href='bangunan.php'><i class='fa fa-building-o'></i> <span class='nav-label'>Bangunan
                                Gedung</span></a>
                    </li>
                    <li class='active'>
                        <a href='opd.php'><i class='fa fa-database'></i> <span class='nav-label'>OPD</span></a>
                    </li>
                    <li>
                        <a href='instansi.php'><i class='fa fa-institution'></i> <span
                                class='nav-label'>Instansi</span></a>
                    </li>
                    <li>
                        <a href='fungsi.php'><i class='fa fa-diamond'></i> <span class='nav-label'>Fungsi</span></a>
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

        <div id='page-wrapper' class='gray-bg'>
            <div class='row border-bottom'>
                <nav class='navbar navbar-static-top' role='navigation' style='margin-bottom: 0'>
                    <div class='navbar-header'>
                        <a class='navbar-minimalize minimalize-styl-2 btn btn-primary ' href='#'><i
                                class='fa fa-bars'></i> </a>

                    </div>
                    <ul class='nav navbar-top-links navbar-right'>
                        <li>
                            <span class='m-r-sm text-muted welcome-message'>Dinas Pengerjaan Umum & Penataan
                                Ruang</span>
                        </li>

                        <li>
                            <a href='database/logout.php'>
                                <i class='fa fa-sign-out'></i> Log out
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>
            <div class='row wrapper border-bottom page-heading'>
                <div class='col-lg-12'>

                    <a href="javascript:history.back()"> <i data-feather="arrow-left" style='color:#1ab394'></i></a>
                    <label style="font-size:32px;margin-top:3%; margin-left:1%"><b>Edit Klasifikasi </b></label>

                </div>
            </div>
            <div class='wrapper wrapper-content animated fadeInRight ecommerce'>

                <div class='row'>
                    <div class='col-lg-12'>
                        <div class='tabs-container'>
                            <ul class='nav nav-tabs'>
                                <li class='active'><a data-toggle='tab' href='#tab-1'> Data Klasifikasi</a></li>
                            </ul>

                            <div class='tab-content'>


                                <div id='tab-1' class='tab-pane active'>
                                    <div class='panel-body'>

                                        <fieldset class='form-horizontal'>

                                            <div class='row'>
                                                <div class="col-lg-12">
                                                    <div class="ibox">

                                                        <?php
                            include 'database/config.php';
                            $id = $_GET['id_bangunan'];

                            // Fetech user data based on id
                           $result3 = mysqli_query($mysqli, "SELECT * FROM tb_klasifikasi WHERE id_bangunan='$id'");

                            while ($data3 = mysqli_fetch_array($result3)) {
                                $kompleksitas = $data3['kompleksitas'];
                                $permanensi = $data3['permanensi'];
                                $resiko_kebakaran = $data3['resiko_kebakaran'];
                                $zonasi_gempa = $data3['zonasi_gempa'];
                                $lokasi = $data3['lokasi'];
                                $ketinggian_klasi = $data3['ketinggian'];
                                $kepemilikan_klasi = $data3['kepemilikan'];
                            }
                            ?>
                                                        <form name="update_user" method="post"
                                                            action="database/updateKlasifikasi.php"
                                                            class="form-horizontal" enctype="multipart/form-data">

                                                            <div class="row">
                                                                <div class="form-group"><label
                                                                        class="col-sm-2 control-label">Tingkat
                                                                        Kompleksitas :</label>
                                                                    <div class="col-sm-10"><select
                                                                            class="form-control required"
                                                                            name="kompleksitas">
                                                                            <option
                                                                                value="<?php echo $kompleksitas; ?>">
                                                                                <?php echo $kompleksitas; ?></option>
                                                                            <option value="Sederhana">Sederhana</option>
                                                                            <option value="Tidak Sederhana">Tidak
                                                                                Sederhana</option>
                                                                            <option value="Khusus">Khusus</option>
                                                                        </select></div>

                                                                </div>
                                                                <div class="form-group"><label
                                                                        class="col-sm-2 control-label">Tingkat
                                                                        Permanensi :</label>
                                                                    <div class="col-sm-10"> <select
                                                                            class="form-control required"
                                                                            name="permanensi">
                                                                            <option value="<?php echo $permanensi; ?>">
                                                                                <?php echo $permanensi; ?></option>
                                                                            <option value="Permanen">Permanen</option>
                                                                            <option value="Semi Permanen">Semi Permanen
                                                                            </option>
                                                                            <option value="Darurat / Sementara">Darurat
                                                                                / Sementara</option>
                                                                        </select></div>

                                                                </div>
                                                                <div class="form-group"><label
                                                                        class="col-sm-2 control-label">Tingkat Resiko
                                                                        Kebakaran
                                                                        :</label>
                                                                    <div class="col-sm-10"><select
                                                                            class="form-control required"
                                                                            name="resiko_kebakaran">
                                                                            <option
                                                                                value="<?php echo $resiko_kebakaran; ?>">
                                                                                <?php echo $resiko_kebakaran; ?>
                                                                            </option>
                                                                            <option value="Permanen">Resiko Kebakaran
                                                                                Tinggi</option>
                                                                            <option value="Semi Permanen">Resiko
                                                                                Kebakaran Sedang</option>
                                                                            <option value="Darurat / Sementara">Resiko
                                                                                Kebakaran Rendah
                                                                            </option>
                                                                        </select></div>

                                                                </div>
                                                                <div class="form-group"><label
                                                                        class="col-sm-2 control-label">Zona Gempa
                                                                        :</label>
                                                                    <div class="col-sm-10"><select
                                                                            class="form-control required"
                                                                            name="zonasi_gempa">
                                                                            <option
                                                                                value="<?php echo $zonasi_gempa; ?>">
                                                                                <?php echo $zonasi_gempa; ?></option>
                                                                            <option value="Zona 1">Zona 1</option>
                                                                            <option value="Zona 2">Zona 2</option>
                                                                            <option value="Zona 3">Zona 3</option>
                                                                            <option value="Zona 4">Zona 4</option>
                                                                            <option value="Zona 5">Zona 5</option>
                                                                            <option value="Zona 6">Zona 6</option>
                                                                        </select></div>

                                                                </div>
                                                                <div class="form-group"><label
                                                                        class="col-sm-2 control-label">Lokasi
                                                                        :</label>
                                                                    <div class="col-sm-10"><select
                                                                            class="form-control required" name="lokasi">
                                                                            <option value="<?php echo $lokasi; ?>">
                                                                                <?php echo $lokasi; ?></option>
                                                                            <option value="Lokasi Padat">Lokasi Padat
                                                                            </option>
                                                                            <option value="Lokasi Sedang">Lokasi Sedang
                                                                            </option>
                                                                            <option value="Lokasi Renggang">Lokasi
                                                                                Renggang</option>
                                                                        </select></div>

                                                                </div>
                                                                <div class="form-group"><label
                                                                        class="col-sm-2 control-label">Ketinggian
                                                                        :</label>
                                                                    <div class="col-sm-10"><select
                                                                            class="form-control required"
                                                                            name="ketinggian_klasi">
                                                                            <option
                                                                                value="<?php echo $ketinggian_klasi; ?>">
                                                                                <?php echo $ketinggian_klasi; ?>
                                                                            </option>
                                                                            <option value="Bertingkat Tinggi">Bertingkat
                                                                                Tinggi</option>
                                                                            <option value="Bertingkat Tinggi">Bertingkat
                                                                                Sedang</option>
                                                                            <option value="Bertingkat Tinggi">Bertingkat
                                                                                Rendah</option>
                                                                        </select></div>

                                                                </div>
                                                                <div class="form-group"><label
                                                                        class="col-sm-2 control-label">Kepemilikan
                                                                        :</label>
                                                                    <div class="col-sm-10"><select
                                                                            class="form-control required"
                                                                            name="kepemilikan_klasi">
                                                                            <option
                                                                                value="<?php echo $kepemilikan_klasi; ?>">
                                                                                <?php echo $kepemilikan_klasi; ?>
                                                                            </option>
                                                                            <option value="Milik Negara">Milik Negara
                                                                            </option>
                                                                            <option value="Milik Badan Usaha">Milik
                                                                                Badan Usaha</option>
                                                                            <option value="Milik Perorangan">Milik
                                                                                Perorangan</option>
                                                                        </select></div>

                                                                </div>


                                                                <div class="form-group"><label
                                                                        class="col-sm-2 control-label"></label>
                                                                    <div class="col-sm-10"> <input type="hidden"
                                                                            name="id"
                                                                            value=<?php echo $_GET['id_bangunan']; ?>>
                                                                        <button class="btn btn-sm btn-primary"
                                                                            type="submit" name="update">Update</button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </form>

                                                        <!-- <form action="#" class="dropzone" id="dropzoneForm">
                                                                <div class="fallback">
                                                                    <input name="file" type="file" />
                                                                </div>
                                                            </form> -->

                                                    </div>
                                        </fieldset>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class='footer'>

            </div>

        </div>
    </div>

    <!-- Mainly scripts -->
    <script src='js/jquery-3.1.1.min.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <script src='js/plugins/metisMenu/jquery.metisMenu.js'></script>
    <script src='js/plugins/slimscroll/jquery.slimscroll.min.js'></script>

    <script src='js/plugins/dataTables/datatables.min.js'></script>

    <!-- DROPZONE -->
    <script src="js/plugins/dropzone/dropzone.js"></script>

    <!-- Custom and plugin javascript -->
    <script src='js/inspinia.js'></script>
    <script src='js/plugins/pace/pace.min.js'></script>
    <script src='js/plugins/slick/slick.min.js'></script>

    <script src="https://unpkg.com/feather-icons"></script>

    <script>
    feather.replace()
    </script>

    <!-- Page-Level Scripts -->

    <script>
    Dropzone.options.dropzoneForm = {
        paramName: "file", // The name that will be used to transfer the file
        maxFilesize: 2, // MB
        dictRemoveFile: "Remove file",
        addRemoveLinks: true,
        dictDefaultMessage: "<strong>Drop files here or click to upload. </strong></br> (This is just a demo dropzone. Selected files are not actually uploaded.)"
    };

    $(document).ready(function() {

        var editor_one = CodeMirror.fromTextArea(document.getElementById("code1"), {
            lineNumbers: true,
            matchBrackets: true
        });

        var editor_two = CodeMirror.fromTextArea(document.getElementById("code2"), {
            lineNumbers: true,
            matchBrackets: true
        });

        var editor_two = CodeMirror.fromTextArea(document.getElementById("code3"), {
            lineNumbers: true,
            matchBrackets: true
        });

    });
    </script>
    <script>
    /* When the user clicks on the button,
            toggle between hiding and showing the dropdown content */

    function myFunction() {
        document.getElementById('myDropdown').classList.toggle('show');
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(e) {
        if (!e.target.matches('.dropbtn')) {
            var myDropdown = document.getElementById('myDropdown');
            if (myDropdown.classList.contains('show')) {
                myDropdown.classList.remove('show');
            }
        }
    }
    </script>
    <script>
    $(document).ready(function() {
        $('.dataTables-example').DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: []

        });
        $('.product-images').slick({
            dots: true
        });

    });
    </script>

</body>

</html>