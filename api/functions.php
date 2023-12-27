<?php
include('db.php');

function verificarLogin() {
    // Inicie a sessão no início da função
    if (!isset($_SESSION)) {
        session_start();
    }
    // Verifique se a variável de sessão 'id' está definida
    if (!isset($_SESSION['id'])) {
        header("Location: index.php");
        exit();
    }
}
?>
