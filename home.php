<?php
require 'auth.php';
// lembrar  de criar  mudar o nome do arquivo csv 
$fp = fopen('musicas.csv', 'r');
$id = uniqid();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Músicas</title>
</head>

<body>
    <h1>Músicas</h1>

    <form action="create.php" method="POST">
        <input type="hidden" name="id" value="<?= $id ?>">
        <label for="nome">Titulo:</label>
        <input type="text" id="nome" name="nome" required>
        <label for="artista">Artista:</label>
        <input type="text" id="artista" name="artista" required>
        <label for="genero">Gênero:</label>
        <select required name="genero">
            <option value="rock">Rock</option>
            <option value="pop">Pop</option>
            <option value="hip_Hop">Hip Hop</option>
            <option value="eletronica">Eletrônica</option>
        </select>



        <button>Adicionar </button>
    </form>

    <br>
    <div>
        <table>
            <tr>
                <th>Título </th>
                <th>Artista</th>
                <th>Gênero</th>
                <th>❌</th>
                <th>📝</th>
            </tr>
            <?php while (($rom = fgetcsv($fp)) !== false) : ?>
                <tr>
                    <!-- vai começar com 1, pq o 0 é o id -->
                    <td> <?= $rom[1] ?></td>
                    <td> <?= $rom[2] ?></td>
                    <td> <?= $rom[3] ?></td>
                    <td>
                        <form action="delete.php">
                            <input type="hidden" name="id" value="<?= $rom[0] ?>">
                            <button>Delete</button>
                        </form>
                    </td>
                    <td>
                        <form action="edit.php">
                            <input type="hidden" name="id" value="<?= $rom[0] ?>">
                            <button>Editar</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile ?>
        </table>
        <a href="index.php"><button>Voltar para o inicio</button></a>
    </div>
</body>

</html>