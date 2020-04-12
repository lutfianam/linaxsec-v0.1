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
 include "core.php";
 head(); 
?>
          <!-- Header Dashboard -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

        <!-- Content Row -->
          <div class="row">

                <div class="col-lg-6 mb-4">
                  <div class="card bg-primary text-white shadow mb-4">
                    <div class="card-body">
                      Tribute :
                      <div class="text-white-50 small"><?= $linaxsec[0]["tribute"]; ?></div>
                    </div>
                  </div>
                </div>

<?php
$date  = date('d F Y');
$table = $prefix . 'logs';
@$linaq = mysqli_query($connect, "SELECT * FROM $table WHERE type='SQLi'");
@$linaq2 = mysqli_query($connect, "SELECT * FROM $table WHERE date='$date' AND type='SQLi'");
@$linaxsqli = mysqli_num_rows($linaq);
@$linaxsqli2 = mysqli_num_rows($linaq2);
?>          	
          <!-- Notif Attack -->
            <div class="col-xl-3 col-md-6 mb-4">
            	
            <!-- Count Attack Sqli -->            	
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Sql Injection</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $linaxsqli; ?> <font class="text-xs text-primary">( <?= $linaxsqli2; ?> Today )</font></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-code fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Sqli -->
            
<?php
$table = $prefix . 'logs';
$linaqsql = mysqli_query($connect, "SELECT * FROM $table ORDER BY id DESC LIMIT 1");
$linaq   = mysqli_fetch_assoc($linaqsql);
?>
            <!-- Log Attacker/Cracker -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Recent Logs</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $linaq['ip']; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas  fa-user-secret fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- end log -->
         
           </div>
<!-- end -->

	
              <!-- Modules And Functions -->
              <div class="card shadow mb-4">
                <!-- Header Modules & Functions -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary">Modules & Functions</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="#modulesandfunctions">
                  <div class="card-body">
                  	
            <!-- Row Modules -->
			<div class="row">
              <!-- Security Modules -->
              <div class="col-sm-6">
              <div class="card mb-4">
                <div class="card-header">
                  <i class="fa fa-cog"></i> Security Modules
                </div>
                <div class="card-body">
                        <div class="well">
						    <center>
							<b><i class="fa fa-code"></i> SQL Injection</b><br />Protection
<?php
$table = $prefix . 'sqli-settings';
$query = mysqli_query($connect, "SELECT * FROM `$table`");
$row   = mysqli_fetch_assoc($query);
if ($row['protection'] == 'Yes') {
    echo '
				<div class="col-lg-6 mb-4">
                  <div class="card bg-success text-white shadow">
                    <div class="card-body">
                      ON
                    </div>
                  </div>
                </div>
';
} else {
    echo '
               <div class="col-lg-6 mb-4">
                  <div class="card bg-warning text-white shadow">
                    <div class="card-body">
                      OFF
                    </div>
                  </div>
                </div>
';
}
?>
                            </center>							
						</div>
					</div>
                 </div>
            </div>
            
              <!-- Logging Settings -->
              <div class="col-sm-6">
              <div class="card mb-4">
                <div class="card-header">
                  <i class="fa fa-list-ul"></i> Logging Settings
                </div>
                
                <div class="card-body">
                        <div class="well">
						    <center>
							<b><i class="fa fa-code"></i> SQL Injection</b><br />Logging
<?php
$table = $prefix . 'sqli-settings';
$query = mysqli_query($connect, "SELECT * FROM `$table`");
$row   = mysqli_fetch_assoc($query);
if ($row['logging'] == 'Yes') {
    echo '
				<div class="col-lg-6 mb-4">
                  <div class="card bg-success text-white shadow">
                    <div class="card-body">
                      ON
                    </div>
                  </div>
                </div>
';
} else {
    echo '
             <div class="col-lg-6 mb-4">
                  <div class="card bg-warning text-white shadow">
                    <div class="card-body">
                      OFF
                    </div>
                  </div>
                </div>
';
}
?>
                            </center>							
						 </div>
						</div>
						
				    </div>
				   </div>
				 </div>
                </div>
              </div>
<?php
if($linaxsec[0]['notif']['show'] == 'ya') {
	echo '
              <div class="col-sm-12">
                <div class="col-lg-6 mb-4">
                  <div class="card bg-'.$linaxsec[0]['notif']['color'].' text-white shadow">
                    <div class="card-body">
                     [ '.$linaxsec[0]['notif']['sub'].' ]<br>
                      '.$linaxsec[0]['notif']['judul'].'
                      <div class="text-white-50 small">'.$linaxsec[0]['notif']['pesan'].'</div>
                    </div>
                  </div>
                </div>
                </div>';
  }
?>
              
            </div>
            <!-- End Row -->

<?php
footer();
?>