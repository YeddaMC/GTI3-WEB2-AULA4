<?php
// Inicialização
$email = $senha = $nome = $nascimento = "";
$sql = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST["email"]);
    $senha = htmlspecialchars($_POST["senha"]);
    $nome = htmlspecialchars($_POST["nome"]);
    $nascimento = htmlspecialchars($_POST["nascimento"]);

    $sql = "INSERT INTO usuarios (email, senha, nome, nascimento) VALUES ('$email', '$senha', '$nome', '$nascimento');";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="container">
        <h2>Formulário de Cadastro</h2>
        <form method="POST" action="">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="nascimento">Data de Nascimento:</label>
            <input type="date" id="nascimento" name="nascimento" required>

            <input type="submit" value="Cadastrar">
        </form>

        <?php if ($sql): ?>
            <h3>Instrução SQL gerada:</h3>
            <pre class="sql"><?php echo $sql; ?></pre>
        <?php endif; ?>
    </div>
</body>
</html>
