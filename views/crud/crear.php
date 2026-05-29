<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Registro</title>
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
        <h1>Crear Nuevo Registro</h1>
        <form action="../../php/crud/crear_logic.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required>

            <label for="tipo_doc">Tipo de Documento:</label>
            <select id="tipo_doc" name="tipo_doc">
                <option value="CC">Cédula de Ciudadanía</option>
                <option value="PS">Pasaporte</option>
                <option value="CE">Cédula de Extranjería</option>
            </select>

            <label for="num_doc">Número de Documento:</label>
            <input type="text" id="num_doc" name="num_doc" required>

            <label for="correo">Correo Electrónico:</label>
            <input type="email" id="correo" name="correo" required>

            <label for="celular">Celular:</label>
            <input type="tel" id="celular" name="celular" required>

            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" required>

            <label for="hobby">Hobby:</label>
            <input type="text" id="hobby" name="hobby" required>

            <label for="fecha_nac">Fecha de Nacimiento:</label>
            <input type="date" id="fecha_nac" name="fecha_nac" required>

            <label for="genero">Género:</label>
            <select id="genero" name="genero">
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                <option value="Otro">Otro</option>
            </select>

            <button type="submit">Guardar</button>
        </form>
    </div>
</body>
</html>