<?php
//session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	mysqli_report(MYSQLI_REPORT_ALL & ~MYSQLI_REPORT_INDEX);

	require("../../includes/db_conn.php");

	// Validación de campos
	if (empty($_POST['usuario']) || empty($_POST['documento'])) {
		$array_devolver['mensaje'] = 'El campo usuario y cédula son obligatorios';
		$array_devolver['resultado'] = '0';
		echo json_encode($array_devolver);
		exit;
	}

	if ($_POST['id_user'] == "0") {
		// Verificar si ya existe un usuario con la misma cédula o correo electrónico
		$consulta = "SELECT * FROM usuario WHERE documento = '" . $_POST['documento'] . "' OR mail = '" . $_POST['mail'] . "'";
		$usuario_existente = mysqli_query($enlace, $consulta);
		if (mysqli_num_rows($usuario_existente) > 0) {
			$array_devolver['mensaje'] = 'Ya existe un usuario con la misma cédula o correo electrónico';
			$array_devolver['resultado'] = '0';
			echo json_encode($array_devolver);
			exit;
		}
	}
    
	if ($_POST['id_user'] == "0") {
        $password = sha1($_POST["pass"]);
		$result = mysqli_query($enlace, "INSERT INTO usuario (id_user, nombre, apellidos ,documento ,usuario, pass, mail, movil ,tipo_user, estado, fecha_reg) VALUES (NULL,'" . $_POST['nombre'] . "', '" . $_POST['apellidos'] . "', '" . $_POST['documento'] . "' ,'" . $_POST['usuario'] . "', '" . $password . "', '" . $_POST['mail'] . "', '" . $_POST['movil'] . "', '" . $_POST['estado'] . "','" . $_POST['estado'] . "','" . $_POST['fecha'] . "')");
		if ($result) {
			$id = mysqli_insert_id($enlace);
			$array_devolver['mensaje'] = 'Usuario Registrado!';
			$array_devolver['resultado'] = $id;
		} else {
			$array_devolver['mensaje'] = 'No es posible crear el usuario';
			$array_devolver['resultado'] = '0';
		}
	} else {
		$result = mysqli_query($enlace, "UPDATE usuario SET documento='" . $_POST['documento'] . "', nombre='" . $_POST['nombre'] . "' , apellidos='" . $_POST['apellidos'] . "' , usuario='" . $_POST['usuario'] . "', mail ='" . $_POST['email'] . "', tipo_user = '" . $_POST['nivelUsuario'] . "' , estado ='" . $_POST['estado'] . "', fecha_mod = NOW()  where id_user='" . $_POST['id_user'] . "'");
		if ($result) {
			$array_devolver['mensaje'] = 'Usuario Actualizado!';
			$array_devolver['resultado'] = '1';
		} else {
			$array_devolver['mensaje'] = 'Actualización Fallida';
			$array_devolver['resultado'] = '0';
		}
	}

	echo json_encode($array_devolver);
} else {
	header("refresh:1; url=../page_404.html");
	die();
}
