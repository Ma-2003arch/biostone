import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Dans resources/js (ou un fichier JS/Vue/React)
axios.get('/api/ma-route', {
    headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
    }
});