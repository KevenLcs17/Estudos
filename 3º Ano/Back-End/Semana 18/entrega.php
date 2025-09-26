<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Tinta</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        
        body {
            font-family: 'Poppins', sans-serif;
            
            background: linear-gradient(135deg, #1C274C 0%, #0D162B 100%);
            
            position: relative;
            overflow: hidden;
        }

        
        body::before, body::after {
            content: '';
            position: absolute;
            width: 350px;
            height: 350px;
            background: rgba(43, 86, 150, 0.2);
            border-radius: 50%;
            filter: blur(100px);
            z-index: 0;
            animation: move-bg 15s infinite alternate ease-in-out;
        }

        body::before {
            top: 5%;
            left: 5%;
        }

        body::after {
            bottom: 5%;
            right: 5%;
            animation-delay: 3s;
        }

        @keyframes move-bg {
            from { transform: translate(0, 0); }
            to { transform: translate(60px, 60px); }
        }

        
        .calculator-card {
            position: relative;
            z-index: 1;
            
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            animation: fadeIn 1s ease-in-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        
        input:focus {
            outline: none;
            
            border-color: #5EEAD4;
            box-shadow: 0 0 0 3px rgba(94, 234, 212, 0.5);
        }

        
        .result-box {
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

       
        .result-box:hover {
            transform: scale(1.02);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-4">
    
    <div class="calculator-card p-8 md:p-10 rounded-3xl shadow-2xl w-full max-w-lg text-white">
        <h1 class="text-4xl md:text-5xl font-extrabold text-center mb-8 tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-teal-300 to-sky-400">
            Calculadora de Tinta 🎨
        </h1>
        
        <?php
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $largura = filter_input(INPUT_POST, 'largura', FILTER_VALIDATE_FLOAT);
                $altura = filter_input(INPUT_POST, 'altura', FILTER_VALIDATE_FLOAT);

                
                if ($largura === false || $altura === false || $largura <= 0 || $altura <= 0) {
                    echo "<div class='bg-red-900/40 text-red-300 p-4 rounded-xl mb-6 border border-red-700/50 transform transition-transform duration-300 hover:scale-105'>";
                    echo "<p class='text-center font-medium'>Por favor, insira valores numéricos válidos e maiores que zero.</p>";
                    echo "</div>";
                } else {
                    // Calcula a área e a quantidade de tinta necessária
                    $area = $largura * $altura;
                    $litrosTinta = $area / 2;

                    // Exibe o relatório de resultados com novo visual
                    echo "<div class='result-box p-6 rounded-2xl mb-6 shadow-md'>";
                    echo "<h2 class='text-2xl font-bold text-center mb-4 text-white'>Resultados do Cálculo</h2>";
                    echo "<div class='space-y-3'>";
                    echo "<p class='text-lg'><span class='font-semibold'>Largura da Parede:</span> <span class='text-teal-300'>" . number_format($largura, 2, ',', '.') . " m</span></p>";
                    echo "<p class='text-lg'><span class='font-semibold'>Altura da Parede:</span> <span class='text-teal-300'>" . number_format($altura, 2, ',', '.') . " m</span></p>";
                    echo "<hr class='border-white/20'>";
                    echo "<p class='text-xl font-bold'>Área Total: <span class='text-teal-300'>" . number_format($area, 2, ',', '.') . " m²</span></p>";
                    echo "<p class='text-xl font-bold'>Tinta Necessária: <span class='text-teal-300'>" . number_format($litrosTinta, 2, ',', '.') . " litros</span></p>";
                    echo "</div>";
                    echo "</div>";
                }
            }
        ?>

        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="space-y-5">
            <div>
                <label for="largura" class="block text-sm font-medium text-gray-200 mb-1">Largura da Parede (em metros)</label>
                <input type="number" id="largura" name="largura" step="any" placeholder="Ex: 5.5" class="mt-1 block w-full rounded-xl border border-white/20 bg-white/10 shadow-sm p-3 placeholder-gray-400 text-white transition-colors duration-200 ease-in-out" required>
            </div>
            <div>
                <label for="altura" class="block text-sm font-medium text-gray-200 mb-1">Altura da Parede (em metros)</label>
                <input type="number" id="altura" name="altura" step="any" placeholder="Ex: 2.8" class="mt-1 block w-full rounded-xl border border-white/20 bg-white/10 shadow-sm p-3 placeholder-gray-400 text-white transition-colors duration-200 ease-in-out" required>
            </div>
            <button type="submit" class="w-full flex justify-center py-3 px-4 rounded-xl shadow-lg text-lg font-semibold text-white bg-gradient-to-r from-sky-500 to-teal-500 hover:from-sky-600 hover:to-teal-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 transition-all duration-300 ease-in-out transform hover:scale-105">
                Calcular Tinta
            </button>
        </form>
    </div>
</body>
</html>
