<?php require_once 'CalculadoraFinanceira.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calculadora Financeira</title>

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
            width: 320px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }

        input {
            width: 90%;
            padding: 8px;
            margin: 5px 0;
        }

        button {
            padding: 10px;
            background: #ffc107;
            border: none;
            cursor: pointer;
        }

        ul {
            list-style: none;
            background: white;
            width: 320px;
            margin: auto;
            padding: 15px;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<h2>Calculadora Financeira</h2>

<form method="post">
    <input type="number" step="0.01" name="valor" placeholder="Valor da compra" required><br>
    <input type="number" name="parcelas" placeholder="Número de parcelas" required><br>
    <input type="number" step="0.01" name="juros" placeholder="Juros (%) ao mês" required><br>

    <button type="submit">Calcular</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $calc = new CalculadoraFinanceira(
        (float)$_POST['valor'],
        (int)$_POST['parcelas'],
        (float)$_POST['juros']
    );

    echo "<h3>Resultado:</h3>";
    echo $calc->exibirResultado();
}
?>

</body>
</html>