<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Agua</title>
    <link rel="stylesheet" href="3.css">
</head>
<body>
    <div class="container">
        <h1>Calculadora de Água</h1>
        <?php
        //isset verifica do lado servidor se o valor foi enviado e não nulo
            if (isset($_POST['peso'])) {
                $peso = floatval($_POST['peso']);
                $agua_ideal = $peso * 0.035;
                $agua_ideal_litros = round($agua_ideal, 2);

                echo "<p>Para quem pesa <strong>" . $peso . " kg</strong>, a quantidade ideal de água a ser ingerida por dia é de:</p>";
                echo "<h2><strong>" . $agua_ideal_litros . " litros</strong></h2>";
            } else {
                echo "<p>Nenhum peso foi informado.</p>";
                echo "<p><a href=\"3.html\">Voltar ao formulário</a></p>";
            }
        ?>
        <p><a href="3.html">Calcular novamente</a></p>
    </div>
</body>
</html>
