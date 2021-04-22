<?php

include 'config.php';

if ( isset( $_GET['id'] ) ) {
    $id_gambar = $_GET['id'];

    $file_folder = '../dokumen/dokumenRehab/';
    $files = array();
    // Fetech user data based on id
    $result = mysqli_query( $mysqli, "SELECT * FROM dokumen_penanganan WHERE id='$id_gambar'" );
    $row_cnt = mysqli_num_rows( $result );
    if ( $row_cnt > 0 ) {
        while ( $user_data = mysqli_fetch_array( $result ) ) {
            $dokumen = $user_data['dokumen'];
            array_push( $files, $dokumen );
        }

        $zipname = $id.'_Dokumen Penanganan.zip';
        $zip = new ZipArchive;
        $zip->open( $zipname, ZipArchive::CREATE );
        foreach ( $files as $file ) {
            $zip->addFile( $file_folder.$file );
        }
        $zip->close();
        //header( 'Cache-Control: public' );
        //header( 'Content-Description: File Transfer' );
        header( 'Content-Type: application/zip' );
        header( 'Content-disposition: attachment; filename='.$zipname );
        header( 'Content-Length: ' . filesize( $zipname ) );
        readfile( $zipname );
        unlink( $zipname );
    } else {
        $message = 'Dokumen Tanah Tidak Ditemukkan';
        echo "<script type='text/javascript'>alert('$message');window.history.go(-1);</script>";
    }
    // header( 'Content-Disposition: attachment; filename=' . basename( $file ) );
    // header( 'Content-Type: application/octet-stream;' );
    //header( 'Content-Transfer-Encoding: binary' );
    // readfile( '../dokumen/dokumenTanah/' . $file );
}