<?php
	$html = file_get_contents('vistas/evaluacion.html');
//	$menu_header = file_get_contents('vistas/plantillas/menu_header.html');
	
	$rand = rand();

//	$html = str_replace('{header_menu}', $menu_header, $html);
	$html = str_replace('{rand}', $rand, $html);
	$html = str_replace('{ruta_index}', RUTA_INDEX, $html);
	echo $html;	
?>