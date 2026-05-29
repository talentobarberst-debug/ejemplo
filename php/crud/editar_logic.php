<?php
// Incluimos el archivo que contiene la configuración de la conexión a la base de datos.
// Esto nos permite usar la variable `$conn` para interactuar con la base de datos.
require_once '../../config/conexion.php';

// Verificamos si la solicitud HTTP es de tipo POST.
// Esto significa que el formulario de edición ha sido enviado.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenemos los datos del formulario usando la superglobal `$_POST`.
    // Cada elemento de `$_POST` corresponde a un campo del formulario con el mismo nombre.
    // Incluimos el `id_for` para identificar el registro que se va a actualizar.
    $id_for = $_POST['id_for'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $tipo_doc = $_POST['tipo_doc'];
    $num_doc = $_POST['num_doc'];
    $correo = $_POST['correo'];
    $celular = $_POST['celular'];
    $direccion = $_POST['direccion'];
    $hobby = $_POST['hobby'];
    $fecha_nac = $_POST['fecha_nac'];
    $genero = $_POST['genero'];

    // Creamos la consulta SQL para actualizar un registro existente en la tabla `formulario`.
    // Usamos marcadores de posición (?) para los valores para prevenir inyecciones SQL.
    // La cláusula `WHERE id_for=?` especifica qué registro se va a actualizar.
    $sql = "UPDATE formulario SET nombre=?, apellido=?, tipo_doc=?, num_doc=?, correo=?, celular=?, direccion=?, hobby=?, fecha_nac=?, genero=?
            WHERE id_for=?";

    // Preparamos la consulta SQL para su ejecución.
    // Esto mejora la seguridad y el rendimiento.
    $stmt = $conn->prepare($sql);

    // Vinculamos los parámetros a la consulta preparada.
    // "ssssssssssi" indica el tipo de dato de cada parámetro (s = string, i = integer).
    // El último parámetro ($id_for) es un entero (el ID del registro).
    $stmt->bind_param("ssssssssssi", $nombre, $apellido, $tipo_doc, $num_doc, $correo, $celular, $direccion, $hobby, $fecha_nac, $genero, $id_for);

    // Ejecutamos la consulta preparada.
    // Si la ejecución es exitosa, se actualiza el registro.
    if ($stmt->execute()) {
        // Redirigimos al usuario a la página principal (`index.php`) con un mensaje de éxito.
        // `header()` se usa para enviar encabezados HTTP.
        // `Location:` indica la URL a la que se debe redirigir.
        // `?mensaje=` añade un parámetro a la URL para mostrar un mensaje.
        header("Location: ../../index.php?mensaje=Registro actualizado exitosamente");
    } else {
        // Si la ejecución falla, redirigimos al usuario a la página principal con un mensaje de error.
        header("Location: ../../index.php?mensaje=Error al actualizar el registro");
    }

    // Cerramos la sentencia preparada.
    // Liberamos los recursos asociados a la consulta.
    $stmt->close();

    // Cerramos la conexión a la base de datos.
    // Es importante cerrar la conexión para liberar recursos del servidor.
    $conn->close();
} else {
    // Si la solicitud no es POST (es decir, si se accede a este script directamente por la URL),
    // redirigimos al usuario a la página principal.
    header("Location: ../../index.php");
    // `exit()` detiene la ejecución del script.
    exit();
}
?>