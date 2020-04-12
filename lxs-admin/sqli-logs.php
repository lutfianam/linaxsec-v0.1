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
          <!-- Header Sqli Logs -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Sqli Logs</h1>
          </div>
              <!-- sqli logs -->
              <div class="card mb-4">
                <div class="card-header">
                  Sqli Logs
                </div>
                <div class="card-body">
                  <section role="main" class="content-body">
					<!-- start: page -->
					<div class="row">
						<div class="col-md-12">
							<section class="panel">
								<div class="panel-body">
                                 <table class="table table-bordered table-striped table-hover mb-none table-responsive" id="datatable-tabletools" data-swf-path="<?= $linaxsec_s; ?>/lxs-assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
									<thead>
										<tr>
								          <th>ID</th>
						                  <th>IP Address</th>
						                  <th>Date</th>
										  <th>Browser</th>
										  <th>OS</th>
										  <th>Country</th>
						                  <th>Type</th>
										  <th>Actions</th>
										</tr>
									</thead>
									<tbody>
<?php
$table = $prefix . 'logs';
$sql   = mysqli_query($connect, "SELECT * FROM `$table` WHERE type='SQLi' ORDER by id DESC");
while ($row = mysqli_fetch_assoc($sql)) {
    echo '
										<tr>
                                          <td>' . $row['id'] . '</td>
						                  <td>' . $row['ip'] . '</td>
						                  <td>' . $row['date'] . '</td>
										  <td>' . get_browsericon($row['browser']) . ' ' . $row['browser'] . '</td>
										  <td>' . get_osicon($row['os']) . ' ' . $row['os'] . '</td>
										  <td><img src="http://api.hostip.info/flag.php?ip=' . $row['ip'] . '" width="30px" height="15px" style="border: 1px solid #696969"> ' . visitor_country($row['ip']) . '</td>
						                  <td>';
    if ($row['type'] == 'SQLi') {
        echo '
						                    <i class="fa fa-code"></i> ' . $row['type'] . '
						                    ';
    }
    echo '
										  </td>
										  <td>
											<a href="#log' . $row['id'] . '" class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-primary"><i class="fa fa-tasks"></i> Details</a>
											<a href="?delete-id='.$row['id'].'&linax_token='.$_SESSION['token'].'" class="btn btn-danger"><i class="fa fa-times"></i> Delete</a>
										  </td>
										</tr>
';
}
?>
									</tbody>
								    </table>
							</div>
<?php
$table = $prefix . 'logs';
$sql   = mysqli_query($connect, "SELECT * FROM `$table` WHERE type='SQLi' ORDER by id DESC");
while ($row = mysqli_fetch_assoc($sql)) {
    echo '
									<div id="log' . $row['id'] . '" class="zoom-anim-dialog modal-block modal-header-color modal-block-primary mfp-hide">
										<section class="panel">
											<header class="panel-heading">
												<h2 class="panel-title">Log #' . $row['id'] . '</h2>
											</header>
											<div class="panel-body">
												<div class="form-group">
														<label class="col-sm-3 control-label"><i class="fa fa-list-ul"></i> Log ID: </label>
														<div class="col-sm-12">
															<input type="text" class="form-control" value="' . $row['id'] . '" readonly /><br />
														</div>
                                                        
                                                        <label class="col-sm-3 control-label"><i class="fa fa-user"></i> IP Address:</label>
														<div class="col-sm-12">
															<input type="text" class="form-control" value="' . $row['ip'] . '" readonly /><br />
														</div>
                                                        
                                                        <label class="col-sm-3 control-label"><i class="fa fa-calendar-o"></i> Date & Time: </label>
														<div class="col-sm-12">
															<input type="text" class="form-control" value="' . $row['date'] . ' at ' . $row['time'] . '" readonly /><br />
														</div>
                                                        
                                                        <label class="col-sm-3 control-label"> <i class="fa fa-globe"></i> Browser: </label>
														<div class="col-sm-12">
                                                            <input type="text" class="form-control" value="' . $row['browser'] . ' ' . $row['browser_version'] . '" readonly /><br />
														</div>
                                                        
                                                        <label class="col-sm-3 control-label"><i class="fa fa-desktop"></i> Operating System: </label>
														<div class="col-sm-12">
															<input type="text" class="form-control" value="' . $row['os'] . ' ' . $row['os_version'] . '" readonly /><br />
														</div>
                                                        
                                                        <label class="col-sm-3 control-label"><i class="fa fa-map-marker"></i> Country: </label>
														<div class="col-sm-12">
                                                            <input type="text" class="form-control" value="' . visitor_country($row['ip']) . '" readonly /><br />
														</div><br />
                                                        
                                                        <label class="col-sm-3 control-label"><i class="fa fa-map-marker"></i> City: </label>
														<div class="col-sm-12">
                                                            <input type="text" class="form-control" value="';
    $linaq_city = @unserialize(file_get_contents('http://ip-api.com/php/' . $row['ip']));
    echo '' . $linaq_city['city'] . '';
    echo '" readonly /><br />
														</div><br />
                                                        
                                                        <label class="col-sm-3 control-label"><i class="fa fa-pencil-square-o"></i> Type: </label>
														<div class="col-sm-12">
															<input type="text" class="form-control" value="' . $row['type'] . '" readonly /><br />
														</div>
                                                        
                                                        <label class="col-sm-3 control-label"><i class="fa fa-clipboard"></i> Attacked Page: </label>
														<div class="col-sm-12">
															<input type="text" class="form-control" value="' . $row['page'] . '" readonly /><br />
														</div>
                                                        
                                                        <label class="col-sm-3 control-label"><i class="fa fa-external-link"></i> Referer URL: </label>
														<div class="col-sm-12">
															<input type="text" class="form-control" value="' . $row['referer_url'] . '" readonly /><br />
														</div>
														
														<div class="col-sm-12">
							                               <a href="?linax_token='.$_SESSION['token'].'&delete-id=' . $row['id'] . '" class="btn btn-danger btn-block">Delete</a>
												       </div>
													</div>
											</div>
										</section>
									</div>
';
}
?>
<?php
@$id = $row['id'];
if (isset($_GET['delete-id']) && $_SESSION['token'] == $_GET['linax_token']) {
    $id    = (int) $_GET["delete-id"];
    $table = $prefix . 'logs';
    $query = mysqli_query($connect, "DELETE FROM `$table` WHERE id='$id' and type='SQLi' ");
    echo "<meta http-equiv=Refresh content=0;url=sqli-logs.php>";
}
?>
								</div>
							</section>
						</div>
					</div>
					<!-- end: page -->
				</section>
<?php
footer();
?>