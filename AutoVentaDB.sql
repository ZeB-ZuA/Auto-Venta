
DROP DATABASE IF EXISTS AutoVentaDB;

CREATE DATABASE AutoVentaDB;

USE AutoVentaDB;

-- User table
CREATE TABLE User (
    ID_User INT,
    ID_Number LONG,
    Email VARCHAR(255),
    Password VARCHAR(255),
    First_Name VARCHAR(255),
    Last_Name VARCHAR(255),
    Credit LONG,
    Registration_Date DATE
);

-- Role table
CREATE TABLE Role(
    ID_Role INT,
    Role_Name VARCHAR(255)
);

-- User_Role table
CREATE TABLE User_Role(
    ID_User INT,
    ID_Role INT
);

-- Car table 
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
    Price LONG
);

-- Favorites table
CREATE TABLE Favorites(
    ID_Car INT,
    ID_User INT
);


-- Adding primary keys
ALTER TABLE User MODIFY COLUMN ID_User INT AUTO_INCREMENT,
ADD PRIMARY KEY (ID_User);
ALTER TABLE Role ADD PRIMARY KEY (ID_Role);
ALTER TABLE User_Role ADD PRIMARY KEY (ID_User, ID_Role);
ALTER TABLE Car MODIFY COLUMN ID_Car INT AUTO_INCREMENT,
ADD PRIMARY KEY (ID_Car);
ALTER TABLE Favorites ADD PRIMARY KEY (ID_User, ID_Car);

-- Adding foreign keys
ALTER TABLE User_Role ADD FOREIGN KEY (ID_User) REFERENCES User(ID_User) ON DELETE CASCADE;
ALTER TABLE User_Role ADD FOREIGN KEY (ID_Role) REFERENCES Role(ID_Role) ON DELETE CASCADE;
ALTER TABLE Car ADD FOREIGN KEY (ID_Seller) REFERENCES User(ID_User) ON DELETE CASCADE;
ALTER TABLE Favorites ADD FOREIGN KEY (ID_User) REFERENCES User(ID_User) ON DELETE CASCADE;
ALTER TABLE Favorites ADD FOREIGN KEY (ID_Car) REFERENCES Car(ID_Car) ON DELETE CASCADE;

-- Adding constraints
ALTER TABLE User ADD UNIQUE (Email);
ALTER TABLE Car ADD UNIQUE (Plate);

-- Inserting roles into the Role table
INSERT INTO Role (ID_Role, Role_Name) VALUES (1, 'Vendor');
INSERT INTO Role (ID_Role, Role_Name) VALUES (2, 'Buyer');
