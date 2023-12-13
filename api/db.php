<?php
$host = "ateliesogra.mysql.dbaas.com.br";
$username = "ateliesogra";
$password = "Atelie@1020";
$database = "ateliesogra";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}
?>