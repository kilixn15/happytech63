<?php

$user_agent     =   $_SERVER['HTTP_USER_AGENT'];
$ip_simple      = $_SERVER['REMOTE_ADDR'];     // IP du visiteur
$port           = $_SERVER['REMOTE_PORT'];     // Port du visiteur
$site_refer = $_SERVER['HTTP_REFERER'];
$user_os        =   getOS();
$user_browser   =   get_browser_name($_SERVER['HTTP_USER_AGENT']);
//$user_browser   =   getBrowser();


if($site_refer == ""){
    $site = "Connexion direct";
}else{
    $site = $site_refer;
}

function getOS() {

    global $user_agent;

    $os_platform    =   "Unknown OS Platform";

    $os_array       =   array(
        '/windows nt 10/i'     =>  'Windows 10',
        '/windows nt 6.3/i'     =>  'Windows 8.1',
        '/windows nt 6.2/i'     =>  'Windows 8',
        '/windows nt 6.1/i'     =>  'Windows 7',
        '/windows nt 6.0/i'     =>  'Windows Vista',
        '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
        '/windows nt 5.1/i'     =>  'Windows XP',
        '/windows xp/i'         =>  'Windows XP',
        '/windows nt 5.0/i'     =>  'Windows 2000',
        '/windows me/i'         =>  'Windows ME',
        '/win98/i'              =>  'Windows 98',
        '/win95/i'              =>  'Windows 95',
        '/win16/i'              =>  'Windows 3.11',
        '/macintosh|mac os x/i' =>  'Mac OS X',
        '/mac_powerpc/i'        =>  'Mac OS 9',
        '/linux/i'              =>  'Linux',
        '/kalilinux/i'          =>  'KaliLinux <- A bloquer !',
        '/ubuntu/i'             =>  'Ubuntu',
        '/iphone/i'             =>  'iPhone',
        '/ipod/i'               =>  'iPod',
        '/ipad/i'               =>  'iPad',
        '/android/i'            =>  'Android',
        '/blackberry/i'         =>  'BlackBerry',
        '/webos/i'              =>  'Mobile',
        '/Windows Phone/i'      =>  'Windows Phone'
    );

    foreach ($os_array as $regex => $value) {

        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }

    }

    return $os_platform;

}



function getBrowser() {

global $user_agent;

$browser        =   "Unknown Browser";

$browser_array  =   array(
'/msie/i'       =>  'Internet Explorer',
'/firefox/i'    =>  'Firefox',
'/Mozilla/i'	=>	'Mozila',
'/Mozilla/5.0/i'=>	'Mozila',
'/safari/i'     =>  'Safari',
'/chrome/i'     =>  'Chrome',
'/edge/i'       =>  'Edge',
'/opera/i'      =>  'Opera',
'/OPR/i'        =>  'Opera',
'/netscape/i'   =>  'Netscape',
'/maxthon/i'    =>  'Maxthon',
'/konqueror/i'  =>  'Konqueror',
'/Bot/i'		=>	'BOT Browser',
'/Valve Steam GameOverlay/i'  =>  'Steam',
'/mobile/i'     =>  'Handheld Browser'
);

foreach ($browser_array as $regex => $value) {

if (preg_match($regex, $user_agent)) {
$browser    =   $value;
}

}

return $browser;

}

$ip_derproxyb   = (getenv("HTTP_X_FORWARDED_FOR") ? getenv("HTTP_X_FORWARDED_FOR") : getenv("REMOTE_ADDR"));    // Recuperation de l'IP a travers le proxy


function getBooleanFAI($ip_derproxyb) {
    $host = @gethostbyaddr($ip_derproxyb);
    $fai = false;
    if(substr_count($host, 'proxad')) $fai = true;
    if(substr_count($host, 'orange')) $fai = true;
    if(substr_count($host, 'wanadoo')) $fai = true;
    if(substr_count($host, 'sfr')) $fai = true;
    if(substr_count($host, 'club-internet')) $fai = true;
    if(substr_count($host, 'neuf')) $fai = true;
    if(substr_count($host, 'gaoland')) $fai = true;
    if(substr_count($host, 'bbox')) $fai = true;
    if(substr_count($host, 'bouyg')) $fai = true;
    if(substr_count($host, 'numericable')) $fai = true;
    if(substr_count($host, 'tele2')) $fai = true;
    if(substr_count($host, 'videotron')) $fai = true;
    if(substr_count($host, 'belgacom')) $fai = true;
    if(substr_count($host, 'bell.ca')) $fai = true;
    if(substr_count($host, 'coucou-networks.fr')) $fai = true;
    return $fai;
}

$source = json_decode(file_get_contents("http://ipinfo.io/{$ip_derproxyb}?token=b67eb137ad6a8e"));
$ville = $source->city;
$org = $source->org;
$region = $source->region;


$monUrl = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

function get_browser_name($user_agent)
{
    // Make case insensitive.
    $t = strtolower($user_agent);

    $t = " " . $t;

    // Humans / Regular Users
    if     (strpos($t, 'opera'     ) || strpos($t, 'opr/')     ) return 'Opera'            ;
    elseif (strpos($t, 'edge'      )                           ) return 'Edge'             ;
    elseif (strpos($t, 'chrome'    )                           ) return 'Chrome'           ;
    elseif (strpos($t, 'safari'    )                           ) return 'Safari'           ;
    elseif (strpos($t, 'netscape'  )                           ) return 'Netscape'         ;
    elseif (strpos($t, 'maxthon'   )                           ) return 'Maxthon'          ;
    elseif (strpos($t, 'konqueror' )                           ) return 'Konqueror'        ;
    elseif (strpos($t, 'firefox'   )                           ) return 'Firefox'          ;
    elseif (strpos($t, 'msie'      ) || strpos($t, 'trident/7')) return 'Internet Explorer';

    // Search Engines
    elseif (strpos($t, 'google'    )                           ) return '[Bot] Googlebot'   ;
    elseif (strpos($t, 'bing'      )                           ) return '[Bot] Bingbot'     ;
    elseif (strpos($t, 'slurp'     )                           ) return '[Bot] Yahoo! Slurp';
    elseif (strpos($t, 'duckduckgo')                           ) return '[Bot] DuckDuckBot' ;
    elseif (strpos($t, 'baidu'     )                           ) return '[Bot] Baidu'       ;
    elseif (strpos($t, 'yandex'    )                           ) return '[Bot] Yandex'      ;
    elseif (strpos($t, 'sogou'     )                           ) return '[Bot] Sogou'       ;
    elseif (strpos($t, 'exabot'    )                           ) return '[Bot] Exabot'      ;
    elseif (strpos($t, 'msn'       )                           ) return '[Bot] MSN'         ;
    elseif (strpos($t, 'ovh'       )                           ) return '[Bot] OVH'         ;

    // Common Tools and Bots
    elseif (strpos($t, 'mj12bot'   )                           ) return '[Bot] Majestic'     ;
    elseif (strpos($t, 'ahrefs'    )                           ) return '[Bot] Ahrefs'       ;
    elseif (strpos($t, 'semrush'   )                           ) return '[Bot] SEMRush'      ;
    elseif (strpos($t, 'rogerbot'  ) || strpos($t, 'dotbot')   ) return '[Bot] Moz or OpenSiteExplorer';
    elseif (strpos($t, 'frog'      ) || strpos($t, 'screaming')) return '[Bot] Screaming Frog';

    // Miscellaneous
    elseif (strpos($t, 'facebook'  )                           ) return '[Bot] Facebook'     ;
    elseif (strpos($t, 'pinterest' )                           ) return '[Bot] Pinterest'    ;

    // Check for strings commonly used in bot user agents
    elseif (strpos($t, 'crawler' ) || strpos($t, 'api'    ) ||
        strpos($t, 'spider'  ) || strpos($t, 'http'   ) ||
        strpos($t, 'bot'     ) || strpos($t, 'archive') ||
        strpos($t, 'info'    ) || strpos($t, 'data'   )    ) return '[Bot] Other'   ;

    return 'Other (Unknown) / ' . $user_agent . "";


}
