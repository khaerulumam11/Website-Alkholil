<html>

<head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="../alert/alert/css/sweetalert.css">

</head>

<body>
    <?php
session_start();
include 'config.php';

// form penanganan
$deskripsi1 = $_POST['deskripsi1'];
$deskripsi2 = $_POST['deskripsi2'];
$deskripsi3 = $_POST['deskripsi3'];
$deskripsi4 = $_POST['deskripsi4'];
$jumlah1 = $_POST['jumlah1'];
$jumlah2 = $_POST['jumlah2'];
$jumlah3 = $_POST['jumlah3'];
$jumlah4 = $_POST['jumlah4'];
//$dokumen_pena = 'dokumen';

$create_time=date("Y-m-d H:i:s",time());

// $deskripsi_log = 'Menambahkan Data Penanganan';
// $result_log = mysqli_query( $mysqli, "INSERT INTO tb_log_activity (`nama_user`, `deskripsi`, `status`) VALUES ('$nama_user','$deskripsi_log','tambah')" );

$result = mysqli_query( $mysqli, "INSERT INTO fasilitas( `DESKRIPSI1`,`DESKRIPSI2`,`DESKRIPSI3`,`DESKRIPSI4`,`JUMLAH1`,`JUMLAH2`,`JUMLAH3`,`JUMLAH4`,`CREATE_TIME`) VALUES ('$deskripsi1','$deskripsi2','$deskripsi3','$deskripsi4','$jumlah1','$jumlah2','$jumlah3','$jumlah4','$create_time')" );

// Show message when user added
if ( $result) {
    echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Data Fasilitas Berhasil Ditambahkan',
				type: 'success',
				timer: 1500,
				showConfirmButton: true
			});		
		},20);	
	window.setTimeout(function(){ 
			window.location.replace('../fasilitas.php');
		} ,1500);
	  </script>";
} else {
    echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Data Fasilitas Gagal Ditambahkan',
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
    <script type='text/javascript' src='../alert/alert/js/jquery-1.9.1.min.js'></script>
    <script src='../alert/alert/js/sweetalert.min.js'></script>
    <script src='../alert/alert/js/qunit-1.18.0.js'></script>
</body>

</html>