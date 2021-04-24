<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Beranda</title>

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
                            </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">
                                            ADMIN
                                        </strong>
                                    </span> </span>
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
                        <a href="dashboard.php"><i class=""></i> <span class="nav-label">Master</span></a>
                        <ul class="nav nav-second-level" style="background-color:white">
                            <li class="active">
                                <a href="dataBeranda.php"><span class="nav-label">Data
                                        Beranda</span></a>
                            </li>
                            <li>
                                <a href="profilYayasan.php"> <span class="nav-label">Profil
                                        Yayasan</span></a>
                            </li>
                            <li>
                                <a href=""><span class="nav-label">Visi & Misi</span></a>
                            </li>
                            <li>
                                <a href=""><span class="nav-label">Program</span></a>
                            </li>
                            <li>
                                <a href=""><span class="nav-label">Fasilitas</span></a>
                            </li>
                            <li>
                                <a href=""><span class="nav-label">Pengumuman</span></a>
                            </li>
                            <li>
                                <a href=""><span class="nav-label">Donasi</span></a>
                            </li>
                            <li>
                                <a href=""><span class="nav-label">Kontak</span></a>
                            </li>
                            <li>
                                <a href=""><span class="nav-label">User Login</span></a>
                            </li>
                        </ul>
                    </li>

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
</body>
<!-- Mainly scripts -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="js/plugins/dataTables/datatables.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>
<script src="https://unpkg.com/feather-icons"></script>

<script>
feather.replace()
</script>

<!-- Page-Level Scripts -->
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
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

</html>