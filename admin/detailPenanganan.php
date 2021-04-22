<?php
session_start();

if ( !isset( $_SESSION['username'] ) ) {
   
    header( 'Location:login.php' ); exit;
}

$id_user = $_SESSION['id_user'];
$username = $_SESSION['username'];
$nama = $_SESSION['nama'];
$role = $_SESSION['role'];
$foto_user = $_SESSION['foto'];

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>

    <title>Bangunan</title>

    <link href='css/bootstrap.min.css' rel='stylesheet'>
    <link href='font-awesome/css/font-awesome.css' rel='stylesheet'>

    <link href='css/plugins/dataTables/datatables.min.css' rel='stylesheet'>
    <link href='css/plugins/slick/slick.css' rel='stylesheet'>
    <link href='css/plugins/slick/slick-theme.css' rel='stylesheet'>

    <link href='css/animate.css' rel='stylesheet'>
    <link href='css/style.css' rel='stylesheet'>
    <link href="css/plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet">

    <link rel='shortcut icon' type='image/x-icon' href='img/favicon_2.png'>

    <style>
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        float: none;
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
    }

    .dropdown-content a:hover {
        background-color: #ddd;
    }

    .show {
        display: block;
    }
    </style>

</head>

<body>

    <div id='wrapper'>

        <nav class='navbar-default navbar-static-side' role='navigation'>
            <div class='sidebar-collapse'>
                <ul class='nav metismenu' id='side-menu'>
                    <li class='nav-header'>
                        <div class='dropdown profile-element'> <span>
                                <?php echo "<img alt='image' src='dokumen/$foto_user' class='img-circle' width='50px'/>";
?>
                            </span>
                            <a data-toggle='dropdown' class='dropdown-toggle' href='#'>
                                <span class='clear'> <span class='block m-t-xs'> <strong class='font-bold'><?php echo $nama;
?></strong>
                                    </span> <span class='text-muted text-xs block'><?php echo $role;
?> </span> </span>
                            </a>

                        </div>
                        <div class='logo-element'>
                            <img src='img/favicon_2.png'>
                        </div>
                    </li>

                    <li>
                        <a href='dashboard.php'><i class='fa fa-th'></i> <span class='nav-label'>Dashboards</span></a>

                    </li>
                    <li class='active'>
                        <a href='bangunan.php'><i class='fa fa-building-o'></i> <span class='nav-label'>Bangunan
                                Gedung</span></a>
                    </li>
                    <li>
                        <a href='opd.php'><i class='fa fa-database'></i> <span class='nav-label'>OPD</span></a>
                    </li>
                    <li>
                        <a href='instansi.php'><i class='fa fa-institution'></i> <span
                                class='nav-label'>Instansi</span></a>
                    </li>
                    <li>
                        <a href='fungsi.php'><i class='fa fa-diamond'></i> <span class='nav-label'>Fungsi</span></a>
                    </li>
                    <?php
if ( $role == 'Super Admin' ) {
    ?>
                    <li>
                        <a href='pengguna.php'><i class='fa fa-user'></i> <span class='nav-label'>Pengguna</span></a>
                    </li>
                    <?php
}
?>

                </ul>

            </div>
        </nav>

        <div id='page-wrapper' class='gray-bg'>
            <div class='row border-bottom'>
                <nav class='navbar navbar-static-top' role='navigation' style='margin-bottom: 0'>
                    <div class='navbar-header'>
                        <a class='navbar-minimalize minimalize-styl-2 btn btn-primary ' href='#'><i
                                class='fa fa-bars'></i> </a>

                    </div>
                    <ul class='nav navbar-top-links navbar-right'>
                        <li>
                            <span class='m-r-sm text-muted welcome-message'>Dinas Pengerjaan Umum & Penataan
                                Ruang</span>
                        </li>

                        <li>
                            <a href='database/logout.php'>
                                <i class='fa fa-sign-out'></i> Log out
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>
            <div class='row wrapper border-bottom page-heading'>
                <div class='col-lg-12'>

                    <a href="javascript:history.back()"> <i data-feather="arrow-left"></i></a>
                    <label style="font-size:32px;margin-top:3%; margin-left:1%"><b>Detail Data Penanganan </b></label>

                </div>
            </div>
            <div class='wrapper wrapper-content animated fadeInRight ecommerce'>

                <div class='row'>
                    <div class='col-lg-12'>
                        <div class='tabs-container'>
                            <ul class='nav nav-tabs'>
                                <li class='active'><a data-toggle='tab' href='#tab-1'> Data Penanganan</a></li>
                            </ul>

                            <?php
include 'database/config.php';
$id = $_GET['id_penanganan'];

// Fetech user data based on id
$result = mysqli_query( $mysqli, "SELECT * FROM tb_penanganan WHERE id_penanganan='$id'" );

while ( $user_data = mysqli_fetch_array( $result ) ) {
    $id_penanganan = $user_data['id_penanganan'];
    $jenis_penanganan = $user_data['jenis_penanganan'];
    $pendanaan = $user_data['pendanaan'];
    $tgl_renovasi = $user_data['tgl_renovasi'];
    $alokasi_dana = $user_data['alokasi_dana'];
    $jenis_renovasi = $user_data['jenis_renovasi'];
    $penjelasan = $user_data['penjelasan'];
    
}

?>
                            <div class='tab-content'>


                                <div id='tab-1' class='tab-pane active'>
                                    <div class='panel-body'>

                                        <fieldset class='form-horizontal'>
                                            <div class='ibox product-detail'>
                                                <div class='ibox-content'>
                                                    <div class='row'>
                                                        <div class='col-md-5'>
                                                            <div class='product-images'>
                                                                <?php
    
        $result11 = mysqli_query( $mysqli, "SELECT * FROM gambar_penanganan WHERE id_penanganan='$id_penanganan'" );
        while ( $data15 = mysqli_fetch_array( $result11 ) ) {
            $foto_penanganan = $data15['gambar'];
            ?>

                                                                <div>

                                                                    <div class="lightBoxGallery">
                                                                        <a href="dokumen/fotoRehab/<?php echo $foto_penanganan; ?>"
                                                                            data-gallery="">
                                                                            <img src='dokumen/fotoRehab/<?php echo $foto_penanganan; ?>'
                                                                                alt='' width='300' height='300'
                                                                                style="object-fit:cover"></a>
                                                                    </div>
                                                                </div>

                                                                <?php }
            ?>

                                                            </div>

                                                        </div>
                                                        <div class='col-md-7'>
                                                            <table class='table table-borderless'>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Jenis Penanganan</td>
                                                                        <td>: <?php echo $jenis_penanganan;
            ?> </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Pendanaan</td>
                                                                        <td>: <?php echo $pendanaan;
            ?> </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Tanggal Renovasi</td>
                                                                        <td>: <?php echo $tgl_renovasi;
            ?> </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Alokasi Dana</td>
                                                                        <td>: <?php echo $alokasi_dana;
            ?> </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Jenis Renovasi</td>
                                                                        <td>: <?php echo $jenis_renovasi;
            ?> </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Penjelasan</td>
                                                                        <td>: <?php echo $pendanaan;
            ?> </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Download</td>
                                                                        <td>: <a
                                                                                href='database/downloadPenanganan.php?id=<?php echo $id_penanganan; ?>'><button
                                                                                    class='btn btn-sm btn-success'><strong>Download
                                                                                        Dokumen
                                                                                    </strong></button></a> </td>
                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                            <div>
                                                                <div class='btn-group'>
                                                                    <a
                                                                        href="editPenanganan.php?id_penanganan=<?php echo $id_penanganan; ?>"><button
                                                                            class='btn btn-primary btn-sm'><i
                                                                                class='fa fa-pencil'></i>
                                                                            Edit</button></a>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </fieldset>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div id="blueimp-gallery" class="blueimp-gallery">
                <div class="slides"></div>
                <h3 class="title"></h3>
                <a class="prev">‹</a>
                <a class="next">›</a>
                <a class="close">×</a>
                <a class="play-pause"></a>
                <ol class="indicator"></ol>
            </div>
            <div class='footer'>

            </div>

        </div>
    </div>

    <!-- Mainly scripts -->
    <script src='js/jquery-3.1.1.min.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <script src='js/plugins/metisMenu/jquery.metisMenu.js'></script>
    <script src='js/plugins/slimscroll/jquery.slimscroll.min.js'></script>

    <script src='js/plugins/dataTables/datatables.min.js'></script>

    <!-- Custom and plugin javascript -->
    <script src='js/inspinia.js'></script>
    <script src='js/plugins/pace/pace.min.js'></script>
    <script src='js/plugins/slick/slick.min.js'></script>

    <script src="js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>

    <script>
    feather.replace()
    </script>

    <!-- Page-Level Scripts -->
    <script>
    /* When the user clicks on the button,
            toggle between hiding and showing the dropdown content */

    function myFunction() {
        document.getElementById('myDropdown').classList.toggle('show');
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(e) {
        if (!e.target.matches('.dropbtn')) {
            var myDropdown = document.getElementById('myDropdown');
            if (myDropdown.classList.contains('show')) {
                myDropdown.classList.remove('show');
            }
        }
    }
    </script>
    <script>
    $(document).ready(function() {
        $('.dataTables-example').DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: []

        });
        $('.product-images').slick({
            dots: true
        });

    });
    </script>

</body>

</html>