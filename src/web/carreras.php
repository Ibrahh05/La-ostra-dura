<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gran Premio del Arrecife</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background: linear-gradient(135deg, #020c1b 0%, #0a192f 100%); color: #e6f1ff; font-family: 'Segoe UI', sans-serif; display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 100vh; margin: 0; }
        .game-container { width: 95%; max-width: 900px; text-align: center; }
        .balance-display { font-size: 1.5rem; color: #ffd700; margin-bottom: 10px; font-weight: bold; text-shadow: 0 0 5px #ffd700; }
        
        .track { background: #2c2c2c; border: 4px solid #444; margin: 20px auto; padding: 10px; border-radius: 10px; position: relative; box-shadow: 0 0 20px rgba(0,0,0,0.5); }
        .lane { height: 60px; border-bottom: 2px dashed #555; position: relative; display: flex; align-items: center; }
        .lane:last-child { border-bottom: none; }
        .crab { font-size: 3rem; position: absolute; left: 0; z-index: 10; transition: left 0.1s linear; }
        .finish-line { position: absolute; right: 20px; top: 0; bottom: 0; width: 5px; background: red; z-index: 5; }

        .bet-controls { background: rgba(0,0,0,0.5); padding: 20px; border-radius: 10px; margin-top: 20px; border: 1px solid #1e3a8a; }
        .crab-select { margin: 5px; padding: 10px 20px; cursor: pointer; border: 2px solid transparent; background: #112240; color: white; border-radius: 5px; font-weight: bold; transition: 0.2s; }
        .crab-select:hover { background: #233554; }
        .crab-select.selected { border-color: #ffd700; background: #233554; box-shadow: 0 0 10px rgba(255, 215, 0, 0.3); }
        
        input[type="number"] { padding: 10px; border-radius: 5px; background: #0a192f; color: white; border: 1px solid #64ffda; text-align: center; font-weight: bold; width: 120px; font-size: 1.1rem; }
        
        #btnStart { background: #ff4444; color: white; padding: 15px 40px; font-size: 1.2rem; cursor: pointer; border: none; border-radius: 5px; margin-top: 20px; font-weight: bold; text-transform: uppercase; box-shadow: 0 0 15px rgba(255, 0, 0, 0.4); }
        #btnStart:disabled { background: #555; cursor: not-allowed; box-shadow: none; }
        .back-btn { margin-top: 20px; display: inline-block; color: #64ffda; text-decoration: none; border: 1px solid #64ffda; padding: 8px 15px; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="game-container">
        <div class="balance-display">Saldo: <span id="balance">0</span> 💰</div>
        <h1><i class="fas fa-flag-checkered"></i> Gran Premio del Arrecife</h1>

        <div class="track">
            <div class="finish-line"></div>
            <div class="lane"><div class="crab" id="crab0">🦀</div></div>
            <div class="lane"><div class="crab" id="crab1">🦞</div></div>
            <div class="lane"><div class="crab" id="crab2">🦐</div></div>
            <div class="lane"><div class="crab" id="crab3">🦑</div></div>
        </div>

        <div class="bet-controls">
            <h3>Elige tu corredor:</h3>
            <button class="crab-select" onclick="selectCrab(0)">🦀 Don Pinzas</button>
            <button class="crab-select" onclick="selectCrab(1)">🦞 Larry</button>
            <button class="crab-select" onclick="selectCrab(2)">🦐 Bolt</button>
            <button class="crab-select" onclick="selectCrab(3)">🦑 Turbo</button>
            <br><br>
            <label>Apuesta: </label>
            <input type="number" id="betAmount" value="100" min="50">
            <br>
            <button onclick="startRace()" id="btnStart">¡A NADAR!</button>
            <div id="msg" style="margin-top:15px; font-weight:bold; height:20px; font-size: 1.2rem;"></div>
        </div>
        <a href="index.php" class="back-btn">⬅ Salir</a>
    </div>

    <script>
        // INTEGRACIÓN JS: Key 'balance'
        let balance = Number(localStorage.getItem('balance')) || 5000;
        updateUI();
        
        let selectedCrab = -1;

        function selectCrab(index) {
            selectedCrab = index;
            document.querySelectorAll('.crab-select').forEach((btn, i) => {
                btn.classList.toggle('selected', i === index);
            });
        }

        function startRace() {
            const betInput = document.getElementById('betAmount');
            const bet = parseInt(betInput.value);
            const msg = document.getElementById('msg');
            
            if(selectedCrab === -1) { msg.innerText = "¡Elige un corredor primero!"; return; }
            if(bet > balance) { msg.innerText = "🚫 Fondos insuficientes."; return; }
            if(bet <= 0) { msg.innerText = "🚫 Apuesta inválida."; return; }

            // Cobrar entrada
            balance -= bet;
            updateUI();
            
            document.getElementById('btnStart').disabled = true;
            msg.innerText = "¡Salen disparados!";
            msg.style.color = "white";

            const crabs = [
                { el: document.getElementById('crab0'), pos: 0 },
                { el: document.getElementById('crab1'), pos: 0 },
                { el: document.getElementById('crab2'), pos: 0 },
                { el: document.getElementById('crab3'), pos: 0 }
            ];

            let raceInterval = setInterval(() => {
                let winner = -1;
                crabs.forEach((crab, index) => {
                    // Velocidad aleatoria con pequeños impulsos
                    crab.pos += Math.random() * 2 + 0.5; 
                    if(Math.random() > 0.9) crab.pos += 1.5; // Turbo boost
                    
                    crab.el.style.left = crab.pos + '%';
                    if (crab.pos >= 90 && winner === -1) winner = index;
                });

                if(winner !== -1) {
                    clearInterval(raceInterval);
                    if(winner === selectedCrab) {
                        const win = bet * 3;
                        balance += win;
                        msg.innerHTML = `🏆 ¡GANASTE! Recibes ${win} 💰`;
                        msg.style.color = "#ffd700";
                    } else {
                        msg.innerHTML = `☠️ Perdiste. Ganó el corredor ${winner + 1}`;
                        msg.style.color = "#ff4444";
                    }
                    updateUI();
                    document.getElementById('btnStart').disabled = false;
                    
                    // Resetear posiciones después de un momento
                    setTimeout(() => { 
                        if(!document.getElementById('btnStart').disabled) {
                            crabs.forEach(c => { c.pos = 0; c.el.style.left = '0%'; }); 
                        }
                    }, 3000);
                }
            }, 50);
        }

        function updateUI() {
            localStorage.setItem('balance', balance);
            document.getElementById('balance').innerText = balance.toLocaleString('es-ES');
        }
    </script>
</body>
</html>