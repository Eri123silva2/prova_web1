<?php

require 'auth.php';

if (!isset($_GET['id'])) {
    header('location: home.php');
    exit();
}

$id = $_GET['id'];

$fp = fopen('musicas.csv', 'r');
$data = [];

while (($rom = fgetcsv($fp)) !== false) {
    if ($rom[0] == $id) {
        $data = $rom;
        break;
    }
}

if (sizeof($data) == 0) {
    header('location: home.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>

    <h1>Editar a musica: <?= $data[1] ?></h1>
    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?= $data[0] ?>">
        <label for="nome">Título:</label>
        <input type="text" id="nome" name="nome" required value="<?= $data[1] ?>">
        <label for="artista">Artista:</label>
        <input type="text" id="artista" name="artista"required value="<?= $data[2] ?>">
        <label for="genero">Gênero:</label>
        <label for="genero">Gênero:</label>
        <select required  value="<?= $data[3] ?>" name="genero">
            <option value="rock">Rock</option>
            <option value="pop">Pop</option>
            <option value="hip_Hop">Hip Hop</option>
            <option value="eletronica">Eletrônica</option>
        </select>
        <button>Editar</button>
    </form> <br>
<a href="home.php"><button>Voltar ao CRUD</button></a>
</body>

</html>