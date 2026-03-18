<?php require_once 'Pedido.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Pedido</title>

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
            background: #007bff;
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

<h2>Cadastro de Pedido</h2>

<form method="post">
    <input type="text" name="produto" placeholder="Produto" required><br>
    <input type="number" name="quantidade" placeholder="Quantidade" required><br>
    <input type="number" step="0.01" name="preco" placeholder="Preço Unitário" required><br>

    <select name="tipo">
        <option value="normal">Cliente Normal</option>
        <option value="premium">Cliente Premium</option>
    </select><br><br>

    <button type="submit">Calcular</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $pedido = new Pedido(
        $_POST['produto'],
        (int)$_POST['quantidade'],
        (float)$_POST['preco'],
        $_POST['tipo']
    );

    echo "<h3>Resumo do Pedido:</h3>";
    echo $pedido->exibirResumo();
}
?>

</body>
</html>