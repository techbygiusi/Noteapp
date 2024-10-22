<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noteapp</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/colors.css">
    <link rel="stylesheet" href="styles/github.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <input type="text" id="search-bar" class="search-bar" placeholder="Search scripts..." onkeyup="filterScripts()">

        <ul id="script-list" class="sortable">
        </ul>
        <button id="add-script-btn" class="action-button">Add a new script</button>
    </div>

    <div id="add-script-form" class="add-script-container">
    <div class="add-script-content">
        <h2>Add a new script</h2>
        <form id="new-script-form" method="POST" action="phpscripts/add-script.php">
            <label>Select file type:</label>
            <div class="radio-group">
                <input type="radio" id="ps1" name="file-type" value="ps1" checked>
                <label for="ps1">.ps1</label>

                <input type="radio" id="txt" name="file-type" value="txt">
                <label for="txt">.txt</label>

                <input type="radio" id="bat" name="file-type" value="bat">
                <label for="bat">.bat</label>
            </div>
            <br><br>

            <label for="script-name">Script name:</label>
            <input type="text" id="script-name" name="script-name" required>
            <br><br>

            <label for="script-content">Script content:</label><br>
            <textarea id="script-content" name="script-content" rows="10" required></textarea>
            <br><br>

            <label for="script-note">Notes (optional):</label><br>
            <textarea id="script-note" name="script-note" rows="3"></textarea>
            <br><br>

            <button type="submit" class="action-button">Create script</button>
        </form>
    </div>
    </div>

    <a href="https://github.com/techbygiusi/ps-script" target="_blank" class="github-icon">
        <i class="fa-brands fa-github"></i>
    </a>

    <div class="version-display">
        <p>Version 1.5</p>
    </div>

    <script src="javascripts/list-scripts.js"></script>
    <script src="javascripts/copy-script.js"></script>
    <script src="javascripts/delete-script.js"></script>
    <script src="javascripts/help.js"></script>
    <script src="javascripts/search-scripts.js"></script>
    <script>
        document.getElementById('add-script-btn').addEventListener('click', function() {
            document.getElementById('add-script-form').style.display = 'flex';
        });

        window.onclick = function(event) {
            var modal = document.getElementById('add-script-form');
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        };
    </script>
</body>
</html>