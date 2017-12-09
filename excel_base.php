<?php
ini_set("memory_limit", "1024M");
ini_set("max_execution_time", "3600");
ini_set("display_errrors", 1);
require_once 'PHPExcel-1.8/Classes/PHPExcel.php';
require_once 'PHPExcel-1.8/Classes/PHPExcel/Cell/AdvancedValueBinder.php';
//require 'funciones.php';

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

PHPExcel_Cell::setValueBinder(new PHPExcel_Cell_AdvancedValueBinder());

$objPHPExcel = new PHPExcel();

$objPHPExcel
	->getProperties()
	->setCreator("omar montoya ventocilla")
	->setLastModifiedBy("omar montoya ventocilla")
	->setTitle("omar montoya ventocilla-reporte")
	->setSubject("omar montoya ventocilla-reporte")
	->setDescription("omar montoya ventocilla-reporte")
	->setKeywords("omar montoya ventocilla-reporte")
	->setCategory("Reportes");

$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setName('Logo');
$objDrawing->setDescription('Logo');
$objDrawing->setPath('photo.jpg');
$objDrawing->setHeight(80);
$objDrawing->setCoordinates('A2');
$objDrawing->setOffsetX(10);
$objDrawing->getShadow()->setVisible(true);
$objDrawing->getShadow()->setDirection(45);

$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

$objPHPExcel->setActiveSheetIndex(0);

$objPHPExcel->getDefaultStyle()
	->getAlignment()
	->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT)
	->setWrapText(false);

$objPHPExcel->getDefaultStyle()
	->getAlignment()
	->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER)
	->setWrapText(false);

$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
$objPHPExcel->getDefaultStyle()
	->getFont()
	->setSize('8');

///COMBINAR

$columna = 'D';
$fila = 9;

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "APELLIDOS Y NOMBRES");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "DNI");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "EDAD");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "SEXO");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "FECHA DE NACIMIENTO");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "LUGAR DE NACIMIENTO");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$columna = 'M';
$fila = 9;

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "TIPO DE EXAMEN");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "PERFIL OCUPACIONAL");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "FECHA DEL EXAMEN");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "APTITUD LABORAL");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "FECHA DE CULMINO DE EXPEDIENTE");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$columna = 'BE';
$fila = 8;

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "OÍDO DERECHO");
$arr_cel = combinar_celdas($columna, $fila, 6, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "OIDO IZQUIERDO");
$arr_cel = combinar_celdas($columna, $fila, 6, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "DIAGNOSTICO AUDIOMETRICO");
$arr_cel = combinar_celdas($columna, $fila, 0, 1);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$columna = 'R';
$fila = 8;

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "ANTECEDENTES PERSONALES Y LABORALES");
$arr_cel = combinar_celdas($columna, $fila, 5, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "HABITOS NOCIVOS");
$arr_cel = combinar_celdas($columna, $fila, 2, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$columna = 'AN';
$fila = 8;

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "ESPIROMETRIA");
$arr_cel = combinar_celdas($columna, $fila, 4, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RX TORAX");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$columna = 'AT';
$fila = 8;

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "OD");
$arr_cel = combinar_celdas($columna, $fila, 1, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "OI");
$arr_cel = combinar_celdas($columna, $fila, 1, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "OD");
$arr_cel = combinar_celdas($columna, $fila, 1, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "OI");
$arr_cel = combinar_celdas($columna, $fila, 1, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "Test ISHIHARA");
$arr_cel = combinar_celdas($columna, $fila, 0, 1);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$columna = 'R';
$fila = 9;

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "ALERGIAS");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "IMUNIZACIONES");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "FUR");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "ANTECEDENTES QUIRURGICOS");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "ACCIDENTES LABORALES");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "DISCAPACIDAD");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "ALCOHOL");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "TABACO");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "DROGAS");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "PESO (Kg)");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "TALLA (metros)");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "IMC (Kg/m2)");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "DX NUTRICIONAL");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "PERIMETRO ABDOMINAL");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "PERIMETRO CADERA");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "ICC");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "PAS (mm Hg)");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "PAD (mm Hg)");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "FC (lat/min)");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "FR (resp/min)");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "SAT %");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "T°");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "FVC %");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "FEV1 %");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "FEV1/FVC %");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "FEV 25-75%");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "Diagnostico");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "Diagnostico OIT");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "SC");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "CC");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "SC");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "CC");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "SC");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "CC");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "SC");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "CC");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$columna = 'BE';
$fila = 9;

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "500 hz D.");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "1000 hz D.");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "2000hz D.");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "3000 hz D.");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "4000 hz D.");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "6000 hz D.");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "8000 hz D.");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "500 hz D.");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "1000 hz D.");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "2000hz D.");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "3000 hz D.");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "4000 hz D.");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "6000 hz D.");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "8000 hz D.");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$columna = 'BT';
$fila = 9;

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "EKG");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "PRUEBA DE ESFUERZO");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "PSICOLOGIA");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "ACROFOBIA");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "CLAUSTROFOBIA");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "OTRAS FOBIAS");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "EXAMEN DE ALTURA ESTRUCTURAL");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "EXAMEN 7D");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "PSICOSENSOMETRICO");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "TEST DE EPWORTH");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RESPIRADOR");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "OSHA-SILICE");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "HB (gr%)");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "HTO(%)");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "PLAQUETAS");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RCTO RETICULOCITOS");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "GRUPO Y FACTOR Rh");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "Ex. Completo de Orina");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "GLUCOSA (mg/dl)");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "COLESTEROL (mg%)");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "HDL (mg%)");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "LDL (mg%)");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "TRIGLICÉRIDOS (mg%)");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RIESGO CORONARIO (col total/HDL)");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "ACIDO URICO");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "CREATININA");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RPR /VDRL");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "ELISA VIH");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "COCAINA");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "MARIHUANA");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "DX 1");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "CIE10 1");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "DX 2");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "CIE10 2");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "DX 3");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "CIE10 3");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "DX 4");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "CIE10 4");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "DX 5");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "CIE10 5");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "DX 6");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "CIE10 6");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "DX 7");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "CIE10 7");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "DX 8");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "CIE10 8");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "DX 9");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "CIE10 9");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "DX 10");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "CIE10 10");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RECOMENDACIÓN 1");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RECOMENDACIÓN 2");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RECOMENDACIÓN 3");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RECOMENDACIÓN 4");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RECOMENDACIÓN 5");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RECOMENDACIÓN 6");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RECOMENDACIÓN 7");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RECOMENDACIÓN 8");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RECOMENDACIÓN 9");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RECOMENDACIÓN 10");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RESTRICCION 1");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RESTRICCION 2");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RESTRICCION 3");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RESTRICCION 4");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RESTRICCION 5");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RESTRICCION 6");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RESTRICCION 7");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RESTRICCION 8");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RESTRICCION 9");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RESTRICCION 10");
$arr_cel = combinar_celdas($columna, $fila, 0, 0);
$rango = $arr_cel['rango'];
$columna = $arr_cel['columna'];
//echo $rango . " - " . $columna . "<br>";
$objPHPExcel->getActiveSheet()->mergeCells($rango);

// // echo 'TODO BIEN';
// // die();

//fin cabeceras
//FONDO
$objPHPExcel->getActiveSheet()->getStyle("A7:EO9")->getFill()->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,
	'startcolor' => array('rgb' => '9cbafc'),
));

//COLOR NEGRITA TAMAÑO
$objPHPExcel->getActiveSheet()->getStyle('A7:EO9')->getFont()->setBold(true)
	->setName('')
	->setSize('8')
	->getColor()->setRGB('0e50b2');

$objPHPExcel->getActiveSheet()->getStyle('A7:EO9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('A7:EO9')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

$objPHPExcel->getActiveSheet()->getStyle("A7:EO" . (100 + 9))->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_DOTTED);

$k = '1';
$f = 7;
$fila++;
$i = 1;
$x = 8;
while ($i <= 100) {

	$columna = 'A';
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, '12');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, '13');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, '');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, '14');
	$columna++;
	$objPHPExcel->getActiveSheet()->getCell($columna . $fila)->setValueExplicit('45654432', PHPExcel_Cell_DataType::TYPE_STRING);
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, '12');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'm');
	$columna++;
	$objPHPExcel->getActiveSheet()->getCell($columna . $fila)->setValueExplicit('2017-09-06', PHPExcel_Cell_DataType::TYPE_STRING);
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eereer');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, '4545');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'ree');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, '');
	$columna++; //UNIDAD DE DESTAQUE
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'reerer');
	$columna++; //TIPO DE EXAMEN
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'rtrtrt');
	$columna++; //PERFIL OCUPACIONAL
	$objPHPExcel->getActiveSheet()->getCell($columna . $fila)->setValueExplicit('2017-09-06', PHPExcel_Cell_DataType::TYPE_STRING);
	$columna++; //FECHA DEL EXAMEN
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'wewee');
	$columna++; //APTITUD LABORAL
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, '');
	$columna++; //FECHA DE CULMINO DE EXPEDIENTE
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'wewee');
	$columna++; //ALERGIAS
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'ewewewe');
	$columna++; //IMUNIZACIONES
	$objPHPExcel->getActiveSheet()->getCell($columna . $fila)->setValueExplicit('2017-06-05', PHPExcel_Cell_DataType::TYPE_STRING);
	$columna++; //FUR
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'wewewe');
	$columna++; //ANTECEDENTES QUIRURGICOS
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, '');
	$columna++; //ACCIDENTES LABORALES
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, '');
	$columna++; //DISCAPACIDAD
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'ewrerr');
	$columna++; //ALCOHOL
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'rerererer');
	$columna++; //TABACO
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'erererer');
	$columna++; //DROGAS
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'rerererr');
	$columna++; //PESO
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'rtrtr');
	$columna++; //TALLA
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'rererer');
	$columna++; //IMC (Kg/m2)
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'erererer');
	$columna++; //DX NUTRICIONAL
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'rererer');
	$columna++; //PERIMETRO ABDOMINAL
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'rerererer');
	$columna++; //PERIMETRO CADERA
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'erererer');
	$columna++; //ICC
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'ererererer');
	$columna++; //PAS (mm Hg)
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'erererere');
	$columna++; //PAD (mm Hg)
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'rwerrertert');
	$columna++; //FC (lat/min)
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'tertertert');
	$columna++; //FR (resp/min)
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'trtrtr');
	$columna++; //SAT %
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'ddsasdfsd');
	$columna++; //T°
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'ddasadas');
	$columna++; //FVC %
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'ewqeqeqweqw');
	$columna++; //FEV1 %
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwe');
	$columna++; //FEV1/FVC %
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'qeqwqweqweqw');
	$columna++; //FEV 25-75%
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'ewqeqweqweq');
	$columna++; //Diagnostico
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++; //RX TORAX
	$objPHPExcel->getActiveSheet()->getCell($columna . $fila)->setValueExplicit('eqweqweqwewqewq', PHPExcel_Cell_DataType::TYPE_STRING);
	$columna++;
	$objPHPExcel->getActiveSheet()->getCell($columna . $fila)->setValueExplicit('eqweqweqwewqewq', PHPExcel_Cell_DataType::TYPE_STRING);
	$columna++;
	$objPHPExcel->getActiveSheet()->getCell($columna . $fila)->setValueExplicit('eqweqweqwewqewq', PHPExcel_Cell_DataType::TYPE_STRING);
	$columna++;
	$objPHPExcel->getActiveSheet()->getCell($columna . $fila)->setValueExplicit('eqweqweqwewqewq', PHPExcel_Cell_DataType::TYPE_STRING);
	$columna++;
	$objPHPExcel->getActiveSheet()->getCell($columna . $fila)->setValueExplicit('eqweqweqwewqewq', PHPExcel_Cell_DataType::TYPE_STRING);
	$columna++;
	$objPHPExcel->getActiveSheet()->getCell($columna . $fila)->setValueExplicit('eqweqweqwewqewq', PHPExcel_Cell_DataType::TYPE_STRING);
	$columna++;
	$objPHPExcel->getActiveSheet()->getCell($columna . $fila)->setValueExplicit('eqweqweqwewqewq', PHPExcel_Cell_DataType::TYPE_STRING);
	$columna++;
	$objPHPExcel->getActiveSheet()->getCell($columna . $fila)->setValueExplicit('eqweqweqwewqewq', PHPExcel_Cell_DataType::TYPE_STRING);
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++; //Test ISHIHARA
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++; //DIAGNOSTICO OFTALMOLÓGICO
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++; //OTOSCOPIA
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++; //500 hz D.
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++; //1000 hz D.
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++; //2000hz D.
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++; //3000 hz D.
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++; //4000 hz D.
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++; //6000 hz D.
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++; //8000 hz D.
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++; //500 hz D.
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++; //1000 hz D.
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++; //2000hz D.
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++; //3000 hz D.
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++; //4000 hz D.
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++; //6000 hz D.
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++; //8000 hz D.
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++; //DIAGNOSTICO AUDIOMETRICO
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++; //EKG
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++; //PRUEBA DE ESFUERZO
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++; //PSICOLOGIA
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++; //ACROFOBIA
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++; //CLAUSTROFOBIA
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++; //OTRAS FOBIAS
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++; //EXAMEN DE ALTURA ESTRUCTURAL
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++; //EXAMEN 7D
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++; //PSICOSENSOMETRICO
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++; //TEST DE EPWORTH
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++; //RESPIRADOR
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++; //OSHA-SILICE
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++;
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++; //OBSERVACIONES
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++; //INTERCONSULTAS
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++; //PRÓXIMOS CONTROLES
	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, 'eqweqweqwewqewq');
	$columna++; //VENCIMIENTO DEL EXÁMEN MÉDICO
	$fila++;
	$i++;
	$x++;
}
// $objPHPExcel->getActiveSheet(0)->setAutoFilter("A9:EO9");
// $objPHPExcel->getActiveSheet(0)->getStyle('A7:EO9')->getAlignment()->setWrapText(true);
// $objPHPExcel->getActiveSheet(0)->freezePane('E10');
$objPHPExcel->setActiveSheetIndex()->setTitle('MATRIZ');

$objPHPExcel->setActiveSheetIndex(0);

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="MATRIZ.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;

?>