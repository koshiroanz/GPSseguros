<?PHP
class Beneficiario{
	private $dni;
	private $apellido;
	private $nombre;
	private $telefono;
	private $direccion;
	private $ciudad;
	private $provincia;
	private $parentesco;
	private $cliente;
	/*-------------------------------------------------------------------------------------------------------------------------------------------------------------
																	CONSTRUCT
	-------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function Beneficiario($dni, $apellido, $nombre, $telefono, $direccion, $ciudad, $provincia, $parentesco, $cliente){
		$this->dni = $dni;
		$this->apellido = $apellido;
		$this->nombre = $nombre;
		$this->telefono = $telefono;
		$this->direccion = $direccion;
		$this->ciudad = $ciudad;
		$this->provincia = $provincia;
		$this->parentesco = $parentesco;
		$this->cliente = $cliente;
	}
	/*-------------------------------------------------------------------------------------------------------------------------------------------------------------
																	GETTERS
	-------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function getDni(){
		return $this->dni;
	}

	public function getApellido(){
		return $this->apellido;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function getTelefono(){
		return $this->telefono;
	}

	public function getDireccion(){
		return $this->direccion;
	}

	public function getCiudad(){
		return $this->ciudad;
	}

	public function getProvincia(){
		return $this->provincia;
	}
	
	public function getParentesco(){
		return $this->parentesco;
	}
	
	public function getCliente(){
		return $this->cliente;
	}
	/*-------------------------------------------------------------------------------------------------------------------------------------------------------------
																	SETTERS
	-------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function setApellido($apellido){
		$this->apellido = $apellido;
	}

	public function setDni($dni){
		$this->dni = $dni;
	}

	public function setDireccion($direccion){
		$this->direccion = $direccion;
	}

	public function setCiudad($ciudad){
		$this->ciudad = $ciudad;
	}

	public function setProvincia($provincia){
		$this->provincia = $provincia;
	}

	public function setParentesco($parentesco){
		$this->parentesco = $parentesco;
	}

	public function setCliente($cliente){
		$this->cliente = $cliente;
	}

	public function setTelefono($telefono){
		$this->telefono = $telefono;
	}
}
?>