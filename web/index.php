<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificación de Edad - Moluscos Maduros</title>
    <!-- Carga de Tailwind CSS para un estilo moderno y responsivo -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Configuración de Tailwind para usar la fuente Inter y algunos colores -->
    <link rel="stylesheet" href="/CSS/validaEdad.css">
</head>
<body>

    <!-- Contenedor Principal de la Comprobación de Edad -->
    <div id="age-gate-container" class="max-w-xl w-full p-8 md:p-12 bg-white rounded-xl shadow-2xl border-4 border-mollusk-blue transform transition-all duration-500 ease-in-out">

        <!-- Título y Aviso Legal -->
        <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">
            ⚠️ AVISO LEGAL ⚠️
        </h1>

        <!-- Pregunta Principal -->
        <div class="bg-ocean-dark p-4 rounded-lg mb-6">
            <h2 class="text-2xl font-bold text-white mb-2">
                🦪 ¿Tienes más de 18 años? 🦪
            </h2>
            <p class="text-lg italic text-gray-300">
                "Solo las ostras más maduras pueden soportar la presión del fondo marino"
            </p>
        </div>

        <!-- Disclaimers Temáticos -->
        <div class="text-sm space-y-2 text-gray-700 mb-8">
            <p class="font-medium text-mollusk-blue">
                🌊 Este sitio contiene apuestas de moluscos
            </p>
            <p class="font-medium text-mollusk-blue">
                🦐 Contenido solo para adultos con concha dura
            </p>
            <p class="font-medium text-mollusk-blue">
                🐚 Las almejas menores de edad están prohibidas
            </p>
        </div>

        <!-- Advertencia de Apuestas (Muy Importante) -->
        <div class="bg-yellow-100 border-l-4 border-yellow-500 p-4 rounded-lg mb-8 text-left">
            <p class="font-bold text-yellow-800 flex items-start">
                <span class="text-2xl mr-2">⚠️</span>
                Advertencia: Las apuestas pueden causar adicción y pérdida de pertenencias. El 99% de los jugadores pierde. El 1% restante miente. No apuestes lo que no puedas permitirte perder (o sí, nosotros no somos tu madre).
            </p>
        </div>

        <!-- Contenedor de Botones de Decisión -->
        <div class="flex flex-col space-y-4">
            
            <!-- Botón de Aceptación (Mayor de 18) -->
            <button id="btn-accept" class="bubble-button bg-mature-green text-white font-extrabold py-4 px-6 rounded-lg text-xl uppercase tracking-wider hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-mature-green focus:ring-opacity-50">
                ✅ Soy mayor de 18 y mi concha es dura
            </button>

            <!-- Botón de Rechazo (Menor de Edad) -->
            <button id="btn-reject" class="bubble-button bg-warning-red text-white font-extrabold py-4 px-6 rounded-lg text-xl uppercase tracking-wider hover:bg-red-600 focus:outline-none focus:ring-4 focus:ring-warning-red focus:ring-opacity-50">
                ❌ Soy un mejilloncito bebé
            </button>

        </div>

        <!-- Descargo de Responsabilidad Final -->
        <p class="mt-6 text-sm text-gray-500 italic">
            Al continuar, aceptas que tu dinero puede acabar en el fondo del océano 🌊
        </p>

        <!-- Área de Mensaje (oculta inicialmente) -->
        <div id="message-area" class="mt-8 p-4 rounded-lg hidden">
            <p id="message-text" class="text-lg font-semibold"></p>
            <!-- Botón de recarga, útil para la demo -->
            <button id="btn-reload" class="mt-4 bg-mollusk-blue text-white py-2 px-4 rounded hover:bg-blue-700 hidden">
                Volver a la Verificación
            </button>
        </div>
        
    </div>

<script src="../JS/validarEdad.js"></script>
</body>
</html>