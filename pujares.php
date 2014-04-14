<?php
require_once("conexion.inc.php");
session_start();
require_once("limpiarcadena.inc.php");
$_POST = Clear_Var($_POST);
if(!(ctype_digit($_POST['puntos'])) || trim($_POST['puntos']) == "" && !isset($_POST['pujar'])){
	header('Location: pujaoro.php');
}
else{
	$final = 0;
	$cant = $_POST['puntos'];
	$ser = $_SESSION['id'];
	if(!isset($_SESSION['valido']) || !$_SESSION['valido'] || !isset($_SESSION['subastado'])){
		echo "Error interno, vuelva a iniciar sesión.";
	}
	else{
		$con;
		$guid = $_SESSION['subastado'];
		if($_SESSION['server'] == 'aura'){
			$con = mysql_connect("$hostchar_subaura","$user","$pass");
		}
		else{
			$con = mysql_connect("$hostchar_subuxia","$user","$pass");
		}
		mysql_select_db("$dbc",$con);
		// Seleccion de la subasta para controlar que no nos pongan una puja menor y que no haya acabado antes de nosotros pujar
		$rest = mysql_query("SELECT * FROM subasta WHERE guid = $guid;",$con);
		$subasta = mysql_fetch_assoc($rest);
		if($subasta['cantidad_actu'] < $cant && $subasta['finalizado'] != 1){
			$pagant = 0;
			$hpantes = mysql_query("SELECT * FROM subastalog WHERE acc = $ser AND pj_sub = $guid",$con);
			$consolver = mysql_connect("$hostaut_solv","$usersol","$passsol");
			mysql_select_db("$bdsolver",$consolver);
			if(mysql_num_rows($hpantes) != 0){
				$cantipa = mysql_fetch_assoc($hpantes);
				$pagant = $cantipa['cantidad'];
			}
			$compro = "SELECT * FROM puntossms WHERE acct = $ser";
			$rest = mysql_query("$compro",$consolver) or die (mysql_error());
			if(mysql_num_rows($rest) != 0){
				$fila = mysql_fetch_assoc($rest);
				// Comprobacion de si tenemos los puntos que hemos pujado y los actualizamos para guardar
				if($fila['puntos']+$fila['extra']-$fila['consumidos']+$pagant >= $cant){
					mysql_query("UPDATE puntossms SET consumidos = consumidos - $pagant WHERE acct = $ser",$consolver);
					mysql_query("UPDATE puntossms SET consumidos = consumidos + $cant WHERE acct = $ser",$consolver);
					mysql_select_db("$dbc",$con);
					mysql_query("REPLACE INTO subastalog VALUES ('$ser','$guid','$cant');",$con); // Guardamos en el log
					// Comprobaremos si lo que hemos pujado es la cantidad maxima, que en el caso de serlo finalizaremos la subasta y devolveremos los puntos
					// a los que no han conseguido el pj
					if($subasta['cantidad_max'] <= $cant){
						mysql_query("UPDATE subasta SET cantidad_actu = $cant, cuenta_win = $ser, finalizado = 1 WHERE guid = $guid",$con) or die(mysql_error());
						$subastadores = mysql_query("SELECT * FROM subastalog WHERE pj_sub = $guid;",$con);
						mysql_select_db("$bdsolver",$con);
						// Devolvemos los puntos a los que no han ganado el pj
						while($resultado = mysql_fetch_assoc($subastadores)){
							$acc = $resultado['acc']; $canti = $resultado['cantidad'];
								if($ser != $acc){
									mysql_query("UPDATE puntossms SET consumidos = consumidos - $canti WHERE acct = $acc;",$consolver) or die(mysql_error());
								}
						}
						mysql_select_db("$dbc",$con);
						// Cambiamos el pj de cuenta
						mysql_query("UPDATE characters SET account = $ser WHERE guid = $guid;",$con) or die(mysql_error());
						mysql_query("UPDATE subasta SET recibido = 1 WHERE guid = $guid",$con) or die(mysql_error());
						$final = 1;
					}
					else{
						mysql_select_db("$dbc",$con);
						mysql_query("UPDATE subasta SET cantidad_actu = $cant, cuenta_win = $ser WHERE guid = $guid",$con) or die(mysql_error());
					}
				}
				else{
				}
			}
		}
	}
	mysql_close($con);
	mysql_close($consolver);
	if($final == 0){
		header('Location: pujaoro.php');
	}
	else{
		echo "El pj ya ha sido comprado.";
	}
	
}
?>