<?php
/*
##########[ LinaXSec V 0.1 ]##########
#Alhamdulilah Akhirnya Lutfi Anam Telah Merilis Aplikasi Open Source Pertamanya Yaitu LinaXSec Pada Hari Ini Yaitu Pada Tanggal 10 April 2020 Semoga Aplikasi Yang Lutfi Anam Buat Ini Bisa Bermanfaat Untuk Para Developer-Developer Aplikasi Web. Aplikasi Yang Lutfi Anam Buat Ini Bisa Mendeteksi Serangan Sql Injection ( v 0.1 ) Dan Menyimpan Log Serangan Di Database Aplikasi. Lutfi Anam Merilis Aplikasi LinaXSec Ini Karena Banyaknya Para Defacer / Cracker Yang Sering Merusak Aplikasi Web Tanpa Tanggung Jawab Sedikitpun.
#Nama : LinaXSec - Crack Detect
#Rilis : Jum'at 10 April 2020
#Developer : LinaX
#Coder : Lutfi Anam
#PERJANJIAN PENGGUNAAN
#Tribut : Aplikasi Ini Lutfi Anam Rilis Untuk Merayakan/Mensyukuri Umur Saya Yang Bertambah 1 Tahun, Yaitu Menjadi 17 Tahun ( Semoga Lutfi Anam Bisa Menjadi Orang Yang Lebih Baik Lagi Dan Berfikir Lebih Dewasa .... Aminn .... )
#Dengan menggunakan LinaXSec, maka anda setuju untuk :
#1. Tidak mengubah Nama Aplikasi LinaXSec menjadi nama aplikasi lain
#2. Tidak mengubah footer yang menunjukkan alamat website LinaXSec
#3. Tidak menjual Aplikasi LinaXSec. Tetapi anda diperbolehkan untuk mengambil keuntungan dari jasa proses instalasi, konsultasi dan lain sebagainya yang berkaitan dengan LinaXSec
#4. Tidak menhapus tribute dan Perjanjian Penggunaan
#Semoga Aplikasi LinaXSec dapat bermanfaat untuk kita semua.
################################
*/
session_start();
ob_start();
include('../config.php');
if (isset($_SESSION['username'])) {
    $uname = $_SESSION['username'];
    $table = $prefix . 'users';
    $suser = mysqli_query($connect, "SELECT * FROM `$table` WHERE username='$uname'");
    $count = mysqli_num_rows($suser);
    if ($count > 0) {
        echo '<script type="text/javascript">window.location = "dashboard.php"</script>';
        exit;
    }
}
if( !isset ($_SESSION['token_login']) ) {
    $_SESSION['token_login'] = base64_encode ( openssl_random_pseudo_bytes ( 32 ) ) ; 
}

$_GET  = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>LinaXSec - Login</title>

  <!-- Custom fonts for this template-->
  <link href="<?= $linaxsec_s.'/lxs-assets/vendor/fontawesome-free/css/all.min.css'; ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= $linaxsec_s.'/lxs-assets/css/sb-admin-2.min.css'; ?>" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Login Page -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4"> Welcome To LinaXSec </h1>
                  </div>
                  <form class="user" method="post" action="">
                  	<input type="hidden" name="linax_token" value="<?= $_SESSION['token_login']; ?>">
<?php
@$_SESSION['username-input'] = $_POST['username'];
?>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="exampleInputText" placeholder="Username" name="username" value="<?= $_SESSION['username-input']; ?>">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input id="RememberMe"type="checkbox" class="custom-control-input">
                        <label for="RememberMe" class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <input type="submit" name="signin" class="btn btn-primary btn-user btn-block" value="Login">
                  </form>
<?php
if (isset($_POST['signin']) && $_SESSION['token_login'] == $_POST['linax_token']) {
	unset($_SESSION['token_login']);
    @$username = mysqli_real_escape_string($connect, $_POST['username']);
    @$password = base64_encode($_POST['password']);
    $table = $prefix . "users";
    $check = mysqli_query($connect, "SELECT * FROM `$table` WHERE `username`='$username' AND password='$password'");
    if (mysqli_num_rows($check) > 0) {
        if (isset($_POST['rememberme'])) {
            setcookie("username", $username, time() + 60 * 60 * 24 * 100, '/');
            $_SESSION['username'] = $username;
            echo '<meta http-equiv="refresh" content="0;url=dashboard.php">';
        } else {
            $_SESSION['username'] = $username;
            echo '<meta http-equiv="refresh" content="0;url=dashboard.php">';
        }
    } else {
        echo '<br />
		<div class="alert alert-dismissable alert-danger">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              The entered <strong>username</strong> or <strong>password</strong> are incorrect.
        </div>';
    }
}
?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= $linaxsec_s.'/lxs-assets/vendor/jquery/jquery.min.js'; ?>"></script>
  <script src="<?= $linaxsec_s.'/lxs-assets/vendor/bootstrap/js/bootstrap.bundle.min.js'; ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= $linaxsec_s.'/lxs-assets/vendor/jquery-easing/jquery.easing.min.js'; ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= $linaxsec_s.'/lxs-assets/js/sb-admin-2.min.js'; ?>"></script>

</body>

</html>
