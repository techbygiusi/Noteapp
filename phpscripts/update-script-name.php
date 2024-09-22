<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$oldName = $_POST['old-name'] ?? '';
$newName = $_POST['new-name'] ?? '';
$scriptDir = __DIR__ . '/../scripts/';

$oldPath = $scriptDir . $oldName;
$newPath = $scriptDir . $newName;

if (file_exists($oldPath)) {
    $allowedExtensions = ['ps1', 'txt', 'bat'];
    $newExtension = pathinfo($newPath, PATHINFO_EXTENSION);

    if (in_array($newExtension, $allowedExtensions)) {
        if (!file_exists($newPath)) {
            if (rename($oldPath, $newPath)) {
                echo 'success';
            } else {
                echo 'error';
            }
        } else {
            echo 'error';
        }
    } else {
        echo 'error';
    }
} else {
    echo 'error';
}
?>