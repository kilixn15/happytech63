<?php 
$pdo = new PDO('mysql:dbname=clients;host=localhost', 'insert_donnes', 'm9doPLdnR2SkSQi3');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); 

