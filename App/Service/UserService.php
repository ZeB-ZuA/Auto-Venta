<?php
require_once __DIR__ . '/../Connection.php';
require_once __DIR__ . '/../Entity/User.php';
require_once __DIR__ . '/../Repository/UserRepository.php';

class UserService implements UserRepository {
    private $conn;

    public function __construct() {
        try {
            $db = new Connection();
            $this->conn = $db->connect();
        } catch (PDOException $e) {
           
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function findAllSellers(): array {
        try {
            $query = "SELECT * FROM User WHERE Rol = 'Seller'";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $users = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $users[] = new User(
                    $row['ID_Number'],
                    $row['Email'],
                    $row['Password'],
                    $row['First_Name'],
                    $row['Last_Name'],
                    $row['Rol'],
                    $row['ID_User'],
                    $row['Credit'],
                    $row['Registration_Date']
                );
            }
            return $users;
        } catch (PDOException $e) {
            
            error_log("Error al buscar todos los vendedores: " . $e->getMessage());
            return [];
        }
    }

    public function findAllBuyers(): array {
        try {
            $query = "SELECT * FROM User WHERE Rol = 'Buyer'";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $users = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $users[] = new User(
                    $row['ID_Number'],
                    $row['Email'],
                    $row['Password'],
                    $row['First_Name'],
                    $row['Last_Name'],
                    $row['Rol'],
                    $row['ID_User'],
                    $row['Credit'],
                    $row['Registration_Date']
                );
            }
            return $users;
        } catch (PDOException $e) {
            
            error_log("Error al buscar todos los compradores: " . $e->getMessage());
            return [];
        }
    }

    public function findAll(): array {
        try {
            $query = "SELECT * FROM User";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $users = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $users[] = new User(
                    $row['ID_Number'],
                    $row['Email'],
                    $row['Password'],
                    $row['First_Name'],
                    $row['Last_Name'],
                    $row['Rol'],
                    $row['ID_User'],
                    $row['Credit'],
                    $row['Registration_Date']
                );
            }
            return $users;
        } catch (PDOException $e) {
            
            error_log("Error al buscar todos los usuarios: " . $e->getMessage());
            return [];
        }
    }

    public function updateCredit(int $id, int $credit): bool {
        try {
            $query = "UPDATE User SET Credit = ? WHERE ID_User = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$credit, $id]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            
            error_log("Error al actualizar crédito: " . $e->getMessage());
            return false;
        }
    }


    public function findById(int $id): ?User {
        try {
            $query = "SELECT * FROM User WHERE ID_User = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                return new User(
                    $row['ID_Number'],
                    $row['Email'],
                    $row['Password'],
                    $row['First_Name'],
                    $row['Last_Name'],
                    $row['Rol'],
                    $row['ID_User'],
                    $row['Credit'],
                    $row['Registration_Date']
                );
            }
        } catch (PDOException $e) {
            
            error_log("Error al buscar por ID: " . $e->getMessage());
        }
        return null;
    }

    public function isVendor(int $id): bool {
        try {
            $query = "SELECT * FROM User WHERE ID_User = ? AND Rol = 'Vendor'";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row ? true : false;
        } catch (PDOException $e) {
           
            error_log("Error al verificar si es Vendor: " . $e->getMessage());
            return false;
        }
    }

    public function isBuyer(int $id): bool {
        try {
            $query = "SELECT * FROM User WHERE ID_User = ? AND Rol = 'Buyer'";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row ? true : false;
        } catch (PDOException $e) {
           
            error_log("Error al verificar si es Buyer: " . $e->getMessage());
            return false;
        }
    }

    public function findByEmail(string $email): ?User {
        try {
            $query = "SELECT * FROM User WHERE Email = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$email]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                return new User(
                    $row['ID_Number'],
                    $row['Email'],
                    $row['Password'],
                    $row['First_Name'],
                    $row['Last_Name'],
                    $row['Rol'],
                    $row['ID_User'],
                    $row['Credit'],
                    $row['Registration_Date']
                );
            }
        } catch (PDOException $e) {
          
            error_log("Error al buscar por Email: " . $e->getMessage());
        }
        return null;
    }

    public function delete(int $id): bool {
        try {
            $query = "DELETE FROM User WHERE ID_User = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$id]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
           
            error_log("Error al eliminar usuario: " . $e->getMessage());
            return false;
        }
    }

    public function save(User $user): bool {
        try {
            $query = "INSERT INTO User (ID_Number, Email, Password, First_Name, Last_Name, Credit, Registration_Date, Rol) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([
                $user->getIdNumber(),
                $user->getEmail(),
                $user->getPassword(),
                $user->getFirstName(),
                $user->getLastName(),
                $user->getCredit(),
                $user->getRegistrationDate(),
                $user->getRol()
            ]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
           
            error_log("Error al guardar usuario: " . $e->getMessage());
            return false;
        }
    }

    public function update(User $user): bool {
        try {
            $query = "UPDATE User SET ID_Number = ?, Email = ?, Password = ?, First_Name = ?, Last_Name = ?, Credit = ?, Registration_Date = ?, Rol = ? WHERE ID_User = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([
                $user->getIdNumber(),
                $user->getEmail(),
                $user->getPassword(),
                $user->getFirstName(),
                $user->getLastName(),
                $user->getCredit(),
                $user->getRegistrationDate(),
                $user->getRol(),
                $user->getId()
            ]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
           
            error_log("Error al actualizar usuario: " . $e->getMessage());
            return false;
        }
    }
}
?>
