<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Stream Deck</title>
</head>
<body>
<div class="stream-deck">
    <button class="action-button" onclick="executeAction('button1')">Action 1</button>
    <button class="action-button" onclick="executeAction('button2')">Action 2</button>
    <button class="action-button" onclick="executeAction('button3')">Action 3</button>
</div>
<script src="script.js"></script>
</body>
</html>

<?php
$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'button1':
        // Code pour l'action du bouton 1
        echo 'Action 1 exécutée';
        break;
    case 'button2':
        // Code pour l'action du bouton 2
        echo 'Action 2 exécutée';
        break;
    case 'button3':
        // Code pour l'action du bouton 3
        echo 'Action 3 exécutée';
        break;
    default:
        echo 'Action non reconnue';
        break;
}
?>
