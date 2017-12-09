<?php    
    session_start();
    if (isset($_SESSION["iduser"])) {
		ini_set("memory_limit", "1024M");
    	ini_set("max_execution_time", "3600");
        require_once '../../funciones/importar_excel/PHPExcel.php';
		require_once '../../funciones/importar_excel/PHPExcel/Cell/AdvancedValueBinder.php'; 
        require '../../funciones/funciones.php';
        require("../../aut_config.inc.php");

		PHPExcel_Cell::setValueBinder(new PHPExcel_Cell_AdvancedValueBinder());
		
        function busca_existe($campo, $tabla, $condicion, $valor) {
            $query = mysql_query("SELECT $campo as codigo FROM $tabla where $condicion='$valor' and estado=1") or die(mysql_error());
            $row = mysql_fetch_array($query);
            return $row["codigo"];
        }
        function busca_existe3($campo, $tabla, $condicion, $valor) {
            $query = mysql_query("SELECT $campo as codigo FROM $tabla where $condicion='$valor'") or die(mysql_error());
            $row = mysql_fetch_array($query);
            return $row["codigo"];
        }

        function busca_existe2($tabla, $campo, $camboreturn, $valor) {
            $query = mysql_query("SELECT $camboreturn as codigo FROM $tabla where $campo='$valor' and estado='1'") or die(mysql_error());
            $row = mysql_fetch_array($query);
            return $row["codigo"];
        }


		
		function ver_pagina($idcomprobante,$idseccion){
			$sql="select pagina_usu, pagina_imp from formato_x_orden where idcomprobante='$idcomprobante' and idseccion = '$idseccion'";
			$query=mysql_query($sql) or die(mysql_error());
			$row = mysql_fetch_array($query);
			return $row;
		}

		
        $objPHPExcel = new PHPExcel();

        $objPHPExcel
		->getProperties()
		->setCreator("mediwebperu.com")
		->setLastModifiedBy("mediwebperu.com")
		->setTitle("Base de citas - MEDIWEB")
		->setSubject("Base de citas - MEDIWEB")
		->setDescription("Documento generado por MEDIWEB")
		->setKeywords("Base de citas MEDIWEB")
		->setCategory("Reportes");

        $objDrawing = new PHPExcel_Worksheet_Drawing();
        $objDrawing->setName('Logo');
        $objDrawing->setDescription('Logo');
        $objDrawing->setPath('../../images/logo_r_sermedi.jpg');
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
			

		$objPHPExcel->getDefaultStyle()
			->getFont()
			->setSize('8');

		
		
		///COMBINAR
		$fila=2;
		$columna="E";
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "EMPRESA: ");
		$arr_cel = combinar_celdas($columna, $fila, 13, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		$fila=3;
		$columna="E";
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "MATRIZ DE VIGILANCIA OCUPACIONAL - LÍNEA BASE");
		$arr_cel = combinar_celdas($columna, $fila, 13, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		$objPHPExcel->getActiveSheet()->getStyle('E2:T3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
															
		//COLOR NEGRITA TAMAÑO
		$objPHPExcel->getActiveSheet()->getStyle('E2:T3')->getFont()->setBold(true)
			->setName('')
			->setSize('16')
			->getColor()->setRGB('0e50b2');
		
		$objPHPExcel->getActiveSheet()->getRowDimension('9')->setRowHeight(40);
        // DEFINIR COLUMNAS
        //cabecereas		
		$fila=7;
		$columna="A";	


    	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "N° HC");
		$arr_cel = combinar_celdas($columna, $fila, 0, 2);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
    	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "EMPRESA");
		$arr_cel = combinar_celdas($columna, $fila, 0, 2);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
    	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "FECHA DE INGRESO A EMPRESA");
		$arr_cel = combinar_celdas($columna, $fila, 0, 2);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
    	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "DATOS DE FILIACIÓN");
		$arr_cel = combinar_celdas($columna, $fila, 5, 1);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
    	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "PUESTO DE TRABAJO");
		$arr_cel = combinar_celdas($columna, $fila, 0, 2);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
    	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "AREA DE TRABAJO");
		$arr_cel = combinar_celdas($columna, $fila, 0, 2);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
    	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "UNIDAD DE DESTAQUE");
		$arr_cel = combinar_celdas($columna, $fila, 0, 2);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
    	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "DATOS DEL TIPO DE EXAMEN Y APTITUD");
		$arr_cel = combinar_celdas($columna, $fila, 4, 1);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
    	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "ANAMNESIS");
		$arr_cel = combinar_celdas($columna, $fila, 8, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
    	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "ANTROPOMETRÍA");
		$arr_cel = combinar_celdas($columna, $fila, 6, 1);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
    	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "FUNCIONES VITALES");
		$arr_cel = combinar_celdas($columna, $fila, 5, 1);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
    	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "FUNCION PULMONAR");
		$arr_cel = combinar_celdas($columna, $fila, 5, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
    	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "AGUDEZA VISUAL (Vision de Cerca)");
		$arr_cel = combinar_celdas($columna, $fila, 3, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
    	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "AGUDEZA VISUAL ( Vision de lejos )");
		$arr_cel = combinar_celdas($columna, $fila, 3, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
    	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "Vision de colores");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
    	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "DIAGNOSTICO OFTALMOLÓGICO");
		$arr_cel = combinar_celdas($columna, $fila, 0, 2);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
    	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "OTOSCOPIA");
		$arr_cel = combinar_celdas($columna, $fila, 0, 2);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
    	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "AUDIOMETRÍA");
		$arr_cel = combinar_celdas($columna, $fila, 14, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
    	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "CARDIOLOGIA");
		$arr_cel = combinar_celdas($columna, $fila, 1, 1);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
    	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "PSICOLOGIA");
		$arr_cel = combinar_celdas($columna, $fila, 3, 1);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
    	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "EXAMENES COMPLEMENTARIOS");
		$arr_cel = combinar_celdas($columna, $fila, 5, 1);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
    	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "EXAMENES DE LABORATORIO");
		$arr_cel = combinar_celdas($columna, $fila, 15, 1);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
    	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "TOXICOLOGICO");
		$arr_cel = combinar_celdas($columna, $fila, 1, 1);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
    	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "DIAGNOSTICO + CIE 10");
		$arr_cel = combinar_celdas($columna, $fila, 19, 1);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
    	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RECOMENDACIÓN");
		$arr_cel = combinar_celdas($columna, $fila, 9, 1);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
    	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RESTRICCION");
		$arr_cel = combinar_celdas($columna, $fila, 9, 1);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
    	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "OBSERVACIONES");
		$arr_cel = combinar_celdas($columna, $fila, 0, 2);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
    	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "INTERCONSULTAS");
		$arr_cel = combinar_celdas($columna, $fila, 0, 2);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
    	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "PRÓXIMOS CONTROLES");
		$arr_cel = combinar_celdas($columna, $fila, 0, 2);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
    	$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "VENCIMIENTO DEL EXÁMEN MÉDICO");
		$arr_cel = combinar_celdas($columna, $fila, 0, 2);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$columna = 'D';
		$fila = 9;
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "APELLIDOS Y NOMBRES");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "DNI");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "EDAD");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "SEXO");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "FECHA DE NACIMIENTO");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "LUGAR DE NACIMIENTO");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);

		$columna = 'M';
		$fila = 9;
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "TIPO DE EXAMEN");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "PERFIL OCUPACIONAL");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "FECHA DEL EXAMEN");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "APTITUD LABORAL");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "FECHA DE CULMINO DE EXPEDIENTE");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$columna = 'BE';
		$fila = 8;
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "OÍDO DERECHO");
		$arr_cel = combinar_celdas($columna, $fila, 6, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "OIDO IZQUIERDO");
		$arr_cel = combinar_celdas($columna, $fila, 6, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "DIAGNOSTICO AUDIOMETRICO");
		$arr_cel = combinar_celdas($columna, $fila, 0, 1);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		
		$columna = 'R';
		$fila = 8;
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "ANTECEDENTES PERSONALES Y LABORALES");
		$arr_cel = combinar_celdas($columna, $fila, 5, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "HABITOS NOCIVOS");
		$arr_cel = combinar_celdas($columna, $fila, 2, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
			
		$columna = 'AN';
		$fila = 8;
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "ESPIROMETRIA");
		$arr_cel = combinar_celdas($columna, $fila, 4, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RX TORAX");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$columna = 'AT';
		$fila = 8;
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "OD");
		$arr_cel = combinar_celdas($columna, $fila, 1, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "OI");
		$arr_cel = combinar_celdas($columna, $fila, 1, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "OD");
		$arr_cel = combinar_celdas($columna, $fila, 1, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "OI");
		$arr_cel = combinar_celdas($columna, $fila, 1, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "Test ISHIHARA");
		$arr_cel = combinar_celdas($columna, $fila, 0, 1);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$columna = 'R';
		$fila = 9;
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "ALERGIAS");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "IMUNIZACIONES");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "FUR");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "ANTECEDENTES QUIRURGICOS");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "ACCIDENTES LABORALES");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "DISCAPACIDAD");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "ALCOHOL");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "TABACO");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "DROGAS");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "PESO (Kg)");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "TALLA (metros)");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "IMC (Kg/m2)");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "DX NUTRICIONAL");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "PERIMETRO ABDOMINAL");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "PERIMETRO CADERA");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "ICC");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "PAS (mm Hg)");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "PAD (mm Hg)");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "FC (lat/min)");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "FR (resp/min)");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "SAT %");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "T°");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "FVC %");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "FEV1 %");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "FEV1/FVC %");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "FEV 25-75%");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "Diagnostico");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "Diagnostico OIT");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "SC");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "CC");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "SC");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "CC");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "SC");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "CC");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "SC");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "CC");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);

		$columna = 'BE';
		$fila = 9;
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "500 hz D.");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "1000 hz D.");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "2000hz D.");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "3000 hz D.");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "4000 hz D.");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "6000 hz D.");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "8000 hz D.");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "500 hz D.");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "1000 hz D.");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "2000hz D.");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "3000 hz D.");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "4000 hz D.");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "6000 hz D.");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "8000 hz D.");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);

		$columna = 'BT';
		$fila = 9;
					
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "EKG");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);	
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "PRUEBA DE ESFUERZO");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);	
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "PSICOLOGIA");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);	
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "ACROFOBIA");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);	
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "CLAUSTROFOBIA");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);		
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "OTRAS FOBIAS");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);		
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "EXAMEN DE ALTURA ESTRUCTURAL");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);			
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "EXAMEN 7D");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);				
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "PSICOSENSOMETRICO");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);				
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "TEST DE EPWORTH");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);				
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RESPIRADOR");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);				
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "OSHA-SILICE");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);					
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "HB (gr%)");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);					
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "HTO(%)");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);						
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "PLAQUETAS");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);							
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RCTO RETICULOCITOS");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);							
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "GRUPO Y FACTOR Rh");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);							
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "Ex. Completo de Orina");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);								
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "GLUCOSA (mg/dl)");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);									
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "COLESTEROL (mg%)");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);										
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "HDL (mg%)");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);										
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "LDL (mg%)");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);									
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "TRIGLICÉRIDOS (mg%)");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);								
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RIESGO CORONARIO (col total/HDL)");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);							
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "ACIDO URICO");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);						
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "CREATININA");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);					
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RPR /VDRL");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);					
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "ELISA VIH");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);					
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "COCAINA");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);				
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "MARIHUANA");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);			
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "DX 1");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);		
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "CIE10 1");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);			
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "DX 2");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);		
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "CIE10 2");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);		
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "DX 3");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);		
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "CIE10 3");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);		
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "DX 4");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);		
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "CIE10 4");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);		
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "DX 5");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);		
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "CIE10 5");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);		
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "DX 6");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);		
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "CIE10 6");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);		
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "DX 7");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);		
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "CIE10 7");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);		
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "DX 8");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);		
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "CIE10 8");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);		
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "DX 9");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);		
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "CIE10 9");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);		
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "DX 10");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);		
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "CIE10 10");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);	
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RECOMENDACIÓN 1");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RECOMENDACIÓN 2");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RECOMENDACIÓN 3");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RECOMENDACIÓN 4");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RECOMENDACIÓN 5");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RECOMENDACIÓN 6");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RECOMENDACIÓN 7");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RECOMENDACIÓN 8");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RECOMENDACIÓN 9");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RECOMENDACIÓN 10");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RESTRICCION 1");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RESTRICCION 2");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RESTRICCION 3");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RESTRICCION 4");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RESTRICCION 5");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RESTRICCION 6");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RESTRICCION 7");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RESTRICCION 8");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RESTRICCION 9");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);
		
		$objPHPExcel->getActiveSheet()->setCellValue($columna . $fila, "RESTRICCION 10");
		$arr_cel = combinar_celdas($columna, $fila, 0, 0);
		$rango = $arr_cel['rango'];
		$columna = $arr_cel['columna'];
		$objPHPExcel->getActiveSheet()->mergeCells($rango);

		

        //fin cabeceras
        //FONDO
        $objPHPExcel->getActiveSheet()->getStyle("A7:EO9")->getFill()->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,
            'startcolor' => array('rgb' => '9cbafc')
        ));
	
		
        //COLOR NEGRITA TAMAÑO
        $objPHPExcel->getActiveSheet()->getStyle('A7:EO9')->getFont()->setBold(true)
                ->setName('')
                ->setSize('8')
                ->getColor()->setRGB('0e50b2');			
		
		
		
		$objPHPExcel->getActiveSheet()->getStyle('A7:EO9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('A7:EO9')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		
        $fechainicio = $_GET["fechainicio"];
        $fechafinal = $_GET["fechafinal"];
        if (($fechainicio == '')) {
            $fechainicio = $Fecha_actual;
        } else {
            $fechainicio = insertar_fecha($fechainicio);
        }

        if ($fechafinal == '') {
            $fechafinal = $Fecha_actual;
        } else {
            $fechafinal = insertar_fecha($fechafinal);
        }



        $idempresa = $_GET["idempresa"];
        $idsubcontrata = $_GET["idsubcontrata"];
        $idobra = $_GET["idobra"];
        $idcr = $_GET["idcr"];
		$idtipo_2 = $_GET["idtipo"];
        $idsolicitante = $_GET["idsolicitante"];
		$chksubcontrata = $_GET["chksubcontrata"];
		$sede = $_GET["sede"];
		if($chksubcontrata!=''){ $condchksub="and t1.idsubcontrata=''";} 

        if ($idempresa != '') {
            $condemp = "and t1.idempresa='$idempresa'";
        }
        if ($idsubcontrata != '') {
            $condsub = "and t1.idsubcontrata='$idsubcontrata'";
        }
        if ($idobra != '') {
            $condobra = "and t1.idobra='$idobra'";
        }
        if ($idcr != '') {
            $condcr = "and t1.idcr='$idcr'";
        }
        if ($idsolicitante != '') {
            $condsol = "and t1.idsolicitante='$idsolicitante'";
        }
		if ($idtipo_2 != '') {
            $condtipo = "and t1.idtipo='$idtipo_2'";
        }
		if($sede!=''){$condsede="and t1.idlocal='$sede'";}else{$condsede="";}

        $sql_ate = "SELECT
		t1.hclinica,
		CONCAT(t4.apellidos,' ', t4.nombres) as paciente,
		t4.dni2 as dni2,
		t4.sexo,
		t4.fechanacimiento,
		t5.nombre AS departamento,
		t6.nombre AS departamento2,
		t1.puesto,
		t1.area,
		t8.descripcion as proyecto,
		t7.descripcion as local,
		t9.descripcion as emo,
		t1.fecha,
		t1.idobra,
		t1.idcomprobante,
		t2.descripcion AS empresa,
		t3.descripcion AS subcontrata,
		t9.descripcion AS tipo_examen,
		t1.idtipo_formato,
		t4.codigo_registro
        FROM comprobante t1
        INNER JOIN empresa t2 ON t1.idempresa = t2.idempresa
        LEFT JOIN empresa t3 ON t1.idsubcontrata = t3.idempresa
        INNER JOIN paciente t4 ON t1.idpaciente = t4.idpaciente
        left join graldepartamentos	t5 on t4.iddepartamento2=t5.iddepartamento
        left join graldepartamentos	t6 on t4.iddepartamento=t6.iddepartamento
        left join local	t7 on t1.idlocal=t7.idlocal
        left join proyecto	t8 on t1.idproyecto=t8.idproyecto
        left join tipo_examen	t9 on t1.idtipo=t9.idtipo
        WHERE t1.estado=1 and t1.fecha between '$fechainicio' and '$fechafinal' $condemp $condsub $condobra $condcr $condsol $condtipo $condchksub $condsede order by t1.fecha DESC";
		//echo $sql_ate;die();
        $query_ate = mysql_query($sql_ate)or die(mysql_error());
        $num_rows = mysql_num_rows($query_ate);
		$objPHPExcel->getActiveSheet()->getStyle("A7:EO".($num_rows + 9))->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_DOTTED);
        
		$k = '1';
        $f = 7;
		$fila++;
		$i=1;
		$x=8;
        while ($row = mysql_fetch_array($query_ate)) {

           $fecha_co = mostrar_fecha($row["fecha"]);
           $fechaccc = $row["fecha"];
			
			$idcomprobante = $row["idcomprobante"];
			$pagina = $row["idtipo_formato"];
			$empresa = $row["empresa"];
			$hclinica = $row["hclinica"];
			$codigo_registro = $row["codigo_registro"];
			
			$paciente = $row["paciente"];
			$puesto = '';
			$area = '';
			$puesto = $row["puesto"];
			$area = $row["area"];
			$tipo_examen = $row["tipo_examen"];
			$proyecto = $row["proyecto"];
			$local = $row["local"];
			$subcontrata = $row["subcontrata"];
			if($subcontrata!=''){$empresa=$subcontrata;}
			$empresa=ver_empresasub($idcomprobante);
			$departamento = $row["departamento"];
			$departamento2 = $row["departamento2"];
			$idobra = '';
			$idobra = $row["idobra"];
			$perfil= '';
			$perfil= busca_existe3('descripcion', 'obra', 'idobra', $idobra);
			$correo = $row["correo"];
			$dni = $row["dni2"];
			$sexo = '';
			$sexo = obt_sexo($row["sexo"]);
	
			$fechanacimiento = $row["fechanacimiento"];
			$fechanaci = mostrar_fecha($row["fechanacimiento"]);
			$edad = '';
			$edad = toyear($fechanacimiento, insertar_fecha($fecha_co));
			
			
			$sql_lab = "select
			idanalisis_cli_arca,hemoglobina,hematocrito,plaquetas,reticulocitos,grupo,factor,exaco_orina,glucosa,
			colesterol,hdl,ldl,trigliceridos,acido_urico,creatinina,reaccion_lues,coca_droga,mari_droga,hiv
			from analisis_cli_arca where idcomprobante='$idcomprobante' and estado=1";
			$query_lab = mysql_query($sql_lab)or die(mysql_error() . ":<br>" . $sql_lab);
			$row_lab = mysql_fetch_array($query_lab);
			$idanalisis_cli_arca = $row_lab["idanalisis_cli_arca"];
			$hemoglobina = '';
			$hematocrito = '';
			$plaquetas = '';
			$reticulocitos = '';
			$grupo = '';
			$factor = '';
			$exaco_orina = '';
			$glucosa = '';
			$colesterol = '';
			$hdl = '';
			$ldl = '';
			$trigliceridos = '';
			$riescoro = '';
			$acido_urico = '';
			$creatinina = '';
			$reaccion_lues = '';
			$coca_droga = '';
			$mari_droga = '';
			$grupo_factor = '';
			$hiv = '';
			if($idanalisis_cli_arca * 1 > 0){
				$hemoglobina = trim($row_lab["hemoglobina"]);
				$hematocrito = trim($row_lab["hematocrito"]);
				$plaquetas = trim($row_lab["plaquetas"]);
				$reticulocitos = trim($row_lab["reticulocitos"]);
				$grupo = trim($row_lab["grupo"]);
				$factor = trim($row_lab["factor"]);
				$exaco_orina = trim($row_lab["exaco_orina"]);
				if($exaco_orina==1){
					$exaco_orina = 'NORMAL';
				}elseif($exaco_orina==2){
					$exaco_orina = 'ANORMAL';
				}
				
				$hiv = trim($row_lab["hiv"]);
				$glucosa = trim($row_lab["glucosa"]);
				$colesterol = trim($row_lab["colesterol"]);
				$hdl = trim($row_lab["hdl"]);
				$ldl = trim($row_lab["ldl"]);
				$trigliceridos = trim($row_lab["trigliceridos"]);
				$acido_urico = trim($row_lab["acido_urico"]);
				$creatinina = trim($row_lab["creatinina"]);
				$reaccion_lues = trim($row_lab["reaccion_lues"]);
				if($reaccion_lues==1){
					$reaccion_lues = 'REACTIVO';
				}elseif($reaccion_lues==2){
					$reaccion_lues = 'NO REACTIVO';
				}
				$coca_droga = trim($row_lab["coca_droga"]);
				$mari_droga = trim($row_lab["mari_droga"]);
				if($colesterol != '' && $hdl != ''){
					$riescoro = $colesterol.' / '.$hdl;
				}
				if($grupo != '' && $factor != ''){
					$grupo_factor = $grupo.' '.$factor;
				}
			}

			
	
		$psico_tecni ="";
		$sql_ex = "SELECT idformato_diagnostico,idpaciente,idcomprobante,iddoctor,revisadofh02,fecha,
		aud_hab1, aud_cie1, aud_diag1, aud_alt1, aud_reco1, audio_diagop1, 
		aud_hab2, aud_cie2, aud_diag2, aud_alt2, aud_reco2, audio_diagop2, 
		aud_hab3, aud_cie3, aud_diag3, aud_alt3, aud_reco3, audio_diagop3,  
		aud_hab4, aud_cie4, aud_diag4, aud_alt4, aud_reco4, audio_diagop4, 
		aud_hab5, aud_cie5, aud_diag5, 			 aud_reco5, audio_diagop5, 
		aud_hab6, aud_cie6, aud_diag6, 			 aud_reco6, audio_diagop6, 
		oft_hab1, oft_cie1, oft_diag1, oft_alt1, oft_reco1, oft_diagop1, 
		oft_hab2, oft_cie2, oft_diag2, oft_alt2, oft_reco2, oft_diagop2, 
		oft_hab3, oft_cie3, oft_diag3, oft_alt3, oft_reco3, oft_diagop3, 
		ele_hab1, ele_cie1, ele_diag1, ele_alt1, ele_reco1, card_diagop1
	
		, ele_hab2
		, ele_cie2
		, ele_diag2
		, ele_alt2
		, ele_reco2
		, card_diagop2
		, ele_hab3
		, ele_cie3
		, ele_diag3
		, ele_alt3
		, ele_reco3
		, card_diagop3
		, rayosx_hab1
		, rayosx_cie1
		, rayosx_diag1
		, rayosx_alt1
		, rayosx_reco1
		, rayos_diagop1
		, rayosx_hab2
		, rayosx_cie2
		, rayosx_diag2
		, rayosx_alt2
		, rayosx_reco2
		, rayos_diagop2
		, rayosx_hab3
		, rayosx_cie3
		, rayosx_diag3
		, rayosx_alt3
		, rayosx_reco3
		, rayos_diagop3
		, rayosx_hab4
		, rayosx_cie4
		, rayosx_diag4
		, rayosx_alt4
		, rayosx_reco4
		, rayos_diagop4
		, odo_hab1
		, odo_cie1
		, odo_diag1
		, odo_alt1
		, odo_reco1
		, odo_diagop1
		, odo_hab2
		, odo_cie2
		, odo_diag2
		, odo_alt2
		, odo_reco2
		, odo_diagop2
		, odo_hab3
		, odo_cie3
		, odo_diag3
		, odo_alt3
		, odo_reco3
		, odo_diagop3
		, espi_hab1, espi_cie1, espi_diag1, espiro_alt1, espi_reco1, espi_diagop1, 
		  espi_hab2, espi_cie2, espi_diag2, espiro_alt2, espi_reco2, espi_diagop2, 
		  espi_hab3, espi_cie3, espi_diag3, espiro_alt3, espi_reco3, espi_diagop3, 
		  moc_hab1
		, moc_cie1
		, moc_diag1
		, moc_alt1
		, moc_reco1
		, moc_diagop1
		, moc_hab2
		, moc_cie2
		, moc_diag2
		, moc_alt2
		, moc_reco2
		, moc_diagop2
		, moc_hab3
		, moc_cie3
		, moc_diag3
		, moc_alt3
		, moc_reco3
		, moc_diagop3
		, moc_hab4
		, moc_cie4
		, moc_diag4
		, moc_alt4
		, moc_reco4
		, moc_diagop4
		, moc_hab5
		, moc_cie5
		, moc_diag5
		, moc_alt5
		, moc_reco5
		, moc_diagop5
		, moc_hab6
		, moc_cie6
		, moc_diag6
		, moc_alt6
		, moc_reco6
		, moc_diagop6
		, moc_hab7
		, moc_cie7
		, moc_diag7
		, moc_alt7
		, moc_reco7
		, moc_diagop7
		, moc_hab8
		, moc_cie8
		, moc_diag8
		, moc_alt8
		, moc_reco8
		, moc_diagop8
		, moc_hab9
		, moc_cie9
		, moc_diag9
		, moc_alt9
		, moc_reco9
		, moc_diagop9
		, moc_hab10
		, moc_cie10
		, moc_diag10
		, moc_alt10
		, moc_reco10
		, moc_diagop10
		, otros_cie1
		
		, diag_complementario1
		, otro_reco1
		, otros_diagop1
		, otros_cie2
		, diag_complementario2
		, otro_reco2
		, otros_diagop2
		, otros_cie3
		, diag_complementario3
		, otro_reco3
		, otros_diagop3
		, otros_cie4
		, diag_complementario4
		, otro_reco4
		, otros_diagop4
		, otros_cie5
		, diag_complementario5
		, otro_reco5
		, otros_diagop5
		, otros_cie6
		, diag_complementario6
		, otro_reco6
		, otros_diagop6
		, otros_cie7
		, diag_complementario7
		, otro_reco7
		, otros_diagop7
		, otros_cie8
		, diag_complementario8
		, otro_reco8
		, otros_diagop8
		, otros_cie9
		, diag_complementario9
		, otro_reco9
		, otros_diagop9
		, otros_cie10
		, diag_complementario10
		, otro_reco10
		, otros_diagop10
		, lab_hab1
		, labo_cie1
		, laboratorio
		, labo_reco
		, lab_hab2
		, labo_cie2
		, laboratorio2
		, labo_reco2
		, lab_hab3
		, labo_cie3
		, laboratorio3
		, labo_reco3,
	
		aptitud,
		rest_observaciones,
		aptitud_psi,
		psico_tecni,
		psicosenso,
		detalle_aptitud,
		det_pendiente,
		restriccion1, 
		restriccion2, 
		restriccion3, 
		restriccion4, 
		restriccion5, 
		restriccion6, 
		restriccion7, 
		restriccion8,
		restriccion9,
		restriccion10,
		restriccion11,
		restriccion12,
		restriccion13,
		restriccion14,
		restriccion15,
		restriccion16,
		restriccion17,
		restriccion18,
		restriccion19,
		restriccion20,
		restriccion21,
		restriccion22,
		restriccion23,
		restriccion24,
		restriccion25,
		restriccion26,
		restriccion27,
		restriccion28,
		restriccion29,
		restriccion30,
		restriccion31,
		restriccion35,
		lentes_produccion,
		lentes_liviano,
		lentes_gruas,
		lentes_gruas2,
		restriccion32,
		rest_detalle8,
		rest_detalle13,
		rest_detalle14,
		levantar_carga,
		fecha_apto,
		fecha_vencimiento,
		ekg_prueba_esf,
		prueba_esf,
		lentes_produccion,
		lentes_liviano,
		lentes_gruas,
		lentes_gruas2,
		vehi_produccion,
		vehi_liviano,
		vehi_gruas
		from formato_diagnostico where idcomprobante='$idcomprobante' and estado=1 ";
			$query_ex = mysql_query($sql_ex)or die(mysql_error() . ":<br>" . $sql_ex);
			$rowdiag= mysql_fetch_array($query_ex);
			$fecha_vencimiento=$rowdiag["fecha_vencimiento"];
			$fecha_apto=$rowdiag["fecha_apto"];
			$det_pendiente=$rowdiag["det_pendiente"];
	
		
	///////////////////////////////////////////////////////
		$ekg_prueba_esf ='';
		if($rowdiag["ekg_prueba_esf"]=='1'){$ekg_prueba_esf = 'NORMAL';}
		elseif($rowdiag["ekg_prueba_esf"]=='2'){$ekg_prueba_esf = 'ANORMAL';}
		elseif($rowdiag["ekg_prueba_esf"]=='3'){$ekg_prueba_esf = 'NO APLICA';}
		if($rowdiag["prueba_esf"]!=''){$ekg_prueba_esf.= ': '.$rowdiag["prueba_esf"];}
	
		if($rowdiag["psico_tecni"]==''){$psico_tecni = 'NO APLICA';}
		elseif($rowdiag["psico_tecni"]=='1'){$psico_tecni = 'APTO';}
		elseif($rowdiag["psico_tecni"]=='2'){$psico_tecni = 'APTO CON RESTRICCIONES';}
		elseif($rowdiag["psico_tecni"]=='4'){$psico_tecni = 'NO APTO';}
		
		$respirador='';
		if($rowdiag["restriccion14"]=='si'){$respirador = 'APTO';}
		elseif($rowdiag["restriccion14"]=='no'){$respirador = 'NO APTO';}
						
	///////////////////////////////////////////////////////	
		unset ($arr_restricciones);		
		$arr_restricciones=array();	
		
		if($rowdiag["restriccion6"]=='si'){$arr_restricciones[]='Restricción para manipular cargas (En caso se restrinja detallar)';}
		if($rowdiag["restriccion19"]=='si'){$arr_restricciones[]='No puede ser brigadista';}
		if($rowdiag["restriccion20"]=='si'){$arr_restricciones[]='Trabajo en inmersión';}
		if($rowdiag["restriccion11"]=='si'){$arr_restricciones[]='No debe operar grúas';}
		if($rowdiag["restriccion12"]=='si'){$arr_restricciones[]='No debe exponerse a humo de soldadura';}
		if($rowdiag["restriccion16"]=='si'){$arr_restricciones[]='No exponerse a sustancias quimicas';}
		if($rowdiag["restriccion27"]=='si'){$arr_restricciones[]='Trabajos de soldadura';}
		if($rowdiag["restriccion15"]=='si'){$arr_restricciones[]='No levantar cargas mayor a:'.$rowdiag["levantar_carga"].'Kg';}
	
		if($rowdiag["restriccion21"]=='si'){$arr_restricciones[]='No realizar labores como rigger';}
		if($rowdiag["restriccion22"]=='si'){$arr_restricciones[]='No exponerse a niebla acida';}
		if($rowdiag["restriccion23"]=='si'){$arr_restricciones[]='No subir/ bajar gradas con frecuencia';}
		if($rowdiag["restriccion24"]=='si'){$arr_restricciones[]='No trabajar en solitario';}
		if($rowdiag["restriccion25"]=='si'){$arr_restricciones[]='No operar equipos con vibración > 0.5 m/seg2';}
		if($rowdiag["restriccion26"]=='si'){$arr_restricciones[]='Sólo trabajo diurno';}
		if($rowdiag["restriccion8"]=='si'){
			if($rowdiag["rest_detalle8"]!=''){$arr_restricciones[]=$rowdiag["rest_detalle8"];}
			if($rowdiag["rest_detalle13"]!=''){$arr_restricciones[]=$rowdiag["rest_detalle13"];}
			if($rowdiag["rest_detalle14"]!=''){$arr_restricciones[]=$rowdiag["rest_detalle14"];}
			
		}
		$restriccion_det='';
		if($fecha_corte_cerro<=($fechaccc)){
			if($rowdiag["restriccion17"]=='si'){$arr_restricciones[]='No realizar trabajos de campo';}
			if($rowdiag["restriccion1"]=='si'){$arr_restricciones[]='No realizar trabajos en altura estructural';}
			if($rowdiag["restriccion10"]=='si'){$arr_restricciones[]='No realizar labores en espacio confinado';}
			if($rowdiag["restriccion3"]=='si'){$arr_restricciones[]='No exponerse a polvo de sílice > 0.025 mg/m3';}
			if($rowdiag["restriccion2"]=='si'){$arr_restricciones[]='No manipular cables de colores';}
			if($rowdiag["restriccion18"]=='si'){$arr_restricciones[]='Uso permanente EPP auditivo';}
			if($rowdiag["restriccion4"]=='si'){$arr_restricciones[]="No exponerse a ruido ≥ 80 dB";}
			if($rowdiag["restriccion9"]=='si'){$arr_restricciones[]='Solo trabajo administrativo';}
			if($rowdiag["restriccion7"]=='si' || $rowdiag["restriccion11"]=='si'){$arr_restricciones[]='No debe conducir/ operar: ';
				//$restriccion_det='';
				if($rowdiag["vehi_produccion"]=='on'){$restriccion_det.='Producción, ';}
				if($rowdiag["vehi_liviano"]=='on'){$restriccion_det.='Liviano, ';}
				if($rowdiag["vehi_gruas"]=='on'){$restriccion_det.='Servicio, ';}
				$restriccion_det=trim($restriccion_det);
				$restriccion_det=trim($restriccion_det,',');
				
				$arr_restricciones[]=$restriccion_det;
			}
			if($rowdiag["restriccion5"]=='si'){
				if($rowdiag["lentes_produccion"]=='on'){$restriccion_det.='Equipo de produccion, ';}
				if($rowdiag["lentes_liviano"]=='on'){$restriccion_det.='Equipo de servicio, ';}
				if($rowdiag["lentes_gruas"]=='on'){$restriccion_det.='Equipo de liviano, ';}	
				if($rowdiag["lentes_gruas2"]=='on'){$restriccion_det.='Equipo de Grúas, ';}	
				$restriccion_det=trim($restriccion_det);
				$restriccion_det=trim($restriccion_det,',');
				
				$arr_restricciones[]='Uso de lentes correctores para operar: '.$restriccion_det;
			}
		}else{
			if($rowdiag["restriccion17"]=='si'){$arr_restricciones[]='Labores de campo';}
			if($rowdiag["restriccion1"]=='si'){$arr_restricciones[]='Restriccion para trabajos en altura física mayor a 1.8';}
			if($rowdiag["restriccion10"]=='si'){$arr_restricciones[]='No se puede laborar en espacios confinados';}
			if($rowdiag["restriccion3"]=='si'){$arr_restricciones[]='Restricción para exponerse al polvo (> Nivel de Accion) con EPP';}
			if($rowdiag["restriccion2"]=='si'){$arr_restricciones[]='Restriccion para trabajar con fibra de óptica o cables eléctricos';}
			if($rowdiag["restriccion18"]=='si'){$arr_restricciones[]='Uso estricto de EPP auditivo';}
			if($rowdiag["restriccion4"]=='si'){$arr_restricciones[]='No exponerse a mas de 80 db';}
			if($rowdiag["restriccion9"]=='si'){$arr_restricciones[]='Labores administrativas';}
			if($rowdiag["restriccion7"]=='si'){$arr_restricciones[]='No conducir vehículos / No operar Equipos: ';
				$restriccion_det='';
				if($rowdiag["vehi_produccion"]=='on'){$restriccion_det.='Producción, ';}
				if($rowdiag["vehi_liviano"]=='on'){$restriccion_det.='Liviano, ';}
				if($rowdiag["vehi_gruas"]=='on'){$restriccion_det.='Servicio, ';}
				$restriccion_det=trim($restriccion_det);
				$restriccion_det=trim($restriccion_det,',');
				
				$arr_restricciones[]=$restriccion_det;
			}//vehi_produccion vehi_liviano vehi_gruas
			if($rowdiag["restriccion5"]=='si'){
				$arr_restricciones[]='Uso permanente de lentes correctores: ';
				$restriccion_det='';
				if($rowdiag["lentes_produccion"]=='on'){$restriccion_det.='Equipo de produccion, ';}
				if($rowdiag["lentes_liviano"]=='on'){$restriccion_det.='Equipo de servicio, ';}
				if($rowdiag["lentes_gruas"]=='on'){$restriccion_det.='Equipo de liviano, ';}	
				if($rowdiag["lentes_gruas2"]=='on'){$restriccion_det.='Equipo de Grúas, ';}	
				$restriccion_det=trim($restriccion_det);
				$restriccion_det=trim($restriccion_det,',');
				
				$arr_restricciones[]=$restriccion_det;
			}//  
		}
		
		
		$cambio21042017 = cambio_formato($fechaccc);
	
		if($cambio21042017){
			$restriccion_det='';
			unset ($arr_restricciones);		
			$arr_restricciones=array();	
			if($rowdiag["restriccion1"]=='si'){$arr_restricciones[]='No realizar trabajos en altura estructural';}
			if($rowdiag["restriccion2"]=='si'){$arr_restricciones[]='No manipular cables de colores ni fibra optica';}
			if($rowdiag["restriccion31"]=='si'){$arr_restricciones[]='No exponerse a polvo de silice mayor a 0.025 mg/m3';}
			if($rowdiag["restriccion4"]=='si'){$arr_restricciones[]='No exponerse a ruido mayor igual a 80 dB';}
			if($rowdiag["restriccion35"]=='si'){$arr_restricciones[]='No puede realizar trabajos de precisión';}
			if($rowdiag["restriccion5"]=='si'){
				if($rowdiag["lentes_produccion"]=='on'){$restriccion_det.='Equipo de Produccion / Servicio / Izaje, ';}
				if($rowdiag["lentes_gruas"]=='on'){$restriccion_det.='Equipo Liviano, ';}
				$restriccion_det=trim($restriccion_det);
				$restriccion_det=trim($restriccion_det,',');
				$arr_restricciones[]='Uso de lentes correctores';
				if($restriccion_det != ''){
					$arr_restricciones[]='Uso de lentes correctores: '.$restriccion_det;
				}
			}
			if($rowdiag["restriccion7"]=='si'){
				$restriccion_det='';
				if($rowdiag["vehi_produccion"]=='on'){$restriccion_det.='Produccion / Servicio / Izaje, ';}
				if($rowdiag["vehi_liviano"]=='on'){$restriccion_det.='Liviano, ';}
				$restriccion_det=trim($restriccion_det);
				$restriccion_det=trim($restriccion_det,',');
				$arr_restricciones[]='No debe conducir / operar';
				if($restriccion_det != ''){
					$arr_restricciones[]='No debe conducir / operar: '.$restriccion_det;
				}
			}
			if($rowdiag["restriccion32"]=='si'){$arr_restricciones[]='No conducir / operar de noche';}
			if($rowdiag["restriccion17"]=='si'){$arr_restricciones[]='No realizar trabajos de campo';}
			if($rowdiag["restriccion10"]=='si'){$arr_restricciones[]='No realizar labores en espacios confinados';}
			if($rowdiag["restriccion12"]=='si'){$arr_restricciones[]='No debe exponerse a humo de soldadura';}
			if($rowdiag["restriccion15"]=='si'){$arr_restricciones[]='No levantar cargas mayor a: '.$rowdiag["levantar_carga"].'Kg';}//
			if($rowdiag["restriccion21"]=='si'){$arr_restricciones[]='No realizar labores como rigger';}
			if($rowdiag["restriccion22"]=='si'){$arr_restricciones[]='No exponerse a niebla acida';}
			if($rowdiag["restriccion23"]=='si'){$arr_restricciones[]='No subir/ bajar gradas con frecuencia';}
			if($rowdiag["restriccion25"]=='si'){$arr_restricciones[]='No operar equipos con vibración > 0.5 m/seg2';}
			if($rowdiag["restriccion28"]=='si'){$arr_restricciones[]='Usar bloqueador solar medicado';}
			if($rowdiag["restriccion29"]=='si'){$arr_restricciones[]='No usar protector auditivo tipo inserto';}
			if($rowdiag["restriccion30"]=='si'){$arr_restricciones[]='No puede usar respirador de silicona';}
			
			
			if($rowdiag["restriccion8"]=='si'){
				if($rowdiag["rest_detalle8"]!=''){$arr_restricciones[]=$rowdiag["rest_detalle8"];}
				if($rowdiag["rest_detalle13"]!=''){$arr_restricciones[]=$rowdiag["rest_detalle13"];}
				if($rowdiag["rest_detalle14"]!=''){$arr_restricciones[]=$rowdiag["rest_detalle14"];}
			}
			
		}
	
	//Audiometria
	$aud_hab1=trim($rowdiag["aud_hab1"]);
	$aud_hab3=trim($rowdiag["aud_hab3"]);
	$aud_hab4=trim($rowdiag["aud_hab4"]);
	$aud_hab5=trim($rowdiag["aud_hab5"]);
	$aud_hab6=trim($rowdiag["aud_hab6"]);
			
	$aud_reco1=trim($rowdiag["aud_reco1"]);
	$aud_reco3=trim($rowdiag["aud_reco3"]);	
	$aud_reco4=trim($rowdiag["aud_reco4"]);	
	$aud_reco5=trim($rowdiag["aud_reco5"]);	
	$aud_reco6=trim($rowdiag["aud_reco6"]);	
	/*	$aud_cie1=trim($rowdiag["aud_cie1"]);
	$aud_cie3=trim($rowdiag["aud_cie3"]);*/
	$aud_diag1=trim($rowdiag["aud_diag1"]);
	if(trim($rowdiag["aud_alt1"])!='')$aud_diag1=trim($rowdiag["aud_alt1"]);
	$aud_diag3=trim($rowdiag["aud_diag3"]);
	if(trim($rowdiag["aud_alt3"])!='')$aud_diag3=trim($rowdiag["aud_alt3"]);
	$aud_diag2=trim($rowdiag["aud_diag2"]);
	if(trim($rowdiag["aud_alt2"])!='')$aud_diag2=trim($rowdiag["aud_alt2"]);
	$aud_diag4=trim($rowdiag["aud_diag4"]);
	$aud_diag5=trim($rowdiag["aud_diag5"]);
	$aud_diag6=trim($rowdiag["aud_diag6"]);
	
	
	//oftalmologia
	$oft_diag1=trim($rowdiag["oft_diag1"]);
	$oft_diag2=trim($rowdiag["oft_diag2"]);
	$oft_diag3=trim($rowdiag["oft_diag3"]);
	
	$oft_hab1=trim($rowdiag["oft_hab1"]);
	$oft_hab2=trim($rowdiag["oft_hab2"]);
	$oft_hab3=trim($rowdiag["oft_hab3"]);
	
	$oft_reco1=trim($rowdiag["oft_reco1"]);
	$oft_reco2=trim($rowdiag["oft_reco2"]);
	$oft_reco3=trim($rowdiag["oft_reco3"]);
	
	$oft_alt1=trim($rowdiag["oft_alt1"]);
	if($oft_alt1!=''){$oft_diag1=$oft_alt1;}
	
	$oft_alt2=trim($rowdiag["oft_alt2"]);
	if($oft_alt2!=''){$oft_diag2=$oft_alt2;}
	
	$oft_alt3=trim($rowdiag["oft_alt3"]);
	if($oft_alt3!=''){$oft_diag3=$oft_alt3;}
	
	
	//Diagnósticos de oftalmología
	$oftalmologia_diag="";
	if(trim($oft_diag1)!=""){
	$oftalmologia_diag=$oft_diag1;
	}
	if(trim($oft_diag2)!=""){
	if(trim($oftalmologia_diag)!=""){
		$oftalmologia_diag.=" , ";
	}
	$oftalmologia_diag.=$oft_diag2;
	}
	if(trim($oft_diag3)!=""){
	if(trim($oftalmologia_diag)!=""){
		$oftalmologia_diag.=" , ";
	}
	$oftalmologia_diag.=$oft_diag3;
	}
	
	//rayos x
	$rayosx_cie1=trim($rowdiag["rayosx_cie1"]);
	$rayosx_cie2=trim($rowdiag["rayosx_cie2"]);
	$rayosx_cie3=trim($rowdiag["rayosx_cie3"]);
	$rayosx_cie4=trim($rowdiag["rayosx_cie4"]);
	
	$rayosx_diag1=trim($rowdiag["rayosx_diag1"]);
	$rayosx_diag2=trim($rowdiag["rayosx_diag2"]);
	$rayosx_diag3=trim($rowdiag["rayosx_diag3"]);
	$rayosx_diag4=trim($rowdiag["rayosx_diag4"]);
	
	$rayosx_alt1=trim($rowdiag["rayosx_alt1"]);
	$rayosx_alt2=trim($rowdiag["rayosx_alt2"]);
	$rayosx_alt3=trim($rowdiag["rayosx_alt3"]);
	$rayosx_alt4=trim($rowdiag["rayosx_alt4"]);
	
	if($rayosx_alt1!=''){$rayosx_diag1=$rayosx_alt1;}
	if($rayosx_alt2!=''){$rayosx_diag2=$rayosx_alt2;}
	if($rayosx_alt3!=''){$rayosx_diag3=$rayosx_alt3;}
	if($rayosx_alt4!=''){$rayosx_diag4=$rayosx_alt4;} 
	
	$rayosx_reco1=trim($rowdiag["rayosx_reco1"]);
	$rayosx_reco2=trim($rowdiag["rayosx_reco2"]);
	$rayosx_reco3=trim($rowdiag["rayosx_reco3"]);
	$rayosx_reco4=trim($rowdiag["rayosx_reco4"]);
	
	//Diagnósticos de Rayos
	$radiografia_diag="";
	if(trim($rayosx_diag1)!=""){
	$radiografia_diag=$rayosx_diag1;
	}
	if(trim($rayosx_diag2)!=""){
	if(trim($radiografia_diag)!=""){
		$radiografia_diag.=" , ";
	}
	$radiografia_diag.=$rayosx_diag2;
	}
	if(trim($rayosx_diag3)!=""){
	if(trim($radiografia_diag)!=""){
		$radiografia_diag.=" , ";
	}
	$radiografia_diag.=$rayosx_diag3;
	}
	if(trim($rayosx_diag4)!=""){
	if(trim($radiografia_diag)!=""){
		$radiografia_diag.=" , ";
	}
	$radiografia_diag.=$rayosx_diag4;
	}
	//Espiro
	
	$espi_diag1=trim($rowdiag["espi_diag1"]);
	$espi_diag2=trim($rowdiag["espi_diag2"]);
	$espi_diag3=trim($rowdiag["espi_diag3"]);
	
	$espiro_alt1=trim($rowdiag["espiro_alt1"]);
	$espiro_alt2=trim($rowdiag["espiro_alt2"]);
	$espiro_alt3=trim($rowdiag["espiro_alt3"]);
	
	
	$espi_reco1=trim($rowdiag["espi_reco1"]);
	$espi_reco2=trim($rowdiag["espi_reco2"]);
	$espi_reco3=trim($rowdiag["espi_reco3"]);
	
	if($espiro_alt1!=''){$espi_diag1=$espiro_alt1;}
	if($espiro_alt2!=''){$espi_diag2=$espiro_alt2;}
	if($espiro_alt3!=''){$espi_diag3=$espiro_alt3;}
	
	
	//Diagnósticos de espirometría
	$espirometria_diag="";
	if(trim($espi_diag1)!=""){
	$espirometria_diag=$espi_diag1;
	}
	if(trim($espi_diag2)!=""){
	if(trim($espirometria_diag)!=""){
		$espirometria_diag.=" , ";
	}
	$espirometria_diag.=$espi_diag2;
	}
	if(trim($espi_diag3)!=""){
	if(trim($espirometria_diag)!=""){
		$espirometria_diag.=" , ";
	}
	$espirometria_diag.=$espi_diag3;
	}
	
	////////////////////////////////////////////////////////////////////////////////////////////////
	
		$aud_cie1=trim($rowdiag["aud_cie1"]);
		$aud_diag1=trim($rowdiag["aud_diag1"]);
		$aud_alt1=trim($rowdiag["aud_alt1"]);
		$aud_reco1=trim($rowdiag["aud_reco1"]);
		if($aud_alt1!=''){$aud_diag1 = $aud_alt1;}
	
		$aud_cie2=trim($rowdiag["aud_cie2"]);
		$aud_diag2=trim($rowdiag["aud_diag2"]);
		$aud_alt2=trim($rowdiag["aud_alt2"]);
		$aud_reco2=trim($rowdiag["aud_reco2"]);
		if($aud_alt2!=''){$aud_diag2 = $aud_alt2;}
		
		$aud_cie3=trim($rowdiag["aud_cie3"]);
		$aud_diag3=trim($rowdiag["aud_diag3"]);
		$aud_alt3=trim($rowdiag["aud_alt3"]);
		$aud_reco3=trim($rowdiag["aud_reco3"]);
		if($aud_alt3!=''){$aud_diag3 = $aud_alt3;}
		
		$aud_cie4=trim($rowdiag["aud_cie4"]);
		$aud_diag4=trim($rowdiag["aud_diag4"]);
		$aud_alt4=trim($rowdiag["aud_alt4"]);
		$aud_reco4=trim($rowdiag["aud_reco4"]);
		if($aud_alt4!=''){$aud_diag4 = $aud_alt4;}	
	
		$aud_cie5=trim($rowdiag["aud_cie5"]);
		$aud_diag5=trim($rowdiag["aud_diag5"]);
		$aud_reco5=trim($rowdiag["aud_reco5"]);
	
		$aud_cie6=trim($rowdiag["aud_cie6"]);
		$aud_diag6=trim($rowdiag["aud_diag6"]);
		$aud_reco6=trim($rowdiag["aud_reco6"]);
	
	
		$oft_cie1=trim($rowdiag["oft_cie1"]);
		$oft_diag1=trim($rowdiag["oft_diag1"]);
		$oft_alt1=trim($rowdiag["oft_alt1"]);
		$oft_reco1=trim($rowdiag["oft_reco1"]);
		if($oft_alt1!=''){$oft_diag1 = $oft_alt1;}
		
		$oft_cie2=trim($rowdiag["oft_cie2"]);
		$oft_diag2=trim($rowdiag["oft_diag2"]);
		$oft_alt2=trim($rowdiag["oft_alt2"]);
		$oft_reco2=trim($rowdiag["oft_reco2"]);
		if($oft_alt2!=''){$oft_diag2 = $oft_alt2;}
		
		$oft_cie3=trim($rowdiag["oft_cie3"]);
		$oft_diag3=trim($rowdiag["oft_diag3"]);
		$oft_alt3=trim($rowdiag["oft_alt3"]);
		$oft_reco3=trim($rowdiag["oft_reco3"]);
		if($oft_alt3!=''){$oft_diag3 = $oft_alt3;}		
		
		$ele_cie1=trim($rowdiag["ele_cie1"]);
		$ele_diag1=trim($rowdiag["ele_diag1"]);
		$ele_alt1=trim($rowdiag["ele_alt1"]);
		$ele_reco1=trim($rowdiag["ele_reco1"]);
		if($ele_alt1!=''){$ele_diag1 = $ele_alt1;}
		
		$ele_cie2=trim($rowdiag["ele_cie2"]);
		$ele_diag2=trim($rowdiag["ele_diag2"]);
		$ele_alt2=trim($rowdiag["ele_alt2"]);
		$ele_reco2=trim($rowdiag["ele_reco2"]);
		if($ele_alt2!=''){$ele_diag2 = $ele_alt2;}
		
		$ele_cie3=trim($rowdiag["ele_cie3"]);
		$ele_diag3=trim($rowdiag["ele_diag3"]);
		$ele_alt3=trim($rowdiag["ele_alt3"]);
		$ele_reco3=trim($rowdiag["ele_reco3"]);
		if($ele_alt3!=''){$ele_diag3 = $ele_alt3;}
		
			
		$rayosx_cie1=trim($rowdiag["rayosx_cie1"]);
		$rayosx_diag1=trim($rowdiag["rayosx_diag1"]);
		$rayosx_alt1=trim($rowdiag["rayosx_alt1"]);
		$rayosx_reco1=trim($rowdiag["rayosx_reco1"]);
		if($rayosx_alt1!=''){$rayosx_diag1 = $rayosx_alt1;}
		
		$rayosx_cie2=trim($rowdiag["rayosx_cie2"]);
		$rayosx_diag2=trim($rowdiag["rayosx_diag2"]);
		$rayosx_alt2=trim($rowdiag["rayosx_alt2"]);
		$rayosx_reco2=trim($rowdiag["rayosx_reco2"]);
		if($rayosx_alt2!=''){$rayosx_diag2 = $rayosx_alt2;}
		
		$rayosx_cie3=trim($rowdiag["rayosx_cie3"]);
		$rayosx_diag3=trim($rowdiag["rayosx_diag3"]);
		$rayosx_alt3=trim($rowdiag["rayosx_alt3"]);
		$rayosx_reco3=trim($rowdiag["rayosx_reco3"]);
		if($rayosx_alt3!=''){$rayosx_diag3 = $rayosx_alt3;}
		
		$rayosx_cie4=trim($rowdiag["rayosx_cie4"]);
		$rayosx_diag4=trim($rowdiag["rayosx_diag4"]);
		$rayosx_alt4=trim($rowdiag["rayosx_alt4"]);
		$rayosx_reco4=trim($rowdiag["rayosx_reco4"]);
		if($rayosx_alt4!=''){$rayosx_diag4 = $rayosx_alt4;}
		
		$odo_cie1=trim($rowdiag["odo_cie1"]);
		$odo_diag1=trim($rowdiag["odo_diag1"]);
		$odo_alt1=trim($rowdiag["odo_alt1"]);
		$odo_reco1=trim($rowdiag["odo_reco1"]);
		if($odo_alt1!=''){$odo_diag1 = $odo_alt1;}
		
		$odo_cie2=trim($rowdiag["odo_cie2"]);
		$odo_diag2=trim($rowdiag["odo_diag2"]);
		$odo_alt2=trim($rowdiag["odo_alt2"]);
		$odo_reco2=trim($rowdiag["odo_reco2"]);
		if($odo_alt2!=''){$odo_diag2 = $odo_alt2;}
		
		$odo_cie3=trim($rowdiag["odo_cie3"]);
		$odo_diag3=trim($rowdiag["odo_diag3"]);
		$odo_alt3=trim($rowdiag["odo_alt3"]);
		$odo_reco3=trim($rowdiag["odo_reco3"]);
		if($odo_alt3!=''){$odo_diag3 = $odo_alt3;}
		
		$espi_cie1=trim($rowdiag["espi_cie1"]);
		$espi_diag1=trim($rowdiag["espi_diag1"]);
		$espiro_alt1=trim($rowdiag["espiro_alt1"]);
		$espi_reco1=trim($rowdiag["espi_reco1"]);
		if($espiro_alt1!=''){$espi_diag1 = $espiro_alt1;}
	
		$espi_cie2=trim($rowdiag["espi_cie2"]);
		$espi_diag2=trim($rowdiag["espi_diag2"]);
		$espiro_alt2=trim($rowdiag["espiro_alt2"]);
		$espi_reco2=trim($rowdiag["espi_reco2"]);
		if($espiro_alt2!=''){$espi_diag2 = $espiro_alt2;}
		
		$espi_cie3=trim($rowdiag["espi_cie3"]);
		$espi_diag3=trim($rowdiag["espi_diag3"]);
		$espiro_alt3=trim($rowdiag["espiro_alt3"]);
		$espi_reco3=trim($rowdiag["espi_reco3"]);
		if($espiro_alt3!=''){$espi_diag3 = $espiro_alt3;}
		
		$moc_cie1=trim($rowdiag["moc_cie1"]);
		$moc_diag1=trim($rowdiag["moc_diag1"]);
		$moc_alt1=trim($rowdiag["moc_alt1"]);
		$moc_reco1=trim($rowdiag["moc_reco1"]);
		if($moc_alt1!=''){$moc_diag1 = $moc_alt1;}
		
		$moc_cie2=trim($rowdiag["moc_cie2"]);
		$moc_diag2=trim($rowdiag["moc_diag2"]);
		$moc_alt2=trim($rowdiag["moc_alt2"]);
		$moc_reco2=trim($rowdiag["moc_reco2"]);
		if($moc_alt2!=''){$moc_diag2 = $moc_alt2;}
		
		$moc_cie3=trim($rowdiag["moc_cie3"]);
		$moc_diag3=trim($rowdiag["moc_diag3"]);
		$moc_alt3=trim($rowdiag["moc_alt3"]);
		$moc_reco3=trim($rowdiag["moc_reco3"]);
		if($moc_alt3!=''){$moc_diag3 = $moc_alt3;}
		
		$moc_cie4=trim($rowdiag["moc_cie4"]);
		$moc_diag4=trim($rowdiag["moc_diag4"]);
		$moc_alt4=trim($rowdiag["moc_alt4"]);
		$moc_reco4=trim($rowdiag["moc_reco4"]);
		if($moc_alt4!=''){$moc_diag4 = $moc_alt4;}
		
		$moc_cie5=trim($rowdiag["moc_cie5"]);
		$moc_diag5=trim($rowdiag["moc_diag5"]);
		$moc_alt5=trim($rowdiag["moc_alt5"]);
		$moc_reco5=trim($rowdiag["moc_reco5"]);
		if($moc_alt5!=''){$moc_diag5 = $moc_alt5;}
		
		$moc_cie6=trim($rowdiag["moc_cie6"]);
		$moc_diag6=trim($rowdiag["moc_diag6"]);
		$moc_alt6=trim($rowdiag["moc_alt6"]);
		$moc_reco6=trim($rowdiag["moc_reco6"]);
		if($moc_alt6!=''){$moc_diag6 = $moc_alt6;}
		
		$moc_cie7=trim($rowdiag["moc_cie7"]);
		$moc_diag7=trim($rowdiag["moc_diag7"]);
		$moc_alt7=trim($rowdiag["moc_alt7"]);
		$moc_reco7=trim($rowdiag["moc_reco7"]);
		if($moc_alt7!=''){$moc_diag7 = $moc_alt7;}
		
		$moc_cie8=trim($rowdiag["moc_cie8"]);
		$moc_diag8=trim($rowdiag["moc_diag8"]);
		$moc_alt8=trim($rowdiag["moc_alt8"]);
		$moc_reco8=trim($rowdiag["moc_reco8"]);
		if($moc_alt8!=''){$moc_diag8 = $moc_alt8;}
		
		$moc_cie9=trim($rowdiag["moc_cie9"]);
		$moc_diag9=trim($rowdiag["moc_diag9"]);
		$moc_alt9=trim($rowdiag["moc_alt9"]);
		$moc_reco9=trim($rowdiag["moc_reco9"]);
		if($moc_alt9!=''){$moc_diag9 = $moc_alt9;}
		
		$moc_cie10=trim($rowdiag["moc_cie10"]);
		$moc_diag10=trim($rowdiag["moc_diag10"]);
		$moc_alt10=trim($rowdiag["moc_alt10"]);
		$moc_reco10=trim($rowdiag["moc_reco10"]);
		if($moc_alt10!=''){$moc_diag10 = $moc_alt10;}
		
		$otros_cie1=trim($rowdiag["otros_cie1"]);
		$diag_complementario1=trim($rowdiag["diag_complementario1"]);
		$otro_reco1=trim($rowdiag["otro_reco1"]);
	
		$otros_cie2=trim($rowdiag["otros_cie2"]);
		$diag_complementario2=trim($rowdiag["diag_complementario2"]);
		$otro_reco2=trim($rowdiag["otro_reco2"]);
	
		$otros_cie3=trim($rowdiag["otros_cie3"]);
		$diag_complementario3=trim($rowdiag["diag_complementario3"]);
		$otro_reco3=trim($rowdiag["otro_reco3"]);
	
		$otros_cie4=trim($rowdiag["otros_cie4"]);
		$diag_complementario4=trim($rowdiag["diag_complementario4"]);
		$otro_reco4=trim($rowdiag["otro_reco4"]);
	
		$otros_cie5=trim($rowdiag["otros_cie5"]);
		$diag_complementario5=trim($rowdiag["diag_complementario5"]);
		$otro_reco5=trim($rowdiag["otro_reco5"]);
	
		$otros_cie6=trim($rowdiag["otros_cie6"]);
		$diag_complementario6=trim($rowdiag["diag_complementario6"]);
		$otro_reco6=trim($rowdiag["otro_reco6"]);
	
		$otros_cie7=trim($rowdiag["otros_cie7"]);
		$diag_complementario7=trim($rowdiag["diag_complementario7"]);
		$otro_reco7=trim($rowdiag["otro_reco7"]);
	
		$otros_cie8=trim($rowdiag["otros_cie8"]);
		$diag_complementario8=trim($rowdiag["diag_complementario8"]);
		$otro_reco8=trim($rowdiag["otro_reco8"]);
	
		$otros_cie9=trim($rowdiag["otros_cie9"]);
		$diag_complementario9=trim($rowdiag["diag_complementario9"]);
		$otro_reco9=trim($rowdiag["otro_reco9"]);
	
		$otros_cie10=trim($rowdiag["otros_cie10"]);
		$diag_complementario10=trim($rowdiag["diag_complementario10"]);
		$otro_reco10=trim($rowdiag["otro_reco10"]);
	
		$labo_cie1=trim($rowdiag["labo_cie1"]);
		$laboratorio=trim($rowdiag["laboratorio"]);
		$labo_reco=trim($rowdiag["labo_reco"]);
	
		$labo_cie2=trim($rowdiag["labo_cie2"]);
		$laboratorio2=trim($rowdiag["laboratorio2"]);
		$labo_reco2=trim($rowdiag["labo_reco2"]);
	
		$labo_cie3=trim($rowdiag["labo_cie3"]);
		$laboratorio3=trim($rowdiag["laboratorio3"]);
		$labo_reco3=trim($rowdiag["labo_reco3"]);	
		
		
		unset($arr_cie);
		unset($arr_dx);
		unset($arr_reco);
		$arr_cie	= array();
		$arr_dx	= array();
		$arr_reco	= array();						
	
	if($aud_diag1!=''){
		$arr_dx[] = $aud_diag1;
		$arr_reco[] = $aud_reco1;
		$arr_cie[] = $aud_cie1;
	}
			
	if($aud_diag2!=''){
		$arr_dx[] = $aud_diag2;
		$arr_reco[] = $aud_reco2;
		$arr_cie[] = $aud_cie2;
	}
			
	if($aud_diag3!=''){
		$arr_dx[] = $aud_diag3;
		$arr_reco[] = $aud_reco3;
		$arr_cie[] = $aud_cie3;
	}
			
	if($aud_diag4!=''){
		$arr_dx[] = $aud_diag4;
		$arr_reco[] = $aud_reco4;
		$arr_cie[] = $aud_cie4;
	}
	
	if($aud_diag5!=''){
		$arr_dx[] = $aud_diag5;
		$arr_reco[] = $aud_reco5;
		$arr_cie[] = $aud_cie5;
	}
			
	if($aud_diag6!=''){
		$arr_dx[] = $aud_diag6;
		$arr_reco[] = $aud_reco6;
		$arr_cie[] = $aud_cie6;
	}
	
	
	if($oft_diag1!=''){
		$arr_dx[] = $oft_diag1;
		$arr_reco[] = $oft_reco1;
		$arr_cie[] = $oft_cie1;
	}
	if($oft_diag2!=''){
		$arr_dx[] = $oft_diag2;
		$arr_reco[] = $oft_reco2;
		$arr_cie[] = $oft_cie2;
	}
	if($oft_diag3!=''){
		$arr_dx[] = $oft_diag3;
		$arr_reco[] = $oft_reco3;
		$arr_cie[] = $oft_cie3;
	}	
	
	
	if($ele_diag1!=''){
		$arr_dx[] = $ele_diag1;
		$arr_reco[] = $ele_reco1;
		$arr_cie[] = $ele_cie1;
	}
	if($ele_diag2!=''){
		$arr_dx[] = $ele_diag2;
		$arr_reco[] = $ele_reco2;
		$arr_cie[] = $ele_cie2;
	}
	if($ele_diag3!=''){
		$arr_dx[] = $ele_diag3;
		$arr_reco[] = $ele_reco3;
		$arr_cie[] = $ele_cie3;
	}
	if($rayosx_diag1!=''){
		$arr_dx[] = $rayosx_diag1;
		$arr_reco[] = $rayosx_reco1;
		$arr_cie[] = $rayosx_cie1;
	}
	if($rayosx_diag2!=''){
		$arr_dx[] = $rayosx_diag2;
		$arr_reco[] = $rayosx_reco2;
		$arr_cie[] = $rayosx_cie2;
	}
	if($rayosx_diag3!=''){
		$arr_dx[] = $rayosx_diag3;
		$arr_reco[] = $rayosx_reco3;
		$arr_cie[] = $rayosx_cie3;
	}
	if($rayosx_diag4!=''){
		$arr_dx[] = $rayosx_diag4;
		$arr_reco[] = $rayosx_reco4;
		$arr_cie[] = $rayosx_cie4;
	}
	if($odo_diag1!=''){
		$arr_dx[] = $odo_diag1;
		$arr_reco[] = $odo_reco1;
		$arr_cie[] = $odo_cie1;
	}
	
	if($odo_diag2!=''){
		$arr_dx[] = $odo_diag2;
		$arr_reco[] = $odo_reco2;
		$arr_cie[] = $odo_cie2;
	}
	if($odo_diag3!=''){
		$arr_dx[] = $odo_diag3;
		$arr_reco[] = $odo_reco3;
		$arr_cie[] = $odo_cie3;
	}
	if($espi_diag1!=''){
		$arr_dx[] = $espi_diag1;
		$arr_reco[] = $espi_reco1;
		$arr_cie[] = $espi_cie1;
	}
	if($espi_diag2!=''){
		$arr_dx[] = $espi_diag2;
		$arr_reco[] = $espi_reco2;
		$arr_cie[] = $espi_cie2;
	}
	if($espi_diag3!=''){
		$arr_dx[] = $espi_diag3;
		$arr_reco[] = $espi_reco3;
		$arr_cie[] = $espi_cie3;
	}
	
	if($laboratorio!=''){
		$arr_dx[] = $laboratorio;
		$arr_reco[] = $labo_reco;
		$arr_cie[] = $labo_cie1;
	}
	if($laboratorio2!=''){
		$arr_dx[] = $laboratorio2;
		$arr_reco[] = $labo_reco2;
		$arr_cie[] = $labo_cie2;
	}
	if($laboratorio3!=''){
		$arr_dx[] = $laboratorio3;
		$arr_reco[] = $labo_reco3;
		$arr_cie[] = $labo_cie3;
	}
	
	if($moc_diag1!=''){
		$arr_dx[] = $moc_diag1;
		$arr_reco[] = $moc_reco1;
		$arr_cie[] = $moc_cie1;
	}
	if($moc_diag2!=''){
		$arr_dx[] = $moc_diag2;
		$arr_reco[] = $moc_reco2;
		$arr_cie[] = $moc_cie2;
	}
	if($moc_diag3!=''){
		$arr_dx[] = $moc_diag3;
		$arr_reco[] = $moc_reco3;
		$arr_cie[] = $moc_cie3;
	}
	if($moc_diag4!=''){
		$arr_dx[] = $moc_diag4;
		$arr_reco[] = $moc_reco4;
		$arr_cie[] = $moc_cie4;
	}
	if($moc_diag5!=''){
		$arr_dx[] = $moc_diag5;
		$arr_reco[] = $moc_reco5;
		$arr_cie[] = $moc_cie5;
	}
	if($moc_diag6!=''){
		$arr_dx[] = $moc_diag6;
		$arr_reco[] = $moc_reco6;
		$arr_cie[] = $moc_cie6;
	}
	if($moc_diag7!=''){
		$arr_dx[] = $moc_diag7;
		$arr_reco[] = $moc_reco7;
		$arr_cie[] = $moc_cie7;
	}
	if($moc_diag8!=''){
		$arr_dx[] = $moc_diag8;
		$arr_reco[] = $moc_reco8;
		$arr_cie[] = $moc_cie8;
	}
	if($moc_diag9!=''){
		$arr_dx[] = $moc_diag9;
		$arr_reco[] = $moc_reco9;
		$arr_cie[] = $moc_cie9;
	}
	if($moc_diag10!=''){
		$arr_dx[] = $moc_diag10;
		$arr_reco[] = $moc_reco10;
		$arr_cie[] = $moc_cie10;
	}
	
	
	if($diag_complementario1!=''){
		$arr_dx[] = $diag_complementario1;
		$arr_reco[] = $otro_reco1;
		$arr_cie[] = $otros_cie1;
	}
	if($diag_complementario2!=''){
		$arr_dx[] = $diag_complementario2;
		$arr_reco[] = $otro_reco2;
		$arr_cie[] = $otros_cie2;
	}
	if($diag_complementario3!=''){
		$arr_dx[] = $diag_complementario3;
		$arr_reco[] = $otro_reco3;
		$arr_cie[] = $otros_cie3;
	}
	if($diag_complementario4!=''){
		$arr_dx[] = $diag_complementario4;
		$arr_reco[] = $otro_reco4;
		$arr_cie[] = $otros_cie4;
	}
	if($diag_complementario5!=''){
		$arr_dx[] = $diag_complementario5;
		$arr_reco[] = $otro_reco5;
		$arr_cie[] = $otros_cie5;
	}
	if($diag_complementario6!=''){
		$arr_dx[] = $diag_complementario6;
		$arr_reco[] = $otro_reco6;
		$arr_cie[] = $otros_cie6;
	}
	if($diag_complementario7!=''){
		$arr_dx[] = $diag_complementario7;
		$arr_reco[] = $otro_reco7;
		$arr_cie[] = $otros_cie7;
	}
	if($diag_complementario8!=''){
		$arr_dx[] = $diag_complementario8;
		$arr_reco[] = $otro_reco8;
		$arr_cie[] = $otros_cie8;
	}
	if($diag_complementario9!=''){
		$arr_dx[] = $diag_complementario9;
		$arr_reco[] = $otro_reco9;
		$arr_cie[] = $otros_cie9;
	}
	if($diag_complementario10!=''){
		$arr_dx[] = $diag_complementario10;
		$arr_reco[] = $otro_reco10;
		$arr_cie[] = $otros_cie10;
	}
	
			
			$aptitud = '';
			$aptitud = Obtener_Aptitudes($rowdiag["aptitud"]);
			$detalle_aptitud = '';
			if ($rowdiag["detalle_aptitud"] != '') {
				$detalle_aptitud = $rowdiag["detalle_aptitud"];
			} else {
				$detalle_aptitud = "NINGUNO";
			}
	
			$rest_observaciones = "";
			if ($rowdiag["rest_observaciones"]!= '') { $rest_observaciones.= $rowdiag["rest_observaciones"].'; '; }
			if ($rowdiag["rest_observaciones2"]!= '') { $rest_observaciones.= $rowdiag["rest_observaciones2"].'; '; }
			if ($rowdiag["rest_observaciones3"]!= '') { $rest_observaciones.= $rowdiag["rest_observaciones3"].'; '; }
			if ($rowdiag["rest_observaciones4"]!= '') { $rest_observaciones.= $rowdiag["rest_observaciones4"].'; '; }
			if ($rowdiag["rest_observaciones5"]!= '') { $rest_observaciones.= $rowdiag["rest_observaciones5"].'; '; }
			$rest_observaciones =trim($rest_observaciones);
			$rest_observaciones =trim($rest_observaciones,';');
			//TRIAJE
			
			
			$sql_tri = "select
			idtriaje,peso,talla,imc,presion_sistolica,presion_diastolica,cintura,
			cadera,icc,fcardiaca,frespiratoria,perime_toraxr,abdominal,sato2,temperatura
			from triaje where idcomprobante='$idcomprobante' and estado=1";
			$query_tri = mysql_query($sql_tri)or die(mysql_error());
			$row_tri = mysql_fetch_array($query_tri);
			
			$idtriaje = $row_tri["idtriaje"];
			$cintura = '';
			$cadera = '';
			$icc = '';
			$fcardiaca = '';
			$frespiratoria = '';
			$talla = '';
			$peso = '';
			$imc = '';
			$presion_sistolica = '';
			$presion_diastolica = '';
			$perime_toraxr = '';
			$abdominal = '';
			$sato2 = '';
			$temperatura = '';
			$respa = '';
			$dx_nutricional = '';
			$examen_fisico = '';
			$imc = '';
			if($idtriaje * 1 > 0){
				$cintura = $row_tri["cintura"];
				$cadera = $row_tri["cadera"];
				$icc = $row_tri["icc"];
				$fcardiaca = $row_tri["fcardiaca"];
				$frespiratoria = $row_tri["frespiratoria"];
				$talla = $row_tri["talla"];
				$peso = $row_tri["peso"];
				$imc = $row_tri["imc"];
				$presion_sistolica = $row_tri["presion_sistolica"];
				$presion_diastolica = $row_tri["presion_diastolica"];
				$perime_toraxr = $row_tri["perime_toraxr"];
				$abdominal = $row_tri["abdominal"];
				$sato2 = $row_tri["sato2"];
				$temperatura = $row_tri["temperatura"];
				
				if ($presion_sistolica != '' && $presion_diastolica != '') {
					$respa = $presion_sistolica . '/' . $presion_diastolica;
				}
		
				if ($imc * 1 < 18.50 && $imc != '') {
					$examen_fisico = 'Bajo Peso';
				} elseif ($imc * 1 >= 18.50 && $imc * 1 <= 24.99 && $imc != '') {
					$examen_fisico = 'Normopeso';
				} else if ($imc * 1 >= 25.00 && $imc * 1 <= 29.99 && $imc != '') {
					$examen_fisico = 'Sobrepeso';
				} else if ($imc * 1 >= 30.00 && $imc * 1 <= 34.99 && $imc != '') {
					$examen_fisico = 'Obesidad I';
				} else if ($imc * 1 >= 35 && $imc * 1 <= 39.99 && $imc != '') {
					$examen_fisico = 'Obesidad II';
				} else if ($imc * 1 > 40 && $imc != '') {
					$examen_fisico = 'Obesidad Mórbida';
				}
				
				//DIAGNOSTICO DE IMC
				if ($examen_fisico != ''){
					$dx_nutricional = $examen_fisico;
				}
			}
			
			
			//Antecedentes patologicos
			$queryant=mysql_query("select t1.idantepatologico01,t1.codpais,t1.direccion,
			t1.patologico_niega,t1.emf1,t1.descrip_1,
			t1.inmunizacion2,
			t1.inmunizacion5,
			t1.inmunizacion3,
			t1.inmunizacion7,
			t1.inmunizacion,
			t1.inmunizacion4,
			t1.inmunizacion8,
			t1.inmunizacion9,
			t1.inmunizacion10,
			t1.inmunizacion12,
			t1.inmunizacion14,
			t1.ppd,
			t1.infan,
			t1.inmunizacion16,
			t1.vacunas_totales,
			t1.emf63,
			t1.bcg,
			t1.fecha_menstruacion,
			t1.fecha1,
			t1.fecha2,
			t1.hospital1,
			t1.hospital2,
			t1.operacion1,
			t1.operacion2,
			t1.dia1,
			t1.dia2,
			t1.compli1,
			t1.compli2,
			t1.idhabito_nocivo,
			t1.ncigarros,
			t1.nivel_consumo,
			t1.idnivel_consumo,
			t1.idhabito_nocivo2,
			t1.idtipo_licor,
			t1.nivel_consumo02,
			t1.idnivel_consumo2,
			t1.idhabito_nocivo3,
			t1.idtipo_droga,
			t1.nivel_consumo03,
			t1.idnivel_consumo3,
			t2.nombre as distrito,t3.nombre as provincia,t4.nombre as departamento from antepatologico01 t1
			left join graldistritos t2 on t1.iddistrito=t2.iddistrito 
			left join  gralprovincias t3 on t1.idprovincia=t3.idprovincia 
			left join graldepartamentos t4 on t1.iddepartamento=t4.iddepartamento 			
			where t1.idcomprobante='$idcomprobante' and t1.estado=1") or die(mysql_error());
			$rowant=mysql_fetch_array($queryant);
			$idantepatologico01=$rowant["idantepatologico01"];
			$lugarnacimiento = '';
			$departamentonac = '';
			$provincianac = '';
			$distritonac = '';
			$idpais = '';
			$direccionantnac = '';
			$pais_pac = '';
			$emf1 = '';
			$descrip_1 = '';
			$alergia = '';
			$patologico_niega = '';
			$inmunizacion2 = '';
			$inmunizacion5 = '';
			$inmunizacion3 = '';
			$inmunizacion7 = '';
			$inmunizacion = '';
			$inmunizacion4 = '';
			$inmunizacion8 = '';
			$inmunizacion9 = '';
			$inmunizacion10 = '';
			$inmunizacion12 = '';
			$inmunizacion14 = '';
			$ppd = '';
			$infan = '';
			$inmunizacion16 = '';
			$vacunas_totales = '';
			$imunizaciones = '';
			$fecha_menstruacion = '';
			$emf63 = '';
			$bcg = '';
			$fecha1 = '';
			$fecha2 = '';
			$hospital1 = '';
			$hospital2 = '';
			$operacion1 = '';
			$operacion2 = '';
			$dia1 = '';
			$dia2 = '';
			$compli1 = '';
			$compli2 = '';
			$ant_quiru = '';
			$quiru1 = '';
			$quiru2 = '';
			$habito_tabaco = '';
			$idhabito_nocivo = '';
			$ncigarros = '';
			$nivel_consumo = '';
			$idnivel_consumo = '';
			$habito_alcohol = '';
			$idhabito_nocivo2 = '';
			$idtipo_licor = '';
			$nivel_consumo02 = '';
			$idnivel_consumo2 = '';
			$habito_droga = '';
			$idhabito_nocivo3 = '';
			$idtipo_droga = '';
			$nivel_consumo03 = '';
			$idnivel_consumo3 = '';
			if($idantepatologico01 * 1 > 0){
				//DROGA
				$idhabito_nocivo3 = trim($rowant["idhabito_nocivo3"]);
				$idtipo_droga = trim($rowant["idtipo_droga"]);
				$nivel_consumo03 = trim($rowant["nivel_consumo03"]);
				$idnivel_consumo3 = trim($rowant["idnivel_consumo3"]);
	
				
				if ($idhabito_nocivo3 == 'SI') {
					$sql_droga = "SELECT idtipo_droga,descripcion FROM tipo_droga WHERE estado = 1 AND idtipo_droga = '$idtipo_droga'";
					$query_droga = mysql_query($sql_droga)or die(mysql_error() . ":<br>" . $sql_droga);
					$row_droga = mysql_fetch_array($query_droga);
					if ($row_droga["descripcion"] != '') {
						$droga = $row_droga["descripcion"];
					}
	
					if ($habito_droga != '') {
						$habito_droga.=", ";
					}
					$habito_droga.='Tipo: ' . $droga;
	
					if ($nivel_consumo03 != '') {
						if ($habito_droga != '') {
							$habito_droga.=", ";
						}
						$habito_droga.='Cantidad: ' . $nivel_consumo03;
					}
					if ($idnivel_consumo3 != '') {
						if ($habito_droga != '') {
							$habito_droga.=", ";
						}
						if ($idnivel_consumo3 == '1') {
							$idnivel_consumo3 = 'NADA';
						} elseif ($idnivel_consumo3 == '2') {
							$idnivel_consumo3 = 'POCO';
						} elseif ($idnivel_consumo3 == '3') {
							$idnivel_consumo3 = 'HABITUAL';
						} elseif ($idnivel_consumo3 == '4') {
							$idnivel_consumo3 = 'EXCESIVO';
						}
						$habito_droga.='Frecuencia: ' . $idnivel_consumo3;
					}
				}elseif ($idhabito_nocivo3 == 'NO') {
					$habito_droga = 'NO';
				}
				
				//ALCOHOL
				$idhabito_nocivo2 = trim($rowant["idhabito_nocivo2"]);
				$idtipo_licor = trim($rowant["idtipo_licor"]);
				$nivel_consumo02 = trim($rowant["nivel_consumo02"]);
				$idnivel_consumo2 = trim($rowant["idnivel_consumo2"]);
				
				if ($idhabito_nocivo2 == 'SI') {
	
					$sql_licor = "SELECT idtipo_licor,descripcion FROM tipo_licor WHERE estado = 1 AND idtipo_licor = '$idtipo_licor'";
					$query_licor = mysql_query($sql_licor)or die(mysql_error() . ":<br>" . $sql_licor);
					$row_licor = mysql_fetch_array($query_licor);
					if ($row_licor["descripcion"] != '') {
						$licor = $row_licor["descripcion"];
					}
	
					if ($habito_alcohol != '') {
						$habito_alcohol.=" ";
					}
					$habito_alcohol.='Tipo: ' . $licor;
					
	
					if ($nivel_consumo02 != '') {
						if ($habito_alcohol != '') {
							$habito_alcohol.=" ";
						}
						$habito_alcohol.='Cantidad: ' . $nivel_consumo02;
					}
					if ($idnivel_consumo2 != '') {
						if ($habito_alcohol != '') {
							$habito_alcohol.=" ";
						}
						if ($idnivel_consumo2 == '1') {
							$idnivel_consumo2 = 'NADA';
						} elseif ($idnivel_consumo2 == '2') {
							$idnivel_consumo2 = 'POCO';
						} elseif ($idnivel_consumo2 == '3') {
							$idnivel_consumo2 = 'HABITUAL';
						} elseif ($idnivel_consumo2 == '4') {
							$idnivel_consumo2 = 'EXCESIVO';
						}
						$habito_alcohol.='Frecuencia: ' . $idnivel_consumo2;
					}
				}elseif ($idhabito_nocivo2 == 'NO') {
					$habito_alcohol = 'NO';
				}
				//FUMAR
				$idhabito_nocivo = trim($rowant["idhabito_nocivo"]);
				$ncigarros = trim($rowant["ncigarros"]);
				$nivel_consumo = trim($rowant["nivel_consumo"]);
				$idnivel_consumo = trim($rowant["idnivel_consumo"]);

				if ($idhabito_nocivo == 'SI') {
					if ($ncigarros != 'OTRO') {
						if ($habito_tabaco != '') {
							$habito_tabaco.=" ";
						}
						$habito_tabaco.='Tipo: ' . $ncigarros;
					}
					if ($nivel_consumo != '') {
						if ($habito_tabaco != '') {
							$habito_tabaco.=" ";
						}
						$habito_tabaco.='Cantidad: ' . $nivel_consumo;
					}
					if ($idnivel_consumo != '') {
						if ($habito_tabaco != '') {
							$habito_tabaco.=" ";
						}
						if ($idnivel_consumo == '1') {
							$idnivel_consumo = 'NADA';
						} elseif ($idnivel_consumo == '2') {
							$idnivel_consumo = 'POCO';
						} elseif ($idnivel_consumo == '3') {
							$idnivel_consumo = 'HABITUAL';
						} elseif ($idnivel_consumo == '4') {
							$idnivel_consumo = 'EXCESIVO';
						}
						$habito_tabaco.='Frecuencia: ' . $idnivel_consumo;
					}
				}elseif($idhabito_nocivo == 'NO'){
					$habito_tabaco = 'NO';
				}
				
				
				
				
				$fecha1 = trim($rowant["fecha1"]);
				$fecha2 = trim($rowant["fecha2"]);
				$hospital1 = trim($rowant["hospital1"],'NIEGA');
				$hospital2 = trim($rowant["hospital2"],'NIEGA');
				$operacion1 = trim($rowant["operacion1"]);
				$operacion2 = trim($rowant["operacion2"]);
				$dia1 = trim($rowant["dia1"]);
				$dia2 = trim($rowant["dia2"]);
				$compli1 = trim($rowant["compli1"]);
				$compli2 = trim($rowant["compli2"]);

				if($hospital1 != '' && $hospital1 != '-'){
					if($fecha1 != ''){
						$quiru1.= 'Fecha: '.$fecha1.' ';
					}
					$quiru1.= 'Hospital/Clínica: '.$hospital1;
					if($operacion1 != ''){
						if($quiru1 != ''){
							$quiru1.= ' ';
						}
						$quiru1.= 'Operación: '.$operacion1;
					}
					if($dia1 != ''){
						if($quiru1 != ''){
							$quiru1.= ' ';
						}
						$quiru1.= 'D. Hosp.	: '.$dia1;
					}
					if($compli1 != ''){
						if($quiru1 != ''){
							$quiru1.= ' ';
						}
						$quiru1.= 'Complicaciones.	: '.$compli1;
					}
				}
				if($hospital2 != '' && $hospital2 != '-'){
					if($fecha2 != ''){
						$quiru2.= 'Fecha: '.$fecha2.' ';
					}
					$quiru2.= 'Hospital/Clínica: '.$hospital2;
					if($operacion2 != ''){
						if($quiru2 != ''){
							$quiru2.= ' ';
						}
						$quiru2.= 'Operación: '.$operacion2;
					}
					if($dia2 != ''){
						if($quiru2 != ''){
							$quiru2.= ' ';
						}
						$quiru2.= 'D. Hosp.	: '.$dia2;
					}
					if($compli2 != ''){
						if($quiru2 != ''){
							$quiru2.= ' ';
						}
						$quiru2.= 'Complicaciones.	: '.$compli2;
					}
				}
				
				if($quiru1 != ''){
					if($ant_quiru != ''){
						$ant_quiru.=' / ';
					}
					$ant_quiru.=$quiru1;
				}
				if($quiru2 != ''){
					if($ant_quiru != ''){
						$ant_quiru.=' / ';
					}
					$ant_quiru.=$quiru2;
				}
				if(trim($ant_quiru) == ''){$ant_quiru='NIEGA';}
				
				$fecha_menstruacion = $rowant["fecha_menstruacion"];
				$inmunizacion2 = $rowant["inmunizacion2"];
				$inmunizacion5 = $rowant["inmunizacion5"];
				$inmunizacion3 = $rowant["inmunizacion3"];
				$inmunizacion7 = $rowant["inmunizacion7"];
				$inmunizacion = $rowant["inmunizacion"];
				$inmunizacion4 = $rowant["inmunizacion4"];
				$inmunizacion8 = $rowant["inmunizacion8"];
				$inmunizacion9 = $rowant["inmunizacion9"];
				$inmunizacion10 = $rowant["inmunizacion10"];
				$inmunizacion12 = $rowant["inmunizacion12"];
				$inmunizacion14 = $rowant["inmunizacion14"];
				$ppd = $rowant["ppd"];
				$infan = $rowant["infan"];
				$inmunizacion16 = trim($rowant["inmunizacion16"]);
				$vacunas_totales = $rowant["vacunas_totales"];
				$emf63 = $rowant["emf63"];
				$bcg = $rowant["bcg"];
				
				if($vacunas_totales != 'on'){
					if($inmunizacion2 != ''){
						if($imunizaciones != ''){
							$imunizaciones.=' , ';
						}
						$imunizaciones.='Antitetánica';
					}
					if($inmunizacion5 != ''){
						if($imunizaciones != ''){
							$imunizaciones.=' , ';
						}
						$imunizaciones.='Fiebre Amarilla';
					}
					if($inmunizacion3 != ''){
						if($imunizaciones != ''){
							$imunizaciones.=' , ';
						}
						$imunizaciones.='Gripe/Influenza';
					}
					if($inmunizacion7 != ''){
						if($imunizaciones != ''){
							$imunizaciones.=' , ';
						}
						$imunizaciones.='Hepatitis B';
					}
					if($inmunizacion != ''){
						if($imunizaciones != ''){
							$imunizaciones.=' , ';
						}
						$imunizaciones.='MMR';
					}
					if($inmunizacion4 != ''){
						if($imunizaciones != ''){
							$imunizaciones.=' , ';
						}
						$imunizaciones.='Polio';
					}
					if($inmunizacion8 != ''){
						if($imunizaciones != ''){
							$imunizaciones.=' , ';
						}
						$imunizaciones.='Rabia';
					}
					if($emf63 != ''){
						if($imunizaciones != ''){
							$imunizaciones.=' , ';
						}
						$imunizaciones.='RAM '.$desram;
					}
					if($inmunizacion9 != ''){
						if($imunizaciones != ''){
							$imunizaciones.=' , ';
						}
						$imunizaciones.='Influenza';
					}
					if($inmunizacion10 != ''){
						if($imunizaciones != ''){
							$imunizaciones.=' , ';
						}
						$imunizaciones.='Hepatitis A';
					}
					if($inmunizacion12 != ''){
						if($imunizaciones != ''){
							$imunizaciones.=' , ';
						}
						$imunizaciones.='Meningococo';
					}
					if($inmunizacion14 != ''){
						if($imunizaciones != ''){
							$imunizaciones.=' , ';
						}
						$imunizaciones.='Papiloma Humano';
					}
					if($bcg != ''){
						if($imunizaciones != ''){
							$imunizaciones.=' , ';
						}
						$imunizaciones.='BCG';
					}
					if($ppd != ''){
						if($imunizaciones != ''){
							$imunizaciones.=' , ';
						}
						$imunizaciones.='PPD';
					}
					if($infan != ''){
						if($imunizaciones != ''){
							$imunizaciones.=' , ';
						}
						$imunizaciones.='Infancia';
					}
					if($inmunizacion16 != ''){
						if($imunizaciones != ''){
							$imunizaciones.=' , ';
						}
						$imunizaciones.=$inmunizacion16;
					}
				}
				if($vacunas_totales == ''){$imunizaciones='VACUNAS COMPLETAS';}

				
				
				$patologico_niega=$rowant["patologico_niega"];
				$emf1=$rowant["emf1"];
				$descrip_1=$rowant["descrip_1"];
				if($patologico_niega!='on'){
					if($emf1 == 'on' && $descrip_1 != ''){
						$alergia=$descrip_1;
					}elseif($emf1 == 'on' && $descrip_1 == ''){
						$alergia="SI";
					}
					
				}
				
				if(trim($rowant["codpais"])=='PER'){
					$departamentonac=$rowant["departamento"];
					$provincianac=$rowant["provincia"];
					$distritonac=$rowant["distrito"];
					if($departamentonac!=''){if($lugarnacimiento != ''){$lugarnacimiento.=' - ';}
						$lugarnacimiento.=$departamentonac;
					}
					if($provincianac!=''){if($lugarnacimiento != ''){$lugarnacimiento.=' - ';}
						$lugarnacimiento.=$provincianac;
					}
					if($distritonac!=''){if($lugarnacimiento != ''){$lugarnacimiento.=' - ';}
						$lugarnacimiento.=$distritonac;
					}
				}else{
					$idpais=$rowant["codpais"];
					$sql_pais = "select nombre from pais where estado=1 and alfa3 = '$idpais'";
					$query_pais = mysql_query($sql_pais)or die(mysql_error());
					$row_pais = mysql_fetch_array($query_pais);
					$pais_pac = $row_pais["nombre"];
					$direccionantnac=trim($rowant["direccion"]);
					if($pais_pac != ''){if($lugarnacimiento != ''){$lugarnacimiento.=' - ';}
						$lugarnacimiento.=$pais_pac;
					}
					if($direccionantnac != ''){if($lugarnacimiento != ''){$lugarnacimiento.=' - ';}
						$lugarnacimiento.=$direccionantnac;
					}
				}
			}
			
			
			//Espirometria	
			$query_espiro = mysql_query("SELECT 
			idespirometria,fvc2,fev2,fev_fvc2,fef2,diag,diag2,diag3,
			conclusion,descri_patron_espi from espirometria where idcomprobante='$idcomprobante' and estado=1") or die(mysql_error());
			$row_espiro = mysql_fetch_array($query_espiro);
			$idespirometria = $row_espiro["idespirometria"];
			$fvc2='';
			$fev2='';
			$fev_fvc2='';
			$fef2='';
			$diag_espiro = '';	
			$diag_espiro1 = '';
			$diag_espiro2 = '';
			$diag_espiro3 = '';
			$conclusionespiro = '';
			$descri_patron_espi = '';
			if($idespirometria * 1 > 0){
				$fvc2=$row_espiro["fvc2"];
				$fev2=$row_espiro["fev2"];
				$fev_fvc2=$row_espiro["fev_fvc2"];
				$fef2=$row_espiro["fef2"];
				$diag_espiro1=trim($row_espiro["diag"]);
				$diag_espiro2=trim($row_espiro["diag2"]);
				$diag_espiro3=trim($row_espiro["diag3"]);
				$conclusionespiro=trim($row_espiro["conclusion"]);
				$descri_patron_espi=trim($row_espiro["descri_patron_espi"]);
				
				if($diag_espiro1 != ''){
					if($diag_espiro != ''){ $diag_espiro.=' , '; }$diag_espiro.=$diag_espiro1; 
				}
				if($diag_espiro2 != ''){
					if($diag_espiro != ''){ $diag_espiro.=' , '; }$diag_espiro.=$diag_espiro2; 
				}
				if($diag_espiro3 != ''){
					if($diag_espiro != ''){ $diag_espiro.=' , '; }$diag_espiro.=$diag_espiro3; 
				}
				
				if($diag_espiro == ''){
					if($conclusionespiro == '1'){
						$diag_espiro='Patron normal espirometrico';
					}elseif($conclusionespiro == '2' && $descri_patron_espi == ''){
						$diag_espiro='Con alteracion funcional';
					}elseif($conclusionespiro == '2' && $descri_patron_espi != ''){
						$diag_espiro=$descri_patron_espi;
					}
				}
			}
			
			//Rayos x	
			$query_rx = mysql_query("SELECT 
			idrayosx,
			cie_10,
			diag,
			rx_alt1,
			rx_reco1,
			cie_102,
			diag2,
			rx_alt2,
			rx_reco2,
			cie_103,
			diag3,
			rx_alt3,
			rx_reco3,
			cie_104,
			diag4,
			rx_alt4,
			rx_reco4,
			diagnostico from rayosx where idcomprobante='$idcomprobante' and estado=1") or die(mysql_error());
			$row_rx = mysql_fetch_array($query_rx);
			$idrayosx = $row_rx["idrayosx"];
			$cie_10rx1 = '';
			$cie_102rx1 = '';
			$cie_103rx1 = '';
			$cie_104rx1 = '';
			$diagrx1 = '';
			$diagrx2 = '';
			$diagrx3 = '';
			$diagrx4 = '';
			$rx_alt1 = '';
			$rx_alt2 = '';
			$rx_alt3 = '';
			$rx_alt4 = '';
			$diag_rx = '';
			$comenrx = '';
			if($idrayosx * 1 > 0){
				$cie_10rx1 = trim($row_rx["cie_10"]);
				$cie_102rx1 = trim($row_rx["cie_102"]);
				$cie_103rx1 = trim($row_rx["cie_103"]);
				$cie_104rx1 = trim($row_rx["cie_104"]);
				$diagrx1 = trim($row_rx["diag"]);
				$diagrx2 = trim($row_rx["diag2"]);
				$diagrx3 = trim($row_rx["diag3"]);
				$diagrx4 = trim($row_rx["diag4"]);
				$rx_alt1 = trim($row_rx["rx_alt1"]);
				$rx_alt2 = trim($row_rx["rx_alt2"]);
				$rx_alt3 = trim($row_rx["rx_alt3"]);
				$rx_alt4 = trim($row_rx["rx_alt4"]);
				$comenrx = trim($row_rx["diagnostico"]);
				if($rx_alt1 != ''){$diagrx1=$rx_alt1;}
				if($rx_alt2 != ''){$diagrx2=$rx_alt2;}
				if($rx_alt3 != ''){$diagrx3=$rx_alt3;}
				if($rx_alt4 != ''){$diagrx4=$rx_alt4;}
				if($diagrx1 !=''){
					if($diag_rx !=''){
						$diag_rx.=' , ';
					}
					$diag_rx.=$diagrx1;
				}
				if($diagrx2 !=''){
					if($diag_rx !=''){
						$diag_rx.=' , ';
					}
					$diag_rx.=$diagrx2;
				}
				if($diagrx3 !=''){
					if($diag_rx !=''){
						$diag_rx.=' , ';
					}
					$diag_rx.=$diagrx3;
				}
				if($diagrx4 !=''){
					if($diag_rx !=''){
						$diag_rx.=' , ';
					}
					$diag_rx.=$diagrx4;
				}
				if($diag_rx == ''){
					$diag_rx=$comenrx;
				}
			}
	
			//Oftalmologica
			$sql_of="select 
			idoftalmologica,
			aguvisual_cerca_od, aguvisual_cerca_oi, aguvisual_cerca_od2,
			aguvisual_cerca_oi2, aguvisual_lejos_od, aguvisual_lejos_oi,
			aguvisual_lejos_od2, aguvisual_lejos_oi2, fondo_ojo, fondo_ojo_oi,
			campo_visual01, campo_visual_oi, esteropsia, esteropsia_oi,campo_visual02,
			diag,diag2,diag3,oft_reco1,oft_reco2,oft_reco3,idcie1,idcie2,idcie3,
			oft_alt1,oft_alt2,oft_alt3 from oftalmologica where idcomprobante = '$idcomprobante' and estado = 1";
			$query_of=mysql_query($sql_of)or die(mysql_error());
			$row_of=mysql_fetch_array($query_of);
			$idoftalmologica=$row_of["idoftalmologica"];
			$aguvisual_cerca_od='';
			$aguvisual_cerca_oi='';
			$aguvisual_cerca_od2='';
			$aguvisual_cerca_oi2='';
			$aguvisual_lejos_od='';
			$aguvisual_lejos_oi='';
			$aguvisual_lejos_od2='';
			$aguvisual_lejos_oi2='';
			$fondo_ojo='';
			$fondo_ojo_oi='';
			$esteropsia='';
			$esteropsia_oi='';
			$dxformat_oft='';
			$diagoft1 = '';
			$diagoft2 = '';
			$diagoft3 = '';
			$diagaltoft1 = '';
			$diagaltoft2 = '';
			$diagaltoft3 = '';
			$campo_visual01 = '';
			$campo_visual02 = '';
			if($idoftalmologica * 1 > 0){
				if($aguvisual_cerca_od==""){ $aguvisual_cerca_od=trim($row_of["aguvisual_cerca_od"]);}
				if($aguvisual_cerca_oi==""){ $aguvisual_cerca_oi=trim($row_of["aguvisual_cerca_oi"]);}	
				if($aguvisual_cerca_od2==""){ $aguvisual_cerca_od2=trim($row_of["aguvisual_cerca_od2"]);}
				if($aguvisual_cerca_oi2==""){ $aguvisual_cerca_oi2=trim($row_of["aguvisual_cerca_oi2"]);}
				if($aguvisual_lejos_od==""){ $aguvisual_lejos_od=trim($row_of["aguvisual_lejos_od"]);}
				if($aguvisual_lejos_oi==""){ $aguvisual_lejos_oi=trim($row_of["aguvisual_lejos_oi"]);}
				if($aguvisual_lejos_od2==""){ $aguvisual_lejos_od2=trim($row_of["aguvisual_lejos_od2"]);}
				if($aguvisual_lejos_oi2==""){ $aguvisual_lejos_oi2=trim($row_of["aguvisual_lejos_oi2"]);}
				$fondo_ojo=trim($row_of["fondo_ojo"]);
				$fondo_ojo_oi=trim($row_of["fondo_ojo_oi"]);
				$diagoft1=trim($row_of["diag"]);
				$diagoft2=trim($row_of["diag2"]);
				$diagoft3=trim($row_of["diag3"]);
				$diagaltoft1=trim($row_of["oft_alt1"]);
				$diagaltoft2=trim($row_of["oft_alt2"]);
				$diagaltoft3=trim($row_of["oft_alt3"]);
				if($diagaltoft1 != ''){$diagoft1=$diagaltoft1;}
				if($diagaltoft2 != ''){$diagoft2=$diagaltoft2;}
				if($diagaltoft3 != ''){$diagoft3=$diagaltoft3;}
				if($diagoft1 != ''){
					if($dxformat_oft != ''){
						$dxformat_oft.=' , ';
					}
					$dxformat_oft.=$diagoft1;
				}
				if($diagoft2 != ''){
					if($dxformat_oft != ''){
						$dxformat_oft.=' , ';
					}
					$dxformat_oft.=$diagoft2;
				}
				if($diagoft3 != ''){
					if($dxformat_oft != ''){
						$dxformat_oft.=' , ';
					}
					$dxformat_oft.=$diagoft3;
				}
				
				$campo_visual01=trim($row_of["campo_visual01"]);
				$campo_visual02=trim($row_of["campo_visual02"]);
				if($campo_visual01=="ANORMAL" && $campo_visual02 != ''){$campo_visual01=$campo_visual02;}
				
				if($campo_visual_oi=="")$campo_visual_oi=trim($row_of["campo_visual_oi"]);
				$esteropsia=trim($row_of["esteropsia"]);
				$esteropsia_oi=trim($row_of["esteropsia_oi"]);
			}
			
			
	
			//Audiometria	
			$audiometrica_1 = '';	
			$audiometria_7 = '';			
			$query_audio = mysql_query("SELECT idaudiometrica,
			runo,rdos,rtres,rcuatro,rcinco,rseis,rsiete,
			aocho,acero,auno,ados,atres,acuatro,acinco,aseis,asiete,
			od,otoscopia,oi,otoscopia_oi,idcie1
			FROM audiometrica WHERE idcomprobante='$idcomprobante' and estado=1") or die(mysql_error());		
			$row_audio = mysql_fetch_array($query_audio);
			$idaudiometrica = $row_audio["idaudiometrica"];
			$audiometria_diag='';
			$otoscopia_derecha='';
			$otoscopia_izquierda='';
			$otoscopia='';
			$audiometria_7 = '';
			$rcero='';$runo='';$rdos='';$rtres='';$rcuatro='';$rcinco='';$rseis='';$rsiete='';
			$aocho='';$acero='';$auno='';$ados='';$atres='';$acuatro='';$acinco='';$aseis='';$asiete='';
			$od='';$otoscopia_aud='';$oi='';$otoscopia_oi='';$audio_bilateral='';
			if($idaudiometrica * 1 > 0){
				$audiometria_7 = $row_audio["audiometria"];
				$rcero=trim($row_audio["rcero"]);
				$runo=trim($row_audio["runo"]);
				$rdos=trim($row_audio["rdos"]);
				$rtres=trim($row_audio["rtres"]);
				$rcuatro=trim($row_audio["rcuatro"]);
				$rcinco=trim($row_audio["rcinco"]);
				$rseis=trim($row_audio["rseis"]);
				$rsiete=trim($row_audio["rsiete"]);
				$aocho=trim($row_audio["aocho"]);
				$acero=trim($row_audio["acero"]);
				$auno=trim($row_audio["auno"]);
				$ados=trim($row_audio["ados"]);
				$atres=trim($row_audio["atres"]);
				$acuatro=trim($row_audio["acuatro"]);
				$acinco=trim($row_audio["acinco"]);
				$aseis=trim($row_audio["aseis"]);
				$asiete=trim($row_audio["asiete"]);
				$od=trim($row_audio["od"]);
				$otoscopia=trim($row_audio["otoscopia"]);
				$oi=trim($row_audio["oi"]);
				$otoscopia_oi=trim($row_audio["otoscopia_oi"]);
				$audio_bilateral=trim($row_audio["idcie1"]);
				
				//Otoscopia
				
				if($od=="NORMAL"){
					$otoscopia_derecha=$od;
				}elseif($od=="ANORMAL"){
					$otoscopia_derecha=$otoscopia;
				}elseif($od=="NO REALIZADO"){
					$otoscopia_derecha=$od;
				}
				
				
				if($od=="NORMAL"){
					$otoscopia_izquierda=$oi;
				}elseif($od=="ANORMAL"){
					$otoscopia_izquierda=$otoscopia_oi;
				}elseif($od=="NO REALIZADO"){
					$otoscopia_izquierda=$oi;
				}
				
				
				if(trim($otoscopia_derecha)!=""){
					$otoscopia_aud.="Oído Derecho: ".$otoscopia_derecha;
				}
				if(trim($otoscopia_izquierda)!=""){
					if(trim($otoscopia_aud)!=""){
						$otoscopia_aud.=" / ";
					}
					$otoscopia_aud.="Oído Izquierdo: ".$otoscopia_izquierda;
				}	
		
				//Diagnósticos de audiometría
				
				if($audio_bilateral==1){
					if(trim($aud_diag2)!=""){
						$audiometria_diag=$aud_diag2." BILATERAL";
					}
					
					if(trim($aud_diag4)!=""){
						if($audiometria_diag){$audiometria_diag.=" , ";}
						$audiometria_diag=$aud_diag4." BILATERAL";
					}
				}else{
					if(trim($aud_diag1)!=""){
						if(trim($audiometria_diag)!=""){
							$audiometria_diag.=" , ";
						}
						$audiometria_diag.=$aud_diag1;
					}
					if(trim($aud_diag5)!=""){
						if(trim($audiometria_diag)!=""){
							$audiometria_diag.=" , ";
						}
						$audiometria_diag.=$aud_diag5;
					}
					
					if(trim($aud_diag3)!=""){
						if(trim($audiometria_diag)!=""){
							$audiometria_diag.=" , ";
						}
						$audiometria_diag.=$aud_diag3;
					}
					if(trim($aud_diag6)!=""){
						if(trim($audiometria_diag)!=""){
							$audiometria_diag.=" , ";
						}
						$audiometria_diag.=$aud_diag6;
					}
				}	
			}
			
			
			
			$query_ekg = mysql_query("SELECT conclu,idcardiovascular,diag,diag2,diag3 FROM cardiovascular
			WHERE idcomprobante='$idcomprobante' and estado=1") or die(mysql_error());		
			$row_ekg = mysql_fetch_array($query_ekg);
			$idcardiovascular = $row_ekg["idcardiovascular"];
			$diagekg1 = '';
			$diagekg2 = '';
			$diagekg3 = '';
			$diagforma_ekg = '';
			$conclu_ekg = '';
			if($idcardiovascular * 1 > 0){
				$conclu_ekg = trim($row_ekg["conclu"]);
				$diagekg1 = trim($row_ekg["diag"]);
				$diagekg2 = trim($row_ekg["diag2"]);
				$diagekg3 = trim($row_ekg["diag3"]);
				if($diagekg1 != ''){
					if($diagforma_ekg != ''){
						$diagforma_ekg.=' , ';
					}
					$diagforma_ekg.=$diagekg1;
				}
				if($diagekg2 != ''){
					if($diagforma_ekg != ''){
						$diagforma_ekg.=' , ';
					}
					$diagforma_ekg.=$diagekg2;
				}
				if($diagekg3 != ''){
					if($diagforma_ekg != ''){
						$diagforma_ekg.=' , ';
					}
					$diagforma_ekg.=$diagekg3;
				}
				if($diagforma_ekg == ''){$diagforma_ekg=$conclu_ekg;}
			}
			
			
			
			$query_psico = mysql_query("SELECT recuestio_acro,recuestio_cla,
			aptopsico,dfareacogniti,idpsicologia
			FROM psicologia
			WHERE idcomprobante='$idcomprobante' and estado=1") or die(mysql_error());		
			$row_psico = mysql_fetch_array($query_psico);
			$aptopsico = '';
			$recuestio_cla = '';
			$recuestio_acro ='';
			$dfareacogniti ='';
			$idpsicologia = $row_psico["idpsicologia"];
			if($idpsicologia * 1 > 0){
				$dfareacogniti = $row_psico["dfareacogniti"];
				if($row_psico["aptopsico"]=='1'){$aptopsico='APTO';}
				elseif($row_psico["aptopsico"]=='2'){$aptopsico='NO APTO';}
				elseif($row_psico["aptopsico"]=='3'){$aptopsico='APTO CON RESTRICCIONES';}
				elseif($row_psico["conclusion_informe"]!=''){$aptopsico=$row_psico["conclusion_informe"];}
				
				if($row_psico["recuestio_cla"]=='1'){$recuestio_cla='SI';}
				elseif($row_psico["recuestio_cla"]=='2'){$recuestio_cla='NO';}
				elseif($row_psico["recuestio_cla"]=='3'){$recuestio_cla='NO APLICA';}
				
				if($row_psico["recuestio_acro"]=='1'){$recuestio_acro='SI';}
				elseif($row_psico["recuestio_acro"]=='2'){$recuestio_acro='NO';}
				elseif($row_psico["recuestio_acro"]=='3'){$recuestio_acro='NO APLICA';}
			}
			
			
			$query_altu = mysql_query("SELECT 
			conclusion2,opc44,idcmvisitas
			FROM cmvisitas
			WHERE idcomprobante='$idcomprobante' and estado=1") or die(mysql_error());		
			$row_altu= mysql_fetch_array($query_altu);
			$idcmvisitas=$row_altu["idcmvisitas"];
			$apto_altura='';
			$conclualtura='';
			if($idcmvisitas * 1 > 0){
				if($row_altu["opc44"]=='1'){$apto_altura='APTO';}
				elseif($row_altu["opc44"]=='2'){$apto_altura='NO APTO';}
				$conclualtura=$row_altu["conclusion2"];
			}
			
			
			
			$query_7d = mysql_query("SELECT 
			apto,idaltura_7d
			FROM altura_7d
			WHERE idcomprobante='$idcomprobante' and estado=1") or die(mysql_error());		
			$row_7d= mysql_fetch_array($query_7d);
			$idaltura_7d=$row_7d["idaltura_7d"];
			$apto_7d='';
			if($idaltura_7d * 1 > 0){
				if($row_7d["apto"]=='1'){$apto_7d='APTO';}
				elseif($row_7d["apto"]=='2'){$apto_7d='NO APTO';}
			}
			
			$querysenso = mysql_query("SELECT 
			apto1,apto2,apto3,apto4,apto5,apto6,idresultado_psico
			FROM resultado_psico
			WHERE idcomprobante='$idcomprobante' and estado=1") or die(mysql_error());		
			$row_senso= mysql_fetch_array($querysenso);
			$idresultado_psico=$row_senso["idresultado_psico"];
			$aptssensoformat='';
			$aptsenso1='';
			$aptsenso2='';
			$aptsenso3='';
			$aptsenso4='';
			$aptsenso5='';
			$aptsenso6='';
			if($idresultado_psico * 1 > 0){
				$aptsenso1 = $row_senso["apto1"];
				$aptsenso2 = $row_senso["apto2"];
				$aptsenso3 = $row_senso["apto3"];
				$aptsenso4 = $row_senso["apto4"];
				$aptsenso5 = $row_senso["apto5"];
				$aptsenso6 = $row_senso["apto6"];
				
				if($aptsenso1 == '1'){
					if($aptssensoformat != ''){
						$aptssensoformat.=' , ';
					}
					$aptssensoformat.='P2 - EQUIPOS DE PRODUCCIÓN: APTO';
				}elseif($aptsenso1 == '2'){
					if($aptssensoformat != ''){
						$aptssensoformat.=' , ';
					}
					$aptssensoformat.='P2 - EQUIPOS DE PRODUCCIÓN: NO APTO';
				}
				if($aptsenso2 == '1'){
					if($aptssensoformat != ''){
						$aptssensoformat.=' , ';
					}
					$aptssensoformat.='P2 - EQUIPOS LIVIANOS: APTO';
				}elseif($aptsenso2 == '2'){
					if($aptssensoformat != ''){
						$aptssensoformat.=' , ';
					}
					$aptssensoformat.='P2 - EQUIPOS LIVIANOS: NO APTO';
				}
				if($aptsenso3 == '1'){
					if($aptssensoformat != ''){
						$aptssensoformat.=' , ';
					}
					$aptssensoformat.='P2 - EQUIPOS DE SERVICIO: APTO';
				}elseif($aptsenso3 == '2'){
					if($aptssensoformat != ''){
						$aptssensoformat.=' , ';
					}
					$aptssensoformat.='P2 - EQUIPOS DE SERVICIO: NO APTO';
				}
				if($aptsenso4 == '1'){
					if($aptssensoformat != ''){
						$aptssensoformat.=' , ';
					}
					$aptssensoformat.='P3 - EQUIPOS DE IZAJE: APTO';
				}elseif($aptsenso4 == '2'){
					if($aptssensoformat != ''){
						$aptssensoformat.=' , ';
					}
					$aptssensoformat.='P3 - EQUIPOS DE IZAJE: NO APTO';
				}
				if($aptsenso5 == '1'){
					if($aptssensoformat != ''){
						$aptssensoformat.=' , ';
					}
					$aptssensoformat.='EQUIPOS DE SERVICIO / PRODUCCIÓN / IZAJE : APTO';
				}elseif($aptsenso5 == '2'){
					if($aptssensoformat != ''){
						$aptssensoformat.=' , ';
					}
					$aptssensoformat.='EQUIPOS DE SERVICIO / PRODUCCIÓN / IZAJE : NO APTO';
				}elseif($aptsenso5 == '3'){
					if($aptssensoformat != ''){
						$aptssensoformat.=' , ';
					}
					$aptssensoformat.='EQUIPOS DE SERVICIO / PRODUCCIÓN / IZAJE : NO APLICA';
				}
				if($aptsenso6 == '1'){
					if($aptssensoformat != ''){
						$aptssensoformat.=' , ';
					}
					$aptssensoformat.='EQUIPOS LIVIANOS : APTO';
				}elseif($aptsenso6 == '2'){
					if($aptssensoformat != ''){
						$aptssensoformat.=' , ';
					}
					$aptssensoformat.='EQUIPOS LIVIANOS : NO APTO';
				}elseif($aptsenso6 == '3'){
					if($aptssensoformat != ''){
						$aptssensoformat.=' , ';
					}
					$aptssensoformat.='EQUIPOS LIVIANOS : NO APLICA';
				}
			}
			
			$queryrespirado = mysql_query("SELECT 
			tipo,idusorespirador,rest_1,rest_2,rest_3,rest_4
			FROM usorespirador
			WHERE idcomprobante='$idcomprobante' and estado=1") or die(mysql_error());		
			$row_respirad= mysql_fetch_array($queryrespirado);
			$idusorespirador=$row_respirad["idusorespirador"];
			$tiporespi = '';
			$aptrespirador = '';
			$restrespi1 = '';
			$restrespi2 = '';
			$restrespi3 = '';
			$restrespi4 = '';
			if($idusorespirador * 1 > 0){
				$tiporespi=trim($row_respirad["tipo"]);
				$restrespi1=trim($row_respirad["rest_1"]);
				$restrespi2=trim($row_respirad["rest_2"]);
				$restrespi3=trim($row_respirad["rest_3"]);
				$restrespi4=trim($row_respirad["rest_4"]);
				if($tiporespi == '1'){
					$aptrespirador='Apto para usar respirador, tanto para los sistemas de suministro de aire (equipos con tanques de aire autocontenido - SCBA) y purificación de aire (respiradores de cara completa, media cara).';
				}elseif($tiporespi == '2'){
					$aptrespirador='Apto para usar respirador, sólo para equipos de purificación de aire (respiradores de cara completa, media cara).';
				}elseif($tiporespi == '3'){
					$aptrespirador='Apto para usar respirador únicamente con las siguientes restricciones';
					if($restrespi1 != ''){
						$aptrespirador='Apto para usar respirador únicamente con las siguientes restricciones:'.$restrespi1;
					}
				}elseif($tiporespi == '4'){
					$aptrespirador='Necesita más exámenes médicos y evaluaciones.';
					if($restrespi2 != ''){
						$aptrespirador='Necesita más exámenes médicos y evaluaciones:'.$restrespi2;
					}
				}elseif($tiporespi == '5'){
					$aptrespirador='No apto para usar respirador en este momento.';
					if($restrespi3 != ''){
						$aptrespirador='No apto para usar respirador en este momento:'.$restrespi3;
					}
				}elseif($tiporespi == '6'){
					$aptrespirador='No apto para usar respirador y tiene una restricción permanente.';
					if($restrespi4 != ''){
						$aptrespirador='No apto para usar respirador y tiene una restricción permanente:'.$restrespi4;
					}
				}
			}
			
			
			$querysilic = mysql_query("SELECT 
			idsilice_osha,radio_ho1,radio_ho2,radio_ho3,radio_ho4,radio_ho5
			FROM silice_osha
			WHERE idcomprobante='$idcomprobante' and estado=1") or die(mysql_error());		
			$row_silic= mysql_fetch_array($querysilic);
			$idsilice_osha=$row_silic["idsilice_osha"];
			$radio_ho1 = '';
			$radio_ho2 = '';
			$radio_ho3 = '';
			$radio_ho4 = '';
			$radio_ho5 = '';
			$aptsilice = '';
			if($idsilice_osha * 1 > 0){
				$radio_ho1=trim($row_silic["radio_ho1"]);
				$radio_ho2=trim($row_silic["radio_ho2"]);
				$radio_ho3=trim($row_silic["radio_ho3"]);
				$radio_ho4=trim($row_silic["radio_ho4"]);
				$radio_ho5=trim($row_silic["radio_ho5"]);
				if($radio_ho1=='si'){
					if($aptsilice!=''){
						$aptsilice.=' / ';
					}
					$aptsilice.='¿Alguna vez ha trabajado a tiempo completo (30 horas por semana o más) por 6 meses o más? Rpta: Si';
				}
				if($radio_ho2=='si'){
					if($aptsilice!=''){
						$aptsilice.=' / ';
					}
					$aptsilice.='¿Alguna vez ha trabajado durante un año o más expuesto a polvo en cualquier trabajo? Rpta: Si';
				}
				if($radio_ho3!=''){
					if($aptsilice!=''){
						$aptsilice.=' / ';
					}
					$aptsilice.='La exposición a polvo fue:'.$radio_ho3;
				}
				if($radio_ho4=='si'){
					if($aptsilice!=''){
						$aptsilice.=' / ';
					}
					$aptsilice.='¿Alguna vez ha sido expuesto a niebla, gas o vapores químicos en su trabajo? Rpta: Si';
				}
				if($radio_ho5!=''){
					if($aptsilice!=''){
						$aptsilice.=' / ';
					}
					$aptsilice.='La exposición fue:'.$radio_ho5;
				}
				
			}
						
			
			$sql_inter="select di.resp_fecha,di.motivo_consulta,di.resp_diagnostico,di.resp_diagnostico2,
			di.resp_diagnostico3,di.resp_cie1,di.resp_cie2,di.resp_cie3,
			di.resp_aptitud,es.descripcion as especialidad_inter,
		   concat(cn.apellidos,' ',cn.nombres)as medico, cn.codigo
		   from 
		   det_interconsulta 	di left join
		   especialidad_inter 		es on di.idespecialidad = es.idespecialidad_inter left join 
		   usuario 				us on di.iduser2 		= us.idusuario left join
		   contacto				cn on us.iddoctor 	= cn.idcontacto
		   where di.idcomprobante='$idcomprobante' and di.respondido=1
		   ";
		  // echo $sql_inter;
		   $i=0;
		   $resp_interconsulta1='';
		   $query_inter=mysql_query($sql_inter)or die(mysql_error());
		   while($row_inter=mysql_fetch_array($query_inter)){
			   $inter_diag1=trim($row_inter["resp_diagnostico"]);
			   //$inter_diag2=trim($row_inter["resp_diagnostico2"]);
			   //$inter_diag3=trim($row_inter["resp_diagnostico3"]);
			   
			   $inter_cie1=$row_inter["resp_cie1"];
			   $inter_cie2=$row_inter["resp_cie2"];
			   $inter_cie3=$row_inter["resp_cie3"];
			   /*********************************************************/
			   $motivo_consulta=$row_inter["motivo_consulta"];
			   $resp_fecha=mostrar_fecha($row_inter["resp_fecha"]);
			   
			   /*********************************************************/
			  // if($row_inter["especialidad_inter"]!=''){
				  $inter_esp1=$row_inter["especialidad_inter"]; 
				//   }
			   
			   $inter_doctor1=$row_inter["medico"];
			   $inter_colegiatura1=$row_inter["codigo"];
			   $inter_aptitud=$row_inter["resp_aptitud"];
			   if($inter_aptitud=='1'){
				   $inter_aptitud="Apto";
			   }elseif($inter_aptitud=='2'){
				   $inter_aptitud="No Apto";
			   }else{
				 $inter_aptitud="-";  
			   }
			   
	
				
					$resp_interconsulta1.=$inter_esp1.' - '.$inter_doctor1.'  '.$resp_fecha;

			}//fin While		
			$columna = 'A';	
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $hclinica);$columna++;	
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $empresa);$columna++;	
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, '');$columna++;			
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $paciente);$columna++;	
			$objPHPExcel->getActiveSheet()->getCell($columna.$fila)->setValueExplicit($dni, PHPExcel_Cell_DataType::TYPE_STRING);$columna++;	
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $edad);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $sexo);$columna++;
			$objPHPExcel->getActiveSheet()->getCell($columna.$fila)->setValueExplicit($fechanaci, PHPExcel_Cell_DataType::TYPE_STRING);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $lugarnacimiento);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $area);$columna++;	
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $puesto);$columna++;	
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, '');$columna++;//UNIDAD DE DESTAQUE	
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $tipo_examen);$columna++;//TIPO DE EXAMEN
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $perfil);$columna++;//PERFIL OCUPACIONAL
			$objPHPExcel->getActiveSheet()->getCell($columna.$fila)->setValueExplicit($fecha_co, PHPExcel_Cell_DataType::TYPE_STRING);$columna++;//FECHA DEL EXAMEN	
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $aptitud);$columna++;//APTITUD LABORAL	
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, '');$columna++;//FECHA DE CULMINO DE EXPEDIENTE
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $alergia);$columna++;//ALERGIAS	
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $imunizaciones);$columna++;//IMUNIZACIONES
			$objPHPExcel->getActiveSheet()->getCell($columna.$fila)->setValueExplicit($fecha_menstruacion, PHPExcel_Cell_DataType::TYPE_STRING);$columna++;//FUR
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $ant_quiru);$columna++;//ANTECEDENTES QUIRURGICOS
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, '');$columna++;//ACCIDENTES LABORALES
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, '');$columna++;//DISCAPACIDAD
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $habito_alcohol);$columna++;//ALCOHOL
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $habito_tabaco);$columna++;//TABACO
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $habito_droga);$columna++;//DROGAS
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $peso);$columna++;//PESO
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $talla);$columna++;//TALLA
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $imc);$columna++;//IMC (Kg/m2)
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $dx_nutricional);$columna++;//DX NUTRICIONAL
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $cintura);$columna++;//PERIMETRO ABDOMINAL
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $cadera);$columna++;//PERIMETRO CADERA
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $icc);$columna++;//ICC
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $presion_sistolica);$columna++;//PAS (mm Hg)
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $presion_diastolica);$columna++;//PAD (mm Hg)
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $fcardiaca);$columna++;//FC (lat/min)
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $frespiratoria);$columna++;//FR (resp/min)
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $sato2);$columna++;//SAT %
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $temperatura);$columna++;//T°
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $fvc2);$columna++;//FVC %
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $fev2);$columna++;//FEV1 %
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $fev_fvc2);$columna++;//FEV1/FVC %
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $fef2);$columna++;//FEV 25-75%
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $diag_espiro);$columna++;//Diagnostico
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $diag_rx);$columna++;//RX TORAX
			$objPHPExcel->getActiveSheet()->getCell($columna.$fila)->setValueExplicit($aguvisual_cerca_od, PHPExcel_Cell_DataType::TYPE_STRING);$columna++;
			$objPHPExcel->getActiveSheet()->getCell($columna.$fila)->setValueExplicit($aguvisual_cerca_od2, PHPExcel_Cell_DataType::TYPE_STRING);$columna++;
			$objPHPExcel->getActiveSheet()->getCell($columna.$fila)->setValueExplicit($aguvisual_cerca_oi, PHPExcel_Cell_DataType::TYPE_STRING);$columna++;
			$objPHPExcel->getActiveSheet()->getCell($columna.$fila)->setValueExplicit($aguvisual_cerca_oi2, PHPExcel_Cell_DataType::TYPE_STRING);$columna++;
			$objPHPExcel->getActiveSheet()->getCell($columna.$fila)->setValueExplicit($aguvisual_lejos_od, PHPExcel_Cell_DataType::TYPE_STRING);$columna++;
			$objPHPExcel->getActiveSheet()->getCell($columna.$fila)->setValueExplicit($aguvisual_lejos_od2, PHPExcel_Cell_DataType::TYPE_STRING);$columna++;
			$objPHPExcel->getActiveSheet()->getCell($columna.$fila)->setValueExplicit($aguvisual_lejos_oi, PHPExcel_Cell_DataType::TYPE_STRING);$columna++;
			$objPHPExcel->getActiveSheet()->getCell($columna.$fila)->setValueExplicit($aguvisual_lejos_oi2, PHPExcel_Cell_DataType::TYPE_STRING);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $campo_visual01);$columna++;//Test ISHIHARA
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $dxformat_oft);$columna++;//DIAGNOSTICO OFTALMOLÓGICO
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $otoscopia_aud);$columna++;//OTOSCOPIA
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $runo);$columna++;//500 hz D.
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $rdos);$columna++;//1000 hz D.
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $rtres);$columna++;//2000hz D.
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $rcuatro);$columna++;//3000 hz D.
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $rcinco);$columna++;//4000 hz D.
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $rseis);$columna++;//6000 hz D.
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $rsiete);$columna++;//8000 hz D.
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $auno);$columna++;//500 hz D.
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $ados);$columna++;//1000 hz D.
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $atres);$columna++;//2000hz D.
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $acuatro);$columna++;//3000 hz D.
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $acinco);$columna++;//4000 hz D.
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $aseis);$columna++;//6000 hz D.
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $asiete);$columna++;//8000 hz D.
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $audiometria_diag);$columna++;//DIAGNOSTICO AUDIOMETRICO
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $diagforma_ekg);$columna++;//EKG
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, '');$columna++;//PRUEBA DE ESFUERZO
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $aptopsico);$columna++;//PSICOLOGIA
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $recuestio_acro);$columna++;//ACROFOBIA
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $recuestio_cla);$columna++;//CLAUSTROFOBIA
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $dfareacogniti);$columna++;//OTRAS FOBIAS
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $conclualtura);$columna++;//EXAMEN DE ALTURA ESTRUCTURAL
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $apto_7d);$columna++;//EXAMEN 7D
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $aptssensoformat);$columna++;//PSICOSENSOMETRICO
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, '');$columna++;//TEST DE EPWORTH
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $aptrespirador);$columna++;//RESPIRADOR
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $aptsilice);$columna++;//OSHA-SILICE
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $hemoglobina);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $hematocrito);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $plaquetas);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $reticulocitos);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $grupo_factor);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $exaco_orina);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $glucosa);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $colesterol);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $hdl);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $ldl);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $trigliceridos);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $riescoro);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $acido_urico);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $creatinina);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $reaccion_lues);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $hiv);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $coca_droga);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $mari_droga);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $arr_dx[0]);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $arr_cie[0]);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $arr_dx[1]);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $arr_cie[1]);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $arr_dx[2]);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $arr_cie[2]);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $arr_dx[3]);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $arr_cie[3]);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $arr_dx[4]);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $arr_cie[4]);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $arr_dx[5]);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $arr_cie[5]);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $arr_dx[6]);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $arr_cie[6]);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $arr_dx[7]);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $arr_cie[7]);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $arr_dx[8]);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $arr_cie[8]);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $arr_dx[9]);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $arr_cie[9]);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $arr_reco[0]);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $arr_reco[1]);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $arr_reco[2]);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $arr_reco[3]);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $arr_reco[4]);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $arr_reco[5]);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $arr_reco[6]);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $arr_reco[7]);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $arr_reco[8]);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $arr_reco[9]);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $arr_restricciones[0]);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $arr_restricciones[1]);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $arr_restricciones[2]);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $arr_restricciones[3]);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $arr_restricciones[4]);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $arr_restricciones[5]);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $arr_restricciones[6]);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $arr_restricciones[7]);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $arr_restricciones[8]);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $arr_restricciones[9]);$columna++;
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, '');$columna++;//OBSERVACIONES
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, $resp_interconsulta1);$columna++;//INTERCONSULTAS
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, '');$columna++;//PRÓXIMOS CONTROLES
			$objPHPExcel->getActiveSheet()->setCellValue($columna.$fila, '');$columna++;//VENCIMIENTO DEL EXÁMEN MÉDICO
			$fila++;
			$x++;
        }
		$objPHPExcel->getActiveSheet(0)->setAutoFilter("A9:EO9");
		$objPHPExcel->getActiveSheet(0)->getStyle('A7:EO9')->getAlignment()->setWrapText(true);
		$objPHPExcel->getActiveSheet(0)->freezePane('E10');
        $objPHPExcel->setActiveSheetIndex()->setTitle('MATRIZ');
		
        $objPHPExcel->setActiveSheetIndex(0);


		
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="MATRIZ.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    } else {
        echo "necesitas registrarte";
    }

?>