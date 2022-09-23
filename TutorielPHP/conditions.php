<?php 


$heure = (int)'7'; // saisir une heure


if ((9 <= $heure && $heure <= 12) || (14 <= $heure  && $heure <= 17)){
	echo 'la magasin est ouvert';
	
}else {
	echo 'le magasin est fermé';
}



/* $note = (int)'9'; // saisir une note
if ($note > 10){
	echo "note supérieure à la moyenne";
}elseif ($note === 10) {
	echo "note est égale à 10";
}else{
	echo "note inférieure à la moyenne";
	}

*/


/*
switch ($note){
	
	case 1:
	echo 'note est égale a 1';
	break;
	
	case 2:
	echo 'note est égale à 2';
	break; 
	
	case 3:
	echo 'note est égale à 3';
	break;
	
	default: 
	echo 'note inconnue';
}
*/
