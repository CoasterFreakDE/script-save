import './bootstrap';

import Alpine from 'alpinejs';
import axios from 'axios';

window.Alpine = Alpine;

Alpine.start();


async function loadScriptPreview(id) {
    axios.get('/api/scripts/' + id)
        .then(response => {
            var preview = response.data;
            console.log(preview);
        }
    ).catch(error => {
        console.error(error);
    });
}

async function loadScripts() {
    axios.get('/api/scripts')
        .then(response => {
           var script_ids = response.data;
           script_ids.forEach(loadScriptPreview);
        }
    ).catch(error => {
        console.error(error);
    });
}


loadScripts();
