function showNotification(message, type = 'success') {
    var notification = document.getElementById('notification');
    notification.className = 'notification ' + (type === 'success' ? '' : 'error');
    notification.textContent = message;
    notification.style.display = 'block';

    setTimeout(function() {
        notification.style.display = 'none';
    }, 3000);
}
