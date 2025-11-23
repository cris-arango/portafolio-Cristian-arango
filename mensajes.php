<?php
if ($_GET['key'] !== '12345') die("<h1 style='color:red;text-align:center;margin-top:100px;'>Acceso denegado</h1>");
$pdo = new PDO("mysql:host=localhost;dbname=portafoliocris;charset=utf8mb4", "root", "");
$stmt = $pdo->query("SELECT * FROM mensajes ORDER BY fecha DESC");
$mensajes = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Mensajes recibidos - Cristian Arango</title>
    <style>
        body{background:#111;color:#0f0;font-family:monospace;padding:30px;}
        .msg{background:#222;margin:20px;padding:20px;border-left:5px solid #0f0;}
    </style>
</head>
<body>
    <h1>Mensajes recibidos (<?= count($mensajes) ?>)</h1>
    <?php foreach($mensajes as $m): ?>
    <div class="msg">
        <strong><?= htmlspecialchars($m['nombre']) ?></strong> 
        <small>(<?= htmlspecialchars($m['correo']) ?> - <?= $m['fecha'] ?>)</small><br><br>
        <?= nl2br(htmlspecialchars($m['mensaje'])) ?>
    </div>
    <?php endforeach; ?>
</body>
</html>