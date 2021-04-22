<?php
include 'config.php';

if ( isset( $_GET['id_bangunan'] ) ) {
    $id = $_GET['id_bangunan'];

    $file_folder = '../dokumen/dokumenArsitektur/';
    $files1 = array();
    // Fetech user data based on id
    $result = mysqli_query( $mysqli, "SELECT * FROM dokumen_arsitektur WHERE id_bangunan='$id'" );
    $row_cnt = mysqli_num_rows( $result );
    if ( $row_cnt > 0 ) {
        while ( $user_data = mysqli_fetch_array( $result ) ) {
            $dokumen = $user_data['id'];
            array_push( $files1, $dokumen );
        }

        $zipname = $id.'_Dokumen Arsitektur.zip';
        $zip = new ZipArchive;
        $zip->open( $zipname, ZipArchive::CREATE );
        foreach ( $files1 as $file ) {
            $zip->addFile( $file_folder.$file );
        }
        // $zip->close();
        //header( 'Cache-Control: public' );
        //header( 'Content-Description: File Transfer' );
        header( 'Content-Type: application/zip' );
        header( 'Content-disposition: attachment; filename='.$zipname );
        header( 'Content-Length: ' . filesize( $zipname ) );
        readfile( $zipname );
        unlink( $zipname );
    } else {
        $message = 'Dokumen Arsitektur Tidak Ditemukkan';
        echo "<script type='text/javascript'>alert('$message');window.history.go(-1);</script>";
    }
    // header( 'Content-Disposition: attachment; filename=' . basename( $file ) );
    // header( 'Content-Type: application/octet-stream;' );
    //header( 'Content-Transfer-Encoding: binary' );
    // readfile( '../dokumen/dokumenTanah/' . $file );
}