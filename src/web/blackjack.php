<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Blackjack de las Marianas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background: linear-gradient(135deg, #020c1b 0%, #0a192f 100%); color: #e6f1ff; font-family: 'Courier New', monospace; display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 100vh; margin: 0; }
        .table { background: radial-gradient(circle, #004e92 0%, #000428 100%); padding: 30px; border-radius: 20px; border: 10px solid #5c4033; width: 90%; max-width: 600px; text-align: center; box-shadow: 0 10px 40px rgba(0,0,0,0.6); position: relative; }
        .cards { display: flex; justify-content: center; gap: 10px; min-height: 80px; margin: 15px 0; perspective: 1000px; }
        .card { background: white; color: black; width: 45px; height: 70px; border-radius: 5px; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 1.2rem; box-shadow: 2px 2px 5px rgba(0,0,0,0.5); animation: deal 0.5s ease; }
        @keyframes deal { from { opacity: 0; transform: translateY(-20px); } to { opacity: 1; transform: translateY(0); } }
        
        .balance-display { position: absolute; top: -50px; right: 0; font-size: 1.5rem; color: #ffd700; font-family: sans-serif; font-weight: bold; text-shadow: 0 0 5px #000; }

        
        .controls-area { margin-top: 20px; }
        button { padding: 12px 24px; margin: 5px; cursor: pointer; border-radius: 8px; border: none; font-weight: bold; text-transform: uppercase; transition: transform 0.1s; }
        button:active { transform: scale(0.95); }
        .hit { background: #64ffda; color: #0a192f; } 
        .stand { background: #ff4444; color: white; }
        .deal-btn { background: #ffd700; color: #000; width: 100%; font-size: 1.2rem; margin-top: 10px; box-shadow: 0 0 15px rgba(255, 215, 0, 0.4); }
        
        input[type="number"] { padding: 8px; width: 120px; text-align: center; border-radius: 5px; border: 2px solid #64ffda; background: #0a192f; color: white; font-weight: bold; }
        .back-btn { margin-top: 40px; color: #aaa; text-decoration: none; font-family: sans-serif; }
    </style>
</head>
<body>
    
    <div class="table">
        <div class="balance-display">Saldo: <span id="balance">0</span> 💰</div>
        
        <h3><i class="fas fa-user-secret"></i> Crupier: <span id="d-score">0</span></h3>
        <div class="cards" id="d-cards"></div>
        <hr style="opacity:0.3; margin: 20px 0;">
        <h3><i class="fas fa-user"></i> Tú: <span id="p-score">0</span></h3>
        <div class="cards" id="p-cards"></div>
        
        <div class="controls-area">
            <div id="betting-phase">
                <input type="number" id="betInput" value="200" min="50">
                <button class="deal-btn" onclick="dealGame()">Repartir</button>
            </div>
            
            <div id="playing-phase" style="display:none;">
                <button class="hit" onclick="hit()">Pedir</button>
                <button class="stand" onclick="stand()">Plantarse</button>
            </div>
            <h3 id="msg" style="color:#ffd700; min-height:30px; margin-top:15px;"></h3>
        </div>
    </div>
    <a href="index.php" class="back-btn">⬅ Volver al Casino</a>

    <script>
        // INTEGRACIÓN JS: Key 'balance'
        let balance = Number(localStorage.getItem('balance')) || 5000;
        updateUI();
        
        let pScore=0, dScore=0, currentBet=0;

        function dealGame() {
            const bet = parseInt(document.getElementById('betInput').value);
            if(bet > balance || bet <= 0) { alert("Saldo insuficiente o apuesta inválida"); return; }
            
            balance -= bet;
            currentBet = bet;
            updateUI();
            
            pScore=0; dScore=0;
            document.getElementById('p-cards').innerHTML = '';
            document.getElementById('d-cards').innerHTML = '';
            document.getElementById('msg').innerText = '';
            
            document.getElementById('betting-phase').style.display = 'none';
            document.getElementById('playing-phase').style.display = 'block';

            hit('player'); hit('player');
            hit('dealer');
        }

        function hit(who = 'player') {
            const val = Math.floor(Math.random() * 10) + 2; // Simplificado (2-11)
            const card = document.createElement('div');
            card.className = 'card';
            card.innerText = val;
            
            if(who === 'player') {
                document.getElementById('p-cards').appendChild(card);
                pScore += val;
                document.getElementById('p-score').innerText = pScore;
                if(pScore > 21) endGame(false);
            } else {
                document.getElementById('d-cards').appendChild(card);
                dScore += val;
                document.getElementById('d-score').innerText = dScore;
            }
        }

        function stand() {
            // IA del Crupier: Pide hasta llegar a 17
            const dealerPlay = setInterval(() => {
                if(dScore < 17) {
                    hit('dealer');
                } else {
                    clearInterval(dealerPlay);
                    // Evaluar ganador
                    if(dScore > 21) endGame(true); // Casa pierde
                    else if(pScore > dScore) endGame(true); // Ganas
                    else if(pScore === dScore) endGame('draw'); // Empate
                    else endGame(false); // Pierdes
                }
            }, 800);
        }

        function endGame(result) {
            document.getElementById('playing-phase').style.display = 'none';
            document.getElementById('betting-phase').style.display = 'block';
            
            if(result === true) {
                const win = currentBet * 2;
                balance += win;
                document.getElementById('msg').innerText = `🎉 ¡GANASTE ${win} 💰!`;
                document.getElementById('msg').style.color = "#ffd700";
            } else if(result === 'draw') {
                balance += currentBet;
                document.getElementById('msg').innerText = "🤝 EMPATE (Te devuelvo lo tuyo)";
                document.getElementById('msg').style.color = "#fff";
            } else {
                document.getElementById('msg').innerText = "💀 PERDISTE. La casa gana.";
                document.getElementById('msg').style.color = "#ff4444";
            }
            updateUI();
        }

        function updateUI() {
            localStorage.setItem('balance', balance);
            document.getElementById('balance').innerText = balance.toLocaleString('es-ES');
        }
    </script>
</body>
</html>