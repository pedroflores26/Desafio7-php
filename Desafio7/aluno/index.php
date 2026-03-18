<?php require_once 'Aluno.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Notas</title>

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
            background: #28a745;
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

<h2>Cadastro de Aluno</h2>

<form method="post">
    <input type="text" name="nome" placeholder="Nome" required><br>
    <input type="text" name="disciplina" placeholder="Disciplina" required><br>
    <input type="number" step="0.01" name="nota1" placeholder="Nota 1" required><br>
    <input type="number" step="0.01" name="nota2" placeholder="Nota 2" required><br>
    <input type="number" step="0.01" name="nota3" placeholder="Nota 3" required><br>
    <button type="submit">Calcular</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $aluno = new Aluno(
        $_POST['nome'],
        $_POST['disciplina'],
        (float)$_POST['nota1'],
        (float)$_POST['nota2'],
        (float)$_POST['nota3']
    );

    echo "<h3>Resultado:</h3>";
    echo $aluno->exibirResultado();
}
?>

</body>
</html>