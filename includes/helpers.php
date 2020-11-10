<?php 
#para moostrar los errores, creamos una funcion que al pasarle por parametro el array de session['errores'], poder mostrarlos en una etiqueta personalizada

function mostrarError ($errores , $campo) {
	$alerta='';
	if (isset($errores[$campo]) && !empty($campo)) {
		$alerta= "<div class='alerta alerta-error'>".$errores[$campo].'</div>';
	}
	return $alerta;
}

#volvemos el array de session['errores'] a nullv 
function borrarErrores() {
	$_SESSION['errores'] = null;
	$borrado = session_unset($_SESSION['errores']);
	return $borrado;
}-