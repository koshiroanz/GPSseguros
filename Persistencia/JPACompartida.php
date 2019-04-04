<?PHP
	class JPACompartida{
		private $bd;

		public function JPACompartida(){
			include_once('Persistencia/Conexion.php');
			$this->bd = new MySQL();
		}

	/*-------------------------------------------------------------------------------------------------------------------------------------------------------------------
										Eliminar / Obtener todo de un obj con WHERE / Obtener todo de un obj
	-------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
		public function bajaDe($entidad,$col,$valor){
			$res = $this->bd->query("DELETE FROM $entidad WHERE $col = '".$valor."';");
			return $res;
		}

		public function obtenerTodoDe($entidad){
			$array = array();
			$consulta = null;
			//var_dump($_SESSION);
			if($_SESSION['privilegio'] < 3){ // ¿ Privilegio no será ? Estaba en id.. :/
				switch($entidad){
					case 'Cliente':
						$consulta = "SELECT * FROM Cliente WHERE idProductor = ".$_SESSION['id'].";";
						break;
					case 'Vehiculo':
						$consulta = "SELECT ve.id,ve.dominio,cl.apellido,cl.nombre as nom,ca.nombre FROM Vehiculo ve INNER JOIN Carroceria ca ON ca.id = ve.idCarroceria INNER JOIN Cliente cl ON cl.id = ve.idCliente WHERE cl.idProductor = ".$_SESSION['id'].";";
						break;
					case 'Productor':
						$consulta = "SELECT * FROM productor WHERE id = ".$_SESSION['id'].";";
					default:
						$consulta = "SELECT * FROM ".$entidad.";";
				}
			}else{
				switch($entidad){
					case 'Vehiculo':
						$consulta = "SELECT ve.id,ve.dominio,cl.apellido,cl.nombre as nom,ca.nombre FROM Vehiculo ve INNER JOIN Carroceria ca ON ca.id = ve.idCarroceria INNER JOIN Cliente cl ON cl.id = ve.idCliente; ";
						break;
					default:
						$consulta = "SELECT * FROM ".$entidad.";";
				}
			}
			

			$sql = $this->bd->query($consulta);
			
			if($this->bd->rows($sql) > 0){
				while($algo = $this->bd->recorrer($sql)){
					$array[] = $algo;
				}
			}else{
				$array = null;
			}

			/*$this->bd->liberarConsulta($sql);
			$this->bd->cerrarBd();*/

			return $array;
		}

		public function obtenerDe($entidad,$col,$valor){
			$sql = $this->bd->query("SELECT * FROM $entidad WHERE $col = '".$valor."';");
			if($this->bd->rows($sql) > 0){
				while($algo = $this->bd->recorrer($sql)){
					$array[] = $algo;
				}
			}else{
				$array = null;
			}

			return $array;
		}

	}
?>