<?php
require_once '../../php/crud/listar_logic.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Registros</title>
    <link rel="stylesheet" href="../../public/css/estilos.css">
</head>
<body>
    <nav class="navbar">
        <ul>
            <li><a href="../../index.php">Inicio</a></li>
            <li><a href="listar.php">Listar Registros</a></li>
            <li><a href="crear.php">Crear Registro</a></li>
        </ul>
    </nav>
    <div class="container">
        <h1>Lista de Registros</h1>

        <?php if (isset($_GET['mensaje'])): ?>
            <div class="alert"><?php echo $_GET['mensaje']; ?></div>
        <?php endif; ?>

        <?php if (empty($formularios)): ?>
            <p>No hay registros en la base de datos.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Tipo Doc.</th>
                        <th>Num. Doc.</th>
                        <th>Correo</th>
                        <th>Celular</th>
                        <th>Dirección</th>
                        <th>Hobby</th>
                        <th>Fecha Nac.</th>
                        <th>Género</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($formularios as $formulario): ?>
                        <tr>
                            <td><?php echo $formulario['id_for']; ?></td>
                            <td><?php echo $formulario['nombre']; ?></td>
                            <td><?php echo $formulario['apellido']; ?></td>
                            <td><?php echo $formulario['tipo_doc']; ?></td>
                            <td><?php echo $formulario['num_doc']; ?></td>
                            <td><?php echo $formulario['correo']; ?></td>
                            <td><?php echo $formulario['celular']; ?></td>
                            <td><?php echo $formulario['direccion']; ?></td>
                            <td><?php echo $formulario['hobby']; ?></td>
                            <td><?php echo $formulario['fecha_nac']; ?></td>
                            <td><?php echo $formulario['genero']; ?></td>
                            <td class="actions">
                                <a href="editar.php?id=<?php echo $formulario['id_for']; ?>" class="edit">Editar</a>
                                <a href="../../php/crud/eliminar_logic.php?id=<?php echo $formulario['id_for']; ?>" class="delete" onclick="return confirm('¿Estás seguro de eliminar este registro?')">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>