function copyToClipboard(scriptName) {
    fetch(`phpscripts/get-script-content.php?name=${encodeURIComponent(scriptName)}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Error loading the script');
            }
            return response.text();
        })
        .then(content => {
            const tempTextarea = document.createElement('textarea');
            tempTextarea.style.position = 'absolute';
            tempTextarea.style.left = '-9999px';
            tempTextarea.value = content;
            document.body.appendChild(tempTextarea);
            tempTextarea.select();
            document.execCommand('copy');
            document.body.removeChild(tempTextarea);
            alert('Content copied: ' + content);
        })
        .catch(error => alert('Error while copying: ' + error.message));
}