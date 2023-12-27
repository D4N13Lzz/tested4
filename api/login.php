<?php
session_start();
require('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE username = '$username' AND senha = '$senha'";
    $resultado = $conexao->query($sql);

    if ($resultado->num_rows > 0) {
        $_SESSION['username'] = $username;
        header('Location: painel.php');
        exit();
    } else {
        $erro = 'Nome de usuário ou senha incorretos.';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($erro)) echo "<p style='color:red;'>$erro</p>"; ?>
    <form method="post" action="login.php">
        <label for="username">Usuário:</label>
        <input type="text" name="username" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>

        <input type="submit" value="Entrar">
    </form>
</body>
</html>
