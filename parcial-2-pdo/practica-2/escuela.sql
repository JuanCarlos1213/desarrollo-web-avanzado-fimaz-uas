-- Crear base de datos
CREATE DATABASE IF NOT EXISTS escuela;
   CHARACTER SET utf8mb4 COLLATE utf8mb4_generalci;


USE escuela;

-- Tabla alumnos
CREATE TABLE IF NOT EXISTS alumnos (
    idAlumno INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(15) NOT NULL,
    apellido VARCHAR(10) NOT NULL,
    correo VARCHAR(50) NOT NULL UNIQUE
);

-- Tabla logs (relacionada con alumnos)
CREATE TABLE IF NOT EXISTS logs_alumnos (
    idLog INT AUTO_INCREMENT PRIMARY KEY,
    idAlumno INT NOT NULL,
    accion VARCHAR(30) NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (idAlumno) REFERENCES alumnos(idAlumno)
);
