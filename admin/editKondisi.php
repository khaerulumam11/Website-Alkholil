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
    <link href="css/plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet">

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

    .profile-pic {
        position: relative;
        display: inline-block;
    }

    .profile-pic:hover .edit {
        display: block;
    }

    .edit {
        padding-top: 7px;
        padding-right: 7px;
        position: absolute;
        right: 0;
        top: 0;
        display: none;
    }

    .edit a {
        color: #000;
    }

    .containert {
        position: relative;
        width: 20%;
    }

    .image {
        opacity: 1;
        width: 10%;
        height: 10%;
        transition: .5s ease;
        backface-visibility: hidden;
    }

    .middle1 {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 22%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
    }

    .middle {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
    }

    .containert:hover .image {
        opacity: 0.3;
    }

    .containert:hover .middle {
        opacity: 1;
    }

    .text {
        color: black;
        font-size: 14px;
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
                    <li class='active'>
                        <a href='bangunan.php'><i class='fa fa-building-o'></i> <span class='nav-label'>Bangunan
                                Gedung</span></a>
                    </li>
                    <li>
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
                    <label style="font-size:32px;margin-top:3%; margin-left:1%"><b>Edit Data Kondisi </b></label>

                </div>
            </div>
            <div class='wrapper wrapper-content animated fadeInRight ecommerce'>

                <div class='row'>
                    <div class='col-lg-12'>
                        <div class='tabs-container'>
                            <ul class='nav nav-tabs'>
                                <li class='active'><a data-toggle='tab' href='#tab-1'> Data Kondisi</a></li>
                                <li class=''><a data-toggle='tab' href='#tab-2'> Gambar Kondisi</a></li>
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
                            $id = $_GET['id_kondisi'];

                            // Fetech user data based on id
                            $result6 = mysqli_query($mysqli, "SELECT * FROM tb_kondisi WHERE id_kondisi='$id'");

                            while ($data6 = mysqli_fetch_array($result6)) {
                                $id_kondisi = $data6['id_kondisi'];
                                $judul_kondisi = $data6['judul'];
                                $deskripsi_kondisi = $data6['deskripsi'];
                                // $dokumen_kondisi = $data6['foto_kondisi'];
                            }
                            ?>
                                                        <div class="ibox-content">
                                                            <?php
                                if (isset($_GET['alert'])) {
                                    if ($_GET['alert'] == "gagal_ukuran") {
                                ?>
                                                            <div class="alert alert-warning">
                                                                <strong>Warning!</strong> Ukuran File Terlalu Besar
                                                            </div>
                                                            <?php
                                    } elseif ($_GET['alert'] == "simpan") {
                                    ?>
                                                            <div class="alert alert-success">
                                                                <strong>Success!</strong> Gambar Berhasil Disimpan
                                                            </div>
                                                            <?php
                                    }
                                }
                                ?>
                                                            <form name="update_user" method="post"
                                                                action="database/updateKondisi.php"
                                                                class="form-horizontal" enctype="multipart/form-data">

                                                                <div class="row">
                                                                    <div class="form-group"><label
                                                                            class="col-sm-2 control-label">Judul
                                                                            :</label>
                                                                        <div class="col-sm-10"><input type="text"
                                                                                name="judul_kondisi"
                                                                                class="form-control"
                                                                                value="<?php echo $judul_kondisi; ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group"><label
                                                                            class="col-sm-2 control-label">Deskripsi
                                                                            :</label>
                                                                        <div class="col-sm-10"><textarea
                                                                                id="deskripsi_kondisi"
                                                                                name="deskripsi_kondisi"
                                                                                class="form-control"><?php echo $deskripsi_kondisi; ?></textarea>
                                                                        </div>
                                                                    </div>


                                                                    <div class="form-group"><label
                                                                            class="col-sm-2 control-label"></label>
                                                                        <div class="col-sm-10"> <input type="hidden"
                                                                                name="id"
                                                                                value=<?php echo $_GET['id_kondisi']; ?>>
                                                                            <button class="btn btn-sm btn-primary"
                                                                                type="Submit" name="Submit"
                                                                                value="update">Update</button>
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

                                <div id='tab-2' class='tab-pane'>
                                    <div class='panel-body'>

                                        <fieldset class='form-horizontal'>

                                            <div class='row'>
                                                <div class="col-lg-12">
                                                    <div class="ibox">


                                                        <div class="ibox-content">
                                                            <form action="database/updateGambarKondisi.php"
                                                                method="post" enctype="multipart/form-data">
                                                                <div>
                                                                    <div class="fallback">
                                                                        <input name="file[]" type="file"
                                                                            accept="image/*" multiple />

                                                                    </div>
                                                                    <div>
                                                                        <div class="col-sm-1"
                                                                            style="margin-top:3%;margin-left:-1%">
                                                                            <input type="hidden" name="id"
                                                                                value=<?php echo $_GET['id_kondisi']; ?>>
                                                                            <button class="btn btn-sm btn-primary"
                                                                                style="width:250%" type="submit"
                                                                                name="update">Tambah Dokumen</button>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                        </div>
                                                        </form>

                                                    </div>
                                                    <?php
                                                     $result = mysqli_query($mysqli, "SELECT * FROM gambar_kondisi WHERE id_kondisi='$id'");

                                                 while ($data = mysqli_fetch_array($result)) {
                                $dokumen = $data['gbr_kon'];
                                $id_dokumen = $data['id_gambarkondisi'];
                                $ext = pathinfo($dokumen, PATHINFO_EXTENSION);
                                $extension='';
                                if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg'){
                                    ?>
                                                    <div class=" profile-pic containert lightBoxGallery"
                                                        style="margin-top:2%">
                                                        <img src="dokumen/fotoKondisi/<?php echo $dokumen;?>"
                                                            alt="Avatar" class="image" id="myImg" style="width:100%">
                                                        <div class="middle">
                                                            <a href="dokumen/fotoKondisi/<?php echo $dokumen;?>"
                                                                data-gallery="">
                                                                <i id="myImg" data-feather="eye"></i></a>
                                                            <a
                                                                href="database/delFotoBangunan.php?id=<?php echo $id_dokumen ?>"><i
                                                                    data-feather="trash" style="color:red"></i></a>
                                                            <div class="text"><?php echo $dokumen?></div>
                                                        </div>

                                                    </div>

                                                    <?php    
                                } else {
                                if ($ext == 'pdf'){
                                    $extension = 'fa fa-file-pdf-o';
                                } else if ($ext == 'doc' || $ext == 'docx'){
                                     $extension = 'fa fa-file-word-o';
                                } else {
                                    $extension = 'fa fa-file-o';
                                }
                            
                                                    ?>
                                                    <div class=" profile-pic containert">
                                                        <img src="image/icon/<?php echo $ext;?>.svg" alt="Avatar"
                                                            class="image" style="width:100%">
                                                        <div class="middle1">
                                                            <i data-feather="eye" data-target=""></i>
                                                            <i data-feather="trash"></i>
                                                            <div class="text"><?php echo $dokumen?></div>
                                                        </div>
                                                    </div>

                                                    <?php } } ?>


                                                </div>
                                            </div>
                                        </fieldset>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div id="blueimp-gallery" class="blueimp-gallery">
                <div class="slides"></div>
                <h3 class="title"></h3>
                <a class="prev">‹</a>
                <a class="next">›</a>
                <a class="close">×</a>
                <a class="play-pause"></a>
                <ol class="indicator"></ol>
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
    <script src="js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>

    <script>
    feather.replace()
    </script>

    <!-- Page-Level Scripts -->

    <script>
    Dropzone.options.dropzoneForm = {

        uploadMultiple: true, // The name that will be used to transfer the file
        // MB
        dictRemoveFile: "Remove file",
        addRemoveLinks: true,
        dictDefaultMessage: "<strong>Drop files here or click to upload. </strong></br> Extension : .pdf, .doc"
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