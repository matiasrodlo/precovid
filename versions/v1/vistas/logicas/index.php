<?php
	$html = file_get_contents('vistas/index.html');

	$html = str_replace('{ruta_index}', RUTA_INDEX, $html);
	echo $html;
?>