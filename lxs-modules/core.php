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
//XSS Protection (Cross-site Scripting)
function security($input)
{
    @$input = mysqli_real_escape_string($connect, $input);
    @$input = strip_tags($input);
    @$input = addslashes($input);
    return $input;
}

//Getting Real IP Address
function get_realip()
{
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if (getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if (getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if (getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if (getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if (getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'Unknown';
    return $ipaddress;
}

//Getting Browser
function getBrowser()
{
    $u_agent  = $_SERVER['HTTP_USER_AGENT'];
    $bname    = 'Unknown';
    $platform = 'Unknown';
    $version  = "";
    
    //Getting Platform (OS)
    //Linux
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'Linux';
        //Mac OS
    } elseif (preg_match('/macintosh|mac os x|mac_powerpc/i', $u_agent)) {
        $platform = 'Mac OS';
        if (preg_match('/macintosh|mac os x/i', $u_agent)) {
            $platform .= ' X';
        } elseif (preg_match('/mac_powerpc/i', $u_agent)) {
            $platform .= ' 9';
        }
    }
    //Windows
        elseif (preg_match('/windows|win32|win98|win95|win16/i', $u_agent)) {
        $platform = 'Windows';
        if (preg_match('/NT 10/i', $u_agent)) {
            $platform .= ' 10';
        } elseif (preg_match('/NT 6.3/i', $u_agent)) {
            $platform .= ' 8.1';
        } elseif (preg_match('/NT 6.2/i', $u_agent)) {
            $platform .= ' 8';
        } elseif (preg_match('/NT 6.1/i', $u_agent)) {
            $platform .= ' 7';
        } elseif (preg_match('/NT 6.0/i', $u_agent)) {
            $platform .= ' Vista';
        } elseif (preg_match('/NT 5.2/i', $u_agent)) {
            $platform .= ' Server 2003/XP';
        } elseif (preg_match('/NT 5.1/i', $u_agent)) {
            $platform .= ' XP';
        } elseif (preg_match('/XP/i', $u_agent)) {
            $platform .= ' XP';
        } elseif (preg_match('/ME/i', $u_agent)) {
            $platform .= ' ME';
        } elseif (preg_match('/NT 5.0/i', $u_agent)) {
            $platform .= ' 2000';
        } elseif (preg_match('/win98/i', $u_agent)) {
            $platform .= ' 98';
        } elseif (preg_match('/win95/i', $u_agent)) {
            $platform .= ' 95';
        } elseif (preg_match('/win16/i', $u_agent)) {
            $platform .= ' 3.11';
        }
        if (preg_match('/WOW64/i', $u_agent) || preg_match('/x64/i', $u_agent)) {
            $platform .= ' (x64)';
        } else {
            $platform .= ' (x86)';
        }
    }
    //Ubuntu
        elseif (preg_match('/ubuntu/i', $u_agent)) {
        $platform = 'Ubuntu';
    }
    //BlackBerry
        elseif (preg_match('/blackberry/i', $u_agent)) {
        $platform = 'BlackBerry';
    }
    //Mobile
        elseif (preg_match('/webos/i', $u_agent)) {
        $platform = 'Mobile';
    }
    //iPhone
        elseif (preg_match('/iphone/i', $u_agent)) {
        $platform = 'iPhone OS';
    }
    //iPod
        elseif (preg_match('/ipod/i', $u_agent)) {
        $platform = 'iPod OS';
    }
    //iPad
        elseif (preg_match('/ipad/i', $u_agent)) {
        $platform = 'iPad OS';
    }
    //Android
        elseif (preg_match('/android/i', $u_agent)) {
        $platform = 'Android';
        if (preg_match('/Android 5.1/i', $u_agent)) {
            $platform .= ' 5.1';
        } elseif (preg_match('/Android 5.0/i', $u_agent)) {
            $platform .= ' 5.0';
        } elseif (preg_match('/Android 4.4/i', $u_agent)) {
            $platform .= ' 4.4';
        } elseif (preg_match('/Android 4.3/i', $u_agent)) {
            $platform .= ' 4.3';
        } elseif (preg_match('/Android 4.2/i', $u_agent)) {
            $platform .= ' 4.2';
        } elseif (preg_match('/Android 4.1/i', $u_agent)) {
            $platform .= ' 4.1';
        } elseif (preg_match('/Android 4.0/i', $u_agent)) {
            $platform .= ' 4.0';
        } elseif (preg_match('/Android 3.2/i', $u_agent)) {
            $platform .= ' 3.2';
        } elseif (preg_match('/Android 3.1/i', $u_agent)) {
            $platform .= ' 3.1';
        } elseif (preg_match('/Android 3.0/i', $u_agent)) {
            $platform .= ' 3.0';
        } elseif (preg_match('/Android 2.3/i', $u_agent)) {
            $platform .= ' 2.3';
        } elseif (preg_match('/Android 2.2/i', $u_agent)) {
            $platform .= ' 2.2';
        } elseif (preg_match('/Android 2.1/i', $u_agent)) {
            $platform .= ' 2.1';
        } elseif (preg_match('/Android 2.0/i', $u_agent)) {
            $platform .= ' 2.0';
        } elseif (preg_match('/Android 1.6/i', $u_agent)) {
            $platform .= ' 1.6';
        } elseif (preg_match('/Android 1.5/i', $u_agent)) {
            $platform .= ' 1.5';
        } elseif (preg_match('/Android 1.0/i', $u_agent)) {
            $platform .= ' 1.0';
        }
    }
    
    // Getting Browser Name and Version
    if (preg_match('/MSIE/i', $u_agent) && !preg_match('/Opera/i', $u_agent)) {
        $bname = 'Internet Explorer';
        $ub    = "MSIE";
    } elseif (preg_match('/Trident/i', $u_agent) && !preg_match('/Opera/i', $u_agent)) {
        $bname = 'Internet Explorer';
        $ub    = "Trident";
    } elseif (preg_match('/Edge/i', $u_agent)) {
        $bname = 'Microsoft Edge';
        $ub    = "Edge";
    } elseif (preg_match('/Firefox/i', $u_agent)) {
        $bname = 'Mozilla Firefox';
        $ub    = "Firefox";
    } elseif (preg_match('/Chrome/i', $u_agent)) {
        $bname = 'Google Chrome';
        $ub    = "Chrome";
    } elseif (preg_match('/Safari/i', $u_agent)) {
        $bname = 'Apple Safari';
        $ub    = "Safari";
    } elseif (preg_match('/Opera/i', $u_agent)) {
        $bname = 'Opera';
        $ub    = "Opera";
    } elseif (preg_match('/Netscape/i', $u_agent)) {
        $bname = 'Netscape';
        $ub    = "Netscape";
    } elseif (preg_match('/Maxthon/i', $u_agent)) {
        $bname = 'Maxthon';
        $ub    = "Maxthon";
    } elseif (preg_match('/Konqueror/i', $u_agent)) {
        $bname = 'Konqueror';
        $ub    = "Konqueror";
    } elseif (preg_match('/mobile/i', $u_agent)) {
        $bname = 'Mobile Browser';
        $ub    = "Mobile Browser";
    } elseif (preg_match('/seamonkey/i', $u_agent)) {
        $bname = 'Mozilla SeaMonkey';
        $ub    = "Seamonkey";
    } elseif (preg_match('/navigator/i', $u_agent)) {
        $bname = 'Navigator';
        $ub    = "Navigator";
    } elseif (preg_match('/mosaic/i', $u_agent)) {
        $bname = 'Mosaic';
        $ub    = "Mosaic";
    } elseif (preg_match('/lynx/i', $u_agent)) {
        $bname = 'Lynx';
        $ub    = "Lynx";
    } elseif (preg_match('/amaya/i', $u_agent)) {
        $bname = 'Amaya';
        $ub    = "Amaya";
    } elseif (preg_match('/omniweb/i', $u_agent)) {
        $bname = 'OmniWeb';
        $ub    = "Omniweb";
    } elseif (preg_match('/avant/i', $u_agent)) {
        $bname = 'Avant';
        $ub    = "Avant";
    } elseif (preg_match('/camino/i', $u_agent)) {
        $bname = 'Camino';
        $ub    = "Camino";
    } elseif (preg_match('/flock/i', $u_agent)) {
        $bname = 'Flock';
        $ub    = "Flock";
    } elseif (preg_match('/aol/i', $u_agent)) {
        $bname = 'Aol';
        $ub    = "Aol";
    }
    
    //Getting Browser Version
    $known   = array(
        'Version',
        $ub,
        'other'
    );
    $pattern = '#(?<browser>' . join('|', $known) . ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // No matches, just continue
    }
    
    $i = count($matches['browser']);
    if ($i != 1) {
        if (strripos($u_agent, "Version") < strripos($u_agent, $ub)) {
            $version = $matches['version'][0];
        } else {
            $version = $matches['version'][1];
        }
    } else {
        $version = $matches['version'][0];
    }
    
    if ($version == null || $version == "") {
        $version = "?";
    }
    
    return array(
        'userAgent' => $u_agent,
        'name' => $bname,
        'version' => $version,
        'platform' => $platform,
        'pattern' => $pattern
    );
}
$ua = getBrowser();
//Getting Country
function visitor_country($ip)
{
    $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
    
    if ($ip_data && $ip_data->geoplugin_countryName != null) {
        $result = $ip_data->geoplugin_countryName;
    }
    
    return @$result;
}

//Getting Visitor Information
$ip               = get_realip();
$page = $_SERVER['REQUEST_URI'];
@$browser         = $ua['name'];
@$browser_version = $ua['version'];
@$os_full         = $ua['platform'];
//@$os              = strstr($os_full, ' ', true);
$os = php_uname();
@$os_version      = substr(strstr($os_full, ' '), 1);
@$referer         = $_SERVER["HTTP_REFERER"];
@$country         = visitor_country($ip);
$date             = date("d F Y");
$time             = date("H:i");
?>