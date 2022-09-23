<?php
$headers ='From: "nom"<adresse@fai.fr>'."\n";
$headers .='Reply-To: happytech@happytech63.fr'."\n";
$headers .='Content-Type: text/html; charset="iso-8859-1"'."\n";
$headers .='Content-Transfer-Encoding: 8bit';

$message ='<html><head><title>Un titre ici</title></head><body>Un message de test</body></html>';

if(mail('nicotournadre@gmail.com', 'Sujet', $message, $headers))
{
    echo 'Le message a été envoyé';
}
else
{
    echo 'Le message n\'a pu être envoyé';
}
?>