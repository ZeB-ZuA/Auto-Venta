<!-- Products -->

<?php
// Array de productos
require_once "../Service/CarService.php";
$carservice=new CarService();
$cars = $carservice->findAll();

function renderStars($count) {
    $starsHTML = '';
    for ($i = 0; $i < 5; $i++) {
        if ($i < $count) {
            $starsHTML .= '<i class="fa-solid fa-star"></i>';
        } else {
            $starsHTML .= '<i class="fa-regular fa-star"></i>';
        }
    }
    return $starsHTML;
}
?>


    <!-- Products -->
    <section id="products-sale"class="container top-products">
        <h1 class="heading-1">Catálogo</h1>

        <div class="container-products">
            <?php foreach ($cars as $car): ?>
            <div class="card-product">
                <div class="container-img">
                    <img src="<?= $car->getImage(); ?>" alt="<?= $car->getPlate(); ?>" />
                    <?php if ($car->getYear()): ?>
                    <span class="discount"><?= $car->getYear(); ?></span>
                    <?php endif; ?>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <div class="stars">
                        <?= renderStars(rand(1,5)); ?>
                    </div>
                    <h3><?= $car->getBrand()." ".$car->getModel() ?></h3>
                    <span class="add-cart"><i class="fa-solid fa-basket-shopping"></i></span>
                    <p class="price">
                        <?= "$ ".$car->getPrice()?>
                    
                    </p>
                </div>
            </div>

            <?php endforeach; ?>
            
        </div>
        <div class="container-options">
            <a href="#products-sale"><span>Volver al inicio</span></a>
        </div>
    </section>


