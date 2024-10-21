<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$scriptName = $_GET['name'] ?? '';
$scriptDir = __DIR__ . '/../scripts/';
$scriptPath = $scriptDir . $scriptName;
$noteFile = $scriptDir . 'notes.json';

$allowedExtensions = ['ps1', 'txt', 'bat'];
$fileExtension = pathinfo($scriptPath, PATHINFO_EXTENSION);

if (!in_array($fileExtension, $allowedExtensions)) {
    echo '<script>alert("Invalid file type.");</script>';
    exit;
}

$notes = [];
if (file_exists($noteFile)) {
    $notes = json_decode(file_get_contents($noteFile), true);
}

$scriptNote = $notes[$scriptName] ?? '';
$message = '';

if (file_exists($scriptPath)) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $newContent = $_POST['script-content'] ?? '';
        $newNote = $_POST['script-note'] ?? '';

        if (!empty($newContent)) {
            if (file_put_contents($scriptPath, $newContent) !== false) {
                $notes[$scriptName] = $newNote;
                file_put_contents($noteFile, json_encode($notes));
                $message = "The script and note were saved successfully.";
                $scriptNote = htmlspecialchars($newNote);
            } else {
                $message = "Error saving script.";
            }
        } else {
            $message = "No script content available to save.";
        }
    }

    $content = htmlspecialchars(file_get_contents($scriptPath));
    ?>
    <!DOCTYPE html>
    <html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit - <?php echo htmlspecialchars($scriptName); ?></title>
        <link rel="stylesheet" href="../styles/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <script>
            function copyToClipboard() {
                var copyText = document.getElementById("script-content");
                copyText.select();
                document.execCommand("copy");
                alert("Content copied: " + copyText.value);
            }

            function downloadScript() {
                var scriptName = "<?php echo htmlspecialchars($scriptName); ?>";
                window.location.href = 'download-script.php?name=' + encodeURIComponent(scriptName);
            }

            function hideMessage() {
                var messageBox = document.getElementById('message-box');
                if (messageBox) {
                    setTimeout(function() {
                        messageBox.style.display = 'none';
                    }, 1000);
                }
            }

            function updateNote() {
                var noteContent = document.getElementById("script-note").value;
            }
        </script>
    </head>
    <body onload="hideMessage()">
        <div class="edit-container">
            <h1>
                <span id="script-name-text"><?php echo htmlspecialchars($scriptName); ?></span>
                <input type="text" id="script-name-input" value="<?php echo htmlspecialchars($scriptName); ?>" style="display:none;">
                <button id="edit-button" onclick="editScriptName()">
                    <i class="fas fa-pencil-alt" id="edit-icon"></i>
                </button>
                <button id="save-button" onclick="saveScriptName()" style="display:none;">
                    <i class="fas fa-save" id="save-icon"></i>
                </button>
            </h1>
            <script src="../javascripts/edit-script-name.js"></script>
            <form method="POST">
                <label for="script-content">Script content:</label>
                <textarea id="script-content" name="script-content" rows="20" required onchange="updateNote()"><?php echo $content; ?></textarea>

                <label for="script-note">Notes (optional):</label>
                <textarea id="script-note" name="script-note" rows="3" onchange="updateNote()"><?php echo htmlspecialchars($scriptNote); ?></textarea>
                <div class="button-container">
                    <button type="button" onclick="downloadScript()" class="action-button download-button">Download</button>
                    <button type="button" onclick="copyToClipboard()" class="action-button copy-button">Copy to clipboard</button>
                    <button type="submit" class="action-button save-button">Save</button>
                    <button type="button" onclick="window.location.href='../index.php';" class="action-button back-button">Back to list</button>
                </div>
            </form>

            <?php if ($message): ?>
                <div id="message-box" class="message-box">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
        </div>
    </body>
    </html>
    <?php
} else {
    echo '<script>alert("Script not found or invalid file type.");</script>';
}