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
$deskripsiUmum = $_POST['deskripsi'];
$program = $_POST['program'];
$id = $_GET['id'];
//$dokumen_pena = 'dokumen';

$create_time=date("Y-m-d H:i:s",time());

// $deskripsi_log = 'Menambahkan Data Penanganan';
// $result_log = mysqli_query( $mysqli, "INSERT INTO tb_log_activity (`nama_user`, `deskripsi`, `status`) VALUES ('$nama_user','$deskripsi_log','tambah')" );

 $result = mysqli_query( $mysqli, "UPDATE `program` SET `DESKRIPSI`='$deskripsiUmum',`PROGRAM`='$program',`UPDATE_TIME`='$create_time' WHERE PROGRAM_ID='$id'" );

// Show message when user added
if ( $result) {
    echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Data Program Berhasil Diubah',
				type: 'success',
				timer: 1500,
				showConfirmButton: true
			});		
		},20);	
	window.setTimeout(function(){ 
			window.location.replace('../program.php');
		} ,1500);
	  </script>";
} else {
    echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Data Program Gagal Diubah',
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