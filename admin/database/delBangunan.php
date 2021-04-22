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
$id = $_GET['id_bangunan'];

$nama_user = $_SESSION['nama'];
$deskripsi_log = "Menghapus data bangunan dengan ID Bangunan $id";
$result_log = mysqli_query( $mysqli, "INSERT INTO tb_log_activity (`nama_user`, `deskripsi`, `status`) VALUES ('$nama_user','$deskripsi_log','hapus')" );

// menghapus data dari database
$result = mysqli_query( $mysqli, "delete from tb_bagunan where id_bangunan='$id'" );
$result2 = mysqli_query( $mysqli, "delete from tb_tanah where id_bangunan='$id'" );
$result3 = mysqli_query( $mysqli, "delete from tb_struktur where id_bangunan='$id'" );
$result4 = mysqli_query( $mysqli, "delete from tb_penanganan where id_bangunan='$id'" );
$result5 = mysqli_query( $mysqli, "delete from tb_klasifikasi where id_bangunan='$id'" );
$result6 = mysqli_query( $mysqli, "delete from tb_arsitektur where id_bangunan='$id'" );
$result7 = mysqli_query( $mysqli, "delete from tb_mekanikal where id_bangunan='$id'" );

$result8 = mysqli_query( $mysqli, "delete from dokumen_arsitektur where id_bangunan='$id'" );

$result9 = mysqli_query( $mysqli, "delete from dokumen_mekanikal where id_bangunan='$id'" );

$result10 = mysqli_query( $mysqli, "delete from dokumen_struktur where id_bangunan='$id'" );

$result11 = mysqli_query( $mysqli, "delete from dokumen_tanah where id_bangunan='$id'" );

$result12 = mysqli_query( $mysqli, "delete from gambar_bangunan where id_bangunan='$id'" );


// mengalihkan halaman kembali ke index.php
if($result){
     echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Data Bangunan Berhasil Dihapus',
				type: 'success',
				timer: 1500,
				showConfirmButton: true
			});		
		},20);	
		window.setTimeout(function(){ 
			window.history.go(-1);
		} ,1500);	
	  </script>";
} else {
    echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Data Bangunan Gagal Dihapus',
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