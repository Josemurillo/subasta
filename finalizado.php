<html>
<head>
<title>Sistema de subasta</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
    <td width="47" height="98"><img src="img/ladoiz.gif" width="47" height="94"></td>
    <?php
	if($_SESSION['valido'] && $_SESSION['nivel'] < 1){
	echo "<td width='194'><a href='subasta.php'><img src='img/ini.gif' width='230' height='92'></a></td>";
    echo "<td width='194'><a href='subasta.php'><center><img src='img/sub.gif' width='230' height='94'></a></center></td>";
	echo "<td width='194'>&nbsp;</td>";
	}
	else if($_SESSION['nivel'] >= 1){
	echo "<td width='194'><center><a href='subasta.php'><img src='img/ini.gif' width='230' height='92'></a></center></td>";
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
    <center><p>Felicidades el pj es suyo y ha sido pasado a su cuenta.</p></center>
    <td rowspan="2" bgcolor="#D09C12">&nbsp;</td>
  </tr>
  <tr>
  <td colspan="3" bgcolor="#D09C12">&nbsp;</td>
  </tr>
  </table>

</center>
</body>
</html>