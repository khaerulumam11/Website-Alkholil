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
$judul = $_POST['judul'];
$profile = $_POST['profile'];
//$dokumen_pena = 'dokumen';

$create_time=date("Y-m-d H:i:s",time());
$id = $_GET['id'];

//$dokumen_pena = 'dokumen';

$create_time=date("Y-m-d H:i:s",time());

// $deskripsi_log = 'Menambahkan Data Penanganan';
// $result_log = mysqli_query( $mysqli, "INSERT INTO tb_log_activity (`nama_user`, `deskripsi`, `status`) VALUES ('$nama_user','$deskripsi_log','tambah')" );
if ($_FILES['foto_beranda']['size'] > 0) {
$rand = rand();
$lokasi_file = $_FILES['foto_beranda']['tmp_name'];
$nama_file   = rand( 0, 99999999 ) . '_' . $_FILES['foto_beranda']['name'];
$folder_tn = "../dokumen/fotoBeranda/$nama_file";
if ( move_uploaded_file( $lokasi_file, $folder_tn ) ) {
 $result = mysqli_query( $mysqli, "UPDATE `beranda` SET `JUDUL`='$judul',`PROFIL`='$profile',`GAMBAR`='$nama_file',`UPDATE_TIME`='$create_time' WHERE BERANDA_ID='$id'" );

// Show message when user added
if ( $result) {
    echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Data Beranda Berhasil Diubah',
				type: 'success',
				timer: 1500,
				showConfirmButton: true
			});		
		},20);	
	window.setTimeout(function(){ 
			window.location.replace('../dataBeranda.php');
		} ,1500);
	  </script>";
} else {
    echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Data Beranda Gagal Diubah',
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
}
} else {
$result = mysqli_query( $mysqli, "UPDATE `beranda` SET `JUDUL`='$judul',`PROFIL`='$profile',`UPDATE_TIME`='$create_time' WHERE BERANDA_ID='$id'" );

// Show message when user added
if ( $result) {
    echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Data Beranda Berhasil Diubah',
				type: 'success',
				timer: 1500,
				showConfirmButton: true
			});		
		},20);	
	window.setTimeout(function(){ 
			window.location.replace('../dataBeranda.php');
		} ,1500);
	  </script>";
} else {
    echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Data Beranda Gagal Diubah',
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
}

?>
    <script type='text/javascript' src='../alert/alert/js/jquery-1.9.1.min.js'></script>
    <script src='../alert/alert/js/sweetalert.min.js'></script>
    <script src='../alert/alert/js/qunit-1.18.0.js'></script>
</body>

</html>