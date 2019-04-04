<?PHP

class Cliente{

	private $dni;
	private $apellido;
	private $nombre;
	private $fechaNac;
	private $direccion;
	private $ciudad;
	private $provincia;
	private $cuit;
	private $telefono;
	private $fechaBaja;
	private $estadoCivil;
	private $productor;

	/*-------------------------------------------------------------------------------------------------------------------------------------------------------------
																	CONSTRUCT
	-------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function __construct($dni, $apellido, $nombre, $fechaNac, $direccion, $ciudad, $provincia, $cuit, $telefono, 
									$fechaBaja, $estadoCivil, $productor){
		$this->dni = $dni;
		$this->apellido = $apellido;
		$this->nombre = $nombre;
		$this->fechaNac = $fechaNac;
		$this->direccion = $direccion;
		$this->ciudad = $ciudad;
		$this->provincia = $provincia;
		$this->cuit = $cuit;
		$this->telefono = $telefono;
		$this->fechaBaja = $fechaBaja;
		$this->estadoCivil = $estadoCivil;
		$this->productor = $productor;
	}

	public function ClienteV(){
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

	public function getFechaNac(){
		return $this->fechaNac;
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

	public function getCuit(){
		return $this->cuit;
	}

	public function getTelefono(){
		return $this->telefono;
	}

	public function getFechaBaja(){
		return $this->fechaBaja;
	}

	public function getEstadoCivil(){
		return $this->estadoCivil;
	}

	public function getProductor(){
		return $this->productor;
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

	public function setFechaNac($fechaNac){
		$this->fechaNac = $fechaNac;
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

	public function setCuit($cuit){
		$this->cuit = $cuit;
	}

	public function setTelefono($telefono){
		$this->telefono = $telefono;
	}

	public function setFechaBaja($fechaBaja){
		$this->fechaBaja = $fechaBaja;
	}

	public function setEstadoCivil($estadoCivil){
		return $this->estadoCivil = $estadoCivil;
	}

	public function setProductor($productor){
		return $this->productor = $productor;
	}

}

?>