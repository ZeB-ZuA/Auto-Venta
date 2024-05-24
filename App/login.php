<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Auto-Venta</title>
        <link rel="stylesheet" href="css/styles-login.css" />
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   </head>
    <body>
        
        <div class="form">
            <h2>Iniciar Sesión</h2>
            <form action="login.php" method="POST">
                <div class="inputBox">
                    <input type="text" placeholder="username" required />
                    <i class='bx bxs-user' ></i>
                </div>
                <div class="inputBox">
                    <input type="password" placeholder="password" required />
                    <i class='bx bxs-lock' ></i>
                </div>
                <button type="submit" class="btn">Ingresar</button>
                <div class="register-link">
                    <p class="signup">
                        ¿No tienes una cuenta? <a href="#">Regístrate</a>
                    </p>
                </div>
            </form>
        </div>

        <script
            src="https://kit.fontawesome.com/81581fb069.js"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
