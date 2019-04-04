<?PHP
class ControladoraV{
	private $controladoraL;

	public function controladoraV(){
		include('Logica/ControladoraL.php');
		$this->controladoraL = new ControladoraL();
	}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------------
														VENTANAS Y BUSCADORES
------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function armarVentana($titulo, $valor, $ventana){
		$hayBusqueda = true;
		$menu = $this->load_template();
		ob_start();

		switch($ventana){
			case 0:	//PARA INICIO
				$pagoBusqueda = false;
				$url = 'Visual/Buscadores/buscadorInicio.php';
				$urlInclude = 'Visual/vacio.php';
				if(isset($_POST['btnBuscarInicio'])){
					if($titulo == 'apellido'){
						$arrayTabla = $this->controladoraL->obtenerDominioClientes($valor);
						if(empty($arrayTabla)){
							$hayBusqueda = false;
						}
						$urlInclude = 'Visual/Tablas/tablaInicio.php';
					}else{
						$clienteBusqueda = $this->controladoraL->buscarInicio($valor);
						if($clienteBusqueda[6]){
							$pagoBusqueda = $this->controladoraL->buscarPago($clienteBusqueda[6]);
						}else{
							$pagoBusqueda = null;
						}
						$urlInclude = 'Visual/mostrarResultado.php';
					}
					
				}else if(isset($_POST['ver'])){
					$clienteBusqueda = $this->controladoraL->buscarInicio($valor);
					
					if($clienteBusqueda[6] != NULL){
						$pagoBusqueda = $this->controladoraL->buscarPago($clienteBusqueda[6]);
					}
					$urlInclude = 'Visual/mostrarResultado.php';
				}
				break;
			case 1:	//PARA CLIENTE
				$url = 'Visual/Buscadores/buscadorCliente.php';
				$arrayTabla = $this->controladoraL->obtenerClientes();
				//
				$arrayProductor = $this->controladoraL->obtenerTodoDe('Productor');
				if($titulo == 'Cargar Tabla Cliente'){
					$arrayTabla = $this->controladoraL->obtenerClienteApellido($valor);
					if(empty($arrayTabla)){
						//$arrayTabla = $this->controladoraL->obtenerTodoDe('Cliente');
						$arrayTabla = $this->controladoraL->obtenerClientes();
						$hayBusqueda = false;
					}
					$urlInclude = 'Visual/Formularios/formCliente.php';
				}else if($titulo == 'Editar Cliente'){
					$arrayTabla = $this->controladoraL->obtenerClienteProductor($valor);
					$urlInclude = 'Visual/Formularios/formClienteCargado.php';
				}else{
					$urlInclude = 'Visual/Formularios/formCliente.php';
				}
				break;
			case 2:	//PARA VEHICULO
				$var = 'Vehiculo';
				$url = 'Visual/Buscadores/buscadorVehiculo.php';
				$arrayTabla = $this->controladoraL->obtenerTodoDe('Vehiculo');
				//var_dump($arrayTabla);
				$arrayPropietario = $this->controladoraL->obtenerTodoDe('Cliente');
				$arrayCarroceria = $this->controladoraL->obtenerTodoDe('Carroceria');
				$arrayMarca = $this->controladoraL->obtenerTodoDe('Marca');
				$arrayModelo = $this->controladoraL->obtenerTodoDe('Modelo');
				if($titulo == 'Cargar Tabla Vehiculo'){
					$arrayTabla = $this->controladoraL->obtenerTablaBuscador($valor);
					if(empty($arrayTabla)){
						$arrayTabla = $this->controladoraL->obtenerVehiculoCliente();
						$hayBusqueda = false;
					}
					$urlInclude = 'Visual/Formularios/formVehiculo.php';
				}else if($titulo == 'Accion Vehiculo'){
					$arrayTabla = $this->controladoraL->obtenerTablaVehiculoCliente($valor);
					$arrayVehiculo = $this->controladoraL->obtenerVehiculo($valor);
					if(empty($arrayTabla)){
						$arrayTabla = $this->controladoraL->obtenerTodoDe('Vehiculo');
					}
					$urlInclude = 'Visual/Formularios/formVehiculoCargado.php';
				}else{
					$urlInclude = 'Visual/Formularios/formVehiculo.php';
				}
				break;
			case 4:	//PARA POLIZA
				$url = 'Visual/Buscadores/buscadorPoliza.php';
				$arrayTabla = $this->controladoraL->obtenerTodoDe('Poliza'); // Esta función hace que pase todas las fechas de todas las pólizas en el bucle de formatDateVuelta..(Cambiar de lugar?)
				$arrayCategoria = $this->controladoraL->obtenerTodoDe('Categoria');
				$arrayCobertura = $this->controladoraL->obtenerTodoDe('Cobertura');
				$arrayCompSeguro = $this->controladoraL->obtenerTodoDe('CompaniaSeguro');
				if($titulo == 'Cargar Tabla Poliza'){
					$arrayTabla = $this->controladoraL->obtenerPoliza($valor);
					if(empty($arrayTabla)){
						$arrayTabla = $this->controladoraL->obtenerTodoDe('Poliza');
						$hayBusqueda = false;
					}
					$urlInclude = 'Visual/Formularios/formPoliza.php';
				}else if($titulo == 'Accion Poliza'){
					$arrayTabla = $this->controladoraL->obtenerPolizaMod($valor);
					
					$arrayVehiculos = $this->controladoraL->obtenerTodoDe('Vehiculo');
					$urlInclude = 'Visual/Formularios/formPolizaCargado.php';
				}else{
					$arrayVehiculos = $this->controladoraL->obtenerVehiculosSinPoliza();
					if(empty($arrayVehiculos)){
						$arrayVehiculos = $this->controladoraL->obtenerTodoDe('Vehiculo');
					}
					$urlInclude = 'Visual/Formularios/formPoliza.php';
				}
				break;
			case 5:	//PARA PAGO
				$url = 'Visual/Buscadores/buscadorPago.php';
				$arrayTabla = $this->controladoraL->obtenerPagos();
				$arrayPoliza = $this->controladoraL->obtenerPolizaConIdDominio();
				if($titulo == 'Cargar Tabla Pago'){
					$arrayTabla = $this->controladoraL->buscadorPago($valor);
					if(empty($arrayTabla)){
						$arrayTabla = $this->controladoraL->obtenerPagos();
						$hayBusqueda = false;
					}
					$urlInclude = 'Visual/Formularios/formPago.php';
				}else if($titulo == 'Accion Pago'){
					$arrayTabla = $this->controladoraL->obtenerPago($valor);
					$arrayPoliza = $this->controladoraL->obtenerPolizaConIdDominio();
					$urlInclude = ('Visual/Formularios/formPagoCargado.php');
				}else{
					$urlInclude = 'Visual/Formularios/formPago.php';
				}
				break;
			case 6:	//PARA SINIESTRO
				$var = 'Siniestro';
				$url = 'Visual/Buscadores/buscadorSiniestro.php';
				$urlInclude = 'Visual/Formularios/formSiniestro.php';
				if($titulo == 'apellido'){
					// CAMBIAR EL NOMBRE DE SINIESTROBUSQUEDA -> ARRAYTABLA
					$siniestroBusqueda = $this->controladoraL->obtenerTablaSiniestro($valor);
					if(empty($arrayTabla)){
						$arrayTabla = $this->controladoraL->obtenerTodoDe($var);
						$hayBusqueda = false;
					}
					$urlInclude = 'Visual/Tablas/tablaSiniestro.php';
				}else if($titulo == 'dominio'){
					$siniestroBusqueda = $this->controladoraL->obtenerSiniestro($valor);
					$urlInclude = 'Visual/Formularios/formSiniestroCargado.php';
				}
				break;
			case 7:	//PARA IMPRESION CERTIFICADO
				$url = 'Visual/Buscadores/buscadorCertificado.php';
				ob_end_clean(); // HACE MAGIA, SI TENES ALGUN ERROR MANDALE OB_END_CLEAN();
				if($valor != null){
					if(isset($_POST['btnDescargar'])){
						$accion = 'D';
						include_once('Visual/Reportes/certificado.php');
					}else if(isset($_POST['btnVer'])){
						$accion = 'I';
						include_once('Visual/Reportes/certificado.php');
					}
					$certificadoCliente = $this->controladoraL->obtenerDatosCertificado($valor);
					$urlInclude = 'Visual/Tablas/tablaCertificado.php';
				}else{
					$urlInclude = 'Visual/vacio.php';
				}
				break;
			case 8:	//PARA IMPRESION CARNET
				$url = 'Visual/Buscadores/buscadorCarnet.php';
				ob_end_clean();
				if($valor != null){
					if(isset($_POST['btnDescargar'])){
						$accion = 'D';
						include_once('Visual/Reportes/cartProv.php');
					}else if(isset($_POST['btnVer'])){
						$accion = 'I';
						include_once('Visual/Reportes/cartProv.php');
					}
					$carnetCliente = $this->controladoraL->obtenerDatosCertificado($valor);
					$urlInclude = 'Visual/Tablas/tablaCarnet.php';
				}else{
					$urlInclude = 'Visual/vacio.php';
				}
				break;
			case 9:	//PARA PEDIDOS
				$url = 'Visual/Buscadores/buscadorPedidos.php';
				if($_SESSION['privilegio'] == 1){
					$arrayPedidos = $this->controladoraL->obtenerPedidosSegunPrivilegio($_SESSION['id']);
				}else{
					$arrayPedidos = $this->controladoraL->obtenerPedidos();
				}
				
				$urlInclude = 'Visual/Tablas/tablaPedidos.php';
				//$arrayPedidos = $this->controladoraL->obtenerPedidos(); //todos los numPoliza, apellido nombre y dominio
				
				if($valor != null){
					if($titulo == 'apellido'){
						$arrayPedidos = $this->controladoraL->obtenerPedidoConApellido($valor); // numPoliza, apellido nombre y dominio segun apellido
					}else{
						$arrayPedidos = $this->controladoraL->obtenerPedidoConDominio($valor); // numPoliza, apellido nombre y dominio segun dominio
					}
				}
				break;
			case 10:	//PARA PRODUCTOR
				$url = 'Visual/Buscadores/buscadorProductor.php';
				$arrayTabla = $this->controladoraL->obtenerTodoDe('Productor');
				if($titulo == 'Cargar Tabla Productor'){
					$arrayTabla = $this->controladoraL->obtenerProductorApellido($valor);
					if(empty($arrayTabla)){
						$arrayTabla = $this->controladoraL->obtenerTodoDe('Productor');
						$hayBusqueda = false;
					}
					$urlInclude = 'Visual/Formularios/formProductor.php';
				}else if($titulo == 'Accion Productor'){
					$arrayTabla = $this->controladoraL->obtenerDe('Productor','id',$valor);
					$urlInclude = 'Visual/Formularios/formProductorCargado.php';
				}else{
					$urlInclude = 'Visual/Formularios/formProductor.php';
				}
				break;
			case 11:	//PARA OTROS
				$url = 'Visual/vacio.php';
				$arrayCompania = $this->controladoraL->obtenerCompaniasSeguros();
				$arrayCarroceria = $this->controladoraL->obtenerCarrocerias();
				$arrayMarca = $this->controladoraL->obtenerMarcas();
				$urlInclude = 'Visual/Formularios/formOtros.php';
				break;
			case 12:
				$urlInclude = 'login.php';
				break;
			default:
				$urlInclude = '';
				break;
		}
		
		include_once($urlInclude);
		
		if($titulo != 'Sesion'){
			$buscador = $this->load_page($url);
			$respuesta = ob_get_clean();
			$pagina = $this->replace_content('/\#CONTENIDO\#/ms', $buscador.$respuesta, $menu);
			$this->view_page($pagina);
		}

		include("Visual/Template/ocultar.php");

	}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		TEMPLATE
------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function load_template(){
		$pagina = $this->load_page('Visual/Template/inicio.php');
		$menu = $this->load_page('Visual/Template/menu.php');
		$pagina = $this->replace_content('/\#MENU\#/ms', $menu, $pagina);

		return $pagina;
	}

	private function load_page($page){
		return file_get_contents($page);
	}

	private function view_page($html){
		echo $html;
	}

	private function replace_content($in='/\#CONTENIDO\#/ms', $out, $pagina){
		return preg_replace($in, $out, $pagina);	 	
	}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		GENERAL
------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function login($usuario, $password){
		return $this->controladoraL->login($usuario, $password);
	}

	public function notificaciones($cant){
		return $this->controladoraL->notificaciones($cant);
	}

	public function bajaDe($entidad,$col,$valor){
		return $this->controladoraL->bajaDe($entidad,$col,$valor);
	}

	public function obtenerDe($entidad,$col,$valor){
		return $this->controladoraL->obtenerDe($entidad,$col,$valor);
	}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		CLIENTE
------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function altaCliente($dni, $apellido, $nombre, $fechaNac, $direccion, $ciudad, $provincia, $cuit, $telefono, $fechaBaja, $estadoCivil, $productor){
		$apellido = mb_strtoupper($apellido);
		$nombre = mb_strtoupper($nombre);
		$direccion = mb_strtoupper($direccion);
		$ciudad = mb_strtoupper($ciudad);
		$provincia = mb_strtoupper($provincia);
		$estadoCivil = mb_strtoupper($estadoCivil);
		
		return $this->controladoraL->altaCliente($dni, $apellido, $nombre, $fechaNac, $direccion, $ciudad, $provincia, $cuit, $telefono, $fechaBaja, $estadoCivil, $productor);
	}

	public function modificarCliente($id, $dni, $apellido, $nombre, $fechaNac, $direccion, $ciudad, $provincia, $cuit, $telefono, $fechaBaja, $estadoCivil, $productor){
		$apellido = mb_strtoupper($apellido);
		$nombre = mb_strtoupper($nombre);
		$direccion = mb_strtoupper($direccion);
		$ciudad = mb_strtoupper($ciudad);
		$provincia = mb_strtoupper($provincia);
		$estadoCivil = mb_strtoupper($estadoCivil);

		return $this->controladoraL->modificarCliente($id, $dni, $apellido, $nombre, $fechaNac, $direccion, $ciudad, $provincia, $cuit, $telefono, $fechaBaja, $estadoCivil, $productor);
	}

	public function obtenerIdCliente($dniCliente){
		return $this->controladoraL->obtenerIdCliente($dniCliente);
	}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		VEHICULO
------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function altaVehiculo($dominio, $marca, $modelo, $anio, $chasis, $motor, $valor, $cliente, $tipoVehiculo){
		//$confirmarCarpeta = $this->controladoraL->verificarCarpeta($parametro1,$parametro2); // METODO PARA CREAR O VERIFICAR CARPETA PARA IMAGENES DE VEHICULOS
		$dominio = mb_strtoupper($dominio);
		$marca = mb_strtoupper($marca);
		$modelo = mb_strtoupper($modelo);
		$chasis = mb_strtoupper($chasis);
		$motor = mb_strtoupper($motor);

		return $this->controladoraL->altaVehiculo($dominio, $marca, $modelo, $anio, $chasis, $motor, $valor, $cliente, $tipoVehiculo);
	}

	public function modificarVehiculo($id, $dominio, $marca, $modelo, $anio, $chasis, $motor, $valor, $cliente, $tipoVehiculo){
		$dominio = mb_strtoupper($dominio);
		$marca = mb_strtoupper($marca);
		$modelo = mb_strtoupper($modelo);
		$chasis = mb_strtoupper($chasis);
		$motor = mb_strtoupper($motor);

		return $this->controladoraL->modificarVehiculo($id, $dominio, $marca, $modelo, $anio, $chasis, $motor, $valor, $cliente, $tipoVehiculo);
	}

	public function obtenerModelosMarca($idMarca){
		return $arrayModelos = $this->controladoraL->obtenerModelosMarca($idMarca);
	}

	public function obtenerCarroceriaModelos($idModelo){
		return $arrayModelos = $this->controladoraL->obtenerCarroceriaModelos($idModelo);
	}

	public function obtenerIdVehiculo($dominio){
		return $this->controladoraL->obtenerIdVehiculo($dominio);
	}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		POLIZA
------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function altaPoliza($numPoliza, $vigenciaPedida, $vigenciaPedidaHasta, $vigenciaPoliza, $vigenciaPolizaHasta, $costoPoliza, $observaciones, $endoso, $estado, $sumaAsegurada, $numPolizaVida, $costoPolizaVida, $destino, $dominioVehiculo, $idCategoria, $idCobertura, $idCompSeguro){
		$numPoliza = mb_strtoupper($numPoliza);
		$observaciones = mb_strtoupper($observaciones);
		return $this->controladoraL->altaPoliza($numPoliza, $vigenciaPedida, $vigenciaPedidaHasta, $vigenciaPoliza, $vigenciaPolizaHasta, $costoPoliza, $observaciones, $endoso, $estado, $sumaAsegurada, $numPolizaVida, $costoPolizaVida, $destino, $dominioVehiculo, $idCategoria, $idCobertura, $idCompSeguro);
	}

	public function bajaPoliza($id){
		return $this->controladoraL->bajaPoliza($id);
	}

	public function modificarPoliza($id, $numPoliza, $vigenciaPedida, $vigenciaPedidaHasta, $vigenciaPoliza, $vigenciaPolizaHasta, $costoPoliza, $observaciones, $endoso, $estado, $sumaAsegurada, $numPolizaVida, $costoPolizaVida, $destino, $dominioVehiculo, $idCategoria, $idCobertura, $idCompSeguro){
		$numPoliza = mb_strtoupper($numPoliza);
		$observaciones = mb_strtoupper($observaciones);
		return $this->controladoraL->modificarPoliza($id, $numPoliza, $vigenciaPedida, $vigenciaPedidaHasta, $vigenciaPoliza, $vigenciaPolizaHasta, $costoPoliza, $observaciones, $endoso, $estado, $sumaAsegurada, $numPolizaVida, $costoPolizaVida, $destino, $dominioVehiculo, $idCategoria, $idCobertura, $idCompSeguro);
	}
	
	public function obtenerPoliza($id){
		return $this->controladoraL->obtenerPoliza($id);
	}

	public function obtenerPolizaDominio($idVehiculo){
		return $this->controladoraL->obtenerPolizaDominio($idVehiculo);
	}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		PAGO
------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function altaPago($numRecibo, $fecha, $importe, $numCuota, $importeGrua, $reciboGrua, $observaciones, $poliza){
		$observaciones = mb_strtoupper($observaciones);
		return $this->controladoraL->altaPago($numRecibo, $fecha, $importe, $numCuota, $importeGrua, $reciboGrua, $observaciones, $poliza);
	}

	public function bajaPago($numRecibo){
		return $this->controladoraL->bajaPago($numRecibo);
	}

	public function modificarPago($id, $numRecibo, $fecha, $importe, $numCuota, $importeGrua, $reciboGrua, $observaciones, $poliza){
		$observaciones = mb_strtoupper($observaciones);
		return $this->controladoraL->modificarPago($id, $numRecibo, $fecha, $importe, $numCuota, $importeGrua, $reciboGrua, $observaciones, $poliza);
	}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		SINIESTRO
------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function altaSiniestro($numPoliza, $apellido, $nombre, $dominio, $conductor, $terceroUno, $dominioUno, $conductorUno, $terceroDos, $dominioDos, $conductorDos, $fechaSiniestro, $fechaDenunciaInterna, $exposicionPolicial, $fotocopiaDni, $fotocopiaCV, $fotocopiaCC, $fotocopiaVTV, $fotosAsegurado, $otros, $fechaReclamoTercero, $exposicionPolicialTercero, $fotocopiaCVTercero, $boletoCompra, $fotocopiaCCTercero, $certificadoCobertura, $denunciaAdministrativa, $fotosCantTercero, $presupuesto, $presupuestoDos, $totalPresupuesto, $gastosMedicos, $informeMedico, $fechaEnvioDI, $fechaEnvioRT, $fechaDictamen, $dictamen, $ofrecimiento, $reclamoVence){
		$apellido = mb_strtoupper($apellido);
		$nombre = mb_strtoupper($nombre);
		$dominio = mb_strtoupper($dominio);
		$conductor = mb_strtoupper($conductor);
		$terceroUno = mb_strtoupper($terceroUno);
		$dominioUno = mb_strtoupper($dominioUno);
		$conductorUno = mb_strtoupper($conductorUno);
		$terceroDos = mb_strtoupper($terceroDos);
		$dominioDos = mb_strtoupper($dominioDos);
		$conductorDos = mb_strtoupper($conductorDos);
		$dictamen = mb_strtoupper($dictamen);

		return $this->controladoraL->altaSiniestro($numPoliza, $apellido, $nombre, $dominio, $conductor, $terceroUno, $dominioUno, $conductorUno, $terceroDos, $dominioDos, $conductorDos, $fechaSiniestro, $fechaDenunciaInterna, $exposicionPolicial, $fotocopiaDni, $fotocopiaCV, $fotocopiaCC, $fotocopiaVTV, $fotosAsegurado, $otros, $fechaReclamoTercero, $exposicionPolicialTercero, $fotocopiaCVTercero, $boletoCompra, $fotocopiaCCTercero, $certificadoCobertura, $denunciaAdministrativa, $fotosCantTercero, $presupuesto, $presupuestoDos, $totalPresupuesto, $gastosMedicos, $informeMedico, $fechaEnvioDI, $fechaEnvioRT, $fechaDictamen, $dictamen, $ofrecimiento, $reclamoVence);
	}

	public function bajaSiniestro($id){
		return $this->controladoraL->bajaSiniestro($id);
	}

	public function modificarSiniestro($id, $numPoliza, $apellido, $nombre, $dominio, $conductor, $terceroUno, $dominioUno, $conductorUno, $terceroDos, $dominioDos, $conductorDos, $fechaSiniestro, $fechaDenunciaInterna, $exposicionPolicial, $fotocopiaDni, $fotocopiaCV, $fotocopiaCC, $fotocopiaVTV, $fotosAsegurado, $otros, $fechaReclamoTercero, $exposicionPolicialTercero, $fotocopiaCVTercero, $boletoCompra, $fotocopiaCCTercero, $certificadoCobertura, $denunciaAdministrativa, $fotosCantTercero, $presupuesto, $presupuestoDos, $totalPresupuesto, $gastosMedicos, $informeMedico, $fechaEnvioDI, $fechaEnvioRT, $fechaDictamen, $dictamen, $ofrecimiento, $reclamoVence){
		return $this->controladoraL->modificarSiniestro($id, $numPoliza, $apellido, $nombre, $dominio, $conductor, $terceroUno, $dominioUno, $conductorUno, $terceroDos, $dominioDos, $conductorDos, $fechaSiniestro, $fechaDenunciaInterna, $exposicionPolicial, $fotocopiaDni, $fotocopiaCV, $fotocopiaCC, $fotocopiaVTV, $fotosAsegurado, $otros, $fechaReclamoTercero, $exposicionPolicialTercero, $fotocopiaCVTercero, $boletoCompra, $fotocopiaCCTercero, $certificadoCobertura, $denunciaAdministrativa, $fotosCantTercero, $presupuesto, $presupuestoDos, $totalPresupuesto, $gastosMedicos, $informeMedico, $fechaEnvioDI, $fechaEnvioRT, $fechaDictamen, $dictamen, $ofrecimiento, $reclamoVence);
	}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		IMPRESION
------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function obtenerImpresion($valor){
		return $this->controladoraP->obtenerImpresion($valor);
	}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		PRODUCTOR
------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function altaProductor($dni, $apellido, $nombre, $direccion, $telefono, $privilegio){
		$nombre = mb_strtoupper($nombre);
		$apellido = mb_strtoupper($apellido);
		$direccion = mb_strtoupper($direccion);
		return $this->controladoraL->altaProductor($dni, $apellido, $nombre, $direccion, $telefono, $privilegio);
	}

	public function bajaProductor($id){
		return $this->controladoraL->bajaProductor($id);
	}

	public function modificarProductor($id, $dni, $apellido, $nombre, $direccion, $telefono, $privilegio){
		$nombre = mb_strtoupper($nombre);
		$apellido = mb_strtoupper($apellido);
		$direccion = mb_strtoupper($direccion);
		return $this->controladoraL->modificarProductor($id, $dni, $apellido, $nombre, $direccion, $telefono, $privilegio);
	}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		OTROS
------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function altaCompSeguro($nombre){
		$nombre = mb_strtoupper($nombre);

		return $this->controladoraL->altaCompSeguro($nombre);
	}

	public function altaCategoria($nombre){
		$nombre = mb_strtoupper($nombre);

		return $this->controladoraL->altaCategoria($nombre);
	}

	public function altaCobertura($nombre, $compania){
		$nombre = mb_strtoupper($nombre);

		return $this->controladoraL->altaCobertura($nombre, $compania);
	}

	public function obtenerCoberturaCompania($compSeguro){
		return $this->controladoraL->obtenerCoberturaCompania($compSeguro);
	}

	public function altaMarca($nombre){
		$nombre = mb_strtoupper($nombre);

		return $this->controladoraL->altaMarca($nombre);
	}

	public function altaCarroceria($nombre){
		$nombre = mb_strtoupper($nombre);

		return $this->controladoraL->altaCarroceria($nombre);
	}

	public function altaModelo($nombre, $marca, $carroceria){
		$nombre = mb_strtoupper($nombre);
		$marca = mb_strtoupper($marca);
		$carroceria = mb_strtoupper($carroceria);

		return $this->controladoraL->altaModelo($nombre, $marca, $carroceria);
	}

}
?>