<?PHP
class JPASiniestro{
	private $bd;

	public function JPASiniestro(){
		include_once('Persistencia/Conexion.php');
		$this->bd = new MySQL();
	}
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		ALTA
-------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function altaSiniestro($unSiniestro){
		$numPoliza = $unSiniestro->getNumPoliza();
		$apellido = $unSiniestro->getApellido();
		$nombre = $unSiniestro->getNombre();
		$dominio = $unSiniestro->getDominio();
		$conductor = $unSiniestro->getConductor();
		$terceroUno = $unSiniestro->getTerceroUno();
		$dominioUno = $unSiniestro->getDominioUno();
		$conductorUno = $unSiniestro->getConductorUno();
		$terceroDos = $unSiniestro->getTerceroDos();
		$dominioDos = $unSiniestro->getDominioDos();
		$conductorDos = $unSiniestro->getConductorDos();
		$fechaSiniestro = date("Y-m-d",strtotime($Poliza->getFechaSiniestro()));
		$fechaDenunciaInterna = date("Y-m-d",strtotime($Poliza->getFechaDenunciaInterna()));
		$exposicionPolicial = $unSiniestro->getExposicionPolicial();
		$fotocopiaDni = $unSiniestro->getFotocopiaDni();
		$fotocopiaCV = $unSiniestro->getFotocopiaCV();
		$fotocopiaCC = $unSiniestro->getFotocopiaCC();
		$fotocopiaVTV = $unSiniestro->getFotocopiaVTV();
		$fotosAsegurado = $unSiniestro->getFotosAsegurado();
		$otros = $unSiniestro->getOtros();
		$fechaReclamoTercero = date("Y-m-d",strtotime($Poliza->getFechaReclamoTercero()));
		$exposicionPolicialTercero = $unSiniestro->getExposicionPolicialTercero();
		$fotocopiaCVTercero = $unSiniestro->getFotocopiaCVTercero();
		$boletoCompra = $unSiniestro->getBoletoCompra();
		$fotocopiaCCTercero = $unSiniestro->getFotocopiaCCTercero();
		$certificadoCobertura = $unSiniestro->getCertificadoCobertura();
		$denunciaAdministrativa = $unSiniestro->getDenunciaAdministrativa();
		$fotoCantTercero = $unSiniestro->getFotoCantTercero();
		$presupuesto = $unSiniestro->getPresupuesto();
		$presupuestoDos = $unSiniestro->getPresupuestoDos();
		$totalPresupuesto = $unSiniestro->getTotalPresupuesto();
		$gastosMedicos = $unSiniestro->getGastosMedicos();
		$informeMedico = $unSiniestro->getInformeMedico();
		$fechaEnvioDI = date("Y-m-d",strtotime($Poliza->getFechaEnvioDI()));
		$fechaEnvioRT = date("Y-m-d",strtotime($Poliza->getFechaEnvioRT()));
		$fechaDictamen = date("Y-m-d",strtotime($Poliza->getFechaDictamen()));
		$dictamen = $unSiniestro->getDictamen();
		$ofrecimiento = $unSiniestro->getOfrecimiento();
		$vencimientoReclamo = date("Y-m-d",strtotime($Poliza->getVencimientoReclamo()));

		return $this->bd->query("INSERT INTO Siniestro (numPoliza, apellido , nombre, dominio, conductor, terceroUno, dominioUno, conductorUno, terceroDos, dominioDos, conductorDos, fechaSiniestro, fechaDenunciaInterna, exposicionPolicial, fotocopiaDni, fotocopiaCV, fotocopiaCC, fotocopiaVTV, fotosAsegurado, otros, fechaReclamoTercero, exposicionPolicialTercero, fotocopiaCVTercero, fotocopiaCCTercero, boletoCompra, certificadoCobertura, denunciaAdministrativa, fotoCantTercero, presupuesto, presupuestoDos, totalPresupuesto, gastosMedicos, informeMedico, fechaEnvioDI, fechaEnvioRT, fechaDictamen, dictamen, ofrecimiento, vencimientoReclamo) VALUES ('".$numPoliza."', '".$apellido."', '".$nombre."', '".$dominio."', '".$conductor."', '".$terceroUno."', '".$dominioUno."', '".$conductorUno."', '".$terceroDos."', '".$dominioDos."', '".$conductorDos."', '".$fechaSiniestro."', '".$fechaDenunciaInterna."', '".$exposicionPolicial."', '".$fotocopiaDni."', '".$fotocopiaCV."', '".$fotocopiaCC."', '".$fotocopiaVTV."', '".$fotosAsegurado."', '".$otros."', '".$fechaReclamoTercero."', '".$exposicionPolicialTercero."', '".$fotocopiaCVTercero."', '".$fotocopiaCCTercero."', '".$boletoCompra."', '".$certificadoCobertura."', '".$denunciaAdministrativa."', '".$fotoCantTercero."', '".$presupuesto."', '".$presupuestoDos."', '".$totalPresupuesto."', '".$gastosMedicos."', '".$informeMedico."', '".$fechaEnvioDI."', '".$fechaEnvioRT."', '".$fechaDictamen."', '".$dictamen."', '".$ofrecimiento."', '".$vencimientoReclamo."');");
	}
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		BAJA
-------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function bajaSiniestro($id){
		return $this->bd->query("DELETE FROM Siniestro WHERE = '".$id."';");
	}
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		MODIFICACION
-------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function modificarSiniestro($id, $unSiniestro){
		$numPoliza = $unSiniestro->getNumPoliza();
		$apellido = $unSiniestro->getApellido();
		$nombre = $unSiniestro->getNombre();
		$dominio = $unSiniestro->getDominio();
		$conductor = $unSiniestro->getConductor();
		$terceroUno = $unSiniestro->getTerceroUno();
		$dominioUno = $unSiniestro->getDominioUno();
		$conductorUno = $unSiniestro->getConductorUno();
		$terceroDos = $unSiniestro->getTerceroDos();
		$dominioDos = $unSiniestro->getDominioDos();
		$conductorDos = $unSiniestro->getConductorDos();
		$fechaSiniestro = $unSiniestro->getFechaSiniestro();
		$fechaDenunciaInterna = $unSiniestro->getFechaDenunciaInterna();
		$exposicionPolicial = $unSiniestro->getExposicionPolicial();
		$fotocopiaDni = $unSiniestro->getFotocopiaDni();
		$fotocopiaCV = $unSiniestro->getFotocopiaCV();
		$fotocopiaCC = $unSiniestro->getFotocopiaCC();
		$fotocopiaVTV = $unSiniestro->getFotocopiaVTV();
		$fotosAsegurado = $unSiniestro->getFotosAsegurado();
		$otros = $unSiniestro->getOtros();
		$fechaReclamoTercero = $unSiniestro->getFechaReclamoTercero();
		$exposicionPolicialTercero = $unSiniestro->getExposicionPolicialTercero();
		$fotocopiaCVTercero = $unSiniestro->getFotocopiaCVTercero();
		$boletoCompra = $unSiniestro->getBoletoCompra();
		$fotocopiaCCTercero = $unSiniestro->getFotocopiaCCTercero();
		$certificadoCobertura = $unSiniestro->getCertificadoCobertura();
		$denunciaAdministrativa = $unSiniestro->getDenunciaAdministrativa();
		$fotoCantTercero = $unSiniestro->getFotoCantTercero();
		$presupuesto = $unSiniestro->getPresupuesto();
		$presupuestoDos = $unSiniestro->getPresupuestoDos();
		$totalPresupuesto = $unSiniestro->getTotalPresupuesto();
		$gastosMedicos = $unSiniestro->getGastosMedicos();
		$informeMedico = $unSiniestro->getInformeMedico();
		$fechaEnvioDI = $unSiniestro->getFechaEnvioDI();
		$fechaEnvioRT = $unSiniestro->getFechaEnvioRT();
		$fechaDictamen = $unSiniestro->getFechaDictamen();
		$dictamen = $unSiniestro->getDictamen();
		$ofrecimiento = $unSiniestro->getOfrecimiento();
		$vencimientoReclamo = $unSiniestro->getVencimientoReclamo();
		
		return $this->bd->query("UPDATE Siniestro SET  numPoliza = '".$numPoliza."',  apellido = '".$apellido."',  nombre = '".$nombre."', dominio = '".$dominio."', conductor = '".$conductor."', terceroUno = '".$terceroUno."', dominioUno = '".$dominioUno."', conductorUno = '".$conductorUno."', terceroDos = '".$terceroDos."', dominioDos = '".$dominioDos."',  conductorDos = '".$conductorDos."', fechaSiniestro = '".$fechaSiniestro."', fechaDenunciaInterna = '".$fechaDenunciaInterna."', exposicionPolicial = '".$exposicionPolicial."', fotocopiaDni = '".$fotocopiaDni."', fotocopiaCV = '".$fotocopiaCV."', fotocopiaCC = '".$fotocopiaCC."', fotocopiaVTV = '".$fotocopiaVTV."', fotosAsegurado = '".$fotosAsegurado."', otros = '".$otros."', fechaReclamoTercero = '".$fechaReclamoTercero."', exposicionPolicialTercero = '".$exposicionPolicialTercero."', fotocopiaCVTercero = '".$fotocopiaCVTercero."', boletoCompra = '".$boletoCompra."', fotocopiaCCTercero = '".$fotocopiaCCTercero."', certificadoCobertura = '".$certificadoCobertura."', denunciaAdministrativa = '".$denunciaAdministrativa."', fotoCantTercero = '".$fotoCantTercero."', presupuesto = '".$presupuesto."', presupuestoDos = '".$presupuestoDos."', totalPresupuesto= '".$totalPresupuesto."', gastosMedicos = '".$gastosMedicos."', informeMedico = '".$informeMedico."', fechaEnvioDI = '".$fechaEnvioDI."', fechaEnvioRT = '".$fechaEnvioRT."', fechaDictamen = '".$fechaDictamen."', dictamen = '".$dictamen."', ofrecimiento = '".$ofrecimiento."', vencimientoReclamo = '".$vencimientoReclamo."' WHERE id = '".$id."';");
	}
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		LECTURA
-------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function obtenerSiniestro($dominio){
		$sql = $this->bd->query("SELECT * FROM Siniestro WHERE dominio = '".$dominio."'");

		$array = $bd->recorrer($sql);

		return $array;
	}


	public function obtenerTablaSiniestro($valor){
		$array = array();

		$sql = $this->bd->query("SELECT numPoliza, apellido, nombre, dominio FROM Siniestro WHERE apellido = '".$valor."'");
		
		if($this->bd->rows($sql) > 0){
			while($algo = $this->bd->recorrer($sql)){
				$array[] = $algo;
			}
		}else{
			$array = null;
		}

		return $array;
	}
}
?>