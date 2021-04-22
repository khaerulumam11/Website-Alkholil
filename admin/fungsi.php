<?php
session_start();

if (!isset($_SESSION["username"])) {
   
    header( 'Location:login.php' ); exit;
}

$id_user = $_SESSION["id_user"];
$username = $_SESSION["username"];
$nama = $_SESSION["nama"];
$role = $_SESSION["role"];
$foto_user = $_SESSION["foto"];

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Fungsi</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon_2.png">

</head>

<body>

    <div id="wrapper">

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                                <?php echo "<img alt='image' src='dokumen/$foto_user' class='img-circle' width='50px'/>"; ?>
                            </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear"> <span class="block m-t-xs"> <strong
                                            class="font-bold"><?php echo $nama; ?></strong>
                                    </span> <span class="text-muted text-xs block"><?php echo $role; ?> </span> </span>
                            </a>
                        </div>
                        <div class="logo-element">
                            <img src="img/favicon_2.png">
                        </div>
                    </li>
                    <li>
                        <a href="dashboard.php"><i class="fa fa-th"></i> <span class="nav-label">Dashboards</span></a>

                    </li>
                    <li>
                        <a href="bangunan.php"><i class="fa fa-building-o"></i> <span class="nav-label">Bangunan
                                Gedung</span></a>
                    </li>
                    <li>
                        <a href="opd.php"><i class="fa fa-database"></i> <span class="nav-label">OPD</span></a>
                    </li>
                    <li>
                        <a href="instansi.php"><i class="fa fa-institution"></i> <span
                                class="nav-label">Instansi</span></a>
                    </li>
                    <li class="active">
                        <a href="fungsi.php"><i class="fa fa-diamond"></i> <span class="nav-label">Fungsi</span></a>
                    </li>
                    <?php
                    if($role == "Super Admin"){
                    ?>
                    <li>
                        <a href="pengguna.php"><i class="fa fa-user"></i> <span class="nav-label">Pengguna</span></a>
                    </li>
                    <?php
                    }
                    ?>

                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i
                                class="fa fa-bars"></i> </a>

                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Dinas Pengerjaan Umum & Penataan
                                Ruang</span>
                        </li>

                        <li>
                            <a href="database/logout.php">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>
            <div class="row wrapper border-bottom page-heading">
                <div class="col-lg-12">
                    <h2><b>Fungsi</b><a href="addFungsi.php"><button class="btn btn-sm btn-primary pull-right m-t-n-xs"
                                type="submit"><strong>+
                                    Tambah
                                    Data</strong></button></a></h2>

                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">

                            <div class="ibox-content">

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Kode Fungsi</th>
                                                <th>Nama Fungsi</th>
                                                <th>Deskripsi</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include 'database/config.php';
                                            $no = 1;
                                            $data = mysqli_query($mysqli, "select * from tb_fungsi");
                                            while ($d = mysqli_fetch_array($data)) {
                                            ?>
                                            <tr class="gradeX">
                                                <td><?php echo $d['kode_fungsi']; ?></td>
                                                <td><?php echo $d['nama_fungsi']; ?></td>
                                                <td><?php echo $d['deskripsi']; ?></td>
                                                <td>
                                                    <a
                                                        href="editFungsi.php?kode_fungsi=<?php echo $d['kode_fungsi']; ?>"><i
                                                            data-feather="edit-2" style="margin-right:5%"></i></a>
                                                    <a href="database/delFungsi.php?kode_fungsi=<?php echo $d['kode_fungsi']; ?>"
                                                        onclick="return confirm('Apakah anda yakin akan menghapus data?')"><i
                                                            data-feather="trash-2"
                                                            style="margin-right:2%; color:red"></i></a>
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>

                                        </tbody>

                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer">

            </div>

        </div>
    </div>



    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="js/plugins/dataTables/datatables.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <script src='https://unpkg.com/feather-icons'></script>

    <script>
    feather.replace()
    </script>

    <!-- Page-Level Scripts -->
    <script>
    $(document).ready(function() {
        $('.dataTables-example').DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: []

        });

    });
    </script>

</body>


</html>