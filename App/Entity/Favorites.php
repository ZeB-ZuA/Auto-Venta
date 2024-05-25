<?php

class Favorite {
    private $carId;
    private $userId;

    public function __construct($carId, $userId) {
        $this->carId = $carId;
        $this->userId = $userId;
    }

    // Getters and setters
    public function getCarId() {
        return $this->carId;
    }

    public function setCarId($carId) {
        $this->carId = $carId;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }
}
