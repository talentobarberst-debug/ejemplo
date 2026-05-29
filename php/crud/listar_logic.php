<?php
// Incluimos el archivo que contiene la configuración de la conexión a la base de datos.
// Esto nos permite usar la variable `$conn` para interactuar con la base de datos.
require_once '../../config/conexion.php';

// Creamos la consulta SQL para seleccionar todos los registros de la tabla `formulario`.
// "SELECT * FROM formulario" selecciona todas las columnas (*) de la tabla llamada "formulario".
$sql = "SELECT * FROM formulario";

// Ejecutamos la consulta SQL utilizando el método `query()` del objeto de conexión `$conn`.
// El resultado de la consulta se almacena en la variable `$result`.
$result = $conn->query($sql);

// Inicializamos un array vacío llamado `$formularios`.
// Este array se utilizará para almacenar los registros obtenidos de la base de datos.
$formularios = [];

// Verificamos si la consulta devolvió algún registro.
// `$result->num_rows` contiene el número de filas (registros) devueltos por la consulta.
// Si es mayor que 0, significa que hay al menos un registro en la tabla.
if ($result->num_rows > 0) {
    // Si hay registros, entramos en un bucle `while` para recorrer cada uno de ellos.
    // `while` es una estructura de control que ejecuta un bloque de código repetidamente mientras una condición sea verdadera.
    while ($row = $result->fetch_assoc()) {
        // `$result->fetch_assoc()` obtiene la siguiente fila del resultado como un array asociativo.
        // Un array asociativo es un tipo de array donde los elementos se acceden por claves en lugar de índices numéricos.
        // Las claves son los nombres de las columnas de la tabla (por ejemplo, 'id_for', 'nombre', 'apellido', etc.).
        // El resultado se asigna a la variable `$row` en cada iteración del bucle.

        // Añadimos el array `$row` (que representa un único registro) al array `$formularios`.
        // `[]` es la sintaxis para añadir un elemento al final de un array.
        $formularios[] = $row;
    }
}

// Cerramos la conexión a la base de datos.
// Es importante cerrar la conexión para liberar recursos del servidor.
$conn->close();

// En este punto, el array `$formularios` contiene todos los registros de la tabla `formulario`.
// Este array se puede utilizar en la vista (por ejemplo, `listar.php`) para mostrar los datos.
?>