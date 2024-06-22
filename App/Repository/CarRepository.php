<?php


interface CarRepository {
    public function save(Car $car): bool;
    public function update(Car $car): bool;
    public function delete(string $plate): bool;
    public function findByBrand(String $brand): ?array;
    public function findById(int $id): ?Car;
    public function findByPlate(string $plate): ?Car;
    public function findByColor(string $color): ?array;
    public function findAll(): array;
    public function findByYear(int $year): ?array;

    public function findByUsed(String $used): ?array;

    public function findBySellerId(int $id): ?array;

    public function buy(int $id, String $plate): bool;

    public function findByStatus(string $status): ?array;
}
?>