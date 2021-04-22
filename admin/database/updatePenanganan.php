<html>

<head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="../alert/alert/css/sweetalert.css">

</head>

<body>
    <?php
session_start();
include 'config.php';

$jenis_pena = $_POST['jenis_pena'];
$sumber_dana = $_POST['sumber_dana'];
$tgl_renovasi = $_POST['tgl_renovasi'];
$alokasi_dana = $_POST['alokasi_dana'];
$jenis_renovasi = $_POST['jenis_renovasi'];
$penjelasan = $_POST['penjelasan'];
$id = $_POST['id'];

// $result = mysqli_query( $mysqli, "UPDATE tb_fungsi SET kode_fungsi='$kode_fungsi',nama_fungsi='$nama_fungsi',deskripsi='$deskripsi' WHERE kode_fungsi='$id'" );

// Check Apakah file ada atau tidak

$nama_user = $_SESSION['nama'];
$deskripsi_log = "Mengubah Data Penanganan dengan ID Penanganan $id";
$result_log = mysqli_query( $mysqli, "INSERT INTO tb_log_activity (`nama_user`, `deskripsi`, `status`) VALUES ('$nama_user','$deskripsi_log','ubah')" );

$result = mysqli_query( $mysqli, "UPDATE `tb_penanganan` SET `jenis_penanganan`='$jenis_pena',`pendanaan`='$sumber_dana',`tgl_renovasi`='$tgl_renovasi',`alokasi_dana`='$alokasi_dana',`jenis_renovasi`='$jenis_renovasi',`penjelasan`='$penjelasan' WHERE id_penanganan='$id'" );

if ( $result ) {
    echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Data Penanganan Berhasil Diubah',
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
				title: 'Data Penanganan Gagal Diubah',
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
    <script type="text/javascript" src="../alert/alert/js/jquery-2.4.1.min.js"></script>
    <script src="../alert/alert/js/sweetalert.min.js"></script>
    <script src="../alert/alert/js/qunit-1.18.0.js"></script>
</body>

</html>