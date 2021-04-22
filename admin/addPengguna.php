<?php
session_start();

if ( !isset( $_SESSION['username'] ) ) {

    header( 'Location:login.php' );
    exit;
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

    <title>Tambah Pengguna</title>

    <link href='css/bootstrap.min.css' rel='stylesheet'>
    <link href='font-awesome/css/font-awesome.css' rel='stylesheet'>
    <link href='css/plugins/iCheck/custom.css' rel='stylesheet'>
    <link href='css/plugins/steps/jquery.steps.css' rel='stylesheet'>
    <link href='css/animate.css' rel='stylesheet'>
    <link href='css/style.css' rel='stylesheet'>
    <link rel='shortcut icon' type='image/x-icon' href='img/favicon_2.png'>
    <link rel='stylesheet' href='alert/alert/css/sweetalert.css'>

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
                    <li>
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
                    <li class='active'>
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
                    <a href='javascript:history.back()'> <i data-feather='arrow-left' style='color:#1ab394'></i></a>
                    <label style='font-size:32px;margin-top:3%; margin-left:1%'><b>Data Pengguna </b></label>

                </div>
                <div class='col-lg-2'>

                </div>
            </div>
            <div class='wrapper wrapper-content animated fadeInRight'>
                <div class='row'>
                    <div class='col-lg-12'>
                        <div class='ibox float-e-margins'>
                            <div class='ibox-title'>
                                <h5>Tambah Data Pengguna</h5>
                                <div class='ibox-tools'>

                                </div>
                            </div>
                            <div class='ibox-content'>
                                <form name='update_user' method='post' action='database/addUser.php'
                                    class='form-horizontal' enctype='multipart/form-data'>

                                    <div class='form-group'><label class='col-lg-2 control-label'>Nama</label>

                                        <div class='col-lg-8'><input type='text' name='nama' class='form-control'>
                                        </div>
                                    </div>
                                    <div class='form-group'><label class='col-lg-2 control-label'>Alamat</label>
                                        <div class='col-lg-8'>
                                            <textarea class='form-control' name='alamat'></textarea>
                                        </div>
                                    </div>
                                    <div class='form-group'><label class='col-lg-2 control-label'>Telepon</label>

                                        <div class='col-lg-8'><input type='text' name='telepon' class='form-control'>
                                        </div>
                                    </div>

                                    <div class='form-group'><label class='col-lg-2 control-label'>Username</label>

                                        <div class='col-lg-8'><input type='text' name='username' class='form-control'>
                                        </div>
                                    </div>
                                    <div class='form-group'><label class='col-lg-2 control-label'>Password</label>

                                        <div class='col-lg-8'><input type='text' name='password' class='form-control'>
                                        </div>
                                    </div>
                                    <div class='form-group'><label class='col-lg-2 control-label'>Role</label>

                                        <div class='col-lg-8'>
                                            <select class='form-control required' name='role'>

                                                <option value='Super Admin'>Super Admin</option>
                                                <option value='Admin'>Admin</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class='form-group'><label class='col-lg-2 control-label'>Foto User
                                            ( png, jpg, jpeg, gif )</label>

                                        <div class='col-lg-8'><input id='foto_user' name='foto_user' type='file'
                                                class='form-control'>
                                        </div>
                                    </div>

                                    <div class='form-group'>
                                        <div class='col-lg-offset-2 col-lg-10'>

                                            <button class='btn btn-sm btn-primary' type='submit'
                                                name='update'>Simpan</button>
                                            <a href='pengguna.php' style='margin-left:2%'>Cancel</a>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
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

    <!-- Custom and plugin javascript -->
    <script src='js/inspinia.js'></script>
    <script src='js/plugins/pace/pace.min.js'></script>

    <!-- Steps -->
    <script src='js/plugins/steps/jquery.steps.min.js'></script>

    <!-- Jquery Validate -->
    <script src='js/plugins/validate/jquery.validate.min.js'></script>
    <script src='alert/alert/js/sweetalert.min.js'></script>
    <script src='alert/alert/js/qunit-1.18.0.js'></script>
    <script src='https://unpkg.com/feather-icons'></script>

    <script>
    feather.replace()
    </script>

    <?php

// Check If form submitted, insert form data into users table.
if ( isset( $_POST['submit'] ) ) {
    $kode_fungsi = $_POST['kode_fungsi'];
    $nama_fungsi = $_POST['nama_fungsi'];
    $deskripsi = $_POST['deskripsi'];

    // include database connection file
    include 'database/config.php';

    $nama_user = $_SESSION['nama'];
    $deskripsi_log = 'Menambahkan data fungsi';
    $result_log = mysqli_query( $mysqli, "INSERT INTO tb_log_activity (`nama_user`, `deskripsi`, `status`) VALUES ('$nama_user','$deskripsi_log','tambah')" );

    // Insert user data into table
    $result = mysqli_query( $mysqli, "INSERT INTO tb_fungsi (`kode_fungsi`, `nama_fungsi`, `deskripsi`) VALUES ('$kode_fungsi','$nama_fungsi','$deskripsi')" );

    // Show message when user added
    if ( $result ) {
        echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Data Fungsi Berhasil Disimpan',
				type: 'success',
				timer: 1500,
				showConfirmButton: true
			});		
		},30);	
		window.setTimeout(function(){ 
		window.location.replace('instansi.php');
		} ,1500);	
	  </script>";
    } else {
        echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Data Fungsi Gagal Disimpan',
				type: 'danger',
				timer: 1500,
				showConfirmButton: true
			});		
		},30);	
		window.setTimeout(function(){ window.history.go(-1);
		} ,1500);	
	  </script>";
    }

}
?>

    <script>
    $(document).ready(function() {
        $('#wizard').steps();
        $('#form').steps({
            bodyTag: 'fieldset',
            onStepChanging: function(event, currentIndex, newIndex) {
                // Always allow going backward even if the current step contains invalid fields!
                if (currentIndex > newIndex) {
                    return true;
                }

                // Forbid suppressing 'Warning' step if the user is to young
                if (newIndex === 3 && Number($('#age').val()) < 18) {
                    return false;
                }

                var form = $(this);

                // Clean up if user went backward before
                if (currentIndex < newIndex) {
                    // To remove error styles
                    $('.body:eq(' + newIndex + ') label.error', form).remove();
                    $('.body:eq(' + newIndex + ') .error', form).removeClass('error');
                }

                // Disable validation on fields that are disabled or hidden.
                form.validate().settings.ignore = ':disabled,:hidden';

                // Start validation;
                Prevent going forward
                if false
                return form.valid();
            },
            onStepChanged: function(event, currentIndex, priorIndex) {
                // Suppress ( skip ) 'Warning' step if the user is old enough.
                if (currentIndex === 2 && Number($('#age').val()) >= 18) {
                    $(this).steps('next');
                }

                // Suppress ( skip ) 'Warning' step if the user is old enough and wants to the previous step.
                if (currentIndex === 2 && priorIndex === 3) {
                    $(this).steps('previous');
                }
            },
            onFinishing: function(event, currentIndex) {
                var form = $(this);

                // Disable validation on fields that are disabled.
                // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                form.validate().settings.ignore = ":disabled";

                // Start validation; Prevent form submission if false
                return form.valid();
            },
            onFinished: function(event, currentIndex) {
                var form = $(this);

                // Submit form input
                form.submit();
            }
        }).validate({
            errorPlacement: function(error, element) {
                element.before(error);
            },
            rules: {
                confirm: {
                    equalTo: "#password"
                }
            }
        });
    });
    </script>

</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/form_wizard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Oct 2017 15:26:24 GMT -->

</html>