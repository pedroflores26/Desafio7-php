<?php require_once 'ConversorMoeda.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Conversor de Moeda</title>

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
            background: #17a2b8;
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

<h2>Conversor de Moeda</h2>

<form method="post">
    <input type="number" step="0.01" name="valor" placeholder="Valor em Reais" required><br>

    <select name="moeda">
        <option value="USD">Dólar (USD)</option>
        <option value="EUR">Euro (EUR)</option>
    </select><br>

    <input type="number" step="0.01" name="cotacao" placeholder="Cotação atual" required><br>

    <button type="submit">Converter</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $conversor = new ConversorMoeda(
        (float)$_POST['valor'],
        $_POST['moeda'],
        (float)$_POST['cotacao']
    );

    echo "<h3>Resultado:</h3>";
    echo $conversor->exibirResultado();
}
?>

</body>
</html>