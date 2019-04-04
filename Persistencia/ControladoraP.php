<?PHP
class ControladoraP{

	public function __construct(){
	}

/*---------------------------------------------------------------------------------------------------------------------------------------------
															GENERARL
-----------------------------------------------------------------------------------------------------------------------------------------------*/
	public function login($usuario, $password){
		include_once('Persistencia/Conexion.php');
		$bd = new MySQL();

		$sql = $bd->query("SELECT * FROM productor WHERE usuario = '".$usuario."' and dni = '".$password."';");

		if($bd->rows($sql) > 0){
			$usuario = $bd->recorrer($sql);
		}else{
			$usuario = null;
		}
		
		return $usuario;
	}

	public function bajaDe($entidad,$col,$valor){
		include_once('Persistencia/JPACompartida.php');
		$this->JPACompartida = new JPACompartida();

		return $this->JPACompartida->bajaDe($entidad,$col,$valor);
	}

	public function obtenerTodoDe($entidad){
		include_once('Persistencia/JPACompartida.php');
		$this->JPACompartida = new JPACompartida();

		return $this->JPACompartida->obtenerTodoDe($entidad);
	}

	public function obtenerDe($entidad,$col,$valor){
		include_once('Persistencia/JPACompartida.php');
		$this->JPACompartida = new JPACompartida();

		return $this->JPACompartida->obtenerDe($entidad,$col,$valor);
	}
/*------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		INICIO
------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function buscarInicio($valor){
		include_once('Persistencia/Conexion.php');
		$bd = new MySQL();

		$sql = $bd->query("SELECT cl.apellido,cl.nombre,ve.dominio,po.estado,po.numPoliza,cl.id,po.id,ve.id FROM Poliza po INNER JOIN Vehiculo ve ON po.idVehiculo = ve.id INNER JOIN Cliente cl ON ve.idCliente = cl.id WHERE ve.dominio = '".$valor."';");

		$cant = $bd->rows($sql);
		
		if($bd->rows($sql) > 0){	// Si tiene poliza.
			$f = 0;
			while($consulta = $bd->recorrer($sql)){
				$datos = $consulta;
				$f++;
			}
		}else{
			$sql = $bd->query("SELECT cl.apellido,cl.nombre,ve.dominio,'--','SIN POLIZA',cl.id,null,ve.id FROM Vehiculo ve INNER JOIN Cliente cl ON ve.idCliente = cl.id WHERE ve.dominio = '".$valor."';");	
			$datos = $bd->recorrer($sql);
		}
		
		return $datos;
	}

	public function buscarPago($idPoliza){
		include_once('Persistencia/Conexion.php');
		$bd = new MySQL();
		$pago = array();

		$sql = $bd->query("SELECT * FROM Pago WHERE  idPoliza = '".$idPoliza."';");
		
		if($bd->rows($sql) > 0){
			while($algo = $bd->recorrer($sql)){
				$pago[] = $algo;
			}
		}else{
			$pago = null;
		}

		return $pago;
	}

	public function obtenerDominioClientes($apellido){
		include_once('Persistencia/JPAVehiculo.php');
		$this->JPAVehiculo = new JPAVehiculo();

		return $this->JPAVehiculo->obtenerDominioClientes($apellido);
	}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		CLIENTE
------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function altaCliente($unCliente){
		include_once('Persistencia/JPACliente.php');
		$this->JPACliente = new JPACliente();

		if($this->obtenerIdCliente($unCliente->getDni())){
			$res = 'El Cliente ya existe';
		}else{
			$res = $this->JPACliente->altaCliente($unCliente);
		}

		return $res;
	}

	public function modificarCliente($id, $unCliente){
		include_once('Persistencia/JPACliente.php');
		$this->JPACliente = new JPACliente();

		return $this->JPACliente->modificarCliente($id, $unCliente);
	}

	public function obtenerClientes(){
		include_once('Persistencia/JPACliente.php');
		$this->JPACliente = new JPACliente();

		return $this->JPACliente->obtenerClientes();
	}

	public function obtenerClienteApellido($apellido){
		include_once('Persistencia/JPACliente.php');
		$this->JPACliente = new JPACliente();

		return $this->JPACliente->obtenerClienteApellido($apellido);
	}

	public function obtenerClienteProductor($id){
		include_once('Persistencia/JPACliente.php');
		$this->JPACliente = new JPACliente();

		return $this->JPACliente->obtenerClienteProductor($id);
	}

	public function obtenerIdCliente($dniCliente){
		include_once('Persistencia/JPACliente.php');
		$this->JPACliente = new JPACliente();

		return $this->JPACliente->obtenerIdCliente($dniCliente);
	}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		VEHICULO
------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function altaVehiculo($unVehiculo){
		include_once('Persistencia/JPAVehiculo.php');
		$this->JPAVehiculo = new JPAVehiculo();

		if($this->obtenerIdVehiculo($unVehiculo->getDominio())){
			$res = 'El vehiculo ya existe';
		}else{
			$res = $this->JPAVehiculo->altaVehiculo($unVehiculo);
		}

		return $res;
	}

	public function modificarVehiculo($id, $unVehiculo){
		include_once('Persistencia/JPAVehiculo.php');
		$this->JPAVehiculo = new JPAVehiculo();

		return $this->JPAVehiculo->modificarVehiculo($id, $unVehiculo);
	}

	public function obtenerModelosMarca($idMarca){
		include_once('Persistencia/JPAOtros.php');
		$this->JPAOtros = new JPAOtros();

		return $this->JPAOtros->obtenerModelosMarca($idMarca);
	}

	public function obtenerCarroceriaModelos($idModelo){
		include_once('Persistencia/JPAOtros.php');
		$this->JPAOtros = new JPAOtros();

		return $this->JPAOtros->obtenerCarroceriaModelos($idModelo);
	}

	public function obtenerIdVehiculo($dominio){
		include_once('Persistencia/JPAVehiculo.php');
		$this->JPAVehiculo = new JPAVehiculo();

		return $this->JPAVehiculo->obtenerIdVehiculo($dominio);
	}

	public function obtenerTablaVehiculoCliente($id){
		include_once('Persistencia/JPAVehiculo.php');
		$this->JPAVehiculo = new JPAVehiculo();

		return $this->JPAVehiculo->obtenerTablaVehiculoCliente($id);
	}
	// Cargar Tabla através del buscador.
	public function obtenerTablaBuscador($dominio){
		include_once('Persistencia/JPAVehiculo.php');
		$this->JPAVehiculo = new JPAVehiculo();

		return $this->JPAVehiculo->obtenerTablaBuscador($dominio);
	}

	public function obtenerVehiculoCliente(){
		include_once('Persistencia/JPAVehiculo.php');
		$this->JPAVehiculo = new JPAVehiculo();

		return $this->JPAVehiculo->obtenerVehiculoCliente();
	}

	public function obtenerVehiculo($id){
		include_once('Persistencia/JPAVehiculo.php');
		$this->JPAVehiculo = new JPAVehiculo();

		return $this->JPAVehiculo->obtenerVehiculo($id);
	}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		POLIZA
------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function altaPoliza($unaPoliza){
		include_once('Persistencia/JPAPoliza.php');
		$this->JPAPoliza = new JPAPoliza();
		$res = $this->JPAPoliza->altaPoliza($unaPoliza);

		return $res;
	}

	public function bajaPoliza($id){
		include_once('Persistencia/JPAPoliza.php');
		$this->JPAPoliza = new JPAPoliza();

		return $this->JPAPoliza->bajaPoliza($id);
	}

	public function modificarPoliza($id, $unaPoliza){
		include_once('Persistencia/JPAPoliza.php');
		$this->JPAPoliza = new JPAPoliza();

		return $this->JPAPoliza->modificarPoliza($id, $unaPoliza);
	}

	public function obtenerPoliza($numPoliza){
		include_once('Persistencia/JPAPoliza.php');
		$this->JPAPoliza = new JPAPoliza();

		return $this->JPAPoliza->obtenerPoliza($numPoliza);
	}	

	////////////////////////////////////// ----> LO NUEVO

	public function obtenerTodoDePoliza(){
		include_once('Persistencia/JPAPoliza.php');
		$this->JPAPoliza = new JPAPoliza();
		
		return $this->JPAPoliza->obtenerTodoDePoliza();
	}

	////////////////////////////////////// ----> FIN LO NUEVO

	public function obtenerPolizaMod($id){
		include_once('Persistencia/JPAPoliza.php');
		$this->JPAPoliza = new JPAPoliza();

		return $this->JPAPoliza->obtenerPolizaMod($id);
	}

	public function obtenerVehiculosSinPoliza(){
		include_once('Persistencia/JPAPoliza.php');
		$this->JPAPoliza = new JPAPoliza();

		return $this->JPAPoliza->obtenerVehiculosSinPoliza();
	}

	public function obtenerPolizaDominio($valor){
		include_once('Persistencia/JPAPoliza.php');
		$this->JPAPoliza = new JPAPoliza();

		return $this->JPAPoliza->obtenerPolizaDominio($valor);
	}

	public function obtenerCoberturaCompania($compSeguro){
		include_once('Persistencia/JPAOtros.php');
		$this->JPAOtros = new JPAOtros();

		return $this->JPAOtros->obtenerCoberturaCompania($compSeguro);
	}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		PAGO
------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function altaPago($unPago){
		include_once('Persistencia/JPAPago.php');
		$this->JPAPago = new JPAPago();
		$existePago = $this->obtenerDe('Pago', 'numRecibo', $unPago->getNumRecibo());

		if($existePago){
			$res = 'El Pago ya existe';
		}else{
			$res = $this->JPAPago->altaPago($unPago);
		}

		return $res;
	}

	public function bajaPago($id){
		include_once('Persistencia/JPAPago.php');
		$this->JPAPago = new JPAPago();

		return $this->JPAPago->bajaPago($id);
	}

	public function modificarPago($id, $unPago){
		include_once('Persistencia/JPAPago.php');
		$this->JPAPago = new JPAPago();

		return $this->JPAPago->modificarPago($id, $unPago);
	}

	public function obtenerPagos(){
		include_once('Persistencia/JPAPago.php');
		$this->JPAPago = new JPAPago();

		return $this->JPAPago->obtenerPagos(); 
	}

	public function obtenerPolizaConIdDominio(){
		include_once('Persistencia/JPAPago.php');
		$this->JPAPago = new JPAPago();

		return $this->JPAPago->obtenerPolizaConIdDominio();
	}

	public function buscadorPago($numRecibo){
		include_once('Persistencia/JPAPago.php');
		$this->JPAPago = new JPAPago();

		return $this->JPAPago->buscadorPago($numRecibo);
	}
	
	public function obtenerPago($idPago){
		include_once('Persistencia/JPAPago.php');
		$this->JPAPago = new JPAPago();

		return $this->JPAPago->obtenerPago($idPago);
	}

	public function obtenerUltimosPagos($id){
		include_once('Persistencia/JPAPago.php');
		$this->JPAPago = new JPAPago();

		return $this->JPAPago->obtenerUltimosPagos($id);
	}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		SINIESTRO
------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function altaSiniestro($unSiniestro){
		include_once('Persistencia/JPASiniestro.php');
		$this->JPASiniestro = new JPASiniestro();

		return $this->JPASiniestro->altaSiniestro($unSiniestro);
	}

	public function bajaSiniestro($id){
		include_once('Persistencia/JPASiniestro.php');
		$this->JPASiniestro = new JPASiniestro();

		return $this->JPASiniestro->bajaSiniestro($id);
	}

	public function modificarSiniestro($id,$unSiniestro){
		include_once('Persistencia/JPASiniestro.php');
		$this->JPASiniestro = new JPASiniestro();

		return $this->JPASiniestro->modificarSiniestro($id,$unSiniestro);
	}

	public function obtenerTablaSiniestro($valor){
		include_once('Persistencia/JPASiniestro.php');
		$this->JPASiniestro = new JPASiniestro();

		return $this->JPASiniestro->obtenerTablaSiniestro($valor);
	}

	public function obtenerSiniestro($dominio){
		include_once('Persistencia/JPASiniestro.php');
		$this->JPASiniestro = new JPASiniestro();

		return $this->JPASiniestro->obtenerSiniestro($dominio);
	}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		IMPRESION
------------------------------------------------------------------------------------------------------------------------------------------------------------------*/	
	public function obtenerDatosCertificado($valor){
		include_once('Persistencia/Conexion.php');
		$bd = new MySQL();
		$array = array();

		$sql = $bd->query("SELECT ve.dominio as dominio,cl.apellido as apellido,cl.nombre as nombre, ve.id FROM Vehiculo ve INNER JOIN Cliente cl ON ve.idCliente = cl.id WHERE ve.dominio = '".$valor."';");
		
		if($bd->rows($sql) > 0){
			$array = $bd->recorrer($sql);
		}else{
			$array = null;
		}

		return $array;
	}

	public function obtenerImpresion($dominio){
		include_once('Persistencia/Conexion.php');
		$bd = new MySQL();
		$array = array();

		$sql = $bd->query("SELECT cs.nombre,cl.nombre,cl.apellido,ma.nombre,mo.nombre,ve.anio,cl.direccion,cl.ciudad,ve.chasis,po.numPoliza,po.vigenciaPedida,po.vigenciaHasta,ve.dominio,ve.motor,CURDATE() FROM CompaniaSeguro cs INNER JOIN Poliza po ON cs.id = po.idCompSeguro INNER JOIN Vehiculo ve ON po.idVehiculo = ve.id INNER JOIN Cliente cl ON ve.idCliente = cl.id INNER JOIN Marca ma ON ve.idMarca = ma.id INNER JOIN Modelo mo ON ve.idModelo = mo.id WHERE ve.dominio = '".$dominio."';");

		if($bd->rows($sql) > 0){
			$array = $bd->recorrer($sql);
		}else{
			$array = null;
		}	

		return $array;
	}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		PEDIDO
------------------------------------------------------------------------------------------------------------------------------------------------------------------*/	
	public function obtenerPedidos(){
		include_once('Persistencia/Conexion.php');
		$bd = new MySQL();

		$sql = $bd->query("SELECT po.numPoliza, cl.apellido, cl.nombre, ve.dominio, po.id , pr.apellido, pr.nombre FROM Poliza po INNER JOIN Vehiculo ve ON ve.id = po.idVehiculo INNER JOIN Cliente cl ON cl.id = ve.idCliente INNER JOIN Productor pr ON pr.id = cl.idProductor WHERE po.numPoliza = 'E/E';");
		
		if($bd->rows($sql) > 0){
			while($algo = $bd->recorrer($sql)){
				$array[] = $algo;
			}
		}else{
			$array = null;
		}
		//$bd->liberarQuery($sql);

		return $array;
	}

	////////////////////////////////////////////////////////////
	public function obtenerPedidosSegunPrivilegio($idProductor){
		include_once('Persistencia/Conexion.php');
		$bd = new MySQL();

		$sql = $bd->query("SELECT po.numPoliza, cl.apellido, cl.nombre, ve.dominio, po.id, pr.apellido, pr.nombre FROM Poliza po INNER JOIN Vehiculo ve ON ve.id = po.idVehiculo INNER JOIN Cliente cl ON cl.id = ve.idCliente INNER JOIN Productor pr ON pr.id = cl.idProductor WHERE po.numPoliza = 'E/E' AND cl.idProductor = '".$idProductor."';");
		
		if($bd->rows($sql) > 0){
			while($algo = $bd->recorrer($sql)){
				$array[] = $algo;
			}
		}else{
			$array = null;
		}
		//$bd->liberarQuery($sql);

		return $array;
	}
	////////////////////////////////////////////////////////////
	
	public function obtenerPedidoConApellido($valor){
		include_once('Persistencia/Conexion.php');
		$bd = new MySQL();
		$array = null;

		$sql = $bd->query("SELECT po.numPoliza, cl.apellido, cl.nombre, ve.dominio, po.id, pr.apellido, pr.nombre FROM Poliza po INNER JOIN Vehiculo ve ON ve.id = po.idVehiculo INNER JOIN Cliente cl ON cl.id = ve.idCliente INNER JOIN Productor pr ON pr.id = cl.idProductor WHERE po.numPoliza = 'E/E' AND cl.apellido = '".$valor."';");

		if($bd->rows($sql) > 0){
			while($algo = $bd->recorrer($sql)){
				$array[] = $algo;
			}
		}else{
			$array = null;
		}

		//$bd->liberarQuery($sql);

		return $array;
	}

	public function obtenerPedidoConDominio($valor){
		include_once('Persistencia/Conexion.php');
		$bd = new MySQL();
		$array = null;

		$sql = $bd->query("SELECT po.numPoliza, cl.apellido, cl.nombre, ve.dominio, po.id, pr.apellido, pr.nombre FROM Poliza po INNER JOIN Vehiculo ve ON ve.id = po.idVehiculo INNER JOIN Cliente cl ON cl.id = ve.idCliente INNER JOIN Productor pr ON pr.id = cl.idProductor WHERE po.numPoliza = 'E/E' AND ve.dominio = '".$valor."';");

		if($bd->rows($sql) > 0){
			while($algo = $bd->recorrer($sql)){
				$array[] = $algo;
			}
		}else{
			$array = null;
		}

		var_dump($array);
		var_dump($valor);
		//$bd->liberarQuery($sql);

		return $array;
	}

	public function notificaciones($cant){
		include_once('Persistencia/Conexion.php');
		$bd = new MySQL();

		$sql = $bd->query("SELECT count(numPoliza) FROM Poliza WHERE numPoliza = 'E/E';");
		$cantBD = $bd->recorrer($sql);

		clearstatcache();
		ob_get_clean();

		return $cantBD[0];
	}

/*------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		PRODUCTOR
------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function altaProductor($unProductor){
		include_once('Persistencia/JPAProductor.php');
		$this->JPAProductor = new JPAProductor();
		$algo = $this->obtenerProductor($unProductor->getDni());
		if($this->obtenerProductor($unProductor->getDni())){
			$res = 'El Productor ya existe';
		}else{
			$res = $this->JPAProductor->altaProductor($unProductor);
		}

		return $res;
	}

	public function obtenerProductor($dni){
		include_once('Persistencia/JPAProductor.php');
		$this->JPAProductor = new JPAProductor();

		$res = $this->JPAProductor->obtenerProductor($dni);
		return $res;
	}

	public function bajaProductor($id){
		include_once('Persistencia/JPAProductor.php');
		$this->JPAProductor = new JPAProductor();

		return $this->JPAProductor->bajaProductor($id);
	}

	public function modificarProductor($id, $unProductor){
		include_once('Persistencia/JPAProductor.php');
		$this->JPAProductor = new JPAProductor();

		return $this->JPAProductor->modificarProductor($id, $unProductor);
	}

	public function obtenerProductorApellido($apellido){
		include_once('Persistencia/JPAProductor.php');
		$this->JPAProductor = new JPAProductor();

		return $this->JPAProductor->obtenerProductorApellido($apellido);
	}

/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		OTROS
-------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function altaCompSeguro($nombre){
		include_once('Persistencia/JPAOtros.php');
		$this->JPAOtros = new JPAOtros();

		if($this->obtenerCompaniaSeguro($nombre)){
			$res = 'La Compañia ya existe';
		}else{
			$res = $this->JPAOtros->altaCompSeguro($nombre);
		}

		return $res;
	}

	public function obtenerCompaniaSeguro($nombre){
		include_once('Persistencia/JPAOtros.php');
		$this->JPAOtros = new JPAOtros();

		return $this->JPAOtros->obtenerCompaniaSeguro($nombre);
	}

	public function obtenerCompaniasSeguros(){
		include_once('Persistencia/JPAOtros.php');
		$this->JPAOtros = new JPAOtros();

		return $this->JPAOtros->obtenerCompaniasSeguros();
	}

	public function altaCategoria($nombre){
		include_once('Persistencia/JPAOtros.php');
		$this->JPAOtros = new JPAOtros();

		if($this->obtenerCategoria($nombre)){
			$res = 'La Categoria ya existe';
		}else{
			$res = $this->JPAOtros->altaCategoria($nombre);
		}

		return $res;
	}

	public function obtenerCategoria($nombre){
		include_once('Persistencia/JPAOtros.php');
		$this->JPAOtros = new JPAOtros();

		return $this->JPAOtros->obtenerCategoria($nombre);
	}

	public function obtenerCategorias(){
		include_once('Persistencia/JPAOtros.php');
		$this->JPAOtros = new JPAOtros();

		return $this->JPAOtros->obtenerCategorias();
	}

	public function altaCobertura($nombre, $compania){
		include_once('Persistencia/JPAOtros.php');
		$this->JPAOtros = new JPAOtros();

		if($this->obtenerCobertura($nombre)){
			$res = 'La Cobertura ya existe';
		}else{
			$res = $this->JPAOtros->altaCobertura($nombre, $compania);
		}

		return $res;
	}

	public function obtenerCobertura($nombre){
		include_once('Persistencia/JPAOtros.php');
		$this->JPAOtros = new JPAOtros();

		return $this->JPAOtros->obtenerCobertura($nombre);
	}

	public function obtenerCoberturas(){
		include_once('Persistencia/JPAOtros.php');
		$this->JPAOtros = new JPAOtros();

		return $this->JPAOtros->obtenerCoberturas();
	}

	/*--------------------------------------------------------*/

	public function altaMarca($nombre){
		include_once('Persistencia/JPAOtros.php');
		$this->JPAOtros = new JPAOtros();

		if($this->obtenerMarca($nombre)){
			$res = 'La Marca ya existe';
		}else{
			$res = $this->JPAOtros->altaMarca($nombre);
		}

		return $res;
	}

	public function obtenerMarca($nombre){
		include_once('Persistencia/JPAOtros.php');
		$this->JPAOtros = new JPAOtros();

		return $this->JPAOtros->obtenerMarca($nombre);
	}

	public function obtenerMarcas(){
		include_once('Persistencia/JPAOtros.php');
		$this->JPAOtros = new JPAOtros();

		return $this->JPAOtros->obtenerMarcas(); 
	}

	public function altaCarroceria($nombre){
		include_once('Persistencia/JPAOtros.php');
		$this->JPAOtros = new JPAOtros();

		if($this->obtenerCarroceria($nombre)){
			$res = 'La Carroceri ya existe';
		}else{
			$res = $this->JPAOtros->altaCarroceria($nombre);
		}

		return $res;
	}

	public function obtenerCarroceria($nombre){
		include_once('Persistencia/JPAOtros.php');
		$this->JPAOtros = new JPAOtros();

		return $this->JPAOtros->obtenerCarroceria($nombre);
	}

	public function obtenerCarrocerias(){
		include_once('Persistencia/JPAOtros.php');
		$this->JPAOtros = new JPAOtros();

		return $this->JPAOtros->obtenerCarrocerias();
	}

	public function altaModelo($nombre, $marca, $carroceria){
		include_once('Persistencia/JPAOtros.php');
		$this->JPAOtros = new JPAOtros();
		
		$res = $this->JPAOtros->altaModelo($nombre, $marca, $carroceria);

		return $res;
	}

	public function obtenerModelo($nombre){
		include_once('Persistencia/JPAOtros.php');
		$this->JPAOtros = new JPAOtros();

		return $this->JPAOtros->obtenerModelo($nombre);
	}

	public function obtenerModelos(){
		include_once('Persistencia/JPAOtros.php');
		$this->JPAOtros = new JPAOtros();

		return $this->JPAOtros->obtenerModelos();
	}

}
?>
