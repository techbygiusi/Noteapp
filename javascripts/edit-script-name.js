function editScriptName() {
    document.getElementById('script-name-text').style.display = 'none';
    document.getElementById('script-name-input').style.display = 'inline-block';
    
    document.getElementById('edit-button').style.display = 'none';
    document.getElementById('save-button').style.display = 'inline-block';
}

function saveScriptName() {
    const newScriptName = document.getElementById('script-name-input').value;

    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../phpscripts/update-script-name.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            if (xhr.responseText === 'success') {
                window.location.href = `edit-script.php?name=${encodeURIComponent(newScriptName)}`;
            } else {
                alert('Error updating the script name');
            }
        }
    };
    xhr.send(`old-name=${encodeURIComponent(document.getElementById('script-name-text').textContent)}&new-name=${encodeURIComponent(newScriptName)}`);
}