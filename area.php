<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Áreas</title>
    <link rel="stylesheet" href="area.css">
</head>
<body>
    <div class="container">
        <h1>Calculadora de Áreas</h1>
        <form action="area.php" method="POST">
            <label for="Forma">Escolha a forma</label>
            <select name="forma" id="forma">
                <option value="Retângulo">Retângulo</option>
                <option value="Triângulo">Triângulo</option>
                <option value="Circulo">Circulo</option>
            </select><br><br>
            <label for="largura">Largura: </label>
            <input type="number" id="largura" name="largura" step="0.1" required><br><br>
            <label for="altura">Altura: </label>
            <input type="number" id="altura" name="altura" step="0.1" required><br><br>
            <label for="base">Base: </label>
            <input type="number" id="base" name="base" step="0.1" required><br><br>
            <label for="altTri">Altura Triângulo: </label>
            <input type="number" id="altTri" name="altTri" step="0.1" required><br><br>
            <label for="raio">Raio: </label>
            <input type="number" id="raio" name="raio" step="0.1" required><br><br>
            <input type="submit" value="Calcular">
        </form>

        <div class="resposta">
            <?php
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                if(isset($_POST['largura']) && isset($_POST['altura']) && isset($_POST['base']) && isset($_POST['altTri']) && isset($_POST['raio'])){
                    $largura = $_POST['largura'];
                    $forma = $_POST['forma'];
                    $altura = $_POST['altura'];
                    $base = $_POST['base'];
                    $altTri = $_POST['altTri'];
                    $raio = $_POST['raio'];
                    $erro = "";
                    switch($forma){
                        case "retangulo";
                        $erro = (empty($largura) || empty($altura) ? "Os campos 'Largura' e 'Altura' são obrigatórios": $largura <= 0 || $altura <= 0) ? "Por favor, insira valores válidos": "";
                        break;
                        case "triangulo";
                        $erro = empty($altTri) || empty($base) ? "Os campos 'Altura Triângulo' e 'Base' são obrigatórios": $altTri <= 0 || $base <= 0 ? "Por favor, insira valores válidos": "";
                        break;
                        case "circulo";
                        $erro = empty($raio)? "O campo raio é obrigatório": $raio <= 0? "Por favor, insira valores válidos": "";
                        break;
                    }
                    
                    
                    if($erro){
                        echo $erro;
                    }
                    else{
                        $calcular = 0;
                        switch($forma){
                            case "Retângulo";
                            $calcular = $largura * $altura;
                            break;

                            case "Triângulo";
                            $calcular = $altTri * $base;
                            break;

                            case "Circulo";
                            $calcular = pi() * pow($raio, 2);
                            break;
                        }
                        
                        echo "A área do $forma é $calcular <br>";
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