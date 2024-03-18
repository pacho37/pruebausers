<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require("../../includes/db_conn.php");

    $idUsuario = $_POST['idP'];
    $nuevaClave = $_POST['nuevaClave'];

    // Validar si la nueva contraseña está vacía
    if (empty($nuevaClave)) {
        $array_devolver['mensaje'] = 'La nueva contraseña no puede estar vacía.';
        $array_devolver['resultado'] = '0';
        echo json_encode($array_devolver);
        exit; // Termina el script
    }

    // Obtener la contraseña actual del usuario
    $result = mysqli_query($enlace, "SELECT pass FROM usuario WHERE id_user = '$idUsuario'");
    $num = mysqli_num_rows($result);

    if ($num > 0) {
        // Hashear la nueva contraseña con sha1
        $contrasena = sha1($nuevaClave);

        // Actualizar la contraseña en la base de datos
        if (mysqli_query($enlace, "UPDATE usuario SET pass = '$contrasena' WHERE id_user = '$idUsuario'")) {
            $array_devolver['mensaje'] = 'Cambio de contraseña realizado con éxito.';
            $array_devolver['resultado'] = "1";
        } else {
            $array_devolver['mensaje'] = 'No es posible actualizar la contraseña.';
            $array_devolver['resultado'] = '0';
        }
    } else {
        $array_devolver['mensaje'] = 'Usuario no encontrado.';
        $array_devolver['resultado'] = '0';
    }

    echo json_encode($array_devolver);
} else {
    session_destroy();
    header("refresh:1; url=../page_404.html");
    die();
}
?>
