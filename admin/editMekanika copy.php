<?php
session_start();

if ( !isset( $_SESSION['username'] ) ) {
    echo "Anda harus login dulu <br><a href='index.php'>Klik disini</a>";
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
                            <span class='m-r-sm text-muted welcome-message'>Dinas Pengerjaan Umum & Tata Ruang</span>
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
                    <h2><b>Edit Data Mekanikal, Elektrikal & Utilitas </b></h2>

                </div>
                <div class='col-lg-2'>

                </div>
            </div>
            <div class='wrapper wrapper-content animated fadeInRight ecommerce'>

                <div class='row'>
                    <div class='col-lg-12'>
                        <div class='tabs-container'>
                            <ul class='nav nav-tabs'>
                                <li class='active'><a data-toggle='tab' href='#tab-1'> Data Mekanikal</a></li>
                                <li class=''><a data-toggle='tab' href='#tab-2'> Dokumen Mekanikal</a></li>
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
                           $result7 = mysqli_query( $mysqli, "SELECT * FROM tb_mekanikal WHERE id_bangunan='$id'" );

while ( $data7 = mysqli_fetch_array( $result7 ) ) {
    $id_mekanik = $data7['id_mekanik'];
    $sumber_listrik = $data7['sumber_listrik'];
    $daya_listrik = $data7['daya_listrik'];
    $sumber_air = $data7['sumber_air'];
    $penangkal_petir = $data7['penangkal_petir'];
    $petanahan = $data7['pentanahan'];
    $air_bersih = $data7['air_bersih'];
    $air_kotor = $data7['air_kotor'];
    $saluran_keliling = $data7['saluran_keliling'];
    $saluran_ling = $data7['saluran_ling'];
    $apar = $data7['apar'];
    $splinker = $data7['splinker'];
    $hyndrant = $data7['hyndrant'];
    $smoke_detector = $data7['smoke_detector'];
    $tangga_darurat = $data7['tangga_darurat'];
    $elevator = $data7['elevator'];
    $escalator = $data7['escalator'];
    $ac = $data7['ac'];
    $exhaust = $data7['exhaust'];
    $cctv = $data7['cctv'];
    $aparat = $data7['aparat'];
    $pintu_darurat = $data7['pintu_darurat'];
    $rambu_evakuasi = $data7['rambu_evakuasi'];
    $titik_kumpul = $data7['titik_kumpul'];
    $tlp = $data7['tlp'];
    $wifi = $data7['wifi'];
    $faximile = $data7['faximile'];
    $tv = $data7['tv'];
    $ventilasi = $data7['ventilasi'];
    $suara = $data7['suara'];
    $parkir_dis = $data7['parkir_dis'];
    $lajur_dis = $data7['lajur_dis'];
    $ramp_dalam = $data7['ramp_dalam'];
    $ramp_luar = $data7['ramp_luar'];
    $hand_dalam = $data7['hand_dalam'];
    $hand_luar = $data7['hand_luar'];
    $toilet_dis = $data7['toilet_dis'];
    $kursi_roda = $data7['kursi_roda'];

}
                            ?>
                                                        <div class="ibox-content">
                                                            <form name="update_user" method="post"
                                                                action="database/updateMekanikal.php" class="wizard-big"
                                                                enctype="multipart/form-data">

                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Sumber Listrikk</label></label>
                                                                            <input id="sumber_listrik"
                                                                                name="sumber_listrik" type="text"
                                                                                value="<?php echo $sumber_listrik; ?>"
                                                                                class="form-control required">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Sumber Air</label>
                                                                            <input id="sumber_air" name="sumber_air"
                                                                                type="text"
                                                                                value="<?php echo $sumber_air; ?>"
                                                                                class="form-control required">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Grounding/Pentanahan</label>
                                                                            <input id="pentanahan" name="pentanahan"
                                                                                type="text"
                                                                                value="<?php echo $petanahan; ?>"
                                                                                class="form-control required">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Apar</label>
                                                                            <input id="apar" name="apar" type="text"
                                                                                value="<?php echo $apar; ?>"
                                                                                class="form-control required">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Sistem Splinkler</label>
                                                                            <input id="splinkler" name="splinkler"
                                                                                type="text"
                                                                                value="<?php echo $splinker; ?>"
                                                                                class="form-control required">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Sistem Hyndrant</label>
                                                                            <input id="hyndrant" name="hyndrant"
                                                                                type="text"
                                                                                value="<?php echo $hyndrant; ?>"
                                                                                class="form-control required">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Smoke Detector</label>
                                                                            <input id="smoke_detector"
                                                                                name="smoke_detector" type="text"
                                                                                value="<?php echo $smoke_detector; ?>"
                                                                                class="form-control required">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Tangga Darurat</label>
                                                                            <input id="tangga_darurat"
                                                                                name="tangga_darurat" type="text"
                                                                                value="<?php echo $tangga_darurat; ?>"
                                                                                class="form-control required">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Ventilasi</label>
                                                                            <input id="ventilasi" name="ventilasi"
                                                                                type="text"
                                                                                value="<?php echo $ventilasi; ?>"
                                                                                class="form-control required">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Air Conditioner (AC)</label>
                                                                            <input id="ac" name="ac" type="text"
                                                                                value="<?php echo $ac; ?>"
                                                                                class="form-control required">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Exhaust Fan</label>
                                                                            <input id="exhaust" name="exhaust"
                                                                                type="text"
                                                                                value="<?php echo $exhaust; ?>"
                                                                                class="form-control required">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Instalasi Telephone</label>
                                                                            <input id="tlp" name="tlp" type="tlp"
                                                                                value="<?php echo $tlp; ?>"
                                                                                class="form-control required">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Instalasi Wifi Internet</label>
                                                                            <input id="wifi" name="wifi" type="text"
                                                                                value="<?php echo $wifi; ?>"
                                                                                class="form-control required">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Instalasi Faximile</label>
                                                                            <input id="faximile" name="faximile"
                                                                                value="<?php echo $faximile; ?>"
                                                                                type="text"
                                                                                class="form-control required">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Instalasi TV Cable</label>
                                                                            <input id="tv" name="tv" type="text"
                                                                                value="<?php echo $tv; ?>"
                                                                                class="form-control required">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Instalasi Sound
                                                                                System/Speaker</label>
                                                                            <input id="suara" name="suara"
                                                                                value="<?php echo $suara; ?>"
                                                                                type="text"
                                                                                class="form-control required">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Ramp. Pengganti Tangga 1:8 Dalam
                                                                                Bangunan</label>
                                                                            <input id="ramp_dalam" name="ramp_dalam"
                                                                                value="<?php echo $ramp_dalam; ?>"
                                                                                type="text"
                                                                                class="form-control required">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Ramp. Pengganti Tangga 1:10 Luar
                                                                                Bangunan</label>
                                                                            <input id="ramp_luar" name="ramp_luar"
                                                                                value="<?php echo $ramp_luar; ?>"
                                                                                type="text"
                                                                                class="form-control required">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Hand Drail/Pegangan Rambatan Dalam
                                                                                Gedung</label>
                                                                            <input id="hand_dalam" name="hand_dalam"
                                                                                value="<?php echo $hand_dalam; ?>"
                                                                                type="text"
                                                                                class="form-control required">
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label>Daya Listrik PLN</label></label>
                                                                            <input id="daya_listrik" name="daya_listrik"
                                                                                value="<?php echo $daya_listrik; ?>"
                                                                                type="text"
                                                                                class="form-control required">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Penangkal Petir</label>
                                                                            <input id="penangkal_petir"
                                                                                name="penangkal_petir"
                                                                                value="<?php echo $penangkal_petir; ?>"
                                                                                type="text"
                                                                                class="form-control required">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Air Bersih</label>
                                                                            <input id="air_bersih" name="air_bersih"
                                                                                value="<?php echo $air_bersih; ?>"
                                                                                type="text"
                                                                                class="form-control required">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Air Kotor</label>
                                                                            <input id="air_kotor" name="air_kotor"
                                                                                type="text"
                                                                                value="<?php echo $air_kotor; ?>"
                                                                                class="form-control required">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Saluran Keliling Bangunan</label>
                                                                            <input id="saluran_kel" name="saluran_kel"
                                                                                type="text"
                                                                                value="<?php echo $saluran_keliling; ?>"
                                                                                class="form-control required">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Saluran Lingkungan</label></label>
                                                                            <input id="saluran_ling" name="saluran_ling"
                                                                                type="text"
                                                                                value="<?php echo $saluran_ling; ?>"
                                                                                class="form-control required">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Elevator/Lift</label>
                                                                            <input id="elevator" name="elevator"
                                                                                type="text"
                                                                                value="<?php echo $elevator; ?>"
                                                                                class="form-control required">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Escalator</label>
                                                                            <input id="escalator" name="escalator"
                                                                                type="text"
                                                                                value="<?php echo $escalator; ?>"
                                                                                class="form-control required">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Tangga</label>
                                                                            <input id="tangga" name="tangga" type="text"
                                                                                value="<?php echo $tangga_darurat; ?>"
                                                                                class="form-control required">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Instalasi CCTV</label>
                                                                            <input id="cctv" name="cctv" type="text"
                                                                                value="<?php echo $cctv; ?>"
                                                                                class="form-control required">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Aparat Keamanan</label></label>
                                                                            <input id="aparat" name="aparat" type="text"
                                                                                value="<?php echo $aparat; ?>"
                                                                                class="form-control required">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Pintu Darurat</label>
                                                                            <input id="pintu_darurat"
                                                                                name="pintu_darurat" type="text"
                                                                                value="<?php echo $pintu_darurat; ?>"
                                                                                class="form-control required">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Rambu-Rambu Evakuasi</label>
                                                                            <input id="rambu_evakuasi"
                                                                                name="rambu_evakuasi" type="text"
                                                                                value="<?php echo $rambu_evakuasi; ?>"
                                                                                class="form-control required">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Rambu-Rambu Titik Kumpul</label>
                                                                            <input id="titik_kumpul" name="titik_kumpul"
                                                                                type="text"
                                                                                value="<?php echo $titik_kumpul; ?>"
                                                                                class="form-control required">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Sarana Parkir Kaum
                                                                                Disabilitas</label>
                                                                            <input id="parkir_dis" name="parkir_dis"
                                                                                type="text"
                                                                                value="<?php echo $parkir_dis; ?>"
                                                                                class="form-control required">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Lajur Disabilitas Dalam
                                                                                Bangunan</label>
                                                                            <input id="lajur_dis" name="lajur_dis"
                                                                                type="text"
                                                                                value="<?php echo $lajur_dis; ?>"
                                                                                class="form-control required">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Hand Drail/Pegangan Rambatan Luar
                                                                                Gedung</label>
                                                                            <input id="hand_luar" name="hand_luar"
                                                                                type="text"
                                                                                value="<?php echo $hand_luar; ?>"
                                                                                class="form-control required">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Toilet Disabilitas</label>
                                                                            <input id="toilet_dis" name="toilet_dis"
                                                                                type="text"
                                                                                value="<?php echo $toilet_dis; ?>"
                                                                                class="form-control required">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Kursi Roda</label>
                                                                            <input id="kursi_roda" name="kursi_roda"
                                                                                type="text"
                                                                                value="<?php echo $kursi_roda; ?>"
                                                                                class="form-control required">
                                                                        </div>

                                                                        <div class="form-group"><label
                                                                                class="control-label"></label>
                                                                            <div> <input type="hidden" name="id"
                                                                                    value=<?php echo $_GET['id_bangunan']; ?>>
                                                                                <button class="btn btn-sm btn-primary"
                                                                                    style="width:20%" type="submit"
                                                                                    name="update">Update</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>



                                                        </div>
                                                        < </div>

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
                                                            <form action="database/updateDokumenMekanikal.php"
                                                                method="post" enctype="multipart/form-data">
                                                                <div>
                                                                    <div class="fallback">
                                                                        <input name="file[]" type="file"
                                                                            accept=".pdf,.doc,.docx*" multiple />

                                                                    </div>
                                                                    <div>
                                                                        <div class="col-sm-1"
                                                                            style="margin-top:3%;margin-left:-1%">
                                                                            <input type="hidden" name="id"
                                                                                value=<?php echo $_GET['id_bangunan']; ?>>
                                                                            <button class="btn btn-sm btn-primary"
                                                                                style="width:200%" type="submit"
                                                                                name="update">Tambah Dokumen</button>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                        </div>
                                                        </form>

                                                    </div>
                                                    <?php
                                                     $result = mysqli_query($mysqli, "SELECT * FROM dokumen_mekanikal WHERE id_bangunan='$id'");

                            while ($data = mysqli_fetch_array($result)) {
                                $dokumen = $data['dokumen'];
                                $id_dokumen = $data['id'];
                                $ext = pathinfo($dokumen, PATHINFO_EXTENSION);
                                $extension='';
                                if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg'){
                                    ?>
                                                    <div class="profile-pic" style="margin-top:5%;margin-left:3%">
                                                        <img src="dokumen/dokumen_utilitas/<?php echo $dokumen;?>"
                                                            width=150; height=150></img>
                                                        <div class="edit"><a
                                                                href="database/delDokumenMekanikal.php?id=<?php echo $id_dokumen?>"><i
                                                                    class="fa fa-trash fa-2x"></i></a><br>
                                                            <label style="color:black"><?php echo $dokumen ?></label>
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
                                                    <div class="profile-pic" style="margin-top:5%;margin-left:3%">
                                                        <i class="<?php echo $extension?>" style="font-size:130px;"></i>
                                                        <div class="edit"><a
                                                                href="database/delDokumenMekanikal.php?id=<?php echo $id_dokumen?>"><i
                                                                    class="fa fa-trash fa-2x"></i></a><br>
                                                            <label style="color:black"><?php echo $dokumen ?></label>
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