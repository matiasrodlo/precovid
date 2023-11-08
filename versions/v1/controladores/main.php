<?PHP
	require_once('modelos/bd.php');
	require_once('modelos/app.php');

	$app = new App();

	switch ($ruta[0]) {
		case '':
			require_once("vistas/logicas/index.php");
		break;

		case 'login':
			if(isset($ruta[1]))
			{
				if($ruta[1] == "send")
				{
					// Recibir el numero de telefono
					$tel = $_POST['tel'];

					// Comprobar si el numero de telefono ya esta almacenado
					$comprobar_telefono = $app->check_tel($tel);
					if($comprobar_telefono == false)
					{
						// No existen registros, puede agregarse como nuevo registro
						// Agregar numero de telefono a la db
						$agregar_tel = $app->add_tel($tel);
						if($agregar_tel)
						{
							//Se agrego correctamente
							echo "reload";
						}
						else
						{
							//Hubo un error al cargar el dato
							echo "error";
						}
					}
					else
					{
						// Si ya lo realizo una vez, si lo desea puede realizarse otro test
						echo "exist";
					}
				}
				else
				{
					require_once("vistas/logicas/login.php");
				}
			}
			else
			{
				require_once("vistas/logicas/login.php");
			}
		break;

		case 'evaluacion':
			if(isset($ruta[1]))
			{
				if($ruta[1] == "send")
				{
					$falta_de_aire = $_POST['falta_de_aire'];
					$fiebre = $_POST["fiebre"];
					$tos_seca = $_POST["tos_seca"];
					$relacion_con_paciente = $_POST["relacion_con_paciente"];
					$mucosidad = $_POST["mucosidad"];
					$dolor_muscular = $_POST['dolor_muscular'];
					$sintomatologia_gastrointestinal = $_POST['sintomatologia_gastrointestinal'];
					$tiempo_prolongado = $_POST['tiempo_prolongado'];

					$resultado = $app->calcular_test($falta_de_aire, $fiebre, $tos_seca, $relacion_con_paciente, $mucosidad, $dolor_muscular, $sintomatologia_gastrointestinal, $tiempo_prolongado);
					print_r($resultado);


					/*$agregar_evaluacion = $app->add_evaluacion($falta_de_aire, $fiebre, $tos_seca, $relacion_con_paciente, $mucosidad, $dolor_muscular, $sintomatologia_gastrointestinal, $tiempo_prolongado);
					if($agregar_evaluacion)
					{
						echo "Se cargo el test correctamente";
					}
					else
					{
						echo "Hubo un error en la carga";
					}*/
				}
				else
				{
					require_once("vistas/logicas/evaluacion.php");
				}
			}
			else
			{
				require_once("vistas/logicas/evaluacion.php");
			}
		break;

		/*case 'contact':
			if(isset($ruta[1]))
			{
				if($ruta[1] == "send")
				{
					
				}
				else
				{
					require_once("vistas/logicas/contact.php");
				}
			}
			else
			{
				require_once("vistas/logicas/contact.php");
			}
		break;

		default:
			if($ruta[0] !== "")
			{
				$hash = $ruta[0];
				$result = $shortener->check_hash($hash);
				if($result !== false)
				{
					require_once("vistas/logicas/url_acortada.php");
				}
				else
				{
					require_once("vistas/logicas/shorten_not_exist.php");
				}
			}
			else
			{
				require_once("vistas/logicas/index.php");
			}
		break;*/
	}
?>