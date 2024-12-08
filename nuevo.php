<?php
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = agregarProducto($_POST['nombre'], $_POST['precio'], $_POST['descripcion'], $_POST['categoria'], $disponible = isset($_POST['disponible']) ? 'si' : 'no');
    if ($id) {
        header("Location: index.php?mensaje=Producto creado con éxito");
        exit;
    } else {
        $error = "No se pudo crear el Producto.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-color: #fbeffb;
            font-family: 'Arial', sans-serif;
        }
        h1 {
            text-align: center;
            color: #d63384;
            margin-top: 20px;
        }
        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        label {
            color: #6c757d;
            font-weight: bold;
        }
        input, textarea, select {
            display: block;
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #dcdcdc;
            border-radius: 5px;
        }
        button {
            background-color: #d63384;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #c21873;
        }
        .form-control:focus {
            border-color: #d63384;
            box-shadow: 0 0 5px rgba(214, 51, 132, 0.5);
        }
    </style>
    <title>Añadir Producto</title>
</head>
<body>
    <h1>Añadir Nuevo Producto</h1>
    <form method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>

        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio" step="0.01" required>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" rows="4" required></textarea>

        <label for="categoria">Categoría:</label>
        <select name="categoria" id="categoria">
            <option value="leche">Leche</option>
            <option value="yogur">Yogur</option>
            <option value="queso">Queso</option>
            <option value="mantequilla">Mantequilla</option>
            <option value="crema">Crema</option>
            <option value="helado">Helado</option>
        </select>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="disponible" id="disponible">
            <label class="form-check-label" for="disponible">Disponible</label>
        </div>

        <button type="submit">Añadir Producto</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
