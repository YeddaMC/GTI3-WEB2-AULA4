<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quantas notas?</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Cálculo de Cédulas</h1>
        <?php
            if (isset($_POST['valor']) && is_numeric($_POST['valor']) && $_POST['valor'] > 0) {
                $valor = floatval($_POST['valor']);
                $cedulas = [100, 50, 20, 10, 5, 2, 1];
                $quantidade_cedulas = [];

                echo "<p>Valor digitado: R$ " . number_format($valor, 2, ',', '.') . "</p>";
                echo "<h2>Quantidade mínima de cédulas:</h2>";

                foreach ($cedulas as $cedula) {
                    $quantidade = floor($valor / $cedula);
                    if ($quantidade > 0) {
                        $quantidade_cedulas[$cedula] = $quantidade;
                        $valor -= $quantidade * $cedula;
                    }
                }

                if (!empty($quantidade_cedulas)) {
                    echo "<ul>";
                    foreach ($quantidade_cedulas as $cedula => $quantidade) {
                        echo "<li>" . $quantidade . " x R$ " . number_format($cedula, 2, ',', '.') . "</li>";
                    }
                    echo "</ul>";
                } else {
                    echo "<p>Não foram necessárias cédulas.</p>";
                }

// Adicionando o botão "Calcular de Novo"
echo "<p><a href='4.html'><button>Calcular de Novo</button></a></p>";

            } else {
                echo "<p class='erro'>Por favor, digite um valor numérico válido maior que zero.</p>";
                echo "<p><a href='4.html'>Voltar</a></p>";
            }
        ?>
    </div>
</body>
</html>
