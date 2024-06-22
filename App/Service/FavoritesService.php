<?php
require_once '../Repository/FavoritesRepository.php';
require_once __DIR__ . '/../Connection.php';
require_once '../Entity/Car.php';

class FavoritesSercive implements FavoritesRepository
{
    private $conn;

    public function __construct()
    {
        $db = new Connection();
        $this->conn = $db -> connect();
    }

    public function addFavorite($userId, $plateId):bool
    {
       $query = "INSERT INTO Favorites (ID_User, Plate) VALUES (?, ?)";
        $stmt = $this->conn -> prepare($query);
        $stmt->execute([$userId,$plateId]);
        return $stmt->rowCount() > 0;

    }

    public function removeFavorite($userId, $plateId):bool
    {
      $query = "DELETE FROM Favorites WHERE ID_User = ? AND Plate = ?";
        $stmt = $this->conn -> prepare($query);
        $stmt->execute([$userId,$plateId]);
        return $stmt->rowCount() > 0;
    }

    public function findFavorites($userId):array|null
    {
        $query = "SELECT * FROM Car WHERE Plate IN (SELECT Plate FROM Favorites WHERE ID_User = ?)";
        $stmt = $this->conn -> prepare($query);
        $stmt->execute([$userId]);
        $cars = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $cars[] = $this->createCarFromRow($row);
        }
        return $cars;
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
}


?>