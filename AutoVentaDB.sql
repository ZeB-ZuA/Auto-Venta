
DROP DATABASE IF EXISTS AutoVentaDB;

CREATE DATABASE AutoVentaDB;

USE AutoVentaDB;


CREATE TABLE User (
    ID_User INT,
    ID_Number LONG,
    Email VARCHAR(255),
    Password VARCHAR(255),
    First_Name VARCHAR(255),
    Last_Name VARCHAR(255),
    Credit LONG,
    Registration_Date DATE,
    Rol VARCHAR(255)
);



CREATE TABLE Car(
    ID_Car INT,
    ID_Seller INT,
    Plate VARCHAR(255),
    Brand VARCHAR(255),
    Model VARCHAR(255),
    Year INT,
    Color VARCHAR(255),
    Doors INT,
    Cc INT,
    Transmission VARCHAR(255),
    Fuel_Type VARCHAR(255),
    Used VARCHAR(255),
    Kilometers LONG,
    Image VARCHAR(255),
    Price LONG,
    status VARCHAR(255)
);


CREATE TABLE Favorites(
    Plate VARCHAR(255),
    ID_User INT
);

CREATE TABLE Sales(
    ID_Sale INT,
    ID_Seller INT,
    ID_Buyer INT,
    Plate VARCHAR(255),
    Sale_Date DATE		
);


ALTER TABLE User MODIFY COLUMN ID_User INT AUTO_INCREMENT,
ADD PRIMARY KEY (ID_User);
ALTER TABLE Car MODIFY COLUMN ID_Car INT AUTO_INCREMENT,
ADD PRIMARY KEY (ID_Car);
ALTER TABLE Favorites ADD PRIMARY KEY (ID_User, Plate);
ALTER TABLE Sales MODIFY COLUMN ID_Sale INT AUTO_INCREMENT,
ADD PRIMARY KEY (ID_Sale);




ALTER TABLE Car ADD FOREIGN KEY (ID_Seller) REFERENCES User(ID_User) ON DELETE CASCADE;
ALTER TABLE Favorites ADD FOREIGN KEY (ID_User) REFERENCES User(ID_User) ON DELETE CASCADE;
ALTER TABLE Car ADD UNIQUE (Plate);
ALTER TABLE User ADD UNIQUE (Email);
CREATE INDEX idx_plate ON Car (Plate);
ALTER TABLE Favorites ADD FOREIGN KEY (Plate) REFERENCES Car(Plate) ON DELETE CASCADE;

ALTER TABLE Sales ADD FOREIGN KEY (ID_Seller) REFERENCES User(ID_User) ON DELETE CASCADE;
ALTER TABLE Sales ADD FOREIGN KEY (ID_Buyer) REFERENCES User(ID_User) ON DELETE CASCADE;
ALTER TABLE Sales ADD FOREIGN KEY (Plate) REFERENCES Car(Plate) ON DELETE CASCADE;



INSERT INTO User (ID_Number, Email, Password, First_Name, Last_Name, Credit, Registration_Date, Rol) 
VALUES (20212578106, 'Danna@danna.com', '123456', 'Danna', 'Sepulveda', 0, '2024-05-25', 'Seller');
INSERT INTO User (ID_Number, Email, Password, First_Name, Last_Name, Credit, Registration_Date, Rol) 
VALUES (20212578104, 'DannaCompradora@danna.com', '123456', 'Danna', 'Sepulveda', 0, '2024-05-25', 'Buyer');

INSERT INTO User (ID_Number, Email, Password, First_Name, Last_Name, Credit, Registration_Date, Rol) 
VALUES (20212578072, 'Luis@luis.com', '123456', 'Luis', 'Martinez', 0, '2024-03-25', 'Seller'),
(20212578073, 'Ana@ana.com', '123456', 'Ana', 'Gomez', 0, '2022-08-10', 'Seller'),
(20212578074, 'Carlos@carlos.com', '123456', 'Carlos', 'Lopez', 0, '2023-12-03', 'Seller'),
(20212578075, 'Maria@maria.com', '123456', 'Maria', 'Perez', 0, '2022-12-26', 'Seller');

INSERT INTO User (ID_Number, Email, Password, First_Name, Last_Name, Credit, Registration_Date, Rol) 
VALUES (20212578076, 'Jorge@jorge.com', '123456', 'Jorge', 'Hernandez', 0, '2023-11-15', 'Buyer'),
(20212578159, 'Laura@laura.com', '123456', 'Laura', 'Fernandez', 0, '2024-02-10', 'Buyer'),
(20212578101, 'Miguel@miguel.com', '123456', 'Miguel', 'Ramirez', 0, '2023-07-22', 'Buyer');

INSERT INTO Car (ID_Seller, Plate, Brand, Model, Year, Color, Doors, Cc, Transmission, Fuel_Type, Used, Kilometers, Image, Price, status)
VALUES 
(1, 'ABC1234', 'Toyota', 'Corolla', 2019, 'Rojo', 4, 1800, 'Automatico', 'Gasolina', 'No', 15000, '../uploads/toyotarojo.jpg', 15000, 'Disponiple'),
(1, 'XYZ5678', 'Honda', 'Civic', 2020, 'Azul', 4, 2000, 'Manual', 'Diesel', 'No', 10000, '../uploads/hondaCivic.jpg', 18000, 'Disponiple'),
(1, 'DEF9012', 'Ford', 'Fiesta', 2018, 'Blanco', 4, 1600, 'Automatico', 'Gasolina', 'si', 30000, '../uploads/fordBlanco.jpg', 12000, 'Disponiple'),
(1, 'DEF9013', 'Subaru', 'Impreza', 2023, 'Gris', 4, 1300, 'Manual', 'Gasolina', 'si', 80000, '../uploads/subaruGris.jpg', 20000, 'Disponiple');

INSERT INTO Car (ID_Seller, Plate, Brand, Model, Year, Color, Doors, Cc, Transmission, Fuel_Type, Used, Kilometers, Image, Price, status)
VALUES 
(1, 'BET528', 'BMW', 'BMW X5', 2020, 'Blanco', 4, 1600, 'Automatico', 'Gasolina', 'No', 10000, '../uploads/bmw2020.jpg', 33000, 'Disponiple'),
(1, 'ABC123', 'Audi', 'A4', 2018, 'Azul', 4, 2000, 'Automatico', 'Gasolina', 'si', 45000, '../uploads/audi a4.jpg', 28000, 'Disponible'),
(4, 'GHI789', 'Mercedes', 'C-TurboSquid', 2019, 'Gris', 4, 2500, 'Automatico', 'Gasolina', 'Sí', 30000, '../uploads/mercedesCTS.jpg', 35000, 'Disponible'),
(5, 'JKL012', 'Toyota', 'Corolla', 2020, 'Gris', 4, 1800, 'Manual', 'Gasolina', 'No', 20000, '../uploads/corolla.jpg', 22000, 'Disponible'),
(3, 'MNO345', 'Honda', 'Civic Si Sedan', 2022, 'Rojo', 4, 2000, 'Automatico', 'Gasolina', 'si', 10000, '../uploads/civicSS.jpg', 27000, 'Disponible'),
(3, 'LUX123', 'Lamborghini', 'Huracan', 2020, 'Amarillo', 2, 5200, 'Automatico', 'Gasolina', 'No', 8000, '../uploads/lambohuracan.jpg', 310000, 'Disponible'),
(4, 'VIP456', 'Porsche', '911 Carrera', 2019, 'Negro', 2, 3000, 'Manual', 'Gasolina', 'si', 25000, '../uploads/porsche911.jpg', 150000, 'Disponible'),
(5, 'ELG789', 'Tesla', 'Model S', 2022, 'Blanco', 4, 0, 'Automatico', 'Eléctrico', 'No', 5000, '../uploads/teslams.jpg', 95000, 'Disponible'),
(4, 'SAM269', 'Ferrari', 'Ferrari 812', 2021, 'Rojo', 2, 1300, 'Automatico', 'Gasolina', 'No', 12000, '../uploads/ferrari812.jpg', 382000, 'Disponiple'),
(6, 'TEC078', 'Ferrari', 'Ferrari Portofino', 2021, 'Amarillo', 2, 1100, 'Automatico', 'Gasolina', 'No', 14000, '../uploads/ferrariPortofino.jpg',238900, 'Disponiple'),
(6, 'KQJ123', 'BMW', 'Mini Cooper', 2022, 'Blanco', 2, 1100, 'Automatico', 'Gasolina', 'No', 16000, '../uploads/miniCooper.jpg',15000, 'Disponiple');




