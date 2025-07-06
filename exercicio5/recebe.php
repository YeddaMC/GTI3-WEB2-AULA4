<?php
session_start();

// Tempo máximo de inatividade (10 minutos)
$tempo_maximo = 600;

// Verifica expiração da sessão
if (isset($_SESSION['ultimo_acesso'])) {
    if ((time() - $_SESSION['ultimo_acesso']) > $tempo_maximo) {
        session_unset();
        session_destroy();
        echo "<p>Sessão expirada por inatividade.</p>";
        echo "<a href='5.html'>Voltar ao início</a>";
        exit;
    }
}
$_SESSION['ultimo_acesso'] = time();

// Preços das bebidas
$precos = [
    'agua' => 3.00,
    'cha' => 5.00,
    'soda' => 10.00
];

// Inicializa carrinho
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

// Ações do formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'] ?? '';

    if ($acao === 'adicionar') {
        $bebida = $_POST['bebida'] ?? '';
        $quantidade = intval($_POST['quantidade'] ?? 0);

        if (isset($precos[$bebida]) && $quantidade > 0) {
            $_SESSION['carrinho'][] = [
                'bebida' => $bebida,
                'quantidade' => $quantidade,
                'preco_unitario' => $precos[$bebida]
            ];
            header("Location: 5.html");
            exit;
        }

    } elseif ($acao === 'finalizar') {
        if (empty($_SESSION['carrinho'])) {
            echo "<p>Nenhum item no carrinho.</p>";
            echo "<a href='5.html'>Voltar</a>";
            exit;
        }

        $total = 0;
        echo "<h1>Resumo do Pedido</h1><ul>";
        foreach ($_SESSION['carrinho'] as $item) {
            $subtotal = $item['preco_unitario'] * $item['quantidade'];
            $total += $subtotal;
            echo "<li>{$item['quantidade']}x {$item['bebida']} - R$ " . number_format($subtotal, 2, ',', '.') . "</li>";
        }
        echo "</ul><p><strong>Total: R$ " . number_format($total, 2, ',', '.') . "</strong></p>";

        echo "<form method='post'>";
        echo "<label>Valor pago: R$</label>";
        echo "<input type='number' name='valor_pago' step='1.00' min='$total' required>";
        echo "<input type='hidden' name='acao' value='pagar'>";
        echo "<button type='submit'>Pagar</button>";
        echo "</form>";

    } elseif ($acao === 'pagar') {
        $valorPago = floatval($_POST['valor_pago'] ?? 0);
        $total = 0;

        foreach ($_SESSION['carrinho'] as $item) {
            $total += $item['preco_unitario'] * $item['quantidade'];
        }

        if ($valorPago >= $total) {
            $troco = $valorPago - $total;
            echo "<p><strong>Pagamento realizado!</strong></p>";
            echo "<p>Troco: R$ " . number_format($troco, 2, ',', '.') . "</p>";
            $_SESSION['carrinho'] = [];
            echo "<a href='5.html'>Novo Pedido</a>";
        } else {
            echo "<p>Valor insuficiente.</p>";
            echo "<a href='5.html'>Tentar novamente</a>";
        }
    }
}
?>
