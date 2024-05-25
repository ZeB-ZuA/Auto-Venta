<?php

class Car {
    private $id;
    private $sellerId;
    private $plate;
    private $brand;
    private $model;
    private $year;
    private $color;
    private $doors;
    private $cc;
    private $transmission;
    private $fuelType;
    private $used;
    private $kilometers;
    private $image;
    private $price;

    // Constructor
    public function __construct($sellerId, $plate, $brand, $model, $year, $color, $doors, $cc, $transmission, $fuelType, $used, $kilometers, $image, $price) {
        $this->sellerId = $sellerId;
        $this->plate = $plate;
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
        $this->color = $color;
        $this->doors = $doors;
        $this->cc = $cc;
        $this->transmission = $transmission;
        $this->fuelType = $fuelType;
        $this->used = $used;
        $this->kilometers = $kilometers;
        $this->image = $image;
        $this->price = $price;
    }

    // Getters and setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getSellerId() {
        return $this->sellerId;
    }

    public function setSellerId($sellerId) {
        $this->sellerId = $sellerId;
    }

    public function getPlate() {
        return $this->plate;
    }

    public function setPlate($plate) {
        $this->plate = $plate;
    }

    public function getBrand() {
        return $this->brand;
    }

    public function setBrand($brand) {
        $this->brand = $brand;
    }

    public function getModel() {
        return $this->model;
    }

    public function setModel($model) {
        $this->model = $model;
    }

    public function getYear() {
        return $this->year;
    }

    public function setYear($year) {
        $this->year = $year;
    }

    public function getColor() {
        return $this->color;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    public function getDoors() {
        return $this->doors;
    }

    public function setDoors($doors) {
        $this->doors = $doors;
    }

    public function getCc() {
        return $this->cc;
    }

    public function setCc($cc) {
        $this->cc = $cc;
    }

    public function getTransmission() {
        return $this->transmission;
    }

    public function setTransmission($transmission) {
        $this->transmission = $transmission;
    }

    public function getFuelType() {
        return $this->fuelType;
    }

    public function setFuelType($fuelType) {
        $this->fuelType = $fuelType;
    }

    public function getUsed() {
        return $this->used;
    }

    public function setUsed($used) {
        $this->used = $used;
    }

    public function getKilometers() {
        return $this->kilometers;
    }

    public function setKilometers($kilometers) {
        $this->kilometers = $kilometers;
    }

    public function getImage() {
        return $this->image;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }
}
?>
