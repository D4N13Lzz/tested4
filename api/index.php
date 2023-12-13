<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página PHP Simples</title>
</head>
<body>

<?php
// Obtém a data e hora atual
$dataHoraAtual = date('d/m/Y H:i:s');

// Mensagem de boas-vindas
$mensagem = "FUNCIONANDO! A data e hora atual são: $dataHoraAtual";
?>

<!-- Exibe a mensagem na página -->
<h1><?php echo $mensagem; ?></h1>

</body>
</html>
