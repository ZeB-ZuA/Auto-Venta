<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Carro</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body {
            background-color: #7ab5c7;
            margin: 0;
            padding: 40px; 
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100vh;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }
        h2 {
            color: #333;
            text-align: center;
        }
        form {
            background: #fff;
            padding: 15px 40px; 
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 250px; 
            font-size: 14px;
        }
        form label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        form input[type="text"],
        form input[type="number"],
        form select,
        form input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
        form button {
            background-color: #7ab5c7;
            color: white;
            border: none;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin-top: 15px;
            cursor: pointer;
            border-radius: 4px;
            width: 100%;
        }
        form button:hover {
            background-color: #669fa7;
        }
        img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    
    <form method="POST" action="../Process/process_SellerAddCar.php" enctype="multipart/form-data">
        <h2>Agregar Carro</h2>
        <input type="hidden" name="ID_Seller" value="<?php echo htmlspecialchars($_GET['id']); ?>">

        <label for="plate">Placa:</label>
        <input type="text" id="plate" name="Plate" required><br>

        <label for="brand">Marca:</label>
        <input type="text" id="brand" name="Brand" required><br>

        <label for="model">Modelo:</label>
        <input type="text" id="model" name="Model" required><br>

        <label for="year">Año:</label>
        <input type="number" id="year" name="Year" required><br>

        <label for="color">Color:</label>
        <input type="text" id="color" name="Color" required><br>

        <label for="doors">Puertas:</label>
        <input type="number" id="doors" name="Doors" required><br>

        <label for="cc">Cilindrada (cc):</label>
        <input type="number" id="cc" name="Cc" required><br>

        <label for="transmission">Transmisión:</label>
        <select id="transmission" name="Transmission" required>
            <option value="Manual">Manual</option>
            <option value="Automática">Automática</option>
            <option value="Semi-Automática">Semi-Automática</option>
        </select><br>

        <label for="fuel_type">Tipo de Combustible:</label>
        <select id="fuel_type" name="Fuel_Type" required>
            <option value="Gasolina">Gasolina</option>
            <option value="Diesel">Diesel</option>
            <option value="Híbrido">Híbrido</option>
            <option value="Eléctrico">Eléctrico</option>
        </select><br>

        <label for="used">Usado:</label>
        <select id="used" name="Used" required>
            <option value="Yes">Sí</option>
            <option value="No">No</option>
        </select><br>

        <label for="kilometers">Kilometraje:</label>
        <input type="number" id="kilometers" name="Kilometers" required><br>

        <label for="image">Imagen:</label>
        <input type="file" id="image" name="Image" accept="image/*" required><br>
        <img id="imagePreview" src="" alt="Vista previa de la imagen" style="max-width: 200px; display: none;"><br>

        <label for="price">Precio:</label>
        <input type="number" id="price" name="Price" required><br>

        <label for="status">Estado:</label>
        <select id="status" name="status" required>
            <option value="Disponible">Disponible</option>
            <option value="Vendido">Vendido</option>
        </select><br>

        <button type="submit">Guardar Carro</button>
    </form>

    <script>
        document.getElementById('image').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imagePreview = document.getElementById('imagePreview');
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>
