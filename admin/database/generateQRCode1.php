<html>

<head>

    <meta charset="utf-8">
    <link rel="stylesheet" href="../alert/alert/css/sweetalert.css">

</head>

<body>
    <?php
session_start();
include 'config.php';
include "../phpqrcode/qrlib.php"; 

$id = $_GET['id'];

$folder_tn = "../dokumen/donasi/";
$create_time=date("Y-m-d H:i:s",time());
 //ECC Level
            $level=QR_ECLEVEL_L;
            //Ukuran pixel
            $UkuranPixel=6;
            //Ukuran frame
            $UkuranFrame=4;
$codeContents1 ="";
$namaFile1 ="";
$tempdir = "temp/"; //Nama folder tempat menyimpan file qrcode
            if (!file_exists($tempdir)) //Buat folder bername temp
            mkdir($tempdir);

	QRcode::jpg("Testing", $tempdir."testing.png", $level, $UkuranPixel, $UkuranFrame); 

		
 $data = mysqli_query($mysqli, "select * from donasi where DONASI_ID='$id' ORDER BY CREATE_TIME DESC LIMIT 1");
    while ($d = mysqli_fetch_array($data)) {
		  $codeContents1="Metode Pembayaran 1 : ".$d['DESKRIPSI1']." No Rekening : ".$d['jumlah1'];
          $namaFile1 = rand( 0, 99999999 ) . "_". $d['DESKRIPSI1']. '.png';
	}

 
// $deskripsi_log = 'Menambahkan Data Penanganan';
// $result_log = mysqli_query( $mysqli, "INSERT INTO tb_log_activity (`nama_user`, `deskripsi`, `status`) VALUES ('$nama_user','$deskripsi_log','tambah')" );

$result = mysqli_query( $mysqli, "UPDATE `donasi` SET `QRCODE1`='$namaFile1',`UPDATE_TIME`='$create_time' WHERE DONASI_ID='$id'" );

// Show message when user added
if ( $result) {
    echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Generate QR Code Berhasil Ditambahkan',
				type: 'success',
				timer: 1500,
				showConfirmButton: true
			});		
		},20);	
	window.setTimeout(function(){ 
			window.location.replace('../donasi.php');
		} ,1500);
	  </script>";
} else {
    echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Generate QR Code Gagal Ditambahkan',
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