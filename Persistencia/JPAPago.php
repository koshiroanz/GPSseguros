<?PHP
class JPAPago{
	private $bd;

	public function JPAPago(){
		include_once('Persistencia/Conexion.php');
		$this->bd = new MySQL();
	}
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		ALTA
-------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function altaPago($Pago){
		$idPoliza = $Pago->getIdPoliza();
		$fecha = $Pago->getFecha();
		$numRecibo = $Pago->getNumRecibo();
		$importe = $Pago->getImporte();
		$reciboGrua = $Pago->getReciboGrua();
		$importeGrua = $Pago->getImporteGrua();
		$numCuota = $Pago->getNumCuota();
		$observaciones = $Pago->getObservaciones();

		return $this->bd->query("INSERT INTO Pago (id, numRecibo, fecha, importe, numCuota, importeGrua, reciboGrua, observaciones, idPoliza) VALUES ('','".$numRecibo."', '".$fecha."', '".$importe."', '".$numCuota."','".$importeGrua."', '".$reciboGrua."', '".$observaciones."', '".$idPoliza."');");
	}
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		BAJA
-------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function bajaPago($id){
		return $this->bd->query("DELETE FROM Pago WHERE id = '".$id."';");
	}
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		MODIFICACION
-------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function modificarPago($id, $Pago){
		$idPoliza = $Pago->getIdPoliza();
		$fecha = $Pago->getFecha();
		$numRecibo = $Pago->getNumRecibo();
		$importe = $Pago->getImporte();
		$reciboGrua = $Pago->getReciboGrua();
		$importeGrua = $Pago->getImporteGrua();
		$numCuota = $Pago->getNumCuota();
		$observaciones = $Pago->getObservaciones();

		return $this->bd->query("UPDATE Pago SET numRecibo = '".$numRecibo."', fecha = '".$fecha."', importe = '".$importe."',numCuota = '".$numCuota."', importeGrua = '".$importeGrua."', reciboGrua = '".$reciboGrua."', observaciones = '".$observaciones."', idPoliza = '".$idPoliza."' WHERE id = '".$id."';");
	}
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		LECTURA
-------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function buscadorPago($numRecibo){
		$pago = array();
		$sql = $this->bd->query("SELECT pa.*, po.numPoliza as numPoliza, po.idVehiculo as idVehiculo, ve.dominio FROM Pago pa INNER JOIN Poliza po ON pa.idPoliza = po.id INNER JOIN Vehiculo ve ON po.idVehiculo = ve.id WHERE pa.numRecibo = '".$numRecibo."';");

		if($this->bd->rows($sql) > 0){
			$pago = $this->bd->recorrer($sql);
		}else{
			$pago = null;
		}

		/*echo ' esto tiene: ';
		var_dump($pago);
		echo ' ';*/

		return $pago;
	}

	public function obtenerPago($idPago){
		$sql = $this->bd->query("SELECT pa.*, po.numPoliza as numPoliza, po.idVehiculo as idVehiculo, ve.dominio FROM Pago pa INNER JOIN Poliza po ON pa.idPoliza = po.id INNER JOIN Vehiculo ve ON po.idVehiculo = ve.id WHERE pa.id = '".$idPago."';");

		if($this->bd->rows($sql) > 0){
			$unPago = $this->bd->recorrer($sql);
		}else{
			$unPago = null;
		}

		return $unPago;
	}

	public function obtenerPagos(){
		$array = array();
		$sql = $this->bd->query("SELECT pa.*,po.numPoliza as numPoliza, ve.dominio as dominio FROM Pago pa INNER JOIN Poliza po ON pa.idPoliza = po.id INNER JOIN Vehiculo ve ON po.idVehiculo = ve.id;");

		if($this->bd->rows($sql) > 0){
			while($pago = $this->bd->recorrer($sql)){
				$array[] = $pago;
			}
		}else{
			$array = null;
		}

		return $array;
	}

	public function obtenerPolizaConIdDominio(){
		$sql = $this->bd->query("SELECT po.id,po.numPoliza,ve.dominio FROM Poliza po INNER JOIN Vehiculo ve ON po.idVehiculo = ve.id;");

		if($this->bd->rows($sql) > 0){
			while($poliza = $this->bd->recorrer($sql)){
				$array[] = $poliza;
			}
		}else{
			$array = null;
		}

		return $array;
	}

	public function obtenerUltimosPagos($id){
		$pago = array();
		$sql = $this->bd->query("SELECT * FROM Pago WHERE idPoliza = $id ORDER BY numCuota DESC;");

		if($this->bd->rows($sql) > 0){
			$pago = $this->bd->recorrer($sql);
		}else{
			$pago = null;
		}

		return $pago;
	}
}
?>