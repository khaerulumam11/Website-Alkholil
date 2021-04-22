<html>

<head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="../alert/alert/css/sweetalert.css">

</head>

<body>
    <?php
session_start();
include 'config.php';

// Check If form submitted, insert form data into users table.

$id_bangunan = $_POST['id'];

// form penanganan
// data kondisi
$id_kondisi = $_POST['id_kondisi'];
$judul_kondisi = $_POST['judul_kondisi'];
$deskripsi_kondisi = $_POST['deskripsi_kondisi'];
//$dokumen_pena = 'dokumen';

$error = array();
$extension = array( 'jpeg', 'jpg', 'png', 'gif' );

$nama_user = $_SESSION['nama'];
$deskripsi_log = 'Menambahkan Data Kondisi';
$result_log = mysqli_query( $mysqli, "INSERT INTO tb_log_activity (`nama_user`, `deskripsi`, `status`) VALUES ('$nama_user','$deskripsi_log','tambah')" );

$result8 = mysqli_query( $mysqli, "INSERT INTO `tb_kondisi`(`id_kondisi`,`judul`, `deskripsi`, `id_bangunan`) VALUES ('$id_kondisi','$judul_kondisi','$deskripsi_kondisi','$id_bangunan')" );

foreach ( $_FILES['foto_kondisi']['tmp_name'] as $key=>$tmp_name ) {
    $file_name_kondisi = $_FILES['foto_kondisi']['tmp_name'][$key];
    $file_tmp_kondisi   = rand( 0, 99999999 ) . '_' . $_FILES['foto_kondisi']['name'][$key];
    $folder_kondisi = "../dokumen/fotoKondisi/$file_tmp_kondisi";
    $ext = pathinfo( $file_tmp_kondisi, PATHINFO_EXTENSION );

    if ( in_array( $ext, $extension ) ) {
        move_uploaded_file( $file_tmp_kondisi1 = $_FILES['foto_kondisi']['tmp_name'][$key], $folder_kondisi );
        $result10 = mysqli_query( $mysqli, "INSERT INTO `gambar_kondisi`(`gbr_kon`, `id_kondisi`) VALUES ('$file_tmp_kondisi','$id_kondisi')" );
    } else {
        array_push( $error, "$file_name_kondisi, " );
    }
}

// Show message when user added
if ( $result8 && $result10 ) {
    echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Data Kondisi Berhasil Ditambahkan',
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
				title: 'Data Kondisi Gagal Ditambahkan',
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