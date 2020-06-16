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
#4. Tidak menghapus tribute dan Perjanjian Penggunaan
#Semoga Aplikasi LinaXSec dapat bermanfaat untuk kita semua.
################################
*/
include "lxs-modules/core.php";
//Checking if the visitor is in the Whitelist
$wtable = $prefix . 'ip-whitelist';
@$wquery = mysqli_query($connect, "SELECT * FROM `$wtable` WHERE ip='$ip'");
@$wrow = mysqli_num_rows($wquery);
if ($wrow == "0") {

    //Checking if LinaXSec is enabled
    $table = $prefix . 'settings';
    @$squery = mysqli_query($connect, "SELECT * FROM `$table`");
    @$srow = mysqli_fetch_assoc($squery);
    if ($srow['realtime_protection'] == "Yes") {
        include "lxs-modules/sqli-protection.php";
    }
    
}
?>
