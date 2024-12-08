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
  <style>
      body {
          background-color: #fce4ec;
          font-family: 'Arial', sans-serif;
      }
      h1 {
          text-align: center;
          color: #ad1457;
          margin-top: 20px;
      }
      .breadcrumb {
          background-color: #f8bbd0;
          border-radius: 5px;
      }
      .btn-primary {
          background-color: #ec407a;
          border-color: #ec407a;
      }
      .btn-primary:hover {
          background-color: #d81b60;
          border-color: #d81b60;
      }
      .btn-warning {
          background-color: #f48fb1;
          border-color: #f48fb1;
      }
      .btn-warning:hover {
          background-color: #f06292;
          border-color: #f06292;
      }
      .btn-danger {
          background-color: #e57373;
          border-color: #e57373;
      }
      .btn-danger:hover {
          background-color: #d32f2f;
          border-color: #d32f2f;
      }
      table {
          background-color: #ffffff;
          border-radius: 10px;
          overflow: hidden;
      }
      th {
          background-color: #f8bbd0;
          color: #6d1b7b;
      }
      td {
          color: #6d1b7b;
      }
  </style>
  <title>Productos</title>
</head>
<body>
    <div class="container mt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.php" style="color: #ad1457;">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Productos</li>
            </ol>
        </nav>

        <div class="row mb-3">
            <div class="col">
                <h1>Gestión de Productos</h1>
            </div>
            <div class="col text-end">
                <a href="nuevo.php" class="btn btn-primary">Nuevo Producto</a>
            </div>
        </div>

        <table class="table table-striped table-bordered">
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
            <?php foreach ($productos as $producto): ?>
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
</body>
</html>
