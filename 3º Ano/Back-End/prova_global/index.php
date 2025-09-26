<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orçamento PC-PRONTO (PROVA GLOBAL)</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post"></form>
    <label for=""></label>
    <input type="number" step="0.01" value="">
    <input type="submit" step="0.01" value="">

    
    

    <?php 

    $preco = $_POST["preco"];
    $quantidade = $_POST["quantidade"];

    $preco = "350000";
    $quantidade = "2";

    $subtotal = $preco * $quantidade;

    $subtotal_formatado = number_format($subtotal,2,',','.');


    echo "<p> --- Orçamento PC-Pronto ---</p>";
    echo "<p> Produto: R$ $preco (x $quantidade)</p>";
    echo "<p> Subtotal: R$ $subtotal </p>"




    
    
    
    
    ?>

</body>
</html>