<html>

<head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="../alert/alert/css/sweetalert.css">

</head>

<body>
    <?php
session_start();
include 'config.php';

$dinding = $_POST['dinding'];
$lantai_arsi = $_POST['lantai_arsi'];
$daun_pintu = $_POST['daun_pintu'];
$pagar = $_POST['pagar'];
$ruang_hijau = $_POST['ruang_hijau'];
$plafond = $_POST['plafond'];
$kusen = $_POST['kusen'];
$jendela = $_POST['jendela'];
$id = $_POST['id'];

// $result = mysqli_query( $mysqli, "UPDATE tb_fungsi SET kode_fungsi='$kode_fungsi',nama_fungsi='$nama_fungsi',deskripsi='$deskripsi' WHERE kode_fungsi='$id'" );

// Check Apakah file ada atau tidak

$nama_user = $_SESSION['nama'];
$deskripsi_log = "Mengubah Data Arsitektur dengan ID Arsitektur $id";
$result_log = mysqli_query( $mysqli, "INSERT INTO tb_log_activity (`nama_user`, `deskripsi`, `status`) VALUES ('$nama_user','$deskripsi_log','ubah')" );

$result = mysqli_query( $mysqli, "UPDATE `tb_arsitektur` SET `dinding`='$dinding',`plafond`='$plafond',`lantai`='$lantai_arsi',`kusen`='$kusen',`pintu`='$daun_pintu',`jendela`='$jendela',`pagar`='$pagar',`ruang_hijau`='$ruang_hijau' WHERE id_bangunan='$id'" );

if ( $result ) {
    echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Data Arsitektur Berhasil Diubah',
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
				title: 'Data Arsitektur Gagal Diubah',
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