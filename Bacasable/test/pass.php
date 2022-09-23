<?php
//echo file_get_contents('https://api.motdepasse.xyz/create/?include_digits&include_lowercase&password_length=12&quantity=1');



$curl = curl_init("https://api.motdepasse.xyz/create/?include_digits&include_lowercase&password_length=10&quantity=1");
//curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

curl_setopt_array($curl, [
CURLOPT_TIMEOUT => 2,
CURLOPT_RETURNTRANSFER => true,

]);
$data = curl_exec($curl);

if ($data === false) {
 var_dump(curl_error($curl));

}else {

$data = json_decode($data, true);



//echo "Le mot de passe généré est : " . $data['passwords'];
var_dump($data ['passwords']);



}


curl_close($curl);
?>