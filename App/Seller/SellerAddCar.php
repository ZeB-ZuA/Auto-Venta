<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Carro</title>
    <link rel="stylesheet" href="../css/style-selleraddcar.css" /> 
</head>
<body>
    
    <form method="POST" action="../Process/process_SellerAddCar.php" enctype="multipart/form-data">
        <h2>Agregar Carro</h2>
        <input type="hidden" name="ID_Seller" value="<?php echo htmlspecialchars($_GET['id']); ?>">

        <div class="form-section">
            <label for="plate">Placa:</label>
            <input type="text" id="plate" name="Plate" required>

            <label for="brand">Marca:</label>
            <input type="text" id="brand" name="Brand" required>

            <label for="model">Modelo:</label>
            <input type="text" id="model" name="Model" required>

            <label for="year">Año:</label>
            <input type="number" id="year" name="Year" required>

            <label for="color">Color:</label>
            <input type="text" id="color" name="Color" required>

            <label for="doors">Puertas:</label>
            <input type="number" id="doors" name="Doors" required>


            <label for="image">Imagen:</label>
            <input type="file" id="image" name="Image" accept="image/*" required>
            <img id="imagePreview" src="" alt="Vista previa de la imagen" style="max-width: 200px; display: none;">
        </div>

        <div class="form-section">

            <label for="cc">Cilindrada (cc):</label>
            <input type="number" id="cc" name="Cc" required>

            <label for="transmission">Transmisión:</label>
            <select id="transmission" name="Transmission" required>
                <option value="Manual">Manual</option>
                <option value="Automática">Automática</option>
                <option value="Semi-Automática">Semi-Automática</option>
            </select>

            <label for="fuel_type">Tipo de Combustible:</label>
            <select id="fuel_type" name="Fuel_Type" required>
                <option value="Gasolina">Gasolina</option>
                <option value="Diesel">Diesel</option>
                <option value="Híbrido">Híbrido</option>
                <option value="Eléctrico">Eléctrico</option>
            </select>

            <label for="used">Usado:</label>
            <select id="used" name="Used" required>
                <option value="Yes">Sí</option>
                <option value="No">No</option>
            </select>

            <label for="kilometers">Kilometraje:</label>
            <input type="number" id="kilometers" name="Kilometers" required>

            

            <label for="price">Precio:</label>
            <input type="number" id="price" name="Price" required>

            <label for="status">Estado:</label>
            <select id="status" name="status" required>
                <option value="Disponible">Disponible</option>
                <option value="Vendido">Vendido</option>
            </select>

            <button type="submit">Guardar Carro</button>
        </div>
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
