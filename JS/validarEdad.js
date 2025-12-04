 // Obtener elementos del DOM
        const ageGateContainer = document.getElementById('age-gate-container');
        const btnAccept = document.getElementById('btn-accept');
        const btnReject = document.getElementById('btn-reject');
        const messageArea = document.getElementById('message-area');
        const messageText = document.getElementById('message-text');
        const btnReload = document.getElementById('btn-reload');

        // Función para mostrar el mensaje de resultado
        function showMessage(text, isAccepted) {
            // Ocultar la compuerta de edad y mostrar el área de mensaje
            ageGateContainer.classList.add('opacity-0', 'scale-90'); 
            setTimeout(() => {
                ageGateContainer.classList.add('hidden');
                ageGateContainer.classList.remove('opacity-0', 'scale-90'); 
                
                messageArea.classList.remove('hidden');
                messageArea.classList.add('opacity-0');
                
                messageText.textContent = text;
                
                // Aplicar estilos y animación de entrada
                if (isAccepted) {
                    messageArea.classList.add('bg-green-100', 'border-mature-green', 'text-mature-green');
                    messageArea.classList.remove('bg-red-100', 'border-warning-red', 'text-warning-red');
                    // En una app real, aquí se redirigiría o se mostraría el contenido
                    messageText.innerHTML = "¡Bienvenido, ostra madura! ✅ Tu concha es fuerte. Puedes entrar a la presión del fondo marino. (En una web real, el contenido aparecería ahora)";
                } else {
                    messageArea.classList.add('bg-red-100', 'border-warning-red', 'text-warning-red');
                    messageArea.classList.remove('bg-green-100', 'border-mature-green', 'text-mature-green');
                    messageText.innerHTML = "❌ Prohibido el paso, mejillón bebé. ¡Vuelve cuando tu concha sea dura! 🐚";
                    btnReload.classList.remove('hidden');
                }

                // Animación de aparición
                setTimeout(() => {
                    messageArea.classList.remove('opacity-0');
                    messageArea.classList.add('opacity-100');
                }, 50);

            }, 500); // Espera a que termine la animación de salida
        }

        // 1. Manejador del botón "Aceptar"
        btnAccept.addEventListener('click', () => {
            // En una aplicación real, se podría usar sessionStorage o una cookie para recordar la elección
            // localStorage.setItem('isAdult', 'true'); 
            showMessage('¡Acceso concedido!', true);
        });

        // 2. Manejador del botón "Rechazar"
        btnReject.addEventListener('click', () => {
            showMessage('Acceso denegado.', false);
        });

        // 3. Manejador del botón de recarga (solo para fines de demostración)
        btnReload.addEventListener('click', () => {
            window.location.reload();
        });

        // Se puede añadir lógica aquí para comprobar si ya han aceptado antes
            if (localStorage.getItem('isAdult') === 'true') {
        //     // Si ya aceptó, ocultar la compuerta inmediatamente y mostrar el contenido
            ageGateContainer.style.display = 'none';
        //     // ... mostrar contenido principal ...
        }