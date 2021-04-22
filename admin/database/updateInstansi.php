<html>

<head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="../alert/alert/css/sweetalert.css">

</head>

<body>
    <?php
session_start();
include 'config.php';

$id = $_POST['id'];
$kode_instansi = $_POST['kode_instansi'];
$nama_instansi = $_POST['nama_instansi'];
$deskripsi = $_POST['deskripsi'];

$nama_user = $_SESSION['nama'];
$deskripsi_log = "Mengubah Data Instansi dengan ID Instansi $id";
$result_log = mysqli_query( $mysqli, "INSERT INTO tb_log_activity (`nama_user`, `deskripsi`, `status`) VALUES ('$nama_user','$deskripsi_log','ubah')" );

$result = mysqli_query( $mysqli, "UPDATE tb_instansi SET kode_instansi='$kode_instansi',nama_instansi='$nama_instansi',deskripsi='$deskripsi' WHERE kode_instansi='$id'" );

if ( $result ) {
    echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Data Instansi Berhasil Diubah',
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
				title: 'Data Instansi Gagal Ditambahkan',
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