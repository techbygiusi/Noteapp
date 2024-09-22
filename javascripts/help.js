document.addEventListener('DOMContentLoaded', function () {
    const helpIcon = document.getElementById('help-icon');
    const helpBox = document.getElementById('help-box');

    helpIcon.addEventListener('click', function () {
        helpBox.style.display = 'flex';
    });

    window.addEventListener('click', function (event) {
        if (event.target === helpBox) {
            helpBox.style.display = 'none';
        }
    });
});