<?php
// if ( isset( $_POST['submit'] ) ) {
// include database connection file
include 'config.php';
if ( isset( $_POST['submit'] ) ) {
    $error = array();
    $extension = array( 'jpeg', 'jpg', 'png', 'gif' );
    foreach ( $_FILES['files']['tmp_name'] as $key=>$tmp_name ) {
        $file_name = $_FILES['files']['tmp_name'][$key];
        $file_tmp   = rand( 0, 99999999 ) . '_' . $_FILES['files']['name'][$key];
        $folder_kondisi = "../dokumen/$file_tmp";
        $ext = pathinfo( $file_tmp, PATHINFO_EXTENSION );

        if ( in_array( $ext, $extension ) ) {
            if ( !file_exists( '../dokumen/'.$file_tmp ) ) {
                move_uploaded_file( $file_tmp = $_FILES['files']['tmp_name'][$key], $folder_kondisi );
                $result10 = mysqli_query( $mysqli, "INSERT INTO `gambar_kondisi`(`gbr_kon`, `id_kondisi`) VALUES ('$file_tmp','1')" );
            } else {
                $filename = basename( $file_name, $ext );
                $newFileName = $filename.time().'.'.$ext;
                $folder_kondisi_baru = "../dokumen/$newFileName";
                move_uploaded_file( $file_tmp = $_FILES['files']['tmp_name'][$key], $folder_kondisi_baru );
                $result10 = mysqli_query( $mysqli, "INSERT INTO `gambar_kondisi`(`gbr_kon`, `id_kondisi`) VALUES ('$newFileName','1')" );

            }
        } else {
            array_push( $error, "$file_name, " );
        }
    }
} else {
    header( 'location:../bangunan.php' );
}
?>