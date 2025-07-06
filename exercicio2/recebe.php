<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dados Recebidos</title>
    <link rel="stylesheet" href="2.4.css">
</head>
<body>
    <div class="container">
        <h1>Dados Recebidos</h1>
        <?php
            if (isset($_GET['nome']) && isset($_GET['idade'])) {
                $nome = $_GET['nome'];
                $idade = $_GET['idade'];

                echo "<p>Nome informado: <strong>" . htmlspecialchars($nome) . "</strong></p>";
                echo "<p>Idade informada: <strong>" . htmlspecialchars($idade) . "</strong> anos</p>";
            } else {
                echo "<p>Nenhum dado foi recebido do formulário.</p>";
            }
        ?>
        <p><a href="2.4.html">Voltar ao formulário</a></p>
    </div>
</body>
</html>
