<?php

class User {
    private $id;
    private $idNumber;
    private $email;
    private $password;
    private $firstName;
    private $lastName;
    private $credit;
    private $registrationDate;
    private $rol;

    // Constructor
     public function __construct($idNumber, $email, $password, $firstName, $lastName, $role, $id = null, $credit = 0, $registrationDate = null) {
        $this->idNumber = $idNumber;
        $this->email = $email;
        $this->password = $password;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->credit = $credit;
        $this->registrationDate = $registrationDate ?? date('Y-m-d');
        $this->role = $role;
        $this->id = $id;
    }

    // Getters and setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getIdNumber() {
        return $this->idNumber;
    }

    public function setIdNumber($idNumber) {
        $this->idNumber = $idNumber;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function getCredit() {
        return $this->credit;
    }

    public function setCredit($credit) {
        $this->credit = $credit;
    }

    public function getRegistrationDate() {
        return $this->registrationDate;
    }

    public function setRegistrationDate($registrationDate) {
        $this->registrationDate = $registrationDate;
    }
    public function getRol() {
        return $this->rol;
    }

    public function setRol($rol): void {
        $this->rol = $rol;
    }


}

