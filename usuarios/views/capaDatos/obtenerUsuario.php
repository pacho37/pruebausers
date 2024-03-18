<?php
//session_start();

if ($_SERVER['REQUEST_METHOD'] == 'GET'  && !empty($_GET['idUsuario'])) {
    mysqli_report(MYSQLI_REPORT_ALL & ~MYSQLI_REPORT_INDEX);

    require("../../includes/db_conn.php");

    $idUsuario = $_GET['idUsuario'];

    $query = "SELECT * FROM usuario WHERE id_user = $idUsuario";
    $result = mysqli_query($enlace, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $usuario = mysqli_fetch_assoc($result);
        echo json_encode($usuario);
    } else {
        echo json_encode(null);
    }
} else {
    header("HTTP/1.0 403 Forbidden");
    echo "Forbidden";
}
?>
