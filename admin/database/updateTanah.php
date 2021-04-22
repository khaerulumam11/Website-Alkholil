<html>

<head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="../alert/alert/css/sweetalert.css">

</head>

<body>
    <?php
session_start();
include 'config.php';

$no_tanah = $_POST['no_tanah'];
$nama_pemilik = $_POST['nama_pemilik'];
$identitas_pemilik = $_POST['identitas_pemilik'];
$jenis = $_POST['jenis'];
$alamat_tanah = $_POST['alamat_tanah'];
$luas_tanah = $_POST['luas_tanah'];
$kdb = $_POST['kdb'];
$klb = $_POST['klb'];
$kdh = $_POST['kdh'];
$garis_muka = $_POST['garis_muka'];
$garis_samping = $_POST['garis_samping'];
$garis_belakang = $_POST['garis_belakang'];
// $dokumen_lama = $_POST['dokumen_lama'];
$id = $_POST['id'];

$nama_user = $_SESSION['nama'];
$deskripsi_log = "Mengubah Data Tanah dengan ID Tanah $id";
$result_log = mysqli_query( $mysqli, "INSERT INTO tb_log_activity (`nama_user`, `deskripsi`, `status`) VALUES ('$nama_user','$deskripsi_log','ubah')" );

// $rand = rand();
// $lokasi_file = $_FILES['dokumen_tanah']['tmp_name'];
// $nama_file   = rand( 0, 99999999 ) . '_' . $_FILES['dokumen_tanah']['name'];
// $folder_tn = "../dokumen/dokumenTanah/$nama_file";

$result = mysqli_query( $mysqli, "UPDATE `tb_tanah` SET `no_tanah`='$no_tanah',`nama_pemilik`='$nama_pemilik',`identitas_pemilik`='$identitas_pemilik',`jenis`='$jenis',`alamat`='$alamat_tanah',`luas`='$luas_tanah',`kdb`='$kdb',`klb`='$klb',`kdh`='$kdh',`garis_muka`='$garis_muka',`garis_samping`='$garis_samping',`garis_belakang`='$garis_belakang' WHERE id_bangunan='$id'" );

// Check Apakah file ada atau tidak
// if ( file_exists( $_FILES['dokumen_tanah']['tmp_name'] ) ) {
//     // Jika File Tidak Ada
//     if ( move_uploaded_file( $lokasi_file, $folder_tn ) ) {
//         $result = mysqli_query( $mysqli, "UPDATE `tb_tanah` SET `no_tanah`='$no_tanah',`nama_pemilik`='$nama_pemilik',`identitas_pemilik`='$identitas_pemilik',`jenis`='$jenis',`alamat`='$alamat_tanah',`luas`='$luas_tanah',`kdb`='$kdb',`klb`='$klb',`kdh`='$kdh',`garis_muka`='$garis_muka',`garis_samping`='$garis_samping',`garis_belakang`='$garis_belakang',`dokumen`='$nama_file' WHERE id_bangunan='$id'" );

//         if ( $result ) {
//             $message = 'Data dan foto Berhasil di Simpan';
//             echo "<script type='text/javascript'>alert('$message');window.history.go(-2);</script>";
//         } else {
//             echo '<b>Gagal Upload File</b>';
//         }
//     }
// } else {
//     // Jika File Ada
//     $temp_foto = $dokumen_lama;
//     $result = mysqli_query( $mysqli, "UPDATE `tb_tanah` SET `no_tanah`='$no_tanah',`nama_pemilik`='$nama_pemilik',`identitas_pemilik`='$identitas_pemilik',`jenis`='$jenis',`alamat`='$alamat_tanah',`luas`='$luas_tanah',`kdb`='$kdb',`klb`='$klb',`kdh`='$kdh',`garis_muka`='$garis_muka',`garis_samping`='$garis_samping',`garis_belakang`='$garis_belakang',`dokumen`='$temp_foto' WHERE id_bangunan='$id'" );

if ( $result ) {
    echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Data Tanah Berhasil Diubah',
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
				title: 'Data Tanah Gagal Diubah',
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