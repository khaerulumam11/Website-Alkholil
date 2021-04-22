<html>

<head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="../alert/alert/css/sweetalert.css">

</head>

<body>
    <?php
// if ( isset( $_POST['submit'] ) ) {
// include database connection file
session_start();
include 'config.php';

// form bangunan
$kd_kab = $_POST['kd_kab'];
$kd_kec = $_POST['kd_kec'];
$kd_kel = $_POST['kd_kel'];
$no_urat = $_POST['no_urat'];
$id_bangunan = $kd_kab . '-' . $kd_kec . '-' . $kd_kel . '-' . $no_urat;

$nama_bg = $_POST['nama_bg'];
$alamat_bg = $_POST['alamat_bg'];
$kecamatan = $_POST['kecamatan'];
$kelurahan = $_POST['kelurahan'];
$kota = $_POST['kota'];
$prov = $_POST['prov'];
$luas_bg = $_POST['luas_bg'];
$lantai = $_POST['lantai'];
$ketinggian_bg = $_POST['ketinggian_bg'];
$didirkan = $_POST['didirkan'];
$konstruksi = $_POST['konstruksi'];
$imb = $_POST['imb'];
$slf = $_POST['slf'];
$id_pln = $_POST['id_pln'];
$id_pdam = $_POST['id_pdam'];
$fungsi = $_POST['fungsi'];
$opd = $_POST['opd'];
$instansi = $_POST['instansi'];
$kondisi = $_POST['kondisi'];
// $foto_bg = 'test';
$koordinat = $_POST['koordinat'];
$konstruksi = $_POST['konstruksi'];

// $rand = rand();
// $ekstensi =  array( 'png', 'jpg', 'jpeg', 'gif' );
// $filename = $_FILES['file_bg']['name'];
// $ukuran = $_FILES['file_bg']['size'];
// $ext = pathinfo( $filename, PATHINFO_EXTENSION );

// $temp = $_FILES['file_bg']['tmp_name'];
// $foto_bg = rand( 0, 99999999 ) . '_' . $_FILES['file_bg']['name'];
// $size = $_FILES['file_bg']['size'];
// $type = $_FILES['file_bg']['type'];
// $folder = getcwd() . DIRECTORY_SEPARATOR . '../dokumen/fotoBangunan';
// $target_path = $folder . basename( $foto_bg );

// form tanah
$bukti_tn = $_POST['bukti_tn'];
$identitas_tn = $_POST['identitas_tn'];
$pemilik_tn = $_POST['pemilik_tn'];
$jenis_tn = $_POST['jenis_tn'];
$alamat_tn = $_POST['alamat_tn'];
$luas_tn = $_POST['luas_tn'];
$kdb = $_POST['kdb'];
$klb = $_POST['klb'];
$kdh = $_POST['kdh'];
$gmb = $_POST['gmb'];
$gsb = $_POST['gsb'];
$gbb = $_POST['gbb'];
$dokumen_tn = 'dokumen_tn';

// Apabila file berhasil di upload

//form klasifikasi
$kompleksitas = $_POST['kompleksitas'];
$permanensi = $_POST['permanensi'];
$resiko_kebakaran = $_POST['resiko_kebakaran'];
$resiko_zona = $_POST['resiko_zona'];
$lokasi_klasi = $_POST['lokasi_klasi'];
$tinggi_klasi = $_POST['tinggi_klasi'];
$milik_klasi = $_POST['milik_klasi'];

// form data teknis
$pondasi = $_POST['pondasi'];
$sloof = $_POST['sloof'];
$balok = $_POST['balok'];
$ring_balok = $_POST['ring_balok'];
$plat_lantai = $_POST['plat_lantai'];
$atap = $_POST['atap'];
$penutup_atap = $_POST['penutup_atap'];
$listplank = $_POST['listplank'];
$dokumen_struk = 'dokumen';

// data arsitektur
$dinding = $_POST['dinding'];
$penutup_lantai = $_POST['penutup_lantai'];
$daun_pintu = $_POST['daun_pintu'];
$jenis_pagar = $_POST['jenis_pagar'];
$ruang_hijau = $_POST['ruang_hijau'];
$platfond = $_POST['platfond'];
$kusen = $_POST['kusen'];
$daun_jendela = $_POST['daun_jendela'];

// data mekanikal elektrikal
$sumber_listrik = $_POST['sumber_listrik'];
$sumber_air = $_POST['sumber_air'];
$pentanahan = $_POST['pentanahan'];
$apar = $_POST['apar'];
$splinkler = $_POST['splinkler'];
$hyndrant = $_POST['hyndrant'];
$smoke_detector = $_POST['smoke_detector'];
$tangga_darurat = $_POST['tangga_darurat'];
$ventilasi = $_POST['ventilasi'];
$ac = $_POST['ac'];
$exhaust = $_POST['exhaust'];
$tlp = $_POST['tlp'];
$wifi = $_POST['wifi'];
$faximile = $_POST['faximile'];
$tv = $_POST['tv'];
$suara = $_POST['suara'];
$ramp_dalam = $_POST['ramp_dalam'];
$ramp_luar = $_POST['ramp_luar'];
$hand_dalam = $_POST['hand_dalam'];
$daya_listrik = $_POST['daya_listrik'];
$penangkal_petir = $_POST['penangkal_petir'];
$air_bersih = $_POST['air_bersih'];
$air_kotor = $_POST['air_kotor'];
$saluran_kel = $_POST['saluran_kel'];
$saluran_ling = $_POST['saluran_ling'];
$elevator = $_POST['elevator'];
$escalator = $_POST['escalator'];
$tangga = $_POST['tangga'];
$cctv = $_POST['cctv'];
$aparat = $_POST['aparat'];
$pintu_darurat = $_POST['pintu_darurat'];
$rambu_evakuasi = $_POST['rambu_evakuasi'];
$titik_kumpul = $_POST['titik_kumpul'];
$parkir_dis = $_POST['parkir_dis'];
$lajur_dis = $_POST['lajur_dis'];
$hand_luar = $_POST['hand_luar'];
$toilet_dis = $_POST['toilet_dis'];
$kursi_roda = $_POST['kursi_roda'];

$error = array();
$extension = array( 'jpeg', 'jpg', 'png', 'gif' );
$extension_doc = array( 'doc', 'docx', 'pdf', 'xls', 'xlsx', 'ppt', 'pptx' );
// Insert user data into table

$result = mysqli_query( $mysqli, "INSERT INTO tb_bagunan (`id_bangunan`, `nama`, `alamat`, `kecamatan`, `kelurahan`, `kota`, `provinsi`, `luas`, `jumlah_lantai`, `ketinggian`, `didirikan`, `selesai_konstuksi`, `imb`, `slf`, `id_pln`, `id_pdam`, `kondisi`, `koordinat`, `fungsi`, `odp`, `instruktur`) VALUES ('$id_bangunan','$nama_bg','$alamat_bg','$kecamatan','$kelurahan','$kota','$prov','$luas_bg','$lantai','$ketinggian_bg','$didirkan','$konstruksi','$imb','$slf','$id_pln','$id_pdam','$kondisi','$koordinat','$fungsi','$opd','$instansi')" );
$result2 = mysqli_query( $mysqli, "INSERT INTO tb_tanah(`no_tanah`, `nama_pemilik`, `identitas_pemilik`, `jenis`, `alamat`, `luas`, `kdb`, `klb`, `kdh`, `garis_muka`, `garis_samping`, `garis_belakang`, `id_bangunan`) VALUES ('$bukti_tn','$pemilik_tn','$identitas_tn','$jenis_tn','$alamat_tn','$luas_tn','$kdb','$klb','$kdh','$gmb','$gsb','$gbb','$id_bangunan')" );
$result3 = mysqli_query( $mysqli, "INSERT INTO tb_klasifikasi(`kompleksitas`, `permanensi`, `resiko_kebakaran`, `zonasi_gempa`, `lokasi`, `ketinggian`, `kepemilikan`, `id_bangunan`) VALUES ('$kompleksitas','$permanensi','$resiko_kebakaran','$resiko_zona','$lokasi_klasi','$tinggi_klasi','$milik_klasi','$id_bangunan')" );
$result4 = mysqli_query( $mysqli, "INSERT INTO tb_struktur(`pondasi`, `sloof`, `balok`, `ring_balok`, `plat_lantai`, `atap`, `penutup_atap`, `listplank_atap`, `id_bangunan`) VALUES ('$pondasi','$sloof','$balok','$ring_balok','$plat_lantai','$atap','$penutup_atap','$listplank','$id_bangunan')" );
$result6 = mysqli_query( $mysqli, "INSERT INTO tb_arsitektur (`dinding`, `plafond`, `lantai`, `kusen`, `pintu`, `jendela`, `pagar`, `ruang_hijau`, `id_bangunan`) VALUES ('$dinding','$platfond','$penutup_lantai','$kusen','$daun_pintu','$daun_jendela','$jenis_pagar','$ruang_hijau','$id_bangunan')" );
$result7 = mysqli_query( $mysqli, "INSERT INTO tb_mekanikal (`sumber_listrik`, `daya_listrik`, `sumber_air`, `penangkal_petir`, `pentanahan`, `air_bersih`, `air_kotor`, `saluran_keliling`, `saluran_ling`, `apar`, `splinker`, `hyndrant`, `smoke_detector`, `tangga_darurat`, `elevator`, `escalator`, `tangga`, `ventilasi`, `ac`, `exhaust`, `cctv`, `aparat`, `pintu_darurat`, `rambu_evakuasi`, `titik_kumpul`, `tlp`, `wifi`, `faximile`, `tv`, `suara`, `parkir_dis`, `lajur_dis`, `ramp_dalam`, `ramp_luar`, `hand_dalam`, `hand_luar`, `toilet_dis`, `kursi_roda`,`id_bangunan`) VALUES ('$sumber_listrik','$daya_listrik','$sumber_air','$penangkal_petir','$pentanahan','$air_bersih','$air_kotor','$saluran_kel','$saluran_ling','$apar','$splinkler','$hyndrant','$smoke_detector','$tangga_darurat','$elevator','$escalator','$tangga','$ventilasi','$ac','$exhaust','$cctv','$aparat','$pintu_darurat','$rambu_evakuasi','$titik_kumpul','$tlp','$wifi','$faximile','$tv','$suara','$parkir_dis','$lajur_dis','$ramp_dalam','$ramp_luar','$hand_dalam','$hand_luar','$toilet_dis','$kursi_roda','$id_bangunan')" );


$nama_user = $_SESSION['nama'];
$deskripsi_log = 'Menambahkan data bangunan';
$result_log = mysqli_query( $mysqli, "INSERT INTO tb_log_activity (`nama_user`, `deskripsi`, `status`) VALUES ('$nama_user','$deskripsi_log','tambah')" );

if($result){
foreach ( $_FILES['file_bg']['tmp_name'] as $key=>$tmp_name ) {
    $file_name_bg = $_FILES['file_bg']['tmp_name'][$key];
    $file_tmp_bg   = rand( 0, 99999999 ) . '_' . $_FILES['file_bg']['name'][$key];
    $folder_bg = "../dokumen/fotoBangunan/$file_tmp_bg";
    $ext = pathinfo( $file_tmp_bg, PATHINFO_EXTENSION );

    if ( in_array( $ext, $extension ) ) {
        move_uploaded_file( $file_tmp_bg1 = $_FILES['file_bg']['tmp_name'][$key], $folder_bg );
        $result9 = mysqli_query( $mysqli, "INSERT INTO `gambar_bangunan` (`gambar`,`id_bangunan`) VALUES ('$file_tmp_bg','$id_bangunan')" );
    } else {
        array_push( $error, "$file_name_bg, " );
    }
}
} else {
     echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Gambar Bangunan Gagal Ditambahkan',
				type: 'error',
				timer: 1500,
				showConfirmButton: true
			});		
		},10);	
		window.setTimeout(function(){ 
			window.history.go(-1);
		} ,1500);	
	  </script>";
}

if($result2){
foreach ( $_FILES['dokumen_tn']['tmp_name'] as $key=>$tmp_name ) {
    $file_name_tanah = $_FILES['dokumen_tn']['tmp_name'][$key];
    $file_tmp_tanah   = rand( 0, 99999999 ) . '_' . $_FILES['dokumen_tn']['name'][$key];
    $folder_tanah = "../dokumen/dokumenTanah/$file_tmp_tanah";
    $ext = pathinfo( $file_tmp_tanah, PATHINFO_EXTENSION );

    if ( in_array( $ext, $extension_doc ) ) {
        move_uploaded_file( $file_tmp_bg1 = $_FILES['dokumen_tn']['tmp_name'][$key], $folder_tanah );
        $result11 = mysqli_query( $mysqli, "INSERT INTO `dokumen_tanah` (`dokumen`,`id_bangunan`) VALUES ('$file_tmp_tanah','$id_bangunan')" );
    } else {
        array_push( $error, "$file_name_tanah, " );
    }
}
} else {
     echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Dokumen Tanah Gagal Ditambahkan',
				type: 'error',
				timer: 1500,
				showConfirmButton: true
			});		
		},10);	
		window.setTimeout(function(){ 
			window.history.go(-1);
		} ,1500);	
	  </script>";
}

if($result4){

foreach ( $_FILES['dokumen_struk']['tmp_name'] as $key=>$tmp_name ) {
    $file_name_struktur = $_FILES['dokumen_struk']['tmp_name'][$key];
    $file_tmp_struktur   = rand( 0, 99999999 ) . '_' . $_FILES['dokumen_struk']['name'][$key];
    $folder_struktur = "../dokumen/dokumenStruktur/$file_tmp_struktur";
    $ext = pathinfo( $file_tmp_struktur, PATHINFO_EXTENSION );

    if ( in_array( $ext, $extension_doc ) ) {
        move_uploaded_file( $file_tmp_bg1 = $_FILES['dokumen_struk']['tmp_name'][$key], $folder_struktur );
        $result12 = mysqli_query( $mysqli, "INSERT INTO `dokumen_struktur` (`dokument`,`id_bangunan`) VALUES ('$file_tmp_struktur','$id_bangunan')" );
    } else {
        array_push( $error, "$file_name_struktur, " );
    }
}
} else {
     echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Dokumen Struktur Gagal Ditambahkan',
				text:  'Silahkan periksa kembali data yang dimasukkan',
				type: 'error',
				timer: 1500,
				showConfirmButton: true
			});		
		},10);	
		window.setTimeout(function(){ 
			window.history.go(-1);
		} ,1500);	
	  </script>";
}

if($result6){


foreach ( $_FILES['dokumen_arsi']['tmp_name'] as $key=>$tmp_name ) {
    $file_name_arsi = $_FILES['dokumen_arsi']['tmp_name'][$key];
    $file_tmp_arsi   = rand( 0, 99999999 ) . '_' . $_FILES['dokumen_arsi']['name'][$key];
    $folder_arsi = "../dokumen/dokumenArsitektur/$file_tmp_arsi";
    $ext = pathinfo( $file_tmp_arsi, PATHINFO_EXTENSION );

    if ( in_array( $ext, $extension_doc ) ) {
        move_uploaded_file( $file_tmp_bg1 = $_FILES['dokumen_arsi']['tmp_name'][$key], $folder_arsi );
        $result13 = mysqli_query( $mysqli, "INSERT INTO `dokumen_arsitektur` (`dokumen`,`id_bangunan`) VALUES ('$file_tmp_arsi','$id_bangunan')" );
    } else {
        array_push( $error, "$file_name_arsi, " );
    }
}
} else {
     echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Dokumen Arsitektur Gagal Ditambahkan',
				type: 'error',
				timer: 1500,
				showConfirmButton: true
			});		
		},10);	
		window.setTimeout(function(){ 
			window.history.go(-1);
		} ,1500);	
	  </script>";
}

if($result7){

foreach ( $_FILES['dokumen_me']['tmp_name'] as $key=>$tmp_name ) {
    $file_name_me = $_FILES['dokumen_me']['tmp_name'][$key];
    $file_tmp_me   = rand( 0, 99999999 ) . '_' . $_FILES['dokumen_me']['name'][$key];
    $folder_me = "../dokumen/dokumenUtilitas/$file_tmp_me";
    $ext = pathinfo( $file_tmp_arsi, PATHINFO_EXTENSION );

    if ( in_array( $ext, $extension_doc ) ) {
        move_uploaded_file( $file_tmp_bg1 = $_FILES['dokumen_me']['tmp_name'][$key], $folder_me );
        $result14 = mysqli_query( $mysqli, "INSERT INTO `dokumen_mekanikal` (`dokumen`,`id_bangunan`) VALUES ('$file_tmp_me','$id_bangunan')" );
    } else {
        array_push( $error, "$file_name_me, " );
    }
}
} else {
     echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Dokumen Mekanikal Gagal Ditambahkan',
				text:  'Silahkan periksa kembali data yang dimasukkan',
				type: 'error',
				timer: 1500,
				showConfirmButton: true
			});		
		},10);	
		window.setTimeout(function(){ 
			window.history.go(-1);
		} ,1500);	
	  </script>";
}

if ( $result14 ) {
     echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Data Berhasil Ditambahkan',
				type: 'success',
				timer: 1500,
				showConfirmButton: true
			});		
		},10);	
		window.setTimeout(function(){ 
			window.history.go(-2);
		} ,1500);	
	  </script>";
} else {
  echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Data Gagal Ditambahkan',
				text:  'Silahkan periksa kembali data yang dimasukkan',
				type: 'error',
				timer: 1500,
				showConfirmButton: true
			});		
		},10);	
		window.setTimeout(function(){ 
			window.history.go(-1);
		} ,1500);	
	  </script>";
}

?>
    <script type="text/javascript" src="../alert/alert/js/jquery-2.4.1.min.js"></script>
    <script src="../alert/alert/js/sweetalert.min.js"></script>
    <script src="../alert/alert/js/qunit-1.18.0.js"></script>
</body>

</html>