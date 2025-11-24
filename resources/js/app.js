import '../css/app.css';
import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

function updateMessage() {
    fetch('/data/messages.json')
        .then(response => response.json())
        .then(data => {
            const messages = data.messages;
            const random = messages[Math.floor(Math.random() * messages.length)];

            document.getElementById('flash-message').innerText = random;
        })
        .catch(error => console.error('Erreur fetch:', error));
}

// Premier affichage
updateMessage();

// Mise à jour automatique toutes les 5 secondes
setInterval(updateMessage, 5000);
