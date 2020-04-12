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
          <!-- Header Warning -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Warning Pages</h1>
          </div>

              <!-- Dropdown Card Example -->
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Warning Pages</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Pages Menu :</div>
                      <a class="dropdown-item" href="#sqli-layout" data-toggle="pill"><i class="fa fa-code"></i> SQL Injection</a>
                  </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                 <div class="panel-body">
<form action="" method="post">
<input type="hidden" name="linax_token" value="<?= $_SESSION['token'] ?>">
  <!-- Content -->
  <div class="col-md-12 center">
    <div class="tab-content">
	
<?php
$table = $prefix . 'pages-layolt';
$sql   = mysqli_query($connect, "SELECT * FROM `$table` WHERE page='Blocked'");
$row   = mysqli_fetch_assoc($sql);
?>
      <div class="tab-pane active" id="sqli-layout">
	  <fieldset>
	        <center>
			
			<label>Image:</label><br />
			<img src="<?php
echo $row['image'];
?>" width="100px" height="100px" title="SQL Injection Page Logo" style="margin-bottom: 5px;"/><br />
	        <input name="image" class="form-control" type="text" value="<?php
echo $row['image'];
?>" required><br />
						  
            <label>Page Text:</label>
	        <textarea name="text" class="form-control" rows="5" type="text" required><?php
echo $row['text'];
?></textarea>
			
			</center>
	  </fieldset>
	  </div>
	  
    </div>
  </div>
                                
								</div>
								<footer class="panel-footer">
									<br>
										<input type="submit" class="btn btn-primary btn-block" name="update" value="Save" />
										<button type="reset" class="btn btn-info btn-block">Reset</button>
								</footer>
								</form>
<?php
if (isset($_POST['update']) && $_SESSION['token'] == $_POST['linax_token']) {
    @$text = addslashes($_POST['text']);
    @$image = addslashes($_POST['image']);
    
$table         = $prefix . 'pages-layolt';
$update_blocked = mysqli_query($connect, "UPDATE `$table` SET 
`text` = '$text', 
`image` = '$image' 
WHERE page='Blocked'");

    echo '<meta http-equiv="refresh" content="0;url=w-pages.php">';
}
?>
                </div>
              </div>
<?php
footer();
?>