<?php 
   class MySQL{

		public function __construct(){
      //$con = mysql_connect('localhost','wi631838_gps','WOfisodu99','wi631838_gps'); //HOSTING
      $this->conexion = mysqli_connect('localhost','root','','gps');
      //$this->conexion = mysqli_connect('localhost','c1380553_gps','','c1380553_gps');
      //var_dump($this->conexion);
			if(!$this->conexion){
				echo "error";
			}else{
				if (!mysqli_select_db($this->conexion,'gps')) {
					die('No se pudo seleccionar la base de datos: ' . mysqli_error());
				}
			}
		}

  public function recorrer($y){
    return mysqli_fetch_array($y);  // Fetch_array = Array Asociativo y Numerico
  }

  public function query($y){
    return mysqli_query($this->conexion,$y);  // Fetch_array = Array Asociativo y Numerico
  }

  function fetch_assoc($result){
    if(!is_resource($result)) return false;
      return mysqli_fetch_assoc($result);
  }

  public function rows($y){
    return mysqli_num_rows($y);
  }

  /*public function cerrarBd(){
    mysql_close($this->conexion);;
  }*/

  public function liberarConsulta($r){
    return mysqli_free_result($r);
  }
}
?>