<html>
<head>
<title>Sistema de subasta</title>
<meta http-equiv="Content-Type" content="text/html"; charset=utf-8">
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<p>
  <?php
session_start();
if(!isset($_SESSION['valido']) || !$_SESSION['valido'] || $_SESSION['nivel'] < 1){
	header('Location: index.php');
}
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
    echo "<td width='194'><center><img src='img/adminbot.jpg' width='230' height='94'></center></td>";
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
      <tr><td><center><label><a href="intpj.php"><input type="button" value="Introducir pj" src="intpj.php"></a></label></center></td></tr>
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