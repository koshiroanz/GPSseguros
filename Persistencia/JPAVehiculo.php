<?PHP
class JPAVehiculo{
	private $bd;

	public function JPAVehiculo(){
		include_once('Persistencia/Conexion.php');
		$this->bd = new MySQL();
	}
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		ALTA
-------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function altaVehiculo($unVehiculo){
		$dominio = $unVehiculo->getDominio();
		$marca = $unVehiculo->getMarca();
		$modelo = $unVehiculo->getModelo();
		$anio = $unVehiculo->getAnio();
		$chasis = $unVehiculo->getChasis();
		$motor = $unVehiculo->getMotor();
		$valor = $unVehiculo->getValor();
		$cliente = $unVehiculo->getCliente();
		$carroceria = $unVehiculo->getCarroceria();

		$res = $this->bd->query("INSERT INTO Vehiculo (id, dominio, idMarca, idModelo, anio, chasis, motor, valor, idCliente, idCarroceria) VALUES ('','".$dominio."', '".$marca."', '".$modelo."', '".$anio."', '".$chasis."', '".$motor."', '".$valor."', '".$cliente."', '".$carroceria."');");
		
		return $res;
	}
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		BAJA
-------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		MODIFICACION
-------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function modificarVehiculo($id, $unVehiculo){
		$dominio = $unVehiculo->getDominio();
		$marca = $unVehiculo->getMarca();
		$modelo = $unVehiculo->getModelo();
		$anio = $unVehiculo->getAnio();
		$chasis = $unVehiculo->getChasis();
		$motor = $unVehiculo->getMotor();
		$valor = $unVehiculo->getValor();
		$cliente = $unVehiculo->getCliente();
		$carroceria = $unVehiculo->getCarroceria();
		
		return $this->bd->query("UPDATE Vehiculo SET dominio = '".$dominio."', idMarca = '".$marca."', idModelo = '".$modelo."', anio = '".$anio."', chasis = '".$chasis."', motor = '".$motor."', valor = '".$valor."', idCliente = '".$cliente."', idCarroceria = '".$carroceria."' WHERE id = '".$id."';");
	}
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		LECTURA
-------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function obtenerIdVehiculo($dominio){
		$sql = $this->bd->query("SELECT id,dominio FROM Vehiculo WHERE dominio = '".$dominio."';");
		
		if($this->bd->rows($sql) > 0){
			$unVehiculo = $this->bd->recorrer($sql);	// Fetch_row = Array numerico.
		}else{
			$unVehiculo = null;
		}

		return $unVehiculo;
	}

	public function obtenerTablaBuscador($dominio){
		$sql = $this->bd->query("SELECT ve.id, ve.dominio, cl.apellido, cl.nombre as nom, ca.nombre FROM Vehiculo ve INNER JOIN Carroceria ca ON ca.id = ve.idCarroceria INNER JOIN Cliente cl ON cl.id = ve.idCliente WHERE ve.dominio = '".$dominio."';");
		
		if($this->bd->rows($sql) > 0){
			while($vehiculos = $this->bd->recorrer($sql)){
				$array[] = $vehiculos;
			}
		}else{
			$array = null;
		}

		/*if($this->bd->rows($sql) > 0){
			while($vehiculos = $this->bd->recorrer($sql)){
				$array[] = $vehiculos;
			}
		}else{
			$array = null;
		}*/
		
		return $array;
	}

	public function obtenerVehiculoCliente(){
		$sql = $this->bd->query("SELECT ve.dominio, cl.apellido, cl.nombre as nom, ca.nombre FROM Vehiculo ve INNER JOIN Carroceria ca ON ca.id = ve.idCarroceria INNER JOIN Cliente cl ON cl.id = ve.idCliente;");
		
		if($this->bd->rows($sql) > 0){
			while($vehiculos = $this->bd->recorrer($sql)){
				$array[] = $vehiculos;
			}
		}else{
			$array = null;
		}
		
		return $array;
	}

	public function obtenerTablaVehiculoCliente($id){
		$sql = $this->bd->query("SELECT ve.id, ve.dominio, cl.apellido, cl.nombre as nom, ca.nombre FROM Vehiculo ve INNER JOIN Carroceria ca ON ca.id = ve.idCarroceria INNER JOIN Cliente cl ON cl.id = ve.idCliente WHERE ve.id = '".$id."';");
		
		if($this->bd->rows($sql) > 0){
			while($vehiculos = $this->bd->recorrer($sql)){
				$array[] = $vehiculos;
			}
		}else{
			$array = null;
		}
		
		return $array;
	}

	public function obtenerVehiculo($id){
		$sql = $this->bd->query("SELECT ve.id, ve.dominio, ma.id, ma.nombre, mo.id, mo.nombre, ve.idCarroceria, ca.nombre, ve.anio, ve.chasis, ve.motor, ve.valor, cl.id, cl.apellido, cl.nombre, cl.dni FROM Vehiculo ve INNER JOIN Carroceria ca ON ve.idCarroceria = ca.id INNER JOIN Marca ma ON ve.idMarca = ma.id INNER JOIN Modelo mo ON ve.idModelo = mo.id INNER JOIN Cliente cl ON ve.idCliente = cl.id WHERE ve.id = '".$id."';");
		
		if($this->bd->rows($sql) > 0){
			$unVehiculo = $this->bd->recorrer($sql);	// Fetch_row = Array numerico.
		}else{
			$unVehiculo = null;
		}

		return $unVehiculo;
	}

	public function obtenerDominioClientes($apellido){
		$array = array();
		$sql = $this->bd->query("SELECT cl.apellido, cl.nombre, cl.dni, ve.dominio, ma.nombre as marca, mo.nombre as modelo, ve.id as idVehiculo FROM Cliente cl INNER JOIN Vehiculo ve ON ve.idCliente = cl.id INNER JOIN Marca ma ON ve.idMarca = ma.id INNER JOIN Modelo mo ON ve.idModelo = mo.id WHERE cl.apellido = '".$apellido."'");
		
		if($this->bd->rows($sql) > 0){
			while($vehiculos = $this->bd->recorrer($sql)){
				$array[] = $vehiculos;
			}
		}else{
			$array = null;
		}
		
		return $array;
	}

}
?>