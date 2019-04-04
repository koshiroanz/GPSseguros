<?PHP
class JPAPoliza{
	private $bd;

	public function JPAPoliza(){
		include_once('Persistencia/Conexion.php');
		$this->bd = new MySQL();
	}
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		ALTA
-------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function altaPoliza($Poliza){
		$numPoliza = $Poliza->getNumPoliza();
		$vigenciaPedida = $Poliza->getVigenciaPedida();
		$vigenciaPedidaHasta = $Poliza->getVigenciaPedidaHasta();
		$vigenciaPoliza = $Poliza->getVigenciaPoliza();
		$vigenciaPolizaHasta = $Poliza->getVigenciaPolizaHasta();
		$costoPoliza = $Poliza->getCostoPoliza();
		$observaciones = $Poliza->getObservaciones();
		$endoso = $Poliza->getEndoso();
		$estado = $Poliza->getEstado();
		$sumaAsegurada = $Poliza->getSumaAsegurada();
		$numPolizaVida = $Poliza->getNumPolizaVida();
		$costoPolizaVida = $Poliza->getCostoPolizaVida();
		$destino = $Poliza->getDestino();
		$idVehiculo = $Poliza->getVehiculo();
		$idCategoria = $Poliza->getCategoria();
		$idCobertura = $Poliza->getCobertura();
		$idCompSeguro = $Poliza->getCompSeguro();

		return $this->bd->query("INSERT INTO Poliza (id, numPoliza, vigenciaPedida, vigenciaPedidaHasta, vigenciaPoliza, vigenciaPolizaHasta, costoPoliza, observaciones, endoso, estado, sumaAsegurada, numPolizaVida, costoPolizaVida, destino, idVehiculo, idCategoria, idCobertura, idCompSeguro) VALUES ('','".$numPoliza."', '".$vigenciaPedida."', '".$vigenciaPedidaHasta."', '".$vigenciaPoliza."', '".$vigenciaPolizaHasta."', '".$costoPoliza."', '".$observaciones."', '".$endoso."', '".$estado."', '".$sumaAsegurada."', '".$numPolizaVida."', '".$costoPolizaVida."', '".$destino."', '".$idVehiculo."', '".$idCategoria."', '".$idCobertura."', '".$idCompSeguro."');");
	}
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		BAJA
-------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function bajaPoliza($id){
		return $this->bd->query("DELETE FROM Poliza WHERE id = '".$id."';");
	}
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		MODIFICACION
-------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function modificarPoliza($id, $Poliza){
		$numPoliza = $Poliza->getNumPoliza();
		$vigenciaPedida = $Poliza->getVigenciaPedida();
		$vigenciaPedidaHasta = $Poliza->getVigenciaPedidaHasta();
		$vigenciaPoliza = $Poliza->getVigenciaPoliza();
		$vigenciaPolizaHasta = $Poliza->getVigenciaPolizaHasta();
		$costoPoliza = $Poliza->getCostoPoliza();
		$observaciones = $Poliza->getObservaciones();
		$endoso = $Poliza->getEndoso();
		$estado = $Poliza->getEstado();
		$sumaAsegurada = $Poliza->getSumaAsegurada();
		$numPolizaVida = $Poliza->getNumPolizaVida();
		$costoPolizaVida = $Poliza->getCostoPolizaVida();
		$destino = $Poliza->getDestino();
		$idVehiculo = $Poliza->getVehiculo();
		$idCategoria = $Poliza->getCategoria();
		$idCobertura = $Poliza->getCobertura();
		$idCompSeguro = $Poliza->getCompSeguro();

		return $this->bd->query("UPDATE Poliza SET numPoliza = '".$numPoliza."', vigenciaPedida = '".$vigenciaPedida."', vigenciaPedidaHasta = '".$vigenciaPedidaHasta."', vigenciaPoliza = '".$vigenciaPoliza."', vigenciaPolizaHasta = '".$vigenciaPolizaHasta."', costoPoliza = '".$costoPoliza."', observaciones = '".$observaciones."', endoso = '".$endoso."', estado = '".$estado."', sumaAsegurada = '".$sumaAsegurada."', numPolizaVida = '".$numPolizaVida."', costoPolizaVida = '".$costoPolizaVida."', destino = '".$destino."', idVehiculo = '".$idVehiculo."', idCategoria = '".$idCategoria."', idCobertura = '".$idCobertura."', idCompSeguro = '".$idCompSeguro."'  WHERE id = '".$id."';");
	}
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		LECTURA
-------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function obtenerPoliza($numPoliza){
		$sql = $this->bd->query("SELECT po.*, ve.dominio, pr.apellido, pr.nombre FROM Poliza po INNER JOIN vehiculo ve ON po.idVehiculo = ve.id INNER JOIN Cliente cl ON cl.id = ve.idCliente INNER JOIN Productor pr ON pr.id = cl.idProductor WHERE po.numPoliza = '".$numPoliza."';");

		if($this->bd->rows($sql) > 0){ // Si $numPoliza = E/E. Trae una sola póliza con número E/E, implementar un bucle para solucionar..
			$poliza = $this->bd->recorrer($sql);
		}else{
			$poliza = null;
		}

		return $poliza;
	}

	////////////////////////////////////// ----> LO NUEVO

	public function obtenerTodoDePoliza(){
		if($_SESSION['id'] < 3){
			$consulta = "SELECT po.*,ve.dominio,pr.apellido,pr.nombre FROM poliza po INNER JOIN vehiculo ve ON po.idVehiculo = ve.id INNER JOIN cliente cl ON ve.idCliente = cl.id INNER JOIN Productor pr ON pr.id = cl.idProductor WHERE cl.idProductor = '".$_SESSION['id']."';";
		}else{
			$consulta = "SELECT po.*, ve.dominio, pr.apellido, pr.nombre FROM poliza po INNER JOIN vehiculo ve ON po.idVehiculo = ve.id INNER JOIN cliente cl ON ve.idCliente = cl.id INNER JOIN Productor pr ON pr.id = cl.idProductor;";
		}
		
		$sql = $this->bd->query($consulta);

		if($this->bd->rows($sql) > 0){
			while($algo = $this->bd->recorrer($sql)){
				$array[] = $algo;
			}
		}else{
			$array = null;
		}

		return $array;
	}

	////////////////////////////////////// ----> FIN LO NUEVO

	public function obtenerPolizaMod($id){
		$poliza = array();
		
		$sql = $this->bd->query("SELECT po.id, po.numPoliza, ve.dominio, po.vigenciaPedida, po.vigenciaPedidaHasta, po.vigenciaPoliza, po.vigenciaPolizaHasta, po.costoPoliza, po.observaciones, po.endoso, po.estado, po.sumaAsegurada, po.numPolizaVida, po.costoPolizaVida, po.destino, po.idVehiculo, po.idCategoria, ca.nombre as nomCat, po.idCobertura, co.nombre as nomCob, po.idCompSeguro, cs.nombre as nomComp , pr.apellido as proApellido, pr.nombre as proNombre 
			FROM Poliza po INNER JOIN Categoria ca ON po.idCategoria = ca.id INNER JOIN CompaniaSeguro cs ON po.idCompSeguro = cs.id INNER JOIN Cobertura co ON po.idCobertura = co.id INNER JOIN Vehiculo ve ON po.idVehiculo = ve.id INNER JOIN Cliente cl ON cl.id = ve.idCliente INNER JOIN Productor pr ON pr.id = cl.idProductor WHERE po.id = '".$id."';");

		if($this->bd->rows($sql) == 0){

			$sql = $this->bd->query("SELECT po.id, po.numPoliza, ve.dominio, po.vigenciaPedida, po.vigenciaPedidaHasta, po.vigenciaPoliza, po.vigenciaPolizaHasta, po.costoPoliza, po.observaciones, po.endoso, po.estado, po.sumaAsegurada, po.numPolizaVida, po.costoPolizaVida, po.destino, po.idVehiculo, po.idCategoria, ca.nombre as nomCat, po.idCobertura, co.nombre as nomCob, po.idCompSeguro, cs.nombre as nomComp , pr.apellido as proApellido, pr.nombre as proNombre FROM Poliza po INNER JOIN Categoria ca ON po.idCategoria = ca.id INNER JOIN CompaniaSeguro cs ON po.idCompSeguro = cs.id INNER JOIN Cobertura co ON po.idCobertura = co.id INNER JOIN Vehiculo ve ON po.idVehiculo = ve.id INNER JOIN Cliente cl ON cl.id = ve.idCliente INNER JOIN Productor pr ON pr.id = cl.idProductor WHERE po.numPoliza = '".$id."';");

		}

		if($this->bd->rows($sql) > 0){	
			$poliza = $this->bd->recorrer($sql);
		}
		
		return $poliza;
	}
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		Función personalizada
-------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function obtenerVehiculosSinPoliza(){
		$sql = $this->bd->query("SELECT id,dominio FROM vehiculo WHERE id NOT IN (SELECT idVehiculo FROM poliza);"); // Obtener id y dominio de VEHICULO 'donde' id NO ESTE en (Obtener idVehiculo de POLIZA)
		
		if($this->bd->rows($sql) > 0){
			while($poliza = $this->bd->recorrer($sql)){
				$array[] = $poliza;
			}
		}else{
			$array = null;
		}

		return $array;
	}

	public function obtenerPolizaDominio($idVehiculo){
		$sql = $this->bd->query("SELECT po.id,po.numPoliza,ve.dominio FROM Poliza po INNER JOIN Vehiculo ve ON po.idVehiculo = ve.id WHERE po.idVehiculo = '".$idVehiculo."';");
		
		if($this->bd->rows($sql) > 0){
			while($poliza = $this->bd->recorrer($sql)){
				$datosPoliza = $poliza;
			}
		}else{
			$datosPoliza = null;
		}
		
		return $datosPoliza;
	}
}
?>