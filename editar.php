<?php
require_once '../config/database.php';
require_once 'funciones.php';

$productoController = new ProductoController();
$productos = $productoController->listarProductos();
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Pacifico|Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <style>
    /* Estilos generales */
    body {
      background-color: #fff0f5;
      font-family: 'Poppins', sans-serif;
      color: #6a1b9a;
    }

    h1 {
      text-align: center;
      color: #9c27b0;
      margin-top: 20px;
      font-weight: 600;
    }

    .breadcrumb {
      background-color: #e1bee7;
      border-radius: 10px;
    }

    /* Botones personalizados */
    .btn-primary {
      background-color: #d81b60;
      border-color: #d81b60;
      transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #ad1457;
      border-color: #ad1457;
    }

    .btn-warning {
      background-color: #f48fb1;
      border-color: #f48fb1;
      transition: background-color 0.3s ease;
    }

    .btn-warning:hover {
      background-color: #e91e63;
      border-color: #e91e63;
    }

    .btn-danger {
      background-color: #ff6f61;
      border-color: #ff6f61;
      transition: background-color 0.3s ease;
    }

    .btn-danger:hover {
      background-color: #e53935;
      border-color: #e53935;
    }

    /* Estilos para la tabla */
    table {
      background-color: #ffffff;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    th {
      background-color: #f3e5f5;
      color: #9c27b0;
      font-weight: bold;
    }

    td {
      color: #4a2c63;
      font-size: 14px;
    }

    /* Contenedor con diseño amigable */
    .container {
      padding: 20px;
    }

    /* Encabezado */
    .header-title {
      font-size: 24px;
      color: #9c27b0;
      font-weight: bold;
      text-align: center;
      margin: 15px 0;
    }

    /* Iconos */
    a {
      color: inherit;
      text-decoration: none;
    }

    /* Bordes y detalles */
    .custom-card {
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    /* Espaciado */
    .section {
      margin-bottom: 20px;
    }
  </style>
  <title>Productos</title>
</head>

<body>
  <div class="container mt-4">
    <!-- Breadcrumb con estilo amigable -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="../index.php" style="color: #9c27b0;">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Productos</li>
      </ol>
    </nav>

    <!-- Encabezado Principal -->
    <h1>Gestión de Productos</h1>

    <div class="section d-flex justify-content-between">
      <div>
        <p class="header-title">Lista Completa de Productos</p>
      </div>
      <div>
        <a href="nuevo.php" class="btn btn-primary">Nuevo Producto</a>
      </div>
    </div>

    <!-- Tabla de Productos -->
    <table class="table table-striped table-hover table-bordered">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Precio</th>
          <th>Categoría</th>
          <th>Descripción</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($productos as $producto) : ?>
          <tr>
            <td><?php echo $producto->nombre; ?></td>
            <td>$<?php echo number_format($producto->precio, 2); ?></td>
            <td><?php echo $producto->categoria; ?></td>
            <td><?php echo substr($producto->descripcion, 0, 50) . '...'; ?></td>
            <td>
              <a href="editar.php?id=<?php echo $producto->_id; ?>" class="btn btn-warning">Editar</a>
              <a href="funciones.php?action=eliminar&id=<?php echo $producto->_id; ?>"
                class="btn btn-danger"
                onclick="return confirm('¿Está seguro de eliminar este producto?')">
                Eliminar
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
