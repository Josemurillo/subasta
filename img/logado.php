<?php
session_start();
require_once('conexion.inc.php');
require_once("limpiarcadena.inc.php");
$_POST = Clear_Var($_POST);
$u = $_POST['usuario'];
$p = $_POST['contra'];
$ser = $_POST['server'];
if(strlen(trim($u)) == 0 || strlen(trim($p)) == 0){
	header('Location: index.php');
}
if(!isset($_SESSION['valido'])){
	$_SESSION['valido'] = false;
}
	if(!$_SESSION['valido'] || ($u != $_SESSION['nuser'])){
		$consolver = mysql_connect("$hostaut_solv","$usersol","$passsol") or die (mysql_error());
		mysql_select_db("$dba",$consolver);
		// Hay que pasar el nombre de usuario y la contraseña a mayusculas
		$umayus = strtoupper($u);
		$pmayus = strtoupper($p);
		$conjunto = $umayus.':'.$pmayus;
		$pss = sha1(("$conjunto"));
		$sql = "SELECT account.id,account.username FROM account WHERE account.username = '$u' AND account.sha_pass_hash = '$pss'";
		$result = mysql_query("$sql",$consolver) or die(mysql_error());
		if(mysql_num_rows($result) != 0){
			$fila = mysql_fetch_assoc($result);
			$_SESSION['valido'] = true;
			$_SESSION['id'] = $fila['id'];
			$_SESSION['nuser'] = $fila['username'];
			$_SESSION['server'] = $ser;
			$consulta = "SELECT * FROM account_access WHERE id = ".$fila['id'].";";
			$resultado = mysql_query("$consulta",$consolver);
			if(mysql_num_rows($resultado) != 0){
				$f = mysql_fetch_assoc($resultado);
				$_SESSION['nivel'] = $f['gmlevel']; 
			}
			else{
				$_SESSION['nivel'] = 0;
			}
		}
		else{
		 unset($_SESSION['id']);
		 unset($_SESSION['nuser']);
		 unset($_SESSION['nivel']);
		 unset($_SESSION['valido']);
		 unset($_SESSION['personaje']);
		 unset($_SESSION['subastado']);
		 unset($_SESSION['server']);
		 session_destroy();

		}
		
	}
mysql_close($con);
mysql_close($consolver);
if(!isset($_SESSION['valido'])){
	$_SESSION['valido'] = false;
	$_SESSION['nivel'] = 0;
	header('Location: index.php');
}
if($_SESSION['valido']){
	header('Location: index.php');
}
?>