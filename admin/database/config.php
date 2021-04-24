<?php

$databaseHost = 'localhost';
$databaseName = 'db_alkholil';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect( $databaseHost, $databaseUsername, $databasePassword, $databaseName );

if ( mysqli_connect_errno() ) {
    echo'Koneksi Gagal:'.mysqli_connect_error();
} else {
}
error_reporting( 0 );

?>