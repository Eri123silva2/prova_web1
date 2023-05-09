<?php 

require 'auth.php';

if(!isset($_POST['id']) || !isset($_POST['nome']) || !isset($_POST['artista']) || !isset($_POST['genero'])) {
    header('location: home.php'); 
    exit();
}

$id = $_POST['id'];
$nome = $_POST['nome'];
$artista= $_POST['artista'];
$genero = $_POST['genero'];


$fp = fopen('musicas.csv', 'r');
while (($row =  fgetcsv($fp)) !== false) {
    if($row[1] == $nome) {
        header('location: home.php');
        exit();
    }
}
$fp = fopen('musicas.csv', 'a');
fputcsv($fp, [$id, $nome, $artista,  $genero]);

header('location: home.php');
