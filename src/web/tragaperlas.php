<!DOCTYPE html>
<html lang="es">
<head>
    
    <meta charset="UTF-8">
    <title>Tragaperlas del Tesoro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background: linear-gradient(135deg, #020c1b 0%, #0a192f 100%); color: #e6f1ff; font-family: 'Segoe UI', sans-serif; display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 100vh; margin: 0; }
        .game-container { background: rgba(17, 34, 64, 0.9); backdrop-filter: blur(10px); padding: 40px; border-radius: 20px; border: 1px solid #64ffda; box-shadow: 0 0 30px rgba(0,0,0,0.5); text-align: center; max-width: 500px; width: 90%; }
        h1 { color: #64ffda; text-transform: uppercase; margin-bottom: 10px; text-shadow: 0 0 10px rgba(100, 255, 218, 0.3); }
        
        .bet-area { margin: 20px 0; background: rgba(0,0,0,0.3); padding: 15px; border-radius: 10px; }
        input[type="number"] { background: transparent; border: 1px solid #64ffda; color: white; padding: 10px; border-radius: 5px; width: 100px; text-align: center; font-size: 1.2rem; font-weight: bold; }
        
        .slot-machine { background: #0b1622; padding: 20px; border-radius: 15px; border: 4px solid #ffd700; margin-top: 20px; }
        .reels { display: flex; gap: 10px; margin-bottom: 20px; justify-content: center; }
        .reel { width: 80px; height: 100px; background: #e6f1ff; color: #333; font-size: 3rem; display: flex; align-items: center; justify-content: center; border-radius: 8px; border: 2px solid #000; }
        
        button { background: linear-gradient(45deg, #ffd700, #ffaa00); color: #000; border: none; padding: 15px 40px; font-size: 1.2rem; cursor: pointer; border-radius: 50px; font-weight: bold; text-transform: uppercase; transition: transform 0.2s; box-shadow: 0 0 15px rgba(255, 215, 0, 0.4); }
        button:hover { transform: scale(1.05); }
        button:disabled { background: #555; cursor: not-allowed; }
        
        #result { margin-top: 20px; font-size: 1.3rem; height: 50px; font-weight: bold; }
        .balance-display { font-size: 1.5rem; color: #ffd700; margin-bottom: 20px; font-weight: bold; text-shadow: 0 0 5px #ffd700; }
        .back-btn { margin-top: 30px; display: inline-block; color: #64ffda; text-decoration: none; border: 1px solid #64ffda; padding: 10px 20px; border-radius: 5px; transition: 0.3s; }
        .back-btn:hover { background: rgba(100, 255, 218, 0.1); }
    </style>
</head>
<body>
    <div class="game-container">
        <div class="balance-display">Saldo: <span id="balance">0</span> 💰</div>
        <h1><i class="fas fa-gem"></i> Tesoro de Poseidón</h1>
        
        <div class="bet-area">
            <label>Apuesta: </label>
            <input type="number" id="betAmount" value="100" min="10">
        </div>
        
        <div class="slot-machine">
            <div class="reels">
                <div class="reel" id="r1">🔱</div>
                <div class="reel" id="r2">🔱</div>
                <div class="reel" id="r3">🔱</div>
            </div>
            <button onclick="spin()" id="spinBtn">¡GIRAR!</button>
            <div id="result"></div>
        </div>

        <a href="index.php" class="back-btn">⬅ Volver al Menú</a>
    </div>

    <script>
        const symbols = ['🔱', '🐡', '🐙', '🐚', '💎', '🏴‍☠️']; 
        
        // INTEGRACIÓN CON TU JS: Usamos 'balance' en lugar de 'oceanBalance'
        let balance = Number(localStorage.getItem('balance')) || 5000;
        updateUI();

        function spin() {
            const betInput = document.getElementById('betAmount');
            const bet = parseInt(betInput.value);
            const res = document.getElementById('result');
            const btn = document.getElementById('spinBtn');

            if(bet > balance) { 
                res.innerText = "💸 No tienes suficiente saldo."; 
                res.style.color = "#ff4444"; 
                return; 
            }
            if(bet <= 0) { 
                res.innerText = "❌ Apuesta inválida."; 
                return; 
            }

            // Descontar apuesta
            balance -= bet;
            updateUI();
            
            btn.disabled = true;
            res.innerText = "🌊 Las corrientes giran...";
            res.style.color = "#64ffda";
            
            const r1 = document.getElementById('r1');
            const r2 = document.getElementById('r2');
            const r3 = document.getElementById('r3');

            // Animación
            let interval = setInterval(() => {
                r1.innerText = symbols[Math.floor(Math.random() * symbols.length)];
                r2.innerText = symbols[Math.floor(Math.random() * symbols.length)];
                r3.innerText = symbols[Math.floor(Math.random() * symbols.length)];
            }, 100);

            setTimeout(() => {
                clearInterval(interval);
                // Resultado final
                const s1 = symbols[Math.floor(Math.random() * symbols.length)];
                const s2 = symbols[Math.floor(Math.random() * symbols.length)];
                const s3 = symbols[Math.floor(Math.random() * symbols.length)];
                
                r1.innerText = s1; r2.innerText = s2; r3.innerText = s3;

                if(s1 === s2 && s2 === s3) {
                    const win = bet * 20;
                    balance += win;
                    res.innerHTML = `¡JACKPOT! Ganaste ${win} 💰`;
                    res.style.color = "#ffd700";
                } else if(s1 === s2 || s2 === s3 || s1 === s3) {
                    const win = bet * 2;
                    balance += win;
                    res.innerHTML = `¡Par! Recuperas ${win} 💰`;
                    res.style.color = "#64ffda";
                } else {
                    res.innerText = "El mar se tragó tu dinero.";
                    res.style.color = "#ff4444";
                }
                
                updateUI();
                btn.disabled = false;
            }, 1500);
        }

        function updateUI() {
            // Guardamos en 'balance' para que App.js lo lea en el index
            localStorage.setItem('balance', balance);
            document.getElementById('balance').innerText = balance.toLocaleString('es-ES');
        }
    </script>
</body>
</html>