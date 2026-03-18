<?php require_once 'Pessoa.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cálculo de IMC</title>

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

        input {
            width: 90%;
            padding: 8px;
            margin: 5px 0;
        }

        button {
            padding: 10px;
            background: #dc3545;
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

<h2>Cálculo de IMC</h2>

<form method="post">
    <input type="text" name="nome" placeholder="Nome" required><br>
    <input type="number" step="0.01" name="peso" placeholder="Peso (kg)" required><br>
    <input type="number" step="0.01" name="altura" placeholder="Altura (m)" required><br>

    <button type="submit">Calcular</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $pessoa = new Pessoa(
        $_POST['nome'],
        (float)$_POST['peso'],
        (float)$_POST['altura']
    );

    echo "<h3>Resultado:</h3>";
    echo $pessoa->exibirResultado();
}
?>

</body>
</html>