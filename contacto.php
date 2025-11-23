<?php
$mensaje = "";
if ($_POST) {
    $nombre = trim($_POST['nombre'] ?? '');
    $correo = trim($_POST['correo'] ?? '');
    $texto  = trim($_POST['mensaje'] ?? '');

    if ($nombre === "" || $correo === "" || $texto === "") {
        $mensaje = "Todos los campos son obligatorios.";
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $mensaje = "El correo electrónico no es válido.";
    } else {
        try {
            // CAMBIAR AQUÍ SI ESTÁS EN 000WEBHOST
            $pdo = new PDO("mysql:host=sql201.epizy.com;dbname=if0_40470116_mensajes_db;charset=utf8mb4", "if0_40470116_cristian", "TU_CONTRASEÑA_AQUÍ");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = "INSERT INTO mensajes (nombre, correo, mensaje) VALUES (?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$nombre, $correo, $texto]);
            
            header("Location: gracias.php");
            exit();
        } catch (Exception $e) {
            $mensaje = "Error al enviar el mensaje. Intenta más tarde.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Cristian Arango</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="contenedor formulario">
        <h2>Contacto profesional</h2>
        <?php if ($mensaje): ?>
            <p class="error"><?= htmlspecialchars($mensaje) ?></p>
        <?php endif; ?>

        <form method="POST">
            <input type="text" name="nombre" placeholder="Nombre completo" required value="<?= htmlspecialchars($nombre ?? '') ?>">
            <input type="email" name="correo" placeholder="tu@correo.com" required value="<?= htmlspecialchars($correo ?? '') ?>">
            <textarea name="mensaje" placeholder="Escribe tu mensaje aquí..." required><?= htmlspecialchars($texto ?? '') ?></textarea>
            <button type="submit">Enviar mensaje</button>
        </form>
        <a href="index.html" class="btn">← Volver al inicio</a>
    </div>
</body>
</html>