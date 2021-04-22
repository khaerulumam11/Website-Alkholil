<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon_2.png">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="login/assets/css/login.css">
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css"
        rel="stylesheet" type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="alert/alert/css/sweetalert.css">


</head>

<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div style="width:100%">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-6">
                        <img src="login/assets/images/login.jpg" alt="login" class="login-card-img">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <img src="DPUPR/assets/img/logo/logo2.svg" height=50px alt="logo"
                                    style="margin-bottom:5%">
                            </div>
                            <p class="login-card-description">Daftar Sekarang</p>
                            <form action="register.php" method="post" enctype="multipart/form-data"
                                style="width:100%; margin-top:3%">
                                <div class="form-group" style="width=200%">
                                    <img src="img/img_avatar.png" style="border-radius:50%" class="img" name="avatar"
                                        id="avatar" alt="" width="150">
                                </div>

                                <div class="form-group">
                                    <input id="foto_user" onchange="readURL(this);" name="foto_user" type="file"
                                        class="required">
                                </div>

                                <div class="form-group">

                                    <input type="text" class="form-control" placeholder="Username" required=""
                                        name="username">
                                </div>

                                <div class="form-group">

                                    <input type="text" class="form-control" placeholder="Nama" required="" name="nama">
                                </div>
                                <div class="form-group">

                                    <input type="text" class="form-control" placeholder="Alamat" required=""
                                        name="alamat">
                                </div>
                                <div class="form-group">

                                    <input type="text" class="form-control" placeholder="Telepon" required=""
                                        name="telpon">
                                </div>
                                <div class="form-group">

                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Email address">
                                </div>
                                <div class="form-group mb-4">

                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="***********">
                                </div>
                                <input name="submit" id="login" class="btn btn-block login-btn mb-4" type="submit"
                                    value="Daftar" style="background-color:#1ab394">
                            </form>
                            <p class="login-card-footer-text">Sudah ada akun ? <a href="login.php"
                                    class="text-reset">Masuk
                                    Disini</a></p>

                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="card login-card">
        <img src="assets/images/login.jpg" alt="login" class="login-card-img">
        <div class="card-body">
          <h2 class="login-card-title">Login</h2>
          <p class="login-card-description">Sign in to your account to continue.</p>
          <form action="#!">
            <div class="form-group">
              <label for="email" class="sr-only">Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="password" class="sr-only">Password</label>
              <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-prompt-wrapper">
              <div class="custom-control custom-checkbox login-card-check-box">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember me</label>
              </div>              
              <a href="#!" class="text-reset">Forgot password?</a>
            </div>
            <input name="login" id="login" class="btn btn-block login-btn mb-4" type="button" value="Login">
          </form>
          <p class="login-card-footer-text">Don't have an account? <a href="#!" class="text-reset">Register here</a></p>
        </div>
      </div> -->
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../alert/alert/js/jquery-1.9.1.min.js"></script>
    <script src="alert/alert/js/sweetalert.min.js"></script>
    <script src="alert/alert/js/qunit-1.18.0.js"></script>
    <script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#avatar')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
</body>

<?php
if (isset($_POST['submit'])) {
        // include database connection file
        include 'database/config.php';


        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $telpon = $_POST['telpon'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $rand = rand();
        $ekstensi =  array('png', 'jpg', 'jpeg', 'gif');
        $filename = $_FILES['foto_user']['name'];
        $ukuran = $_FILES['foto_user']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        $temp = $_FILES['foto_user']['tmp_name'];
        $foto = rand(0, 99999999) . "_" . $_FILES['foto_user']['name'];
        $size = $_FILES['foto_user']['size'];
        $type = $_FILES['foto_user']['type'];
        $folder = getcwd() . DIRECTORY_SEPARATOR . "dokumen/";
        $target_path = $folder . basename($foto);
        //$folder = "dokumen/";

$deskripsi_log = "Registrasi Data User Baru a/n $nama, silahkan lakukan aktivasi untuk user tersebut.";
$result_log = mysqli_query( $mysqli, "INSERT INTO tb_log_activity (`nama_user`, `deskripsi`, `status`) VALUES ('$nama','$deskripsi_log','tambah')" );


        // if ($size < 2048000 and ($type == 'image/jpeg' or $type == 'image/png')) {
            move_uploaded_file($temp, $target_path);
            $result = mysqli_query($mysqli, "INSERT INTO tb_users (`nama`, `alamat`, `telepon`, `username`, `password`, `role`, `foto`,`statusUser`) VALUES ('$nama','$alamat','$telpon','$username','$password','user','$foto','0')");

            // header("location:login.php?alert=berhasil");


            if ($result) {
                 echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Anda berhasil mendaftar',
				text:  'Silahkan menghubungi admin untuk melakukan aktifasi',
				type: 'success',
				timer: 1500,
				showConfirmButton: true
			});		
		},10);	
		window.setTimeout(function(){ 
			window.location.replace('login.php');
		} ,1500);	
      </script>"; 
    } else {
               echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
			title: 'Anda gagal mendaftar',
				type: 'error',
				timer: 1500,
				showConfirmButton: true
			});		
		},10);	
		window.setTimeout(function(){ 
			window.location.replace('registrasi.php');
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

    }
    ?>

</html>