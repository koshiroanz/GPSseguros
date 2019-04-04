<?PHP

class Productor{
	
	private $dni;
	private $apellido;
	private $nombre;
	private $direccion;
	private $telefono;
	private $usuario;
	private $privilegio;

	/*-------------------------------------------------------------------------------------------------------------------------------------------------------------
																	CONSTRUCT
	-------------------------------------------------------------------------------------------------------------------------------------------------------------*/

	public function Productor($dni, $apellido, $nombre, $direccion, $telefono, $privilegio){
		$this->dni = $dni;
		$this->apellido = $apellido;
		$this->nombre = $nombre;
		$this->direccion = $direccion;
		$this->telefono = $telefono;
		$this->usuario = $this->crearUsuario($apellido, $nombre);
		$this->privilegio = $privilegio;
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

	public function getDireccion(){
		return $this->direccion;
	}

	public function getTelefono(){
		return $this->telefono;
	}

	public function getUsuario(){
		return $this->usuario;
	}

	public function getPrivilegio(){
		return $this->privilegio;
	}

	/*-------------------------------------------------------------------------------------------------------------------------------------------------------------
																	SETTERS
	-------------------------------------------------------------------------------------------------------------------------------------------------------------*/

	public function setDni($dni){
		$this->dni = $dni;
	}

	public function setApellido($apellido){
		$this->apellido = $apellido;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function setDomicilio($direccion){
		$this->direccion = $direccion;
	}

	public function setTelefono($telefono){
		$this->telefono = $telefono;
	}

	public function setUsuario(){
		//$this->usuario = $this->crearUsuario(getApellido(), getNombre());
	}

	public function setPrivilegio($privilegio){
		$this->privilegio = $privilegio;
	}

/*-------------------------------------------------------------------------------------------------------------------------------------------------------------
																	FUNCIONES
-------------------------------------------------------------------------------------------------------------------------------------------------------------*/	
	public function crearUsuario($apellido, $nombre){
		$apellidos = explode(" ", $apellido );
		$nombres = explode(" ", $nombre );
		
		$usuario = $apellidos[0].$nombres[0];

		return $usuario;
	}
}

?>