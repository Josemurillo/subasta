<html>
<head>
<title>Sistema de subasta</title>
<meta http-equiv="Content-Type" content="text/html; charset="utf-8">
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<p>
  <?php
session_start();
if(!isset($_SESSION['valido']) || !$_SESSION['valido']){
	header('Location: index.php');
}
?>
<center>
<table width="734" border="0" cellspacing="0">
  <tr bgcolor="#D09C12">
    <td width="47" height="98" ><img src="img/ladoiz.gif" width="47" height="94"></td>
    <?php
	if($_SESSION['valido'] && $_SESSION['nivel'] < 1){
	echo "<td width='194'><center><a href='index.php'><img src='img/ini.gif' width='230' height='92'></center></td>";
    echo "<td width='194'><center><img src='img/subbot.jpg' width='230' height='94'></center></td>";
	echo "<td width='194'>&nbsp;</td>";
	}
	else if($_SESSION['nivel'] >= 1){
	echo "<td width='194'><center><a href='index.php'><img src='img/ini.gif' width='230' height='92'></a></center></td>";
	echo "<td width='194'><center><img src='img/subbot.jpg' width='230' height='94'></center></td>";
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
      <tr>
	  <td><center>Nombre</center></td>
      <td><center>Raza</center></td>
      <td><center>Clase</center></td>
      <td><center>Nivel</center></td>
      <td><center>Puja actual</center></td>
      <td><center>Fin subasta</center></td>
      <td><center>Acceder</center></td>
      </tr>
      <?php
	  	require_once("conexion.inc.php");
	  	$con;
		if($_SESSION['server'] == 'aura'){
			$con = mysql_connect("$hostchar_subaura","$user","$pass");
		}
		else{
			$con = mysql_connect("$hostchar_subuxia","$user","$pass");
		}
		mysql_select_db("$dbc",$con);
		$sql = "SELECT subasta.guid,subasta.race,subasta.class,subasta.cantidad_ini,subasta.cantidad_actu,subasta.cantidad_max,
					subasta.tiempo_fin,finalizado,subasta.cuenta_win,characters.level,characters.name 
					FROM subasta,characters
					WHERE subasta.finalizado = 0 AND subasta.guid = characters.guid AND subasta.tiempo_fin > NOW() ORDER BY tiempo_fin;";
		$res = mysql_query("$sql");
		if(mysql_num_rows($res) != 0){
			while($fila = mysql_fetch_assoc($res)){
				echo "<tr>";
				echo "<td><center>".$fila['name']."</center></td>";
				echo "<td><center><img src='img/razas/".$fila['race'].".jpg'></center></td>";
				echo "<td><center><img src='img/clases/".$fila['class'].".jpg'></center></td>";
				echo "<td><center>".$fila['level']."</center></td>";
				echo "<td><center>".$fila['cantidad_actu']."</center></td>";
				echo "<td><center>".$fila['tiempo_fin']."</center></td>";
				echo "<td><center><a href = 'puja.php?guid=".$fila['guid']."'><input type = 'button' value = 'Acceder'></a></center></td>";
				echo "</tr>";
			}
		}
		else{
			echo "<tr>";
			echo "<td colspan='7'><center>No hay pj subastandose en ese momento.</center></td>";
			echo "</tr>";
		}
      ?>
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