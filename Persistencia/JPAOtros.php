<?php
	class JPAOtros{
	private $bd;

	public function JPAOtros(){
		include_once('Persistencia/Conexion.php');
		$this->bd = new MySQL();
	}
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		COMPANIA
-------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function altaCompSeguro($nombre){
		return $sql = $this->bd->query("INSERT INTO companiaseguro (nombre) VALUES ('".$nombre."');");
	}

	public function obtenerCompaniaSeguro($nombre){
		$sql = $this->bd->query("SELECT * FROM Companiaseguro WHERE nombre = '".$nombre."';");
	
		if($this->bd->rows($sql) > 0){
			$unaCompaniaSeguro = $bd->recorrer($sql);
			return $unaCompaniaSeguro;
		}else{
			return null;
		}
	}

	public function obtenerCompaniasSeguros(){
		$sql = $this->bd->query("SELECT * FROM Companiaseguro ORDER BY nombre");

		if($this->bd->rows($sql) > 0){
			while($algo = $this->bd->recorrer($sql)){
				$array[] = $algo;
			}
		}else{
			$array = null;
		}

		return $array;
	}
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		CATEGORIA
-------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function altaCategoria($nombre){
		return $sql = $this->bd->query("INSERT INTO categoria (nombre) VALUES ('".$nombre."');");
	}

	public function obtenerCategoria($nombre){
		$sql = $this->bd->query("SELECT * FROM Categoria WHERE nombre = '".$nombre."';");
	
		if($this->bd->rows($sql) > 0){
			$unaCategoria = $this->bd->recorrer($sql);
			return $unaCategoria;
		}else{
			return null;
		}
	}

	public function obtenerCategorias(){
		$sql = $this->bd->query("SELECT * FROM Categoria ORDER BY nombre");

		if($this->bd->rows($sql) > 0){
			while($algo = $this->bd->recorrer($sql)){
				$array[] = $algo;
			}
		}else{
			$array = null;
		}

		return $array;
	}
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		COBERTURA
-------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function altaCobertura($nombre, $compania){
		return $sql = $this->bd->query("INSERT INTO cobertura (nombre, idCompaniaSeguro) VALUES ('".$nombre."', '".$compania."');");
	}

	public function obtenerCobertura($nombre){
		$sql = $this->bd->query("SELECT * FROM Cobertura WHERE nombre = '".$nombre."';");
	
		if($this->bd->rows($sql) > 0){
			$unaCobertura = $this->bd->recorrer($sql);
			return $unaCobertura;
		}else{
			return null;
		}
	}

	public function obtenerCoberturas(){
		$sql = $this->bd->query("SELECT * FROM Cobertura ORDER BY nombre");

		if($this->bd->rows($sql) > 0){
			while($algo = $this->bd->recorrer($sql)){
				$array[] = $algo;
			}
		}else{
			$array = null;
		}

		return $array;
	}

	public function obtenerCoberturaCompania($compSeguro){
		$sql = $this->bd->query("SELECT id,nombre FROM cobertura WHERE idCompaniaSeguro = '".$compSeguro."' ");
		$array = array();
		while($cobertura = $this->bd->recorrer($sql)){
			$array[$cobertura['id']] = $cobertura['nombre'];
		}
		
		return $array;
	}
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		MARCA
-------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function altaMarca($nombre){
		return $sql = $this->bd->query("INSERT INTO marca (nombre) VALUES ('".$nombre."');");
	}

	public function obtenerMarca($nombre){
		$sql = $this->bd->query("SELECT * FROM Marca WHERE nombre = '".$nombre."';");
	
		if($this->bd->rows($sql) > 0){
			$unaMarca = $this->bd->recorrer($sql);
			return $unaMarca;
		}else{
			return null;
		}
	}

	public function obtenerMarcas(){
		$sql = $this->bd->query("SELECT * FROM Marca ORDER BY nombre");

		if($this->bd->rows($sql) > 0){
			while($algo = $this->bd->recorrer($sql)){
				$array[] = $algo;
			}
		}else{
			$array = null;
		}

		return $array;
	}
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		TIPO VEHICULO
-------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function altaCarroceria($nombre){
		return $sql = $this->bd->query("INSERT INTO carroceria (nombre) VALUES ('".$nombre."');");
	}

	public function obtenerCarroceria($nombre){
		$sql = $this->bd->query("SELECT * FROM carroceria WHERE nombre = '".$nombre."';");
	
		if($this->bd->rows($sql) > 0){
			$uncarroceria = $this->bd->recorrer($sql);
			return $uncarroceria;
		}else{
			return null;
		}
	}

	public function obtenerCarrocerias(){
		$sql = $this->bd->query("SELECT * FROM carroceria ORDER BY nombre");

		if($this->bd->rows($sql) > 0){
			while($algo = $this->bd->recorrer($sql)){
				$array[] = $algo;
			}
		}else{
			$array = null;
		}

		return $array;
	}
/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------
																		MODELO
-------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	public function altaModelo($nombre, $marca, $carroceria){
		return $sql = $this->bd->query("INSERT INTO Modelo (nombre, idMarca, idCarroceria)  VALUES ('".$nombre."','".$marca."','".$carroceria."');");
	}

	public function obtenerModelo($nombre){
		$sql = $this->bd->query("SELECT * FROM Modelo WHERE nombre = '".$nombre."';");
	
		if($this->bd->rows($sql) > 0){
			$unModelo = $this->bd->recorrer($sql);
			return $unModelo;
		}else{
			return null;
		}
	}

	public function obtenerModelos(){
		$sql = $this->bd->query("SELECT * FROM Modelo ORDER BY nombre");

		if($this->bd->rows($sql) > 0){
			while($algo = $this->bd->recorrer($sql)){
				$array[] = $algo;
			}
		}else{
			$array = null;
		}

		return $array;
	}

	public function obtenerModelosMarca($idMarca){
		$sql = $this->bd->query("SELECT mo.id,mo.nombre FROM Modelo mo INNER JOIN Marca ma ON mo.idMarca = ma.id WHERE mo.idMarca = $idMarca");
		$array = array();
		while($modelo = $this->bd->recorrer($sql)){
			$array[$modelo['id']] = $modelo['nombre'];
		}
		
		return $array;
	}

	public function obtenerCarroceriaModelos($idModelo){
		$sql = $this->bd->query("SELECT ca.id,ca.nombre FROM Modelo mo INNER JOIN Carroceria ca ON mo.idCarroceria = ca.id WHERE mo.id = '".$idModelo."' ORDER BY ca.nombre;");
		$array = array();
		while($carroceria = $this->bd->recorrer($sql)){
			$array[$carroceria['id']] = $carroceria['nombre'];
		}
		
		return $array;
	}
	
}
?>