// ============================================
// ESTADO DEL JUEGO (Simulando Zustand/Stores)
// ============================================
let gameState = {
    balance: Number(localStorage.getItem('balance')) || 5000, 
    selectedFighter: null,
    betAmount: 500,
    fightInProgress: false,
    hp1: 100,
    hp2: 100,
    round: 1,
    fighter1Name: '',
    fighter2Name: '',
    fighter1Stats: {},
    fighter2Stats: {}
};

// ============================================
// DATOS DE COMBATE (Nombres y Stats)
// ============================================
const clamNames = [
    'ALMEJANDRO MAGNO', 'PEARL HARBOR', 'ALMEJA NITRO', 'CONCHA TU MADRE',
    'NAPOLEÓN BONALMEJA', 'BRUCE LEE-MEJA', 'MOHAMMED ALMEJÍ', 'ROCKY BALMEJA',
    'MIKE TISON-CHA', 'FLOYD MAYALMEJA', 'CONOR MCCONCHA', 'ANDERSON SALMEJA',
    'JON CONCHONES', 'KHABIB NURMAGOALMEJA', 'GEORGE ST-ALMEJA', 'DEMETRIOUS CONCHASON',
    'ALMEJA VELÁSQUEZ', 'FRANCIS NGANNALMEJA', 'ISRAEL ALMEJESANYA', 'KAMARU USCHAMEJA',
    'TONY FERGUSALAMEJA', 'CHARLES CONCHAVEIRA', 'DUSTIN POIRIER-LA', 'JUSTIN GAETHJEJA',
    'ALJAMAIN CONCHALING', 'SEAN OSALMEJA', 'MERAB DVALISHVALMEJA', 'ILIA TOPURIEJA'
];

const funnyStats = [
    { power: 85, defense: 78, speed: 92 },
    { power: 92, defense: 71, speed: 88 },
    { power: 88, defense: 95, speed: 75 },
    { power: 90, defense: 85, speed: 83 },
    { power: 78, defense: 88, speed: 95 },
    { power: 94, defense: 76, speed: 89 },
    { power: 82, defense: 91, speed: 86 }
];

// ============================================
// COMENTARIOS EXPANDIDOS DEL PULPO LOCUTOR
// ============================================
const comments = {
    start: [
        '🎙️ ¡Buenas noches! Soy el Pulpo Locutor y esto es LA OSTRA DURA - Apuesta y Reza',
        '🎙️ ¡Preparen sus billeteras porque hoy alguien se va a la paella! El chef ya está afilando los cuchillos.',
        '🎙️ ¡Bienvenidos al show más salado del océano! Que gane la almeja más cabreada.',
        '🎙️ Recuerden: esto es más real que las promesas de tu ex. ¡Las apuestas están abiertas!',
        '🎙️ La tensión se corta con un cuchillo... que después usaremos para cortar el limón. ¡Apostar, apostar!',
        '🎙️ El ambiente es espeso. ¡La adrenalina está por las conchas!'
    ],
    beforeFight: [
        '🥊 Las luchadoras están en posición... ¡Esto va a doler! El árbitro es un caracol, no esperen rapidez.',
        '🥊 Ambas se miran fijamente. El odio es palpable. ¡Ojalá la mía gane!',
        '🥊 El público huele a salitre y a deudas. ¡Todo en orden para empezar!',
        '🥊 Últimas apuestas antes de que suene la campana. No miren a sus cuentas, miren a la almeja.'
    ],
    hit: [
        '💥 ¡AUCH! Eso dolió hasta en mi cuenta bancaria',
        '💥 ¡BRUTAL! Mi abuela pega más fuerte pero bueno, es una almeja...',
        '💥 ¡ZAS! Creo que le salió una perla del golpe',
        '💥 ¡PUM! Eso se sintió hasta en Bikini Bottom',
        '💥 ¡WHAM! Le sacó el agua salada del cuerpo',
        '💥 ¡BAM! Esa almeja vio estrellitas de mar',
        '💥 ¡CLASH! El público está de pie gritando (o eso creo).'
    ],
    critical: [
        '🔥🔥🔥 ¡¡GOLPE CRÍTICO!! ¡ESO FUE ILEGAL EN TODOS LOS OCÉANOS!',
        '🔥🔥🔥 ¡¡DEVASTADOR!! ¡ALGUIEN LLAME A LA ONU!',
        '🔥🔥🔥 ¡¡FATALITY!! ¡MORTAL KOMBAT SE QUEDA CORTO!',
        '🔥🔥🔥 ¡¡DESTRUCCIÓN TOTAL!! ¡BOB ESPONJA, APAGA LA TELE!'
    ],
    lowHP: [
        '😰 Esto se está poniendo feo... como mi historial de apuestas',
        '😰 Una está secretando líquido marino... eso es sangre, ¿verdad?',
        '😰 ¡Esto es más tenso que mi situación financiera!',
        '😰 El chef ya está poniendo aceite en la sartén. ¡Huele delicioso!',
        '😰 Mis nervios están más fritos que la perdedora va a estar. ¡No te rindas!',
    ],
    round: [
        '🔔 ¡Suena la campana! Round {round} comienza AHORA. ¡El árbitro está en shock!',
        '🔔 Round {round} - ¿Quién sobrevivirá? ¡Apuesten sus riñones! El público está enardecido.',
        '🔔 ¡Round {round}! Entramos en la recta final. El olor a derrota es intenso...',
    ],
    dodge: [
        '👀 ¡Increíble esquive! Tiene reflejos de gato marino. ¡Por poco!',
        '👀 ¡Se agachó justo a tiempo! El instinto de supervivencia es real.',
        '👀 ¡QUÉ AGILIDAD! Yo ni puedo bajar por las escaleras sin tropezar. ¡Movimiento Matrix!',
    ],
    win: [
        '🏆 ¡Y TENEMOS GANADORA! La otra ya está siendo marinada... ¡Felicidades, Cliente!',
        '🏆 ¡VICTORIA ÉPICA! El chef está llorando de alegría. ¡Qué gran paella saldrá de ahí!',
        '🏆 ¡FINAL! La perdedora será servida con limón y perejil. Alguien avise a su familia...',
        '🏆 ¡K.O.! La ganadora vive para apostar (perder) otro día. ¡El público enloquece!',
    ],
    chef: [
        '👨‍🍳 El chef comenta: "Ya tengo la receta lista... le pondré una pizca de alevosía."',
        '👨‍🍳 El chef afila los cuchillos con una sonrisa macabra. ¡Qué perturbador!',
        '👨‍🍳 Chef: "Con un toque de limón quedará perfecta. ¡Cuidado con el espectáculo!"'
    ],
    audience: [
        '👥 ¡El público está enloquecido! Están lanzando perlas al ring. ¡Son de verdad!',
        '👥 ¡La multitud corea el nombre de su favorita! ¡Yuju!',
        '👥 ¡Alguien desmayó en las gradas! Demasiada emoción... o demasiado alcohol.',
        '👥 ¡El público exige MÁS VIOLENCIA! ¡Vándalos!',
    ]
};

// ============================================
// UTILS
// ============================================

/** Añade un comentario al feed con efecto de máquina de escribir (useTypingEffect.ts). */
function addCommentTyping(text, speed, shout = false, className = '') {
    const commentaryBox = document.getElementById('commentary');
    const newCommentDiv = document.createElement('div');
    newCommentDiv.className = `comment ${shout ? 'shout' : ''} ${className}`;
    newCommentDiv.innerHTML = `<span class="comment-time">${new Date().toLocaleTimeString('es-ES', { hour12: false })}</span> <span class="comment-text" id="typing-${Date.now()}"></span>`;
    
    commentaryBox.prepend(newCommentDiv); 
    commentaryBox.scrollTop = 0; 
    
    const typingSpan = document.getElementById(newCommentDiv.querySelector('.comment-text').id);
    let i = 0;
    
    function type() {
        if (i < text.length) {
            typingSpan.textContent += text.charAt(i);
            i++;
            setTimeout(type, speed);
        } else {
            typingSpan.removeAttribute('id'); 
        }
    }
    type();
}

/** Añade un comentario instantáneo al feed */
function addComment(text, shout = false, className = '') {
    const commentaryBox = document.getElementById('commentary');
    const newCommentDiv = document.createElement('div');
    newCommentDiv.className = `comment ${shout ? 'shout' : ''} ${className}`;
    newCommentDiv.innerHTML = `<span class="comment-time">${new Date().toLocaleTimeString('es-ES', { hour12: false })}</span> <span class="comment-text">${text}</span>`;
    commentaryBox.prepend(newCommentDiv);
    commentaryBox.scrollTop = 0; 
}

// ============================================
// INICIALIZACIÓN
// ============================================
document.addEventListener('DOMContentLoaded', () => {
    createBubbles(); 
    updateBalance();

    // Cargar las imágenes de las criaturas desde el atributo data-criaturas (llenado por PHP)
    try {
        const imgDataEl = document.getElementById('img-data-container');
        if (imgDataEl && imgDataEl.dataset && imgDataEl.dataset.criaturas) {
            const names = JSON.parse(imgDataEl.dataset.criaturas || '[]');
            if (names && names.length) {
                // Prefijar la ruta relativa correcta desde `src/web/` hacia `src/assets/images/`
                fighterImages = names.map(n => '../assets/images/' + n);
            }
        }
    } catch (e) {
        console.warn('No se pudo cargar lista de imágenes locales, se usarán placeholders.', e);
    }

    randomizeFighters();
    document.getElementById('commentary').innerHTML = '';

    if (localStorage.getItem('balance')) {
        addCommentTyping('🎙️ ¡El Pulpo Locutor te extrañó! Bienvenido de vuelta, adicto. 😈', 80);
    } else {
        addCommentTyping('🎙️ ¡Bienvenido, novato! Lee el aviso de edad, ¡es importante para tu salud mental! 😈', 80);
    }
});

// ============================================
// VERIFICACIÓN DE EDAD
// ============================================
function enterSite() {
    const verification = document.getElementById('ageVerification');
    verification.style.animation = 'fadeOut 0.5s ease';
    setTimeout(() => {
        verification.classList.add('hidden');
        addCommentTyping('💸 Tu cuenta de ahorros nunca volverá a ser la misma. ¡Apostar!', 100);
    }, 500);
}

function rejectAccess() {
    const messages = [
        '👮 ¡DECISIÓN CORRECTA! Huye a ver Peppa Pig.',
        '🏃 Vete a ver dibujitos mejor, aquí hay sangre (o líquido marino).',
        '🚪 Sal de aquí y no vuelvas nunca, salvaste tu aguinaldo.',
    ];
    
    alert(messages[Math.floor(Math.random() * messages.length)]);
    
    // Redirigir a un sitio inofensivo/gracioso (HU-01)
    setTimeout(() => {
        window.location.href = 'https://www.youtube.com/watch?v=kYvznlC_65w'; 
    }, 500);
}

// ============================================
// ANIMACIONES
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
// ESTADO Y LUCHADORES
// ============================================
function updateBalance() {
    document.getElementById('balance').textContent = gameState.balance.toLocaleString('es-ES') + ' 💰';
    localStorage.setItem('balance', gameState.balance); 
}

function randomizeFighters() {
    // Elegir nombres únicos
    const name1 = clamNames[Math.floor(Math.random() * clamNames.length)];
    let name2 = clamNames[Math.floor(Math.random() * clamNames.length)];
    while (name2 === name1) {
        name2 = clamNames[Math.floor(Math.random() * clamNames.length)];
    }
    
    // Elegir stats aleatorios
    const stats1 = funnyStats[Math.floor(Math.random() * funnyStats.length)];
    const stats2 = funnyStats[Math.floor(Math.random() * funnyStats.length)];
    
    gameState.fighter1Name = name1;
    gameState.fighter2Name = name2;
    gameState.fighter1Stats = stats1;
    gameState.fighter2Stats = stats2;
    
    document.getElementById('name1').textContent = name1;
    document.getElementById('name2').textContent = name2;
    document.getElementById('betName1').textContent = name1;
    document.getElementById('betName2').textContent = name2;
    
    document.getElementById('stats1').innerHTML = 
        `🥊 P: ${stats1.power} | 🛡️ D: ${stats1.defense} | ⚡ V: ${stats1.speed}`;
    document.getElementById('stats2').innerHTML = 
        `🥊 P: ${stats2.power} | 🛡️ D: ${stats2.defense} | ⚡ V: ${stats2.speed}`;

    // Resetear selección y HP visual
    gameState.selectedFighter = null;
    document.getElementById('betOption1').classList.remove('selected');
    document.getElementById('betOption2').classList.remove('selected');
    
    document.getElementById('health1').style.width = '100%';
    document.getElementById('health2').style.width = '100%';
    document.getElementById('health1').textContent = '100 HP';
    document.getElementById('health2').textContent = '100 HP';
}

// ============================================
// SELECCIÓN Y APUESTA
// ============================================
function selectFighter(fighter) {
    if (gameState.fightInProgress) {
        addComment('⚠️ ¡Espera a que termine la masacre actual! 🩸');
        return;
    }
    
    gameState.selectedFighter = fighter;
    
    document.getElementById('betOption1').classList.remove('selected');
    document.getElementById('betOption2').classList.remove('selected');
    document.getElementById('betOption' + fighter).classList.add('selected');
    
    const fighterName = fighter === 1 ? gameState.fighter1Name : gameState.fighter2Name;
    addCommentTyping(`💰 Has seleccionado a ${fighterName}. ¡Apuesta y Reza!`, 50);
}

function startFight() {
    if (gameState.fightInProgress) return;
    
    const betAmountInput = document.getElementById('betAmount');
    const betAmount = Number(betAmountInput.value);
    
    if (!gameState.selectedFighter) {
        showResult('❌', '¡ALTO AHÍ!', 'Tienes que elegir por cuál almeja apostar, genio 🤦‍♂️');
        return;
    }
    
    if (betAmount < 50 || isNaN(betAmount) || betAmount > 10000) {
        showResult('🚫', 'APUESTA RECHAZADA', 'La apuesta debe ser entre 50 y 10,000 💰. ¡Juega limpio!');
        return;
    }
    
    if (betAmount > gameState.balance) {
        showResult('💸', 'SIN FONDOS', `No tienes suficiente dinero. ¡Recarga!`);
        return;
    }
    
    // Descontar apuesta (HU-02)
    gameState.balance -= betAmount;
    gameState.betAmount = betAmount;
    updateBalance();
    
    // Bloquear controles y resetear estado
    gameState.fightInProgress = true;
    document.getElementById('startFightBtn').disabled = true;
    document.getElementById('startFightBtn').textContent = '⚔️ PELEA EN CURSO ⚔️';
    
    gameState.hp1 = 100;
    gameState.hp2 = 100;
    gameState.round = 1;
    updateHealthBars();
    document.getElementById('round').textContent = 'PREPARANDO...';
    document.getElementById('commentary').innerHTML = '';
    
    // Secuencia de comentarios pre-pelea
    addCommentTyping(comments.start[Math.floor(Math.random() * comments.start.length)], 80);
    setTimeout(() => addCommentTyping(comments.beforeFight[Math.floor(Math.random() * comments.beforeFight.length)], 70), 4000);
    setTimeout(() => {
        addComment('🔔 ¡ROUND 1... FIGHT! 💀', true);
        document.getElementById('round').textContent = 'ROUND 1';
        fightLoop(); 
    }, 6000);
}

// ============================================
// LOOP DE PELEA
// ============================================
let fightInterval;

function fightLoop() {
    fightInterval = setInterval(() => {
        if (gameState.hp1 <= 0 || gameState.hp2 <= 0) {
            clearInterval(fightInterval);
            endFight();
            return;
        }

        const attacker = Math.random() > 0.5 ? 1 : 2;
        const target = attacker === 1 ? 2 : 1;
        
        const statsAttacker = attacker === 1 ? gameState.fighter1Stats : gameState.fighter2Stats;
        const statsTarget = target === 1 ? gameState.fighter1Stats : gameState.fighter2Stats;

        // Cálculo de Daño
        let baseDamage = Math.floor(Math.random() * 15) + 10;
        baseDamage += Math.floor(statsAttacker.power / 10);
        
        const defenseModifier = statsTarget.defense / 100;
        let finalDamage = Math.round(baseDamage * (1 - defenseModifier * 0.4));
        
        const isCritical = Math.random() > 0.85;
        // Velocidad vs Potencia para esquivar
        const isDodge = Math.random() > (0.95 - (statsTarget.speed / 200)); 
        
        if (isCritical) {
            finalDamage *= 2;
        }

        if (!isDodge) {
            if (target === 1) {
                gameState.hp1 -= finalDamage;
            } else {
                gameState.hp2 -= finalDamage;
            }
            animateAttack(attacker, finalDamage);
        }
        
        gameState.hp1 = Math.max(0, gameState.hp1);
        gameState.hp2 = Math.max(0, gameState.hp2);

        updateHealthBars();
        
        // Generar comentarios dinámicos
        setTimeout(() => {
            if (isDodge) {
                addCommentTyping(comments.dodge[Math.floor(Math.random() * comments.dodge.length)], 50);
            } else if (isCritical) {
                addComment(comments.critical[Math.floor(Math.random() * comments.critical.length)], true);
            } else {
                addCommentTyping(comments.hit[Math.floor(Math.random() * comments.hit.length)].replace('💥', '💥 ' + finalDamage + ' dmg!'), 40);
            }
        }, 300);
        
        // Comentarios de HP bajo, chef o público aleatorios
        if ((gameState.hp1 < 30 || gameState.hp2 < 30) && Math.random() > 0.6) {
            setTimeout(() => addCommentTyping(comments.lowHP[Math.floor(Math.random() * comments.lowHP.length)], 60), 1000);
        } else if (Math.random() > 0.85) {
            const randomComments = [...comments.audience, ...comments.chef];
            setTimeout(() => addCommentTyping(randomComments[Math.floor(Math.random() * randomComments.length)], 50), 1000);
        }
        
        // Simulación de nuevo round
        if (gameState.hp1 > 0 && gameState.hp2 > 0 && (gameState.hp1 < 80 || gameState.hp2 < 80) && Math.random() > 0.95) {
            gameState.round++;
            addComment(comments.round[Math.floor(Math.random() * comments.round.length)].replace('{round}', gameState.round), true);
            document.getElementById('round').textContent = `ROUND ${gameState.round}`;
        }
        
    }, 1500); 
}

function animateAttack(attacker, damage) {
    // El contenedor en el HTML usa id="fighter-card-1" / "fighter-card-2"
    const fighterElement = document.getElementById('fighter-card-' + attacker);
    if (!fighterElement) return; // seguridad para evitar errores si cambia el DOM
    fighterElement.classList.add('attacking');
    
    // Crear y animar daño flotante
    const damagePopup = document.createElement('div');
    damagePopup.className = 'damage-popup';
    damagePopup.textContent = `-${damage}`;
    damagePopup.style.position = 'absolute';
    damagePopup.style.top = '20%';
    damagePopup.style.left = '50%';
    damagePopup.style.transform = 'translate(-50%, -50%)';
    damagePopup.style.fontWeight = 'bold';
    damagePopup.style.fontSize = '2rem';
    damagePopup.style.textShadow = '0 0 10px black';
    damagePopup.style.color = damage >= 30 ? 'var(--color-red)' : 'white';
    damagePopup.style.animation = 'damage-fade 1s forwards';
    fighterElement.appendChild(damagePopup);
    
    // Remover clase y popup después de la animación
    setTimeout(() => {
        fighterElement.classList.remove('attacking');
        fighterElement.removeChild(damagePopup);
    }, 500);
    
    if (!document.getElementById('damage-style')) {
        const style = document.createElement('style');
        style.id = 'damage-style';
        style.innerHTML = '@keyframes damage-fade { 0% { opacity: 1; transform: translate(-50%, 0); } 100% { opacity: 0; transform: translate(-50%, -100px); } }';
        document.head.appendChild(style);
    }
}

function updateHealthBars() {
    function updateBar(hp, id) {
        const bar = document.getElementById('health' + id);
        bar.style.width = hp + '%';
        bar.textContent = `${hp} HP`;
        
        // Cambio de color visual en la barra
        let color;
        if (hp > 70) color = 'linear-gradient(90deg, #4CAF50, #90EE90)';
        else if (hp > 30) color = 'linear-gradient(90deg, #FFD700, #FFA500)';
        else color = 'linear-gradient(90deg, #FF0000, #C70735)';
        
        bar.style.background = color;
    }

    updateBar(gameState.hp1, 1);
    updateBar(gameState.hp2, 2);
}

// ============================================
// FINALIZAR PELEA
// ============================================
function endFight() {
    let winner, prize, message, resultTitle, resultIcon, modalClass = '';
    const multiplier = gameState.selectedFighter === 1 ? 1.8 : 2.1; 

    const winnerId = gameState.hp1 <= 0 && gameState.hp2 <= 0 ? 0 : (gameState.hp1 > gameState.hp2 ? 1 : 2);
    const loserId = winnerId === 1 ? 2 : 1;
    
    // Determinar si el usuario ganó su apuesta
    const userWon = winnerId === gameState.selectedFighter;
    const winningClamName = winnerId === 1 ? gameState.fighter1Name : gameState.fighter2Name;
    const losingClamName = loserId === 1 ? gameState.fighter1Name : gameState.fighter2Name;

    if (userWon) {
        prize = Math.round(gameState.betAmount * multiplier);
        gameState.balance += prize;
        resultTitle = '🎉 ¡VICTORIA DE CONCHA! 🎉';
        resultIcon = '🏆';
        message = `¡Tu almeja, ${winningClamName}, sobrevivió! Ganaste ${prize.toLocaleString('es-ES')} 💰.`;
        
        // Resaltar anuncio de victoria en el feed
        addComment(comments.win[Math.floor(Math.random() * comments.win.length)].replace('La ganadora', `¡${winningClamName} (TU ALMEJA)!`), true, 'winner');
    } else {
        prize = 0; 
        resultTitle = '💔 ¡DERROTA CRUEL! 💔';
        resultIcon = '🔪';
        message = `Tu almeja, ${losingClamName}, perdió y fue enviada a la cocina. Perdiste ${gameState.betAmount.toLocaleString('es-ES')} 💰.`;
        
        // Resaltar anuncio de derrota en el feed
        addComment(`😭 El Pulpo Locutor: ¡La almeja ${losingClamName} será el plato de fondo! ¡Adiós a tu dinero!`, true, 'shout');
    }

    gameState.fightInProgress = false;
    document.getElementById('startFightBtn').disabled = false;
    document.getElementById('startFightBtn').textContent = '🥊 INICIAR OTRA PELEA Y APOSTAR 🥊';
    updateBalance();
    
    showResult(resultIcon, resultTitle, message);
    
    setTimeout(randomizeFighters, 5000); 
}

/** Muestra el modal de resultado */
function showResult(icon, title, message) {
    document.getElementById('resultIcon').textContent = icon;
    document.getElementById('resultTitle').textContent = title;
    document.getElementById('resultMessage').textContent = message;
    
    const modal = document.getElementById('resultModal');
    modal.classList.add('show');
    
    // Limpiar clases de animación y aplicar las de victoria/derrota
    const content = document.querySelector('.result-content');
    content.className = 'result-content'; // Reset
    if (icon === '🏆') {
        content.style.borderColor = 'var(--color-gold)';
        content.style.boxShadow = '0 0 50px var(--color-gold)';
    } else {
        content.style.borderColor = 'var(--color-red)';
        content.style.boxShadow = '0 0 50px var(--color-red)';
    }
}

/** Cierra el modal de resultado */
function closeResult() {
    document.getElementById('resultModal').classList.remove('show');
}
// ============================================
// ESTADO DEL JUEGO
// ============================================

// ============================================
// RECURSOS GRÁFICOS Y DATOS (URLs de Imagenes)
// ============================================
// Lista de imágenes para los luchadores. Se inicializa vacía y se pobl
//ará desde el atributo `data-criaturas` en `index.php` al cargar el DOM.
let fighterImages = [];

const victoryImage = 'https://media.giphy.com/media/l41lUjUgLLwWrz20w/giphy.gif'; // Minion celebrando o similar
const defeatImage = 'https://i.imgur.com/5c9Qh8X.gif'; // Chef cocinando (Derrota)





// ============================================
// COMENTARIOS DEL PULPO LOCUTOR
// ============================================


// ============================================
// INICIALIZACIÓN
// ============================================
document.addEventListener('DOMContentLoaded', () => {
    updateBalance();
    randomizeFighters();
    addCommentTyping('🎙️ Iniciando transmisión... ¡Hagan sus apuestas, degenerados!', 50);
});

// ============================================
// VERIFICACIÓN DE EDAD
// ============================================
function enterSite() {
    const verification = document.getElementById('ageVerification');
    verification.style.opacity = '0';
    setTimeout(() => {
        verification.classList.add('hidden');
        addCommentTyping('💸 Nuevo apostador detectado. Preparando sistema de desplume...', 50);
    }, 500);
}

function rejectAccess() {
    alert("¡Buena decisión! Vete a ver Peppa Pig y ahorra tu dinero.");
    window.location.href = "https://www.google.com";
}

// ============================================
// FUNCIONES DEL JUEGO
// ============================================
function updateBalance() {
    document.getElementById('balance').textContent = gameState.balance.toLocaleString() + ' $';
    localStorage.setItem('balance', gameState.balance); 
}

function randomizeFighters() {
    // Nombres aleatorios
    const name1 = clamNames[Math.floor(Math.random() * clamNames.length)];
    let name2 = clamNames[Math.floor(Math.random() * clamNames.length)];
    while (name2 === name1) name2 = clamNames[Math.floor(Math.random() * clamNames.length)];
    
    // Stats aleatorios
    const stats1 = funnyStats[Math.floor(Math.random() * funnyStats.length)];
    const stats2 = funnyStats[Math.floor(Math.random() * funnyStats.length)];
    
    // Imágenes aleatorias
    const img1 = fighterImages[Math.floor(Math.random() * fighterImages.length)];
    let img2 = fighterImages[Math.floor(Math.random() * fighterImages.length)];
    while(img2 === img1) img2 = fighterImages[Math.floor(Math.random() * fighterImages.length)];

    // Guardar en estado
    gameState.fighter1Name = name1;
    gameState.fighter2Name = name2;
    gameState.fighter1Stats = stats1;
    gameState.fighter2Stats = stats2;
    
    // Actualizar DOM (Texto)
    document.getElementById('name1').textContent = name1;
    document.getElementById('name2').textContent = name2;
    document.getElementById('betName1').textContent = name1;
    document.getElementById('betName2').textContent = name2;
    
    // Actualizar DOM (Imágenes)
    document.getElementById('fighter-img-1').src = img1;
    document.getElementById('fighter-img-2').src = img2;
    document.getElementById('bet-thumb-1').src = img1;
    document.getElementById('bet-thumb-2').src = img2;
    
    // Actualizar Stats visuales
    document.getElementById('stats1').innerHTML = `Poder: ${stats1.power} | Def: ${stats1.defense}`;
    document.getElementById('stats2').innerHTML = `Poder: ${stats2.power} | Def: ${stats2.defense}`;

    // Resetear Barras
    gameState.hp1 = 100;
    gameState.hp2 = 100;
    updateHealthBars();
    
    // Resetear Selección
    gameState.selectedFighter = null;
    document.getElementById('betOption1').classList.remove('selected');
    document.getElementById('betOption2').classList.remove('selected');
}

function selectFighter(fighter) {
    if (gameState.fightInProgress) return;
    gameState.selectedFighter = fighter;
    
    document.getElementById('betOption1').classList.remove('selected');
    document.getElementById('betOption2').classList.remove('selected');
    document.getElementById('betOption' + fighter).classList.add('selected');
    
    const name = fighter === 1 ? gameState.fighter1Name : gameState.fighter2Name;
    addCommentTyping(`💰 Has seleccionado a ${name}. ¡Reza lo que sepas!`, 30);
}

function startFight() {
    if (gameState.fightInProgress) return;
    
    const betInput = document.getElementById('betAmount');
    const amount = parseInt(betInput.value);
    
    if (!gameState.selectedFighter) {
        alert("¡Elige un luchador primero! No leas la mente.");
        return;
    }
    if (isNaN(amount) || amount < 50) {
        alert("¡Apuesta mínima 50$! No seas tacaño.");
        return;
    }
    if (amount > gameState.balance) {
        alert("No tienes dinero. ¿Aceptas pagar con un riñón?");
        return;
    }
    
    gameState.betAmount = amount;
    gameState.balance -= amount;
    updateBalance();
    
    gameState.fightInProgress = true;
    document.getElementById('startFightBtn').disabled = true;
    document.getElementById('startFightBtn').innerText = "PELEA EN CURSO...";
    document.getElementById('commentary').innerHTML = "";
    
    addCommentTyping("🔔 ¡DING DING! ¡QUE COMIENCE LA MASACRE!", 50, true);
    
    fightLoop();
}

function fightLoop() {
    let interval = setInterval(() => {
        if (gameState.hp1 <= 0 || gameState.hp2 <= 0) {
            clearInterval(interval);
            endFight();
            return;
        }
        
        // Lógica de ataque simple
        const attacker = Math.random() > 0.5 ? 1 : 2;
        const damage = Math.floor(Math.random() * 20) + 5;
        const isCrit = Math.random() > 0.8;
        const finalDamage = isCrit ? damage * 2 : damage;
        
        // Animación visual
        const imgAttacker = document.getElementById(`fighter-img-${attacker}`);
        const imgVictim = document.getElementById(`fighter-img-${attacker === 1 ? 2 : 1}`);
        
        imgAttacker.classList.add('attacking');
        setTimeout(() => imgAttacker.classList.remove('attacking'), 200);
        
        if (attacker === 1) gameState.hp2 -= finalDamage;
        else gameState.hp1 -= finalDamage;
        
        // Efecto visual en víctima
        imgVictim.classList.add('hit');
        setTimeout(() => imgVictim.classList.remove('hit'), 400);
        
        updateHealthBars();
        
        // Comentarios
        if (isCrit) {
            addCommentTyping(comments.critical[Math.floor(Math.random() * comments.critical.length)], 20, true);
        } else {
            addCommentTyping(comments.hit[Math.floor(Math.random() * comments.hit.length)], 20);
        }
        
    }, 1000);
}

function updateHealthBars() {
    const hp1 = Math.max(0, gameState.hp1);
    const hp2 = Math.max(0, gameState.hp2);
    
    document.getElementById('health1').style.width = hp1 + '%';
    document.getElementById('health1').innerText = hp1 + '%';
    document.getElementById('health2').style.width = hp2 + '%';
    document.getElementById('health2').innerText = hp2 + '%';
    
    // Cambiar color si está bajo
    const bar1 = document.getElementById('health1');
    if(hp1 < 30) bar1.style.background = 'red';
    else bar1.style.background = 'linear-gradient(90deg, #00ff00, #adff2f)';
    
    const bar2 = document.getElementById('health2');
    if(hp2 < 30) bar2.style.background = 'red';
    else bar2.style.background = 'linear-gradient(90deg, #00ff00, #adff2f)';
}

function endFight() {
    gameState.fightInProgress = false;
    document.getElementById('startFightBtn').disabled = false;
    document.getElementById('startFightBtn').innerText = "¡TIRA EL DINERO! 💸";
    
    const winner = gameState.hp1 > 0 ? 1 : 2;
    const userWon = winner === gameState.selectedFighter;
    
    const modal = document.getElementById('resultModal');
    const title = document.getElementById('resultTitle');
    const msg = document.getElementById('resultMessage');
    const img = document.getElementById('resultImage');
    const content = document.querySelector('.result-content');
    
    if (userWon) {
        const winAmount = gameState.betAmount * 2;
        gameState.balance += winAmount;
        title.innerText = "¡GANASTE!";
        msg.innerText = `Tu almeja destrozó a la otra. Ganaste ${winAmount}$.`;
        img.src = victoryImage; // GIF Victoria
        content.classList.remove('lose');
        addCommentTyping("🏆 ¡TENEMOS UN GANADOR! (Y un perdedor delicioso)", 50, true);
    } else {
        title.innerText = "¡PERDISTE!";
        msg.innerText = "Tu luchador ahora es una paella. La casa agradece tu donación.";
        img.src = defeatImage; // GIF Derrota (Chef)
        content.classList.add('lose');
        addCommentTyping("👨‍🍳 El chef se lleva al perdedor...", 50, true);
    }
    updateBalance();
    
    modal.classList.add('show');
    
    // Reiniciar pelea en 3 seg despues de cerrar modal
}

function closeResult() {
    document.getElementById('resultModal').classList.remove('show');
    setTimeout(randomizeFighters, 1000);
}

// Utilidad para escribir texto
function addCommentTyping(text, speed, isShout = false) {
    const box = document.getElementById('commentary');
    const p = document.createElement('div');
    p.className = 'comment';
    if(isShout) p.classList.add('shout');
    
    box.prepend(p); // Añadir arriba
    
    let i = 0;
    function type() {
        if(i < text.length) {
            p.textContent += text.charAt(i);
            i++;
            setTimeout(type, speed);
        }
    }
    type();
}