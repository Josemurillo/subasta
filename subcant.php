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
	unset($_SESSION['id']);
	unset($_SESSION['nuser']);
	unset($_SESSION['nivel']);
	unset($_SESSION['valido']);
	unset($_SESSION['personaje']);
	unset($_SESSION['subastado']);
	unset($_SESSION['server']);
	session_destroy();
	echo "<td width='194'>&nbsp;</td>";
	echo "<td width='194'><center><a href='index.php'><img src='img/ini.gif' width='230' height='92'></a></center></td>";
	echo "<td width='194'>&nbsp;</td>";
	?>
    <td width="47"><img src="img/ladode.gif" width="47" height="94"></td>
  </tr>
  <tr>
    <td rowspan="2" bgcolor="#D09C12">&nbsp;</td>
    <td colspan="3">
    <center><p>Su cuenta no puede tener mas pj, realice la subasta con otra cuenta.</p></center>
    <td rowspan="2" bgcolor="#D09C12">&nbsp;</td>
  </tr>
  <tr>
  <td colspan="3" bgcolor="#D09C12">&nbsp;</td>
  </tr>
  </table>
</center>
</body>
</html>