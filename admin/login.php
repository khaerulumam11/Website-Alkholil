<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon_2.png">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="login/login/assets/css/login.css">
    <link rel="stylesheet" href="alert/alert/css/sweetalert.css">


</head>

<body>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 login-section-wrapper">
                    <div class="brand-wrapper">
                        <img src="DPUPR/assets/img/logo/logo2.svg" height=50px alt="logo">
                    </div>
                    <div class="login-wrapper my-auto">
                        <h1 class="login-title">Log in</h1>
                        <form id="form" method="post" action="database/login_action.php">
                            <div class=" form-group">
                                <label for="email">Username</label>
                                <input type="text" name="username" id="username" class="form-control"
                                    placeholder="masukkan username anda" required>
                            </div>
                            <div class="form-group mb-4">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="masukkan password anda" required>
                            </div>
                            <input name="login" id="login" class="btn btn-block login-btn" type="submit" style="background-color:#1ab394" value="Masuk">
                        </form>

                        <p class="login-wrapper-footer-text">Tidak punya akun ? <a href="register.php"
                                class="text-reset">Daftar disini</a></p>
                    </div>
                </div>
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="login/assets/images/login.jpg" alt="login image" class="login-img">
                </div>


            </div>
        </div>

   \
    </main>
    <script type="text/javascript" src="alert/alert/js/jquery-1.9.1.min.js"></script>
    <script src="alert/alert/js/sweetalert.min.js"></script>
    <script src="alert/alert/js/qunit-1.18.0.js"></script>



</body>


</html>