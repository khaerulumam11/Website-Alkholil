<?php
session_start();
include 'config.php';
//$id = $_GET['kode_fungsi'];
$id_user = $_GET['id_user'];

$nama_user = $_SESSION['nama'];
$deskripsi_log = "Mengubah Status User dengan ID User $id ";
$result_log = mysqli_query( $mysqli, "INSERT INTO tb_log_activity (`nama_user`, `deskripsi`, `status`) VALUES ('$nama_user','$deskripsi_log','ubah')" );

$result = mysqli_query( $mysqli, "UPDATE tb_users SET statusUser ='1' WHERE id_user='$id_user'" );

header( 'Location: ../pengguna.php' );