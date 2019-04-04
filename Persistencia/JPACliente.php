<?PHP
class JPACliente{
	private $bd;

	public function JPACliente(){
		include_once('Persistencia/Conexion.php');
		$this->bd = new MySQL();
	}
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		ALTA
-------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function altaCliente($Cliente){
		$dni = $Cliente->getDni();
		$apellido = $Cliente->getApellido();
		$nombre = $Cliente->getNombre();
		$fechaNac = $Cliente->getFechaNac();
		$direccion = $Cliente->getDireccion();
		$ciudad = $Cliente->getCiudad();
		$provincia = $Cliente->getProvincia();
		$cuit = $Cliente->getCuit(); 
		$telefono = $Cliente->getTelefono();
		$fechaBaja = $Cliente->getFechaBaja();
		$estadoCivil = $Cliente->getEstadoCivil();
		$productor = $Cliente->getProductor();

		$res = $this->bd->query("INSERT INTO Cliente (id, dni, apellido, nombre, fechaNac, direccion, ciudad, provincia, cuit, telefono, fechaBaja, estadoCivil, idProductor) VALUES ('','".$dni."', '".$apellido."', '".$nombre."', '".$fechaNac."', '".$direccion."', '".$ciudad."', '".$provincia."', '".$cuit."', '".$telefono."', '".$fechaBaja."', '".$estadoCivil."', '".$productor."');");
		
		return $res;
	}
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		BAJA
-------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		MODIFICACION
-------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function modificarCliente($id, $Cliente){
		$dni = $Cliente->getDni();
		$apellido = $Cliente->getApellido();
		$nombre = $Cliente->getNombre();
		$fechaNac = $Cliente->getFechaNac();
		$direccion = $Cliente->getDireccion();
		$ciudad = $Cliente->getCiudad();
		$provincia = $Cliente->getProvincia();
		$cuit = $Cliente->getCuit(); 
		$telefono = $Cliente->getTelefono();
		$fechaBaja = $Cliente->getFechaBaja();
		$estadoCivil = $Cliente->getEstadoCivil();
		$productor = $Cliente->getProductor();

		return $this->bd->query("UPDATE Cliente SET dni = '".$dni."', apellido = '".$apellido."', nombre = '".$nombre."', fechaNac = '".$fechaNac."', direccion = '".$direccion."', ciudad = '".$ciudad."', provincia = '".$provincia."', cuit = '".$cuit."', telefono = '".$telefono."', fechaBaja = '".$fechaBaja."', estadoCivil = '".$estadoCivil."', idProductor = '".$productor."' WHERE id = '".$id."';");
	}
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		LECTURA
-------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function obtenerClientes(){
		$consulta = "SELECT cl.*, po.estado FROM Poliza po INNER JOIN Vehiculo ve ON po.idVehiculo = ve.id INNER JOIN cliente cl ON ve.idCliente = cl.id";
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

	public function obtenerClienteApellido($apellido){
		$array = array();
		$sql = $this->bd->query("SELECT cl.*, po.estado FROM Poliza po INNER JOIN Vehiculo ve ON po.idVehiculo = ve.id INNER JOIN Cliente cl ON cl.id = ve.idCliente WHERE cl.apellido = '".$apellido."';");

		if($this->bd->rows($sql) > 0){
			while($clientes = $this->bd->recorrer($sql)){
				$array[] = $clientes;
			}
		}else{
			$array = null;
		}

		return $array;
	}

	public function obtenerClienteProductor($id){
		$sql = $this->bd->query("SELECT cl.id,cl.dni,cl.apellido,cl.nombre,cl.fechaNac,cl.telefono,cl.cuit,cl.estadoCivil,cl.direccion,cl.ciudad,cl.provincia,cl.fechaBaja,cl.idProductor,pr.apellido as ape,pr.nombre as nom, po.estado as polEstado FROM Poliza po INNER JOIN Vehiculo ve ON po.idVehiculo = ve.id INNER JOIN Cliente cl ON cl.id = ve.idCliente INNER JOIN Productor pr ON cl.idProductor = pr.id WHERE cl.id = '".$id."';");
		
		if($this->bd->rows($sql) == 0){
			$sql = $this->bd->query("SELECT cl.id,cl.dni,cl.apellido,cl.nombre,cl.fechaNac,cl.telefono,cl.cuit,cl.estadoCivil,cl.direccion,cl.ciudad,cl.provincia,cl.fechaBaja,cl.idProductor,pr.apellido as ape,pr.nombre as nom, '--' as polEstado FROM Vehiculo ve INNER JOIN Cliente cl ON cl.id = ve.idCliente INNER JOIN Productor pr ON cl.idProductor = pr.id WHERE cl.id = '".$id."';");
		}

		while($clientes = $this->bd->recorrer($sql)){
			$unCliente[] = $clientes;
		}

		return $unCliente;
	}

	public function obtenerIdCliente($dniCliente){
		$sql = $this->bd->query("SELECT id,apellido,nombre,dni FROM Cliente WHERE dni = '".$dniCliente."';");

		if($this->bd->rows($sql) > 0){
			$unCliente = $this->bd->recorrer($sql);	// Fetch_row = Array numerico.
		}else{
			$unCliente = null;
		}

		return $unCliente;
	}


}
?>