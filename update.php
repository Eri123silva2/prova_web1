<?php


require 'auth.php';

if(!isset($_POST['id']) || !isset($_POST['nome']) || !isset($_POST['artista']) || !isset($_POST['genero'])) {
    header('location: home.php'); 
    exit();
}

$id = $_POST['id'];
$nome = $_POST['nome'];
$artista = $_POST['artista'];
$genero = $_POST['genero'];

$tempFile = tempnam(".", "");

$fpOriginal =  fopen("musicas.csv", "r");
$fpTemp = fopen($tempFile, 'w');

while (($row =  fgetcsv($fpOriginal)) !== false) {
    if ($row[0] != $id) {
        fputcsv($fpTemp, $row);
        continue;
    }
    fputcsv($fpTemp, [$id, $nome, $artista,  $genero]);
}

fclose($fpOriginal);
fclose($fpTemp);

rename($tempFile, 'musicas.csv');

header('location: home.php');
