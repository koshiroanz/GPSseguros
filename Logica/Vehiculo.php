<?PHP

class Vehiculo{
	private $dominio;
	private $marca;
	private $modelo;
	private $anio;
	private $chasis;
	private $motor;
	private $valor;
	private $cliente;
	private $carroceria;

	/*-------------------------------------------------------------------------------------------------------------------------------------------------------------
																	CONSTRUCT
	-------------------------------------------------------------------------------------------------------------------------------------------------------------*/

	public function __construct($dominio, $marca, $modelo, $anio, $chasis, $motor, $valor, $cliente, $carroceria){
		$this->dominio = $dominio;
		$this->marca = $marca;
		$this->modelo = $modelo;
		$this->anio = $anio;
		$this->chasis = $chasis;
		$this->motor = $motor;
		$this->valor = $valor;
		$this->cliente = $cliente;
		$this->carroceria = $carroceria;
	}

	/*-------------------------------------------------------------------------------------------------------------------------------------------------------------
																	GETTERS
	-------------------------------------------------------------------------------------------------------------------------------------------------------------*/

	public function getDominio(){
		return $this->dominio;
	}

	public function getMarca(){
		return $this->marca;
	}

	public function getModelo(){
		return $this->modelo;
	}

	public function getAnio(){
		return $this->anio;
	}

	public function getChasis(){
		return $this->chasis;
	}

	public function getMotor(){
		return $this->motor;
	}

	public function getValor(){
		return $this->valor;
	}

	public function getCliente(){
		return $this->cliente;
	}

	public function getCarroceria(){
		return $this->carroceria;
	}


	/*-------------------------------------------------------------------------------------------------------------------------------------------------------------
																	SETTERS
	-------------------------------------------------------------------------------------------------------------------------------------------------------------*/

	public function setDominio($dominio){
		$this->dominio = $dominio;
	}

	public function setMarca($marca){
		$this->marca = $marca;
	}

	public function setModelo($modelo){
		$this->modelo = $modelo;
	}

	public function setAnio($anio){
		$this->anio = $anio;
	}

	public function setChasis($chasis){
		$this->chasis = $chasis;
	}

	public function setMotor($motor){
		$this->motor = $motor;
	}

	public function setValor($valor){
		$this->valor = $valor;
	}

	public function setCliente($cliente){
		$this->cliente = $cliente;
	}

	public function setCarroceria($carroceria){
		$this->carroceria = $carroceria;
	}

}

?>