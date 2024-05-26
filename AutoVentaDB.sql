
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
    ID_Car INT,
    ID_User INT
);



ALTER TABLE User MODIFY COLUMN ID_User INT AUTO_INCREMENT,
ADD PRIMARY KEY (ID_User);
ALTER TABLE Car MODIFY COLUMN ID_Car INT AUTO_INCREMENT,
ADD PRIMARY KEY (ID_Car);
ALTER TABLE Favorites ADD PRIMARY KEY (ID_User, ID_Car);




ALTER TABLE Car ADD FOREIGN KEY (ID_Seller) REFERENCES User(ID_User) ON DELETE CASCADE;
ALTER TABLE Favorites ADD FOREIGN KEY (ID_User) REFERENCES User(ID_User) ON DELETE CASCADE;
ALTER TABLE Favorites ADD FOREIGN KEY (ID_Car) REFERENCES Car(ID_Car) ON DELETE CASCADE;

ALTER TABLE Car ADD UNIQUE (Plate);
ALTER TABLE User ADD UNIQUE (Email);

INSERT INTO User (ID_Number, Email, Password, First_Name, Last_Name, Credit, Registration_Date, Rol) 
VALUES (20212578106, 'Danna@danna.com', '123456', 'Danna', 'Sepulveda', 0, '2024-05-25', 'Vendor');
INSERT INTO User (ID_Number, Email, Password, First_Name, Last_Name, Credit, Registration_Date, Rol) 
VALUES (20212578104, 'DannaVendedora@danna.com', '123456', 'Danna', 'Sepulveda', 0, '2024-05-25', 'Buyer');

