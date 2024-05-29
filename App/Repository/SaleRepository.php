<?php

interface SaleRepository {
    public function create(Sale $sale): bool;
    public function findById(int $id): ?Sale;
    public function findAll(): array;
    public function update(Sale $sale): bool;
    public function delete(int $id): bool;

    public function findBySellerId(int $id): ?array;
}




?>