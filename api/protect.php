<?php
// Inicie a sessão no início do script
if (!isset($_SESSION)) {
    session_start();
}

// Verifique se 'id' está definido e não vazio na sessão
if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    die("Você não pode acessar esta página porque não está logado.<p><a href=\"index.php\">Entrar</a></p>");
}
?>
