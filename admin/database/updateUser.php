<html>

<head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="../alert/alert/css/sweetalert.css">

</head>

<body>
    <?php
session_start();
include 'config.php';

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];
$id = $_POST['id'];

$rand = rand();
$lokasi_file = $_FILES['foto_user']['tmp_name'];
$nama_file   = rand( 0, 99999999 ) . '_' . $_FILES['foto_user']['name'];
$folder_tn = "../dokumen/$nama_file";

$nama_user = $_SESSION['nama'];
$deskripsi_log = "Mengubah Data User dengan ID User $id";
$result_log = mysqli_query( $mysqli, "INSERT INTO tb_log_activity (`nama_user`, `deskripsi`, `status`) VALUES ('$nama_user','$deskripsi_log','ubah')" );

// Check Apakah file ada atau tidak
if ( file_exists( $_FILES['foto_user']['tmp_name'] ) ) {
    // Jika File Tidak Ada
    if ( move_uploaded_file( $lokasi_file, $folder_tn ) ) {
        $result = mysqli_query( $mysqli, "UPDATE `tb_users` SET `nama`='$nama',`alamat`='$alamat',`telepon`='$telepon',`username`='$username',`password`='$password',`role`='$role',`foto`='$nama_file',`statusUser`='1' WHERE id_user='$id'" );

       if ( $result ) {
    echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Data Pengguna Berhasil Diubah',
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
				title: 'Data Pengguna Gagal Diubah',
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
    // Jika File Ada
  
    $result = mysqli_query( $mysqli, "UPDATE `tb_users` SET `nama`='$nama',`alamat`='$alamat',`telepon`='$telepon',`username`='$username',`password`='$password',`role`='$role',`statusUser`='1' WHERE id_user='$id'" );

    if ( $result ) {
    echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Data Pengguna Berhasil Diubah',
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
				title: 'Data Pengguna Gagal Diubah',
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
    <script type="text/javascript" src="../alert/alert/js/jquery-2.4.1.min.js"></script>
    <script src="../alert/alert/js/sweetalert.min.js"></script>
    <script src="../alert/alert/js/qunit-1.18.0.js"></script>
</body>

</html>