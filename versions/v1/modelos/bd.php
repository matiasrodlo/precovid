<?PHP
 	abstract class Conexion{

 		private static $bd_host = "localhost";
 		private static $bd_usuario = "meyzjcmc_precov";
 		private static $bd_clave = "CQU!ruk]Ud%M";
 		protected $conexion;
 		private $resultado;
 		protected $bd_nombre = "meyzjcmc_precovidregistros";
 		protected $consulta;
 		protected $resultados = Array();
 		protected $num_resultados;
 		protected $filas_afectadas;

 		protected function conectar(){
 			$this->conexion = new mysqli(self::$bd_host, self::$bd_usuario, self::$bd_clave, $this->bd_nombre);
 			$this->conexion->query("SET NAMES 'utf8'");
 		}

 		protected function iniciar_transaccion(){
 			$this->conexion->autocommit(FALSE);
 		}

 		protected function confirmar_transaccion(){
 			$this->conexion->commit();
 		}

 		protected function cancelar_transaccion(){
 			$this->conexion->rollback();
 		}

 		protected function finalizar_transaccion(){
 			$this->conexion->autocommit(TRUE);
 		}

 		protected function consulta_simple(){
 			$this->resultado = $this->conexion->query($this->consulta);
 			$this->filas_afectadas = $this->conexion->affected_rows;
 		}

 		protected function obtener_resultados_de_consulta(){
 			unset($this->resultados);
 			$this->resultado = $this->conexion->query($this->consulta);
 			if($this->resultado or $this->resultado != '')
 			{
 				while($this->resultados[]=mysqli_fetch_array($this->resultado, MYSQLI_ASSOC));
	  			$this->num_resultados = $this->resultado->num_rows;
	  			unset($this->resultados[count($this->resultados)-1]);
 			}
  		}

 		protected function limpear(){
 			if($this->resultado or $this->resultado != '')
 			{
 				$this->resultado->free();
 			}
 		}

 		protected function desconectar(){
 			$this->conexion->close();
 		}
 	}
?>