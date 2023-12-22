<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");
require_once('db.php');

$table_name = 'usuarios';

// Verifica se a tabela existe
$check_table_query = "SHOW TABLES LIKE '$table_name'";
$table_exists = $conn->query($check_table_query)->num_rows > 0;

if (!$table_exists) {
    echo 'Tabela de usuários não encontrada.';
} else {
    $sql = "SELECT email, name FROM $table_name";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<h2>Dados da Tabela "usuarios"</h2>';
        echo '<table border="1">
                <tr>
                    <th>Email</th>
                    <th>Name</th>
                </tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>
                    <td>' . $row['email'] . '</td>
                    <td>' . $row['name'] . '</td>
                  </tr>';
        }

        echo '</table>';
    } else {
        echo 'Nenhum usuário encontrado na tabela.';
    }
}

$conn->close();
?>
