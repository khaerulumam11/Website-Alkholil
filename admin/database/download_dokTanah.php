<?php

$file = $_REQUEST['file'];

header( 'Cache-Control: public' );
header( 'Content-Description: File Transfer' );
header( 'Content-Type: application/octet-stream;' );
header( 'Content-Disposition: attachment; filename=' . basename( $file ) );
header( 'Expires: 0' );
header( 'Cache-Control: private' );
header( 'Pragma: private' );
header( 'Content-Transfer-Encoding: binary' );
ob_clean();
flush();
readfile( '../dokumen/dokumenTanah/' . $file );