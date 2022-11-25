import axios from 'axios';
import hljs from 'highlight.js';
import 'highlight.js/styles/vs2015.css';

async function loadScriptPreview(id) {
    axios.get('/api/scripts/' + id)
        .then(response => {
            var preview = response.data;
            var scriptPreview = document.getElementById(`preview-${id}`);
            var scriptDetails = scriptPreview.querySelector('[name="script-details"]');
            var scriptStats = scriptPreview.querySelector('[name="script-stats"]');
            var scriptThumbnail = scriptPreview.querySelector('[name="script-thumbnail"]');

            scriptDetails.innerHTML = `
            <div name="script-title" class="text-xl font-black">${preview.name}</div>
            <div name="script-description" class="text-xs truncate">${preview.description}</div>
            `;

            scriptStats.innerHTML = `
                <div name="script-views" class="text-sm">${preview.views} Views</div>
                <div name="script-author" class="text-xs truncate">${preview.author.verified ? '<i class="fa-solid fa-badge-check"></i> ' : ''}${preview.author.name}</div>
            `

            var script = preview.script;
            var lines = script.split('\n');
            var lines_to_skip = lines.length > 30 ? 15 : 0;
            var code = lines.slice(lines_to_skip).join('\n');

            scriptThumbnail.innerHTML = `<pre><code class="language-javascript">${code}</code></pre>`;
            hljs.highlightAll();


            // remove all animate-pulse classes
            scriptPreview.querySelectorAll('.animate-pulse').forEach(function(el) {
                el.classList.remove('animate-pulse');
            });

            scriptPreview.classList.add('cursor-pointer');
            scriptPreview.addEventListener('click', function() {
                window.location.href = `/script/${id}`;
            });
        }
    ).catch(error => {
        console.error(error);
    });
}

async function loadScripts() {
    axios.get('/api/scripts')
        .then(response => {
           var script_ids = response.data;
           var previewContainer = document.getElementById('preview-container');
           script_ids.forEach(function(id) {
                previewContainer.innerHTML += `<div class="shadow rounded-md p-4 max-w-sm w-full mx-auto" id="preview-${id}">
                <div class="animate-pulse flex space-x-4">
                    <div name="script-thumbnail" class="rounded-3xl bg-secondary h-48 w-96 overflow-hidden text-xs text-clip font-code"></div>
                </div>
                <div class="animate-pulse flex space-x-4" name="script-meta">
                    <div class="flex-1 space-y-4 py-1">
                        <div name="script-details" class="space-y-2 pl-3">
                            <div name="script-title" class="h-4 bg-secondary rounded w-2/3"></div>
                            <div name="script-description" class="h-4 bg-secondary rounded "></div>
                        </div>
                    </div>
                    <div class="flex-1 space-y-4 py-3">
                        <div name="script-stats" class="space-y-2 pr-3 flex flex-col place-self-end items-end content-end self-end place-content-end place-items-end">
                            <div name="script-views" class="h-4 bg-secondary rounded w-3/4"></div>
                            <div name="script-author" class="h-4 bg-secondary rounded w-1/2"></div>
                        </div>
                    </div>
                </div>
            </div>`;
           });
           script_ids.forEach(loadScriptPreview);
        }
    ).catch(error => {
        console.error(error);
    });
}

loadScripts();