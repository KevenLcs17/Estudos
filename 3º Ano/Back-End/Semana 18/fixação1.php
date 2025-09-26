<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fixação 1</title>
</head>
<body>
    <?php 
    
    
            
            $precoProduto = 150.00;
            $percentualDesconto = 10;

           
            $valorDesconto = $precoProduto * ($percentualDesconto / 100);

            
            $precoFinal = $precoProduto - $valorDesconto;

            
            echo "<p>Preço Original: R$ " . number_format($precoProduto, 2, ',', '.') . "</p>";

           
            echo "<p>Desconto de " . $percentualDesconto . "%: R$ " . number_format($valorDesconto, 2, ',', '.') . "</p>";
           
            echo "<p>Preço Final: R$ " . number_format($precoFinal, 2, ',', '.') . "</p>";
        ?>
    
    
    
</body>
</html>