<?php
	$arrayImpresion = $this->controladoraL->obtenerImpresion($valor);
	require_once('Visual/Reportes/fpdf/fpdf.php');
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->setFont('Arial','',10);
	$pdf->Cell(5,8,'',0);
	$pdf->Cell(180,8,utf8_decode('CONSTANCIA DE COBERTURA PARA VEHÍCULOS DE USO PARTICULAR CON PATENTE EXTRANJERA'),0);
	$pdf->Ln(8);

	switch ($arrayImpresion[0]) {
		case "LIDERAR":
			$pdf->Image('Visual/Imagenes/Liderar/LIDERAR.png',20,12,29,22,'PNG');
			$pdf->Cell(5,8,'',0);
			$pdf->Ln(9);
			

			$pdf->Cell(5,2,'',0);
			$pdf->setFont('Arial','',5);
			$pdf->Cell(40,4,'Reconquista 585 (1003) Buenos Aires Argentina',0);
			$pdf->Cell(30,2,'',0);
			$pdf->setFont('Arial','B',10);
			$pdf->Cell(20,1,utf8_decode('PÓLIZA N°'),0);
			$pdf->Cell(30,2,'',0);
			$pdf->Cell(31,1,utf8_decode('CERTIFICADO N°'),0);
			$pdf->Ln(2);


			$pdf->Cell(5,2,'',0);
			$pdf->setFont('Arial','',5);
			$pdf->Cell(40,4,'Tel/Fax: (011)4311-2133 / 5258-6100 y rotativas.',0);
			$pdf->Cell(20,2,'',0);
			$pdf->setFont('Arial','',10);
			$pdf->Cell(40,10,'								'.$arrayImpresion[9],1);
			$pdf->Cell(15,2,'',0);
			$pdf->Cell(40,10,'																		--',1);
			$pdf->Ln(2);

			$pdf->Cell(10,2,'',0);
			$pdf->setFont('Arial','',5);
			$pdf->Cell(6,4,'E-mail: ',0);
			$pdf->setFont('Arial','U',5);
			$pdf->Cell(24,4,'cia@liderarseguros.com.ar',0);
			$pdf->Ln(2);

			$pdf->Cell(12,2,'',0);
			$pdf->setFont('Arial','',5);
			$pdf->Cell(28,4,'WWW.liderarseguros.com.ar',0);
			$pdf->Ln(13);
			break;
		case "AGROSALTA":
			$pdf->Image('Visual/imagenes/Agrosalta/AGROSALTA.png',19,17,29,14,'PNG');
			$pdf->Cell(5,8,'',0);
			$pdf->Ln(9);
			

			$pdf->Cell(5,2,'',0);
			$pdf->setFont('Arial','',5);
			$pdf->Cell(40,4,'Reconquista 585 (1003) Buenos Aires Argentina',0);
			$pdf->Cell(30,2,'',0);
			$pdf->setFont('Arial','B',10);
			$pdf->Cell(20,1,utf8_decode('PÓLIZA N°'),0);
			$pdf->Cell(30,2,'',0);
			$pdf->Cell(31,1,utf8_decode('CERTIFICADO N°'),0);
			$pdf->Ln(2);


			$pdf->Cell(5,2,'',0);
			$pdf->setFont('Arial','',5);
			$pdf->Cell(40,4,'Tel/Fax: (011)4311-2133 / 5258-6100 y rotativas.',0);
			$pdf->Cell(20,2,'',0);
			$pdf->setFont('Arial','',10);
			$pdf->Cell(40,10,'								'.$arrayImpresion[9],1);
			$pdf->Cell(15,2,'',0);
			$pdf->Cell(40,10,'																		--',1);
			$pdf->Ln(2);

			$pdf->Cell(10,2,'',0);
			$pdf->setFont('Arial','',5);
			$pdf->Cell(6,4,'E-mail: ',0);
			$pdf->setFont('Arial','U',5);
			$pdf->Cell(24,4,'cia@liderarseguros.com.ar',0);
			$pdf->Ln(2);

			$pdf->Cell(12,2,'',0);
			$pdf->setFont('Arial','',5);
			$pdf->Cell(28,4,'WWW.liderarseguros.com.ar',0);
			$pdf->Ln(13);
			break;
		case 'ANTARTIDA':
			$pdf->Image('Visual/imagenes/Antartida/ANTARTIDA.png',23,17,22,14,'PNG');
			$pdf->Cell(5,8,'',0);
			$pdf->Ln(9);
			

			$pdf->Cell(5,2,'',0);
			$pdf->setFont('Arial','',5);
			$pdf->Cell(40,4,'Reconquista 585 (1003) Buenos Aires Argentina',0);
			$pdf->Cell(30,2,'',0);
			$pdf->setFont('Arial','B',10);
			$pdf->Cell(20,1,utf8_decode('PÓLIZA N°'),0);
			$pdf->Cell(30,2,'',0);
			$pdf->Cell(31,1,utf8_decode('CERTIFICADO N°'),0);
			$pdf->Ln(2);


			$pdf->Cell(5,2,'',0);
			$pdf->setFont('Arial','',5);
			$pdf->Cell(40,4,'Tel/Fax: (011)4311-2133 / 5258-6100 y rotativas.',0);
			$pdf->Cell(20,2,'',0);
			$pdf->setFont('Arial','',10);
			$pdf->Cell(40,10,'								'.$arrayImpresion[9],1);
			$pdf->Cell(15,2,'',0);
			$pdf->Cell(40,10,'																		--',1);
			$pdf->Ln(2);

			$pdf->Cell(10,2,'',0);
			$pdf->setFont('Arial','',5);
			$pdf->Cell(6,4,'E-mail: ',0);
			$pdf->setFont('Arial','U',5);
			$pdf->Cell(24,4,'cia@liderarseguros.com.ar',0);
			$pdf->Ln(2);

			$pdf->Cell(12,2,'',0);
			$pdf->setFont('Arial','',5);
			$pdf->Cell(28,4,'WWW.liderarseguros.com.ar',0);
			$pdf->Ln(13);
			break;
		default:
			$pdf->Image('Visual/imagenes/logos/GPS.png',22,15,25,15,'PNG');
			$pdf->Cell(5,8,'',0);
			$pdf->Ln(9);
			

			$pdf->Cell(5,2,'',0);
			$pdf->setFont('Arial','',5);
			$pdf->Cell(40,4,'Reconquista 585 (1003) Buenos Aires Argentina',0);
			$pdf->Cell(30,2,'',0);
			$pdf->setFont('Arial','B',10);
			$pdf->Cell(20,1,utf8_decode('PÓLIZA N°'),0);
			$pdf->Cell(30,2,'',0);
			$pdf->Cell(31,1,utf8_decode('CERTIFICADO N°'),0);
			$pdf->Ln(2);


			$pdf->Cell(5,2,'',0);
			$pdf->setFont('Arial','',5);
			$pdf->Cell(40,4,'Tel/Fax: (011)4311-2133 / 5258-6100 y rotativas.',0);
			$pdf->Cell(20,2,'',0);
			$pdf->setFont('Arial','',10);
			$pdf->Cell(40,10,'								'.$arrayImpresion[9],1);
			$pdf->Cell(15,2,'',0);
			$pdf->Cell(40,10,'																		--',1);
			$pdf->Ln(2);

			$pdf->Cell(10,2,'',0);
			$pdf->setFont('Arial','',5);
			$pdf->Cell(6,4,'E-mail: ',0);
			$pdf->setFont('Arial','U',5);
			$pdf->Cell(24,4,'cia@liderarseguros.com.ar',0);
			$pdf->Ln(2);

			$pdf->Cell(12,2,'',0);
			$pdf->setFont('Arial','',5);
			$pdf->Cell(28,4,'WWW.liderarseguros.com.ar',0);
			$pdf->Ln(13);
			break;
	}
	
	/**/

	$pdf->setFont('Arial','B',10);
	$pdf->Cell(5,8,'',0);
	$pdf->Cell(25,4,'ASEGURADO',0);
	$pdf->Cell(110,1,'',0);
	$pdf->Cell(19,4,'VIGENCIA',0);
	$pdf->Cell(26,1,'',0);
	$pdf->Ln(1);
	$pdf->Cell(5,5,'',0);
	$pdf->Cell(117.5,4,'',0);
	$pdf->Ln(2);
	$pdf->Cell(5,5,'',0);
	$pdf->Ln(2);
	$pdf->Cell(5,5,'                    ................................................................................................',0);
	$pdf->setFont('Arial','',9);
	$pdf->Cell(14,3,'Nombre: ',0);
	$pdf->Cell(7,3,'',0);
	$pdf->setFont('Arial','',10);
	$pdf->Cell(96.5,3,utf8_decode($arrayImpresion[1]).' '.utf8_decode($arrayImpresion[2]),0);
	$pdf->Cell(50,8.5,'    '.$arrayImpresion[10].' al '.$arrayImpresion[11],1);
	$pdf->Ln(6);
	$pdf->Cell(5,5,'',0);
	$pdf->setFont('Arial','',9);
	$pdf->Cell(14,3,'Domicilio: ',0);
	$pdf->Cell(7,3,'',0);
	$pdf->setFont('Arial','',10);
	$pdf->Cell(96.5,3,utf8_decode($arrayImpresion[6]),0);
	$pdf->Ln(0.2);
	$pdf->setFont('Arial','B',10);
	$pdf->Cell(5,5,'                    ................................................................................................',0);
	$pdf->Ln(6);
	$pdf->Cell(5,5,'',0);
	$pdf->setFont('Arial','',9);
	$pdf->Cell(14,3,'Localidad: ',0);
	$pdf->Cell(7,3,'',0);
	$pdf->setFont('Arial','',10);
	$pdf->Cell(96.5,3,utf8_decode($arrayImpresion[7]),0);
	$pdf->Ln(0.2);
	$pdf->setFont('Arial','B',10);
	$pdf->Cell(5,5,'                    ................................................................................................',0);
	$pdf->Ln(6);
	$pdf->Cell(5,5,'',0);
	$pdf->setFont('Arial','',9);
	$pdf->Cell(14,3,'Marca: ',0);
	$pdf->Cell(7,3,'',0);
	$pdf->setFont('Arial','',10);
	$pdf->Cell(96.5,3,utf8_decode($arrayImpresion[3]),0);
	$pdf->Ln(0.2);
	$pdf->setFont('Arial','B',10);
	$pdf->Cell(5,5,'                    ......................................................... ',0);
	$pdf->Cell(72,3,'',0);
	$pdf->setFont('Arial','',9);
	$pdf->Cell(15,3,'Modelo: ',0);
	$pdf->setFont('Arial','',10);
	$pdf->Cell(50,3,utf8_decode($arrayImpresion[4]),0);
	$pdf->setFont('Arial','',9);
	$pdf->Cell(10,3,utf8_decode('Año: '),0);
	$pdf->Cell(5,3,'',0);
	$pdf->setFont('Arial','',10);
	$pdf->Cell(10,3,$arrayImpresion[5],0);
	$pdf->Ln(0.2);
	$pdf->setFont('Arial','B',10);
	$pdf->Cell(5,5,'                                                                                          ......................................................        .......................',0);
	$pdf->Ln(6);
	$pdf->Cell(5,5,'',0);
	$pdf->setFont('Arial','',9);
	$pdf->Cell(14,3,'Motor - Chasis: ',0);
	$pdf->Cell(18,3,'',0);
	$pdf->setFont('Arial','',10);
	$pdf->Cell(10,3,$arrayImpresion[13].' - '.$arrayImpresion[8],0);
	$pdf->Ln(0.2);
	$pdf->setFont('Arial','B',10);
	$pdf->Cell(5,5,'                               ................................................................................................................................................',0);
	$pdf->Ln(6);
	$pdf->Cell(5,5,'',0);
	$pdf->setFont('Arial','',9);
	$pdf->Cell(14,3,utf8_decode('Matrícula:'),0);
	$pdf->Cell(7,3,'',0);
	$pdf->setFont('Arial','',10);
	$pdf->Cell(10,3,$arrayImpresion[12],0);
	$pdf->Ln(0.2);
	$pdf->setFont('Arial','B',10);
	$pdf->Cell(5,5,'                    ...........................................................................................................................................................',0);
	$pdf->Ln(8);
	$pdf->Cell(6,5,'',0);
	$pdf->setFont('Arial','B',8);
	$pdf->Cell(14,3,utf8_decode('Esta aseguradora certifica que el vehículo cuyos datos se detallan anteriormente se encuentra amparada en el riesgo de'),0);
	$pdf->Ln(3.5);
	$pdf->Cell(6,5,'',0);
	$pdf->Cell(14,3,utf8_decode('Responsabilidad Civil Únicamente, de acuerdo a los límites establecidos en el presente certificado.'),0);
	$pdf->Ln(8);
	$pdf->Cell(5,5,'',0);
	$pdf->setFont('Arial','',9);
	$pdf->Cell(14,3,'Ciudad: ',0);
	$pdf->Cell(7,3,'',0);
	$pdf->setFont('Arial','',10);
	$pdf->Cell(40,3,utf8_decode($arrayImpresion[7]),0);
	$pdf->setFont('Arial','',9);
	$pdf->Cell(13,3,'Fecha: ',0);
	$pdf->Cell(7,3,'',0);
	$pdf->Cell(18,3,$arrayImpresion[14],0);
	$pdf->Cell(7,3,'',0);
	$pdf->setFont('Arial','',9);
	$pdf->Cell(27,3,'Firma Autorizada: ',0);
	$pdf->Ln(0.2);
	$pdf->setFont('Arial','B',10);
	$pdf->Cell(5,5,'                    ..............................................            ...................................                           ...................................',0);
	$pdf->Ln(8);
	$pdf->Cell(15,5,'',0);
	$pdf->setFont('Arial','',10);
	$pdf->Cell(14,3,UTF8_DECODE('LÍMITES MÁXIMOS POR VEHÍCULOS Y EVENTO DURANTE LA ESTADÍA EN ARGENTINA'),0);
	$pdf->Ln(6);

	/**/
	$pdf->Cell(6,1,'',0);
	$pdf->Cell(166,17,'',1);
	$pdf->Ln(1);
	$pdf->Cell(62.3,1,'',0);
	$pdf->setFont('Arial','B',7);
	$pdf->Cell(55,4,UTF8_DECODE('DAÑOS A TERCEROS NO TRANSPORTADOS'),0);
	$pdf->Ln(5);

	$pdf->setFont('Arial','',7);
	$pdf->Cell(10,1,'',0);
	$pdf->Cell(34,6,UTF8_DECODE('Muerte y/o Daños Personales'),0);
	$pdf->Cell(10,1,'',0);                                        
	$pdf->Cell(34,6,UTF8_DECODE('Límite Máximo'),0);    
	$pdf->Cell(10,1,'',0);                                     
	$pdf->Cell(34,6,UTF8_DECODE('Daños Materiales'),0);  
	$pdf->Cell(10,1,'',0);                                     
	$pdf->Cell(34,6,UTF8_DECODE('Límite Máximo'),0);
	$pdf->Ln(5);

	$pdf->Cell(10,1,'',0);
	$pdf->Cell(34,6,UTF8_DECODE('Por persona $20.000'),0);
	$pdf->Cell(10,1,'',0);                                        
	$pdf->Cell(34,6,UTF8_DECODE('Por evento $100.000'),0);    
	$pdf->Cell(10,1,'',0);                                     
	$pdf->Cell(34,6,UTF8_DECODE('Por Terceros $10.000'),0);  
	$pdf->Cell(10,1,'',0);                                     
	$pdf->Cell(34,6,UTF8_DECODE('Por evento $20.000'),0);

	$var = $pdf->Output('certificado.pdf',$accion);	
?>