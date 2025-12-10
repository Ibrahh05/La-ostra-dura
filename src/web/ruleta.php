<!DOCTYPE html>
<html lang="es">
<head>
    
    <meta charset="UTF-8">
    <title>Ruleta del Remolino</title>
    <style>
        body { background: #0a192f; color: white; font-family: sans-serif; text-align: center; display: flex; flex-direction: column; align-items: center; height: 100vh; justify-content: center; margin: 0; }
        
        .arrow { width: 0; height: 0; border-left: 15px solid transparent; border-right: 15px solid transparent; border-top: 30px solid #ffd700; margin-bottom: -10px; z-index: 10; filter: drop-shadow(0 2px 2px rgba(0,0,0,0.5)); }
        
        .wheel-container { padding: 10px; background: rgba(255,255,255,0.05); border-radius: 50%; box-shadow: 0 0 30px rgba(0,0,0,0.5); }
        .wheel { width: 280px; height: 280px; border-radius: 50%; border: 6px solid white; background: conic-gradient(#ff4444 0deg 90deg, #0066cc 90deg 180deg, #ff4444 180deg 270deg, #0066cc 270deg 360deg); transition: transform 3s cubic-bezier(0.1, 0.7, 0.1, 1); }
        
        .controls { margin-top: 30px; background: rgba(17, 34, 64, 0.8); padding: 25px; border-radius: 15px; border: 1px solid #64ffda; }
        .btn-bet { padding: 12px 30px; border: none; color: white; cursor: pointer; font-weight: bold; font-size: 1.1rem; border-radius: 5px; margin: 0 10px; transition: 0.2s; }
        .btn-bet:hover { transform: scale(1.1); }
        .red { background: #ff4444; } .blue { background: #0066cc; }
        
        input { padding: 10px; text-align: center; background: #0a192f; border: 1px solid #64ffda; color: white; font-weight: bold; border-radius: 5px; font-size: 1.1rem; }
        
        .balance-display { font-size: 1.8rem; color: #ffd700; margin-bottom: 20px; font-weight: bold; }
        #result { margin-top: 15px; font-weight: bold; font-size: 1.4rem; height: 30px; }
    </style>
</head>
<body>
    <div class="balance-display">Saldo: <span id="balance">0</span> 💰</div>
    
    <div class="arrow"></div>
    <div class="wheel-container">
        <div class="wheel" id="wheel"></div>
    </div>

    <div class="controls">
        <p style="margin-bottom: 10px;">APUESTA A COLOR (x2)</p>
        <input type="number" id="betAmount" value="100" min="50">
        <br><br>
        <button class="btn-bet red" id="btnRed" onclick="spin('red')">ROJO 🔴</button>
        <button class="btn-bet blue" id="btnBlue" onclick="spin('blue')">AZUL 🔵</button>
    </div>
    
    <div id="result"></div>
    <a href="index.php" style="color:#8892b0; display:block; margin-top:30px; text-decoration:none;">⬅ Volver</a>

    <script>
        // INTEGRACIÓN JS: Key 'balance'
        let balance = Number(localStorage.getItem('balance')) || 5000;
        updateUI();
        
        let rotation = 0;

        function spin(choice) {
            const betInput = document.getElementById('betAmount');
            const bet = parseInt(betInput.value);
            const res = document.getElementById('result');
            
            if(bet > balance || bet <= 0) { res.innerText = "❌ Fondos insuficientes"; res.style.color="red"; return; }
            
            // Cobrar
            balance -= bet;
            updateUI();
            
            // Bloquear botones
            document.getElementById('btnRed').disabled = true;
            document.getElementById('btnBlue').disabled = true;
            res.innerText = "Girando..."; res.style.color = "white";

            // Girar
            const extraSpins = 1800; // 5 vueltas completas minimo
            const randomAngle = Math.floor(Math.random() * 360);
            rotation += extraSpins + randomAngle;
            
            document.getElementById('wheel').style.transform = `rotate(${rotation}deg)`;
            
            setTimeout(() => {
                // Calcular ganador real basado en ángulo
                // Como la flecha está arriba (0 grados visualmente), el ángulo efectivo es (360 - (rotation % 360))
                // Pero simplifiquemos para este ejercicio de demo: 
                // Usaremos lógica binaria aleatoria para que coincida visualmente (rojo/azul)
                // 0-90: Rojo, 90-180: Azul, 180-270: Rojo, 270-360: Azul.
                const finalAngle = rotation % 360;
                
                // NOTA: La rueda gira clockwise.
                // Cuadrante 1 (0-90) -> Queda a la izquierda de la flecha -> Muestra el cuadrante 4?
                // Simplificación visual:
                let winColor = 'blue';
                // Ajuste fino para la lógica visual si es necesaria, pero para demo:
                if((finalAngle > 0 && finalAngle < 90) || (finalAngle > 180 && finalAngle < 270)) {
                    winColor = 'blue'; // Invertido por la posición de la flecha
                } else {
                    winColor = 'red';
                }
                
                // Resultado
                if(choice === winColor) {
                    balance += bet * 2;
                    res.innerText = `¡GANASTE! Salió ${winColor.toUpperCase()}`;
                    res.style.color = "#ffd700";
                } else {
                    res.innerText = `Perdiste... Salió ${winColor.toUpperCase()}`;
                    res.style.color = "#ff4444";
                }
                
                updateUI();
                document.getElementById('btnRed').disabled = false;
                document.getElementById('btnBlue').disabled = false;
            }, 3000);
        }

        function updateUI() {
            localStorage.setItem('balance', balance);
            document.getElementById('balance').innerText = balance.toLocaleString('es-ES');
        }
    </script>
</body>
</html>