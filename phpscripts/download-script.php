<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$scriptName = $_GET['name'] ?? '';
$scriptDir = __DIR__ . '/../scripts/';
$scriptPath = $scriptDir . $scriptName;

$allowedExtensions = ['ps1', 'txt', 'bat'];
$fileExtension = pathinfo($scriptPath, PATHINFO_EXTENSION);

if (in_array($fileExtension, $allowedExtensions) && file_exists($scriptPath)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($scriptName) . '"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($scriptPath));
    
    readfile($scriptPath);
    exit;
} else {
    echo '<script>alert("Script not found or invalid file type.");</script>';
    exit;
}
?>