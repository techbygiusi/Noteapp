<?php
$scriptDir = __DIR__ . '/../scripts/';
$allowedExtensions = ['ps1', 'txt', 'bat'];

$scripts = array_filter(scandir($scriptDir), function ($file) use ($allowedExtensions, $scriptDir) {
    $fileExtension = pathinfo($file, PATHINFO_EXTENSION);
    return in_array($fileExtension, $allowedExtensions) && is_file($scriptDir . $file);
});

echo json_encode(array_values($scripts));
?>