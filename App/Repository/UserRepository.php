<?php

interface UserRepository {
    public function save(User $user): bool;
    public function update(User $user): bool;
    public function delete(int $id): bool;
    public function findByEmail(String $Email): ?User;
    public function findById(int $id): ?User;
   
}

?>
