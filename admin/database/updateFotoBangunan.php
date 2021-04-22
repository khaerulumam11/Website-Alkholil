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

$error = array();
$extension = array( 'jpeg', 'jpg', 'png', 'gif' );
$extension_doc = array( 'doc', 'docx', 'pdf', 'xls', 'xlsx', 'ppt', 'pptx' );

// $result = mysqli_query( $mysqli, "UPDATE tb_fungsi SET kode_fungsi='$kode_fungsi',nama_fungsi='$nama_fungsi',deskripsi='$deskripsi' WHERE kode_fungsi='$id'" );
$nama_user = $_SESSION['nama'];
$deskripsi_log = "Menambahkan Foto Bangunan dengan ID Bangunan $id";
$result_log = mysqli_query( $mysqli, "INSERT INTO tb_log_activity (`nama_user`, `deskripsi`, `status`) VALUES ('$nama_user','$deskripsi_log','tambah')" );

// Check Apakah file ada atau tidak
// Jika File Tidak Ada
foreach ( $_FILES['file']['tmp_name'] as $key=>$tmp_name ) {
    $file_name_bg = $_FILES['file']['tmp_name'][$key];
    $file_tmp_bg   = rand( 0, 99999999 ) . '_' . $_FILES['file']['name'][$key];
    $folder_bg = "../dokumen/fotoBangunan/$file_tmp_bg";
    $ext = pathinfo( $file_tmp_bg, PATHINFO_EXTENSION );

    if ( in_array( $ext, $extension ) ) {
        move_uploaded_file( $file_tmp_bg1 = $_FILES['file']['tmp_name'][$key], $folder_bg );
        $result = mysqli_query( $mysqli, "INSERT INTO `gambar_bangunan` (`gambar`,`id_bangunan`) VALUES ('$file_tmp_bg','$id')" );
    } else {
        array_push( $error, "$file_name_bg, " );
    }
}

if ( $result ) {
    echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Foto Bangunan Berhasil Ditambahkan',
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
				title: 'Foto Bangunan Gagal Ditambahkan',
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