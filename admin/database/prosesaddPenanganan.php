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
$id_penanganan = $_POST['id_penanganan'];
$jenis_pena = $_POST['jenis_pena'];
$sumber_dana = $_POST['sumber_dana'];
$tgl_renovasi = $_POST['tgl_renovasi'];
$alokasi_dana = $_POST['alokasi_dana'];
$jenis_renovasi = $_POST['jenis_renovasi'];
$penjelasan = $_POST['penjelasan'];

//$dokumen_pena = 'dokumen';

$error = array();
$extension = array( 'jpeg', 'jpg', 'png', 'gif' );
$extension_doc = array( 'doc', 'docx', 'pdf', 'xls', 'xlsx', 'ppt', 'pptx' );

$nama_user = $_SESSION['nama'];
$deskripsi_log = 'Menambahkan Data Penanganan';
$result_log = mysqli_query( $mysqli, "INSERT INTO tb_log_activity (`nama_user`, `deskripsi`, `status`) VALUES ('$nama_user','$deskripsi_log','tambah')" );

$result = mysqli_query( $mysqli, "INSERT INTO tb_penanganan( `id_penanganan`,`jenis_penanganan`, `pendanaan`, `tgl_renovasi`, `alokasi_dana`, `jenis_renovasi`, `penjelasan`, `id_bangunan`) VALUES ('$id_penanganan','$jenis_pena', '$sumber_dana','$tgl_renovasi',' $alokasi_dana','$jenis_renovasi','$penjelasan','$id_bangunan')" );

foreach ( $_FILES['dokumen_pena']['tmp_name'] as $key=>$tmp_name ) {
    $file_name_doc = $_FILES['dokumen_pena']['tmp_name'][$key];
    $file_tmp_doc   = rand( 0, 99999999 ) . '_' . $_FILES['dokumen_pena']['name'][$key];
    $folder_doc = "../dokumen/dokumenRehab/$file_tmp_doc";
    $ext = pathinfo( $file_tmp_doc, PATHINFO_EXTENSION );

    if ( in_array( $ext, $extension_doc ) ) {
        move_uploaded_file( $file_tmp_kondisi1 = $_FILES['dokumen_pena']['tmp_name'][$key], $folder_doc );
        $result11 = mysqli_query( $mysqli, "INSERT INTO dokumen_penanganan( `dokumen`, `id_penanganan`) VALUES ('$file_tmp_doc','$id_penanganan')" );
    } else {
        array_push( $error, "$file_name_doc, " );
    }
}

foreach ( $_FILES['foto_penanganan']['tmp_name'] as $key=>$tmp_name ) {
    $file_name_pena = $_FILES['foto_penanganan']['tmp_name'][$key];
    $file_tmp_pena   = rand( 0, 99999999 ) . '_' . $_FILES['foto_penanganan']['name'][$key];
    $folder_pena = "../dokumen/fotoRehab/$file_tmp_pena";
    $ext = pathinfo( $file_tmp_pena, PATHINFO_EXTENSION );

    if ( in_array( $ext, $extension ) ) {
        move_uploaded_file( $file_tmp_kondisi1 = $_FILES['foto_penanganan']['tmp_name'][$key], $folder_pena );
        $result1 = mysqli_query( $mysqli, "INSERT INTO gambar_penanganan( `gambar`, `id_penanganan`) VALUES ('$file_tmp_pena','$id_penanganan')" );
    } else {
        array_push( $error, "$file_name_pena, " );
    }
}

// Show message when user added
if ( $result && $result11 && $result1 ) {
    echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Data Penanganan Berhasil Ditambahkan',
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
				title: 'Data Penanganan Gagal Ditambahkan',
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