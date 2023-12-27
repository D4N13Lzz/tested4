<?php
    session_start();

    require_once "config.php";

    // Verifica se a requisição é do tipo POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtém os dados do formulário
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Prepara a consulta SQL usando instrução preparada
        $sql = "SELECT * FROM users WHERE name = ? AND email = ?";
        $stmt = $conn->prepare($sql);

        // Verifica se a preparação da instrução foi bem-sucedida
        if (!$stmt) {
            die("Erro na preparação da declaração: " . $conn->error);
        }

        // Liga os parâmetros
        $stmt->bind_param("ss", $name, $email);

        // Executa a consulta
        $stmt->execute();

        // Obtém o resultado da consulta
        $result = $stmt->get_result();

        // Verifica se há exatamente um registro correspondente
        if ($result->num_rows === 1) {
            // Obtém os dados do usuário
            $row = $result->fetch_assoc(); 

            // Verifica se a senha fornecida coincide com a senha armazenada (usando password_verify)
            if (password_verify($password, $row['password'])) {
                // Inicia a sessão e redireciona para a página de sucesso
                $_SESSION["loggedin"] = true; 
                header("Location: site.php");
                exit;
            } else {
                $error = "Usuário ou senha incorretos";
            }
        } else {
            $error = "Usuário ou senha incorretos";
        }

        // Fecha a instrução preparada
        $stmt->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <!-- Exibir mensagens de erro, se houver -->
    <?php if (isset($error)) : ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>

    <!-- Formulário de login -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
