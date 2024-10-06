<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Simples em PHP</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="bg-light d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">
    <div class="container text-center">
        <h1 class="mb-4">Calculadora Simples em PHP</h1>

        <div class="card shadow" style="width: 300px; text-align: center; display: inline-block;">
            <div class="card-body">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group">
                        <label for="num1">Número 1:</label>
                        <input type="number" name="num1" class="form-control" id="num1" required>
                    </div>
                    <div class="form-group">
                        <label for="num2">Número 2:</label>
                        <input type="number" name="num2" class="form-control" id="num2" required>
                    </div>
                    <div class="form-group">
                        <label for="operation">Operação:</label>
                        <select name="operation" class="form-control" id="operation" required>
                            <option value="add">Adicionar</option>
                            <option value="subtract">Subtrair</option>
                            <option value="multiply">Multiplicar</option>
                            <option value="divide">Dividir</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Calcular</button>
                </form>
            </div>
        </div>

        <?php
        include './calculadora.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $operation = $_POST['operation'];

            try {
                $result = calcular($num1, $num2, $operation);
                echo "<div class='mt-4'><h3 class='resultado'>Resultado: " . $result . "</h3></div>";
            } catch (Exception $e) {
                echo "<div class='mt-4'><h3 class='error text-danger'>" . $e->getMessage() . "</h3></div>";
            }
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>