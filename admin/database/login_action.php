<html>

<head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="../alert/alert/css/sweetalert.css">

</head>

<body>

    <?php
session_start();

include 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "select * from tb_users where username='" . $username . "' and password='" . $password . "'  and statusUser ='1' limit 1";
$hasil = mysqli_query( $mysqli, $sql );
$jumlah = mysqli_num_rows( $hasil );

if ( $jumlah > 0 ) {
    $row = mysqli_fetch_assoc( $hasil );
    $_SESSION['id_user'] = $row['id_user'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['nama'] = $row['nama'];
    $_SESSION['role'] = $row['role'];
    $_SESSION['foto'] = $row['foto'];

     echo "
	  <script type='text/javascript'>
		
		window.setTimeout(function(){ 
			window.location.replace('../dashboard.php');
		} ,100);	
      </script>";
      

} else {
   echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Login Failed',
				text:  'Periksa kembali username dan password',
				type: 'error',
				timer: 3000,
				showConfirmButton: true
			});		
		},10);	
		window.setTimeout(function(){ 
			window.location.replace('../login.php');
		} ,1000);	
	  </script>";
}
?>
    <script type="text/javascript" src="../alert/alert/js/jquery-1.9.1.min.js"></script>
    <script src="../alert/alert/js/sweetalert.min.js"></script>
    <script src="../alert/alert/js/qunit-1.18.0.js"></script>
</body>

</html>