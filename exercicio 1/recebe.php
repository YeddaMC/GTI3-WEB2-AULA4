<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>recebe formulario</title>
</head>
<body>
    <h1>Dados Recebidos do Formulário</h1>

    <?php
        if (isset($_POST['nome']) && isset($_POST['senha'])) {
            $nomeRecebido = $_POST['nome'];
            $senhaRecebida = $_POST['senha'];

            echo "<p>Nome digitado: " . htmlspecialchars($nomeRecebido) . "</p>";
            echo "<p>Senha digitada: " . htmlspecialchars($senhaRecebida) . "</p>";
        } else {
            echo "<p>Erro: Nenhum dado foi recebido do formulário.</p>";
        }
    ?>
</body>
</html>
