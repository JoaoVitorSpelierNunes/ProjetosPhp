<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Temperatura</title>
    <link rel="stylesheet" href="temperatura.css">
</head>
<body>
    <div class="container">
    <h1>Conversor de Temperatura</h1>
        <form action="temperatura.php" method="POST">
            <label for="temperatura">Temperatura: </label>
            <input type="number" id="temperatura" name="temperatura" step="0.1" required><br><br>
            <label for="Tipo">Converter de: </label>
            <select name="tipo" id="tipo">
                <option value="Celsius">Celsius</option>
                <option value="Fahreinheit">Fahreinheit</option>
            </select><br><br>
            <input type="submit" value="Converter">
        </form><br>
        <div class="resposta">
            <?php
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(isset($_POST['temperatura'])){
                    $temperatura = $_POST['temperatura'];
                    $tipo = $_POST['tipo'];
                    $erro = empty($temperatura) ? "Todos os campos são obrigatórios":"";
                    if($erro){
                        echo $erro;
                    }
                    else{
                        $convertido = 0;
                        $de = "";
                        switch($tipo){
                            case "Celsius";
                            $convertido = ($temperatura - 32) * (5/9);
                            $de = "Fahreinheit";
                            break;

                            case "Fahreinheit";
                            $convertido = ( $temperatura * (9/5)) + 32;
                            $de = "Celsius";
                            break;
                        }
                        
                        echo "A temperatura convertida de $temperatura graus $de para $tipo é: $convertido $tipo <br>";
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