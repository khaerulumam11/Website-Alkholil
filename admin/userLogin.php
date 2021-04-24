<?php
session_start();

if (!isset($_SESSION["username"])) {
    
    header( 'Location:login.php' );exit;
}

$id_user = $_SESSION["id_user"];
$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html>


<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>User Login</title>
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.16.0/standard-all/ckeditor.js"></script>

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="">

    <style>
    .cke_textarea_inline {
        border: 1px solid #ccc;
        padding: 10px;
        min-height: 300px;
        background: #fff;
        color: #000;
    }

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
                        <div class=""> <span>
                            </span>

                            <a href="dashboard.php"><label for="" style="font-size:20px; color:#999999">Selamat
                                    Datang</label>
                                <strong class="font-bold">
                                    <label for="" style="font-size:20px; color:black"><?php echo $username?></label>
                                </strong>
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
                        <a href="dashboard.php"><i class=""></i> <strong><span
                                    class="nav-label">Master</span></a></strong>
                        <ul class="nav nav-second-level" style="background-color:white">
                            <li class="">
                                <a href="dataBeranda.php"><span class="nav-label">Data
                                        Beranda</span></a>
                            </li>
                            <li>
                                <a href="profilYayasan.php"> <span class="nav-label">Profil
                                        Yayasan</span></a>
                            </li>
                            <li>
                                <a href="visimisi.php"><span class="nav-label">Visi & Misi</span></a>
                            </li>
                            <li>
                                <a href="program.php"><span class="nav-label">Program</span></a>
                            </li>
                            <li>
                                <a href="fasilitas.php"><span class="nav-label">Fasilitas</span></a>
                            </li>
                            <li>
                                <a href="pengumuman.php"><span class="nav-label">Pengumuman</span></a>
                            </li>
                            <li>
                                <a href="donasi.php"><span class="nav-label">Donasi</span></a>
                            </li>
                            <li>
                                <a href="kontak.php"><span class="nav-label">Kontak</span></a>
                            </li>
                            <li class="active">
                                <a href="userLogin.php"><span class="nav-label">User Login</span></a>
                            </li>
                        </ul>
                    </li>

                </ul>

            </div>
        </nav>
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">

                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">SMA ALKHOLIL</span>
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
                    <h2 style="margin-top:3%"><b>User Login</b></h2>

                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">

                            <div class="ibox-content">
                                <label style="font-size:20px; margin-bottom:-5%" for="">Kelola Data</label>
                                <hr>
                                <?php
                                         include 'database/config.php';
                                            $data = mysqli_query($mysqli, "select * from admin where ADMIN_ID = '$id_user'");
                                            while ($d = mysqli_fetch_array($data)) {
                                            ?>
                                <form name="form1" id="form" method="post"
                                    action="database/ubahUser.php?id=<?php echo $d['ADMIN_ID']; ?>"
                                    enctype="multipart/form-data" class="form-horizontal">

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Username* </label>
                                        <div class="col-lg-4"><input id="username" name="username" type="text"
                                                class="form-control required" value="<?php echo $d['USERNAME']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Password* </label>
                                        <div class="col-lg-4"><input id="password" name="password" type="password"
                                                class="form-control required" value="<?php echo $d['PASSWORD']; ?>">
                                        </div>
                                        <i id="myInput" data-feather="eye" style="margin-top:0.5%"
                                            onclick="showPass()"></i>
                                    </div>



                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">

                                            <button class="btn btn-sm btn-primary" type="submit"
                                                name="update">Simpan</button>
                                            <input class="btn btn-sm btn-danger" type="reset" value="Batal"></input>
                                        </div>
                                    </div>
                                </form>
                                <?php } ?>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    function showPass() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    </script>
    <script src="https://cdn.ckeditor.com/4.16.0/standard-all/ckeditor.js"></script>
    <script src="js/plugins/dataTables/datatables.min.js"></script>
    <script>
    CKEDITOR.inline('editor2');
    </script>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>



    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>

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