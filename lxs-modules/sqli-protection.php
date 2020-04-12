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
//SQLi Protection
$table = $prefix . 'sqli-settings';
@$query = mysqli_query($connect, "SELECT * FROM `$table`");
@$row = mysqli_fetch_assoc($query);
if ($row['protection'] == "Yes") {
    
    //Santization of all fileds and requests
    $_GET  = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
    $table2 = $prefix . 'sqli-patterns';
    @$query2 = mysqli_query($connect, "SELECT * FROM `$table2`");
    while ($row2 = mysqli_fetch_array($query2, MYSQL_ASSOC)) {
        
        @$string = $_SERVER['QUERY_STRING'];
        if (strpos(strtolower($string), $row2['pattern']) !== false) {
            
            //$attacked_page = security('' . $page . '?' . $string . '');
            $type          = "SQLi";
            
            if ($prefix != 'linax_') {
            	die();
            }
            //Logging the Attack
            if ($row['logging'] == "Yes") {
                $ltable = $prefix . 'logs';
                @$queryvalid = mysqli_query($connect, "SELECT * FROM `$ltable` WHERE ip='$ip' and page='$attacked_page' and type='$type' LIMIT 1");
                @$validator = mysqli_num_rows($queryvalid);
                if ($validator <= "0") {
                    @$log = mysqli_query($connect, "INSERT INTO `$ltable` (ip, date, time, page, type, browser, browser_version, os, os_version, referer_url) VALUES ('$ip', '$date', '$time', '$page', '$type', '$browser', '$browser_version', '$os', '$os_version', '$referer')");
                }
            }
            
            //E-Mail Notification
            $site = $_SERVER['HTTP_HOST'];
            if ($srow['mail_notifications'] == "Yes" && $row['mail'] == "Yes") {
                $email   = 'linaxsec@'.$site.'';
                $to      = $srow['email'];
                $subject = 'LinaXSec - ' . $type . '';
                $message = '
					<p style="padding:0; margin:0 0 11pt 0;line-height:160%; font-size:18px;">Details of Log - ' . $type . '</p>
					<p>IP Address: <b>' . $ip . '</b></p>
					<p>Date: <b>' . $date . '</b> at <b>' . $time . '</b></p>
					<p>Browser & Version:  <b>' . $browser . ' ' . $browser_version . '</b></p>
					<p>Operating System:  <b>' . $os . '</b></p>
                    <p>OS Version:  <b>' . $os_version . '</b></p>
					<p>Banned: <b>' . $autoban . '</b></p>
					<p>Type of the attack:  <b>' . $type . '</b> </p>
					<p>Page:  <b>' . $attacked_page . '</b> </p>
                    <p>Referer URL:  <b>' . $referer_url . '</b> </p>
                    <p>Site URL:  <b>' . $site_url . '</b> </p>
                    <p>LinaXSec URL:  <b>' . $linaxsec_path . '</b> </p>
				    ';
                $headers = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                $headers .= 'To: ' . $to . ' <' . $to . '>' . "\r\n";
                $headers .= 'From: ' . $email . ' <' . $email . '>' . "\r\n";
                @mail($to, $subject, $message, $headers);
            }
            echo '<meta http-equiv="refresh" content="0;url=' . $row['redirect'] . '" />';
        }
    }
}
?>