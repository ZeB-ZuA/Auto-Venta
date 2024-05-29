<!-- Products -->

<?php
// Array de productos
$productos = [
    [
        "img" => "../img/bmw2020.jpg",
        "alt" => "BMW 2020",
        "discount" => "-13%",
        "stars" => 4,
        "name" => "BMW X5 2020",
        "price" => "$32,885",
        "old_price" => "$37,799"
    ],
    [
        "img" => "../img/ferrari812.jpg",
        "alt" => "Ferrari 812",
        "discount" => "-2%",
        "stars" => 5,
        "name" => "Ferrari 812 Superfast",
        "price" => "$382,188",
        "old_price" => "$389,988"
    ],
    [
        "img" => "../img/ferrariPortofino.jpeg",
        "alt" => "Ferrari Portofino",
        "discount" => null,
        "stars" => 5,
        "name" => "Ferrari Portofino",
        "price" => "$238,900",
        "old_price" => null
    ],
    [
        "img" => "../img/miniCooper.jpg",
        "alt" => "Mini Cooper",
        "discount" => null,
        "stars" => 4,
        "name" => "Mini Cooper",
        "price" => "$14,869",
        "old_price" => null
    ],
    
];

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

<section class="container top-products">
    <h1 class="heading-1">Mejores Productos</h1>

    <div class="container-options">
        <span class="active">Destacados</span>
        <span>Más recientes</span>
        <span>Mas Vendidos</span>
    </div>

   <div class="container-products">
            <?php foreach ($productos as $producto): ?>
            <div class="card-product">
                <div class="container-img">
                    <img src="<?= $producto['img']; ?>" alt="<?= $producto['alt']; ?>" />
                    <?php if ($producto['discount']): ?>
                    <span class="discount"><?= $producto['discount']; ?></span>
                    <?php endif; ?>
                    <div class="button-group">
                        <span><i class="fa-regular fa-eye"></i></span>
                        <span><i class="fa-regular fa-heart"></i></span>
                    </div>
                </div>
                <div class="content-card-product">
                    <div class="stars">
                        <?= renderStars($producto['stars']); ?>
                    </div>
                    <h3><?= $producto['name']; ?></h3>
                    <span class="add-cart"><i class="fa-solid fa-basket-shopping"></i></span>
                    <p class="price">
                        <?= $producto['price']; ?>
                        <?php if ($producto['old_price']): ?>
                        <span><?= $producto['old_price']; ?></span>
                        <?php endif; ?>
                    </p>
                </div>
            </div>

            <?php endforeach; ?>
            
        </div>
</section>