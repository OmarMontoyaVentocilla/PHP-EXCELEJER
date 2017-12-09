<?php
session_start();
require_once '../../helper/helperPdo.php';
$driver = new driverBD();
$nombre_usuario = trim($_POST['nombre_usuario']);
$apellido_usuario = trim($_POST['apellido_usuario']);
$fecha_usuario = trim($_POST['fecha_usuario']);
$correo_usuario = trim($_POST['correo_usuario']);
$dni_usuario = trim($_POST['dni_usuario']);
$rol_usuario = trim($_POST['rol_usuario']);
$contra_usuario = trim($_POST['contra_usuario']);
$password = password_hash($contra_usuario, PASSWORD_DEFAULT);
$foto_usuario = $_FILES['foto_usuario'];
$nombre_img = $foto_usuario["name"];
$tipo = $foto_usuario["type"];
$ruta_provisional = $foto_usuario["tmp_name"];
$size = $foto_usuario["size"];
$carpeta = "../../imagenes/users/";
$nro = rand(1, 999);
$src = $carpeta . $nro . "_" . $nombre_img;
$datos = array();

if ($nombre_usuario != '' && $apellido_usuario != '' && $fecha_usuario != '' && $correo_usuario != '' && $dni_usuario != '' && $rol_usuario != '' &&
	$contra_usuario != '') {
	if ($ruta_provisional != '') {
		if ($tipo == 'image/jpg' || $tipo == 'image/jpeg' || $tipo == 'image/png') {
			if (move_uploaded_file($ruta_provisional, $src)) {
				$xidUser = $driver->getAutoId("SELECT usu_in_id FROM usuario", "usu_in_id");
				$query = "INSERT INTO usuario (usu_in_id,usu_vc_nom,usu_vc_ape,usu_da_fecnac,tip_in_id,usu_vc_mail,usu_vc_pass,usu_vc_foto,usu_vc_dni,usu_in_est) VALUES (:codigo, :nombre, :apellido, :fecnac,:rol,:correo,:password,:foto,:dni, 1);";
				$stmnt = $driver->getProcedure($query);
				$stmnt->bindParam(':codigo', $xidUser, PDO::PARAM_INT);
				$stmnt->bindParam(':nombre', $nombre_usuario, PDO::PARAM_STR, 250);
				$stmnt->bindParam(':apellido', $apellido_usuario, PDO::PARAM_STR, 250);
				$stmnt->bindParam(':fecnac', $fecha_usuario, PDO::PARAM_STR);
				$stmnt->bindParam(':rol', $rol_usuario, PDO::PARAM_STR, 250);
				$stmnt->bindParam(':correo', $correo_usuario, PDO::PARAM_STR, 250);
				$stmnt->bindParam(':password', $password, PDO::PARAM_STR);
				$stmnt->bindParam(':foto', $src, PDO::PARAM_STR);
				$stmnt->bindParam(':dni', $dni_usuario, PDO::PARAM_STR, 8);
				$result = $driver->getExecute($stmnt);
				if ($result) {
					if ($rol_usuario == 1) {
						$sql_proc = "CALL inserta(:id_x)";
						$stmnt_x = $driver->getProcedure($sql_proc);
						$stmnt_x->bindParam(':id_x', $xidUser, PDO::PARAM_INT);
						$result_x = $driver->getExecute($stmnt_x);

						if ($result_x) {
							$datos['exito'] = true;
							$datos['mensaje'] = 'Se registro usuario correctamente';

						} else {
							$datos['exito'] = false;
							$datos['mensaje'] = 'tmre';
						}

					}

				} else {
					$datos['exito'] = false;
					$datos['mensaje'] = 'No se registro usuario correctamente';
				}
				echo json_encode($datos);
			}
		} else {
			$datos['exito'] = false;
			$datos['mensaje'] = 'No se registro usuario correctamente';
			echo json_encode($datos);
		}

	} else {
		$xidUser = $driver->getAutoId("SELECT usu_in_id FROM usuario", "usu_in_id");
		$query = "INSERT INTO usuario (usu_in_id,usu_vc_nom,usu_vc_ape,usu_da_fecnac,tip_in_id,usu_vc_mail,usu_vc_pass,usu_vc_foto,usu_vc_dni,usu_in_est) VALUES (:codigo, :nombre, :apellido, :fecnac,:rol,:correo,:password,'../../imagenes/users/asesor_user.png',:dni, 1);";
		$stmnt = $driver->getProcedure($query);
		$stmnt->bindParam(':codigo', $xidUser, PDO::PARAM_INT);
		$stmnt->bindParam(':nombre', $nombre_usuario, PDO::PARAM_STR, 250);
		$stmnt->bindParam(':apellido', $apellido_usuario, PDO::PARAM_STR, 250);
		$stmnt->bindParam(':fecnac', $fecha_usuario, PDO::PARAM_STR);
		$stmnt->bindParam(':rol', $rol_usuario, PDO::PARAM_STR, 250);
		$stmnt->bindParam(':correo', $correo_usuario, PDO::PARAM_STR, 250);
		$stmnt->bindParam(':password', $password, PDO::PARAM_STR);
		$stmnt->bindParam(':dni', $dni_usuario, PDO::PARAM_STR, 8);
		$result = $driver->getExecute($stmnt);

		if ($result) {
			if ($rol_usuario == 1) {
				$sql_proc = "CALL inserta(:id_x)";
				$stmnt_x = $driver->getProcedure($sql_proc);
				$stmnt_x->bindParam(':id_x', $xidUser, PDO::PARAM_INT);
				$result_x = $driver->getExecute($stmnt_x);

				if ($result_x) {
					$datos['exito'] = true;
					$datos['mensaje'] = 'Se registro usuario correctamente';

				} else {
					$datos['exito'] = false;
					$datos['mensaje'] = 'tmre';
				}

			}
		} else {
			$datos['exito'] = false;
			$datos['mensaje'] = 'No se registro usuario correctamente';
		}
		echo json_encode($datos);
	}
} else {
	$datos['exito'] = false;
	$datos['mensaje'] = 'Ingresa datos';
	echo json_encode($datos);
}

?>