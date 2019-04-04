<?PHP
class JPAProductor{
	private $bd;

	public function JPAProductor(){
		include_once('Persistencia/Conexion.php');
		$this->bd = new MySQL();
	}
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		ALTA
-------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function altaProductor($Productor){
		$dni = $Productor->getDni();
		$apellido = $Productor->getApellido();
		$nombre = $Productor->getNombre();
		$direccion = $Productor->getDireccion();
		$telefono = $Productor->getTelefono();
		$usuario = $Productor->getUsuario();
		$privilegio = $Productor->getPrivilegio();

		return $this->bd->query("INSERT INTO Productor (dni, apellido, nombre, direccion, telefono, usuario, privilegio) VALUES ('".$dni."', '".$apellido."', '".$nombre."', '".$direccion."', '".$telefono."', '".$usuario."', '".$privilegio."');");
	}
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		BAJA
-------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function bajaProductor($id){
		return $this->bd->query("DELETE FROM Productor WHERE id = '".$id."';");
	}
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		MODIFICACION
-------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function modificarProductor($id, $unProductor){
		$dni = $unProductor->getDni();
		$apellido = $unProductor->getApellido();
		$nombre = $unProductor->getNombre();
		$direccion = $unProductor->getDireccion();
		$telefono = $unProductor->getTelefono();
		$usuario = $unProductor->getUsuario();
		$privilegio = $unProductor->getPrivilegio();

		return  $this->bd->query("UPDATE Productor SET dni = '".$dni."', apellido = '".$apellido."', nombre = '".$nombre."', direccion = '".$direccion."', telefono = '".$telefono."', usuario = '".$usuario."', privilegio = '".$privilegio."' WHERE id = '".$id."';");
	}
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		LECTURA
-------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function obtenerProductorApellido($apellido){
		$array = array();
		$sql = $this->bd->query("SELECT * FROM Productor WHERE apellido = '".$apellido."';");
		
		if($this->bd->rows($sql) > 0){
			while($productor = $this->bd->recorrer($sql)){
				$array[] = $productor;
			}
		}else{
			$array = null;
		}

		return $array;
	}

	public function obtenerProductor($dni){
		$array = array();

		$sql = $this->bd->query("SELECT * FROM Productor WHERE dni = '".$dni."';");
		
		if($this->bd->rows($sql) > 0){
			while($productor = $this->bd->recorrer($sql)){
				$array[] = $productor;
			}
		}else{
			$array = null;
		}

		return $array;
	}

}
?>