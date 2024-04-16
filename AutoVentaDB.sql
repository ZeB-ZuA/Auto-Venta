

DROP DATABASE IF EXISTS AutoVentaDB;

CREATE DATABASE AutoVenta;

USE AutoVenta;

-- user table
CREATE TABLE Usuario (
    ID_Usuario INT AUTO_INCREMENT,
    Cedula LONG,
    Correo_Electronico VARCHAR(255),
    Contraseña VARCHAR(255),
    Nombre VARCHAR(255),
    Apellido VARCHAR(255),
    Fecha_Registro DATETIME
);

--Rol table
CREATE TABLE Rol(
    ID_Rol INT,
    NombreRol VARCHAR(255)
);

-- Usurio_Rol table
CREATE TABLE Usuario_Rol(
    ID_Usuario INT,
    ID_Rol INT
);

-- Addinng primary keys

ALTER TABLE Usuario ADD PRIMARY KEY (ID_Usuario);
ALTER TABLE Rol ADD PRIMARY KEY (ID_Rol);
ALTER TABLE Usuario_Rol ADD PRIMARY KEY (ID_Usuario, ID_Rol); -- check


-- Adding foreign keys

ALTER TABLE Usuario_Rol ADD FOREIGN KEY (ID_Usuario) REFERENCES Usuario(ID_Usuario) ON DELETE CASCADE;
ALTER TABLE Usuario_Rol ADD FOREIGN KEY (ID_Rol) REFERENCES Usuario(ID_Rol) ON DELETE CASCADE;

-- Adding constraints
ALTER TABLE Usuario ADD UNIQUE (Correo_Electronico);


















