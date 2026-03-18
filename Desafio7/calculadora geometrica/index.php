<?php require_once 'CalculadoraGeometrica.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calculadora Geométrica</title>

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
            background: #6610f2;
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

    <script>
        function atualizarCampos() {
            const figura = document.getElementById("figura").value;
            const campo2 = document.getElementById("campo2");

            if (figura === "retangulo") {
                campo2.style.display = "block";
            } else {
                campo2.style.display = "none";
            }
        }
    </script>
</head>
<body>

<h2>Calculadora Geométrica</h2>

<form method="post">
    <select name="figura" id="figura" onchange="atualizarCampos()">
        <option value="quadrado">Quadrado</option>
        <option value="retangulo">Retângulo</option>
        <option value="circulo">Círculo</option>
    </select><br>

    <input type="number" step="0.01" name="valor1" placeholder="Valor (lado/base/raio)" required><br>

    <input type="number" step="0.01" name="valor2" id="campo2" placeholder="Altura (retângulo)" style="display:none;"><br>

    <button type="submit">Calcular</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $figura = $_POST['figura'];
    $valor1 = (float)$_POST['valor1'];
    $valor2 = isset($_POST['valor2']) ? (float)$_POST['valor2'] : 0;

    $calc = new CalculadoraGeometrica($figura, $valor1, $valor2);

    echo "<h3>Resultado:</h3>";
    echo $calc->exibirResultado();
}
?>

</body>
</html>