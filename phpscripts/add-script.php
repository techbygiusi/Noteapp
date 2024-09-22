<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$scriptName = $_POST['script-name'] ?? '';
$scriptContent = $_POST['script-content'] ?? '';
$scriptNote = $_POST['script-note'] ?? '';
$fileType = $_POST['file-type'] ?? 'ps1';

$scriptDir = __DIR__ . '/../scripts/';
$noteFile = __DIR__ . '/../scripts/notes.json';

if (empty($scriptName) || empty($scriptContent)) {
    header('Location: ../index.php?status=error');
    exit;
}

$scriptName .= '.' . $fileType;

if (preg_match('/^[\w\-. ]+\.' . preg_quote($fileType) . '$/', $scriptName)) {
    $scriptPath = $scriptDir . $scriptName;

    if (file_exists($scriptPath)) {
        header('Location: ../index.php?status=error');
    } else {
        if (file_put_contents($scriptPath, $scriptContent) !== false) {
            if (!empty($scriptNote)) {
                $notes = [];
                if (file_exists($noteFile)) {
                    $notes = json_decode(file_get_contents($noteFile), true);
                }

                $notes[$scriptName] = $scriptNote;
                file_put_contents($noteFile, json_encode($notes));
            }
            header('Location: ../index.php?status=success');
        } else {
            header('Location: ../index.php?status=error');
        }
    }
} else {
    header('Location: ../index.php?status=error');
}
?>