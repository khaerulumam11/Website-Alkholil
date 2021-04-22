<?php
session_start();

$_SESSION['id_user'] = '';
$_SESSION['username'] = '';
$_SESSION['nama'] = '';
$_SESSION['role'] = '';
$_SESSION['foto'] = '';

unset( $_SESSION['id_user'] );
unset( $_SESSION['username'] );
unset( $_SESSION['nama'] );
unset( $_SESSION['role'] );
unset( $_SESSION['foto'] );

session_unset();
session_destroy();
header( 'Location:../login.php' );