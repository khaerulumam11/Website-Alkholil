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

        // include database connection file

        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $telpon = $_POST['telepon'];
        $username = $_POST['username'];
		$password = $_POST['password'];
		
		
        $namaUser = $_SESSION['nama'];

        $rand = rand();
        $ekstensi =  array('png', 'jpg', 'jpeg', 'gif');
        $filename = $_FILES['foto_user']['name'];
        $ukuran = $_FILES['foto_user']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        $temp = $_FILES['foto_user']['tmp_name'];
        $foto = rand(0, 99999999) . "_" . $_FILES['foto_user']['name'];
        $size = $_FILES['foto_user']['size'];
        $type = $_FILES['foto_user']['type'];
        $folder = getcwd() . DIRECTORY_SEPARATOR . "../dokumen/";
        $target_path = $folder . basename($foto);
        //$folder = "dokumen/";

$deskripsi_log = "Menambahkan Data User Baru a/n $nama dari Super Admin";
$result_log = mysqli_query( $mysqli, "INSERT INTO tb_log_activity (`nama_user`, `deskripsi`, `status`) VALUES ('$namaUser','$deskripsi_log','tambah')" );


        // if ($size < 2048000 and ($type == 'image/jpeg' or $type == 'image/png')) {
            move_uploaded_file($temp, $target_path);
            $result = mysqli_query($mysqli, "INSERT INTO tb_users (`nama`, `alamat`, `telepon`, `username`, `password`, `role`, `foto`,`statusUser`) VALUES ('$nama','$alamat','$telpon','$username','$password','user','$foto','1')");

            // header("location:login.php?alert=berhasil");


            if ($result) {
                 echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Anda berhasil menambahkan data Pengguna',
				type: 'success',
				timer: 1500,
				showConfirmButton: true
			});		
		},10);	
		window.setTimeout(function(){ 
			window.location.replace('../pengguna.php');
		} ,1500);	
      </script>"; 
    } else {
                echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Anda gagal menambahkan data pengguna',
				type: 'error',
				timer: 1500,
				showConfirmButton: true
			});		
		},10);	
		window.setTimeout(function(){ 
			window.location.replace('../addPengguna.php');
		} ,1500);	
      </script>"; 
            }
        

        // // Insert user data into table
        // $result = mysqli_query($mysqli, "INSERT INTO tb_fungsi (`kode_fungsi`, `nama_fungsi`, `deskripsi`) VALUES ('$kode_fungsi','$nama_fungsi','$deskripsi')");

        // // Show message when user added
        // if($result){
        //     $message = "Data Berhasil di Simpan";
        //     echo "<script type='text/javascript'>alert('$message');</script>";
        // }

    
?>
    <script type='text/javascript' src='../alert/alert/js/jquery-1.9.1.min.js'></script>
    <script src='../alert/alert/js/sweetalert.min.js'></script>
    <script src='../alert/alert/js/qunit-1.18.0.js'></script>
</body>

</html>