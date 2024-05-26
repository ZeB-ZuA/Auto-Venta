<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Carro</title>
</head>
<body>
    <h2>Agregar Carro</h2>
    <form method="POST" action="../Process/process_VendorAddCar.php" enctype="multipart/form-data">
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
        <input type="text" id="transmission" name="Transmission" required><br>

        <label for="fuel_type">Tipo de Combustible:</label>
        <input type="text" id="fuel_type" name="Fuel_Type" required><br>

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
        <input type="text" id="status" name="status" required><br>

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
