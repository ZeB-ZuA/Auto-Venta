 <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0"
            />
        <title>Auto-Venta</title>
        <link rel="stylesheet" href="styles.css" />
        <link rel="stylesheet" href="css/style-header.css" />
        <link rel="stylesheet" href="css/style-feature.css" />
        <link rel="stylesheet" href="css/style-suppliers.css" /> 
        <link rel="stylesheet" href="css/style-product.css" /> 
   </head>
    <body>
        <?php include 'views/header.php'; ?>
        <section class="banner">
            <div class="content-banner">
                <p>Tu nuevo compañero de viaje</p>
                <h2>100% Certificado <br />Automoviles</h2>
                <a href="#">Comprar ahora</a>
            </div>
        </section> 
        
        <main class="main-content">
            <?php include 'views/features.php'; ?>
            <?php include 'views/products.php'; ?>
            <section id="suppliers">
            <?php include 'views/suppliers.php'; ?>
            </section>>
        </main>

        <footer class="footer">
            <div class="container container-footer">
                <div class="copyright">
                    <p>
                        ..... &copy; 2024
                    </p>

                    <img src="img/payment.png" alt="Pagos">
                </div>
            </div>
        </footer>

        <script
            src="https://kit.fontawesome.com/81581fb069.js"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
