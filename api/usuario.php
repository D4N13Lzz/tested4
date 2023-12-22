<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

require_once('db.php');

// Verifica se a tabela existe
$table_name = 'usuarios';
$check_table_query = "SHOW TABLES LIKE '$table_name'";
$table_exists = $conn->query($check_table_query)->num_rows > 0;

if (!$table_exists) {
    echo json_encode(array('error' => 'Tabela de usuários não encontrada.'));
} else {
    // Insere dados fictícios
    $insert_query = "INSERT INTO $table_name (email, name) VALUES
        ('usuario1@example.com', 'Usuário 1'),
        ('usuario2@example.com', 'Usuário 2'),
        ('usuario3@example.com', 'Usuário 3')";
    
    if ($conn->query($insert_query) === TRUE) {
        echo json_encode(array('success' => 'Dados inseridos com sucesso.'));
    } else {
        echo json_encode(array('error' => 'Erro ao inserir dados: ' . $conn->error));
    }
}

$conn->close();
?>
