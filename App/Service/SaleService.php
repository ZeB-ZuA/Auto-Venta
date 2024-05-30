<?php

require_once __DIR__ . '/../Connection.php';
require_once __DIR__ . '/../Entity/Sale.php';
require_once __DIR__ . '/../Repository/SaleRepository.php';

class SaleService implements SaleRepository
{
    private $conn;

    public function __construct()
    {
        $db = new Connection();
        $this->conn = $db->connect();
    }

    public function findByBuyerId(int $buyerId): array
    {
        try {
            $query = "SELECT * FROM Sales WHERE ID_Buyer = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$buyerId]);
            $sales = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $sales[] = $this->createSaleFromRow($row);
            }
            return $sales;
        } catch (PDOException $e) {
            error_log("Error al buscar ventas por ID de comprador: " . $e->getMessage());
            return [];
        }
    }
    
    public function findBySellerId($sellerId): array|null
    {
        $query = "SELECT * FROM Sales WHERE ID_Seller = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$sellerId]);
        $sales = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $sales[] = $this->createSaleFromRow($row);
        }
        return $sales;
    }

    private function createSaleFromRow(array $row): Sale
    {
        return new Sale(
            $row['ID_Sale'],
            $row['ID_Seller'],
            $row['ID_Buyer'],
            $row['Plate'],
            $row['Sale_Date']
        );
    }

    public function create(Sale $sale): bool
    {
        $query = "INSERT INTO Sales (ID_Seller, ID_Buyer, Plate, Sale_Date) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            $sale->getSellerId(),
            $sale->getBuyerId(),
            $sale->getPlate(),
            $sale->getSaleDate()
        ]);
        return $stmt->rowCount() > 0;
    }

    public function findById(int $id): ?Sale
    {
        $query = "SELECT * FROM Sales WHERE ID_Sale = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? $this->createSaleFromRow($row) : null;
    }

    

    public function findAll(): array|null
    {
        $query = "SELECT * FROM Sales";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $sales = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $sales[] = $this->createSaleFromRow($row);
        }
        return $sales;
    }

    public function update(Sale $sale): bool
    {
        $query = "UPDATE Sales SET ID_Seller = ?, ID_Buyer = ?, Plate = ?, Sale_Date = ? WHERE ID_Sale = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            $sale->getSellerId(),
            $sale->getBuyerId(),
            $sale->getPlate(),
            $sale->getSaleDate(),
            $sale->getId()
        ]);
        return $stmt->rowCount() > 0;
    }

    public function delete(int $id): bool
    {
        $query = "DELETE FROM Sales WHERE ID_Sale = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->rowCount() > 0;
    }
}
?>
