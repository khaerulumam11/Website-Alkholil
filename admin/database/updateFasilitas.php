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
$id = $_GET['id'];
//$dokumen_pena = 'dokumen';

$create_time=date("Y-m-d H:i:s",time());

// $deskripsi_log = 'Menambahkan Data Penanganan';
// $result_log = mysqli_query( $mysqli, "INSERT INTO tb_log_activity (`nama_user`, `deskripsi`, `status`) VALUES ('$nama_user','$deskripsi_log','tambah')" );

 $result = mysqli_query( $mysqli, "UPDATE `fasilitas` SET `DESKRIPSI1`='$deskripsi1',`DESKRIPSI2`='$deskripsi2',`DESKRIPSI3`='$deskripsi3',`DESKRIPSI4`='$deskripsi4',`JUMLAH1`='$jumlah1',`JUMLAH2`='$jumlah2',`JUMLAH3`='$jumlah3',`JUMLAH4`='$jumlah4',`UPDATE_TIME`='$create_time' WHERE FASILITAS_ID='$id'" );

// Show message when user added
if ( $result) {
    echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Data Fasilitas Berhasil Diubah',
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
				title: 'Data Fasilitas Gagal Diubah',
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