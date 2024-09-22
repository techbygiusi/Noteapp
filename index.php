<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PS by Calma Media</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/colors.css">
    <link rel="stylesheet" href="styles/help.css">
</head>
<body>
    <div class="container">
        <img src="logo.jpg" alt="Logo" class="logo">
        <h1>by <a href="https://www.calma-media.com" target="_blank" rel="noopener noreferrer">Calma Media</a></h1>
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

    <div id="help-box" class="help-box">
        <div class="help-content">
            <h2>Changelog</h2>
            <div id="changelog-content">
                <p>1.0: PS Script Release</p>
                <p>1.1: Removal of annoying alerts</p>
                <p>1.2: Introduction of the changelog</p>
                <p>1.3: Introduction of the notes function</p>
                <p>1.4: The script name can now be changed</p>
            </div>
        </div>
    </div>

    <div class="version-display">
        <p>Version 1.4</p>
    </div>

    <div class="help-icon" id="help-icon">
        ?
    </div>

    <script src="javascripts/list-scripts.js"></script>
    <script src="javascripts/copy-script.js"></script>
    <script src="javascripts/delete-script.js"></script>
    <script src="javascripts/help.js"></script>
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