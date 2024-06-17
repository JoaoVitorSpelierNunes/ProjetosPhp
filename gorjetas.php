<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Gorjetas</title>
    <link rel="stylesheet" href="gorjetas.css">
</head>
    <div class="container">
        <h1>Calculadora de Gorjeta</h1>
        <form action="gorjetas.php" method="POST">
            <label for="valor">Valor da conta (R$): </label>
            <input type="number" id="valor" name="valor" step="0.1" required><br><br>
            <label for="percentagem">Percentagem da gorjeta: </label>
            <input type="number" id="percentagem" name="percentagem" step="0.1" required><br><br>
            <input type="submit" value="Calcular">
            <input type="reset" value="Limpar">
        </form><br>
        <div class="resposta">
        <?php
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['valor']) && isset($_POST['percentagem'])){
                $valor = $_POST['valor'];
                $percentagem = $_POST['percentagem'];
                $erro = (empty($valor) || empty($percentagem)) ? "Todos os campos são obrigatórios": ($valor <= 0 || $percentagem <= 0)? "Por favor, insira valores válidos para valor e percentagem":"";
                if($erro){
                    echo $erro;
                }
                else{
                    $gorjeta = ($valor * $percentagem) / 100;
                    $gorjeta = number_format($gorjeta, 2);
                    
                    echo "Sua gorjeta é de R$ $gorjeta";
                }
            }else{
                echo "Formulário não enviado corretamente";
            }
        }
        ?>
    </div>
    </div>
    
</body>
</html>