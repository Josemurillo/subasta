<html>
<head>
<title>Sistema de subasta</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<p>
<?php
session_start();
if(!isset($_SESSION['valido']) || !$_SESSION['valido'] || $_SESSION['nivel'] < 1){
	header('Location: index.php');
}
require_once("limpiarcadena.inc.php");
$_POST = Clear_Var($_POST);
$id = $_POST['id'];
$mes = $_POST['mes'];
$dia = $_POST['dia'];
$hora = $_POST['hora'];
$min = $_POST['min'];
$seg = $_POST['seg'];
$cant = $_POST['cantidadini'];
$cantf = $_POST['cantidadfin'];
$fecha = '2014-'.$mes.'-'.$dia.' '.$hora.':'.$min.':'.$seg;
$mensaje;
if(!(ctype_digit($id)) || $id == 0 || strlen(trim($id)) == 0){
	$mensaje = "Error en la introduccion del guid";
}
else if(!(ctype_digit($cant)) || $cant == 0 || strlen(trim($cant)) == 0){
	$mensaje = "Error en la cantidad inicial";
}
require_once("conexion.inc.php");
$con;
if($_SESSION['server'] == 'aura'){
	$con = mysql_connect("$hostchar_subaura","$user","$pass");
}
else{
	$con = mysql_connect("$hostchar_subuxia","$user","$pass");
}
mysql_select_db("$dbc",$con);
$sql = "SELECT * FROM characters WHERE guid = '$id';";
$resu = mysql_query("$sql");
if(mysql_num_rows($resu) == 0){
		$mensaje = "No se ha encontrado el pj";
}
else{
	$fila = mysql_fetch_assoc($resu);
	$race = $fila['race'];
	$gender = $fila['gender'];
	$class = $fila['class'];
	$sql2 = "REPLACE INTO subasta VALUES ('$id','$race$gender','$class','$cant','$cant','$cantf','$fecha',0,0,0);" or die(mysql_error());
	mysql_query("$sql2");
	$mensaje= "Personaje introducido correctamente.";
}
mysql_close($con);
?>
<center>
<table width="734" border="0" cellspacing="0">
  <tr bgcolor="#D09C12">
    <td width="47" height="98"><img src="img/ladoiz.gif" width="47" height="94"></td>
    <?php
	if($_SESSION['valido'] && $_SESSION['nivel'] < 1){
	echo "<td width='194'><center><img src='img/inibot.jpg' width='230' height='92'></center></td>";
    echo "<td width='194'><center><img src='img/sub.gif' width='230' height='94'></center></td>";
	echo "<td width='194'>&nbsp;</td>";
	}
	else if($_SESSION['nivel'] >= 1){
	echo "<td width='194'><center><a href='index.php'><img src='img/ini.gif' width='230' height='92'></a></center></td>";
	echo "<td width='194'><center><a href='subasta.php'><img src='img/sub.gif' width='230' height='94'></a></center></td>";
    echo "<td width='194'><center><a href='admin.php'><img src='img/admi.gif' width='230' height='94'></a></center></td>";
	}
	else{
	echo "<td width='194'>&nbsp;</td>";
	echo "<td width='194'><center><img src='img/inibot.jpg' width='230' height='92'></center></td>";
	echo "<td width='194'>&nbsp;</td>";
	}
	?>
    <td width="47"><img src="img/ladode.gif" width="47" height="94"></td>
  </tr>
  <tr>
    <td rowspan="2" bgcolor="#D09C12">&nbsp;</td>
    <td colspan="3">
    <table width="700" border="0">
	<tr><td><center><?php echo "$mensaje";  ?></center></td></tr>
    </table></td>
    <td rowspan="2" bgcolor="#D09C12">&nbsp;</td>
  </tr>
  <tr>
  <td colspan="3" bgcolor="#D09C12">&nbsp;</td>
  </tr>
  </table>

</center>
</body>
</html>