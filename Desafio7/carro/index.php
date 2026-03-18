<?php require_once 'Carro.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Carro</title>

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
            background: #ff5722;
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

<h2>Informações do Carro</h2>

<form method="post">
    <input type="text" name="modelo" placeholder="Modelo" required><br>

    <select name="combustivel">
        <option value="gasolina">Gasolina</option>
        <option value="etanol">Etanol</option>
    </select><br>

    <input type="number" step="0.01" name="tanque" placeholder="Tanque (litros)" required><br>
    <input type="number" step="0.01" name="consumo" placeholder="Consumo (km/l)" required><br>
    <input type="number" name="km" placeholder="Km rodados" required><br>

    <button type="submit">Calcular</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $carro = new Carro(
        $_POST['modelo'],
        $_POST['combustivel'],
        (float)$_POST['tanque'],
        (float)$_POST['consumo'],
        (float)$_POST['km']
    );

    echo "<h3>Resultado:</h3>";
    echo $carro->exibirDados();
}
?>

</body>
</html>