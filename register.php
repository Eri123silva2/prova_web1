<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre-se</title>
</head>

<body>

<h1>Cadastre-se</h1>

<form action="addUser.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" minlength="8" name="senha" required>
        <label for="confirmar_senha">Senha:</label>
        <input type="password" id="confirmar_senha"  minlength="8"name="confirmar_senha" required>
        <button>Cadastrar</button>
</body>

</html>