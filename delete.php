<?php 

require 'auth.php';

if(!isset($_GET['id'])) {
    header('location: home.php');
    exit();
}

$nome = $_GET['id'];

$tempFile = tempnam(".", "");

$fpOriginal =  fopen("musicas.csv", "r");
$fpTemp = fopen($tempFile, 'w');

while (($row =  fgetcsv($fpOriginal)) !== false) {
    if($row[0] !== $nome) {
        fputcsv($fpTemp, $row);
    }
}

fclose($fpOriginal);
fclose($fpTemp);

rename($tempFile, 'musicas.csv');

header('location: home.php');

?>