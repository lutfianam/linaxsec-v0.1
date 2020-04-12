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
          <!-- Header Sql injection -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Protection Module</h1>
          </div>
              <!-- sqli - module -->
              <div class="card mb-4">
                <div class="card-header">
                  SQL Injection - Protection Module
                </div>
                <div class="card-body">
					<!-- start: page -->
					<div class="row">
						<div class="col-md-12">
<?php
$table = $prefix . 'sqli-settings';
@$query = mysqli_query($connect, "SELECT * FROM `$table`");
@$row = mysqli_fetch_array($query);
if ($row['protection'] == 'Yes') {
    echo '
                                                     <section class="panel panel-success">
';
} else {
    echo '
                                                     <section class="panel panel-danger">
';
}
?>
<?php
if ($row['protection'] == 'Yes') {
    echo '
<div class="jumbotron">
	<center>
        <h1 style="color: #47A447;"><i class="fa fa-check-circle-o"></i> Enabled</h1>
        <p>The site is protected from <b>SQL Injection Attacks (SQLi)</b></p>
   </center>
</div>
';
} else {
    echo '
<div class="jumbotron">
	<center>
        <h1 style="color: #d2322d;"><i class="fa fa-times-circle-o"></i> Disabled</h1>
        <p>The site is not protected from <b>SQL Injection Attacks (SQLi)</b></p>
    </center>
</div>
';
}
?>
					</div>
				  </section>
                </div>
              </div>
              </div>
              <!-- SQLi Patterns -->
              <div class="card mb-4">
                <div class="card-header">
                  SQLi Patterns
                </div>
                <div class="card-body">
                                    <div class="zoom-anim-dialog modal-block modal-header-color modal-block-primary mfp-hide">
											<div class="panel-body">
                                                <form class="form-horizontal mb-lg" method="POST">
                                                	<input type="hidden" name="linax_token" value="<?= $_SESSION['token'] ?>">
												     <div class="form-group">
                                                        <label class="col-sm-3 control-label">Pattern:</label>
														<div class="col-sm-12">
															<input type="text" class="form-control" name="pattern" value="" required/>
														</div>
														<label class="col-sm-3 control-label"></label>
														<div class="row">
														<div class="col-sm-12">
									                       <input class="btn btn-block btn-primary" name="add-pattern" type="submit" value="Add">
													  </div>
													  </div>
												</div>
											</div>
									    </div>
                                    </form>
<?php
if (isset($_POST['add-pattern']) && $_SESSION['token'] == $_POST['linax_token']) {
    $table      = $prefix . 'sqli-patterns';
    $pattern    = $_POST['pattern'];
    $queryvalid = mysqli_query($connect, "SELECT * FROM `$table` WHERE pattern='$pattern' LIMIT 1");
    $validator  = mysqli_num_rows($queryvalid);
    if ($validator > "0") {
        echo '<meta http-equiv="refresh" content="0;url=sql-injection.php">';
    } else {
        $query = mysqli_query($connect, "INSERT INTO `$table` (pattern) VALUES ('$pattern')");
        echo '<meta http-equiv="refresh" content="0;url=sql-injection.php">';
    }
}
?>
                                 <table class="table table-bordered table-striped table-hover mb-none table-responsive" id="datatable-default">
									<thead>
										<tr>
											<th>Pattern</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
<?php
$table = $prefix . 'sqli-patterns';
$query = mysqli_query($connect, "SELECT * FROM `$table`");
while ($row = mysqli_fetch_assoc($query)) {
    echo '
										<tr>
                                            <td>' . $row['pattern'] . '</td>
											<td>
                                             <a href="?linax_token='.$_SESSION['token'].'&delete-id=' . $row['id'] . '" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
											</td>
										</tr>
';
}

if (isset($_GET['delete-id']) && $_SESSION['token'] == $_GET['linax_token']) {
    $id    = (int) $_GET["delete-id"];
    $table = $prefix . 'sqli-patterns';
    $query = mysqli_query($connect, "DELETE FROM `$table` WHERE id='$id'");
    echo "<meta http-equiv=Refresh content=0;url=sql-injection.php>";
}
?>
									</tbody>
								</table>
						</div>
                </div>
          

              <div class="col-lg-6 mb-4">
                  <div class="card bg-primary text-white shadow">
                    <div class="card-body">
                      What is SQL Injection
                      <div class="text-white-50 small"><b>SQL Injection</b> is a technique where malicious users can inject SQL commands into an SQL statement, via web page input. Injected SQL commands can alter SQL statement and compromise the security of a web application.</div>
                    </div>
                  </div>
                </div>
              
              <!-- Setting Card -->
              <div class="card mb-4">
                <div class="card-header">
                  Settings
                </div>
                <div class="card-body">
                  <form class="form-horizontal form-bordered" action="" method="post">
                  	<input type="hidden" name="linax_token" value="<?= $_SESSION['token'] ?>">
                            <section class="panel">
								<div class="panel-body">
                                    <div class="form-group">
											<label class="col-sm-4 control-label">Protection: </label>
											<div class="col-sm-8">
												<div class="switch switch-success">
														<input type="checkbox" name="protection" data-plugin-ios-switch 
<?php
$table = $prefix . 'sqli-settings';
@$query = mysqli_query($connect, "SELECT * FROM `$table`");
@$row = mysqli_fetch_array($query);
if ($row['protection'] == 'Yes') {
    echo 'checked="checked" checked';
}
?>
                                                         value="On" />
												</div>
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-sm-4 control-label">Logging: </label>
											<div class="col-sm-12">
												<div class="switch switch-success">
														<input type="checkbox" name="logging" data-plugin-ios-switch 
<?php
if ($row['logging'] == 'Yes') {
    echo 'checked="checked" checked';
}
?>
                                                               value="On" />
												</div>
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-sm-4 control-label">Mail Notifications: </label>
											<div class="col-sm-12">
                                                <div class="switch switch-success">
														<input type="checkbox" name="mail" data-plugin-ios-switch 
<?php
if ($row['mail'] == 'Yes') {
    echo 'checked="checked" checked';
}
?>
                                                               value="On" />
												</div>
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-sm-4 control-label">Redirect URL: </label>
											<div class="col-sm-12">
												<input name="redirect" class="form-control" type="text" value="<?= $row['redirect']; ?>" required>
											</div>
										</div>
									</div>
									<footer class="panel-footer">
										<button class="btn btn-block btn-primary" name="save" type="submit">Save</button>
										<button type="reset" class="btn btn-info btn-block">Reset</button>
									</footer>
							</section>
</form>
<?php
if (isset($_POST['save']) && $_SESSION['token'] == $_POST['linax_token']) {
    $table = $prefix . 'sqli-settings';
    
    if (isset($_POST['protection'])) {
        $protection = 'Yes';
    } else {
        $protection = 'No';
    }
    
    if (isset($_POST['logging'])) {
        $logging = 'Yes';
    } else {
        $logging = 'No';
    }
    
    if (isset($_POST['mail'])) {
        $mail = 'Yes';
    } else {
        $mail = 'No';
    }
    
    $redirect = $_POST['redirect'];
    
    $query = mysqli_query($connect, "UPDATE `$table` SET protection='$protection', logging='$logging', autoban='$autoban', mail='$mail', redirect='$redirect' WHERE id=1");
    echo '<meta http-equiv="refresh" content="0;url=sql-injection.php">';
}
?>
						</div>
					</div>
<?php
footer();
?>