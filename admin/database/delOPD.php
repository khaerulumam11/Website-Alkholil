<html>

<head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="../alert/alert/css/sweetalert.css">

</head>

<body>
    <?php
// koneksi database
session_start();
include 'config.php';

// menangkap data id yang di kirim dari url
$id = $_GET['kode_opd'];

$nama_user = $_SESSION['nama'];
$deskripsi_log = "Menghapus Data OPD dengan ID OPD $id ";
$result_log = mysqli_query( $mysqli, "INSERT INTO tb_log_activity (`nama_user`, `deskripsi`, `status`) VALUES ('$nama_user','$deskripsi_log','hapus')" );

// menghapus data dari database
$result = mysqli_query( $mysqli, "delete from tb_opd where kode_opd='$id'" );

// mengalihkan halaman kembali ke index.php
if ( $result ) {
    echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Data OPD Berhasil Dihapus',
				type: 'success',
				timer: 1500,
				showConfirmButton: true
			});		
		},20);	
		window.setTimeout(function(){ 
		window.location.replace('../opd.php');
		} ,1500);	
	  </script>";
} else {
      echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Data OPD Gagal Dihapus',
				type: 'danger',
				timer: 1500,
				showConfirmButton: true
			});		
		},20);	
		window.setTimeout(function(){ 
		window.location.replace('../opd.php');
		} ,1500);	
	  </script>";
}

?>

    <script type='text/javascript' src='../alert/alert/js/jquery-1.9.1.min.js'></script>
    <script src='../alert/alert/js/sweetalert.min.js'></script>
    <script src='../alert/alert/js/qunit-1.18.0.js'></script>
</body>

</html>