<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Login</h1>

    <form method="post" action="login.php">
        Nome: <input type="text" name="name" required><br>
        E-mail: <input type="email" name="email" required><br>
        Senha: <input type="password" name="password" required><br>
        <input type="submit" value="Logar">
    </form>

    <br>
    <a href="cadastrar.php">Ainda não é cadastrado?</a>
</body>
</html>
