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
$visi = $_POST['visi'];
$misi = $_POST['misi'];
//$dokumen_pena = 'dokumen';

$create_time=date("Y-m-d H:i:s",time());

// $deskripsi_log = 'Menambahkan Data Penanganan';
// $result_log = mysqli_query( $mysqli, "INSERT INTO tb_log_activity (`nama_user`, `deskripsi`, `status`) VALUES ('$nama_user','$deskripsi_log','tambah')" );

$result = mysqli_query( $mysqli, "INSERT INTO visi( `VISI`,`CREATE_TIME`) VALUES ('$visi','$create_time')" );

// Show message when user added
if ( $result) {
	 $data = mysqli_query($mysqli, "select * from visi where visi='$visi' ORDER BY CREATE_TIME DESC LIMIT 1");
    while ($d = mysqli_fetch_array($data)) {
		$idVisi = $d['VISI_ID'];
		  $result2 = mysqli_query( $mysqli, "INSERT INTO misi( `MISI`,VISI_ID,`CREATE_TIME`) VALUES ('$misi','$idVisi','$create_time')" );

	}
 
} 

if ( $result2) {
    echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Data Visi & Misi Berhasil Ditambahkan',
				type: 'success',
				timer: 2000,
				showConfirmButton: true
			});		
		},40);	
	window.setTimeout(function(){ 
			window.location.replace('../visimisi.php');
		} ,2000);
	  </script>";
} else {
    echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Data Visi & Misi Gagal Ditambahkan',
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