<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
</head>
<body>

<h2>Lista de Usuários</h2>

<?php
// Incluir o arquivo de conexão com o banco de dados
include 'db.php';

// Consulta SQL para obter dados da tabela "usuarios"
$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Exibir os dados em uma tabela
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["nome"] . "</td>
                <td>" . $row["email"] . "</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "Nenhum usuário encontrado na tabela.";
}

// Fechar a conexão com o banco de dados
$conn->close();
?>

</body>
</html>
