<?PHP
class Pago{
	private $idPoliza;
	private $fecha;
	private $numRecibo;
	private $importe;
	private $reciboGrua;
	private $importeGrua;
	private $numCuota;
	private $observaciones;
	/*-------------------------------------------------------------------------------------------------------------------------------------------------------------
																	CONSTRUCT
	-------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function Pago($numRecibo, $fecha, $importe, $numCuota, $importeGrua, $reciboGrua, $observaciones, $idPoliza){
		$this->idPoliza = $idPoliza;
		$this->fecha = $fecha;
		$this->numRecibo = $numRecibo;
		$this->importe = $importe;
		$this->reciboGrua = $reciboGrua;
		$this->importeGrua = $importeGrua;
		$this->numCuota = $numCuota;
		$this->observaciones = $observaciones;
	}
	/*-------------------------------------------------------------------------------------------------------------------------------------------------------------
																	GETTERS
	-------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function getIdPoliza(){
		return $this->idPoliza;
	}

	public function getFecha(){
		return $this->fecha;
	}

	public function getNumRecibo(){
		return $this->numRecibo;
	}

	public function getImporte(){
		return $this->importe;
	}

	public function getReciboGrua(){
		return $this->reciboGrua;
	}

	public function getImporteGrua(){
		return $this->importeGrua;
	}

	public function getNumCuota(){
		return $this->numCuota;
	}

	public function getObservaciones(){
		return $this->observaciones;
	}
	/*-------------------------------------------------------------------------------------------------------------------------------------------------------------
																	SETTERS
	-------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function setIdPoliza($idPoliza){
		$this->idPoliza = $idPoliza;
	}

	public function setFecha($fecha){
		$this->fecha = $fecha;
	}

	public function setNumRecibo($numRecibo){
		$this->numRecibo = $numRecibo;
	}

	public function setImporte($importe){
		$this->importe = $importe;
	}

	public function setReciboGrua($reciboGrua){
		$this->reciboGrua = $reciboGrua;
	}

	public function setImporteGrua($importeGrua){
		$this->importeGrua = $importeGrua;
	}

	public function setNumCuota($numCuota){
		$this->numCuota = $numCuota;
	}

	public function setObservaciones($observaciones){
		$this->observaciones = $observaciones;
	}
}
?>