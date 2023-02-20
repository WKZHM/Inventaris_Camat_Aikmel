<?php

session_start();

include 'config/app.php';

// cek apakah tombol login ditekan
if (isset($_POST['login'])) {
    // ambil input username dan password
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    // check username
    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

    // jika username ada maka selanjutnya cek password
    if (mysqli_num_rows($result) == 1) {
        // check password
        $hasil = mysqli_fetch_assoc($result);
        if (password_verify($password, $hasil['password'])) {
            // set session
            $_SESSION['login']     = true;
            $_SESSION['id_user']   = $hasil['id_user'];
            $_SESSION['nama']      = $hasil['nama'];
            $_SESSION['username']  = $hasil['username'];
            $_SESSION['email']     = $hasil['email'];
            $_SESSION['level']     = $hasil['email'];

            // jika login benar arahkan ke index.php
            header("location: index.php");
            exit;
        }
    }
    // jika tidak ada username atau salah
    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <p class="h1"><b>Login</b><br>
                    Camat Aikmel</p>
            </div>

            <!-- pesan ketika username atau password salah -->
            <?php if (isset($error)) : ?>
                <div class="alert alert-danger text-center">
                    <b>Username or Password Salah😂</b>
                </div>
            <?php endif; ?>

            <div class="card-body">

                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
                            <p class="text-center mt-3 mb-2 text-muted">Copyright &copy; WKZHM <?= date('Y'); ?></p>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
</body>

</html>