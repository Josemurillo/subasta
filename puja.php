<html>
<head>
<title>Sistema de subasta</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="http://static.wowhead.com/widgets/power.js"></script><script>var wowhead_tooltips = { "colorlinks": true, "iconizelinks": true, "renamelinks": true }</script>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<p>
<?php
session_start();
if(!isset($_SESSION['valido']) || !$_SESSION['valido']){
	header('Location: index.php');
}
require_once("limpiarcadena.inc.php");
$_GET = Clear_Var($_GET);
$_SESSION['subastado'] = $_GET['guid'];
$gu = $_GET['guid'];
if(!ctype_digit($gu)){
	header("Location: index.php");
}
?>
<center>
<table width="734" border="0" cellspacing="0">
  <tr bgcolor="#D09C12">
    <td width="47" height="98"><img src="img/ladoiz.gif" width="47" height="94"></td>
    <?php
	if($_SESSION['valido'] && $_SESSION['nivel'] < 1){
	echo "<td width='194'><center><a href = 'index.php'><img src='img/ini.gif' width='230' height='92'></a></center></td>";
    echo "<td width='194'><center><a href = 'subasta.php'><img src='img/sub.gif' width='230' height='94'></a></center></td>";
	echo "<td width='194'>&nbsp;</td>";
	}
	else if($_SESSION['nivel'] >= 1){
	echo "<td width='194'><center><a href = 'index.php'><img src='img/ini.gif' width='230' height='92'></a></center></td>";
	echo "<td width='194'><center><a href = 'subasta.php'><img src='img/sub.gif' width='230' height='94'></a></center></td>";
    echo "<td width='194'><center><a href = 'admin.php'><img src='img/admi.gif' width='230' height='94'></a></center></td>";
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
$sql = "SELECT * FROM subasta WHERE guid = '$gu';";
$res = mysql_query("$sql");
if(mysql_num_rows($res) == 0){
	header("Location: index.php");
}
$fila = mysql_fetch_assoc($res);
$cantmax = $fila['cantidad_max'];
$timefin = $fila['tiempo_fin'];
?>

<center>
<tr><td>
</td></tr>
	<tr><td>
    <center>
    <h3>Podra comprar este pj si puja una cantidad de : <?php echo $cantmax;?></h3>
    <h3>La subasta termina a fecha de : <?php echo $timefin;?></h3>
    <iframe scrolling="no" frameborder="0" src="pujaoro.php" width="200" height="75">
    </iframe>
    <?php
	$item = "select itemEntry,sum(count) as cantidad from item_instance where owner_guid=".$gu." group by itemEntry order by itementry desc";
    $restitem = mysql_query("$item");
	if(mysql_num_rows($restitem) != 0){
		echo "<table>";
		echo "<tr>
			  <td>Item</td>
			  <td>Cantidad</td>
			  </tr>";
		while($itemp = mysql_fetch_assoc($restitem)){
			echo "<tr>
				  <td><a href='http://es.wowhead.com/item=".$itemp['itemEntry']."' rel='item=".$itemp['itemEntry']."'></ a></td>
				  <td><center>".$itemp['cantidad']."<center></td>
				  </tr>";
		}
		echo "</table>";
	}
	mysql_close($con);
    ?>
    </center>
    </tr></td>
    </table></td>
    <td rowspan="2" bgcolor="#D09C12">
    </td>
  </tr>
  <tr>
  <td colspan="3" bgcolor="#D09C12">&nbsp;</td>
  </tr>
  </table>

</center>
</body>
</html>