<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$scriptName = $_POST['script-name'] ?? '';
$scriptDir = __DIR__ . '/../scripts/';
$scriptPath = $scriptDir . $scriptName;

$allowedExtensions = ['ps1', 'txt', 'bat'];
$fileExtension = pathinfo($scriptPath, PATHINFO_EXTENSION);

if (file_exists($scriptPath) && in_array($fileExtension, $allowedExtensions)) {
    if (unlink($scriptPath)) {
        echo 'success';
    } else {
        echo 'error';
    }
} else {
    echo 'error';
}
?>