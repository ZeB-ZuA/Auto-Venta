<?php

class Favorite {
    private $Plate;
    private $userId;

    public function __construct($Plate, $userId) {
        $this->Plate = $Plate;
        $this->userId = $userId;
    }

    // Getters and setters
    public function getPlate() {
        return $this->Plate;
    }

    public function setPlate($carId) {
        $this->carId = $carId;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }
}
