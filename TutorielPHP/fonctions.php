<?php 

//echo demo($variable, '123');
// $test = demo($variable, '123');

//var_dump(12.5, 11, "cc");


/*
$chaine = "KaYak";
$chaine = strtolower($chaine);


if ($chaine === strrev($chaine)){
	echo 'C\'est un palindrome';
}else {
	echo 'Pas un palindrome';
}

*/

///////////////////////////
$notes = [10,20,13];
array_push($notes, 16, 17); // ajoute des notes en modifiant la variable

$moyenne = array_sum($notes) / count($notes);

echo round($moyenne, 2);
// echo $moyenne;



?>