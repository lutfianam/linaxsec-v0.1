<?php
/*
##########[ LinaXSec V 0.1 ]##########
#Alhamdulilah Akhirnya Lutfi Anam Telah Merilis Aplikasi Open Source Pertamanya Yaitu LinaXSec Pada Hari Ini Yaitu Pada Tanggal 10 April 2020 Semoga Aplikasi Yang Lutfi Anam Buat Ini Bisa Bermanfaat Untuk Para Developer-Developer Aplikasi Web. Aplikasi Yang Lutfi Anam Buat Ini Bisa Mendeteksi Serangan Sql Injection ( v 0.1 ) Dan Menyimpan Log Serangan Di Database Aplikasi. Lutfi Anam Merilis Aplikasi LinaXSec Ini Karena Banyaknya Para Defacer / Cracker Yang Sering Merusak Aplikasi Web Tanpa Tanggung Jawab Sedikitpun.
#Nama : LinaXSec - Crack Detect
#Rilis : Jum'at 10 April 2020
#Developer : LinaX
#Coder : Lutfi Anam
#PERJANJIAN PENGGUNAAN
#Tribut : Aplikasi Ini Lutfi Anam Rilis Untuk Merayakan/Mensyukuri Umur Saya Yang Bertambah 1 Tahun, Yaitu Menjadi 17 Tahun ( Semoga Lutfi Anam Bisa Menjadi Orang Yang Lebih Baik Lagi Dan Berfikir Lebih Dewasa .... Amin .... )
#Dengan menggunakan LinaXSec, maka anda setuju untuk :
#1. Tidak mengubah Nama Aplikasi LinaXSec menjadi nama aplikasi lain
#2. Tidak mengubah footer yang menunjukkan alamat website LinaXSec
#3. Tidak menjual Aplikasi LinaXSec. Tetapi anda diperbolehkan untuk mengambil keuntungan dari jasa proses instalasi, konsultasi dan lain sebagainya yang berkaitan dengan LinaXSec
#4. Tidak menhapus tribute dan Perjanjian Penggunaan
#Semoga Aplikasi LinaXSec dapat bermanfaat untuk kita semua.
################################
*/
ob_start(); 
include('../config.php');
@session_start();
if (isset($_SESSION['username'])) {
    $uname = $_SESSION['username'];
    $suser = mysqli_query($connect, "SELECT * FROM `linax_users` WHERE username='$uname'");
    $count = mysqli_num_rows($suser);
    if ($count < 0) {
        echo '<script type="text/javascript">window.location = "index.php"</script>';
        exit;
    }
} else {
    echo '<script type="text/javascript">window.location = "index.php"</script>';
    exit;
}
if( !isset ($_SESSION['token']) ) {
    $_SESSION['token'] = base64_encode ( openssl_random_pseudo_bytes ( 32 ) ) ; 
}

function short_text($text, $length)
{
    $maxTextLenght = $length;
    $aspace        = " ";
    if (strlen($text) > $maxTextLenght) {
        $text = substr(trim($text), 0, $maxTextLenght);
        $text = substr($text, 0, strlen($text) - strpos(strrev($text), $aspace));
        $text = $text . '...';
    }
    return $text;
}
$lf = $lina_file;
function byte_convert($size)
{
    if ($size < 1024)
        return $size . ' Byte';
    if ($size < 1048576)
        return sprintf("%4.2f KB", $size / 1024);
    if ($size < 1073741824)
        return sprintf("%4.2f MB", $size / 1048576);
    if ($size < 1099511627776)
        return sprintf("%4.2f GB", $size / 1073741824);
    else
        return sprintf("%4.2f TB", $size / 1073741824);
}
    if ( strlen($lina_file) != 11 ) {
    	die( );
    }
//Anti XSS (Cross-site Scripting)
function security($input)
{
    @$input = mysqli_real_escape_string($connect, $input);
    @$input = strip_tags($input);
    @$input = addslashes($input);
    return $input;
}

$_GET  = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

function percent($num_amount, $num_total)
{
    @$count1 = $num_amount / $num_total;
    $count2 = $count1 * 100;
    $count  = number_format($count2, 0);
    return $count;
}
if (strlen($data) != 2769) {
die('');
}
function visitor_country($ip)
{
    $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
    
    if ($ip_data && $ip_data->geoplugin_countryName != null) {
        $result = $ip_data->geoplugin_countryName;
    }
    
    return @$result;
}
if (str_word_count($data) != 334) {
   die();
 }
function get_browsericon($browser)
{
	include '../config.php';
    if ($browser == "Google Chrome") {
        $image = '<img src="'.$linaxsec_s.'/img/icons/chrome.png" width="20px" height="20px" />';
        return $image;
    } else {
        if ($browser == "Mozilla Firefox") {
            $image = '<img src="'.$linaxsec_s.'/img/icons/firefox.png" width="20px" height="20px" />';
            return $image;
        } else {
            if ($browser == "Opera") {
                $image = '<img src="'.$linaxsec_s.'/img/icons/opera.png" width="20px" height="20px" />';
                return $image;
            } else {
                if ($browser == "Apple Safari") {
                    $image = '<img src="'.$linaxsec_s.'/img/icons/safari.png" width="20px" height="20px" />';
                    return $image;
                } else {
                    if ($browser == "Netscape") {
                        $image = '<img src="'.$linaxsec_s.'/img/icons/netscape.png" width="20px" height="20px" />';
                        return $image;
                    } else {
                        if ($browser == "Internet Explorer") {
                            $image = '<img src="'.$linaxsec_s.'/img/icons/ie.png" width="20px" height="20px" />';
                            return $image;
                        } else {
                            $image = '<img src="'.$linaxsec_s.'/img/icons/unknown-browser.png" width="20px" height="20px" />';
                            return $image;
                        }
                    }
                }
            }
        }
    }
}

function get_osicon($os)
{
	include '../config.php';
    if ($os == "Windows") {
        $image = '<img src="'.$linaxsec_s.'/img/icons/windows.png" width="20px" height="20px" />';
        return $image;
    } else {
        if ($os == "Linux") {
            $image = '<img src="'.$linaxsec_s.'/img/icons/linux.png" width="20px" height="20px" />';
            return $image;
        } else {
            if ($os == "Mac") {
                $image = '<img src="'.$linaxsec_s.'/img/icons/mac.png" width="20px" height="20px" />';
                return $image;
            } else {
                $image = '<img src="'.$linaxsec_s.'/img/icons/unknown-os.png" width="20px" height="20px" />';
                return $image;
            }
        }
    }
}

if ($linaxsec[0]["nama"] != 'LinaXSec') {
    die('Hagai Pembuat Dengan Tidak Merecode Dan Mengganti Copyright');
}

function head()
{
    include '../config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?= $linaxsec_s; ?>/img/favicon.ico">

  <title><?= $linaxsec[0]["nama"]; ?> - Admin Panel</title>

  <!-- Custom fonts for this template-->
  <link href="<?= $linaxsec_s; ?>/lxs-assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

 <!-- all -->
  <link rel="stylesheet" href="<?= $linaxsec_s; ?>/lxs-assets/vendor/jquery-datatables/assets/css/datatables.css" />
  
  <!-- Custom styles for this template-->
  <link href="<?= $linaxsec_s; ?>/lxs-assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
          <i class="fas  fa-user-secret"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?= $linaxsec[0]["nama"]; ?> <sup><?= $linaxsec[0]["versi"]; ?></sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <li <?php
    if (basename($_SERVER['SCRIPT_NAME']) == 'dashboard.php') {
        echo "active";
    }
?>">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Feature
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?php
    if (basename($_SERVER['SCRIPT_NAME']) == 'all-logs.php') {
        echo "active";
    }
?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-list-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          <span>Logs</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Log Attack:</h6>                                                     
            <a class="collapse-item" href="sqli-logs.php">
<?php
    $table = $prefix . 'logs';
    @$lquery2 = mysqli_query($connect, "SELECT * FROM $table WHERE type='SQLi'");
    @$lcount2 = mysqli_num_rows($lquery2);
?>
<i class="fa fa-code"></i> Sql Injection Logs <span class="badge badge-danger badge-counter"><?= $lcount2; ?></span></a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-shield-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          <span>Security</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Security Menu:</h6>
            <a class="collapse-item" href="sql-injection.php"><i class="fa fa-code"></i> Sql injection</a>
          </div>
        </div>
      </li>
      
      <!-- Nav Item - Charts -->
      <li class="nav-item <?php
    if (basename($_SERVER['SCRIPT_NAME']) == 'w-pages.php') {
        echo "active";
    }
    ?>">
    <a class="nav-link" href="w-pages.php">
          <i class="fas fa-exclamation-triangle fa-cog"></i>
          <span>Pages</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        All
      </div>


      <!-- Nav Item - Charts -->
      <li class="nav-item <?php
    if (basename($_SERVER['SCRIPT_NAME']) == 'settings.php') {
        echo "active";
    }
?>">
        <a class="nav-link" href="settings.php">
          <i class="fas fa-fw fa-cog"></i>
          <span>Settings</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="logout.php" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-red-400"></i>
          <span>Logout</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          
          <!-- Topbar Search -->
          <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                    <div class="form-control bg-light border-0 small">
                    	 <?= $linaxsec[0]["pengumuman"]["singkat"]; ?>
                    </div>
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-bullhorn fa-sm"></i>
                </button>
              </div>
            </div>
          </div>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">          	
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="NotifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bullhorn fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="NotifDropdown">
                  <div class="input-group">
                    <div class="form-control bg-light border-0 small">
                    	 <?= $linaxsec[0]["pengumuman"]["singkat"]; ?>
                    </div>
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-exclamation fa-sm"></i>
                      </button>
                    </div>
                  </div>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-server fa-fw"></i>
                <!-- Counter - Alerts -->
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Information Your System
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">

                      <div class="text-black-50 small">
                      	<p>Host : <b><?= $site_url; ?></b> <br>
                                 Ip : <b><?= getenv("REMOTE_ADDR"); ?></b> <br>
                                 Software : <b><?= $_SERVER['SERVER_SOFTWARE']; ?></b> <br>
                                 Php Versi : <b><?= phpversion(); ?></b> <br>
                                 System : <b><?= php_uname(); ?></b> <br>
                                 Path : <b><?= $_SERVER['REQUEST_URI']; ?></b> <br>
                          </p>
                      </div>

                </a>
                <a class="dropdown-item text-center small text-gray-500" href="<?= $site_url; ?>"><?= $linaxsec[0]['developer']; ?>@<?= getenv("REMOTE_ADDR"); ?> : /$</a>
              </div>
            </li>
            
            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-wifi fa-fw"></i>
                <!-- Counter - Messages -->
              </a>
<?php
if ($linaxsec[0]["coder"] != 'Lutfi Anam') {
    die('Hagai Pembuat');
}
?>              
              <!-- About App -->
              <div class="dropdown-list dropdown-menu-right dropdown-menu shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  About <?= $linaxsec[0]["nama"]; ?> - <?= $linaxsec[0]["slogan"]; ?>
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                	<div class="col-sm-12">
                	<center>
                        <img class="img-responsive img-circle" width="250px" height="250px" src="<?= $linaxsec_s; ?>/img/logo.png" alt="Logo <?= $linaxsec[0]["nama"]; ?>">
                        <div class="text-truncate text-center"><h4><b><?= $linaxsec[0]["nama"] .' V '. $linaxsec[0]["versi"]; ?></b></h4></div>
                    </center>
                        <p>
                    	    Developer : <?= $linaxsec[0]["developer"]; ?> <br>
                    	    Coder : <?= $linaxsec[0]["coder"]; ?> <br>
                    	    GitHub : https://github.com/lutfianam <br>
                    	    FansPage : <?= $linaxsec[0]["fanspage"]; ?> <br>
                    	    Alamat : <?= $linaxsec[0]["alamat"]; ?> <br>
                    	    Rilis Versi <?= $linaxsec[0]["versi"]; ?> : <?= $linaxsec[0]["rilis"]; ?> <br>
                    	    Fitur <?= $linaxsec[0]["nama"] .' V '. $linaxsec[0]["versi"]; ?> : <br>
                    	    <?php
                    	    foreach($linaxsec[0]['fitur'] as $fitur){
                                echo "=> ".$fitur."<br>";
                            }
                            ?><br>
                            	Ingin Berdonasi Atau Request Fitur? silahkan berdonasi lewat Paypal Dan Chat <?= $linaxsec[0]['coder']; ?> di email ini "<?= $linaxsec[0]['email']; ?>" Agar <?= $linaxsec[0]['coder']; ?> Bisa Lebih Bersemangat Dalam Megembangkan Aplikasi <?= $linaxsec[0]['nama']; ?>
                    	</p>
                    </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="<?= $linaxsec[0]['web']; ?>">Coded By <?= $linaxsec[0]["coder"] .' - '. $linaxsec[0]["developer"]; ?></a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>
<?php
    $uname = $_SESSION['username'];
    $table = $prefix . 'users';
    $suser = mysqli_query($connect, "SELECT * FROM `$table` WHERE username='$uname'");
    $urow  = mysqli_fetch_array($suser);
?>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['username']; ?></span>
                <img class="img-profile rounded-circle" src="<?= $linaxsec_s; ?>/img/profile.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="users.php?linax_token=<?= $_SESSION['token']; ?>&edit-id=<?= $urow['id']; ?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  My Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-red-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
<?php
}
if (str_word_count('core.php') != 326) {
	str_word_count('core.php');
 }
 
function footer()
{
	include '../config.php';
?>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
           <!-- JANGAN HAPUS ATAU EDIT  COPYRIGHT YA KANG! -->
            <span>Copyright &copy; <a href="#"><?= $linaxsec[0]["nama"]; ?></a> <?= date("Y"); ?></span>
            <!-- COPYRIGHT BT LINAXSEC - LINAX - LUTFI -->
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= $linaxsec_s.'/lxs-assets/vendor/jquery/jquery.min.js'; ?>"></script>
  <script src="<?= $linaxsec_s.'/lxs-assets/vendor/bootstrap/js/bootstrap.bundle.min.js'; ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= $linaxsec_s.'/lxs-assets/vendor/jquery-easing/jquery.easing.min.js'; ?>"></script>
  <script src="<?= $linaxsec_s.'/lxs-assets/vendor/jquery-datatables/media/js/jquery.dataTables.js'; ?>"></script>
  <script src="<?= $linaxsec_s.'/lxs-assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js'; ?>"></script>
  <script src="<?= $linaxsec_s.'/lxs-assets/vendor/jquery-datatables-bs3/assets/js/datatables.js'; ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= $linaxsec_s.'/lxs-assets/js/sb-admin-2.min.js'; ?>"></script>

</body>

</html>
<?php
}

ob_end_flush();
?>