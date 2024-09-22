document.addEventListener('DOMContentLoaded', function () {
    fetch('phpscripts/get-scripts.php')
        .then(response => response.json())
        .then(scripts => {
            const scriptList = document.getElementById('script-list');
            scripts.forEach(script => {
                const li = document.createElement('li');
                li.innerHTML = `
                    ${script}
                    <div class="button-container">
                        <button onclick="editScript('${script}')" class="edit-button">Edit</button>
                        <button type="button" onclick="copyToClipboard('${script}')" class="copy-button">Copy to clipboard</button>
                        <button onclick="deleteScript('${script}')" class="delete-button">Delete</button>
                    </div>
                `;
                scriptList.appendChild(li);
            });
        });
});

function editScript(scriptName) {
    window.location.href = `phpscripts/edit-script.php?name=${encodeURIComponent(scriptName)}`;
}