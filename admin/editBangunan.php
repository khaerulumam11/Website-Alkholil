<?php
session_start();

if ( !isset( $_SESSION['username'] ) ) {

    header( 'Location:login.php' );
    exit;
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

    <link href='css/plugins/dropzone/dropzone.css' rel='stylesheet'>

    <link href='css/plugins/dataTables/datatables.min.css' rel='stylesheet'>
    <link href='css/plugins/slick/slick.css' rel='stylesheet'>
    <link href='css/plugins/slick/slick-theme.css' rel='stylesheet'>
    <script src='https://unpkg.com/feather-icons'></script>

    <link href='css/animate.css' rel='stylesheet'>
    <link href='css/style.css' rel='stylesheet'>
    <link href='css/plugins/blueimp/css/blueimp-gallery.min.css' rel='stylesheet'>

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

    #myImg {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    #myImg:hover {
        opacity: 0.7;
    }

    /* The Modal ( background ) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.9);
        /* Black w/ opacity */
    }

    /* Modal Content ( image ) */
    .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
    }

    /* Caption of Modal Image */
    #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }

    /* Add Animation */
    .modal-content,
    #caption {
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
    }

    @-webkit-keyframes zoom {
        from {
            -webkit-transform: scale(0)
        }

        to {
            -webkit-transform: scale(1)
        }
    }

    @keyframes zoom {
        from {
            transform: scale(0)
        }

        to {
            transform: scale(1)
        }
    }

    /* The Close Button */
    .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px) {
        .modal-content {
            width: 100%;
        }
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

                    <a href='javascript:history.back()'> <i data-feather='arrow-left' style='color:#1ab394'></i></a>
                    <label style='font-size:32px;margin-top:3%; margin-left:1%'><b>Edit Data Bangunan </b></label>

                </div>

            </div>
            <div class='wrapper wrapper-content animated fadeInRight ecommerce'>

                <div class='row'>
                    <div class='col-lg-12'>
                        <div class='tabs-container'>
                            <ul class='nav nav-tabs'>
                                <li class='active'><a data-toggle='tab' href='#tab-1'> Data Bangunan</a></li>
                                <li class=''><a data-toggle='tab' href='#tab-2'> Gambar Bangunan</a></li>
                            </ul>

                            <div class='tab-content'>

                                <div id='tab-1' class='tab-pane active'>
                                    <div class='panel-body'>

                                        <fieldset class='form-horizontal'>

                                            <div class='row'>
                                                <div class='col-lg-12'>
                                                    <div class='ibox'>

                                                        <?php
include 'database/config.php';
$id = $_GET['id_bangunan'];

// Fetech user data based on id
$result = mysqli_query( $mysqli, "SELECT * FROM tb_bagunan WHERE id_bangunan='$id'" );

while ( $user_data = mysqli_fetch_array( $result ) ) {
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
                                                        <div class='ibox-content'>
                                                            <form name='update_user' method='post'
                                                                action='database/updateBangunan.php'
                                                                class='form-horizontal' enctype='multipart/form-data'>

                                                                <div class='row'>
                                                                    <div class=''></div>
                                                                    <div class='col-lg-6'>
                                                                        <div class='form-group'>
                                                                            <label>No. ID Bangunan/Gedung</label>
                                                                            <input id='id_bangunan' name='id_bangunan'
                                                                                type='text'
                                                                                value="<?php echo $id_bangunan; ?>"
                                                                                class='form-control required ' disabled>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <label>Nama Bangunan/Gedung</label>
                                                                            <input id='nama_bg' name='nama_bg'
                                                                                type='text' value="<?php echo $nama; ?>"
                                                                                class='form-control required'>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <label>Alamat</label>
                                                                            <input id='alamat_bg' name='alamat_bg'
                                                                                type='text'
                                                                                value="<?php echo $alamat; ?>"
                                                                                class='form-control required'>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <label>Kecamatan</label>
                                                                            <input id='kecamatan' name='kecamatan'
                                                                                type='text'
                                                                                value="<?php echo $kecamatan; ?>"
                                                                                class='form-control required'>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <label>Kelurahan / Desa</label>
                                                                            <input id='kelurahan' name='kelurahan'
                                                                                type='text'
                                                                                value="<?php echo $kelurahan; ?>"
                                                                                class='form-control required'>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <label>Kabupaten / Kota</label>
                                                                            <input id='kota' name='kota' type='text'
                                                                                value="<?php echo $kota; ?>"
                                                                                class='form-control required'>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <label>Provinsi</label>
                                                                            <input id='prov' name='prov' type='text'
                                                                                value="<?php echo $provinsi; ?>"
                                                                                class='form-control required'>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <label>Luas Bangunan</label>
                                                                            <input id='luas_bg' name='luas_bg'
                                                                                type='text' value="<?php echo $luas; ?>"
                                                                                class='form-control required'>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <label>Jumlah Lantai</label>
                                                                            <input id='lantai' name='lantai' type='text'
                                                                                value="<?php echo $jumlah_lantai; ?>"
                                                                                class='form-control required'>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <label>Ketinggian Per Lantai ( m )</label>
                                                                            <input id='ketinggian_bg'
                                                                                name='ketinggian_bg' type='text'
                                                                                value="<?php echo $ketinggian; ?>"
                                                                                class='form-control required'>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <label>Didirikan</label>
                                                                            <input id='didirkan' name='didirkan'
                                                                                type='date'
                                                                                value="<?php echo $didirikan; ?>"
                                                                                class='form-control required'>
                                                                        </div>
                                                                    </div>
                                                                    <div class='col-lg-1'></div>
                                                                    <div class='col-lg-5'>
                                                                        <div class='form-group'>
                                                                            <label>Selesai Konstruksi</label>
                                                                            <input id='konstruksi' name='konstruksi'
                                                                                type='date'
                                                                                value="<?php echo $selesai_konstuksi; ?>"
                                                                                class='form-control required'>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <label>No. Izin Mendirikan Bagunan
                                                                                ( IMB )</label>
                                                                            <input id='imb' name='imb' type='text'
                                                                                value="<?php echo $imb; ?>"
                                                                                class='form-control required'>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <label>No. Sertifikat Layak Fungsi
                                                                                ( SLF )</label>
                                                                            <input id='slf' name='slf' type='text'
                                                                                value="<?php echo $slf; ?>"
                                                                                class='form-control required'>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <label>No. ID Pelanggan PLN</label>
                                                                            <input id='id_pln' name='id_pln' type='text'
                                                                                value="<?php echo $id_pln; ?>"
                                                                                class='form-control required'>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <label>No. ID Pelanggan PDAM</label>
                                                                            <input id='id_pdam' name='id_pdam'
                                                                                type='text'
                                                                                value="<?php echo $id_pdam; ?>"
                                                                                class='form-control required'>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <label>Fungsi</label>
                                                                            <select class='form-control required'
                                                                                name='fungsi'>
                                                                                <option value="<?php echo $fungsi; ?>">
                                                                                    <?php echo $fungsi;
?>
                                                                                </option>
                                                                                <?php
include 'database/config.php';
$data = mysqli_query( $mysqli, 'select * from tb_fungsi' );
while ( $d = mysqli_fetch_array( $data ) ) {
    ?>
                                                                                <option
                                                                                    value="<?php echo $d['nama_fungsi']; ?>">
                                                                                    <?php echo $d['nama_fungsi'];
    ?>
                                                                                </option>

                                                                                <?php
}
?>
                                                                            </select>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <label>Organisasi Perangkat Daerah
                                                                                ( OPD )</label>
                                                                            <select class='form-control required'
                                                                                name='opd'>
                                                                                <option value="<?php echo $odp; ?>">
                                                                                    <?php echo $odp;
?>
                                                                                </option>
                                                                                <?php
include 'database/config.php';
$data2 = mysqli_query( $mysqli, 'select * from tb_opd' );
while ( $d2 = mysqli_fetch_array( $data2 ) ) {
    ?>
                                                                                <option
                                                                                    value="<?php echo $d2['nama_opd']; ?>">
                                                                                    <?php echo $d2['nama_opd'];
    ?>
                                                                                </option>

                                                                                <?php
}
?>
                                                                            </select>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <label>Instansti</label>
                                                                            <select class='form-control required'
                                                                                name='instansi'>
                                                                                <option
                                                                                    value="<?php echo $instruktur; ?>">
                                                                                    <?php echo $instruktur;
?>
                                                                                </option>
                                                                                <?php
include 'database/config.php';
$data3 = mysqli_query( $mysqli, 'select * from tb_instansi' );
while ( $d3 = mysqli_fetch_array( $data3 ) ) {
    ?>
                                                                                <option
                                                                                    value="<?php echo $d3['nama_instansi']; ?>">
                                                                                    <?php echo $d3['nama_instansi'];
    ?>
                                                                                </option>

                                                                                <?php
}
?>
                                                                            </select>

                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <label>Kondisi Bangunan</label>
                                                                            <input id='kondisi' name='kondisi'
                                                                                type='text'
                                                                                value="<?php echo $kondisi; ?>"
                                                                                class='form-control required'>
                                                                        </div>
                                                                        <div class='form-group'>
                                                                            <label>Titik Koordinat Lokasi</label>
                                                                            <input id='koordinat' name='koordinat'
                                                                                type='text'
                                                                                value="<?php echo $koordinat; ?>"
                                                                                class='form-control required'>
                                                                        </div>

                                                                        <div class='form-group'>

                                                                            <input type='hidden' name='id' value=<?php echo $_GET['id_bangunan'];
?>>
                                                                            <button class='btn btn-sm btn-primary'
                                                                                type='Submit' name='Submit'
                                                                                value='update'>Update</button>

                                                                        </div>
                                                                    </div>

                                                            </form>

                                                            <!-- <form action = '#' class = 'dropzone' id = 'dropzoneForm'>
<div class = 'fallback'>
<input name = 'file' type = 'file' />
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
                                                <div class='col-lg-12'>
                                                    <div class='ibox'>

                                                        <div class='ibox-content'>
                                                            <form action='database/updateFotoBangunan.php' method='post'
                                                                enctype='multipart/form-data'>
                                                                <div>
                                                                    <div class='fallback'>
                                                                        <input name='file[]' type='file'
                                                                            accept='image/*' multiple required />

                                                                    </div>
                                                                    <div>
                                                                        <div class='col-sm-1'
                                                                            style='margin-top:3%;margin-left:-1%'>
                                                                            <input type='hidden' name='id' value=<?php echo $_GET['id_bangunan'];
?>>
                                                                            <button class='btn btn-sm btn-primary'
                                                                                style='width:250%' type='submit'
                                                                                name='update'>Tambah Dokumen</button>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                        </div>
                                                        </form>

                                                    </div>
                                                    <?php
$result = mysqli_query( $mysqli, "SELECT * FROM gambar_bangunan WHERE id_bangunan='$id'" );

while ( $data = mysqli_fetch_array( $result ) ) {
    $dokumen = $data['gambar'];
    $id_dokumen = $data['id_gambar'];
    $ext = pathinfo( $dokumen, PATHINFO_EXTENSION );
    $extension = '';
    if ( $ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' ) {
        ?>
                                                    <div class=' profile-pic containert lightBoxGallery'
                                                        style='margin-top:2%'>
                                                        <img src="dokumen/fotoBangunan/<?php echo $dokumen;?>"
                                                            alt='Avatar' class='image' id='myImg' style='width:100%'>
                                                        <div class='middle'>
                                                            <a href="dokumen/fotoBangunan/<?php echo $dokumen;?>"
                                                                data-gallery=''><i id='myImg'
                                                                    data-feather='eye'></i></a>
                                                            <a
                                                                href="database/delFotoBangunan.php?id=<?php echo $id_dokumen ?>"><i
                                                                    data-feather='trash' style='color:red'></i></a>
                                                            <div class='text'><?php echo $dokumen?></div>
                                                        </div>

                                                    </div>

                                                    <?php
    } else {
        if ( $ext == 'pdf' ) {
            $extension = 'fa fa-file-pdf-o';
        } else if ( $ext == 'doc' || $ext == 'docx' ) {
            $extension = 'fa fa-file-word-o';
        } else {
            $extension = 'fa fa-file-o';
        }

        ?>
                                                    <div class=' profile-pic containert'>
                                                        <img src="image/icon/<?php echo $ext;?>.svg" alt='Avatar'
                                                            class='image' style='width:100%'>
                                                        <div class='middle1'>
                                                            <i data-feather='eye' data-target=''></i>
                                                            <i data-feather='trash' style='color:red'></i>
                                                            <div class='text'><?php echo $dokumen?></div>
                                                        </div>
                                                    </div>

                                                    <?php }
    }
    ?>

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
            <div id='blueimp-gallery' class='blueimp-gallery'>
                <div class='slides'></div>
                <h3 class='title'></h3>
                <a class='prev'>‹</a>
                <a class='next'>›</a>
                <a class='close'>×</a>
                <a class='play-pause'></a>
                <ol class='indicator'></ol>
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

    <!-- Custom and plugin javascript -->
    <script src='js/inspinia.js'></script>
    <script src='js/plugins/pace/pace.min.js'></script>
    <script src='js/plugins/slick/slick.min.js'></script>

    <!-- blueimp gallery -->
    <script src='js/plugins/blueimp/jquery.blueimp-gallery.min.js'></script>
    <!-- Page-Level Scripts -->

    <script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the image and insert it inside the modal - use its 'alt' text as a caption
    var img = document.getElementById('myImg');
    var show = document.getElementById('show');
    var modalImg = document.getElementById('img01');
    var captionText = document.getElementById('caption');
    img.onclick = function() {
        modal.style.display = 'block';
        modalImg.src = img.src;
        captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName('close')[0];

    // When the user clicks on <span> ( x ), close the modal
    span.onclick = function() {
        modal.style.display = 'none';
    }
    </script>
    <script>
    feather.replace()
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

</body>

</html>