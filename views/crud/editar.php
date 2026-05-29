<?php
// Incluimos el archivo que contiene la configuración de la conexión a la base de datos.
// Esto nos permite usar la variable `$conn` para interactuar con la base de datos.
require_once '../../config/conexion.php';

// Verificamos si se ha recibido un parámetro 'id' a través de la URL (método GET).
// Esto ocurre cuando se hace clic en el enlace "Editar" en la lista de registros.
if (isset($_GET['id'])) {
    // Obtenemos el valor del parámetro 'id' de la URL.
    // Este valor representa el ID del registro que se va a editar.
    $id_for = $_GET['id'];

    // Creamos la consulta SQL para seleccionar el registro de la tabla 'formulario'
    // cuyo 'id_for' coincide con el valor de $id_for.
    // Usamos un marcador de posición (?) para el valor de $id_for para prevenir inyecciones SQL.
    $sql = "SELECT * FROM formulario WHERE id_for = ?";

    // Preparamos la consulta SQL para su ejecución.
    // Esto mejora la seguridad y el rendimiento.
    $stmt = $conn->prepare($sql);

    // Vinculamos el parámetro $id_for a la consulta preparada.
    // "i" indica que el parámetro es un entero (el ID del registro).
    $stmt->bind_param("i", $id_for);

    // Ejecutamos la consulta preparada.
    $stmt->execute();

    // Obtenemos el resultado de la consulta.
    $result = $stmt->get_result();

    // Verificamos si la consulta devolvió exactamente una fila (un registro).
    if ($result->num_rows == 1) {
        // Si se encontró un registro, lo obtenemos como un array asociativo.
        // Un array asociativo es un array donde los elementos se acceden por claves (nombres de las columnas).
        $formulario = $result->fetch_assoc();
    } else {
        // Si no se encontró un registro con el ID proporcionado,
        // redirigimos al usuario a la página 'listar.php' con un mensaje de error.
        header("Location: listar.php?mensaje=Registro no encontrado");
        // Detenemos la ejecución del script.
        exit();
    }

    // Cerramos la sentencia preparada.
    $stmt->close();

    // Cerramos la conexión a la base de datos.
    $conn->close();
} else {
    // Si no se proporciona un 'id' en la URL,
    // redirigimos al usuario a la página 'listar.php'.
    header("Location: listar.php");
    // Detenemos la ejecución del script.
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Registro</title>
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
        <h1>Editar Registro</h1>

        <form action="../../php/crud/editar_logic.php" method="POST">
            <input type="hidden" name="id_for" value="<?php echo $formulario['id_for']; ?>">

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($formulario['nombre']); ?>" required>

            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" value="<?php echo htmlspecialchars($formulario['apellido']); ?>" required>

            <label for="tipo_doc">Tipo de Documento:</label>
            <select id="tipo_doc" name="tipo_doc">
                <option value="CC" <?php if ($formulario['tipo_doc'] == 'CC') echo 'selected'; ?>>Cédula de Ciudadanía</option>
                <option value="PS" <?php if ($formulario['tipo_doc'] == 'PS') echo 'selected'; ?>>Pasaporte</option>
                <option value="CE" <?php if ($formulario['tipo_doc'] == 'CE') echo 'selected'; ?>>Cédula de Extranjería</option>
            </select>

            <label for="num_doc">Número de Documento:</label>
            <input type="text" id="num_doc" name="num_doc" value="<?php echo htmlspecialchars($formulario['num_doc']); ?>" required>

            <label for="correo">Correo Electrónico:</label>
            <input type="email" id="correo" name="correo" value="<?php echo htmlspecialchars($formulario['correo']); ?>" required>

            <label for="celular">Celular:</label>
            <input type="tel" id="celular" name="celular" value="<?php echo htmlspecialchars($formulario['celular']); ?>" required>

            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" value="<?php echo htmlspecialchars($formulario['direccion']); ?>" required>

            <label for="hobby">Hobby:</label>
            <input type="text" id="hobby" name="hobby" value="<?php echo htmlspecialchars($formulario['hobby']); ?>" required>

            <label for="fecha_nac">Fecha de Nacimiento:</label>
            <input type="date" id="fecha_nac" name="fecha_nac" value="<?php echo htmlspecialchars($formulario['fecha_nac']); ?>" required>

            <label for="genero">Género:</label>
            <select id="genero" name="genero">
                <option value="Masculino" <?php if ($formulario['genero'] == 'Masculino') echo 'selected'; ?>>Masculino</option>
                <option value="Femenino" <?php if ($formulario['genero'] == 'Femenino') echo 'selected'; ?>>Femenino</option>
                <option value="Otro" <?php if ($formulario['genero'] == 'Otro') echo 'selected'; ?>>Otro</option>
            </select>

            <button type="submit">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>