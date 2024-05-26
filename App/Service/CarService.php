<?php
require_once __DIR__ . '/../Connection.php';
require_once __DIR__ . '/../Entity/Car.php';
require_once __DIR__ . '/../Repository/CarRepository.php';


class CarService implements CarRepository
{

    private $conn;

    public function __construct()
    {
        $db = new Connection();
        $this->conn = $db->connect();
    }

    private function createCarFromRow(array $row): Car
    {
        return new Car(
            $row['ID_Seller'],
            $row['Plate'],
            $row['Brand'],
            $row['Model'],
            $row['Year'],
            $row['Color'],
            $row['Doors'],
            $row['Cc'],
            $row['Transmission'],
            $row['Fuel_Type'],
            $row['Used'],
            $row['Kilometers'],
            $row['Image'],
            $row['Price'],
            $row['status']
        );
    }



    public function findBySellerId(int $id): array|null
    {
        $query = "SELECT * FROM Car WHERE ID_Seller = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        $cars = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $cars[] = $this->createCarFromRow($row);
        }
        return $cars;
    }

    public function findByUsed(string $used): array|null
    {
        $query = "SELECT * FROM Car WHERE Used = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$used]);
        $cars = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $cars[] = $this->createCarFromRow($row);
        }
        return $cars;
    }


    public function findByYear(int $year): array|null
    {
        $query = "SELECT * FROM Car WHERE Year = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$year]);
        $cars = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $cars[] = $this->createCarFromRow($row);
        }
        return $cars;
    }


    public function findByColor(string $color): array|null
    {
        $query = "SELECT * FROM Car WHERE Color = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$color]);
        $cars = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $cars[] = $this->createCarFromRow($row);
        }
        return $cars;
    }


    public function findByPlate(string $plate): Car|null
    {
        $query = "SELECT * FROM Car WHERE Plate = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$plate]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return $this->createCarFromRow($row);
        }
        return null;


    }

    public function findById($id): Car|null
    {
        $query = "SELECT * FROM Car WHERE ID_Car = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return $this->createCarFromRow($row);

        }
        return null;
    }

    public function findByBrand(string $brand): array|null
    {
        $query = "SELECT * FROM Car WHERE Brand = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$brand]);
        $cars = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $cars[] = $this->createCarFromRow($row);
        }
        return $cars;
    }


    public function save(Car $car): bool
    {
        $query = "INSERT INTO Car (ID_Seller, Plate, Brand, Model, Year, Color, Doors, Cc, Transmission, Fuel_Type, Used, Kilometers, Image, Price, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            $car->getSellerId(),
            $car->getPlate(),
            $car->getBrand(),
            $car->getModel(),
            $car->getYear(),
            $car->getColor(),
            $car->getDoors(),
            $car->getCc(),
            $car->getTransmission(),
            $car->getFuelType(),
            $car->getUsed(),
            $car->getKilometers(),
            $car->getImage(),
            $car->getPrice(),
            $car->getStatus()
        ]);
        return $stmt->rowCount() > 0;
    }

    public function update(Car $car): bool
    {
        $query = "UPDATE Car SET ID_Seller = ?, Plate = ?, Brand = ?, Model = ?, Year = ?, Color = ?, Doors = ?, Cc = ?, Transmission = ?, Fuel_Type = ?, Used = ?, Kilometers = ?, Image = ?, Price = ?, status = ? WHERE ID_Car = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            $car->getSellerId(),
            $car->getPlate(),
            $car->getBrand(),
            $car->getModel(),
            $car->getYear(),
            $car->getColor(),
            $car->getDoors(),
            $car->getCc(),
            $car->getTransmission(),
            $car->getFuelType(),
            $car->getUsed(),
            $car->getKilometers(),
            $car->getImage(),
            $car->getPrice(),
            $car->getStatus(),
            $car->getId()
        ]);
        return $stmt->rowCount() > 0;
    }

    public function delete(int $id): bool
    {
        $query = "DELETE FROM Car WHERE ID_Car=?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->rowCount() > 0;
    }


    public function findAll(): array
    {
        $query = "SELECT * FROM Car";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $cars = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $cars[] = $this->createCarFromRow($row);
        }
        return $cars;
    }




}



?>