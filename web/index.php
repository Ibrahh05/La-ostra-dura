<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>La Ostra Dura 🦪 - Apuesta y Reza</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    
    body {
      font-family: 'Arial Black', 'Arial Bold', sans-serif;
      background: #0B0F19;
      color: #fff;
      overflow-x: hidden;
    }

    /* Verificación de edad */
    .age-verification {
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0, 0, 0, 0.95);
      backdrop-filter: blur(10px);
      z-index: 10000;
      display: flex;
      align-items: center;
      justify-content: center;
      animation: fadeIn 0.5s ease;
    }

    .age-verification.hidden {
      display: none;
    }

    .age-card {
      background: linear-gradient(135deg, #1545FD, #C70735);
      padding: 3rem;
      border-radius: 20px;
      text-align: center;
      border: 3px solid #E4C525;
      box-shadow: 0 0 50px rgba(228, 197, 37, 0.5);
      max-width: 500px;
    }

    .age-card h1 {
      font-size: 3rem;
      margin-bottom: 1rem;
      text-shadow: 0 0 20px #E4C525;
    }

    .age-card p {
      font-size: 1.2rem;
      margin-bottom: 2rem;
      line-height: 1.6;
    }

    .age-btn {
      background: #E4C525;
      color: #000;
      border: none;
      padding: 1rem 3rem;
      font-size: 1.3rem;
      font-weight: 900;
      border-radius: 50px;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 5px 20px rgba(228, 197, 37, 0.5);
    }

    .age-btn:hover {
      transform: scale(1.1);
      box-shadow: 0 8px 30px rgba(228, 197, 37, 0.8);
    }

    /* Fondo submarino animado */
    .ocean-bg {
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      z-index: 0;
      opacity: 0.2;
      pointer-events: none;
    }

    .bubble {
      position: absolute;
      bottom: -100px;
      background: radial-gradient(circle, rgba(182, 255, 255, 0.4), transparent);
      border-radius: 50%;
      animation: floatUp 20s infinite ease-in-out;
    }

    @keyframes floatUp {
      0% { transform: translateY(0) translateX(0); opacity: 0; }
      10% { opacity: 1; }
      90% { opacity: 1; }
      100% { transform: translateY(-100vh) translateX(100px); opacity: 0; }
    }

    /* Header con logo neón */
    header {
      background: rgba(11, 15, 25, 0.95);
      backdrop-filter: blur(10px);
      border-bottom: 3px solid #E4C525;
      padding: 1rem 2rem;
      position: sticky;
      top: 0;
      z-index: 100;
      box-shadow: 0 5px 30px rgba(228, 197, 37, 0.3);
    }

    .header-content {
      max-width: 1600px;
      margin: 0 auto;
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 2rem;
    }

    .neon-logo {
      display: flex;
      align-items: center;
      gap: 1.5rem;
    }

    .neon-icon {
      font-size: 4rem;
      animation: neonPulse 2s infinite;
      filter: drop-shadow(0 0 20px #E4C525);
    }

    @keyframes neonPulse {
      0%, 100% { 
        filter: drop-shadow(0 0 20px #E4C525) drop-shadow(0 0 40px #E4C525);
      }
      50% { 
        filter: drop-shadow(0 0 30px #E4C525) drop-shadow(0 0 60px #E4C525) drop-shadow(0 0 80px #C70735);
      }
    }

    .neon-text h1 {
      font-size: 2.5rem;
      color: #E4C525;
      text-shadow: 
        0 0 10px #E4C525,
        0 0 20px #E4C525,
        0 0 30px #E4C525,
        0 0 40px #C70735;
      letter-spacing: 3px;
    }

    .neon-text p {
      font-size: 1rem;
      color: #B6FFFF;
      text-shadow: 0 0 10px #B6FFFF;
      margin-top: 0.5rem;
    }

    .balance {
      background: linear-gradient(135deg, #E4C525, #C70735);
      color: #000;
      padding: 1rem 2rem;
      border-radius: 50px;
      font-size: 1.5rem;
      font-weight: 900;
      box-shadow: 0 5px 20px rgba(228, 197, 37, 0.6);
      animation: balanceGlow 2s infinite;
    }

    @keyframes balanceGlow {
      0%, 100% { box-shadow: 0 5px 20px rgba(228, 197, 37, 0.6); }
      50% { box-shadow: 0 8px 40px rgba(228, 197, 37, 1); }
    }

    /* Container principal */
    .container {
      max-width: 1600px;
      margin: 0 auto;
      padding: 2rem;
      position: relative;
      z-index: 1;
    }

    /* Banner EVENTO PRINCIPAL */
    .main-event-banner {
      background: linear-gradient(135deg, rgba(21, 69, 253, 0.8), rgba(199, 7, 53, 0.8));
      border: 4px solid #E4C525;
      border-radius: 20px;
      padding: 2rem;
      margin-bottom: 2rem;
      text-align: center;
      box-shadow: 0 0 50px rgba(228, 197, 37, 0.5);
      animation: bannerPulse 3s infinite;
    }

    @keyframes bannerPulse {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.02); }
    }

    .main-event-banner h2 {
      font-size: 3rem;
      color: #E4C525;
      text-shadow: 0 0 20px #E4C525;
      margin-bottom: 0.5rem;
      animation: textFlicker 4s infinite;
    }

    @keyframes textFlicker {
      0%, 100% { opacity: 1; }
      50% { opacity: 0.8; }
      75% { opacity: 1; }
      80% { opacity: 0.9; }
    }

    .live-indicator {
      display: inline-block;
      background: #ff0000;
      color: #fff;
      padding: 0.5rem 1.5rem;
      border-radius: 20px;
      font-size: 1.2rem;
      font-weight: 900;
      animation: liveBlink 1s infinite;
      margin-bottom: 1rem;
    }

    @keyframes liveBlink {
      0%, 100% { opacity: 1; }
      50% { opacity: 0.5; }
    }

    /* Arena de combate PRINCIPAL */
    .fight-arena {
      background: rgba(40, 40, 40, 0.9);
      border: 3px solid #C70735;
      border-radius: 20px;
      padding: 2rem;
      margin-bottom: 2rem;
      box-shadow: 0 10px 50px rgba(199, 7, 53, 0.5);
    }

    .arena-title {
      text-align: center;
      font-size: 2rem;
      color: #E4C525;
      text-shadow: 0 0 15px #E4C525;
      margin-bottom: 2rem;
    }

    .fighters-display {
      display: grid;
      grid-template-columns: 1fr auto 1fr;
      gap: 2rem;
      align-items: center;
      margin-bottom: 2rem;
    }

    .fighter {
      text-align: center;
    }

    .fighter-card {
      background: linear-gradient(135deg, rgba(21, 69, 253, 0.3), rgba(199, 7, 53, 0.3));
      border: 2px solid #E4C525;
      border-radius: 15px;
      padding: 1.5rem;
      transition: all 0.3s ease;
    }

    .fighter-card:hover {
      transform: scale(1.05);
      box-shadow: 0 0 30px rgba(228, 197, 37, 0.8);
    }

    .fighter-avatar {
      width: 200px;
      height: 200px;
      background: linear-gradient(135deg, #1545FD, #C70735);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 6rem;
      margin: 0 auto 1rem;
      border: 5px solid #E4C525;
      box-shadow: 0 0 30px rgba(228, 197, 37, 0.7);
      animation: avatarFloat 3s infinite ease-in-out;
    }

    @keyframes avatarFloat {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
    }

    .fighter-avatar.attacking {
      animation: attackShake 0.5s ease;
    }

    @keyframes attackShake {
      0%, 100% { transform: rotate(0deg) scale(1); }
      25% { transform: rotate(-15deg) scale(1.2); }
      75% { transform: rotate(15deg) scale(1.2); }
    }

    .fighter-name {
      font-size: 1.8rem;
      color: #E4C525;
      margin-bottom: 0.5rem;
      text-shadow: 0 0 10px #E4C525;
    }

    .fighter-stats {
      font-size: 1rem;
      color: #B6FFFF;
      margin-bottom: 1rem;
    }

    .health-bar-container {
      width: 100%;
      background: #282828;
      border-radius: 20px;
      overflow: hidden;
      border: 2px solid #E4C525;
      height: 40px;
    }

    .health-bar {
      height: 100%;
      background: linear-gradient(90deg, #00ff00, #ffff00, #ff0000);
      transition: width 0.8s ease;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 900;
      font-size: 1.2rem;
      color: #000;
      text-shadow: 0 0 5px #fff;
    }

    .vs-section {
      text-align: center;
    }

    .vs-text {
      font-size: 5rem;
      color: #C70735;
      text-shadow: 0 0 20px #C70735;
      font-weight: 900;
    }

    .round-counter {
      font-size: 1.5rem;
      color: #E4C525;
      margin-top: 1rem;
    }

    /* Sistema de apuestas */
    .betting-section {
      background: rgba(11, 15, 25, 0.9);
      border: 3px solid #1545FD;
      border-radius: 15px;
      padding: 2rem;
      margin-bottom: 2rem;
    }

    .betting-title {
      font-size: 2rem;
      color: #E4C525;
      text-align: center;
      margin-bottom: 1.5rem;
      text-shadow: 0 0 15px #E4C525;
    }

    .betting-options {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 1.5rem;
      margin-bottom: 2rem;
    }

    .bet-option {
      background: linear-gradient(135deg, rgba(21, 69, 253, 0.4), rgba(199, 7, 53, 0.4));
      border: 2px solid #E4C525;
      border-radius: 15px;
      padding: 1.5rem;
      text-align: center;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .bet-option:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 30px rgba(228, 197, 37, 0.6);
      border-color: #B6FFFF;
    }

    .bet-option.selected {
      border: 4px solid #E4C525;
      background: linear-gradient(135deg, rgba(228, 197, 37, 0.3), rgba(182, 255, 255, 0.3));
      box-shadow: 0 0 30px rgba(228, 197, 37, 0.8);
    }

    .bet-amount-input {
      width: 100%;
      background: rgba(40, 40, 40, 0.8);
      border: 2px solid #E4C525;
      color: #fff;
      padding: 1rem;
      font-size: 1.3rem;
      border-radius: 10px;
      text-align: center;
      font-weight: 900;
      margin: 1rem 0;
    }

    .bet-btn {
      width: 100%;
      background: linear-gradient(135deg, #E4C525, #C70735);
      color: #000;
      border: none;
      padding: 1.2rem;
      font-size: 1.5rem;
      font-weight: 900;
      border-radius: 50px;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 5px 20px rgba(228, 197, 37, 0.6);
      text-transform: uppercase;
    }

    .bet-btn:hover {
      transform: scale(1.05);
      box-shadow: 0 10px 40px rgba(228, 197, 37, 1);
    }

    .bet-btn:disabled {
      opacity: 0.5;
      cursor: not-allowed;
    }

    /* Comentarios en vivo */
    .commentary-box {
      background: rgba(40, 40, 40, 0.9);
      border: 2px solid #B6FFFF;
      border-radius: 15px;
      padding: 1.5rem;
      margin-bottom: 2rem;
      max-height: 300px;
      overflow-y: auto;
    }

    .commentary-title {
      font-size: 1.5rem;
      color: #B6FFFF;
      margin-bottom: 1rem;
      text-shadow: 0 0 10px #B6FFFF;
    }

    .comment {
      background: rgba(21, 69, 253, 0.2);
      border-left: 3px solid #E4C525;
      padding: 0.8rem;
      margin-bottom: 0.8rem;
      border-radius: 8px;
      animation: slideIn 0.5s ease;
    }

    @keyframes slideIn {
      from { transform: translateX(-20px); opacity: 0; }
      to { transform: translateX(0); opacity: 1; }
    }

    .comment-time {
      color: #B6FFFF;
      font-size: 0.85rem;
      margin-right: 0.5rem;
    }

    /* Minijuegos secundarios */
    .mini-games {
      margin-top: 3rem;
      padding-top: 2rem;
      border-top: 3px solid #E4C525;
    }

    .mini-games-title {
      font-size: 2.5rem;
      color: #E4C525;
      text-align: center;
      margin-bottom: 2rem;
      text-shadow: 0 0 15px #E4C525;
    }

    .games-carousel {
      display: flex;
      gap: 1.5rem;
      overflow-x: auto;
      padding: 1rem 0;
      scroll-behavior: smooth;
    }

    .games-carousel::-webkit-scrollbar {
      height: 8px;
    }

    .games-carousel::-webkit-scrollbar-track {
      background: #282828;
      border-radius: 10px;
    }

    .games-carousel::-webkit-scrollbar-thumb {
      background: #E4C525;
      border-radius: 10px;
    }

    .game-card {
      min-width: 280px;
      background: linear-gradient(135deg, rgba(21, 69, 253, 0.3), rgba(199, 7, 53, 0.3));
      border: 2px solid #E4C525;
      border-radius: 15px;
      padding: 1.5rem;
      text-align: center;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .game-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 40px rgba(228, 197, 37, 0.6);
    }

    .game-icon {
      font-size: 4rem;
      margin-bottom: 1rem;
    }

    .game-name {
      font-size: 1.3rem;
      color: #E4C525;
      margin-bottom: 0.5rem;
    }

    /* Modal de resultado */
    .result-modal {
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0, 0, 0, 0.95);
      backdrop-filter: blur(10px);
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 1000;
      opacity: 0;
      visibility: hidden;
      transition: all 0.3s ease;
    }

    .result-modal.show {
      opacity: 1;
      visibility: visible;
    }

    .result-content {
      background: linear-gradient(135deg, #1545FD, #C70735);
      border: 5px solid #E4C525;
      border-radius: 20px;
      padding: 3rem;
      text-align: center;
      max-width: 600px;
      transform: scale(0.8);
      transition: transform 0.3s ease;
    }

    .result-modal.show .result-content {
      transform: scale(1);
    }

    .result-icon {
      font-size: 8rem;
      margin-bottom: 1rem;
    }

    .result-title {
      font-size: 3rem;
      color: #E4C525;
      text-shadow: 0 0 20px #E4C525;
      margin-bottom: 1rem;
    }

    .result-message {
      font-size: 1.5rem;
      color: #B6FFFF;
      margin-bottom: 2rem;
    }

    /* Efectos de partículas */
    .particle {
      position: fixed;
      pointer-events: none;
      z-index: 9999;
      font-size: 2rem;
      animation: particleFall 3s linear forwards;
    }

    @keyframes particleFall {
      0% {
        transform: translateY(0) rotate(0deg);
        opacity: 1;
      }
      100% {
        transform: translateY(100vh) rotate(720deg);
        opacity: 0;
      }
    }

    /* Responsive */
    @media (max-width: 768px) {
      .fighters-display {
        grid-template-columns: 1fr;
        gap: 1rem;
      }
      
      .vs-section {
        order: -1;
      }
      
      .neon-text h1 {
        font-size: 1.5rem;
      }
      
      .fighter-avatar {
        width: 150px;
        height: 150px;
        font-size: 4rem;
      }
    }
  </style>
</head>
<body>
  <!-- Verificación de edad -->
  <div class="age-verification" id="ageVerification">
    <div class="age-card">
      <h1>🦪 ¡ALTO AHÍ!</h1>
      <p><strong>¿Eres mayor de edad?</strong></p>
      <p style="font-size: 0.9rem; opacity: 0.9;">
        Porque aquí se pierden perlas, dignidad y la fe en la humanidad.<br>
        Si tu mamá te pregunta qué haces, dile que estudias biología marina.
      </p>
      <button class="age-btn" onclick="enterSite()">
        SÍ, SOY ADULTO Y ASUMO MIS MALAS DECISIONES
      </button>
    </div>
  </div>

  <!-- Fondo submarino -->
  <div class="ocean-bg" id="oceanBg"></div>

  <!-- Header -->
  <header>
    <div class="header-content">
      <div class="neon-logo">
        <div class="neon-icon">🦪</div>
        <div class="neon-text">
          <h1>LA OSTRA DURA</h1>
          <p>APUESTA Y REZA (QUE GANE TU ALMEJA)</p>
        </div>
      </div>
      <div class="balance" id="balance">5,000 💰</div>
    </div>
  </header>

  <!-- Contenedor principal -->
  <div class="container">
    <!-- Banner evento principal -->
    <div class="main-event-banner">
      <div class="live-indicator">🔴 EN VIVO</div>
      <h2>⚔️ EVENTO PRINCIPAL ⚔️</h2>
      <p style="font-size: 1.5rem; color: #B6FFFF;">
        La pelea más brutal del océano - La perdedora acaba en paella
      </p>
    </div>

    <!-- Arena de combate -->
    <div class="fight-arena">
      <h3 class="arena-title">🏟️ ARENA DE COMBATE SUBMARINO</h3>
      
      <div class="fighters-display">
        <!-- Luchador 1 -->
        <div class="fighter">
          <div class="fighter-card">
            <div class="fighter-avatar" id="fighter1">🦪</div>
            <div class="fighter-name" id="name1">ALMEJANDRO MAGNO</div>
            <div class="fighter-stats">
              🥊 Poder: 85 | 🛡️ Defensa: 78 | ⚡ Velocidad: 92
            </div>
            <div class="health-bar-container">
              <div class="health-bar" id="health1" style="width: 100%;">100 HP</div>
            </div>
          </div>
        </div>

        <!-- VS -->
        <div class="vs-section">
          <div class="vs-text">VS</div>
          <div class="round-counter" id="round">ROUND 1</div>
        </div>

        <!-- Luchador 2 -->
        <div class="fighter">
          <div class="fighter-card">
            <div class="fighter-avatar" id="fighter2">🦪</div>
            <div class="fighter-name" id="name2">PEARL HARBOR</div>
            <div class="fighter-stats">
              🥊 Poder: 88 | 🛡️ Defensa: 82 | ⚡ Velocidad: 87
            </div>
            <div class="health-bar-container">
              <div class="health-bar" id="health2" style="width: 100%;">100 HP</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Sistema de apuestas -->
      <div class="betting-section">
        <h3 class="betting-title">💰 COLOCA TU APUESTA</h3>
        
        <div class="betting-options">
          <div class="bet-option" id="betOption1" onclick="selectFighter(1)">
            <div style="font-size: 3rem;">🦪</div>
            <div style="font-size: 1.3rem; color: #E4C525; margin: 0.5rem 0;">ALMEJANDRO MAGNO</div>
            <div style="font-size: 1.1rem; color: #B6FFFF;">Cuota: x1.8</div>
          </div>
          
          <div class="bet-option" id="betOption2" onclick="selectFighter(2)">
            <div style="font-size: 3rem;">🦪</div>
            <div style="font-size: 1.3rem; color: #E4C525; margin: 0.5rem 0;">PEARL HARBOR</div>
            <div style="font-size: 1.1rem; color: #B6FFFF;">Cuota: x2.1</div>
          </div>
        </div>

        <input type="number" class="bet-amount-input" id="betAmount" value="500" min="50" max="10000" placeholder="Cantidad a apostar">
        
        <button class="bet-btn" id="startFightBtn" onclick="startFight()">
          🥊 INICIAR PELEA Y APOSTAR 🥊
        </button>
      </div>

      <!-- Comentarios en vivo -->
      <div class="commentary-box">
        <h4 class="commentary-title">📢 COMENTARIOS EN VIVO</h4>
        <div id="commentary">
          <div class="comment">
            <span class="comment-time">00:00</span>
            <span>¡Bienvenidos a La Ostra Dura! Hoy tenemos pelea de campeonato...</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Minijuegos secundarios -->
    <div class="mini-games">
      <h3 class="mini-games-title">🎰 OTROS JUEGOS PARA PERDER TU DINERO</h3>
      <div class="games-carousel">
        <div class="game-card" onclick="alert('Próximamente - Ruleta Almejil')">
          <div class="game-icon">🎯</div>
          <div class="game-name">Ruleta Almejil</div>
          <p style="color: #B6FFFF;">Rojo, Negro o Perla</p>
        </div>
        
        <div class="game-card" onclick="alert('Próximamente - Tragaperlas')">
          <div class="game-icon">🎰</div>
          <div class="game-name">Tragaperlas 777</div>
          <p style="color: #B6FFFF;">3 perlas = jackpot</p>
        </div>
        
        <div class="game-card" onclick="alert('Próximamente - Blackjack Oceánico')">
          <div class="game-icon">🃏</div>
          <div class="game-name">Blackjack Oceánico</div>
          <p style="color: #B6FFFF;">Contra el Pulpo Dealer</p>
        </div>
        
        <div class="game-card" onclick="alert('Próximamente - Carreras de Cangrejos')">
          <div class="game-icon">🦀</div>
          <div class="game-name">Carreras de Cangrejos</div>
          <p style="color: #B6FFFF;">Dopados y todo</p>
        </div>
        
        <div class="game-card" onclick="alert('Próximamente - Poker Submarino')">
          <div class="game-icon">♠️</div>
          <div class="game-name">Poker Submarino</div>
          <p style="color: #B6FFFF;">Texas Hold'em Salado</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal de resultado -->
  <div class="result-modal" id="resultModal">
    <div class="result-content">
      <div class="result-icon" id="resultIcon">🏆</div>
      <h2 class="result-title" id="resultTitle">¡GANASTE!</h2>
      <p class="result-message" id="resultMessage">Tu almeja sobrevivió para pelear otro día</p>
      <button class="bet-btn" onclick="closeResult()">ACEPTAR MI DESTINO</button>
    </div>
  </div>

  <script>
    // ============================================
    // ESTADO DEL JUEGO
    // ============================================
    let gameState = {
      balance: Number(localStorage.getItem('balance')) || 5000,
      selectedFighter: null,
      betAmount: 500,
      fightInProgress: false,
      hp1: 100,
      hp2: 100,
      round: 1,
      totalBets: Number(localStorage.getItem('totalBets')) || 0,
      wins: Number(localStorage.getItem('wins')) || 0,
      losses: Number(localStorage.getItem('losses')) || 0
    };

    // ============================================
    // NOMBRES GRACIOSOS DE ALMEJAS
    // ============================================
    const clamNames = [
      'ALMEJANDRO MAGNO', 'PEARL HARBOR', 'ALMEJA NITRO', 'CONCHA TU MADRE',
      'NAPOLEÓN BONALMEJA', 'BRUCE LEE-MEJA', 'MOHAMMED ALMEJÍ', 'ROCKY BALMEJA',
      'MIKE TISON-CHA', 'FLOYD MAYALMEJA', 'CONOR MCCONCHA', 'ANDERSON SALMEJA',
      'JON CONCHONES', 'KHABIB NURMAGOALMEJA', 'GEORGE ST-ALMEJA', 'DEMETRIOUS CONCHASON',
      'ALMEJA VELÁSQUEZ', 'FRANCIS NGANNALMEJA', 'ISRAEL ALMEJESANYA', 'KAMARU USCHAMEJA'
    ];

    const funnyStats = [
      { power: 85, defense: 78, speed: 92 },
      { power: 92, defense: 71, speed: 88 },
      { power: 88, defense: 95, speed: 75 },
      { power: 90, defense: 85, speed: 83 },
      { power: 78, defense: 88, speed: 95 }
    ];

    // ============================================
    // COMENTARIOS GRACIOSOS
    // ============================================
    const comments = {
      start: [
        '¡Señoras y señores, preparen sus carteras!',
        '¡Esta noche alguien acaba en paella!',
        'El chef ya tiene la sartén caliente...',
        '¡Que gane la almeja más salada!',
        'Recuerden: esto es más real que tu ex diciendo "solo amigos"'
      ],
      hit: [
        '¡AUCH! Eso dolió hasta en mi cuenta bancaria',
        '¡BRUTAL! Mi abuela pega más fuerte pero bueno...',
        '¡ZAS! Creo que le salió una perla del golpe',
        '¡PUM! Eso se sintió hasta en Bikini Bottom',
        '¡WHAM! Le sacó el agua salada',
        '¡BAM! Esa almeja vio estrellitas de mar',
        '¡POW! Le reventó la concha (literalmente)'
      ],
      critical: [
        '¡¡GOLPE CRÍTICO!! ¡Eso fue ILEGAL!',
        '¡¡DEVASTADOR!! ¡Llamemos a la ONU!',
        '¡¡FATALITY!! ¡Mortal Kombat se queda corto!',
        '¡¡K.O. TÉCNICO!! ¡El árbitro está llorando!',
        '¡¡DESTRUCCIÓN TOTAL!! ¡SpongeBob, apaga la tele!'
      ],
      lowHP: [
        'Esto se está poniendo feo... como mi historial de apuestas',
        'Una está sangrando... bueno, secretando líquido marino',
        '¡Esto es más tenso que mi situación financiera!',
        'Mis nervios están más fritos que la perdedora va a estar',
        'El chef ya está poniendo aceite en la sartén...'
      ],
      win: [
        '¡Y TENEMOS GANADORA! La otra ya está siendo marinada...',
        '¡VICTORIA! Aunque técnicamente ambas pierden (una su vida, otra su dinero)',
        '¡FINAL! La perdedora será servida con limón y perejil',
        '¡TERMINÓ! Alguien avise a la familia de la perdedora... o al restaurante',
        '¡K.O.! La ganadora vive para apostar (perder) otro día'
      ]
    };

    // ============================================
    // INICIALIZACIÓN
    // ============================================
    document.addEventListener('DOMContentLoaded', () => {
      createBubbles();
      updateBalance();
      randomizeFighters();
    });

    // ============================================
    // VERIFICACIÓN DE EDAD (MEJORADA)
    // ============================================
    function enterSite() {
      const verification = document.getElementById('ageVerification');
      verification.style.animation = 'fadeOut 0.5s ease';
      setTimeout(() => {
        verification.classList.add('hidden');
        addComment('Bienvenido al lado oscuro... del océano 🌊');
        addComment('Tu cuenta de ahorros nunca volverá a ser la misma 💸');
        setTimeout(() => addComment('El chef está afilando los cuchillos... 🔪'), 2000);
      }, 500);
    }

    // ============================================
    // BURBUJAS ANIMADAS
    // ============================================
    function createBubbles() {
      const container = document.getElementById('oceanBg');
      for (let i = 0; i < 30; i++) {
        const bubble = document.createElement('div');
        bubble.className = 'bubble';
        const size = Math.random() * 80 + 30;
        bubble.style.width = size + 'px';
        bubble.style.height = size + 'px';
        bubble.style.left = Math.random() * 100 + '%';
        bubble.style.animationDelay = Math.random() * 20 + 's';
        bubble.style.animationDuration = (Math.random() * 15 + 15) + 's';
        container.appendChild(bubble);
      }
    }

    // ============================================
    // ACTUALIZAR BALANCE
    // ============================================
    function updateBalance() {
      document.getElementById('balance').textContent = gameState.balance.toLocaleString() + ' 💰';
      localStorage.setItem('balance', gameState.balance);
      localStorage.setItem('totalBets', gameState.totalBets);
      localStorage.setItem('wins', gameState.wins);
      localStorage.setItem('losses', gameState.losses);
    }

    // ============================================
    // RANDOMIZAR LUCHADORES
    // ============================================
    function randomizeFighters() {
      const name1 = clamNames[Math.floor(Math.random() * clamNames.length)];
      let name2 = clamNames[Math.floor(Math.random() * clamNames.length)];
      while (name2 === name1) {
        name2 = clamNames[Math.floor(Math.random() * clamNames.length)];
      }
      
      const stats1 = funnyStats[Math.floor(Math.random() * funnyStats.length)];
      const stats2 = funnyStats[Math.floor(Math.random() * funnyStats.length)];
      
      document.getElementById('name1').textContent = name1;
      document.getElementById('name2').textContent = name2;
      
      document.querySelector('.fighter:nth-child(1) .fighter-stats').innerHTML = 
        `🥊 Poder: ${stats1.power} | 🛡️ Defensa: ${stats1.defense} | ⚡ Velocidad: ${stats1.speed}`;
      document.querySelector('.fighter:nth-child(3) .fighter-stats').innerHTML = 
        `🥊 Poder: ${stats2.power} | 🛡️ Defensa: ${stats2.defense} | ⚡ Velocidad: ${stats2.speed}`;
    }

    // ============================================
    // SELECCIONAR LUCHADOR
    // ============================================
    function selectFighter(fighter) {
      if (gameState.fightInProgress) {
        addComment('¡Espera a que termine la masacre actual! 🩸');
        return;
      }
      
      gameState.selectedFighter = fighter;
      
      document.getElementById('betOption1').classList.remove('selected');
      document.getElementById('betOption2').classList.remove('selected');
      document.getElementById('betOption' + fighter).classList.add('selected');
      
      const fighterName = fighter === 1 ? 
        document.getElementById('name1').textContent : 
        document.getElementById('name2').textContent;
      
      addComment(`Has apostado por ${fighterName}. Que los dioses del mar te protejan... 🙏`);
    }

    // ============================================
    // INICIAR PELEA
    // ============================================
    function startFight() {
      if (gameState.fightInProgress) {
        addComment('¡Ya hay una pelea en curso! ¿Quieres más sangre? 🩸');
        return;
      }
      
      const betAmount = Number(document.getElementById('betAmount').value);
      
      if (!gameState.selectedFighter) {
        showResult('❌', '¡ALTO AHÍ!', 'Tienes que elegir por cuál almeja apostar, genio');
        return;
      }
      
      if (betAmount < 50) {
        showResult('🚫', 'APUESTA RECHAZADA', 'La apuesta mínima es 50 💰. No somos una ONG');
        return;
      }
      
      if (betAmount > gameState.balance) {
        showResult('💸', 'SIN FONDOS', 'No tienes suficiente dinero. ¿Quieres vender un riñón?');
        return;
      }
      
      // Descontar apuesta
      gameState.balance -= betAmount;
      gameState.betAmount = betAmount;
      gameState.totalBets++;
      updateBalance();
      
      // Bloquear botón
      gameState.fightInProgress = true;
      document.getElementById('startFightBtn').disabled = true;
      document.getElementById('startFightBtn').textContent = '⚔️ PELEA EN CURSO ⚔️';
      
      // Resetear HP
      gameState.hp1 = 100;
      gameState.hp2 = 100;
      gameState.round = 1;
      
      updateHealthBars();
      
      // Comentario inicial
      addComment(comments.start[Math.floor(Math.random() * comments.start.length)]);
      
      setTimeout(() => {
        addComment('¡ROUND 1... FIGHT! 🔔');
        fightLoop();
      }, 1500);
    }

    // ============================================
    // LOOP DE PELEA
    // ============================================
    let fightInterval;
    
    function fightLoop() {
      let attackCount = 0;
      
      fightInterval = setInterval(() => {
        if (gameState.hp1 <= 0 || gameState.hp2 <= 0) {
          clearInterval(fightInterval);
          endFight();
          return;
        }
        
        // Determinar quien ataca
        const attacker = Math.random() > 0.5 ? 1 : 2;
        const damage = Math.floor(Math.random() * 25) + 10;
        const isCritical = Math.random() > 0.85;
        const finalDamage = isCritical ? damage * 2 : damage;
        
        // Aplicar daño
        if (attacker === 1) {
          gameState.hp2 -= finalDamage;
          document.getElementById('fighter1').classList.add('attacking');
          setTimeout(() => document.getElementById('fighter1').classList.remove('attacking'), 500);
        } else {
          gameState.hp1 -= finalDamage;
          document.getElementById('fighter2').classList.add('attacking');
          setTimeout(() => document.getElementById('fighter2').classList.remove('attacking'), 500);
        }
        
        // Actualizar barras de vida
        updateHealthBars();
        
        // Comentarios
        if (isCritical) {
          addComment(comments.critical[Math.floor(Math.random() * comments.critical.length)]);
        } else {
          addComment(comments.hit[Math.floor(Math.random() * comments.hit.length)]);
        }
        
        // Comentarios de HP bajo
        if ((gameState.hp1 < 30 || gameState.hp2 < 30) && Math.random() > 0.7) {
          addComment(comments.lowHP[Math.floor(Math.random() * comments.lowHP.length)]);
        }
        
        attackCount++;
        
        // Cambiar de round cada 6 ataques
        if (attackCount % 6 === 0) {
          gameState.round++;
          document.getElementById('round').textContent = 'ROUND ' + gameState.round;
          addComment(`¡ROUND ${gameState.round}! Esto está más reñido que mi presupuesto 💸`);
        }
        
      }, 1800);
    }

    // ============================================
    // ACTUALIZAR BARRAS DE VIDA
    // ============================================
    function updateHealthBars() {
      const hp1 = Math.max(0, gameState.hp1);
      const hp2 = Math.max(0, gameState.hp2);
      
      document.getElementById('health1').style.width = hp1 + '%';
      document.getElementById('health1').textContent = Math.round(hp1) + ' HP';
      
      document.getElementById('health2').style.width = hp2 + '%';
      document.getElementById('health2').textContent = Math.round(hp2) + ' HP';
    }

    // ============================================
    // FINALIZAR PELEA
    // ============================================
    function endFight() {
      gameState.fightInProgress = false;
      document.getElementById('startFightBtn').disabled = false;
      document.getElementById('startFightBtn').textContent = '🥊 INICIAR NUEVA PELEA 🥊';
      
      const winner = gameState.hp1 > gameState.hp2 ? 1 : 2;
      const winnerName = winner === 1 ? 
        document.getElementById('name1').textContent : 
        document.getElementById('name2').textContent;
      const loserName = winner === 1 ? 
        document.getElementById('name2').textContent : 
        document.getElementById('name1').textContent;
      
      addComment(comments.win[Math.floor(Math.random() * comments.win.length)]);
      addComment(`🏆 GANADORA: ${winnerName}`);
      addComment(`🍽️ ${loserName} será servida con ajo y perejil...`);
      
      // Determinar si el jugador ganó
      if (winner === gameState.selectedFighter) {
        const multiplier = winner === 1 ? 1.8 : 2.1;
        const winAmount = Math.floor(gameState.betAmount * multiplier);
        gameState.balance += winAmount;
        gameState.wins++;
        updateBalance();
        
        showResult(
          '🎉',
          '¡GANASTE!',
          `Tu almeja sobrevivió y ganaste ${winAmount.toLocaleString()} 💰
          
          Tu almeja vivirá para pelear otro día... o no 🦪`
        );
        createConfetti();
      } else {
        gameState.losses++;
        updateBalance();
        
        const insults = [
          'Tu almeja está siendo cocinada ahora mismo 🍳',
          'Mejor suerte la próxima... si te queda dinero 💸',
          'El chef dice que quedó deliciosa 😋',
          'Tu almeja murió con honor... o algo así 💀',
          'Al menos contribuiste a una buena cena 🍽️'
        ];
        
        showResult(
          '💀',
          '¡PERDISTE!',
          `Perdiste ${gameState.betAmount.toLocaleString()} 💰
          
          ${insults[Math.floor(Math.random() * insults.length)]}`
        );
      }
      
      // Resetear selección y randomizar nuevos luchadores
      gameState.selectedFighter = null;
      document.getElementById('betOption1').classList.remove('selected');
      document.getElementById('betOption2').classList.remove('selected');
      
      setTimeout(() => {
        randomizeFighters();
        gameState.hp1 = 100;
        gameState.hp2 = 100;
        gameState.round = 1;
        updateHealthBars();
        document.getElementById('round').textContent = 'ROUND 1';
      }, 3000);
    }

    // ============================================
    // AÑADIR COMENTARIO
    // ============================================
    function addComment(text) {
      const commentary = document.getElementById('commentary');
      const time = new Date().toLocaleTimeString('es-ES', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
      
      const comment = document.createElement('div');
      comment.className = 'comment';
      comment.innerHTML = `<span class="comment-time">${time}</span><span>${text}</span>`;
      
      commentary.insertBefore(comment, commentary.firstChild);
      
      // Limitar a 15 comentarios
      while (commentary.children.length > 15) {
        commentary.removeChild(commentary.lastChild);
      }
    }

    // ============================================
    // MODAL DE RESULTADO
    // ============================================
    function showResult(icon, title, message) {
      document.getElementById('resultIcon').textContent = icon;
      document.getElementById('resultTitle').textContent = title;
      document.getElementById('resultMessage').textContent = message;
      document.getElementById('resultModal').classList.add('show');
    }

    function closeResult() {
      document.getElementById('resultModal').classList.remove('show');
    }

    // ============================================
    // EFECTOS DE CONFETTI
    // ============================================
    function createConfetti() {
      const emojis = ['💰', '🦪', '🎉', '⭐', '💎', '🌟', '✨', '🏆', '💵', '💸'];
      
      for (let i = 0; i < 50; i++) {
        setTimeout(() => {
          const particle = document.createElement('div');
          particle.className = 'particle';
          particle.textContent = emojis[Math.floor(Math.random() * emojis.length)];
          particle.style.left = Math.random() * 100 + '%';
          particle.style.top = '-50px';
          particle.style.animationDuration = (Math.random() * 2 + 2) + 's';
          document.body.appendChild(particle);
          
          setTimeout(() => particle.remove(), 4000);
        }, i * 30);
      }
    }

    // ============================================
    // EASTER EGGS Y TRUCOS
    // ============================================
    let konamiCode = [];
    const konamiSequence = ['ArrowUp', 'ArrowUp', 'ArrowDown', 'ArrowDown', 'ArrowLeft', 'ArrowRight', 'ArrowLeft', 'ArrowRight', 'b', 'a'];

    document.addEventListener('keydown', (e) => {
      konamiCode.push(e.key);
      if (konamiCode.length > 10) konamiCode.shift();
      
      if (konamiCode.join(',') === konamiSequence.join(',')) {
        gameState.balance += 10000;
        updateBalance();
        showResult('🎮', '¡CÓDIGO KONAMI!', '¡Ganaste 10,000 💰 por ser un gamer de cultura!');
        createConfetti();
        konamiCode = [];
      }
    });

    // Truco: Ctrl + Shift + M = Money
    document.addEventListener('keydown', (e) => {
      if (e.ctrlKey && e.shiftKey && e.key === 'M') {
        gameState.balance += 5000;
        updateBalance();
        addComment('💰 Alguien encontró el truco... Silencio o te denunciamos 🤫');
        createConfetti();
      }
    });

    // ============================================
    // ESTADÍSTICAS (CONSOLA)
    // ============================================
    console.log('%c🦪 LA OSTRA DURA 🦪', 'color: #E4C525; font-size: 30px; font-weight: bold;');
    console.log('%cAPUESTA Y REZA', 'color: #B6FFFF; font-size: 20px;');
    console.log('%cTrucos secretos:', 'color: #C70735; font-size: 16px;');
    console.log('- Código Konami: ↑↑↓↓←→←→BA');
    console.log('- Ctrl + Shift + M: Dinero gratis');
    console.log('- gameState.balance = 999999 en consola (tramposo)');

    // ============================================
    // ANIMACIÓN DE FADE OUT
    // ============================================
    const style = document.createElement('style');
    style.textContent = `
      @keyframes fadeOut {
        from { opacity: 1; }
        to { opacity: 0; }
      }
    `;
    document.head.appendChild(style);
  </script>
</body>
</html>