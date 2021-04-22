<html>

<head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="../alert/alert/css/sweetalert.css">

</head>

<body>
    <?php
session_start();
include 'config.php';

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

$id = $_POST['id'];

$nama_user = $_SESSION['nama'];
$deskripsi_log = "Mengubah Data Mekanikal dengan ID Mekanikal $id";
$result_log = mysqli_query( $mysqli, "INSERT INTO tb_log_activity (`nama_user`, `deskripsi`, `status`) VALUES ('$nama_user','$deskripsi_log','ubah')" );

$result = mysqli_query( $mysqli, "UPDATE `tb_mekanikal` SET `sumber_listrik`='$sumber_listrik',`daya_listrik`='$daya_listrik',`sumber_air`='$sumber_air',`penangkal_petir`='$penangkal_petir',`air_bersih`='$air_bersih'
        ,`air_kotor`='$air_kotor',`saluran_keliling`='$saluran_kel',`saluran_ling`='$saluran_ling',`apar`='$apar',`splinker`='$splinkler',
        `hyndrant`='$hyndrant',`pentanahan`='$pentanahan',`smoke_detector`='$smoke_detector',`tangga_darurat`='$tangga_darurat',`elevator`='$elevator',`escalator`='$escalator',`tangga`='$tangga'
        ,`ventilasi`='$ventilasi',`ac`='$ac',`exhaust`='$exhaust' ,`cctv`='$cctv' ,`aparat`='$aparat' ,`pintu_darurat`='$pintu_darurat' ,`rambu_evakuasi`='$rambu_evakuasi' ,`titik_kumpul`='$titik_kumpul' ,`tlp`='$tlp' 
        ,`wifi`='$wifi' ,`faximile`='$faximile',`suara`='$suara',`tv`='$tv' ,`parkir_dis`='$parkir_dis',`lajur_dis`='$lajur_dis' ,`ramp_dalam`='$ramp_dalam',`ramp_luar`='$ramp_luar' ,`hand_dalam`='$hand_dalam',`hand_luar`='$hand_luar' ,`toilet_dis`='$toilet_dis',`kursi_roda`='$kursi_roda' WHERE id_bangunan='$id'" );

if ( $result ) {
    echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Data Mekanikal Berhasil Diubah',
				type: 'success',
				timer: 1500,
				showConfirmButton: true
			});		
		},20);	
		window.setTimeout(function(){ 
			window.history.go(-2);
		} ,1500);	
	  </script>";
} else {
    echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Data Mekanikal Gagal Diubah',
				type: 'error',
				timer: 1500,
				showConfirmButton: true
			});		
		},20);	
		window.setTimeout(function(){ 
			window.history.go(-1);
		} ,1500);	
	  </script>";
}
?>
    <script type='text/javascript' src='../alert/alert/js/jquery-2.4.1.min.js'></script>
    <script src='../alert/alert/js/sweetalert.min.js'></script>
    <script src='../alert/alert/js/qunit-1.18.0.js'></script>
</body>

</html>