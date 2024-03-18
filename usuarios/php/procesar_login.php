<?php
require_once "../includes/db_conn.php";

$password = sha1($_POST["password"]);
$usuario = $_POST["usuario"];

$consulta_usuario = mysqli_query($enlace, "SELECT id_user, usuario, nombre, tipo_user FROM usuario WHERE usuario = '$usuario' AND pass ='$password' AND estado = 1") or die(mysqli_error($enlace));

$array_devolver = array(); // Inicializar la variable

if ($consulta_usuario) {
    $coincidencias = mysqli_num_rows($consulta_usuario);

    if ($coincidencias == 0) {
        $array_devolver['mensaje'] = "Los datos no son válidos.";
        $array_devolver['redirect'] = '';
        $array_devolver['resultado'] = '0';
    } else {
        session_start();
        $resultado = mysqli_fetch_array($consulta_usuario, MYSQLI_ASSOC);

        $_SESSION['id_user'] = $resultado['id_user'];
        $_SESSION['tipo_user'] = $resultado['tipo_user'];
        $_SESSION['nombre'] = $resultado['nombre'];

        if ($_SESSION["tipo_user"] == 1) {
            $array_devolver['mensaje'] = "Login Correcto.";
            $array_devolver['redirect'] = '../usuarios/views/listUser.php';
            $array_devolver['resultado'] = '1';
        } else {
            $array_devolver['mensaje'] = "Login Correcto.";
            $array_devolver['redirect'] = '../usuarios/views/listUser.php';
            $array_devolver['resultado'] = '1';
        }
    }
} else {
    $array_devolver['mensaje'] = "Error en la consulta: " . mysqli_error($enlace);
    $array_devolver['redirect'] = '';
    $array_devolver['resultado'] = '0';
}

echo json_encode($array_devolver);
