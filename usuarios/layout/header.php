<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicación de Gestión de Usuarios</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos CSS  -->
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>
    <div class="container-fluid">
        <div class="menu-toggle" id="menu-toggle">
            <i class="bi bi-list"></i>
        </div>
        <!-- Menú lateral -->
        <div id="menu-lateral">
            <br>
            <a href="../views/listUser.php"><i class="fas fa-solid fa-users"></i> Dashboard</a>
            <a href="../views/newUser.php">Nuevo Usuario</a>
        </div>
        <!-- Menú superior -->
        <div id="menu-superior">
            <img src="../public/img/loging.png" alt="Imagen de Usuario">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    Bienvenido: <?php echo $_SESSION['nombre'] ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="#">Perfil</a></li>
                    <li><a class="dropdown-item" href="./../index.php">Cerrar Sesión</a></li>
                </ul>
            </div>
        </div>
    </div>