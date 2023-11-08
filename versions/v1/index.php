<?PHP
	//session_start();
	
	if(isset($_GET['ruta']))
	{
		$ruta=explode("/", $_GET['ruta']);
	}
	else
	{
		$ruta[0] = '';
	}
	
	define(RUTA_INDEX, "http://precovid.cl/app/");

	require_once('controladores/main.php');
?>