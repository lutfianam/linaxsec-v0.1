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
// Untul Maintenancekan Server Kamu
$lxs_mt = 0; // Maintenance? 1 = ya 0 = tidak
if($lxs_mt == 1) {
    die("[ MAINTANANCE ] <br> silahkan cek dalam beberapa saat");
}

$host     = "localhost"; // Database Host
$database = "linaxsec"; // Database Name
$user     = "root"; // Database Username
$password = ""; // Database Password
$prefix   = "linax_"; // Database Prefix

$connect = mysqli_connect($host,$user,$password,$database);

// Mengecek Koneksi
if (mysqli_connect_errno())
{
  echo "Koneksi Ke MySQL Gagal: " . mysqli_connect_error();
}

mysqli_set_charset($connect, "utf8");

$root=(isset($_SERVER['HTTPS']) ? "https://" : "http://").$_SERVER['HTTP_HOST'];
$root.= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

// Internal Server Configuration
$site_url      = $_SERVER['HTTP_HOST'];
$linaxsec_path = $root;
$base_url = 'http://localhost:8080/php_project/process/linaxsec';

// Eksternal Server LinaXSec
$linaxsec_s = $base_url;
$lina_file = "linaku.json";
$data = file_get_contents($base_url.'/'.$lina_file);
$linaxsec = json_decode($data, true);
?>