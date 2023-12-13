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

// Verificar se a consulta foi bem-sucedida
if (isset($usuarios) && !empty($usuarios)) {
    // Exibir os dados em uma tabela
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Idade</th>
            </tr>";

    foreach ($usuarios as $usuario) {
        echo "<tr>
                <td>" . $usuario["id"] . "</td>
                <td>" . $usuario["nome"] . "</td>
                <td>" . $usuario["email"] . "</td>
                <td>" . $usuario["idade"] . "</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "Nenhum usuário encontrado na tabela.";
}
?>

</body>
</html>
