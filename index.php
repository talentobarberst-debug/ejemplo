<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Formulario</title>
    <link rel="stylesheet" href="public/css/estilos.css">
</head>
<body>
    <nav class="navbar">
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="views/crud/listar.php">Listar Registros</a></li>
            <li><a href="views/crud/crear.php">Crear Registro</a></li>
        </ul>
    </nav>
    <div class="container">
        <h1>Bienvenido al CRUD de Formulario</h1>

        <?php if (isset($_GET['mensaje'])): ?>
            <div class="alert alert-<?php echo (strpos($_GET['mensaje'], 'exitosamente') !== false) ? 'success' : 'danger'; ?>"><?php echo $_GET['mensaje']; ?></div>
        <?php endif; ?>

        <p>Esta es una aplicación básica de CRUD (Crear, Leer, Actualizar, Eliminar) para gestionar la información del formulario.</p>

        <div class="intro-container">
            <?php if (file_exists('public/vid/intro.mp4')): ?>
                <p>Aquí tienes un video para que aprendas PHP desde cero:</p>
                <div class="intro-video-container">
                    <video controls>
                        <source src="public/vid/intro.mp4" type="video/mp4">
                        Tu navegador no soporta el tag de video.
                    </video>
                </div>
            <?php endif; ?>
            </div>
    </div>
</body>
</html>