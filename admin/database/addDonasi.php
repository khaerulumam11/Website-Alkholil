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

// form penanganan
$deskripsiUmum = $_POST['deskripsi'];
$deskripsi1 = $_POST['deskripsi1'];
$deskripsi2 = $_POST['deskripsi2'];
$deskripsi3 = $_POST['deskripsi3'];
$deskripsi4 = $_POST['deskripsi4'];
$jumlah1 = $_POST['jumlah1'];
$jumlah2 = $_POST['jumlah2'];
$jumlah3 = $_POST['jumlah3'];
$jumlah4 = $_POST['jumlah4'];
//$dokumen_pena = 'dokumen';
$folder_tn = "../dokumen/donasi/";
$create_time=date("Y-m-d H:i:s",time());
 //ECC Level
            $level=QR_ECLEVEL_H;
            //Ukuran pixel
            $UkuranPixel=10;
            //Ukuran frame
            $UkuranFrame=4;


 $codeContents1="Metode Pembayaran 1 : ".$_POST['deskripsi1']." No Rekening : ".$_POST['jumlah1'];
 $codeContents2="Metode Pembayaran 2 : ".$_POST['deskripsi2']." No Rekening : ".$_POST['jumlah2'];
 $codeContents3="Metode Pembayaran 3 : ".$_POST['deskripsi3']." No Rekening : ".$_POST['jumlah3'];
 $codeContents4="Metode Pembayaran 4 : ".$_POST['deskripsi4']." No Rekening : ".$_POST['jumlah4'];

 $namaFile1 = rand( 0, 99999999 ) . "_". $_POST['deskripsi1']. '.png';
 $namaFile2 = rand( 0, 99999999 ) . "_". $_POST['deskripsi2']. '.png';
 $namaFile3 = rand( 0, 99999999 ) .  "_".$_POST['deskripsi3']. '.png';
 $namaFile4 = rand( 0, 99999999 ) . "_". $_POST['deskripsi4']. '.png';


//  QRcode::png($codeContents1, $folder_tn.$namaFile1, $level, $UkuranPixel, $UkuranFrame); 
//  QRcode::png($codeContents2, $folder_tn.$namaFile2, $level, $UkuranPixel, $UkuranFrame); 
//  QRcode::png($codeContents3, $folder_tn.$namaFile3, $level, $UkuranPixel, $UkuranFrame); 
//  QRcode::png($codeContents4, $folder_tn.$namaFile4, $level, $UkuranPixel, $UkuranFrame); 

// $deskripsi_log = 'Menambahkan Data Penanganan';
// $result_log = mysqli_query( $mysqli, "INSERT INTO tb_log_activity (`nama_user`, `deskripsi`, `status`) VALUES ('$nama_user','$deskripsi_log','tambah')" );

$result = mysqli_query( $mysqli, "INSERT INTO donasi( `DESKRIPSI_UMUM`,`DESKRIPSI1`,`DESKRIPSI2`,`DESKRIPSI3`,`DESKRIPSI4`,`JUMLAH1`,`JUMLAH2`,`JUMLAH3`,`JUMLAH4`,`QRCODE1`,`QRCODE2`,`QRCODE3`,`QRCODE4`,`CREATE_TIME`) VALUES ('$deskripsiUmum','$deskripsi1','$deskripsi2','$deskripsi3','$deskripsi4','$jumlah1','$jumlah2','$jumlah3','$jumlah4','$namaFile1','$namaFile2','$namaFile3','$namaFile4','$create_time')" );

// Show message when user added
if ( $result) {
    echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Data Donasi Berhasil Ditambahkan',
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
				title: 'Data Donasi Gagal Ditambahkan',
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