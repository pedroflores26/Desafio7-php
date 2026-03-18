<?php require_once 'Viagem.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Planejamento de Viagem</title>

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
            background: #20c997;
            color: white;
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

<h2>Planejamento de Viagem</h2>

<form method="post">
    <input type="text" name="origem" placeholder="Origem" required><br>
    <input type="text" name="destino" placeholder="Destino" required><br>
    <input type="number" step="0.01" name="distancia" placeholder="Distância (km)" required><br>
    <input type="number" step="0.01" name="tempo" placeholder="Tempo (horas)" required><br>
    <input type="number" step="0.01" name="consumo" placeholder="Consumo do veículo (km/l)" required><br>
    <input type="number" step="0.01" name="preco" placeholder="Preço do combustível" required><br>

    <button type="submit">Calcular</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $viagem = new Viagem(
        $_POST['origem'],
        $_POST['destino'],
        (float)$_POST['distancia'],
        (float)$_POST['tempo'],
        (float)$_POST['consumo'],
        (float)$_POST['preco']
    );

    echo "<h3>Resumo da Viagem:</h3>";
    echo $viagem->exibirResumo();
}
?>

</body>
</html>