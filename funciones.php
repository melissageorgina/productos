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
      body {
          background-color: #fff0f5;
          font-family: 'Poppins', sans-serif;
      }
      h1 {
          text-align: center;
          color: #e91e63;
          margin-top: 20px;
          font-weight: 600;
      }
      .breadcrumb {
          background-color: #f8bbd0;
          border-radius: 8px;
      }
      .btn-primary {
          background-color: #e91e63;
          border-color: #e91e63;
          transition: background-color 0.3s ease;
      }
      .btn-primary:hover {
          background-color: #d81b60;
          border-color: #d81b60;
      }
      .btn-warning {
          background-color: #ff80ab;
          border-color: #ff80ab;
          transition: background-color 0.3s ease;
      }
      .btn-warning:hover {
          background-color: #f48fb1;
          border-color: #f48fb1;
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
      table {
          background-color: #fff;
          border-radius: 10px;
          overflow: hidden;
      }
      th {
          background-color: #ffcccb;
          color: #880e4f;
          font-weight: bold;
      }
      td {
          color: #880e4f;
          font-size: 14px;
      }
      a {
          color: inherit;
          text-decoration: none;
      }
      .container {
          padding: 15px;
      }
  </style>
  <title>Productos</title>
</head>
<body>
    <div class="container mt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.php" style="color: #e91e63;">Inicio</a></li>
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

        <table class="table table-striped table-bordered table-hover">
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
