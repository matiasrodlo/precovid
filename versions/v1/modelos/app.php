<?PHP
	class App extends Conexion {
		/*WITH THE NEW SYSTEM*/
		public function check_tel($tel)
		{
			$this->conectar();
			$this->consulta = sprintf("SELECT num_tel, ip FROM registros WHERE num_tel='%s' LIMIT 1", mysqli_real_escape_string($this->conexion, $tel));
			$this->obtener_resultados_de_consulta();
			$resultados = $this->resultados;
			$this->limpear();
			$this->desconectar();
			if(count($resultados)>0){
				return $resultados;
			}else{
				return false;
			}
		}

		public function add_tel($tel)
		{
			$ip_adress = $_SERVER['REMOTE_ADDR'];
			$this->conectar();
			$this->consulta = sprintf("INSERT INTO registros (id_registro, num_tel, ip) VALUES (null, '%s', '%s')", 
			        				mysqli_real_escape_string($this->conexion, $tel), 
			        				mysqli_real_escape_string($this->conexion, $ip_adress));
			$this->consulta_simple();
			$filas_afectadas = $this->filas_afectadas;
			$this->desconectar();
			if($filas_afectadas>0){
				return true;
			}else{
				return false;
			}
		}

		public function add_evaluacion($falta_de_aire, $fiebre, $tos_seca, $relacion_con_paciente, $mucosidad, $dolor_muscular, $sintomatologia_gastrointestinal, $tiempo_prolongado)
		{
			$ip_adress = $_SERVER['REMOTE_ADDR'];
			$this->conectar();
			$this->consulta = sprintf("INSERT INTO evaluaciones (id_evaluacion, id_usuario, falta_de_aire, fiebre, tos_seca, relacion_con_paciente, mucosidad, dolor_muscular, sintomatologia_gastrointestinal, tiempo_prolongado) VALUES (null, '1', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')", 
			        				mysqli_real_escape_string($this->conexion, $falta_de_aire), 
			        				mysqli_real_escape_string($this->conexion, $fiebre),
				        			mysqli_real_escape_string($this->conexion, $tos_seca),
					        		mysqli_real_escape_string($this->conexion, $relacion_con_paciente),
					        		mysqli_real_escape_string($this->conexion, $mucosidad),
					        		mysqli_real_escape_string($this->conexion, $dolor_muscular),
					        		mysqli_real_escape_string($this->conexion, $sintomatologia_gastrointestinal),
					   				mysqli_real_escape_string($this->conexion, $tiempo_prolongado));
			$this->consulta_simple();
			$filas_afectadas = $this->filas_afectadas;
			$this->desconectar();
			if($filas_afectadas>0){
				return true;
			}else{
				return false;
			}
		}

		public function calcular_test($falta_de_aire, $fiebre, $tos_seca, $relacion_con_paciente, $mucosidad, $dolor_muscular, $sintomatologia_gastrointestinal, $tiempo_prolongado){
			$probabilidad = 0;

			if($falta_de_aire == "si"){
				$probabilidad = $probabilidad + 20;
			} /*else {
				$probabilidad = $probabilidad - 20;
			}*/

			if($fiebre == "si"){
				$probabilidad = $probabilidad + 20;
			} /*else {
				$probabilidad = $probabilidad - 20;
			}*/

			if($tos_seca == "si"){
				$probabilidad = $probabilidad + 20;
			} /*else {
				$probabilidad = $probabilidad - 10;
			}*/

			if($relacion_con_paciente == "si"){
				$probabilidad = $probabilidad + 30;
			}

			if($mucosidad == "si"){
				$probabilidad = $probabilidad - 12.5;
			} else {
				$probabilidad = $probabilidad + 12.5;
			}

			if($dolor_muscular == "si"){
				$probabilidad = $probabilidad + 12.5;
			}

			if($sintomatologia_gastrointestinal == "si"){
				$probabilidad = $probabilidad - 12.5;
			}
			else
			{
				$probabilidad = $probabilidad + 12.5;
			}
			
			if($tiempo_prolongado == "si"){
				$probabilidad = $probabilidad + 12.5;
			}

			return $probabilidad;
		}
	}
?>