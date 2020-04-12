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
          <!-- Header Setting -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Settings</h1>
          </div>
          
              <!-- Settings -->
              <div class="card mb-4">
                <div class="card-header">
                  <i class="fa fa-cog"></i> Settings
                </div>
                <div class="card-body">
                  
					<div class="row">
						<div class="col-md-12">
							<section class="panel">
								<div class="panel-body">
<?php
$table = $prefix . 'settings';
@$query = mysqli_query($connect, "SELECT * FROM `$table`");
@$row = mysqli_fetch_array($query);
?>
                                      <form class="form-horizontal form-bordered" method="post">
                                      	<input type="hidden" name="linax_token" value="<?= $_SESSION['token'] ?>">
											<div class="form-group">
												<label class="col-md-3 control-label" for="inputDefault">E-Mail Address:</label>
												<div class="col-md-12">
													<input type="text" class="form-control" name="email" value="<?= $row['email']; ?>" required>
												</div>
											</div>
                                            <div class="form-group">
												<label class="control-label col-md-3">RealTime Protection</label>
												<div class="col-md-12">
													<div class="switch switch-success">
														<input type="checkbox" name="realtime_protection" data-plugin-ios-switch 
<?php
if ($row['realtime_protection'] == 'Yes') {
    echo 'checked="checked" checked';
}
?>
                                                        />
                                                       With this module you can <b>Enable</b> or <b>Disable</b> the whole script.
													</div>
												</div>
											</div>
                                            <div class="form-group">
												<label class="control-label col-md-3">Mail Notifications</label>
												<div class="col-md-9">
													<div class="switch switch-success">
														<input type="checkbox" name="mail_notifications" data-plugin-ios-switch 
<?php
if ($row['mail_notifications'] == 'Yes') {
    echo 'checked="checked" checked';
}
?>
                                                        />
                                                        If this is <b>Enabled</b> you will receive notifications on your E-Mail Address
													</div>
												</div>
											</div>
                                       </div>
                                <footer class="panel-footer">
										<button class="btn btn-primary btn-block" name="save" type="submit">Save</button>
										<button type="reset" class="btn btn-info btn-block">Reset</button>
								</footer>
                             </form>
<?php
if (isset($_POST['save']) && $_SESSION['token'] == $_POST['linax_token']) {
    $table = $prefix . 'settings';
    
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<br /><div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<strong>The entered E-Mail Address is not valid!</strong>
              </div>
        ';
    } else {
        
        if (isset($_POST['realtime_protection'])) {
            $realtime_protection = 'Yes';
        } else {
            $realtime_protection = 'No';
        }
        
        if (isset($_POST['mail_notifications'])) {
            $mail_notifications = 'Yes';
        } else {
            $mail_notifications = 'No';
        }
        
        $query = mysqli_query($connect, "UPDATE `$table` SET email='$email', realtime_protection='$realtime_protection', mail_notifications='$mail_notifications' WHERE id=1");
        echo '<meta http-equiv="refresh" content="0;url=settings.php">';
    }
}
?>
							</section>
						</div>
					</div>
                </div>
              </div>
<?php
footer();
?>