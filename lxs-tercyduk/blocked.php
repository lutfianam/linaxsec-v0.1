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
include "header.php";
$table = $prefix . 'pages-layolt';
$query = mysqli_query($connect, "SELECT * FROM `$table` WHERE page='Blocked'");
$row   = mysqli_fetch_array($query);
?>
    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2"><?= $row['text']; ?></h1>
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?= $row['image']; ?>" alt="">
                  </div>
                    <p class="mb-4">Silahkan Chat Admin Jika Terdapat Kesalah Pahaman.</p>
                  </div>
                  <form class="user" action="#" method="get">
                    <div class="form-group">
                      <input type="text" name="terciduk" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" value="Halo Google, Kantor Polisi Terdekat">
                    </div>
                    <a href="https://www.google.com/search?q=Halo+Google%2C+Kantor+Polisi+Terdekat&oq=Halo+Google%2C+Kantor+Polisi+Terdekat&aqs=chrome..69i57.33732j0j7&sourceid=chrome-mobile&ie=UTF-8" class="btn btn-danger btn-user btn-block">
                      Search
                    </a>
                  </form>
                  <hr>
                  <div class="text-center">
                    <p class="small"><i class="fa  fa-lock"></i> Protected By <a href="<?= $linaxsec[0]['web']; ?>"><?= $linaxsec[0]['nama']; ?> </a> </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
<?php
include "footer.php";
?>