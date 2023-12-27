<?php
$usuario = 'ateliesogra';
$senha = 'Atelie@1020';
$database = 'ateliesogra';
$host = 'ateliesogra.mysql.dbaas.com.br';

$conn = new mysqli($host, $usuario, $senha, $database);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>