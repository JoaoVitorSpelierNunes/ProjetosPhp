<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de moedas</title>
    <link rel="stylesheet" href="moedas.css">
</head>
<body>
    <div class="container">
        <h1>Conversor de Moedas</h1>
        <form action="moedas.php" method="POST">
            <label for="valor">Valor: </label>
            <input type="number" id="valor" name="valor" step="0.1" required><br><br>
            <label for="converterDe">Converter de: </label>
            <select name="deMoeda" id="deMoeda">
                <option value="USD">USD</option>
                <option value="EUR">EUR</option>
                <option value="BRL">BRL</option>
            </select><br><br>
            <label for="converterPara">Converter para: </label>
            <select name="moedaPara" id="moedaPara">
                <option value="USD">USD</option>
                <option value="EUR">EUR</option>
                <option value="BRL">BRL</option>
            </select><br><br>
            <input type="submit" value="Converter Moeda">
        </form><br>
        <div class="resposta">
            <?php
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(isset($_POST['valor'])){
                    $valor = $_POST['valor'];
                    $de = $_POST['deMoeda'];
                    $para = $_POST['moedaPara'];
                    $erro = empty($valor) ? "Todos os campos são obrigatórios": $valor <= 0 ? "Por favor, insira um valor válido":$de == $para?"Por favor, insira moedas diferentes":"";
                    if($erro){
                        echo $erro;
                    }
                    else{
                        $convertido = 0;
                        $convertido = number_format($convertido, 2);
                        $valor = number_format($valor, 2);
                        switch($de){
                            case "USD";
                            switch($para){
                                case "EUR";
                                $convertido = $valor * 0.93;
                                break;
                                case "BRL";
                                $convertido = $valor * 5.37;
                                break;
                            }
                            break;

                            case "EUR";
                            switch($para){
                                case "USD";
                                $convertido = $valor * 1.07;
                                break;
                                case "BRL";
                                $convertido = $valor * 5.76;
                                break;
                            }
                            break;

                            case "BRL";
                            switch($para){
                                case "USD";
                                $convertido = $valor * 0.19;
                                break;
                                case "EUR";
                                $convertido = $valor * 0.17;
                                break;
                            }
                            break;
                        }
                        
                        echo "O valor convertido de $valor $de para $para é: $convertido $para <br>";
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