<?php
	$arrayImpresion = $this->controladoraL->obtenerImpresion($valor);
	require_once('Visual/Reportes/fpdf/fpdf.php');
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->Cell(80,38,'',1);
	$pdf->Cell(5,38,'',0);
	$pdf->Cell(80,38,'',1);
	$pdf->Ln(0);
	switch ($arrayImpresion[0]) {
		case "LIDERAR":
			$pdf->Image('Visual/Imagenes/Liderar/LIDERAR.png',11,15,29,22,'PNG'); // Margin-left, Margin-top, img-ancho, img-alto
			break;
		case "AGROSALTA":
			$pdf->Image('Visual/Imagenes/Agrosalta/AGROSALTA.png',7,19,32,19,'PNG');
			break;
		case 'ANTARTIDA':
			$pdf->Image('Visual/Imagenes/Antartida/ANTARTIDA.png',11,15,27,19,'PNG');
			break;
		default:
			$pdf->Image('Visual/Imagenes/logos/GPS.png',10,17,29,20,'PNG');
			break;
	}
	$pdf->Cell(30,38,'',1);
	$pdf->Cell(0.5,38,'',1);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(49.5,10,utf8_decode('	POLIZA N° ').$arrayImpresion[9],1);
	$pdf->Cell(5,38,'',0);
	$pdf->Cell(80,10,'										DATOS DEL VEHICULO ASEGURADO:',1);
	$pdf->Ln(10);
	$pdf->Cell(30.5,0,'',0);
	$pdf->Cell(49.5,10,'',1);
	$pdf->Ln(0);
	$pdf->Cell(30.5,0,'',0);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(49.5,3,'									SEGURO OBLIGATORIO',0);
	$pdf->Cell(5,10,'',0);
	$pdf->SetFont('Arial','B',7);
	$pdf->Cell(37.5,7,'MARCA: '.utf8_decode($arrayImpresion[3]),0);
	$pdf->Cell(5,10,'',0);
	$pdf->Cell(37.5,7,'DOMINIO: '.$arrayImpresion[12],0);
	$pdf->Ln(3.5);
	$pdf->Cell(30.5,0,'',0);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(49.5,3,'																		AUTOMOTOR',1);
	$pdf->Cell(5,10,'',0);
	$pdf->SetFont('Arial','B',7);
	$pdf->Cell(37.5,8,'CHASIS: '.$arrayImpresion[8],0);
	$pdf->Cell(5,10,'',0);
	$pdf->Ln(3.5);
	$pdf->Cell(30.5,0,'',0);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(49.5,3,'														RES. S.S.N. 21.999',1);
	$pdf->Cell(5,10,'',0);
	$pdf->SetFont('Arial','B',7);
	$pdf->Cell(37.5,10,'MOTOR: '.$arrayImpresion[13],0);
	$pdf->Cell(5,15,'',0);
	$pdf->Cell(37.5,10,'USO: '.utf8_decode($arrayImpresion[14]),0);
	$pdf->Ln(2.9);
	$pdf->Cell(30.5,0,'',0);
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(49.5,5,'				VIGENCIA DE COBERTURA',1);
	$pdf->Cell(5,10,'',0);
	$pdf->SetFont('Arial','B',7);
	$pdf->Cell(37.5,13,'MODELO: '.utf8_decode($arrayImpresion[4]),0);
	$pdf->Ln(5);
	$pdf->Cell(30.5,0,'',0);
	$pdf->SetFont('Arial','',7);
	$pdf->Cell(24.75,3,'	Desde 12hs. dia',1);
	$pdf->Cell(24.75,3,'	Hasta 12hs. dia',1);
	$pdf->Ln(3);
	switch ($arrayImpresion[0]) {
		case "LIDERAR":
			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30.5,4,'												Reconquista 585 - ',0);
			$pdf->SetFont('Arial','',7);
			$pdf->Cell(24.75,10,'						'.$arrayImpresion[10],1);
			$pdf->Cell(24.75,10,'						'.$arrayImpresion[11],1);
			$pdf->Cell(5,10,'',0);
			$pdf->SetFont('Arial','B',7);
			$pdf->Cell(80,0.5,'',1);
			$pdf->Ln(0);
			$pdf->Cell(85,10,'',0);
			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(37.5,10,'',1);
			$pdf->Cell(42.5,5.5,'																		 DENTE CARLOS',0);
			$pdf->Ln(0);
			$pdf->Cell(85,10,'',0);
			$pdf->Cell(37.5,10,'',1);
			$pdf->Cell(42.5,10,'																OFICINA POSADAS',0);
			$pdf->Ln(0);
			$pdf->Cell(85,10,'',0);
			$pdf->Cell(37.5,10,'',1);
			$pdf->Cell(42.5,15,'									CORRIENTES Y CATAMARCA',0);
			$pdf->Ln(3);
			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30.5,4,'			(1003) Buenos Aires - Argentina',0);
			break;
		case "AGROSALTA":
			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30.5,4,'												Reconquista 585 - ',0);
			$pdf->SetFont('Arial','',7);
			$pdf->Cell(24.75,10,'						'.$arrayImpresion[10],1);
			$pdf->Cell(24.75,10,'						'.$arrayImpresion[11],1);
			$pdf->Cell(5,10,'',0);
			$pdf->SetFont('Arial','B',7);
			$pdf->Cell(80,0.5,'',1);
			$pdf->Ln(0);
			$pdf->Cell(85,10,'',0);
			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(37.5,10,'',1);
			$pdf->Cell(42.5,5.5,'																		 DENTE CARLOS',0);
			$pdf->Ln(0);
			$pdf->Cell(85,10,'',0);
			$pdf->Cell(37.5,10,'',1);
			$pdf->Cell(42.5,10,'																OFICINA POSADAS',0);
			$pdf->Ln(0);
			$pdf->Cell(85,10,'',0);
			$pdf->Cell(37.5,10,'',1);
			$pdf->Cell(42.5,15,'									CORRIENTES Y CATAMARCA',0);
			$pdf->Ln(3);
			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30.5,4,'			(1003) Buenos Aires - Argentina',0);
			break;
		case 'ANTARTIDA':
			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30.5,4,'												Reconquista 585 - ',0);
			$pdf->SetFont('Arial','',7);
			$pdf->Cell(24.75,10,'						'.$arrayImpresion[10],1);
			$pdf->Cell(24.75,10,'						'.$arrayImpresion[11],1);
			$pdf->Cell(5,10,'',0);
			$pdf->SetFont('Arial','B',7);
			$pdf->Cell(80,0.5,'',1);
			$pdf->Ln(0);
			$pdf->Cell(85,10,'',0);
			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(37.5,10,'',1);
			$pdf->Cell(42.5,5.5,'																		 DENTE CARLOS',0);
			$pdf->Ln(0);
			$pdf->Cell(85,10,'',0);
			$pdf->Cell(37.5,10,'',1);
			$pdf->Cell(42.5,10,'																OFICINA POSADAS',0);
			$pdf->Ln(0);
			$pdf->Cell(85,10,'',0);
			$pdf->Cell(37.5,10,'',1);
			$pdf->Cell(42.5,15,'									CORRIENTES Y CATAMARCA',0);
			$pdf->Ln(3);
			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30.5,4,'			(1003) Buenos Aires - Argentina',0);
			break;
		default:
			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30.5,4,'												Reconquista 585 - ',0);
			$pdf->SetFont('Arial','',7);
			$pdf->Cell(24.75,10,'						'.$arrayImpresion[10],1);
			$pdf->Cell(24.75,10,'						'.$arrayImpresion[11],1);
			$pdf->Cell(5,10,'',0);
			$pdf->SetFont('Arial','B',7);
			$pdf->Cell(80,0.5,'',1);
			$pdf->Ln(0);
			$pdf->Cell(85,10,'',0);
			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(37.5,10,'',1);
			$pdf->Cell(42.5,5.5,'																		 DENTE CARLOS',0);
			$pdf->Ln(0);
			$pdf->Cell(85,10,'',0);
			$pdf->Cell(37.5,10,'',1);
			$pdf->Cell(42.5,10,'																OFICINA POSADAS',0);
			$pdf->Ln(0);
			$pdf->Cell(85,10,'',0);
			$pdf->Cell(37.5,10,'',1);
			$pdf->Cell(42.5,15,'									CORRIENTES Y CATAMARCA',0);
			$pdf->Ln(3);
			$pdf->SetFont('Arial','',5);
			$pdf->Cell(30.5,4,'			(1003) Buenos Aires - Argentina',0);
			break;
	}
	
	ob_end_clean();
	$var = $pdf->Output('carnet_provisorio.pdf',$accion);
?>