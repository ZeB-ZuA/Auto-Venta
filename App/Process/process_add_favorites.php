
    <?php
    if (isset($_GET['id'])) {
        $userId = htmlspecialchars($_GET['id']);
        if(isset($_GET['plate'])){
            $plate = htmlspecialchars($_GET['plate']);

           require_once('../Service/FavoritesService.php');
            $FavoritesService = new FavoritesSercive();
            if($FavoritesService->addFavorite($userId, $plate)){
                header('Location: ../Buyer/BuyerView.php?id='.$userId);
            }
            else{
                echo 'No se pudo agregar el carro a favoritos.';
            }           
        }else{
            echo'No se recibió placa de carro.';
        }
    } else {
        echo "No se recibió ID de usuario.";
    }
    

    ?>
