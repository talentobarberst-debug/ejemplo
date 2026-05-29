<?php
// Este archivo establece la conexión a la base de datos MySQL.

// Datos de conexión a la base de datos
$servername = "localhost"; // Nombre del servidor (generalmente 'localhost')
$username = "root"; // Tu nombre de usuario de la base de datos (¡REEMPLAZA!)
$password = ""; // Tu contraseña de la base de datos (¡REEMPLAZA!)
$dbname = "web_db"; // El nombre de tu base de datos (¡REEMPLAZA!)

// Crear una nueva conexión usando MySQLi (MySQL Improved Extension)
$conn = new mysqli($servername, $username, $password, $dbname);
// 'new mysqli()' crea un nuevo objeto de conexión a la base de datos.
// Se pasan los datos de conexión como argumentos.

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    // '$conn->connect_error' contiene un mensaje de error si la conexión falla.
    die("Conexión fallida: " . $conn->connect_error); // Si falla, detener el script y mostrar el error
    // 'die()' imprime un mensaje y termina la ejecución del script.
}

// Opcional: Establecer el juego de caracteres a UTF-8 para manejar caracteres especiales correctamente
$conn->set_charset("utf8");
// '$conn->set_charset("utf8")' establece el juego de caracteres de la conexión a UTF-8.
// UTF-8 es una codificación de caracteres que soporta una amplia gama de caracteres de diferentes idiomas.
?>