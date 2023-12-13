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

// Consulta para obter dados da tabela de usuários
$query = "SELECT id, nome, email, idade FROM usuarios";
$result = $conn->query($query);

// Verifica se a consulta foi bem-sucedida
if ($result) {
    // Inicializa um array para armazenar os resultados
    $usuarios = array();

    // Loop para obter os dados
    while ($row = $result->fetch_assoc()) {
        $usuarios[] = $row;
    }

    // Retorna os dados como JSON
    echo json_encode($usuarios);
} else {
    // Retorna um erro como JSON
    echo json_encode(array('error' => 'Erro na consulta: ' . $conn->error));
}

// Fecha a conexão
$conn->close();
?>
