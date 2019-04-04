<?PHP
class ControladoraL{
	private $controladoraP;

	public function controladoraL(){
		include_once('Persistencia/ControladoraP.php');
		$this->controladoraP = new controladoraP();
	}

/*---------------------------------------------------------------------------------------------------------------------------------------------
															GENERAL
-----------------------------------------------------------------------------------------------------------------------------------------------*/
	public function login($usuario, $password){
		return $this->controladoraP->login($usuario, $password);
	}

	public function bajaDe($entidad,$col,$valor){
		return $this->controladoraP->bajaDe($entidad,$col,$valor);
	}

	public function obtenerTodoDe($entidad){
		if($entidad == "Poliza"){
			$respuesta = $this->obtenerTodoDePoliza();
		}else{
			$respuesta = $this->controladoraP->obtenerTodoDe($entidad);
		}
		return $respuesta;
	}

	public function obtenerDe($entidad,$col,$valor){
		return $this->controladoraP->obtenerDe($entidad,$col,$valor);
	}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		INICIO
------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function buscarInicio($valor){
		return $this->controladoraP->buscarInicio($valor);
	}

	public function buscarPago($idPoliza){
		$f = 0;
		$pago = $this->controladoraP->buscarPago($idPoliza);
		
		foreach ($pago as $pa) {
			$pago[$f]['fecha'] = $this->formatDateVuelta($pago[$f]['fecha']);
			$f++;
		}

		return $pago;
	}

	public function obtenerDominioClientes($apellido){
		return $this->controladoraP->obtenerDominioClientes($apellido);
	}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		CLIENTE
------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function altaCliente($dni, $apellido, $nombre, $fechaNac, $direccion, $ciudad, $provincia, $cuit, $telefono, $fechaBaja, $estadoCivil, $productor){
		$fechaNac = $this->formatDateIda($fechaNac);
		include_once('Logica/Cliente.php');
		$unCliente = new Cliente($dni, $apellido, $nombre, $fechaNac, $direccion, $ciudad, $provincia, $cuit, $telefono, $fechaBaja, $estadoCivil, $productor);
		return $this->controladoraP->altaCliente($unCliente);
	}

	public function modificarCliente($id, $dni, $apellido, $nombre, $fechaNac, $direccion, $ciudad, $provincia, $cuit, $telefono, $fechaBaja, $estadoCivil, $productor){
		$fechaNac = $this->formatDateIda($fechaNac);
		include_once('Logica/Cliente.php');
		$unCliente = new Cliente($dni, $apellido, $nombre, $fechaNac, $direccion, $ciudad, $provincia, $cuit, $telefono, $fechaBaja, $estadoCivil, $productor);
		
		return $this->controladoraP->modificarCliente($id, $unCliente);
	}

	public function obtenerClientes(){
		return $this->controladoraP->obtenerClientes();
	}

	public function obtenerClienteApellido($apellido){
		return $this->controladoraP->obtenerClienteApellido($apellido);
	}

	public function obtenerClienteProductor($id){
		return $this->controladoraP->obtenerClienteProductor($id);
	}

	public function obtenerIdCliente($dniCliente){
		return $this->controladoraP->obtenerIdCliente($dniCliente);
	}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		VEHICULO
------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function altaVehiculo($dominio, $marca, $modelo, $anio, $chasis, $motor, $valor, $cliente, $carroceria){
		include_once('Logica/Vehiculo.php');
		$unVehiculo = new Vehiculo($dominio, $marca, $modelo, $anio, $chasis, $motor, $valor, $cliente, $carroceria);
		
		return $this->controladoraP->altaVehiculo($unVehiculo);
	}

	public function modificarVehiculo($id, $dominio, $marca, $modelo, $anio, $chasis, $motor, $valor, $cliente, $carroceria){
		include_once('Logica/Vehiculo.php');
		$unVehiculo = new Vehiculo($dominio, $marca, $modelo, $anio, $chasis, $motor, $valor, $cliente, $carroceria);
		
		return $this->controladoraP->modificarVehiculo($id, $unVehiculo);
	}

	public function obtenerModelosMarca($idMarca){
		return $this->controladoraP->obtenerModelosMarca($idMarca);
	}

	public function obtenerCarroceriaModelos($idModelo){
		return $this->controladoraP->obtenerCarroceriaModelos($idModelo);
	}

	public function obtenerIdVehiculo($dominio){
		return $this->controladoraP->obtenerIdVehiculo($dominio);
	}

	public function obtenerTablaBuscador($dominio){
		return $this->controladoraP->obtenerTablaBuscador($dominio);
	}

	public function obtenerVehiculoCliente(){
		return $this->controladoraP->obtenerVehiculoCliente();
	}

	public function obtenerTablaVehiculoCliente($id){
		return $this->controladoraP->obtenerTablaVehiculoCliente($id);
	}

	public function obtenerVehiculo($id){
		return $this->controladoraP->obtenerVehiculo($id);
	}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		POLIZA
------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function altaPoliza($numPoliza, $vigenciaPedida, $vigenciaPedidaHasta, $vigenciaPoliza, $vigenciaPolizaHasta, $costoPoliza, $observaciones, $endoso, $estado, $sumaAsegurada, $numPolizaVida, $costoPolizaVida, $destino, $dominioVehiculo, $idCategoria, $idCobertura, $idCompSeguro){
		
		$vigenciaPedida = $this->formatDateIda($vigenciaPedida);
		$vigenciaPedidaHasta = $this->formatDateIda($vigenciaPedidaHasta);
		$vigenciaPoliza = $this->formatDateIda($vigenciaPoliza);
		$vigenciaPolizaHasta = $this->formatDateIda($vigenciaPolizaHasta);

		include_once('Logica/Poliza.php');
		$unaPoliza = new Poliza($numPoliza, $vigenciaPedida, $vigenciaPedidaHasta, $vigenciaPoliza, $vigenciaPolizaHasta, $costoPoliza, $observaciones, $endoso, $estado, $sumaAsegurada, $numPolizaVida, $costoPolizaVida, $destino, $dominioVehiculo, $idCategoria, $idCobertura, $idCompSeguro);
		
		return $this->controladoraP->altaPoliza($unaPoliza);
	}

	public function bajaPoliza($id){
		return $this->controladoraP->bajaPoliza($id);
	}

	public function modificarPoliza($id, $numPoliza, $vigenciaPedida, $vigenciaPedidaHasta, $vigenciaPoliza, $vigenciaPolizaHasta, $costoPoliza, $observaciones, $endoso, $estado, $sumaAsegurada, $numPolizaVida, $costoPolizaVida, $destino, $dominioVehiculo, $idCategoria, $idCobertura, $idCompSeguro){
		$vigenciaPedida = $this->formatDateIda($vigenciaPedida);
		$vigenciaPedidaHasta = $this->formatDateIda($vigenciaPedidaHasta);
		$vigenciaPoliza = $this->formatDateIda($vigenciaPoliza);
		$vigenciaPolizaHasta = $this->formatDateIda($vigenciaPolizaHasta);

		include_once('Logica/Poliza.php');
		$unaPoliza = new Poliza($numPoliza, $vigenciaPedida, $vigenciaPedidaHasta, $vigenciaPoliza, $vigenciaPolizaHasta, $costoPoliza, $observaciones, $endoso, $estado, $sumaAsegurada, $numPolizaVida, $costoPolizaVida, $destino, $dominioVehiculo, $idCategoria, $idCobertura, $idCompSeguro);
		
		return $this->controladoraP->modificarPoliza($id, $unaPoliza);
	}

	public function obtenerPoliza($numPoliza){
		$poliza = $this->controladoraP->obtenerPoliza($numPoliza);

		if($poliza){
			$poliza[2] = $this->formatDateVuelta($poliza[2]);
			$poliza[3] = $this->formatDateVuelta($poliza[3]);
			$poliza[4] = $this->formatDateVuelta($poliza[4]);
			$poliza[5] = $this->formatDateVuelta($poliza[5]);
			
			$array[] = $poliza;
		}else{
			$array = null;
		}

		return $array;
	}
	////////////////////////////////////// ----> LO NUEVO
	public function obtenerTodoDePoliza(){
		$f = 0;
		$poliza = $this->controladoraP->obtenerTodoDePoliza(); // Viene desde la BD hay que dar formato dd/mm/aaaa
		
		foreach ($poliza as $po) {
			$poliza[$f]['vigenciaPedida'] = $this->formatDateVuelta($poliza[$f][2]);
			$poliza[$f]['vigenciaPedidaHasta'] = $this->formatDateVuelta($poliza[$f][3]);
			$poliza[$f]['vigenciaPoliza'] = $this->formatDateVuelta($poliza[$f][4]);
			$poliza[$f]['vigenciaPolizaHasta'] = $this->formatDateVuelta($poliza[$f][5]);
			$f++;
		}

		return $poliza;
	}

	public function formatDateIda($result){
		if($result != null){
			$result = date("Y-m-d",strtotime($result));
		}

		return $result;
	}

	public function formatDateVuelta($result){
		if($result != null){
			$fecha = explode("-", $result);
			if(($fecha[0] == 0000)||($fecha[0] == 1970)){
				$result = NULL;
			}else{
				$result = date("d-m-Y",strtotime($result));
			}
		}

		return $result;
	}

	public function obtenerPolizaMod($id){
		$poliza = $this->controladoraP->obtenerPolizaMod($id);
		
		$poliza['vigenciaPedida'] = $this->formatDateVuelta($poliza[3]);
		$poliza['vigenciaPedidaHasta'] = $this->formatDateVuelta($poliza[4]);
		$poliza['vigenciaPoliza'] = $this->formatDateVuelta($poliza[5]);
		$poliza['vigenciaPolizaHasta'] = $this->formatDateVuelta($poliza[6]);

		$array[] = $poliza;
		return $array;
	}

	////////////////////////////////////// ----> FIN LO NUEVO

	public function obtenerVehiculosSinPoliza(){
		return $this->controladoraP->obtenerVehiculosSinPoliza();
	}

	public function obtenerCoberturaCompania($compSeguro){
		return $this->controladoraP->obtenerCoberturaCompania($compSeguro);
	}

	public function obtenerPolizaDominio($idVehiculo){
		$poliza = $this->controladoraP->obtenerPolizaDominio($idVehiculo);

		return $poliza;
	}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		PAGO
------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function altaPago($numRecibo, $fecha, $importe, $numCuota, $importeGrua, $reciboGrua, $observaciones, $idPoliza){
		$fecha = $this->formatDateIda($fecha);
		include_once('Logica/Pago.php');
		$unPago = new Pago($numRecibo, $fecha, $importe, $numCuota, $importeGrua, $reciboGrua, $observaciones, $idPoliza);
		
		return $this->controladoraP->altaPago($unPago);
	}

	public function bajaPago($id){
		return $this->controladoraP->bajaPago($id);
	}

	public function modificarPago($id, $numRecibo, $fecha, $importe, $numCuota, $importeGrua, $reciboGrua, $observaciones, $idPoliza){
		$fecha = $this->formatDateIda($fecha);
		include_once('Logica/Pago.php');
		$unPago = new Pago($numRecibo, $fecha, $importe, $numCuota, $importeGrua, $reciboGrua, $observaciones, $idPoliza);

		return $this->controladoraP->modificarPago($id, $unPago);
	}

	public function obtenerPagos(){
		$f = 0;
		$pagos = $this->controladoraP->obtenerPagos(); // Viene desde la BD hay que dar formato dd/mm/aaaa
		
		foreach ($pagos as $pa) {
			$pagos[$f]['fecha'] = $this->formatDateVuelta($pagos[$f][2]);
			$f++;
		}

		return $pagos;
	}

	public function obtenerPolizaConIdDominio(){
		return $this->controladoraP->obtenerPolizaConIdDominio();
	}

	public function buscadorPago($numRecibo){
		$pago = $this->controladoraP->buscadorPago($numRecibo);
		if($pago != null){
			$pago['fecha'] = $this->formatDateVuelta($pago['fecha']);
			$array[] = $pago;
		}else{
			$array = null;
		}
		
		return $array;
	}

	public function obtenerPago($idPago){
		$pago = $this->controladoraP->obtenerPago($idPago);
		if(!empty($pago)){
			$pago['fecha'] = $this->formatDateVuelta($pago['fecha']);
			$array[] = $pago;
		}else{
			$array = null;
		}

		return $array;
	}

	public function obtenerUltimosPagos($id){
		return $this->controladoraP->obtenerUltimosPagos($id);
	}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		SINIESTRO
------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function altaSiniestro($numPoliza, $apellido, $nombre, $dominio, $conductor, $terceroUno, $dominioUno, $conductorUno, $terceroDos, $dominioDos, $conductorDos, $fechaSiniestro, $fechaDenunciaInterna, $exposicionPolicial, $fotocopiaDni, $fotocopiaCV, $fotocopiaCC, $fotocopiaVTV, $fotosAsegurado, $otros, $fechaReclamoTercero, $exposicionPolicialTercero, $fotocopiaCVTercero, $boletoCompra, $fotocopiaCCTercero, $certificadoCobertura, $denunciaAdministrativa, $fotosCantTercero, $presupuesto, $presupuestoDos, $totalPresupuesto, $gastosMedicos, $informeMedico, $fechaEnvioDI, $fechaEnvioRT, $fechaDictamen, $dictamen, $ofrecimiento, $reclamoVence){
		$fechaSiniestro = $this->formatDateIda($fechaSiniestro);
		$fechaDenunciaInterna = $this->formatDateIda($fechaDenunciaInterna);
		$fechaReclamoTercero = $this->formatDateIda($fechaReclamoTercero);
		$fechaEnvioDI = $this->formatDateIda($fechaEnvioDI);
		$fechaEnvioRT = $this->formatDateIda($fechaEnvioRT);
		$fechaDictamen = $this->formatDateIda($fechaDictamen);
		$reclamoVence = $this->formatDateIda($reclamoVence);
		include_once('Logica/Siniestro.php');
		$unSiniestro = new Siniestro($numPoliza, $apellido, $nombre, $dominio, $conductor, $terceroUno, $dominioUno, $conductorUno, $terceroDos, $dominioDos, $conductorDos, $fechaSiniestro, $fechaDenunciaInterna, $exposicionPolicial, $fotocopiaDni, $fotocopiaCV, $fotocopiaCC, $fotocopiaVTV, $fotosAsegurado, $otros, $fechaReclamoTercero, $exposicionPolicialTercero, $fotocopiaCVTercero, $boletoCompra, $fotocopiaCCTercero, $certificadoCobertura, $denunciaAdministrativa, $fotosCantTercero, $presupuesto, $presupuestoDos, $totalPresupuesto, $gastosMedicos, $informeMedico, $fechaEnvioDI, $fechaEnvioRT, $fechaDictamen, $dictamen, $ofrecimiento, $reclamoVence);
		
		return $this->controladoraP->altaSiniestro($unSiniestro);
	}

	public function bajaSiniestro($id){
		return $this->controladoraP->bajaSiniestro($id);
	}

	public function modificarSiniestro($id, $numPoliza, $apellido, $nombre, $dominio, $conductor, $terceroUno, $dominioUno, $conductorUno, $terceroDos, $dominioDos, $conductorDos, $fechaSiniestro, $fechaDenunciaInterna, $exposicionPolicial, $fotocopiaDni, $fotocopiaCV, $fotocopiaCC, $fotocopiaVTV, $fotosAsegurado, $otros, $fechaReclamoTercero, $exposicionPolicialTercero, $fotocopiaCVTercero, $boletoCompra, $fotocopiaCCTercero, $certificadoCobertura, $denunciaAdministrativa, $fotosCantTercero, $presupuesto, $presupuestoDos, $totalPresupuesto, $gastosMedicos, $informeMedico, $fechaEnvioDI, $fechaEnvioRT, $fechaDictamen, $dictamen, $ofrecimiento, $reclamoVence){
		$fechaSiniestro = $this->formatDateIda($fechaSiniestro);
		$fechaDenunciaInterna = $this->formatDateIda($fechaDenunciaInterna);
		$fechaReclamoTercero = $this->formatDateIda($fechaReclamoTercero);
		$fechaEnvioDI = $this->formatDateIda($fechaEnvioDI);
		$fechaEnvioRT = $this->formatDateIda($fechaEnvioRT);
		$fechaDictamen = $this->formatDateIda($fechaDictamen);
		$reclamoVence = $this->formatDateIda($reclamoVence);
		include_once('Logica/Siniestro.php');
		$unSiniestro = new Siniestro($numPoliza, $apellido, $nombre, $dominio, $conductor, $terceroUno, $dominioUno, $conductorUno, $terceroDos, $dominioDos, $conductorDos, $fechaSiniestro, $fechaDenunciaInterna, $exposicionPolicial, $fotocopiaDni, $fotocopiaCV, $fotocopiaCC, $fotocopiaVTV, $fotosAsegurado, $otros, $fechaReclamoTercero, $exposicionPolicialTercero, $fotocopiaCVTercero, $boletoCompra, $fotocopiaCCTercero, $certificadoCobertura, $denunciaAdministrativa, $fotosCantTercero, $presupuesto, $presupuestoDos, $totalPresupuesto, $gastosMedicos, $informeMedico, $fechaEnvioDI, $fechaEnvioRT, $fechaDictamen, $dictamen, $ofrecimiento, $reclamoVence);

		foreach($unSiniestro as $siniestro => $valor) {
		    if($valor == "NO"){
				$valor = "0";
			}else if($valor == "SI"){
				$valor = "1";
			}
		}

		return $this->controladoraP->modificarSiniestro($id, $unSiniestro);
	}

	public function obtenerTablaSiniestro($valor){
		return $this->controladoraP->obtenerTablaSiniestro($valor);
	}

	public function obtenerSiniestro($valor){
		$i = 1;
		$array = $this->controladoraP->obtenerSiniestro($valor);
		$cont = count($array,1);

		while($i < $cont){
			if($array[$i] == "0"){
				$array[$i] = "NO";
			}else if($array[$i] == "1"){
				$array[$i] = "SI";
			}
			$i++;
		}

		return $array;
	}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		IMPRESION
------------------------------------------------------------------------------------------------------------------------------------------------------------------*/	
	public function obtenerDatosCertificado($valor){
		return $this->controladoraP->obtenerDatosCertificado($valor);
	}

	public function obtenerImpresion($valor){
		return $this->controladoraP->obtenerImpresion($valor);
	}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		PEDIDO
------------------------------------------------------------------------------------------------------------------------------------------------------------------*/	
	public function obtenerPedidos(){
		return $this->controladoraP->obtenerPedidos();
	}

	public function obtenerPedidosSegunPrivilegio($idProductor){
		return $this->controladoraP->obtenerPedidosSegunPrivilegio($idProductor);
	}

	public function obtenerPedidoConApellido($valor){
		return $this->controladoraP->obtenerPedidoConApellido($valor);
	}

	public function obtenerPedidoConDominio($valor){
		return $this->controladoraP->obtenerPedidoConDominio($valor);
	}

	public function notificaciones($cant){
		return $this->controladoraP->notificaciones($cant);
	}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		PRODUCTOR
------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function altaProductor($dni, $apellido, $nombre, $direccion, $telefono, $privilegio){
		include_once('Logica/Productor.php');

		$unProductor = new Productor($dni, $apellido, $nombre, $direccion, $telefono, $privilegio);
		
		return $this->controladoraP->altaProductor($unProductor);
	}

	public function bajaProductor($id){
		return $this->controladoraP->bajaProductor($id);
	}

	public function modificarProductor($id, $dni, $apellido, $nombre, $direccion, $telefono, $privilegio){
		include_once('Logica/Productor.php');
		$unProductor = new Productor($dni, $apellido, $nombre, $direccion, $telefono, $privilegio);

		return $this->controladoraP->modificarProductor($id, $unProductor);
	}

	public function obtenerProductorApellido($apellido){
		return $this->controladoraP->obtenerProductorApellido($apellido);
	}

/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------
																		OTROS
------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function altaCompSeguro($nombre){
		return $this->controladoraP->altaCompSeguro($nombre);
	}

	public function obtenerCompaniaSeguro($nombre){
		return $this->controladoraP->obtenerCompaniaSeguro($nombre);
	}

	public function obtenerCompaniasSeguros(){
		return $this->controladoraP->obtenerCompaniasSeguros(); 
	}

	public function altaCategoria($nombre){
		return $this->controladoraP->altaCategoria($nombre);
	}

	public function obtenerCategoria($nombre){
		return $this->controladoraP->obtenerCategoria($nombre);
	}

	public function obtenerCategorias(){
		return $this->controladoraP->obtenerCategorias(); 
	}

	public function altaCobertura($nombre, $compania){
		return $this->controladoraP->altaCobertura($nombre, $compania);
	}

	public function obtenerCobertura($nombre){
		return $this->controladoraP->obtenerCobertura($nombre);
	}

	public function obtenerCoberturas(){
		return $this->controladoraP->obtenerCoberturas(); 
	}


	public function altaMarca($nombre){
		return $this->controladoraP->altaMarca($nombre);
	}

	public function obtenerMarca($nombre){
		return $this->controladoraP->obtenerMarca($nombre);
	}

	public function obtenerMarcas(){
		return $this->controladoraP->obtenerMarcas(); 
	}

	public function altaCarroceria($nombre){
		return $this->controladoraP->altaCarroceria($nombre);
	}

	public function obtenerCarroceria($nombre){
		return $this->controladoraP->obtenerCarroceria($nombre);
	}

	public function obtenerCarrocerias(){
		return $this->controladoraP->obtenerCarrocerias(); 
	}

	public function altaModelo($nombre, $marca, $carroceria){
		return $this->controladoraP->altaModelo($nombre, $marca, $carroceria);
	}

	public function obtenerModelo($nombre){
		return $this->controladoraP->obtenerModelo($nombre);
	}

	public function obtenerModelos(){
		return $this->controladoraP->obtenerModelos(); 
	}

}
?>
