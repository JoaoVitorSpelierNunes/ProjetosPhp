<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rifa</title>
    <link rel="stylesheet" href="rifa.css">
</head>
<body>
    <div class="container">
        <h1>Ação entre amigos - CSL</h1>
        <?php
        
$premio = "Rádio JBL";
$valor = 5.00;
$quantNum = 10;

echo "<table>";
for($i = 1; $i <= $quantNum; $i++){
    echo "
    <tr'>
            <td>
                <p>Nº $i </p>
                <p>Nome: </p>
                <p>Telefone: </p>
                <p>Email: </p>
            </td>

            <td> 
                <p>Ação entre amigos - CSL</p>
                <p>Premio: $premio</p>
                <p>Valor: $valor</p>
                <p>Nº $i</p>
            </td>   
    </tr>
    <tr></tr>
    ";
}
echo "</table>";
        ?>
    </div>
</body>
</html>