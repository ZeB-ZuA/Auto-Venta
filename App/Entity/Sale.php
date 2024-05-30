<?php

class Sale {
    private $id;
    private $sellerId;
    private $buyerId;
    private $plate;
    private $saleDate;

    public function __construct($id = null, $sellerId, $buyerId, $plate, $saleDate=null) {
        $this->id = $id;
        $this->sellerId = $sellerId;
        $this->buyerId = $buyerId;
        $this->plate = $plate;
        $this->saleDate = $saleDate ?? date('Y-m-d');
    }

    public function getId() {
        return $this->id;
    }

    public function getSellerId() {
        return $this->sellerId;
    }

    public function getBuyerId() {
        return $this->buyerId;
    }

    public function getPlate() {
        return $this->plate;
    }

    public function getSaleDate() {
        return $this->saleDate;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setSellerId($sellerId) {
        $this->sellerId = $sellerId;
    }

    public function setBuyerId($buyerId) {
        $this->buyerId = $buyerId;
    }

    public function setPlate($plate) {
        $this->plate = $plate;
    }

    public function setSaleDate($saleDate) {
        $this->saleDate = $saleDate;
    }
}
?>