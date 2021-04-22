<?php
session_start();

if (!isset($_SESSION["username"])) {
    header( 'Location:login.php' );
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

    <title>Tambah Bangunan</title>

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
                                <h5>Tambah Data</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>

                                </div>
                            </div>
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
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <input id="kd_kab" name="kd_kab" type="text"
                                                                placeholder="KD Kabupaten"
                                                                class="form-control required ">
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <input id="kd_kec" name="kd_kec" type="text"
                                                                placeholder="KD Kecamatan"
                                                                class="form-control required ">
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <input id="kd_kel" name="kd_kel" type="text"
                                                                placeholder="KD Kelurahan"
                                                                class="form-control required ">
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <input id="no_urat" name="no_urat" type="text"
                                                                placeholder="No Urut" class="form-control required ">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nama Bangunan/Gedung</label>
                                                    <input id="nama_bg" name="nama_bg" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Alamat</label>
                                                    <input id="alamat_bg" name="alamat_bg" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Kecamatan</label>
                                                    <input id="kecamatan" name="kecamatan" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Kelurahan / Desa</label>
                                                    <input id="kelurahan" name="kelurahan" type="text"
                                                        class="form-control required">
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
                                                    <label>Instansi</label>
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
                                                <div class="form-group">
                                                    <label>Foto Bangunan / Gedung (png,jpg,jpeg,gif)</label>
                                                    <input id="file_bg" name="file_bg[]" type="file" accept="image/*"
                                                        multiple class="form-control required">
                                                    <!-- <div class="row">
                                                        <div class="col-lg-8">
                                                            <input id="file_bg" name="file_bg" type="file"
                                                                class="form-control required">
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <button class="btn btn-sm btn-success" type="Submit"
                                                                id="upload" name="Submit" value="upload">Upload</button>
                                                        </div>


                                                    </div> -->

                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <h1>Data Tanah</h1>
                                    <fieldset>
                                        <h2>Data Tanah Bangunan / Gedung</h2>
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
                                            <div class="col-lg-6">


                                                <div class="form-group">
                                                    <label>Koefisien Lantai Bangunan (KLB)</label>
                                                    <input id="klb" name="klb" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Koefisien Dasar Hijau (KDH)</label>
                                                    <input id="kdh" name="kdh" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Garis Muka Bangunan (m)</label>
                                                    <input id="gmb" name="gmb" type="number"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Garis Samping Bangunan (m)</label>
                                                    <input id="gsb" name="gsb" type="number"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Garis Belakang Bangunan (m)</label>
                                                    <input id="gbb" name="gbb" type="number"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Dokumen Tanah (PDF, Word, Excel, PowerPoint)</label>
                                                    <input id="dokumen_tn" name="dokumen_tn[]" type="file"
                                                        accept=".pdf,.doc.docx,.xls,.xlsx,.ppt,.pptx" multiple
                                                        class="form-control required">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <h1>Data Klasifikasi Bangunan</h1>
                                    <fieldset>
                                        <h2>Profile Information</h2>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Tingkat Kompleksitas</label>
                                                    <select class="form-control required" name="kompleksitas">
                                                        <option value="Sederhana">Sederhana</option>
                                                        <option value="Tidak Sederhana">Tidak Sederhana</option>
                                                        <option value="Khusus">Khusus</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Tingkat Permanensi</label>
                                                    <select class="form-control required" name="permanensi">
                                                        <option value="Permanen">Permanen</option>
                                                        <option value="Semi Permanen">Semi Permanen</option>
                                                        <option value="Darurat / Sementara">Darurat / Sementara</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Tingkat Resiko Kebakaran</label>
                                                    <select class="form-control required" name="resiko_kebakaran">
                                                        <option value="Permanen">Resiko Kebakaran Tinggi</option>
                                                        <option value="Semi Permanen">Resiko Kebakaran Sedang</option>
                                                        <option value="Darurat / Sementara">Resiko Kebakaran Rendah
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Zona Gempa</label>
                                                    <select class="form-control required" name="resiko_zona">
                                                        <option value="Zona 1">Zona 1</option>
                                                        <option value="Zona 2">Zona 2</option>
                                                        <option value="Zona 3">Zona 3</option>
                                                        <option value="Zona 4">Zona 4</option>
                                                        <option value="Zona 5">Zona 5</option>
                                                        <option value="Zona 6">Zona 6</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Lokasi</label>
                                                    <select class="form-control required" name="lokasi_klasi">
                                                        <option value="Lokasi Padat">Lokasi Padat</option>
                                                        <option value="Lokasi Sedang">Lokasi Sedang</option>
                                                        <option value="Lokasi Renggang">Lokasi Renggang</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Ketinggian</label>
                                                    <select class="form-control required" name="tinggi_klasi">
                                                        <option value="Bertingkat Tinggi">Bertingkat Tinggi</option>
                                                        <option value="Bertingkat Tinggi">Bertingkat Sedang</option>
                                                        <option value="Bertingkat Tinggi">Bertingkat Rendah</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Kepemilikan</label>
                                                    <select class="form-control required" name="milik_klasi">
                                                        <option value="Milik Negara">Milik Negara</option>
                                                        <option value="Milik Badan Usaha">Milik Badan Usaha</option>
                                                        <option value="Milik Perorangan">Milik Perorangan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <h1>Data Teknis</h1>
                                    <fieldset>
                                        <h2>Data Struktur</h2>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Struktur Pondasi</label></label>
                                                    <input id="pondasi" name="pondasi" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Struktur Sloof</label>
                                                    <input id="sloof" name="sloof" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Struktur Balok</label>
                                                    <input id="balok" name="balok" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Struktur Ring Balok</label>
                                                    <input id="ring_balok" name="ring_balok" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Struktur Plat Lantai</label>
                                                    <input id="plat_lantai" name="plat_lantai" type="text"
                                                        class="form-control required">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Struktur Atap</label></label>
                                                    <input id="atap" name="atap" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Penutup Atap</label>
                                                    <input id="penutup_atap" name="penutup_atap" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Listplank Atap</label>
                                                    <input id="listplank" name="listplank" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Dokumen Perencanaan Struktur (PDF, Word, Excel,
                                                        PowerPoint)</label>
                                                    <input id="dokumen_struk" name="dokumen_struk[]" type="file"
                                                        accpet=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx"
                                                        class="form-control required" multiple>
                                                </div>
                                            </div>
                                        </div>
                                        <h2>Data Arsitektur</h2>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Dinding/Tembok</label></label>
                                                    <input id="dinding" name="dinding" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Penutup Lantai</label>
                                                    <input id="penutup_lantai" name="penutup_lantai" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Daun Pintu</label>
                                                    <input id="daun_pintu" name="daun_pintu" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Jenis Pagar</label>
                                                    <input id="jenis_pagar" name="jenis_pagar" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Luas Ruang Tebuka Hijau (%)</label>
                                                    <input id="ruang_hijau" name="ruang_hijau" type="text"
                                                        class="form-control required">
                                                </div>

                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Platfond</label></label>
                                                    <input id="platfond" name="platfond" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Kusen</label>
                                                    <input id="kusen" name="kusen" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Daun Jendela</label>
                                                    <input id="daun_jendela" name="daun_jendela" type="text"
                                                        class="form-control required">
                                                </div>

                                                <div class="form-group">
                                                    <label>Dokumen Perencanaan Arsitektur (PDF, Word, Excel,
                                                        PowerPoint)</label>
                                                    <input id="dokumen_arsi" name="dokumen_arsi[]" type="file"
                                                        accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx"
                                                        class="form-control required" multiple>
                                                </div>
                                            </div>
                                        </div>
                                        <h2>Data Mekanikal, Elektrikal & Utilitas</h2>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Sumber Listrikk</label></label>
                                                    <input id="sumber_listrik" name="sumber_listrik" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Sumber Air</label>
                                                    <input id="sumber_air" name="sumber_air" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Grounding/Pentanahan</label>
                                                    <input id="pentanahan" name="pentanahan" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Apar</label>
                                                    <input id="apar" name="apar" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Sistem Splinkler</label>
                                                    <input id="splinkler" name="splinkler" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Sistem Hyndrant</label>
                                                    <input id="hyndrant" name="hyndrant" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Smoke Detector</label>
                                                    <input id="smoke_detector" name="smoke_detector" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Tangga Darurat</label>
                                                    <input id="tangga_darurat" name="tangga_darurat" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Ventilasi</label>
                                                    <input id="ventilasi" name="ventilasi" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Air Conditioner (AC)</label>
                                                    <input id="ac" name="ac" type="text" class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Exhaust Fan</label>
                                                    <input id="exhaust" name="exhaust" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Instalasi Telephone</label>
                                                    <input id="tlp" name="tlp" type="tlp" class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Instalasi Wifi Internet</label>
                                                    <input id="wifi" name="wifi" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Instalasi Faximile</label>
                                                    <input id="faximile" name="faximile" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Instalasi TV Cable</label>
                                                    <input id="tv" name="tv" type="text" class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Instalasi Sound System/Speaker</label>
                                                    <input id="suara" name="suara" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Ramp. Pengganti Tangga 1:8 Dalam Bangunan</label>
                                                    <input id="ramp_dalam" name="ramp_dalam" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Ramp. Pengganti Tangga 1:10 Luar Bangunan</label>
                                                    <input id="ramp_luar" name="ramp_luar" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Hand Drail/Pegangan Rambatan Dalam Gedung</label>
                                                    <input id="hand_dalam" name="hand_dalam" type="text"
                                                        class="form-control required">
                                                </div>

                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Daya Listrik PLN</label></label>
                                                    <input id="daya_listrik" name="daya_listrik" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Penangkal Petir</label>
                                                    <input id="penangkal_petir" name="penangkal_petir" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Air Bersih</label>
                                                    <input id="air_bersih" name="air_bersih" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Air Kotor</label>
                                                    <input id="air_kotor" name="air_kotor" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Saluran Keliling Bangunan</label>
                                                    <input id="saluran_kel" name="saluran_kel" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Saluran Lingkungan</label></label>
                                                    <input id="saluran_ling" name="saluran_ling" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Elevator/Lift</label>
                                                    <input id="elevator" name="elevator" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Escalator</label>
                                                    <input id="escalator" name="escalator" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Tangga</label>
                                                    <input id="tangga" name="tangga" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Instalasi CCTV</label>
                                                    <input id="cctv" name="cctv" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Aparat Keamanan</label></label>
                                                    <input id="aparat" name="aparat" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Pintu Darurat</label>
                                                    <input id="pintu_darurat" name="pintu_darurat" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Rambu-Rambu Evakuasi</label>
                                                    <input id="rambu_evakuasi" name="rambu_evakuasi" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Rambu-Rambu Titik Kumpul</label>
                                                    <input id="titik_kumpul" name="titik_kumpul" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Sarana Parkir Kaum Disabilitas</label>
                                                    <input id="parkir_dis" name="parkir_dis" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Lajur Disabilitas Dalam Bangunan</label>
                                                    <input id="lajur_dis" name="lajur_dis" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Hand Drail/Pegangan Rambatan Luar Gedung</label>
                                                    <input id="hand_luar" name="hand_luar" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Toilet Disabilitas</label>
                                                    <input id="toilet_dis" name="toilet_dis" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Kursi Roda</label>
                                                    <input id="kursi_roda" name="kursi_roda" type="text"
                                                        class="form-control required">
                                                </div>
                                                <div class="form-group">
                                                    <label>Dokumen Perencanaan ME & Utilitas (PDF, Word, Excel,
                                                        PowerPoint)</label>
                                                    <input id="dokumen_me" name="dokumen_me[]" type="file"
                                                        accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx"
                                                        class="form-control required" multiple>
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