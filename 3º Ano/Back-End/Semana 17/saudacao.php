<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Bem-vindo!</title>
</head>
<body>
    <h1>Sua Saudação Personalizada</h1>
    <p>
        <?php
           
            $nomeRecebido = $_POST['campo_nome'];


            echo "Olá, " . $nomeRecebido . "! Seja muito bem-vindo(a) ao mundo do Back-End!";
        ?>
    </p>
</body>
</html>