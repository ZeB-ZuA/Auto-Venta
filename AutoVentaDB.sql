

DROP DATABASE IF EXISTS AutoVentaDB;

CREATE DATABASE AutoVentaDB;

USE AutoVentaDB;

-- user table
CREATE TABLE Usuario (
    ID_Usuario INT,
    Cedula LONG,
    Correo_Electronico VARCHAR(255),
    Contraseña VARCHAR(255),
    Nombre VARCHAR(255),
    Apellido VARCHAR(255),
    Credito LONG,
    Fecha_Registro DATE
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

-- Car table 

CREATE TABLE Car(
    ID_Car INT,
    ID_Vendedor INT,
    Placa VARCHAR(255),
    Marca VARCHAR(255),
    Modelo VARCHAR(255),
    Anio INT,
    Color VARCHAR(255),
    Puertas INT,
    Cc INT,
    Transmision VARCHAR(255),
    Tipo_Combustible VARCHAR(255),
    Usado VARCHAR(255),
    Kilómetros LONG,
    Precio LONG
);

-- Favorites table

CREATE TABLE Favorites(
    ID_Car INT,
    ID_Usuario INT
);


-- Addinng primary keys

ALTER TABLE Usuario MODIFY COLUMN ID_Usuario INT AUTO_INCREMENT,
ADD PRIMARY KEY (ID_Usuario);
ALTER TABLE Rol ADD PRIMARY KEY (ID_Rol);
ALTER TABLE Usuario_Rol ADD PRIMARY KEY (ID_Usuario, ID_Rol);
ALTER TABLE Car MODIFY COLUMN ID_Car INT AUTO_INCREMENT,
ADD PRIMARY KEY (ID_Car);
ALTER TABLE Favorites ADD PRIMARY KEY (ID_Usuario, ID_Car);

-- Adding foreign keys

ALTER TABLE Usuario_Rol ADD FOREIGN KEY (ID_Usuario) REFERENCES Usuario(ID_Usuario) ON DELETE CASCADE;
ALTER TABLE Usuario_Rol ADD FOREIGN KEY (ID_Rol) REFERENCES Rol(ID_Rol) ON DELETE CASCADE;
ALTER TABLE Car ADD FOREIGN KEY (ID_Vendedor) REFERENCES Usuario(ID_Usuario) ON DELETE CASCADE;
ALTER TABLE Favorites ADD FOREIGN KEY (ID_Usuario) REFERENCES Usuario(ID_Usuario) ON DELETE CASCADE;
ALTER TABLE Favorites ADD FOREIGN KEY (ID_Car) REFERENCES Car(ID_Car) ON DELETE CASCADE;


-- Adding constraints
ALTER TABLE Usuario ADD UNIQUE (Correo_Electronico);
ALTER TABLE Car ADD UNIQUE (Placa);
















