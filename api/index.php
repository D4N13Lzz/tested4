<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste de Conexão MySQL</title>
</head>
<body>

<?php
// Configurações do banco de dados
$hostname = "ateliesogra.mysql.dbaas.com.br";
$username = "ateliesogra";
$password = "Atelie@1020";
$database = "ateliesogra";

// Conecta ao banco de dados
$conn = new mysqli($hostname, $username, $password, $database);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

echo "Conexão bem-sucedida!";

// Fecha a conexão
$conn->close();
?>

</body>
</html>
