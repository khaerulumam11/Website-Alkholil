<html>

<head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="../alert/alert/css/sweetalert.css">

</head>

<body>
    <?php
session_start();
include 'config.php';

$kompleksitas = $_POST['kompleksitas'];
$permanensi = $_POST['permanensi'];
$resiko_kebakaran = $_POST['resiko_kebakaran'];
$zonasi_gempa = $_POST['zonasi_gempa'];
$lokasi = $_POST['lokasi'];
$ketinggian_klasi = $_POST['ketinggian_klasi'];
$kepemilikan_klasi = $_POST['kepemilikan_klasi'];

$id = $_POST['id'];

// $result = mysqli_query( $mysqli, "UPDATE tb_fungsi SET kode_fungsi='$kode_fungsi',nama_fungsi='$nama_fungsi',deskripsi='$deskripsi' WHERE kode_fungsi='$id'" );
$nama_user = $_SESSION['nama'];
$deskripsi_log = "Mengubah Data Klasifikasi dengan ID Klasifikasi $id";
$result_log = mysqli_query( $mysqli, "INSERT INTO tb_log_activity (`nama_user`, `deskripsi`, `status`) VALUES ('$nama_user','$deskripsi_log','ubah')" );

$result = mysqli_query( $mysqli, "UPDATE `tb_klasifikasi` SET `kompleksitas`='$kompleksitas',`permanensi`='$permanensi',`resiko_kebakaran`='$resiko_kebakaran',`zonasi_gempa`='$zonasi_gempa',`lokasi`='$lokasi',`ketinggian`='$ketinggian_klasi',`kepemilikan`='$kepemilikan_klasi' WHERE id_bangunan='$id'" );

if ( $result ) {
    echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Data Klasifikasi Berhasil Diubah',
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
				title: 'Data Klasifikasi Gagal Diubah',
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