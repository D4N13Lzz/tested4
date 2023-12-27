<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel</title>
</head>
<body>
    <h2>Bem-vindo, <?php echo $username; ?>!</h2>
    <p>Esta é a página do painel. Você está logado com sucesso.</p>
    <a href="logout.php">Sair</a>
</body>
</html>
