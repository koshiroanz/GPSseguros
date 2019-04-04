<?PHP
class Poliza{
	private $id;
	private $numPoliza;
	private $vigenciaPedida;
	private $vigenciaPedidaHasta;
	private $vigenciaPoliza;
	private $vigenciaPolizaHasta;
	private $costoPoliza;
	private $observaciones;
	private $endoso;
	private $estado;
	private $sumaAsegurada;
	private $numPolizaVida;
	private $costoPolizaVida;
	private $destino;
	private $vehiculo;
	private $categoria;
	private $cobertura;
	private $compSeguro;
	/*-------------------------------------------------------------------------------------------------------------------------------------------------------------
																	CONSTRUCT
	-------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function __construct($numPoliza, $vigenciaPedida, $vigenciaPedidaHasta, $vigenciaPoliza, $vigenciaPolizaHasta, $costoPoliza, $observaciones, $endoso, $estado, $sumaAsegurada, $numPolizaVida, $costoPolizaVida, $destino, $vehiculo, $categoria, $cobertura, $compSeguro){
		$this->numPoliza = $numPoliza;
		$this->vigenciaPedida = $vigenciaPedida;
		$this->vigenciaPedidaHasta = $vigenciaPedidaHasta;
		$this->vigenciaPoliza = $vigenciaPoliza;
		$this->vigenciaPolizaHasta = $vigenciaPolizaHasta;
		$this->costoPoliza = $costoPoliza;
		$this->observaciones = $observaciones;
		$this->endoso = $endoso;
		$this->estado = $estado;
		$this->sumaAsegurada = $sumaAsegurada;
		$this->numPolizaVida = $numPolizaVida;
		$this->costoPolizaVida = $costoPolizaVida;
		$this->destino = $destino;
		$this->vehiculo = $vehiculo;
		$this->categoria = $categoria;
		$this->cobertura = $cobertura;
		$this->compSeguro = $compSeguro;
	}
	/*-------------------------------------------------------------------------------------------------------------------------------------------------------------
																	GETTERS
	-------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function getId(){
		return $this->id;
	}

	public function getVigenciaPedida(){
		return $this->vigenciaPedida;
	}

	public function getVigenciaPedidaHasta(){
		return $this->vigenciaPedidaHasta;
	}

	public function getVigenciaPoliza(){
		return $this->vigenciaPoliza;
	}

	public function getVigenciaPolizaHasta(){
		return $this->vigenciaPolizaHasta;
	}

	public function getCostoPoliza(){
		return $this->costoPoliza;
	}

	public function getCobertura(){
		return $this->cobertura;
	}

	public function getCompSeguro(){
		return $this->compSeguro;
	}

	public function getCategoria(){
		return $this->categoria;
	}

	public function getNumPoliza(){
		return $this->numPoliza;
	}

	public function getEstado(){
		return $this->estado;
	}

	public function getEndoso(){
		return $this->endoso;
	}

	public function getNumPolizaVida(){
		return $this->numPolizaVida;
	}

	public function getCostoPolizaVida(){
		return $this->costoPolizaVida;
	}

	public function getDestino(){
		return $this->destino;
	}

	public function getSumaAsegurada(){
		return $this->sumaAsegurada;
	}

	public function getObservaciones(){
		return $this->observaciones;
	}

	public function getVehiculo(){
		return $this->vehiculo;
	}
	/*-------------------------------------------------------------------------------------------------------------------------------------------------------------
																	SETTERS
	-------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function setId($id){
		$this->dni = $id;
	}

	public function setVehiculo($vehiculo){
		$this->vehiculo = $vehiculo;
	}

	public function setVigenciaPedida($vigenciaPedida){
		$this->vigenciaPedida = $vigenciaPedida;
	}

	public function setVigenciaPedidaHasta($vigenciaPedidaHasta){
		$this->vigenciaPedidaHasta = $vigenciaPedidaHasta;
	}

	public function setVigenciaPoliza($vigenciaPoliza){
		$this->vigenciaPoliza = $vigenciaPoliza;
	}

	public function setVigenciaPolizaHasta($vigenciaPolizaHasta){
		$this->vigenciaPolizaHasta = $vigenciaPolizaHasta;
	}

	public function setCostoPoliza($costoPoliza){
		$this->costoPoliza = $costoPoliza;
	}

	public function setCobertura($cobertura){
		$this->cobertura = $cobertura;
	}

	public function setCategoria($categoria){
		$this->categoria = $categoria;
	}

	public function setNumPoliza($numPoliza){
		$this->numPoliza = $numPoliza;
	}

	public function setEndoso($endoso){
		$this->endoso = $endoso;
	}

	public function setEstado($estado){
		$this->estado = $estado;
	}

	public function setCompSeguro($compSeguro){
		$this->compSeguro = $compSeguro;
	}

	public function setNumPolizaVida($numPolizaVida){
		$this->numPolizaVida = $numPolizaVida;
	}

	public function setCostoPolizaVida($costoPolizaVida){
		$this->costoPolizaVida = $costoPolizaVida;
	}

	public function setDestino($destino){
		$this->destino = $destino;
	}

	public function setSumaAsegurada($sumaAsegurada){
		$this->sumaAsegurada = $sumaAsegurada;
	}

	public function setObservaciones($observaciones){
		$this->observaciones = $observaciones;
	}
}
?>