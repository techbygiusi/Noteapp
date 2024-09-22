<?php
$scriptDir = __DIR__ . '/../scripts/';
$scriptName = basename($_GET['name'] ?? '');
$scriptPath = $scriptDir . $scriptName;

if (file_exists($scriptPath) && in_array(pathinfo($scriptPath, PATHINFO_EXTENSION), ['ps1','txt','bat','vbs'])) {
    $content = file_get_contents($scriptPath);
    echo $content;
} else {
    http_response_code(404);
    echo 'Data not found';
}
?>