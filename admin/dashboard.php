<?php
session_start();

if (!isset($_SESSION["username"])) {
    
    header( 'Location:login.php' );exit;
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

    <title>Dashboard</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon_2.png">

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
                            <!-- <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="profile.html">Profile</a></li>
                                <li><a href="contacts.html">Contacts</a></li>
                                <li><a href="mailbox.html">Mailbox</a></li>
                                <li class="divider"></li>
                                <li><a href="login.html">Logout</a></li>
                            </ul> -->
                        </div>
                        <div class="logo-element">
                            <img src="img/favicon_2.png">
                        </div>
                    </li>
                    <li class="active">
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
                    <li>
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

        <?php
                
                            
                            include 'database/config.php';
                        
                            // Fetech user data based on id
                            $result4 = mysqli_query($mysqli, "SELECT * FROM tb_bagunan");

                            $row_cnt_bangunan = mysqli_num_rows( $result4 );

                            $result2 = mysqli_query($mysqli, "SELECT * FROM tb_users where role != 'Super Admin' ");

                            $row_cnt_penanganan = mysqli_num_rows( $result2 );

                            $result = mysqli_query($mysqli, "SELECT * FROM tb_instansi");

                            $row_cnt_instansi = mysqli_num_rows( $result );

                             $result3 = mysqli_query($mysqli, "SELECT * FROM tb_fungsi");

                            $row_cnt_fungsi = mysqli_num_rows( $result3 );
                          
        ?>

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

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">

                                <h5>Bangunan</h5>
                            </div>
                            <div class="ibox-content">

                                <h1 class="" style="color:#1C84C6;font-size:50px;font-weight:20px">
                                    <?php echo $row_cnt_bangunan; ?></h1>


                                <!-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> -->
                                <small>Total Bangunan</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">

                                <h5>Admin</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="" style="color:#F8AC59; font-size:50px; font-weight:20px">
                                    <?php echo $row_cnt_penanganan; ?></h1>
                                <small>Total Admin</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">

                                <h5>Fungsi</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="" style="color:#ED5565; font-size:50px; font-weight:20px">
                                    <?php echo $row_cnt_fungsi; ?></h1>
                                <!-- <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div> -->
                                <small>Total Fungsi</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">

                                <h5>Instansi</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="" style="color:#2F4050; font-size:50px; font-weight:20px">
                                    <?php echo $row_cnt_instansi; ?></h1>
                                <!-- <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i> -->
                                <small>Total Instansi</small>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Log Activity</h5>

                            </div>
                            <div class="ibox-content">
                                <table class="table table-striped table-hover dataTables-example">
                                    <thead>
                                        <tr>

                                            <th>Date</th>
                                            <th>User</th>
                                            <th>Deksripsi</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                         $result5 = mysqli_query($mysqli, "SELECT * FROM tb_log_activity ORDER BY tb_log_activity.date_added DESC");

                                         while ($data5 = mysqli_fetch_array($result5)) {
                                             $user = $data5['nama_user'];
                                             $deskripsi = $data5['deskripsi'];
                                             $date = $data5['date_added'];
                                             $status = $data5['status'];
                                             $colorStatus ="";

                                             if ($status == 'tambah'){
                                                 $colorStatus = "label-primary";
                                             } else if ($status == "ubah"){
                                                 $colorStatus = "label-warning";
                                             } else {
                                                 $colorStatus = "label-danger";
                                             }

                                        ?>
                                        <tr>


                                            <td><i class="fa fa-clock-o"></i> <?php echo $date;?></td>
                                            <td><?php echo $user;?></td>
                                            <td class="text-black"> <?php echo $deskripsi;?>
                                            </td>
                                            <td><span class="label <?php echo $colorStatus;?>"
                                                    style="width:100px"><?php echo $status;?> </span>
                                            </td>
                                        </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

    <!-- Page-Level Scripts -->
    <script>
    /* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(e) {
        if (!e.target.matches('.dropbtn')) {
            var myDropdown = document.getElementById("myDropdown");
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

    });
    </script>

</body>



</html>