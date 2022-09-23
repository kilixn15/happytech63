<?php


$tab = [
'nom' => 'Doe', 
'Prénom' => 'Marc', 
'notes' => [10,20,15]];


$tab['prenom'] = 'Jean';
$tab['notes'][3] = 3;
$tab['notes'][] = 5;
//echo $tab['Prénom'] . ' ' . $tab['nom'] ;
//print_r($tab['notes']);



$classe = [
[
'nom' => 'Doe', 
'Prénom' => 'hugo', 
'notes' => [15,11,20]
],
[
'nom' => 'Doe', 
'Prénom' => 'jsp', 
'notes' => [19,6,14]
]
];


echo $classe[1]['notes'][1]; // renvoie 6