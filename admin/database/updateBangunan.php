<html>

<head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="../alert/alert/css/sweetalert.css">

</head>

<body>
    <?php
session_start();
include 'config.php';
// cek bila yang diklik adalah tombol Penjumlahan ( submit1 ) {

$nama_bg = $_POST['nama_bg'];
$alamat_bg = $_POST['alamat_bg'];
$kecamatan = $_POST['kecamatan'];
$kelurahan = $_POST['kelurahan'];
$kota = $_POST['kota'];
$prov = $_POST['prov'];
$luas_bg = $_POST['luas_bg'];
$lantai = $_POST['lantai'];
$ketinggian_bg = $_POST['ketinggian_bg'];
$didirkan = $_POST['didirkan'];
$konstruksi = $_POST['konstruksi'];
$imb = $_POST['imb'];
$slf = $_POST['slf'];
$id_pln = $_POST['id_pln'];
$id_pdam = $_POST['id_pdam'];
$fungsi = $_POST['fungsi'];
$opd = $_POST['opd'];
$instansi = $_POST['instansi'];
$kondisi = $_POST['kondisi'];
$koordinat = $_POST['koordinat'];

$id = $_POST['id'];

$nama_user = $_SESSION['nama'];
$deskripsi_log = "Mengubah Data Bangunan dengan ID Bangunan $id";
$result_log = mysqli_query( $mysqli, "INSERT INTO tb_log_activity (`nama_user`, `deskripsi`, `status`) VALUES ('$nama_user','$deskripsi_log','ubah')" );

$result = mysqli_query( $mysqli, "UPDATE tb_bagunan SET `id_bangunan`='$id',`nama`='$nama_bg',`alamat`='$alamat_bg',`kecamatan`='$kecamatan',`kelurahan`='$kelurahan',`kota`='$kota',`provinsi`='$prov',`luas`='$luas_bg',`jumlah_lantai`='$lantai',`ketinggian`='$ketinggian_bg',`didirikan`='$didirkan',`selesai_konstuksi`='$konstruksi',`imb`='$imb',`slf`='$slf',`id_pln`='$id_pln',`id_pdam`='$id_pdam',`kondisi`='$kondisi',`koordinat`='$koordinat',`fungsi`='$fungsi',`odp`='$opd',`instruktur`='$instansi' WHERE id_bangunan='$id'" );

if ( $result ) {
  echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Data Bangunan Berhasil Diubah',
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
				title: 'Data Bangunan Gagal Diubah',
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