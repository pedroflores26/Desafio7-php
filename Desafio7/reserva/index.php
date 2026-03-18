<?php require_once 'ReservaHotel.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Reserva de Hotel</title>

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

        input, select {
            width: 90%;
            padding: 8px;
            margin: 5px 0;
        }

        button {
            padding: 10px;
            background: #343a40;
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

<h2>Reserva de Hotel</h2>

<form method="post">
    <input type="text" name="nome" placeholder="Nome do hóspede" required><br>

    <select name="tipo">
        <option value="simples">Simples (R$120)</option>
        <option value="luxo">Luxo (R$200)</option>
        <option value="suite">Suíte (R$350)</option>
    </select><br>

    <input type="number" name="noites" placeholder="Número de noites" required><br>

    <button type="submit">Calcular</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $reserva = new ReservaHotel(
        $_POST['nome'],
        (int)$_POST['noites'],
        $_POST['tipo']
    );

    echo "<h3>Resumo da Reserva:</h3>";
    echo $reserva->exibirResumo();
}
?>

</body>
</html>