<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="10"; charset=utf-8" />
<title>Documento sin título</title>
</head>
<?php
session_start();
if(!isset($_SESSION['valido']) || !$_SESSION['valido'] || !isset($_SESSION['subastado'])){
	echo "Error interno, vuelva a iniciar sesión.";
}
else{
require_once("conexion.inc.php");
$con;
if($_SESSION['server'] == 'aura'){
	$con = mysql_connect("$hostchar_subaura","$user","$pass");
}
else{
	$con = mysql_connect("$hostchar_subuxia","$user","$pass");
}
mysql_select_db("$dbc",$con);
$guid = $_SESSION['subastado'];
$sql = "SELECT * FROM subasta WHERE guid = '$guid';";
$res = mysql_query("$sql");
$fila = mysql_fetch_assoc($res);
$valor = $fila['cantidad_actu'];
$timsfin = $fila['tiempo_fin'];

$timeact = date("Y-m-d H:i:s",strtotime("now"));
$timefin = date("Y-m-d H:i:s",strtotime($timsfin));

echo "<center>";
if($fila['finalizado'] != 1 && $timeact < $timefin){
echo "<form name='form1' method='post' action='pujares.php'>";
echo "<input type='text' name = 'puntos' id= 'puntos' value='$valor'><br>";
echo "<input type ='submit' name='pujar' value='Pujar'>";
echo "</form>";
}
else{
	echo "El pj ya ha sido comprado.";
}
echo "</center>";
mysql_close($con);
}
?>
<body>


</body>
</html>