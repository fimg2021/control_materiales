CREATE DATABASE IF NOT EXISTS control_materiales;
USE control_materiales;
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    usuario VARCHAR(50) UNIQUE,
    contraseña VARCHAR(255),
    rol ENUM('admin', 'operador') NOT NULL
);
INSERT INTO usuarios (nombre, usuario, contraseña, rol)
VALUES ('Administrador', 'admin', '$2y$10$J8nIXmf9rGxXsdcYgeS2Luqezjqb5a2VJ/Ni9NdXlsBJ4zKrL2q8a', 'admin');
-- Clave: admin123

CREATE TABLE materiales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    costo DECIMAL(10,2),
    fecha_ingreso DATE,
    stock_actual INT DEFAULT 0,
    observaciones TEXT
);

CREATE TABLE ots (
    id INT AUTO_INCREMENT PRIMARY KEY,
    codigo_ot VARCHAR(50) UNIQUE,
    descripcion TEXT,
    fecha_creacion DATE
);

CREATE TABLE entregas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    material_id INT,
    ot_id INT,
    cantidad INT,
    fecha DATE,
    entregado_por VARCHAR(100),
    FOREIGN KEY (material_id) REFERENCES materiales(id),
    FOREIGN KEY (ot_id) REFERENCES ots(id)
);
