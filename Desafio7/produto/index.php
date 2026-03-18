<?php require_once 'Produto.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Controle de Estoque</title>

    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
            text-align: center;
        }

        form {
            background: white;
            padding: 20px;
            margin: 20px auto;
            width: 300px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }

        input, select {
            width: 90%;
            padding: 8px;
            margin: 5px 0;
        }

        button {
            padding: 10px;
            background: #6f42c1;
            color: white;
            border: none;
            cursor: pointer;
        }

        ul {
            list-style: none;
            background: white;
            width: 300px;
            margin: auto;
            padding: 15px;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<h2>Controle de Estoque</h2>

<form method="post">
    <input type="text" name="nome" placeholder="Nome do Produto" required><br>
    <input type="number" name="estoque" placeholder="Quantidade em Estoque" required><br>
    <input type="number" step="0.01" name="valor" placeholder="Valor Unitário" required><br>

    <select name="acao">
        <option value="entrada">Entrada no estoque</option>
        <option value="saida">Saída do estoque</option>
    </select><br>

    <input type="number" name="quantidade" placeholder="Quantidade movimentada" required><br>

    <button type="submit">Executar</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $produto = new Produto(
        $_POST['nome'],
        (int)$_POST['estoque'],
        (float)$_POST['valor']
    );

    $mensagem = "";

    if ($_POST['acao'] === 'entrada') {
        $produto->adicionarEstoque((int)$_POST['quantidade']);
    } else {
        $resultado = $produto->removerEstoque((int)$_POST['quantidade']);
        if ($resultado) {
            $mensagem = $resultado;
        }
    }

    echo "<h3>Resultado:</h3>";
    if ($mensagem) {
        echo "<p>$mensagem</p>";
    }
    echo $produto->exibirDados();
}
?>

</body>
</html>