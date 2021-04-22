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

    <link href='css/plugins/dataTables/datatables.min.css' rel='stylesheet'>
    <link href='css/plugins/slick/slick.css' rel='stylesheet'>
    <link href='css/plugins/slick/slick-theme.css' rel='stylesheet'>

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

    td {
        word-break: break-all;
        max-width: 100px;
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
                    <label style='font-size:32px;margin-top:3%; margin-left:1%'><b>Detail Data Bangunan </b></label>

                </div>
            </div>
            <div class='wrapper wrapper-content animated fadeInRight ecommerce'>

                <div class='row'>
                    <div class='col-lg-12'>
                        <div class='tabs-container'>
                            <ul class='nav nav-tabs'>
                                <li class='active'><a data-toggle='tab' href='#tab-1'> Data Bangunan</a></li>
                                <li class=''><a data-toggle='tab' href='#tab-2'> Data Tanah</a></li>
                                <li class=''><a data-toggle='tab' href='#tab-3'> Data Klasifikasi Bangunan</a></li>
                                <li class=''><a data-toggle='tab' href='#tab-4'> Data Teknis</a></li>
                                <li class=''><a data-toggle='tab' href='#tab-5'> Data Penanganan</a></li>
                                <li class=''><a data-toggle='tab' href='#tab-6'> Data Kondisi Bangunan</a></li>
                            </ul>

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

$result2 = mysqli_query( $mysqli, "SELECT * FROM tb_tanah WHERE id_bangunan='$id'" );

while ( $data2 = mysqli_fetch_array( $result2 ) ) {
    $no_tanah = $data2['no_tanah'];
    $nama_pemilik = $data2['nama_pemilik'];
    $identitas_pemilik = $data2['identitas_pemilik'];
    $jenis = $data2['jenis'];
    $alamat_tanah = $data2['alamat'];
    $luas_tanah = $data2['luas'];
    $kdb = $data2['kdb'];
    $klb = $data2['klb'];
    $kdh = $data2['kdh'];
    $garis_muka = $data2['garis_muka'];
    $garis_samping = $data2['garis_samping'];
    $garis_belakang = $data2['garis_belakang'];
}

$result3 = mysqli_query( $mysqli, "SELECT * FROM tb_klasifikasi WHERE id_bangunan='$id'" );

while ( $data3 = mysqli_fetch_array( $result3 ) ) {
    $kompleksitas = $data3['kompleksitas'];
    $permanensi = $data3['permanensi'];
    $resiko_kebakaran = $data3['resiko_kebakaran'];
    $zonasi_gempa = $data3['zonasi_gempa'];
    $lokasi = $data3['lokasi'];
    $ketinggian_klasi = $data3['ketinggian'];
    $kepemilikan_klasi = $data3['kepemilikan'];
}

$result4 = mysqli_query( $mysqli, "SELECT * FROM tb_struktur WHERE id_bangunan='$id'" );

while ( $data4 = mysqli_fetch_array( $result4 ) ) {
    $pondasi = $data4['pondasi'];
    $sloof = $data4['sloof'];
    $balok = $data4['balok'];
    $ring_balok = $data4['ring_balok'];
    $plat_lantai = $data4['plat_lantai'];
    $atap = $data4['atap'];
    $penutup_atap = $data4['penutup_atap'];
    $listplank_atap = $data4['listplank_atap'];
}

$result5 = mysqli_query( $mysqli, "SELECT * FROM tb_arsitektur WHERE id_bangunan='$id'" );

while ( $data5 = mysqli_fetch_array( $result5 ) ) {
    $id_arsitektur = $data5['id_arsitektur'];
    $dinding = $data5['dinding'];
    $plafond = $data5['plafond'];
    $lantai_arsi = $data5['lantai'];
    $kusen = $data5['kusen'];
    $pintu = $data5['pintu'];
    $jendela = $data5['jendela'];
    $pagar = $data5['pagar'];
    $ruang_hijau = $data5['ruang_hijau'];
}

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
                            <div class='tab-content'>
                                <div id='tab-1' class='tab-pane active'>
                                    <div class='panel-body'>

                                        <fieldset class='form-horizontal'>
                                            <div class='ibox product-detail'>
                                                <div class='ibox-content'>
                                                    <div class='row'>
                                                        <div class='col-md-5'>
                                                            <div class='product-images'>
                                                                <?php
$result9 = mysqli_query( $mysqli, "SELECT * FROM gambar_bangunan WHERE id_bangunan='$id'" );

while ( $data9 = mysqli_fetch_array( $result9 ) ) {
    $gambar_bangunan = $data9['gambar'];
    ?>

                                                                <div>
                                                                    <div class='lightBoxGallery'>
                                                                        <a href="dokumen/fotoBangunan/<?php echo $gambar_bangunan; ?>"
                                                                            data-gallery=''>
                                                                            <img src="dokumen/fotoBangunan/<?php echo $gambar_bangunan; ?>"
                                                                                alt='' width=400 height=500
                                                                                style='object-fit:cover'></a>
                                                                    </div>
                                                                </div>

                                                                <?php }
    ?>

                                                            </div>

                                                        </div>
                                                        <div class='col-md-7'>

                                                            <h2 class='font-bold m-b-xs'>
                                                                <?php echo $nama;
    ?>
                                                            </h2>
                                                            <h3><?php echo $alamat;
    ?></h3>
                                                            <div class='m-t-md'>
                                                                <h3 class='product-main-price'>
                                                                    <?php echo $id_bangunan;
    ?> </h3>
                                                            </div>
                                                            <table class='table table-borderless'>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>OPD</td>
                                                                        <td>: <?php echo $odp;
    ?> </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Instansi</td>
                                                                        <td>: <?php echo $instruktur;
    ?> </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Kabupatan/Kota</td>
                                                                        <td>: <?php echo $kota;
    ?> </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Kelurahan/Desa</td>
                                                                        <td>: <?php echo $kelurahan;
    ?> </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Kecamatan</td>
                                                                        <td>: <?php echo $kecamatan;
    ?> </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Fungsi</td>
                                                                        <td>: <?php echo $fungsi;
    ?> </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Luas
                                                                            Bangunan</td>
                                                                        <td>: <?php echo $luas;
    ?> </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Jumlah
                                                                            Lantai</td>
                                                                        <td>: <?php echo $jumlah_lantai;
    ?> </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Ketinggian
                                                                            per
                                                                            Lantai</td>
                                                                        <td>: <?php echo $ketinggian;
    ?> </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Tanggal
                                                                            Didirikan</td>
                                                                        <td>: <?php echo $didirikan;
    ?> </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Tanggal
                                                                            Selesai
                                                                            Konstruksi</td>
                                                                        <td>: <?php echo $selesai_konstuksi;
    ?> </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Nomor
                                                                            IMB</td>
                                                                        <td>: <?php echo $imb;
    ?> </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Nomor
                                                                            SLF</td>
                                                                        <td>: <?php echo $slf;
    ?> </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <div>
                                                                <div class='btn-group'>

                                                                    <a
                                                                        href="editBangunan.php?id_bangunan=<?php echo $id_bangunan; ?>"><button
                                                                            class='btn btn-primary btn-sm'><i
                                                                                class='fa fa-pencil'></i>
                                                                            Edit</button></a>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                                <iframe src="<?php echo $koordinat; ?>" width='1180' height='690'
                                                    frameborder='0' style='border:0;' allowfullscreen=''
                                                    aria-hidden='false' tabindex='0' style='margin-top:5%'></iframe>

                                            </div>
                                        </fieldset>

                                    </div>
                                </div>
                                <div id='tab-2' class='tab-pane'>
                                    <div class='panel-body'>

                                        <fieldset class='form-horizontal'>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Nama Pemilik
                                                    Tanah :</label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $nama_pemilik; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Nomor Bukti
                                                    Kepemilikan Tanah :</label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $no_tanah; ?>" disabled> </div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Alamat Tanah
                                                    :</label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $alamat_tanah; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Luas Tanah
                                                    :</label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $luas_tanah; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Koefisien
                                                    Dasar Bangunan ( KDB ) :</label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $kdb; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Koefisien
                                                    Lantai Bangunan ( KLB ) :</label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $klb; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Koefisien
                                                    Dasar Hijau ( KDH ) :</label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $kdh; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Garis Muka
                                                    Bangunan ( m ) :</label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $garis_muka; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Garis Samping
                                                    Bangunan ( m ) :</label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $garis_samping; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Garis Belakang
                                                    Bangunan ( m ) :</label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $garis_belakang; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Dokumen Tanah
                                                    :</label>
                                                <div class='col-sm-10'><a
                                                        href='database/downloadTanah.php?id_bangunan=<?php echo $id_bangunan; ?>'><button
                                                            class='btn btn-sm btn-success  m-t-n-xs'><strong>Download
                                                            </strong></button></a>
                                                </div>
                                            </div>

                                            <div class='form-group'><label class='col-sm-2 control-label'></label>
                                                <div class='col-sm-10'><a
                                                        href="editTanah.php?id_bangunan=<?php echo $id_bangunan; ?>"><button
                                                            class='btn btn-primary btn-sm'><i class='fa fa-pencil'></i>
                                                            Edit</button></a></div>
                                            </div>

                                        </fieldset>

                                    </div>
                                </div>
                                <div id='tab-3' class='tab-pane'>
                                    <div class='panel-body'>

                                        <fieldset class='form-horizontal'>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Tingkat
                                                    Kompleksitas :</label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $kompleksitas; ?>" disabled></div>

                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Tingkat
                                                    Permanensi :</label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $permanensi; ?>" disabled></div>

                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Tingkat Resiko
                                                    Kebakaran
                                                    :</label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $resiko_kebakaran; ?>" disabled></div>

                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Zona Gempa
                                                    :</label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $zonasi_gempa; ?>" disabled></div>

                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Lokasi
                                                    :</label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $lokasi; ?>" disabled></div>

                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Ketinggian
                                                    :</label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $ketinggian_klasi; ?>" disabled></div>

                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Kepemilikan
                                                    :</label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $kepemilikan_klasi; ?>" disabled></div>

                                            </div>

                                            <div class='form-group'><label class='col-sm-2 control-label'></label>
                                                <div class='col-sm-10'><a
                                                        href="editKlasifikasi.php?id_bangunan=<?php echo $id_bangunan; ?>"><button
                                                            class='btn btn-primary btn-sm'><i class='fa fa-pencil'></i>
                                                            Edit</button></a></div>
                                            </div>

                                        </fieldset>

                                    </div>
                                </div>
                                <div id='tab-4' class='tab-pane'>
                                    <div class='panel-body'>

                                        <fieldset class='form-horizontal'>
                                            <h2>Data Struktur</h2>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Struktur
                                                    Pondasi :</label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $pondasi; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Struktur Sloof
                                                    :</label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $sloof; ?>" disabled> </div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Struktur Balok
                                                    :</label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $balok; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Struktur Ring
                                                    Balok
                                                    :</label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $ring_balok; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Struktur
                                                    Lantai :</label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $plat_lantai; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Struktur Atap
                                                    :</label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $atap; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Penutup Atap
                                                    :</label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $penutup_atap; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Listplank Atap
                                                    :</label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $listplank_atap; ?>" disabled></div>
                                            </div>

                                            <div class='form-group'><label class='col-sm-2 control-label'>Dokumen
                                                    Perencanaan Struktur
                                                    :</label>
                                                <div class='col-sm-10'><a
                                                        href='database/downloadStruktur.php?id_bangunan=<?php echo $id_bangunan; ?>'><button
                                                            class='btn btn-sm btn-success'><strong>Download
                                                            </strong></button></a>
                                                </div>
                                            </div>

                                            <div class='form-group'><label class='col-sm-2 control-label'></label>
                                                <div class='col-sm-10'><a
                                                        href="editStruktur.php?id_bangunan=<?php echo $id_bangunan; ?>"><button
                                                            class='btn btn-primary btn-sm'><i class='fa fa-pencil'></i>
                                                            Edit</button></a></div>
                                            </div>

                                        </fieldset>

                                        <fieldset class='form-horizontal'>
                                            <h2>Data Arsitektur</h2>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Dinding/Tembok
                                                    :</label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $dinding; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Platfon
                                                    :</label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $plafond; ?>" disabled> </div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Penutup Lantai
                                                    :</label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $lantai_arsi; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Kusen
                                                    :</label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $kusen; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Daun Pintu
                                                    :</label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $pintu; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Daun Jendela
                                                    :</label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $jendela; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Jenis Pagar
                                                    :</label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $pagar; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Luas Ruang
                                                    Terbuka Hijau ( % )
                                                    :</label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $ruang_hijau; ?>" disabled></div>
                                            </div>

                                            <div class='form-group'><label class='col-sm-2 control-label'>Dokumen
                                                    Arsitektur
                                                    :</label>
                                                <div class='col-sm-10'><a
                                                        href='database/downloadArsi.php?id_bangunan=<?php echo $id_bangunan; ?>'><button
                                                            class='btn btn-sm btn-success'><strong>Download
                                                            </strong></button></a>
                                                </div>
                                            </div>

                                            <div class='form-group'><label class='col-sm-2 control-label'></label>
                                                <div class='col-sm-10'><a
                                                        href="editArsitektur.php?id_bangunan=<?php echo $id_bangunan; ?>"><button
                                                            class='btn btn-primary btn-sm'><i class='fa fa-pencil'></i>
                                                            Edit</button></a></div>
                                            </div>

                                        </fieldset>

                                        <fieldset class='form-horizontal'>
                                            <h2>Data Mekanikal, Elektrikal & Utilitas</h2>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Sumber Listrik
                                                    :</label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $sumber_listrik; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Sumber
                                                    Air</label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $sumber_air; ?>" disabled> </div>
                                            </div>
                                            <div class='form-group'><label
                                                    class='col-sm-2 control-label'>Grounding/Pentanahan</label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $petanahan; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Apar
                                                </label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $apar; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Sistem
                                                    Splinkler</label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $splinker; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Sistem
                                                    Hyndrant</label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $hyndrant; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Smoke
                                                    Detector</label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $smoke_detector; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Tangga Darurat
                                                </label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $tangga_darurat; ?>" disabled></div>
                                            </div>

                                            <div class='form-group'><label class='col-sm-2 control-label'>Ventilasi
                                                </label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $ventilasi; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Air
                                                    Conditioner ( AC )
                                                </label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $ac; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Exhaust Fan
                                                </label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $exhaust; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Instalasi
                                                    Telephone
                                                </label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $tlp; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Instalasi Wifi
                                                    Internet
                                                </label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $wifi; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Instalasi
                                                    Faximile
                                                </label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $faximile; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Instalasi TV
                                                    Cable
                                                </label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $tv; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Instalasi
                                                    Sound System/Speaker
                                                </label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $suara; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Ramp.
                                                    Pengganti Tangga 1:8 Dalam Bangunan
                                                </label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $ramp_dalam; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Ramp.
                                                    Pengganti Tangga 1:10 Luar Bangunan
                                                </label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $ramp_luar; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Hand
                                                    Drail/Pegangan Rambatan Dalam Gedung
                                                </label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $hand_dalam; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Daya Listrik
                                                    PLN
                                                </label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $daya_listrik; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Penangkal
                                                    Petir
                                                </label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $penangkal_petir; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Air Bersih
                                                </label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $air_bersih; ?>" disabled></div>
                                            </div>

                                            <div class='form-group'><label class='col-sm-2 control-label'>Air Kotor
                                                </label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $air_kotor; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Saluran
                                                    Keliling Bangunan
                                                </label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $saluran_keliling; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Saluran
                                                    Lingkungan
                                                </label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $saluran_ling; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Elevator/Lift
                                                </label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $elevator; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Escalator
                                                </label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $escalator; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Tangga
                                                </label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $tangga_darurat; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Instalasi CCTV
                                                </label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $cctv; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Aparat
                                                    Keamanan
                                                </label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $aparat; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Pintu Darurat
                                                </label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $pintu_darurat; ?>" disabled></div>
                                            </div>
                                            <div class='form-group'><label class='col-sm-2 control-label'>Rambu-Rambu
                                                    Evakuasi
                                                </label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $rambu_evakuasi; ?>" disabled></div>
                                            </div>

                                            <div class='form-group'><label class='col-sm-2 control-label'>Rambu-Rambu
                                                    Titik Kumpul
                                                </label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $titik_kumpul; ?>" disabled></div>
                                            </div>

                                            <div class='form-group'><label class='col-sm-2 control-label'>Sarana Parkir
                                                    Kaum Disabilitas
                                                </label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $parkir_dis; ?>" disabled></div>
                                            </div>

                                            <div class='form-group'><label class='col-sm-2 control-label'>Lajur
                                                    Disabilitas Dalam Bangunan
                                                </label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $lajur_dis; ?>" disabled></div>
                                            </div>

                                            <div class='form-group'><label class='col-sm-2 control-label'>Hand
                                                    Drail/Pegangan Rambatan Luar Gedung
                                                </label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $hand_luar; ?>" disabled></div>
                                            </div>

                                            <div class='form-group'><label class='col-sm-2 control-label'>Toilet
                                                    Disabilitas
                                                </label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $toilet_dis; ?>" disabled></div>
                                            </div>

                                            <div class='form-group'><label class='col-sm-2 control-label'>Kursi Roda

                                                </label>
                                                <div class='col-sm-10'><input type='text' class='form-control'
                                                        value="<?php echo $kursi_roda; ?>" disabled></div>
                                            </div>

                                            <div class='form-group'><label class='col-sm-2 control-label'>Dokumen
                                                    Perencanaan ME & Utilitas
                                                    :</label>
                                                <div class='col-sm-10'><a
                                                        href='database/downloadMe.php?id_bangunan=<?php echo $id_bangunan; ?>'><button
                                                            class='btn btn-sm btn-success'><strong>Download
                                                            </strong></button></a>
                                                </div>
                                            </div>

                                            <div class='form-group'><label class='col-sm-2 control-label'></label>
                                                <div class='col-sm-10'><a
                                                        href="editMekanika.php?id_bangunan=<?php echo $id_bangunan; ?>"><button
                                                            class='btn btn-primary btn-sm'><i class='fa fa-pencil'></i>
                                                            Edit</button></a></div>
                                            </div>

                                        </fieldset>

                                    </div>
                                </div>
                                <div id='tab-5' class='tab-pane'>

                                    <div class='panel-body'>

                                        <div class='table-responsive' style='margin-top:-1.5%'>
                                            <div style='margin-bottom:5%;margin-top:2%;margin-right:8%'><a
                                                    href='addPenanganan.php?id_bangunan=<?php echo $id; ?>'><button
                                                        class='btn btn-sm btn-primary pull-right m-t-n-xs'
                                                        type='submit'><strong>+
                                                            Tambah
                                                            Data</strong></button></a></div>
                                            <table class='table table-bordered table-stripped'>
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            Gambar
                                                        </th>
                                                        <th>
                                                            Tanggal
                                                        </th>
                                                        <th>
                                                            Jenis Penanganan
                                                        </th>
                                                        <th>
                                                            Sumber Pendanaan
                                                        </th>
                                                        <th>
                                                            Dana Alokasi
                                                        </th>
                                                        <th>
                                                            Tingkat Renovasi
                                                        </th>

                                                        <th>
                                                            Penjelasan
                                                        </th>
                                                        <th>
                                                            Aksi
                                                        </th>

                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
    $result5 = mysqli_query( $mysqli, "SELECT * FROM tb_penanganan WHERE id_bangunan='$id'" );

    while ( $data5 = mysqli_fetch_array( $result5 ) ) {
        $id_penanganan = $data5['id_penanganan'];
        $jenis_penanganan = $data5['jenis_penanganan'];
        $pendanaan = $data5['pendanaan'];
        $tgl_renovasi = $data5['tgl_renovasi'];
        $alokasi_dana = $data5['alokasi_dana'];
        $jenis_renovasi = $data5['jenis_renovasi'];
        $penjelasan = $data5['penjelasan'];
        $result11 = mysqli_query( $mysqli, "SELECT * FROM gambar_penanganan WHERE id_penanganan='$id_penanganan' LIMIT 1" );
        while ( $data15 = mysqli_fetch_array( $result11 ) ) {
            $foto_penanganan = $data15['gambar'];
        }

        ?>
                                                    <tr>
                                                        <td>
                                                            <img src="dokumen/fotoRehab/<?php echo $foto_penanganan; ?>"
                                                                alt='' width='115px' style='object-fit:cover'>
                                                        </td>
                                                        <td>
                                                            <?php echo $tgl_renovasi;
        ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $jenis_penanganan;
        ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $pendanaan;
        ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $alokasi_dana;
        ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $penjelasan;
        ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $pendanaan;
        ?>
                                                        </td>
                                                        <td>
                                                            <a
                                                                href="detailPenanganan.php?id_penanganan=<?php echo $id_penanganan; ?>">
                                                                <i data-feather='eye' style='margin-right:5%'></i>
                                                            </a>
                                                            <a
                                                                href="editPenanganan.php?id_penanganan=<?php echo $id_penanganan; ?>">
                                                                <i data-feather='edit-2' style='margin-right:5%'>
                                                                </i>
                                                            </a>
                                                            <a href="database/delPenanganan.php?id_penanganan=<?php echo $id_penanganan; ?>"
                                                                onclick="return confirm('Apakah anda yakin akan menghapus data?')"><i
                                                                    data-feather='trash-2'
                                                                    style='margin-right:2%; color:red'></i></a>

                                                        </td>
                                                    </tr>
                                                    <?php }
        ?>
                                                </tbody>
                                            </table>

                                        </div>

                                    </div>
                                </div>

                                <div id='tab-6' class='tab-pane'>
                                    <div class='panel-body'>

                                        <div style='margin-bottom:5%;margin-top:2%;margin-right:8%'><a
                                                href='addKondisi.php?id_bangunan=<?php echo $id; ?>'><button
                                                    class='btn btn-sm btn-primary pull-right m-t-n-xs'
                                                    type='submit'><strong>+
                                                        Tambah
                                                        Data</strong></button></a></div>
                                        <?php
        $result6 = mysqli_query( $mysqli, "SELECT * FROM tb_kondisi WHERE id_bangunan='$id'" );

        $row_cnt = mysqli_num_rows( $result6 );
        if ( $row_cnt > 0 ) {
            ?>
                                        <fieldset class='form-horizontal'>
                                            <div class='ibox product-detail'>
                                                <?php

            while ( $data6 = mysqli_fetch_array( $result6 ) ) {
                $id_kondisi = $data6['id_kondisi'];
                $judul_kondisi = $data6['judul'];
                $deskripsi_kondisi = $data6['deskripsi'];
                // $dokumen_kondisi = $data6['foto_kondisi'];

                ?>
                                                <div class='ibox-content'>
                                                    <div class='row'>
                                                        <div class='col-md-5'>
                                                            <?php

                $result10 = mysqli_query( $mysqli, "SELECT * FROM gambar_kondisi WHERE id_kondisi='$id_kondisi'" );

                $row_cnt_image = mysqli_num_rows( $result10 );
                if ( $row_cnt_image == 1 ) {
                    ?>
                                                            <div>
                                                                <?php

                    while ( $data10 = mysqli_fetch_array( $result10 ) ) {
                        $gbr_kon = $data10['gbr_kon'];
                        ?>

                                                                <div class='lightBoxGallery'>
                                                                    <a href="dokumen/fotoKondisi/<?php echo $gbr_kon; ?>"
                                                                        data-gallery=''>
                                                                        <img src='dokumen/fotoKondisi/<?php echo $gbr_kon; ?>'
                                                                            alt='' width='300' height='300'
                                                                            style='margin-left:10%; object-fit:cover'></a>
                                                                </div>

                                                                <?php }
                    } else {
                        ?>

                                                                <div class='product-images'>
                                                                    <?php

                        $result10 = mysqli_query( $mysqli, "SELECT * FROM gambar_kondisi WHERE id_kondisi='$id_kondisi'" );

                        while ( $data10 = mysqli_fetch_array( $result10 ) ) {
                            $gbr_kon = $data10['gbr_kon'];
                            ?>

                                                                    <div>
                                                                        <div class='image-imitation'>
                                                                            <img src='dokumen/fotoKondisi/<?php echo $gbr_kon; ?>'
                                                                                alt='' width='300' height='300'
                                                                                style='object-fit:cover'>
                                                                        </div>
                                                                    </div>

                                                                    <?php }
                        }
                        ?>

                                                                </div>

                                                            </div>
                                                            <div class='col-md-7'>
                                                                <table class='table table-borderless'>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>Judul</td>
                                                                            <td style='width:10px'> : </td>
                                                                            <td><?php echo $judul_kondisi;
                        ?> </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Deskripsi</td>
                                                                            <td> : </td>
                                                                            <td><?php echo $deskripsi_kondisi;
                        ?> </td>
                                                                        </tr>

                                                                    </tbody>
                                                                </table>
                                                                <div>
                                                                    <div class='btn-group'>
                                                                        <a
                                                                            href="editKondisi.php?id_kondisi=<?php echo $id_kondisi; ?>"><button
                                                                                class='btn btn-primary btn-sm'><i
                                                                                    class='fa fa-pencil'></i>
                                                                                Edit</button></a>

                                                                        <a href="database/delKondisi.php?id_kondisi=<?php echo $id_kondisi; ?>"
                                                                            onclick="return confirm('Apakah anda yakin akan menghapus data?')"><button
                                                                                class='btn btn-danger btn-sm'><i
                                                                                    class='fa fa-trash'></i>
                                                                                Hapus</button></i></a>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <?php }
                        ?>

                                                </div>
                                        </fieldset>
                                        <?php }
                        ?>

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

    <script src='js/plugins/blueimp/jquery.blueimp-gallery.min.js'></script>

    <!-- Custom and plugin javascript -->
    <script src='js/inspinia.js'></script>
    <script src='js/plugins/pace/pace.min.js'></script>
    <script src='js/plugins/slick/slick.min.js'></script>

    <script src='https://unpkg.com/feather-icons'></script>

    <script>
    feather.replace()
    </script>
    <!-- Page-Level Scripts -->
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