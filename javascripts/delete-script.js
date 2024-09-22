function deleteScript(scriptName) {
    if (confirm(`Do you really want to delete "${scriptName}" ?`)) {
        fetch('phpscripts/delete-script.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                'script-name': scriptName
            })
        })
        .then(response => response.text())
        .then(result => {
            if (result === 'success') {
                setTimeout(() => {
                    location.reload();
                }, 100);
            } else {
                showMessage('Error deleting the script');
            }
        });
    }
}