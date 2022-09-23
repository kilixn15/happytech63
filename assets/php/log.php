<?php

require_once '/var/www/happytech63/html/assets/php/functions.php';
$fichier        = "/var/www/panel/logs/visitors.txt";      // Nom du fichier de sortie
$fp             = fopen("$fichier", "a");      // Ouverture du fichier
$fsz            = filesize("$fichier");
$date=date ("d/m/Y G:i:s");



function GetIP()
{
    if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
        $ip = getenv("HTTP_CLIENT_IP");
    else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
        $ip = getenv("REMOTE_ADDR");
    else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
        $ip = $_SERVER['REMOTE_ADDR'];
    else
        $ip = "unknown";
    return($ip);
}

// Sert pour le $ip
$register_globals = (bool) ini_get('register_gobals');

if ($register_globals) $ip = getenv('REMOTE_ADDR');
else $ip = GetIP();
// fin du $ip avec la fonction GetIP()


if($ip == "90.4.27.88") {
    fseek($fp, $fsz);

    fputs($fp, "Date et heure : $date\nConnexion de Nicolas\nNavigateur : $user_browser\nSite precedent : $site\nURL : $monUrl \n\n//\n\n");


    fclose($fp);

}elseif($ip == "90.52.181.6"){
    fseek($fp, $fsz);

    fputs($fp, "Date et heure : $date\nConnexion de Kilian \nNavigateur : $user_browser\nSite precedent : $site\nURL : $monUrl \n\n//\n\n");


    fclose($fp);
}else{


    $ip_simple      = $_SERVER['REMOTE_ADDR'];
    $referer        = getenv("HTTP_USER_AGENT");   // User agent
    $host2 = @gethostbyaddr($ip_simple);


// ignore les FAIs
    if ( getBooleanFAI($ip) == false ) {


        $apiKey = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.WzE0NDksMTYxMTM5MjcyNywyMDAwXQ.icQVgzU1fRc_iERdJVG9SquUeCbJevvxK6xPff2MulY';

        $headers = [
            'X-Key: '.$apiKey,
        ];
        $ch = curl_init("https://www.iphunter.info:8082/v1/ip/".$ip);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $output = json_decode(curl_exec($ch), 1);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);




        // http://ip-api.com/line/





        if($output['data']['block'] == 0){
            $block = "IP residentielle / non classifiee (c'est-a-dire Safe IP)";


        }
        else if($output['data']['block'] == 1){
            $block = "Detection d'un VPN ou PROXY ou VPS ou Serveur dedie ou hebergeur hosting...";

           header('Location: https://happytech63.fr/error/403.html');

        }
        else if($output['data']['block'] == 2){

            $block = "IP non residentielle (avertissement, peut flagrant que ce soit des personnes innocentes)";





            header('Location: https://happytech63.fr/error/403.html');

        }
        else {
            $block = "Connexion inconnu";

        }





    } else {


        $block = "Connexion : OK";

    }

    $owner = "127.0.0.1";   //Change $owner for something else, cuz someone can simple read that by calling out $owner
// change it for $absdfs5sd4 for example and change it down there
    $owner_country = "YOUR COUNTRY TAG FOR YOUR IP ↑"; //This u can leave how it is.

    if($ip == $owner){ //Change it here
        $ip = "Owner";
        $country = $owner_country;
    }
//If that wasn't you, it woun't change IP address and it will find info about IP address
    else{
        $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}?token=b67eb137ad6a8e"));
        $country = $details->country;
    }

    if($referer === "python-requests/2.24.0" OR $referer === "python-requests/2.12.4") {
        header('Location: https://google.fr');

        fseek($fp, $fsz);
        fputs($fp, "Date et heure : $date\nAdresse IP + Port (Cloudfare) : $ip:$port \nDomaine : $host2\nOrg : $org \nLangue: $country\nVille : $ville \nRegion : $region \nOS : $user_os\nNavigateur : $user_browser\nUser agent : $referer\nSite precedent : $site\nURL : $monUrl \nUser agent bloque automatiquement.\n\n//\n\n");

        fclose($fp);


    }
    else {
        $mobile = "L'utilisateur n'est pas sur un appareil mobile";
        $masque =
            "/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi" .
            "|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i";

        if ( preg_match($masque, $_SERVER["HTTP_USER_AGENT"])) {
           $mobile = "L'utilisateur est sur un appareil mobile.";
        }


        fseek($fp, $fsz);
        fputs($fp, "Date et heure : $date \nAdresse IP client : $ip\nPort : $port\nDomaine : $host2\n\nOrg : $org \nLangue: $country\nVille : $ville\nRegion : $region \n\nOS : $user_os\nNavigateur : $user_browser\nUser agent : $referer\n\nSite precedent : $site\nURL : $monUrl \nAppareil : $mobile\n$block\n\n//\n\n");


        fclose($fp);
    }

}


function getmicrotime(){
    list($usec, $sec) = explode(" ",microtime());
    return ((float)$usec + (float)$sec);
}
$debut = getmicrotime();
?>

