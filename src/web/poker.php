<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Póker del Fantasma</title>
    <style>
        body { background: #0a192f; color: white; font-family: monospace; text-align: center; padding-top: 50px; }
        .table-area { background: #3e2723; padding: 40px; border-radius: 50px; display: inline-block; border: 12px solid #1a0f0a; box-shadow: 0 0 50px rgba(0,0,0,0.8); }
        .cards { display: flex; gap: 15px; justify-content: center; margin: 30px 0; perspective: 600px; }
        .card { background: white; color: black; width: 70px; height: 100px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 1.8rem; box-shadow: 2px 2px 10px rgba(0,0,0,0.5); font-weight: bold; }
        .balance-display { font-size: 1.8rem; color: #ffd700; margin-bottom: 20px; font-weight: bold; text-shadow: 2px 2px 0 #000; }
        
        button { background: #d35400; color: white; border: none; padding: 15px 40px; font-size: 1.2rem; cursor: pointer; margin-top: 15px; border-radius: 5px; font-weight: bold; box-shadow: 0 5px 0 #a04000; transition: 0.1s; }
        button:active { transform: translateY(5px); box-shadow: none; }
        
        input { padding: 10px; text-align: center; width: 100px; background: #2c3e50; border: 1px solid #d35400; color: white; font-size: 1.2rem; border-radius: 5px; }
        
        h1 { color: #e67e22; text-shadow: 2px 2px 0 #000; margin-bottom: 30px; }
    </style>
</head>

<body>
    <div class="balance-display">Saldo: <span id="balance">0</span> 💰</div>
    <h1>🏴‍☠️ Póker del Fantasma</h1>
    
    <div class="table-area">
        <div class="cards" id="hand">
            <div class="card">?</div><div class="card">?</div><div class="card">?</div><div class="card">?</div><div class="card">?</div>
        </div>
        
        <div>
            Apuesta: <input type="number" id="betAmount" value="100">
            <button onclick="play()">REPARTIR</button>
        </div>
        <h2 id="result" style="color:#64ffda; height:30px; margin-top: 20px;"></h2>
    </div>
    
    <a href="index.php" style="display:block; margin-top:40px; color:#aaa; text-decoration:none;">⬅ Huir a puerto seguro</a>

    <script>
        const values = ['2','3','4','5','6','7','8','9','10','J','Q','K','A'];
        const suits = ['♠', '♥', '♦', '♣'];
        
        // INTEGRACIÓN JS: Key 'balance'
        let balance = Number(localStorage.getItem('balance')) || 5000;
        updateUI();

        function play() {
            const betInput = document.getElementById('betAmount');
            const bet = parseInt(betInput.value);
            if(bet > balance || bet <= 0) { alert("¡No tienes ese dinero, marinero!"); return; }

            // Cobrar
            balance -= bet;
            updateUI();

            const handDiv = document.getElementById('hand');
            handDiv.innerHTML = '';
            
            let handValues = [];
            
            // Generar mano
            for(let i=0; i<5; i++) {
                let v = values[Math.floor(Math.random() * values.length)];
                let s = suits[Math.floor(Math.random() * suits.length)];
                handValues.push(v);
                let color = (s === '♥' || s === '♦') ? 'red' : 'black';
                
                // Pequeño retardo para animación
                setTimeout(() => {
                    handDiv.innerHTML += `<div class="card" style="color:${color}; animation: fadeIn 0.5s">${v}${s}</div>`;
                }, i * 200);
            }

            // Verificar premios después de mostrar cartas
            setTimeout(() => {
                checkWin(handValues, bet);
            }, 1200);
        }

        function checkWin(handValues, bet) {
            const counts = {};
            handValues.forEach(x => { counts[x] = (counts[x] || 0) + 1; });
            
            let pairs = 0;
            let three = false;
            let four = false;
            
            for(let val in counts) {
                if(counts[val] === 2) pairs++;
                if(counts[val] === 3) three = true;
                if(counts[val] === 4) four = true;
            }

            let msg = "Carta Alta... Las algas se llevan tu dinero.";
            let win = 0;
            let color = "#ff4444";

            if(four) { win = bet*10; msg = "¡PÓKER! x10 (¡El capitán llora!)"; color="#ffd700"; }
            else if(three && pairs > 0) { win = bet*8; msg = "¡FULL HOUSE! x8"; color="#ffd700"; }
            else if(three) { win = bet*5; msg = "¡TRÍO! x5"; color="#64ffda"; }
            else if(pairs === 2) { win = bet*3; msg = "¡DOBLE PAREJA! x3"; color="#64ffda"; }
            else if(pairs === 1) { win = bet*2; msg = "¡PAREJA! x2"; color="#fff"; }

            if(win > 0) {
                balance += win;
                document.getElementById('result').innerText = `${msg} (+${win})`;
            } else {
                document.getElementById('result').innerText = msg;
            }
            document.getElementById('result').style.color = color;
            updateUI();
        }

        function updateUI() {
            localStorage.setItem('balance', balance);
            document.getElementById('balance').innerText = balance.toLocaleString('es-ES');
        }
    </script>
    <style>@keyframes fadeIn { from { opacity:0; transform: translateY(-20px); } to { opacity:1; transform: translateY(0); } }</style>
</body>
</html>