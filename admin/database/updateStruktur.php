<html>

<head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="../alert/alert/css/sweetalert.css">

</head>

<body>
    <?php
session_start();
include 'config.php';

$pondasi = $_POST['pondasi'];
$sloof = $_POST['sloof'];
$balok = $_POST['balok'];
$ring_balok = $_POST['ring_balok'];
$plat_lantai = $_POST['plat_lantai'];
$atap = $_POST['atap'];
$penutup_atap = $_POST['penutup_atap'];
$listplank_atap = $_POST['listplank_atap'];

$id = $_POST['id'];

// $result = mysqli_query( $mysqli, "UPDATE tb_fungsi SET kode_fungsi='$kode_fungsi',nama_fungsi='$nama_fungsi',deskripsi='$deskripsi' WHERE kode_fungsi='$id'" );

// Check Apakah file ada atau tidak

$nama_user = $_SESSION['nama'];
$deskripsi_log = "Mengubah Data Struktur dengan ID Struktur $id";
$result_log = mysqli_query( $mysqli, "INSERT INTO tb_log_activity (`nama_user`, `deskripsi`, `status`) VALUES ('$nama_user','$deskripsi_log','ubah')" );

$result = mysqli_query( $mysqli, "UPDATE `tb_struktur` SET `pondasi`='$pondasi',`sloof`='$sloof',`balok`='$balok',`ring_balok`='$ring_balok',`plat_lantai`='$plat_lantai',`atap`='$atap',`penutup_atap`='$penutup_atap',`listplank_atap`='$listplank_atap' WHERE id_bangunan='$id'" );

if ( $result ) {
    echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Data Struktur Berhasil Diubah',
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
				title: 'Data Struktur Gagal Diubah',
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