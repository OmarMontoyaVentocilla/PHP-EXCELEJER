<?PHP
//header("Content-Type: text/html;charset=utf-8");
///fx  combo
//Funciones para extraer id y descripcion de otra tabla
//$dias_semana = array("domingo","lunes","martes","mi&eacute;rcoles","jueves","viernes","s&aacute;bado");
$idexamensenso = "463"; //psico
$idexamenesf = "477"; //prueba_esf
$idexamenacro = "475"; //Test de Acrofobia
$idexamenclau = "474"; //Test de Claustrofobia
$insertado_en = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
$insertado_en2 = $_SERVER["HTTP_HOST"];
$ncupos_cita = 100;

/*Julio V: Cambiar los valores de citas de Cerro Verde Directo a 60 atenciones diarias, y restar 15 atenciones a las contratistas es decir que se queden con 75, esto de lunes a viernes.*/
/*Julio V: Cambiar los valores de citas de Cerro Verde Directo a 50 atenciones diarias, y  las contratistas es decir que se queden con 90, esto de lunes a viernes.*/
$ncuposmcvlv = 50;
$ncuposubclv = 90;
$ncuposmcvs = 20;
$ncuposubcs = 60;
$vardescuento = 0.50;
$excel_neofi = 'excel_neofi';

/*$nvalid1=4;
$nvalid2=3;
$nhora1='72';
$nhora2='48';*/
$nvalid1 = 3;
$nvalid2 = 2;
$nhora1 = '48';
$nhora2 = '24';
$horavalfactu = '18:00:00';
$horafactusab = '13:00:00';
$horaemp = '23:59:00';
$bloqueardiv = "<div style='position:relative;'>
      <div style='position:absolute;height:101%;width:100%;z-index:50;'></div>";

$cerrarbloqdiv = "</div>";
$iphost = $_SERVER["HTTP_HOST"];
$fecha_actual = date("d-m-Y");
//$fecha_actual='02-07-2017';
$fecha_actual_mas1 = mktime(0, 0, 0, date("m"), date("d"), date("Y") + 1);
$fecha_actual_mas1 = date("d-m-Y", $fecha_actual_mas1);

$fecha_mes_mas6 = mktime(0, 0, 0, date("m") + 6, date("d"), date("Y"));
$fecha_mes_mas6 = date("d-m-Y", $fecha_mes_mas6);

/*
192: LENTES
191: ERGON
190: PLOMO
189: RADIA
188: ARSEN
187: POLVO
186: RUIDO
185: VISITA
184: NO MIN
183: MTTO
182: EECC
181: SEME
180: BUS
179: MINI BUS
178: VAN
177: SEDAN
176: EQ. LIV
175: EQ. SER
174: EQ. PRO
173: BRIGA
172: CAMPO
171: ADMIN.
170: IZAJE
169: TENSIÓN
168: CALIENTE
167: CONFINADO
166: ALTURA
165: RIGGER
 */

/*
13-09-2017
perfilconprotocolo
165: RIGGER
166: ALTURA
167: CONFINADO
168: CALIENTE
169: TENSIÓN
170: IZAJE
171: ADMIN.
172: CAMPO
173: BRIGA
174: EQ. PRO
175: EQ. SER
176: EQ. LIV
177: SEDAN
178: VAN
179: MINI BUS
180: BUS
181: SEME
182: EECC
183: MTTO
184: NO MIN
185: VISITA

165,166,167,168,169,170,171,172,173,174, 175, 176, 177,178,179,180,181,182,183,184,185*/

//$idempresa='01';
$Fecha_actual = date("Y-m-d");
//$Fecha_actual="2017-07-03";
$timezone = -5; //(GMT -5:00) EST (U.S. & Canada & PERU)
$horactual = gmdate("H:i:s", time() + 3600 * ($timezone));
$Horactual = gmdate("h:i:s a", time() + 3600 * ($timezone));
//Variables para la elección de los jurados... en el modulo de expedito, programa de Modalidad de Tesis
if (date("m") <= 7 and date("m") >= 4) {$parte = 'I';}
if (date("m") <= 12 and date("m") >= 8) {$parte = 'II';}
$anioactual = date("Y");
$direccion_clinica = "NRO. D INT. 1 URB. JARDIN (ESQ.AV.EJERCITO CON URB.JARDIN)";
$nombre_clinica = "SERMEDI";
$nombre_lugar = "Yanahuara";
$telefono_clinica = "(054) 252398";

$ipruta = "http://190.40.154.107";
//Cuadro con raya en medio (Vacio)
$VEQUIS = '<IMG border="0" src="../../images/vequis.jpg" width="10" height="10">';

//Valor del Impuesto
$IGV = 0.18;

//Mes actual
$mes_actual = substr($fecha_actual, 3, 2);
$dia_actual = substr($fecha_actual, 0, 2);

function convertir_especiales_html($str) {
	if (!isset($GLOBALS["carateres_latinos"])) {
		$todas = get_html_translation_table(HTML_ENTITIES, ENT_NOQUOTES);
		$etiquetas = get_html_translation_table(HTML_SPECIALCHARS, ENT_NOQUOTES);
		$GLOBALS["carateres_latinos"] = array_diff($todas, $etiquetas);
	}
	$str = strtr($str, $GLOBALS["carateres_latinos"]);
	return $str;
}

function validar_fecha($fecha) {
	$arr_fecha = explode('-', $fecha);

	$d = $arr_fecha[2] * 1;
	$m = $arr_fecha[1] * 1;
	$a = $arr_fecha[0] * 1;

	if (checkdate($m, $d, $a)) {
		return "'$fecha'";
	} else {
		return 'null';
	}
}

function ver_logo($idempresa, $fecha, $psiconline = '') {

	if ($psiconline != '') {$rutas = '../';} else { $rutas = '../../';}

	//if($idempresa == '7' && $fecha >= '2017-01-02'){
	if ($fecha >= '2017-01-02') {
		$logo = '<img src=' . $rutas . 'images/logo/clinica.jpg border="0">';
	} else {
		$logo = '<img src=' . $rutas . 'images/logo/cerro_verde.jpg width="80" height="53">';
	}
	return $logo;
}
/*function ver_auditoria($idcomprobante){

$query_contact=mysql_query("SELECT
fecha as valor,fecha_auditar as fecha
FROM
auditoria_comprobante
where idcomprobante='$idcomprobante'
GROUP BY fecha") or die(mysql_error());
//$verregistro = '';
$numaudit = mysql_num_rows($query_contact);
if ($numaudit>=2){
$verregistro = 'on';
}
mysql_free_result($query_contact);

return $verregistro;
}*/
function ver_empresasub($idcomprobante, $tipo = '') {
	$sql = "SELECT
t1.idempresa,
t2.descripcion
,t1.idsubcontrata
,t1.idsubcontrata2
,t1.nombresubcontrata
FROM
comprobante t1
LEFT JOIN empresa t2 ON t1.idempresa = t2.idempresa
WHERE
idcomprobante = '$idcomprobante'
and t1.estado in(1,4)";
	//echo $sql;
	$query = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_array($query);
	$descripcion = $row["descripcion"];
	$nombresubcontrata = $row["nombresubcontrata"];

	$idempresa1 = $row["idempresa"];
	$idsubcontrata = $row["idsubcontrata"];
	$idsubcontrata2 = $row["idsubcontrata2"];
	if ($tipo == '1') {
		$descripcion = '';
		$sqlee = "SELECT descripcion FROM empresa WHERE idempresa = '$idsubcontrata'";
		$queryee = mysql_query($sqlee) or die(mysql_error());
		$rowee = mysql_fetch_array($queryee);
		$descripcion = $rowee["descripcion"];

		if (trim($nombresubcontrata) != '') {
			$descripcion .= " / " . $nombresubcontrata;
		}
	} else {
		if ($idsubcontrata != '') {
			$sqlee2 = "SELECT descripcion FROM empresa WHERE idempresa = '$idsubcontrata'";
			$queryee2 = mysql_query($sqlee2) or die(mysql_error());
			$rowee2 = mysql_fetch_array($queryee2);
			$descripcion = $rowee2["descripcion"];
		}
		if (trim($nombresubcontrata) != '') {
			$descripcion .= " / " . $nombresubcontrata;
		}
	}

	return $descripcion;
}
//Esta fuuncion solo se usa para protocolo
function novervisita($fecha) {
	$vercambio = false;
	/*if($fecha >= '2017-01-01'){
		$vercambio = true;
	}*/
	return $vercambio;
}

//Esta fuuncion solo se usa para ver la sede solo soporte mediweb
function versede($usuario, $local = '') {
	$sede = false;
	if ($usuario == '1' || $local == '1') {
		$sede = true;
	}
	return $sede;
}
//
function cambio_audio($fecha, $tipo = '', $idtipof = '') {
	$varcambio = false;
	if (($fecha >= '2017-09-30') || ($idtipof != 2 && $tipo == 'on')) {
		$varcambio = true;
	}
	return $varcambio;
}
/*ESTAS FUNCIONES DE CORTE DE FECHA PARA NUEVOS CAMBIOS EN CITA NUEVOS PERFILES*/
//Esta fuuncion habilita los nuevos perfil y cambios
function habperfiles($valor, $fecha = '') {
	$vercambio = false;
	if ( /*$fecha >= '2017-01-01'*/$valor == 'on') {
		$vercambio = true;
	}
	return $vercambio;
}
//Esta fuuncion es para habilitar los nuevos perfiles
function cambioperfiles($fecha, $idemp = '') {
	$hab = false;
	if ($fecha >= '2017-10-01' && $idemp == 7) {
		$hab = true;
	}
	return $hab;
}
function equilocal($idciudad, $tipo = '') {
	if ($tipo == '1') {
		if ($idciudad == '2') {
//arequipa
			$local = '1';
		} elseif ($idciudad == '6') {
//lima
			$local = '2';
		} else {
			$local = '1';
		}
	} elseif ($tipo == '2') {
		if ($idciudad == '1') {
//arequipa
			$local = '2';
		} elseif ($idciudad == '2') {
//lima
			$local = '6';
		} else {
			$local = '2';
		}
	}
	return $local;
}
function cambio_formato($fecha) {
	$vercambio = false;
	//if($fecha >= '2017-03-13'){
	if ($fecha >= '2017-07-03') {
		$vercambio = true;
	}
	//$vercambio = true;
	return $vercambio;
}
function cortews($fecha) {
	$fcortews = true;
	if ($fecha >= '2017-10-08') {
		$fcortews = false;
	}
	return $fcortews;
}
function cambio_formato2($fecha) {
	$vercambio = false;
	//if($fecha >= '2017-04-06'){
	if ($fecha >= '2017-07-03') {
		$vercambio = true;
	}
	//$vercambio = true;
	return $vercambio;
}
function bloquear_caja($accion, $idemp, $tipocita, $factu = '', $tipopago = '') {
	$readblock = '';
	if ((isset($accion) && $idemp == '7' && $tipocita == '1') || $factu == '1' || $tipopago == 'CREDITO') {
		$readblock = 'readonly';
	}
	return $readblock;
}
function ocultar_campo($fechacorte) {
	$ocultarnone = true;
	global $Fecha_actual;
	if ($fechacorte <= $Fecha_actual) {
		$ocultarnone = false;
	} //$ocultarnone = true;
	return $ocultarnone;
}

function probable_parto($fechaur) {
	$resultado = mysql_query("SELECT extract(day from ADDDATE('$fechaur', INTERVAL 7 DAY)) as diapreparto,extract(month from ADDDATE('$fechaur', INTERVAL 7 DAY)) as mespreparto");
	$linea = mysql_fetch_array($resultado);
	$diapreparto = $linea["diapreparto"];
	$mespreparto = $linea["mespreparto"];
//$mespreparto=substr($fechaur,5,2);
	$aniopreparto = substr($fechaur, 0, 4);
	$preparto = $aniopreparto . '-' . $mespreparto . '-' . $diapreparto;

	$resultparto = mysql_query("SELECT extract( month from ADDDATE('$preparto', INTERVAL -3 MONTH))as mesparto, extract(day from ADDDATE('$preparto', INTERVAL -3 MONTH)) as diaparto");
	$rowparto = mysql_fetch_array($resultparto);
	$diaparto = $rowparto["diaparto"];
	$mesparto = $rowparto["mesparto"];
	if (($mesparto < $mespreparto)) {$anioparto = $aniopreparto + 1;} else { $anioparto = $aniopreparto;}
	if ($diaparto < 10) {$diaparto = '0' . $diaparto;}
	if ($mesparto < 10) {$mesparto = '0' . $mesparto;}
	$fechaparto = $diaparto . '-' . $mesparto . '-' . $anioparto;
	return $fechaparto;
}

function edad_gestacional($fechaat, $fechaur) {
	$resultparto = mysql_query("select (DATEDIFF('$fechaat','$fechaur')div 7) as edadgestacional");
	$rowparto = mysql_fetch_array($resultparto);
	$edadgestacional = $rowparto["edadgestacional"];
	return $edadgestacional;
}
/////////////////////////////////////////////////////////////////////
/////// Funcion para insertar la fecha a la base de datos desde que se recoge del formulario
////////////////////////////////////////////////////////////////////
function insertar_fecha($fecha) {
	$ano1 = substr($fecha, 6, 4);
	$mes1 = substr($fecha, 3, 2);
	$dia1 = substr($fecha, 0, 2);
	$fecha_lista = $ano1 . '-' . $mes1 . '-' . $dia1;
	return $fecha_lista;
}
//////////////Fin de Funcion

////////////////////////////////////////////////////////////////////////
////// Funcion para convertir fecha y mostrarla desde la base de datos
////////////////////////////////////////////////////////////////////////
function mostrar_fecha($fecha) {
	$ano1 = substr($fecha, 0, 4);
	$mes1 = substr($fecha, 5, 2);
	$dia1 = substr($fecha, 8, 2);
	$fecha_lista = $dia1 . '-' . $mes1 . '-' . $ano1;
	return $fecha_lista;
}
//////////////Fin de Función

function db_resultado_to_array($resultado) {
	$resultado_array = array();

	for ($count = 0; $row = @mysql_fetch_array($resultado); $count++) {
		$resultado_array[$count] = $row;
	}

	return $resultado_array;
}

function obtener_id($campo1, $campo2, $tabla) {
	$query = "select $campo1,$campo2 from $tabla";
	$resultado = @mysql_query($query);

	if (!$resultado) {
		return false;
	}

	$num_ids = @mysql_num_rows($resultado);

	if ($num_ids == 0) {
		return false;
	}

	$resultado = db_resultado_to_array($resultado);

	return $resultado;
}
//Fin de las funciones para exatraer id y descripcion de otra tabla
///fx  combo

//Funcion para obtener un combobox con un parametro de condicion
function obtener_id_condicion($campo1, $campo2, $tabla, $campocondicion, $valorcondicion) {
	$query = "select $campo1,$campo2 from $tabla where $campocondicion='$valorcondicion'";
	$resultado = @mysql_query($query);

	if (!$resultado) {
		return false;
	}

	$num_ids = @mysql_num_rows($resultado);

	if ($num_ids == 0) {
		return false;
	}

	$resultado = db_resultado_to_array($resultado);

	return $resultado;
}
//Funcion para obtener un combobox con dos parametros de condicion
function obtener_id_condicion2($campo1, $campo2, $tabla, $campocondicion, $valorcondicion, $campocondicion2, $valorcondicion2) {
	$query = "select $campo1,$campo2 from $tabla where $campocondicion='$valorcondicion' and $campocondicion2='$valorcondicion2'";
	$resultado = @mysql_query($query);

	if (!$resultado) {
		return false;
	}

	$num_ids = @mysql_num_rows($resultado);

	if ($num_ids == 0) {
		return false;
	}

	$resultado = db_resultado_to_array($resultado);

	return $resultado;
}

function obtener_id_condicion3($campo1, $campo2, $tabla, $campocondicion, $valorcondicion, $campocondicion2, $valorcondicion2, $campocondicion3, $valorcondicion3) {
	$query = "select $campo1,$campo2 from $tabla where $campocondicion='$valorcondicion' and $campocondicion2='$valorcondicion2' and $campocondicion3='$valorcondicion3'";
	$resultado = @mysql_query($query);

	if (!$resultado) {
		return false;
	}

	$num_ids = @mysql_num_rows($resultado);

	if ($num_ids == 0) {
		return false;
	}

	$resultado = db_resultado_to_array($resultado);

	return $resultado;
}
function obtener_id_condicion4($campo1, $campo2, $tabla, $campocondicion, $valorcondicion, $campocondicion2, $valorcondicion2, $campocondicion3, $valorcondicion3, $campocondicion4, $valorcondicion4) {
	$query = "select $campo1,$campo2 from $tabla where $campocondicion='$valorcondicion' and $campocondicion2='$valorcondicion2' and $campocondicion3='$valorcondicion3' and $campocondicion4='$valorcondicion4'";
	$resultado = @mysql_query($query);

	if (!$resultado) {
		return false;
	}

	$num_ids = @mysql_num_rows($resultado);

	if ($num_ids == 0) {
		return false;
	}

	$resultado = db_resultado_to_array($resultado);

	return $resultado;
}
//Fin de procedimiento
function redondeado($numero, $decimales) {
	$factor = pow(10, $decimales);
	return (round($numero * $factor) / $factor);}

function mkfecha($fec) {
	$dia = substr($fec, 0, 2);
	$mes = substr($fec, 3, 3);
	$year = substr($fec, 7, 4);
	switch ($mes) {
	case "Ene": // Bloque 1
		$mes = "01";
		break;
	case "Feb": // Bloque 1
		$mes = "02";
		break;
	case "Mar": // Bloque 1
		$mes = "03";
		break;
	case "Abr": // Bloque 1
		$mes = "04";
		break;
	case "May": // Bloque 1
		$mes = "05";
		break;
	case "Jun": // Bloque 1
		$mes = "06";
		break;
	case "Jul": // Bloque 1
		$mes = "07";
		break;
	case "Ago": // Bloque 1
		$mes = "08";
		break;
	case "Set": // Bloque 1
		$mes = "09";
		break;
	case "Oct": // Bloque 1
		$mes = "10";
		break;
	case "Nov": // Bloque 1
		$mes = "11";
		break;
	case "Dic": // Bloque 1
		$mes = "12";
		break;
	}
	return $year . "-" . $mes . "-" . $dia;
}

function mkfecha1($fec) {
	$partes = explode("-", $fec);
	$fec = $partes[2] . "-" . $partes[1] . "-" . $partes[0];
	return $fec;
}

function umkfecha1($fec) {
	$partes = explode("-", $fec);
	$fec = $partes[2] . "-" . $partes[1] . "-" . $partes[0];
	return $fec;
}

function umkfecha($fec) {
	$dia = substr($fec, 8, 2);
	$mes = substr($fec, 5, 2);
	$yy = substr($fec, 0, 4);
	switch ($mes) {
	case "01": // Bloque 1
		$mes = "Ene";
		break;
	case "02": // Bloque 1
		$mes = "Feb";
		break;
	case "03": // Bloque 1
		$mes = "Mar";
		break;
	case "04": // Bloque 1
		$mes = "Abr;
		 break";
	case "05": // Bloque 1
		$mes = "May";
		break;
	case "06": // Bloque 1
		$mes = "Jun";
		break;
	case "07": // Bloque 1
		$mes = "Jul";
		break;
	case "08": // Bloque 1
		$mes = "Ago";
		break;
	case "09": // Bloque 1
		$mes = "Set";
		break;
	case "10": // Bloque 1
		$mes = "Oct";
		break;
	case "11": // Bloque 1
		$mes = "Nov";
		break;
	case "12": // Bloque 1
		$mes = "Dic";
		break;
	}
	return $dia . "-" . $mes . "-" . $yy;
}

function countDaysmio($beg1, $end1) {
	$beg1 = explode("-", $beg1);
	$beg['YEAR'] = $beg1[0];
	$beg['MONTH'] = $beg1[1];
	$beg['DAY'] = $beg1[2];
	$end1 = explode("-", $end1);
	$end['YEAR'] = $end1[0];
	$end['MONTH'] = $end1[1];
	$end['DAY'] = $end1[2];

	$start = gmmktime(0, 0, 0, $beg['MONTH'], $beg['DAY'], $beg['YEAR']);
	$endin = gmmktime(0, 0, 0, $end['MONTH'], $end['DAY'], $end['YEAR']);

	$day = 0;

	if ($start < $endin) {
		$toward = 1;
	} else {
		$toward = 0;
	}

	$mover = $start;

	if ($start != $endin) {
		//original !=

		do {
			$day++;
			if ($toward) {
				$mover = gmmktime(0, 0, 0, $beg['MONTH'], ($beg['DAY'] + $day), $beg['YEAR']);
			} else {
				$mover = gmmktime(0, 0, 0, $beg['MONTH'], ($beg['DAY'] - $day), $beg['YEAR']);
			}

		} while ($mover != $endin);
	}
	if ($start < $endin) {
		return (1 * $day);
	} else {
		return (-1 * $day);
	}
} //fin de funcion

function countDaysmio1($beg1, $end1) {
	$beg1 = explode("-", $beg1);
	$fn['YEAR'] = $beg1[0];
	$fn['MONTH'] = $beg1[1];
	$fn['DAY'] = $beg1[2];
	$end1 = explode("-", $end1);
	$fa['YEAR'] = $end1[0];
	$fa['MONTH'] = $end1[1];
	$fa['DAY'] = $end1[2];

	if ($fn['YEAR'] != $fa['YEAR']) {
		$lapsoanos = (($fa['YEAR']) - ($fn['YEAR'] + 1)) * 365; //echo $lapsoanos;echo '<br>';
		$lapsoactual = (($fa['MONTH'] - 1) * 30) + $fa['DAY']; //echo $lapsoactual;echo '<br>';
		$lapsonac = 365 - ((($fn['MONTH'] - 1) * 30) + $fn['DAY']); //echo $lapsonac;echo '<br>';
		return $lapsoanos + $lapsoactual + $lapsonac;
	}
} //fin de funcion

//echo(toyear('1969-03-27','2006-03-27'));echo '<br>';
function toyear($fecnac, $fecact) {
	list($ano, $mes, $dia) = explode("-", $fecact);
	list($anonaz, $mesnaz, $dianaz) = explode("-", $fecnac);

	if (($mesnaz == $mes) && ($dianaz > $dia)) {$ano = ($ano - 1);}
	if ($mesnaz > $mes) {$ano = ($ano - 1);}
	$edad = ($ano - $anonaz);
	return $edad;
}

function tomes($fecnac, $fecact) {
	$fn = explode("-", $fecnac);
	If ($fn[0] <= 1969) {
		$diasrestantes = countDaysmio1($fecnac, $fecact);
		$meses = bcdiv($diasrestantes, 30, 2);
		$meses = floor($meses);
		return $meses;
	} else {
		$diasrestantes = countDaysmio($fecnac, $fecact);
		$meses = bcdiv($diasrestantes, 30, 2);
		$meses = floor($meses);
		return $meses;
	}
}

function today($fecnac, $fecact) {
	$fn = explode("-", $fecnac);
	If ($fn[0] <= 1969) {
		$diasrestantes = countDaysmio1($fecnac, $fecact);
		$dias = $diasrestantes;
		return $dias;
	} else {
		$diasrestantes = countDaysmio($fecnac, $fecact);
		$dias = $diasrestantes;
		return $dias;
	}
}

function solotoyear($fecnac, $fecact) {

	/* $fn=explode("-",$fecnac);$fn[0];
		  If ($fn[0]<=1969){
		    $diasrestantes=countDaysmio1($fecnac,$fecact) ;
		    $anos= bcdiv($diasrestantes, 365, 2);
		    $anos=floor($anos);
		    return $anos;
		  }else{
		    $diasrestantes=countDaysmio($fecnac,$fecact) ;
		    $anos= bcdiv($diasrestantes, 365, 2);
		    $anos=floor($anos);
		    return $anos;
	*/
	list($anio, $mes, $dia) = explode("-", $edad);
	$anio_dif = date("Y") - $anio;
	$mes_dif = date("m") - $mes;
	$dia_dif = date("d") - $dia;
	if ($dia_dif < 0 || $mes_dif < 0) {
		$anio_dif--;
	}

	return $anio_dif;
}

function solotomes($fecnac, $fecact) {
	$fn = explode("-", $fecnac);
	If ($fn[0] <= 1969) {
		$diasrestantes = countDaysmio1($fecnac, $fecact);
		$anos = solotoyear($fecnac, $fecact);
		$parames = $diasrestantes - ($anos * 365);
		$meses = bcdiv($parames, 30, 2);
		$meses = floor($meses);
		return $meses;
	} else {
		$diasrestantes = countDaysmio($fecnac, $fecact);
		$anos = solotoyear($fecnac, $fecact);
		$parames = $diasrestantes - ($anos * 365);
		$meses = bcdiv($parames, 30, 2);
		$meses = floor($meses);
		return $meses;
	}
}

function solotoday($fecnac, $fecact) {
	$fn = explode("-", $fecnac);
	If ($fn[0] <= 1969) {
		$diasrestantes = countDaysmio1($fecnac, $fecact);
		$años = solotoyear($fecnac, $fecact);
		$meses = solotomes($fecnac, $fecact);
		$dias = $diasrestantes - (($años * 365) + ($meses * 30));
		//$dias=$diasrestantes;
		return $dias;
	} else {
		$diasrestantes = countDaysmio($fecnac, $fecact);
		$años = solotoyear($fecnac, $fecact);
		$meses = solotomes($fecnac, $fecact);
		$dias = $diasrestantes - (($años * 365) + ($meses * 30));
		//$dias=$diasrestantes;
		return $dias;
	}
}
function StartMenu() {
	echo '<table cellpadding="0" cellspacing="0" border="0" width="100%">
        <tr>
          <td bgcolor="#FFFFFF" style="padding-left: 1px; padding-top: 1px; padding-right: 1px; padding-bottom: 0px;">';
}
function PrintMenuTitle($name, $open) {
	global $stylepath, $divNameList;
	// Save a list of Block Names
	if (strlen($divNameList) > 0) {
		$divNameList .= ',';
	}

	$divNameList .= '"' . $name . '"';
	echo '<div class="menutitle" onclick="ToggleDiv(\'' . $name . '\');"><img id="img_' . $name . '" width="11" height="11" src="../../images/' . iif($open, 'closed.gif', 'open.gif') . '" border="0" width="700">&nbsp;' . $name . '</div>
          <div id="div_' . $name . '" style="display:' . iif($open, 'block', 'none') . ';">';
}
function PrintMenuTitle2($name, $unidades, $stock_actual, $stockmin, $open) {
	if (($stock_actual - $stockmin) <= 10) {$imagen = "<IMG src='../../images/mediaalerta.png' width='17' height='17' border='0')>";}
	if ($stock_actual <= $stockmin) {$imagen = "<IMG src='../../images/alerta.gif' width='17' height='17' border='0')>";}

	global $stylepath, $divNameList;
	// Save a list of Block Names
	if (strlen($divNameList) > 0) {
		$divNameList .= ',';
	}

	$divNameList .= '"' . $name . '"';
	echo '<div class="FacetFormTABLE" onclick="ToggleDiv(\'' . $name . '\');"><img id="img_' . $name . '" width="11" height="15" src="../../images/' . iif($open, 'closed.gif', 'open.gif') . '" border="0" width="700">&nbsp;Producto:' . $name . '&nbsp;&nbsp; Stock Actual:' . $stock_actual . ' ' . $unidades . '&nbsp;&nbsp; Stock Minimo:' . $stockmin . ' ' . $unidades . '&nbsp;&nbsp;' . $imagen . '</div>
          <div id="div_' . $name . '" style="display:' . iif($open, 'block', 'none') . ';">';
}
function PrintMenuRow($url, $name) {
	echo '<div class="menulink-normal" onclick="nav_goto(\'' . $url . '\');" onmouseover="this.className=\'menulink-hover\';" onmouseout="this.className=\'menulink-normal\'"><a href="' . $url . '" target="indexright">' . $name . '</a></div>';
}
function EndBlock() {
	echo '</div>';
}
function EndMenu() {
	echo '  </td>
        </tr>
        </table>';
}
function iif($expression, $returntrue, $returnfalse = '') {
	if ($expression == 0) {
		return $returnfalse;
	} else {
		return $returntrue;
	}
}

function contar_repeticiones($array) {
	$repetidos = 0;
	$ya_duplicados = array();
	foreach ($array as $item) {
		for ($u = 0; $u < sizeof($array); $u++) {
			if ($item == $array[$u] && !in_array($item, $ya_duplicados)) {
				++$cont;
			}
		}

		if ($cont >= 2) {
			array_push($ya_duplicados, $item);
			$repetidos++;
		}

		$cont = 0;
	}
	return $repetidos;
}

function bisiesto($anio_actual) {
	$bisiesto = false;
	//probamos si el mes de febrero del año actual tiene 29 días
	if (checkdate(2, 29, $anio_actual)) {
		$bisiesto = true;
	}
	return $bisiesto;
}

function calcular_edaddetallada($fechanacimiento, $fechareal) {
	$fecha_de_nacimiento = $fechanacimiento;
	$fecha_actual = $fechareal;
	//$fecha_actual = date ("2006-03-05"); //para pruebas

	// separamos en partes las fechas
	$array_nacimiento = explode("-", $fecha_de_nacimiento);
	$array_actual = explode("-", $fecha_actual);

	$anos = $array_actual[0] - $array_nacimiento[0]; // calculamos años
	$meses = $array_actual[1] - $array_nacimiento[1]; // calculamos meses
	$dias = $array_actual[2] - $array_nacimiento[2]; // calculamos días

	//ajuste de posible negativo en $días
	if ($dias < 0) {
		--$meses;

		//ahora hay que sumar a $dias los dias que tiene el mes anterior de la fecha actual
		switch ($array_actual[1]) {
		case 1:$dias_mes_anterior = 31;
			break;
		case 2:$dias_mes_anterior = 31;
			break;
		case 3:
			if (bisiesto($array_actual[0])) {
				$dias_mes_anterior = 29;
				break;
			} else {
				$dias_mes_anterior = 28;
				break;
			}
		case 4:$dias_mes_anterior = 31;
			break;
		case 5:$dias_mes_anterior = 30;
			break;
		case 6:$dias_mes_anterior = 31;
			break;
		case 7:$dias_mes_anterior = 30;
			break;
		case 8:$dias_mes_anterior = 31;
			break;
		case 9:$dias_mes_anterior = 31;
			break;
		case 10:$dias_mes_anterior = 30;
			break;
		case 11:$dias_mes_anterior = 31;
			break;
		case 12:$dias_mes_anterior = 30;
			break;
		}

		$dias = $dias + $dias_mes_anterior;
	}

	//ajuste de posible negativo en $meses
	if ($meses < 0) {
		--$anos;
		$meses = $meses + 12;
	}

	$edad = $anos . 'a ' . $meses . 'm ' . $dias . 'd';

	return $edad;

}

function cambiarMayus($texto, $tipo = 'M', $p = 0) {
	$min = array("á", "é", "í", "ó", "ú", "ñ");
	$may = array("Á", "É", "Í", "Ó", "Ú", "Ñ");

	//$texto=utf8_decode($texto);

	if ($tipo == 'M') {
		$texto = strtoupper($texto);
		$texto = str_replace("Ê", "Ú", $texto);
		$texto = str_replace($min, $may, $texto);
	} elseif ($tipo == 'm') {

		$texto = mb_strtolower($texto, 'UTF-8');
		$texto = str_replace($may, $min, $texto);
		//$texto=str_replace($may,$min,$texto);
	}
	if ($p == 1) {
		$texto = ucwords($texto);
	}
	//$texto=utf8_encode("ó");
	return $texto;
}

function mostrar_mes($dd) {
	switch ($dd) {
	case "1": // Bloque 1
		$mes = "Ene";
		break;
	case "2": // Bloque 1
		$mes = "Feb";
		break;
	case "3": // Bloque 1
		$mes = "Mar";
		break;
	case "4": // Bloque 1
		$mes = "Abr";
		break;
	case "5": // Bloque 1
		$mes = "May";
		break;
	case "6": // Bloque 1
		$mes = "Jun";
		break;
	case "7": // Bloque 1
		$mes = "Jul";
		break;
	case "8": // Bloque 1
		$mes = "Ago";
		break;
	case "9": // Bloque 1
		$mes = "Set";
		break;
	case "10": // Bloque 1
		$mes = "Oct";
		break;
	case "11": // Bloque 1
		$mes = "Nov";
		break;
	case "12": // Bloque 1
		$mes = "Dic";
		break;
	}
	return $mes;
}
function mostrar_mes_completo($dd) {
	switch ($dd) {
	case "1": // Bloque 1
		$mes = "Enero";
		break;
	case "2": // Bloque 1
		$mes = "Febrero";
		break;
	case "3": // Bloque 1
		$mes = "Marzo";
		break;
	case "4": // Bloque 1
		$mes = "Abril";
		break;
	case "5": // Bloque 1
		$mes = "Mayo";
		break;
	case "6": // Bloque 1
		$mes = "Junio";
		break;
	case "7": // Bloque 1
		$mes = "Julio";
		break;
	case "8": // Bloque 1
		$mes = "Agosto";
		break;
	case "9": // Bloque 1
		$mes = "Septiembre";
		break;
	case "10": // Bloque 1
		$mes = "Octubre";
		break;
	case "11": // Bloque 1
		$mes = "Noviembre";
		break;
	case "12": // Bloque 1
		$mes = "Diciembre";
		break;
	}
	return $mes;
}

function mostrar_medida($dd) {
	switch ($dd) {
	case "1": // Bloque 1
		$medida = "20/20";
		break;
	case "2": // Bloque 1
		$medida = "20/30";
		break;
	case "3": // Bloque 1
		$medida = "20/40";
		break;
	case "4": // Bloque 1
		$medida = "20/50";
		break;
	case "5": // Bloque 1
		$medida = "20/70";
		break;
	case "6": // Bloque 1
		$medida = "20/100";
		break;
	case "7": // Bloque 1
		$medida = "20/200";
		break;
	case "8": // Bloque 1
		$medida = "CD";
		break;
	case "9": // Bloque 1
		$medida = "NM";
		break;
	case "10": // Bloque 1
		$medida = "NPL";
		break;

	}
	return $medida;
}
function compararFechas($primera, $segunda) {
	//fecha dd-mm-aaaa
	$valoresPrimera = explode("-", $primera);
	$valoresSegunda = explode("-", $segunda);

	$diaPrimera = $valoresPrimera[0];
	$mesPrimera = $valoresPrimera[1];
	$anyoPrimera = $valoresPrimera[2];

	$diaSegunda = $valoresSegunda[0];
	$mesSegunda = $valoresSegunda[1];
	$anyoSegunda = $valoresSegunda[2];

	$diasPrimeraJuliano = gregoriantojd($mesPrimera, $diaPrimera, $anyoPrimera);
	$diasSegundaJuliano = gregoriantojd($mesSegunda, $diaSegunda, $anyoSegunda);

	if (!checkdate($mesPrimera, $diaPrimera, $anyoPrimera)) {
		// "La fecha ".$primera." no es v&aacute;lida";
		return 0;
	} elseif (!checkdate($mesSegunda, $diaSegunda, $anyoSegunda)) {
		// "La fecha ".$segunda." no es v&aacute;lida";
		return 0;
	} else {
		return $diasPrimeraJuliano - $diasSegundaJuliano;
	}
}

function compararFechas2($primera, $segunda) {
	$segundos = strtotime($primera) - strtotime($segunda);
	$diferencia_dias = intval($segundos / 60 / 60 / 24);
	return $diferencia_dias;
}

function mover_archivo($carpeta, $txt_archivo, $idformato, $i) {

	$nombre_archivo = $_FILES[$txt_archivo]['name'];

	$ext = end(explode(".", $nombre_archivo));

	if ($ext == '') {
		$ext = end(explode(".", $txt_archivo));
	}

	$nombre = "archivo" . $idformato . "_" . $i . "." . $ext;
	$tipo_archivo = $_FILES[$txt_archivo]['type'];
	$tmp_archivo = $_FILES[$txt_archivo]['tmp_name'];
	$ruta = $carpeta . '/' . $nombre;
	move_uploaded_file($tmp_archivo, $ruta);
	return $ruta;

}

function ver_archivo($descripcion, $idformato, $carpeta, $i) {
	$ext = end(explode(".", $descripcion));
	$ruta = $carpeta . "/archivo" . $idformato . "_" . $i . "." . $ext;
	if (!is_file($ruta)) {
		$ruta = "";
	}
	return $ruta;
}
function ver_archivo2($descripcion, $idformato, $carpeta, $i) {
	$ext = end(explode(".", $descripcion));
	$ruta = $carpeta . "/archivo" . $idformato . "_" . $i . "." . $ext;
	if ($idformato == 0) {
		$ruta = "";
	}
	return $ruta;
}

function apellido_especial($apellidos7) {
	//APELLIDOS CON LETRAS ESPECIALES
	$eap = true;
	$ap = "";
	$am = "";
	//$apellidos="DE LA CRUZ MONTALVO";
	//$apellidos="MONTALVO DE LA CRUZ";
	$arr_apellidos = explode(" ", $apellidos7);
	$c_apellidos = count($arr_apellidos);
	$arr_especiales = array("DE", "LA", "DEL", "LAS", "LOS", "SAN", "DA");
	$apellido_especial = array();
	$ape_esp = 0;

	for ($i = 0; $i < $c_apellidos; $i++) {
		if ($i == 0) {
			if (in_array($arr_apellidos[$i], $arr_especiales) === false) {
				$eap = false;
			}
			$ap = $arr_apellidos[$i] . " ";
		} else {
			if ($eap) {
				$ap .= $arr_apellidos[$i] . " ";
			} else {
				$am .= $arr_apellidos[$i] . " ";
			}

			if (in_array($arr_apellidos[$i], $arr_especiales) === false && in_array($arr_apellidos[$i + 1], $arr_especiales) === false) {
				$eap = false;
			}
		}
	}
	$apellido_especial[0] = $ap;
	$apellido_especial[1] = $am;
	return $apellido_especial;
	//APELLIDOS CON LETRAS ESPECIALES
}

function calcula_tiempo($start_time, $end_time) {
	$total_seconds = strtotime($end_time) - strtotime($start_time);
	$horas = floor($total_seconds / 3600);
	$minutes = (($total_seconds / 60) % 60);
	$seconds = ($total_seconds % 60);

	$time['horas'] = str_pad($horas, 2, "0", STR_PAD_LEFT);
	$time['minutes'] = str_pad($minutes, 2, "0", STR_PAD_LEFT);
	$time['seconds'] = str_pad($seconds, 2, "0", STR_PAD_LEFT);

	$time = implode(':', $time);

	return $time;
}

function calcula_tiempo2($start_time) {
	$total_seconds = strtotime($start_time);
	$horas = floor($total_seconds / 3600);
	$minutes = (($total_seconds / 60) % 60);
	$seconds = ($total_seconds % 60);

	$time['horas'] = str_pad($horas, 2, "0", STR_PAD_LEFT);
	$time['minutes'] = str_pad($minutes, 2, "0", STR_PAD_LEFT);
	$time['seconds'] = str_pad($seconds, 2, "0", STR_PAD_LEFT);

	$time = implode(':', $time);

	return $time;
}

function obt_letra($mayus = 'M') {
	$letras = ",A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z";
	if ($mayus == 'm') {
		$letras = strtolower($letras);
	}

	$array_letras = explode(",", $letras);
	$array_result = array();
	$i_cant = count($array_letras);
	$j_cant = count($array_letras);
	$k_cant = count($array_letras);
	for ($i = 0; $i < $i_cant; $i++) {
		for ($j = 0; $j < $j_cant; $j++) {
			for ($k = 1; $k < $k_cant; $k++) {
				$array_result[] = $array_letras[$i] . $array_letras[$j] . $array_letras[$k];
				//echo $array_letras[$i].$array_letras[$j].$array_letras[$k]."<br>";
			}
		}
	}
	return $array_result;
}

function separar_apellidos($apellidos) {
	$eap = true;
	$ap = "";
	$am = "";
	$arr_apellidos = explode(" ", $apellidos);
	$c_apellidos = count($arr_apellidos);
	$arr_especiales = array("DE", "LA", "DEL", "LAS", "LOS", "SAN", "DA");

	for ($i = 0; $i < $c_apellidos; $i++) {
		if ($i == 0) {
			if (in_array($arr_apellidos[$i], $arr_especiales) === false) {
				$eap = false;
			}
			$ap = $arr_apellidos[$i] . " ";
		} else {
			if ($eap) {
				$ap .= $arr_apellidos[$i] . " ";
			} else {
				$am .= $arr_apellidos[$i] . " ";
			}

			if (in_array($arr_apellidos[$i], $arr_especiales) === false && in_array($arr_apellidos[$i + 1], $arr_especiales) === false) {
				$eap = false;
			}
		}
	}
	return array($ap, $am);
}

function obt_letra_xls($mayus = 'M') {
	$letras = ",A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z";
	if ($mayus == 'm') {
		$letras = strtolower($letras);
	}

	$array_letras = explode(",", $letras);
	$array_result = array();
	$i_cant = count($array_letras);
	$j_cant = count($array_letras);
	$k_cant = count($array_letras);
	for ($i = 0; $i < $i_cant; $i++) {
		for ($j = 0; $j < $j_cant; $j++) {
			for ($k = 1; $k < $k_cant; $k++) {
				$array_result[] = $array_letras[$i] . $array_letras[$j] . $array_letras[$k];
				//echo $array_letras[$i].$array_letras[$j].$array_letras[$k]."<br>";
			}
		}
	}
	return $array_result;
}

function getFirma($iddoctor) {
	$ruta = "../../firmas/" . $iddoctor . ".jpg";
	if (is_file($ruta)) {$firma = '<img src="' . $ruta . '">';} else { $firma = '';}
	return $firma;
}

function operar_fecha($fecha, $tiempo) {
	$arr_fecha = explode("-", $fecha);
	$dd = $arr_fecha[0];
	$mm = $arr_fecha[1];
	$aa = $arr_fecha[2];
	if (!checkdate($mm, $dd, $aa)) {
		$dd = $arr_fecha[2];
		$mm = $arr_fecha[1];
		$aa = $arr_fecha[0];
	}

	$Fecha = date("$aa-$mm-$dd");
	$nuevafecha = strtotime($tiempo, strtotime($Fecha));
	$nuevafecha = date('d-m-Y', $nuevafecha);

	return $nuevafecha;
}

function combinar_celdas($columna_ini, $fila_ini, $c_columnas, $c_filas) {
	$fila_fin = $fila_ini * 1 + $c_filas * 1;
	$columna_fin = $columna_ini;
	for ($i = 0; $i < $c_columnas; $i++) {
		$columna_fin++;
	}

	$rango = "$columna_ini$fila_ini:$columna_fin$fila_fin";
	$columna = $columna_fin;
	$columna++;
	return array('rango' => $rango, 'columna' => $columna);
}

function calcular_tiempo($mesi, $anioi, $mesf, $aniof) {
	$difmes = '';
	if ($mesi == '') {
		$mesi = '1';
	}

	if ($mesf == '') {
		$mesf = '1';
	}

	if (($mesi != '') && ($anioi != '') && ($mesf != '') && ($aniof != '')) {
		if ($anioi == $aniof) {
			$difmes = $mesf * 1 - $mesi * 1;
		} else {
			if ($mesf >= $mesi) {
				$difmes = ($aniof - $anioi) * 12 + ($mesf * 1 - $mesi * 1);
			} else {
				$difmes = ($aniof - $anioi - 1) * 12 + (12 - $mesi * 1 + $mesf * 1);
			}
		}
	}
	return tiempo_meses($difmes);
}

function tiempo_meses($tiempo) {
	if ($tiempo * 1 > 0) {
		$a = (($tiempo * 1) / 12) . '';
		$arr = explode('.', $a);
		$m = $tiempo % 12;
		$a = $arr[0] * 1;

		if ($m > 0) {
			if ($a > 0) {
				if ($m == 1) {
					$m = ' y ' . $m . ' MES';
				} else {
					$m = ' y ' . $m . ' MESES';
				}

			} else {
				if ($m == 1) {
					$m = ' ' . $m . ' MES';
				} else {
					$m = ' ' . $m . ' MESES';
				}

			}
		} else {
			$m = '';
		}
		if ($a > 0) {
			if ($a == 1) {
				$a = $a . ' A&Ntilde;O';
			} else {
				$a = $a . ' A&Ntilde;OS';
			}

		} else {
			$a = '';
		}
		return $a . $m;
	} else {
		return "";
	}
}
function obt_sexo($sexo) {
	if ($sexo == 'M') {
		return 'MASCULINO';
	} elseif ($sexo == 'F') {
		return 'FEMENINO';
	}
}

function obt_ecivil($estadocivil) {
	if ($estadocivil == '1') {
		return "SOLTERO";
	} elseif ($estadocivil == '2') {
		return "CASADO";
	} elseif ($estadocivil == '3') {
		return "DIVORCIADO";
	} elseif ($estadocivil == '4') {
		return "VIUDO";
	} elseif ($estadocivil == '5') {
		return "CONVIVIENTE";
	}
}

function obt_gradoins($gradoins) {
	if ($gradoins == '1') {
		return "ANALFABETO";
	} elseif ($gradoins == '2') {
		return "PRIMARIA COMPLETA";
	} elseif ($gradoins == '3') {
		return "PRIMARIA INCOMPLETA";
	} elseif ($gradoins == '4') {
		return "SECUNDARIA COMPLETA";
	} elseif ($gradoins == '5') {
		return "SECUNDARIA INCOMPLETA";
	} elseif ($gradoins == '6') {
		return "TECNICO COMPLETO";
	} elseif ($gradoins == '7') {
		return "UNIVERSITARIO COMPLETO";
	} elseif ($gradoins == '8') {
		return "TECNICO INCOMPLETO";
	} elseif ($gradoins == '9') {
		return "UNIVERSITARIO INCOMPLETO";
	}
}

function ObtenerHuella($idpaciente, $fecha, $idcomprobante) {
	$query = mysql_query("SELECT idhuella_historial,huella,firma,foto FROM huella_historial WHERE idpaciente='$idpaciente' and fecha='$fecha' AND estado=1;") or die(mysql_error());
	//echo "SELECT * FROM huella_historial WHERE idpaciente='$idpaciente' and fecha<='$fecha';";
	return $query;
}
function ObtenerHuella2($idpaciente, $fecha, $idcomprobante) {
	$query = mysql_query("SELECT idhuella_historial,huella,firma,foto FROM huella_historial WHERE idpaciente='$idpaciente' and fecha='$fecha' AND estado=1 AND idcomprobante='$idcomprobante';") or die(mysql_error());
	//echo "SELECT * FROM huella_historial WHERE idpaciente='$idpaciente' and fecha<='$fecha';";
	return $query;
}
function obtener_fechaFacturacion($fecha, $fecha_iniciof, $periodo_facturacion) {
	//global $Fecha_actual;
	if ($periodo_facturacion == '7') {
		$mod = compararFechas2(mostrar_fecha($fecha), mostrar_fecha($fecha_iniciof)) * 1 % 7;
		$dias = 7 - $mod;

		$fecha_facturacion = insertar_fecha(operar_fecha($fecha, "+$dias DAY"));

	} elseif ($periodo_facturacion == '15') {
		$arr_ff = explode('-', $fecha);
		$dd = $arr_ff[2];
		$mm = $arr_ff[1];
		$aa = $arr_ff[0];

		if ($dd <= 15) {
			$dd = 16;
		} else {
			$dd = '01';
			if ($mm == 12) {
				$mm = '01';
				$aa = $aa * 1 + 1;
			} else {
				$mm = str_pad($mm * 1 + 1, 2, '0', STR_PAD_LEFT);
			}
		}
		$fecha_facturacion = "$aa-$mm-$dd";
	} elseif ($periodo_facturacion == '30') {
		$arr_ff = explode('-', $fecha);
		$dd = $arr_ff[2];
		$mm = $arr_ff[1];
		$aa = $arr_ff[0];

		$fecha_facturacion = insertar_fecha(operar_fecha("$aa-$mm-01", '+1 MONTH'));
	}

	return $fecha_facturacion;
}

function pie_pagina1($fechac, $num) {
	$fecha1 = '2016-07-15';

	if ($num == '1') {
		if ($fechac > $fecha1) {
			$pie_pagina = "<em>Datos del Formato:<br> Versión 03, Fecha: 27 de Junio 2016</em>";
		} else {
			$pie_pagina = "<em>Datos del Formato:<br> Versión 01, Fecha 18 de Diciembre 2012</em>";
		}
	}
	if ($num == '2') {
		if ($fechac > $fecha1) {
			$pie_pagina = "<em>Datos del Formato:<br> Versión 03, Fecha: 27 de Junio 2016</em>";
		} else {
			$pie_pagina = "	<em>Datos del formato:<BR>
	  Versión 01, Fecha: 14 de Marzo 2014
        </em>";
		}
	}

	if ($num == '3') {
		if ($fechac > $fecha1) {
			$pie_pagina = "<em>Datos del Formato:<br> Versión 03, Fecha: 27 de Junio 2016</em>";
		}
	}
	if ($num == '4') {
		if ($fechac > $fecha1) {
			$pie_pagina = "<em>Datos del Formato:<br> Versión 03, Fecha: 28 de Abril 2016</em>";
		} else {
			$pie_pagina = "<em>Datos del Formato:<br>
        Versión 02, Fecha: 21 de julio 2014</em>";
		}
	}
	if ($num == '5') {
		if ($fechac > $fecha1) {
			$pie_pagina = "<em>Datos del Formato:<br> Versión 04, Fecha: 27 de Junio 2016</em>";
		} else {
			$pie_pagina = "<em>Datos del Formato:<br>
      Versión 01, Fecha 18 de Diciembre 2012</em>";
		}
	}

	if ($num == '6') {
		if ($fechac > $fecha1) {
			$pie_pagina = "<em>Datos del Formato:<br> Versión 02, Fecha: 27 de Junio 2016</em>";
		} else {
			$pie_pagina = "<em>Datos del Formato:<br> Versión 01, Fecha 18 de Diciembre 2012</em>";
		}
	}

	return $pie_pagina;
}
//corte cerro verde
$fecha_corte_cerro = '2016-07-16';
//
//$fecha_corte_mcerrov2='2017-04-03';
$fecha_corte_mcerrov2 = '2017-07-03';
//$fecha_corte_mcerrov2='2017-06-26';

function obt_firma_topico($iddoctor) {
	/*$filefirma = "../PaquetesMedicos/firmas/".$iddoctor.".jpg";
		if(!is_file($filefirma)){$firma="";}else{$firma='<img src="'.$filefirma.'"  width="170" height="80">';}
	*/
}
function obtener_prd($valor) {
	if ($valor == 'P') {
		return 'Presuntivo';
	} elseif ($valor == 'D') {
		return 'Definitivo';
	} elseif ($valor == 'R') {
		return 'Repetitivo';
	}
}
function ver_gradoins($valor) {
	if ($valor == '1') {
		return 'Analfabeto';
	} elseif ($valor == '2') {
		return 'Primaria Completa';
	} elseif ($valor == '3') {
		return 'Primaria Incompleta';
	} elseif ($valor == '4') {
		return 'Secundaria Completa';
	} elseif ($valor == '5') {
		return 'Secundaria Incompleta';
	} elseif ($valor == '6') {
		return 'Técnico Completo';
	} elseif ($valor == '7') {
		return 'Universitario Completo';
	} elseif ($valor == '8') {
		return 'Técnico Incompleto';
	} elseif ($valor == '9') {
		return 'Universitario Incompleto';
	}
}
function obtener_via_receta($idvia) {
	if ($idvia == '1') {
		$via = 'Oral';
	} elseif ($idvia == '2') {
		$via = 'Sublingual';
	} elseif ($idvia == '3') {
		$via = 'Gastroentérica';
	} elseif ($idvia == '4') {
		$via = 'Rectal';
	} elseif ($idvia == '5') {
		$via = 'Subcutánea';
	} elseif ($idvia == '6') {
		$via = 'Intramuscular';
	} elseif ($idvia == '7') {
		$via = 'Intravenosa';
	} elseif ($idvia == '8') {
		$via = 'Topica';
	} elseif ($idvia == '9') {
		$via = 'Vaginal';
	} else {
		$via = '-';
	}
	return $via;
}
function obt_diagnosticos($db_conexion, $idformato, $idseccion) {
	$sql_hct = "select diagnostico, cie10 from det_diagnostico where idhc_topico = '$idformato' and idseccion = '$idseccion' and diagnostico!=''";

	$query_hct = mysql_query($sql_hct) or die(mysql_error());
	$diagnostico_ac = "";
	while ($row_hct = mysql_fetch_array($query_hct)) {
		$diagnostico = $row_hct['diagnostico'];
		$cie10 = $row_hct['cie10'];
		if ($cie10 != '') {
			$diagnostico_ac .= "($cie10) ";
		}
		$diagnostico_ac .= "$diagnostico; ";
	}
	return $diagnostico_ac;
}
function obt_cies($db_conexion, $idformato, $idseccion) {
	$sql_hct = "select diagnostico, cie10 from det_diagnostico where idhc_topico = '$idformato' and idseccion = '$idseccion'";

	$query_hct = mysql_query($sql_hct);
	$diagnostico_ac = "";
	while ($row_hct = mysql_fetch_array($query_hct)) {
		$cie10 = $row_hct['cie10'];

		$diagnostico_ac .= "($cie10) ; ";
	}
	return $diagnostico_ac;
}
function obt_contingencia($valor) {
	if ($valor == '1') {
		return 'Enfermedad Común';
	} elseif ($valor == '2') {
		return 'Accidente Común';
	} elseif ($valor == '3') {
		return 'Enfermedad Profesional';
	} elseif ($valor == '4') {
		return 'Incidente de Trabajo';
	} elseif ($valor == '5') {
		return 'Maternidad';
	} elseif ($valor == '6') {
		return 'Regularización';
	}
}
function obt_receta_todo($db_conexion, $idtriaje) {
	$sql = "	select dr.iddet_receta, dr.cantidad, pr.descripcion as producto, un.descripcion as unidad, dr.intervalo, dr.tiempo, dr.idvia, dr.detalle, dr.receta_cie,
	dr.receta_diagno, dr.dosis, hc.fecha, dr.idproducto
				from det_receta dr
				inner join producto pr on dr.idproducto = pr.idproducto
				inner join unidad un on dr.idunidad = un.idunidad
				inner join hc_topico hc on dr.idreceta = hc.idhc_topico
				where hc.idtriaje = '$idtriaje' and dr.estado = '1' and idseccion = '8'

				union all

				select dr.iddet_receta, dr.cantidad, pr.descripcion as producto, un.descripcion as unidad, dr.intervalo, dr.tiempo, dr.idvia, dr.detalle, dr.receta_cie,
	dr.receta_diagno, dr.dosis, hc.fecha, dr.idproducto
				from det_receta dr
				inner join producto pr on dr.idproducto = pr.idproducto
				inner join unidad un on dr.idunidad = un.idunidad
				inner join formato_observado hc on dr.idreceta = hc.idformato_observado
				where hc.idtriaje = '$idtriaje' and dr.estado = '1' and idseccion = '7'

				union all

				select dr.iddet_receta, dr.cantidad, pr.descripcion as producto, un.descripcion as unidad, dr.intervalo, dr.tiempo, dr.idvia, dr.detalle, dr.receta_cie,
	dr.receta_diagno, dr.dosis, hc.fecha, dr.idproducto
				from det_receta dr
				inner join producto pr on dr.idproducto = pr.idproducto
				inner join unidad un on dr.idunidad = un.idunidad
				inner join topico_evo hc on dr.idreceta = hc.idtopico_evo
				where hc.idtriaje = '$idtriaje' and dr.estado = '1' and idseccion = '10'

				order by fecha ASC
				";
	//echo $sql;
	$query = mysql_query($sql) or die(mysql_error());
	$arr_receta = array();
	while ($row = mysql_fetch_array($query)) {

		$idproducto = $row['idproducto'];
		$cantidad = $row['cantidad'];
		$producto = $row['producto'];
		$unidad = $row['unidad'];
		$intervalo = $row['intervalo'] * 1;
		$tiempo = $row['tiempo'];
		//echo "($cantidad)";
		$arr_receta[$idproducto] = array(
			'cantidad' => $cantidad,
			'producto' => $producto,
			'unidad' => $unidad,
			'intervalo' => $intervalo,
			'tiempo' => $tiempo,
		);
	}
	unset($row);
	$tratamiento = "";
	foreach ($arr_receta as $row) {
		$cantidad = $row['cantidad'];
		$unidad = $row['unidad'];
		$producto = $row['producto'];
		$intervalo = $row['intervalo'] * 1;
		$tiempo = $row['tiempo'];

		$via = obtener_via_receta($idvia);
		//$dosis = calcular_dosis($cantidad, $tiempo, $intervalo);
		$des_intervalo = "";
		if ($intervalo > 0) {
			$des_intervalo = "CADA $intervalo HORAS";
		}

		$tratamiento .= "$cantidad $unidad DE $producto $des_intervalo POR $tiempo DIAS; ";
	}
	return $tratamiento;
}
function obt_receta($db_conexion, $idformato, $idseccion) {
	$sql = "	select dr.iddet_receta, dr.cantidad, pr.descripcion as producto, un.descripcion as unidad, dr.intervalo, dr.tiempo, dr.idvia, dr.detalle, dr.receta_cie,
	dr.receta_diagno, dr.dosis
				from det_receta dr
				inner join producto pr on dr.idproducto = pr.idproducto
				inner join unidad un on dr.idunidad = un.idunidad
				where dr.idreceta = '$idformato' and dr.estado = '1' and idseccion = '$idseccion'
				order by pr.descripcion
				";
	//echo $sql;
	$query = mysql_query($sql);
	$cant_detalle = mysql_num_rows($query);
	$tratamiento = "";
	while ($row = mysql_fetch_array($query)) {
		$iddet_receta2 = $row['iddet_receta'];
		$idvia = $row['idvia'];
		$receta_cie = $row['receta_cie'];

		$producto = $row['producto'];
		$cantidad = $row['cantidad'];
		$tiempo = $row['tiempo'];
		$intervalo = $row['intervalo'] * 1;
		$unidad = $row['unidad'];
		$dosis = $row['dosis'];

		$via = obtener_via_receta($idvia);
		//$dosis = calcular_dosis($cantidad, $tiempo, $intervalo);
		$des_intervalo = "";
		if ($intervalo > 0) {
			$des_intervalo = "CADA $intervalo HORAS";
		}

		$tratamiento .= "$cantidad $unidad DE $producto $des_intervalo POR $tiempo DIAS; ";
	}
	return $tratamiento;
}

function calcular_dosis($cantidad, $tiempo, $intervalo) {
	$dosis = $cantidad / ($tiempo * (24 / $intervalo));

	return $dosis;
}
function obt_estado_ate($valor) {
	if ($valor == '1') {
		return 'En Observacion';
	} elseif ($valor == '2') {
		return 'Alta';
	} elseif ($valor == '3') {
		return 'Referencia';
	} elseif ($valor == '4') {
		return 'Otros';
	}
}

function obt_tipo_interconsulta($valor) {
	if ($valor == '1') {
		return 'Interna';
	} elseif ($valor == '2') {
		return 'Externa';
	}
}
function obt_det_examenocu($db_conexion, $idformatos) {
	if ($idformatos != '') {
		$sql = "	select dt.descripcion as detalleocu
				from examenocu dt
				where dt.idexamenocu in ($idformatos)
				order by dt.descripcion
				";
		//echo $sql;
		$query = mysql_query($sql);
		$cant_detalle = mysql_num_rows($query);
		$detalleocu = "";
		while ($row = mysql_fetch_array($query)) {
			$detalleocu .= $row['detalleocu'] . ', ';
		}
		return trim($detalleocu, ', ');
	}
}

function obt_funciones_fis($valor) {
	if ($valor == '1') {
		return 'Incrementado';
	} elseif ($valor == '2') {
		return 'Normal';
	} elseif ($valor == '3') {
		return 'Disminuido';
	}
}
function obt_max_codigo($codprotocolo) {
	$result = mysql_query("select max(codigo*1)as codigo FROM comprobante where codprotocolo='$codprotocolo'");
	$row = mysql_fetch_array($result);
	$codigo = $row["codigo"] * 1 + 1;
	$codigo = str_pad($codigo, 6, '0', STR_PAD_LEFT);
	return $codigo;
}
function obt_max_nrogrupo() {
	$result = mysql_query("select max(nrogrupo*1)as nrogrupo FROM comprobante");
	$row = mysql_fetch_array($result);
	$nrogrupo = $row["nrogrupo"] * 1 + 1;

	$result = mysql_query("select max(nrogrupores*1)as nrogrupores FROM comprobante");
	$row = mysql_fetch_array($result);
	$nrogrupores = $row["nrogrupores"] * 1 + 1;

	if ($nrogrupores > $nrogrupo) {
		$nrogrupo = $nrogrupores;
	}
	return $nrogrupo;
}
function obt_max_nroorden($fecha, $idservicio) {
	$result = mysql_query("select max(nroorden*1)as nroorden FROM comprobante where estado=1 and fecha='$fecha' AND idservicio = '$idservicio'") or die(mysql_error());
	$row = mysql_fetch_array($result);
	$nroorden = $row["nroorden"] * 1 + 1;
	return $nroorden;
}
function obt_max_proforma() {
	$result = mysql_query("select max(proforma*1)as proforma FROM comprobante") or die(mysql_error());
	$row = mysql_fetch_array($result);
	$proforma = str_pad($row["proforma"] * 1 + 1, 6, '0', STR_PAD_LEFT);
	return $proforma;
}
function obt_max_unrecord() {
	$result = mysql_query("select max(unrecord*1)as unrecord FROM comprobante") or die(mysql_error());
	$row = mysql_fetch_array($result);
	$unrecord = $row["unrecord"] * 1 + 1;
	return $unrecord;
}

function GetFirmas($iddoctor, $fechac = "") {
	$ip_prueba = $_SERVER["HTTP_HOST"];
	if ($fechac >= '2017-07-03') {
		$firma = "../firmas/" . $iddoctor . ".jpg";
	}
	if ($iddoctor == 53) {
		if ($fechac >= '2017-10-09') {
			$firma = "../firmas/53_munios.jpg";
		} else {
			$firma = "../firmas/" . $iddoctor . ".jpg";
		}
	}
	if (!is_file($firma)) {
		$firma = '';
	}
	/*if('2017-07-03' < $Fecha_actual){
		$firma = '';
	}*/

	/*if($ip_prueba == '192.168.0.102'){
		$firma = '';
	}*/
	return $firma;
}
function Obtener_Aptitudes($valor) {
	if ($valor == '') {$valor = 'SIN APTITUD';} elseif ($valor == '1') {$valor = 'APTO';} elseif ($valor == '2') {$valor = 'APTO CON RESTRICCIONES';} elseif ($valor == '3') {$valor = 'OBSERVADO';} elseif ($valor == '4') {$valor = 'NO APTO';} elseif ($valor == '5') {$valor = 'EVALUADO';} elseif ($valor == '6') {$valor = 'NO ACUDIO';} elseif ($valor == '7') {$valor = 'EXAMENES INCOMPLETOS';} elseif ($valor == '8') {$valor = 'NO CALIFICABLE';}
	return $valor;
}

function obt_perfilxml($idcomprobante) {

	$sql_ex = "select f.restriccion5,
					f.vehi_liviano,
					f.restriccion30,
					f.restriccion10,
					f.restriccion1,
					f.restriccion4,
					f.restriccion31,
					f.restriccion21,
					f.restriccion12,
					f.restriccion32,
					f.vehi_produccion,
					f.lentes_gruas,
					f.lentes_produccion,
					c.idobra
	from formato_diagnostico f inner join comprobante c on f.idcomprobante = c.idcomprobante
	where c.estado = '1' and f.estado = '1' and c.idcomprobante = '$idcomprobante' limit 1";

	$query_ex = mysql_query($sql_ex) or die(mysql_error());
	$row_ex = mysql_fetch_array($query_ex);

	$restriccion5 = $row_ex['restriccion5'];
	$vehi_liviano = $row_ex['vehi_liviano'];
	$restriccion30 = $row_ex['restriccion30'];
	$restriccion10 = $row_ex['restriccion10'];
	$restriccion1 = $row_ex['restriccion1'];
	$restriccion4 = $row_ex['restriccion4'];
	$restriccion31 = $row_ex['restriccion31'];
	$restriccion21 = $row_ex['restriccion21'];
	$restriccion12 = $row_ex['restriccion12'];
	$restriccion32 = $row_ex['restriccion32'];
	$vehi_produccion = $row_ex['vehi_produccion'];
	$lentes_gruas = $row_ex['lentes_gruas'];
	$lentes_produccion = $row_ex['lentes_produccion'];
	$idperfil_c = $row_ex["idobra"];

	/*$P1 = '20';$P1C = '21';$P1R = '22';$P1CR = '23';$P2 = '24';$P2C = '25';$P2R = '26';$P2CR = '27';$P3 = '28';$P3C = '29';$P3R = '30';$P3CR = '31';
		$P4 = '32';$P4C = '33';$P4R = '34';$P4CR = '35';$P5R = '36';$P5CR = '37';$P6R = '38';$P6CR = '39';$P7R = '40';$P7CR = '41';$P8C = '42';$P8CR = '43';
	*/

	/*REALES
		P12,P1,P1C,P1R,P1CR,P2,P2C,P2R,P2CR,P3,P3C,P3R,P3CR,P4,P4C,P4R,P4CR,P5R,P5CR,P6R,P6CR,P7R,P7CR,P8C,P8CR,P9CR,P10CR,P11,

		123,124,125,126,127,128,129,130,131,132,133,134,135,136,137,138,139,140,141,142,143,144,145,146,147,148,149,150
	*/
	$val_restri = '';
	$sub_labor = '';

	if ($vehi_liviano == 'on') {if ($val_restri != '') {$val_restri .= ',';}
		$val_restri .= '10';}
	if ($restriccion30 == 'si') {if ($val_restri != '') {$val_restri .= ',';}
		$val_restri .= '11';}
	if ($restriccion10 == 'si') {if ($val_restri != '') {$val_restri .= ',';}
		$val_restri .= '12';}
	if ($restriccion1 == 'si') {if ($val_restri != '') {$val_restri .= ',';}
		$val_restri .= '13';}
	if ($restriccion4 == 'si') {if ($val_restri != '') {$val_restri .= ',';}
		$val_restri .= '14';}
	if ($restriccion31 == 'si') {if ($val_restri != '') {$val_restri .= ',';}
		$val_restri .= '15';}
	if ($restriccion21 == 'si') {if ($val_restri != '') {$val_restri .= ',';}
		$val_restri .= '16';}
	if ($restriccion12 == 'si') {if ($val_restri != '') {$val_restri .= ',';}
		$val_restri .= '17';}
	if ($restriccion32 == 'si') {if ($val_restri != '') {$val_restri .= ',';}
		$val_restri .= '18';}
	if ($vehi_produccion == 'on') {if ($val_restri != '') {$val_restri .= ',';}
		$val_restri .= '19';}
	if ($lentes_gruas == 'on') {if ($val_restri != '') {$val_restri .= ',';}
		$val_restri .= '20';}
	if ($lentes_produccion == 'on') {if ($val_restri != '') {$val_restri .= ',';}
		$val_restri .= '21';}

	if ($idperfil_c == '124') {
		$sub_labor = '20';
	} elseif ($idperfil_c == '125') {
		$sub_labor = '21';
	} elseif ($idperfil_c == '126') {
		$sub_labor = '22';
	} elseif ($idperfil_c == '127') {
		$sub_labor = '23';
	} elseif ($idperfil_c == '128') {
		$sub_labor = '24';
	} elseif ($idperfil_c == '129') {
		$sub_labor = '25';
	} elseif ($idperfil_c == '130') {
		$sub_labor = '26';
	} elseif ($idperfil_c == '131') {
		$sub_labor = '27';
	} elseif ($idperfil_c == '132') {
		$sub_labor = '28';
	} elseif ($idperfil_c == '133') {
		$sub_labor = '29';
	} elseif ($idperfil_c == '134') {
		$sub_labor = '30';
	} elseif ($idperfil_c == '135') {
		$sub_labor = '31';
	} elseif ($idperfil_c == '136') {
		$sub_labor = '32';
	} elseif ($idperfil_c == '137') {
		$sub_labor = '33';
	} elseif ($idperfil_c == '138') {
		$sub_labor = '34';
	} elseif ($idperfil_c == '139') {
		$sub_labor = '35';
	} elseif ($idperfil_c == '140') {
		$sub_labor = '36';
	} elseif ($idperfil_c == '141') {
		$sub_labor = '37';
	} elseif ($idperfil_c == '142') {
		$sub_labor = '38';
	} elseif ($idperfil_c == '143') {
		$sub_labor = '39';
	} elseif ($idperfil_c == '144') {
		$sub_labor = '40';
	} elseif ($idperfil_c == '145') {
		$sub_labor = '41';
	} elseif ($idperfil_c == '146') {
		$sub_labor = '42';
	} elseif ($idperfil_c == '147') {
		$sub_labor = '43';
	} elseif ($idperfil_c == '148') {
		$sub_labor = '44';
	} elseif ($idperfil_c == '149') {
		$sub_labor = '45';
	}
	//echo $sub_labor;
	return array($val_restri, $sub_labor);
}
function ObtenerArea($idarea2) {
	$query = mysql_query("SELECT idarea_ocupacional,descripcion FROM area_ocupacional WHERE idarea_ocupacional='$idarea2';") or die(mysql_error());
	$row_d = mysql_fetch_array($query);
	if ($row_d["idarea_ocupacional"] != '') {$descripcion_area = $row_d["descripcion"];} else { $descripcion_area = "CULMINÓ";}
	return $descripcion_area;
}

function combinar_celdas2($columna_ini, $fila_ini, $c_columnas, $c_filas, $dato) {
	$c_columnas--;
	$c_filas--;
	global $objWorkSheet;

	$fila_fin = $fila_ini * 1 + $c_filas * 1;
	$columna_fin = $columna_ini;
	for ($i = 0; $i < $c_columnas; $i++) {
		$columna_fin++;
	}

	$rango = "$columna_ini$fila_ini:$columna_fin$fila_fin";
	$columna = $columna_fin;

	$objWorkSheet->setCellValue($columna_ini . $fila_ini, $dato);
	$objWorkSheet->mergeCells($rango);

	return $columna;
}

function Colorea($letra, $size, $fondo, $borde, $negrita) {
	if ($letra == 1) {
		$letra = '000000';
	}
	if ($size == 1) {
		$size = '8';
	}
	if ($font == 'A') {
		$font = 'Calibri';
	}
	if ($fondo == '') {
		$fondo = 'FFFFFF';
	}
	if ($borde == '0') {
		$borde = '000000';
	}
	if ($negrita == 'B') {
		$negrita = true;
	} else {
		$negrita = false;
	}

	return array(
		'font' => array('bold' => $negrita, 'color' => array('rgb' => $letra), 'size' => $size),
		'alignment' => array('vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER, 'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER),
		'borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_DOTTED, 'color' => array('rgb' => $borde))),
		'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => $fondo)),
	);
}
function logo_reporte($img, $celda, $h) {
	global $objWorkSheet;
	$objDrawing = new PHPExcel_Worksheet_Drawing();
	$objDrawing->setName('Logo');
	$objDrawing->setDescription('Logo');
	$objDrawing->setPath('../../images/logo/' . $img);
	$objDrawing->setHeight($h);
	$objDrawing->setCoordinates($celda);
	$objDrawing->setOffsetX(0);
	$objDrawing->setWorksheet($objWorkSheet);
}
function obt_restriccion($campo, $valor, $fecha = '', $idempresa = '') {
	if ($valor == 'si') {
		if ($campo == 'restriccion1') {
			return '';
		} elseif ($campo == 'restriccion2') {
			return '';
		} elseif ($campo == 'restriccion3') {
			return '';
		} elseif ($campo == 'restriccion4') {
			return '';
		} elseif ($campo == 'restriccion5') {
			return ($idempresa == 31) ? '' : '';
		} elseif ($campo == 'restriccion6') {
			return '';
		} elseif ($campo == 'restriccion7') {
			return '';
		} elseif ($campo == 'restriccion9') {
			return '';
		} elseif ($campo == 'restriccion10') {
			return '';
		} elseif ($campo == 'restriccion11') {
			return '';
		} elseif ($campo == 'restriccion12') {
			return '';
		} elseif ($campo == 'restriccion16') {
			return ($fecha == '2017-04-03') ? '' : '';
			//return 'No exponerse a mas de 85 db';
		} elseif ($campo == 'restriccion17') {
			return '';
		} elseif ($campo == 'restriccion18') {
			return '';
		} elseif ($campo == 'restriccion19') {
			return '';
		} elseif ($campo == 'restriccion20') {
			return '';
		} elseif ($campo == 'restriccion21') {
			return '';
		} elseif ($campo == 'restrin1') {
//nuevos
			return '';
		} elseif ($campo == 'restrin2') {
//nuevos
			return '';
		} elseif ($campo == 'restrin3') {
//nuevos
			return '';
		} elseif ($campo == 'restrin4') {
//nuevos
			return '';
		} elseif ($campo == 'restrin5') {
//nuevos
			return '';
		} elseif ($campo == 'restrin6') {
//nuevos
			return '';
		} elseif ($campo == 'restrin7') {
//nuevos
			return '';
		} elseif ($campo == 'restrin8') {
//nuevos
			return '';
		} elseif ($campo == 'restrin9') {
//nuevos
			return '';
		} elseif ($campo == 'restriccion8') {
			return '';
		}
	} else {
		return '';
	}
}
function newproto($idtmproto, $idtmpobra, $idperfiles, $idtmpcond) {
	if ($idtmproto != '' && $idtmpobra != '') {
		session_start();
		global $iduser;
		if ($idperfiles != '') {
			$tmpp = "SELECT idperfiles FROM tmp_protocolo WHERE idprotocolo='$idtmproto'";
			$qtmpp = mysql_query($tmpp) or die(mysql_error());
			$rtmpp = mysql_fetch_array($qtmpp);
			$idpfls = $rtmpp['idperfiles'];

			$sproto = "SELECT idprotocolo,idobra,codprotocolo FROM protocolo WHERE idperfiles = '$idpfls' and estado = 3;";
			$qproto = mysql_query($sproto) or die(mysql_error());
			$rproto = mysql_fetch_array($qproto);
			$idprotox = $rproto['idprotocolo'];
			$idprotoa = $rproto['idprotocolo'];
			$idobrasx = $rproto['idobra'];
			$codprotx = $rproto['codprotocolo'];

			/*$scond = "SELECT idprotocolo FROM tmp_tmp_condicion WHERE idcondicion='$idtmpcond';";
				$qcond=mysql_query($scond)or die(mysql_error());
				$rcond = mysql_fetch_array($qcond);
			*/

			//Se requiere actualizar

			/*echo "SELECT COUNT(idcondicion)as cantcond FROM tmp_tmp_condicion where idprotocolo='$idtmproto' AND estado='1'";die();
				$qcondt1 = mysql_query("SELECT COUNT(idcondicion)as cantcond FROM tmp_tmp_condicion where idprotocolo='$idtmproto' AND estado='1'")or die(mysql_error());
				$rcondt1 = mysql_fetch_array($qcondt1);
				$cantcond1 = $rcondt1['cantcond']*1;
				if($cantcond1 > 0){
					mysql_query("DELETE FROM condicion WHERE idprotocolo='$idprotox'")or die(mysql_error());
					mysql_query("INSERT INTO condicion(idprotocolo,idexamenocu,iddetalleocu,tipoin,tipoan,tipore,tipovi,tipose,tipoch,tipole,tipoal,signo,
					conedad,signoa,conedada,idcargo,idsubcargo,consexo,vigencia,hfamilia,preghfam,iduser_auditar,fecha_auditar)
					SELECT '$idprotox',idexamenocu,iddetalleocu,tipoin,tipoan,tipore,tipovi,tipose,tipoch,tipole,tipoal,signo,conedad,signoa,
					conedada,idcargo,idsubcargo,consexo,vigencia,hfamilia,preghfam,'$iduser',NOW() FROM tmp_tmp_condicion WHERE idprotocolo='$idtmproto' AND estado='1'");
					mysql_query("DELETE FROM tmp_tmp_condicion WHERE idprotocolo='$idtmproto'")or die(mysql_error());
			*/

			if ($idprotoa == '') {
				$idpflsarra = $rtmpp['idperfiles'];
				$arraper = explode(',', $idpflsarra);
				$caarraper = count($arraper);
				if ($caarraper == 1) {
					foreach ($arraper as $obras) {
						$sproto2 = "SELECT idprotocolo,idobra,codprotocolo FROM protocolo WHERE idobra = '$obras';";
						$qproto2 = mysql_query($sproto2) or die(mysql_error());
						$rproto2 = mysql_fetch_array($qproto2);
						$idprotox = $rproto2['idprotocolo'];
						$idobrasx = $rproto2['idobra'];
						$codprotx = $rproto2['codprotocolo'];

						$qcondt2 = mysql_query("SELECT COUNT(idcondicion)as cantcond FROM tmp_tmp_condicion where idprotocolo='$idtmproto' AND estado='1'") or die(mysql_error());
						$rcondt2 = mysql_fetch_array($qcondt2);
						$cantcond2 = $rcondt2['cantcond'] * 1;
						if ($cantcond2 > 0) {
							mysql_query("DELETE FROM condicion WHERE idprotocolo='$idprotox'") or die(mysql_error());
							mysql_query("INSERT INTO condicion(idprotocolo,idexamenocu,iddetalleocu,tipoin,tipoan,tipore,tipovi,tipose,tipoch,tipole,tipoal,signo,
							conedad,signoa,conedada,idcargo,idsubcargo,consexo,vigencia,hfamilia,preghfam,iduser_auditar,fecha_auditar)
							SELECT '$idprotox',idexamenocu,iddetalleocu,tipoin,tipoan,tipore,tipovi,tipose,tipoch,tipole,tipoal,signo,conedad,signoa,
							conedada,idcargo,idsubcargo,consexo,vigencia,hfamilia,preghfam,'$iduser',NOW() FROM tmp_tmp_condicion where idprotocolo='$idtmproto' AND estado='1'");
							mysql_query("DELETE FROM tmp_tmp_condicion WHERE idprotocolo='$idtmproto'") or die(mysql_error());
						}
						break;
					}
				}
			}
		}

		if ($idprotox * 1 == 0) {
			//echo "SELECT COUNT(idcondicion)as cantcond FROM tmp_tmp_condicion where idprotocolo='$idtmproto' AND estado='1'";die();
			mysql_query("INSERT INTO obra(
			descripcion,estado,idempresa,citaperfil)
			SELECT descripcion,2,idempresa,citaperfil
			FROM tmp_obra WHERE idobra='$idtmpobra'") or die("Erro insertar perfil) " . mysql_error());
			$idobranew = mysql_insert_id();

			$qpnew = mysql_query("select codprotocolo from protocolo order by codprotocolo desc limit 0,1") or die(mysql_error());
			$rpnew = mysql_fetch_array($qpnew);
			$codproton = (substr($rpnew["codprotocolo"], 2)) * 1 + 1;
			$codproton = str_pad($codproton, 4, "0", STR_PAD_LEFT);
			$codproton = "PQ" . $codproton;

			if ($idobranew != '' && $idobranew > 0) {
				mysql_query("INSERT INTO protocolo(
				idempresa,idsubcontrata,idsubcontrata2,iduser,idlocal,insertadoen,estado,factu,fechainicio,fechafinal,tipoes,
				totaltotalfocu,totaltotalfpre,totaltotalfret,totaltotalfvis,totaltotalflev,totaltotalfalt,
				idubicacionsede,total_focu,total_fpre,total_fret,total_fvis,total_flev,
				totaltotalfsem,total_fsem,totaltotalfchk,total_fchk,codprotocolo,idobra,idperfiles,iduser_auditar,fecha_auditar)
				SELECT idempresa,idsubcontrata,idsubcontrata2,iduser,insertadoen,idlocal,'3',factu,fechainicio,fechafinal,tipoes,
				totaltotalfocu,totaltotalfpre,totaltotalfret,totaltotalfvis,totaltotalflev,totaltotalfalt,
				idubicacionsede,total_focu,total_fpre,total_fret,total_fvis,total_flev,
				totaltotalfsem,total_fsem,totaltotalfchk,total_fchk,'$codproton','$idobranew',idperfiles,'$iduser',NOW()
				FROM tmp_protocolo WHERE idprotocolo='$idtmproto'") or die("Erro insertar protocolo) " . mysql_error());
				$idprotonew = mysql_insert_id();

				$tmpdetprotonew = "SELECT idexamenocu,focu,fpre,fret,fsem,fchk,fvis,flev,falt FROM tmp_det_protocolo WHERE idprotocolo = '$idtmproto'";
				$qdetnew = mysql_query($tmpdetprotonew) or die(mysql_error());
				$ndetnew = mysql_num_rows($qdetnew);
				if ($ndetnew > 0) {
					while ($rdetnew = mysql_fetch_array($qdetnew)) {
						$idexadet = $rdetnew['idexamenocu'];
						$var_focu = $rdetnew['focu'];
						$var_fpre = $rdetnew['fpre'];
						$var_fret = $rdetnew['fret'];
						$var_fsem = $rdetnew['fsem'];
						$var_fchk = $rdetnew['fchk'];
						$var_fvis = $rdetnew['fvis'];
						$var_flev = $rdetnew['flev'];
						$var_falt = $rdetnew['falt'];
						mysql_query("INSERT INTO
						det_protocolo(idprotocolo,idexamenocu,focu,fpre,fret,fsem,fchk,fvis,flev,falt,iduser_auditar,fecha_auditar)
						VALUES('$idprotonew','$idexadet','$var_focu','$var_fpre','$var_fret','$var_fsem','$var_fchk','$var_fvis','$var_flev','$var_falt','$iduser',NOW())")
						or die(mysql_error());
					}
					mysql_free_result($qdetnew);
				}

				$qcondt = mysql_query("SELECT COUNT(idcondicion)as cantcond FROM tmp_tmp_condicion where idprotocolo='$idtmproto' AND estado='1'") or die(mysql_error());
				$rcondt = mysql_fetch_array($qcondt);
				$cantcond = $rcondt['cantcond'] * 1;
				if ($cantcond > 0) {
					mysql_query("INSERT INTO condicion(idprotocolo,idexamenocu,iddetalleocu,tipoin,tipoan,tipore,tipovi,tipose,tipoch,tipole,tipoal,signo,
					conedad,signoa,conedada,idcargo,idsubcargo,consexo,vigencia,hfamilia,preghfam,iduser_auditar,fecha_auditar)
					SELECT '$idprotonew',idexamenocu,iddetalleocu,tipoin,tipoan,tipore,tipovi,tipose,tipoch,tipole,tipoal,signo,conedad,signoa,
					conedada,idcargo,idsubcargo,consexo,vigencia,hfamilia,preghfam,'$iduser',NOW() FROM tmp_tmp_condicion where idprotocolo='$idtmproto' AND estado='1'");
					mysql_query("DELETE FROM tmp_tmp_condicion WHERE idprotocolo='$idtmproto'") or die(mysql_error());
				}

			} //fin if($idobranew != '' && $idobranew > 0){
		} //fin if($idprotox * 1 < 0){
		else {
			$idprotonew = $idprotox;
			$idobranew = $idobrasx;
			$codproton = $codprotx;
		}

	}
	return array('idprotonew' => $idprotonew, 'idobranew' => $idobranew, 'codproton' => $codproton);
}

function tieneconval($idcomprobante) {
	$tmpp = "select idcomprobante_conva2 from comprobante where idcomprobante='$idcomprobante'";
	$qtmpp = mysql_query($tmpp) or die(mysql_error());
	$rtmpp = mysql_fetch_array($qtmpp);
	$idpfls = $rtmpp['idcomprobante_conva2'] * 1;
	$result = "";
	if ($idpfls > 0) {$result = "det_comprobante_conva";} else { $result = "det_comprobante";}
	return $result;
}

?>