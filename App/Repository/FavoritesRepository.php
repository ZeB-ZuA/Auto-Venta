

<?php

interface FavoritesRepository
{
    public function addFavorite($userId, $plateId): bool;
    public function removeFavorite($userId, $plateId): bool;
    public function findFavorites($userId): ?array;
}


?>