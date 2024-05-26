<?php
require_once __DIR__ . '/../Connection.php';
require_once __DIR__ . '/../Entity/User.php';
require_once __DIR__ . '/../Repository/UserRepository.php';

class UserService implements UserRepository {

    private $conn;

    public function __construct() {
        $db = new Connection();
        $this->conn = $db->connect();
    }


    public function findById(int $id): ?User {
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
        return null;
    }

    public function isVendor(int $id): bool {
        $query = "SELECT * FROM User WHERE ID_User = ? AND Rol = 'Vendor'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? true : false;
    }

    public function isBuyer(int $id): bool {
        $query = "SELECT * FROM User WHERE ID_User = ? AND Rol = 'Buyer'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? true : false;
    }


    
    public function findByEmail(String $Email): ?User {
        $query = "SELECT * FROM User WHERE Email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$Email]);
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
        return null;
    }
    
    
    
    public function delete(int $id): bool {
        $query = "DELETE FROM User WHERE ID_User=?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->rowCount() > 0;
    }

 
    public function save(User $user): bool {
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
    }

    public function update(User $user): bool {
        $query = "UPDATE User SET ID_Number=?, Email=?, Password=?, First_Name=?, Last_Name=?, Credit=?, Registration_Date=?, Rol=? WHERE ID_User=?";
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
    }

   
}
?>
