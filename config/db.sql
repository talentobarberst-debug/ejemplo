-- Crea la base de datos 'web_db' si no existe.
CREATE DATABASE IF NOT EXISTS web_db;

-- Usa la base de datos 'web_db'. Esto hace que las siguientes operaciones se realicen en esta base de datos.
USE web_db;

-- Crea la tabla 'formulario' si no existe.
CREATE TABLE IF NOT EXISTS formulario (
  -- 'id_for' es la clave primaria de la tabla. Es un identificador único para cada registro.
  id_for INT(11) NOT NULL AUTO_INCREMENT,
  -- 'nombre' es una cadena de texto (VARCHAR) de hasta 100 caracteres. No puede ser NULL (debe tener un valor).
  nombre VARCHAR(100) NOT NULL,
  -- 'apellido' es una cadena de texto (VARCHAR) de hasta 100 caracteres. No puede ser NULL.
  apellido VARCHAR(100) NOT NULL,
  -- 'tipo_doc' es un tipo especial de columna (ENUM) que solo puede contener uno de los valores especificados ('CC', 'PS', 'CE').
  -- Puede ser NULL (puede no tener un valor), y si no se especifica un valor al insertar un registro, se establecerá en NULL por defecto.
  tipo_doc ENUM('CC','PS','CE') DEFAULT NULL,
  -- 'num_doc' es una cadena de texto (VARCHAR) de hasta 50 caracteres. No puede ser NULL.
  num_doc VARCHAR(50) NOT NULL,
  -- 'correo' es una cadena de texto (VARCHAR) de hasta 50 caracteres. No puede ser NULL.
  correo VARCHAR(50) NOT NULL,
  -- 'celular' es una cadena de texto (VARCHAR) de hasta 50 caracteres. No puede ser NULL.
  celular VARCHAR(50) NOT NULL,
  -- 'direccion' es una cadena de texto (VARCHAR) de hasta 50 caracteres. No puede ser NULL.
  direccion VARCHAR(50) NOT NULL,
  -- 'hobby' es una cadena de texto (VARCHAR) de hasta 100 caracteres. No puede ser NULL.
  hobby VARCHAR(100) NOT NULL,
  -- 'fecha_nac' es una fecha. No puede ser NULL.
  fecha_nac DATE NOT NULL,
  -- 'genero' es un tipo especial de columna (ENUM) que solo puede contener uno de los valores especificados ('Masculino', 'Femenino', 'Otro').
  -- Puede ser NULL, y si no se especifica un valor al insertar un registro, se establecerá en NULL por defecto.
  genero ENUM('Masculino','Femenino','Otro') DEFAULT NULL,
  -- Especifica que 'id_for' es la clave primaria de la tabla.
  PRIMARY KEY (id_for)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;