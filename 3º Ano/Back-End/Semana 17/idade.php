<?php
    
    date_default_timezone_set('America/Sao_Paulo');

    
    $idade = null;
    $ano_nascimento = null;

    
    if (isset($_POST['ano_nascimento']) && !empty($_POST['ano_nascimento'])) {
        
        $ano_atual = date('Y');
        
       
        $ano_nascimento = (int)$_POST['ano_nascimento'];

       
        if ($ano_nascimento >= 1900 && $ano_nascimento <= $ano_atual) {
           
            $idade = $ano_atual - $ano_nascimento;
        } else {
            
            $idade = "inválido";
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Idade</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            text-align: center;
        }
        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        h1 {
            color: #2c3e50;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        input[type="number"] {
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
        }
        button {
            padding: 12px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #2980b9;
        }
        .resultado {
            margin-top: 25px;
            font-size: 1.2em;
            font-weight: bold;
            color: #27ae60;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Calculadora de Idade</h1>

   
    <form action="" method="post">
        <label for="ano_nascimento">Qual seu ano de nascimento?</label>
        <input type="number" id="ano_nascimento" name="ano_nascimento" placeholder="Ex: 1990" required>
        <button type="submit">Calcular Idade</button>
    </form>

    <?php
        
        if ($idade !== null) {
            if ($idade !== "inválido") {
                echo "<p class='resultado'>Quem nasceu em $ano_nascimento tem/terá aproximadamente $idade anos.</p>";
            } else {
                echo "<p class='resultado' style='color: red;'>Por favor, insira um ano válido.</p>";
            }
        }
    ?>
</div>

</body>
</html>