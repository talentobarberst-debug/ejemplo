<?php
// Incluimos el archivo que contiene la configuración de la conexión a la base de datos.
// Esto nos permite usar la variable `$conn` para interactuar con la base de datos.
require_once '../../config/conexion.php';

// Verificamos si se ha recibido un parámetro 'id' a través de la URL (método GET).
// Esto ocurre cuando se hace clic en el enlace "Eliminar" en la lista de registros.
if (isset($_GET['id'])) {
    // Obtenemos el valor del parámetro 'id' de la URL.
    // Este valor representa el ID del registro que se va a eliminar.
    $id_for = $_GET['id'];

    // Creamos la consulta SQL para eliminar un registro de la tabla `formulario`.
    // Usamos un marcador de posición (?) para el valor de `id_for` para prevenir inyecciones SQL.
    // La cláusula `WHERE id_for=?` especifica qué registro se va a eliminar.
    $sql = "DELETE FROM formulario WHERE id_for=?";

    // Preparamos la consulta SQL para su ejecución.
    // Esto mejora la seguridad y el rendimiento.
    $stmt = $conn->prepare($sql);

    // Vinculamos el parámetro `$id_for` a la consulta preparada.
    // "i" indica que el parámetro es un entero (el ID del registro).
    $stmt->bind_param("i", $id_for);

    // Ejecutamos la consulta preparada.
    // Si la ejecución es exitosa, se elimina el registro.
    if ($stmt->execute()) {
        // Redirigimos al usuario a la página principal (`index.php`) con un mensaje de éxito.
        // `header()` se usa para enviar encabezados HTTP.
        // `Location:` indica la URL a la que se debe redirigir.
        // `?mensaje=` añade un parámetro a la URL para mostrar un mensaje.
        header("Location: ../../index.php?mensaje=Registro eliminado exitosamente");
    } else {
        // Si la ejecución falla, redirigimos al usuario a la página principal con un mensaje de error.
        header("Location: ../../index.php?mensaje=Error al eliminar el registro");
    }

    // Cerramos la sentencia preparada.
    // Liberamos los recursos asociados a la consulta.
    $stmt->close();

    // Cerramos la conexión a la base de datos.
    // Es importante cerrar la conexión para liberar recursos del servidor.
    $conn->close();
} else {
    // Si no se proporciona un 'id' en la URL, redirigimos al usuario a la página principal.
    // Esto evita que el script se ejecute incorrectamente si se accede directamente por la URL.
    header("Location: ../../index.php");
    // `exit()` detiene la ejecución del script.
    exit();
}
?>