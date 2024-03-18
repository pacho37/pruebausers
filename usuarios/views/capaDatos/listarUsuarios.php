<?php 
require_once("../../includes/db_conn.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $contador = 0;
    $data = array();

    try {
        $result = mysqli_query($enlace, "SELECT * FROM usuario  ORDER BY apellidos ASC ");
        while ($row = mysqli_fetch_assoc($result)) {
            $array_devolver = array();
            $array_devolver['id_user'] = $row['id_user'];
            $array_devolver['documento'] = $row['documento'];
            $array_devolver['nombre'] = $row['nombre'];
            $array_devolver['apellidos'] = $row['apellidos'];
            $array_devolver['documento'] = $row['documento'];
            $array_devolver['mail'] = $row['mail'];
            $array_devolver['usuario'] = $row['usuario'];
            $array_devolver['estado']  = $row['estado'];

            $data[$contador] = $array_devolver;
            $contador++;
        }
    } catch (Exception $e) {
        echo $e->getMessage()." Error SQL";
    }

    echo json_encode(array('data' => $data));
} else {
    header("refresh:1; url=../page_404.html");
    die();
}


?>