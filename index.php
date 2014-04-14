<html>
<head>
<title>Sistema de subasta</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<p>
  <?php
session_start();
if(!isset($_SESSION['valido'])){
	$_SESSION['valido'] = false;
	$_SESSION['nivel'] = 0;
}
?>
<center>
<table width="734" height="423" border="0" cellspacing="0">
  <tr bgcolor="#D09C12">
    <td width="47" height="98" ><img src="img/ladoiz.gif" width="47" height="94"></td>
    <?php
	if($_SESSION['valido'] && $_SESSION['nivel'] < 1){
	echo "<td width='194'><center><img src='img/inibot.jpg' width='230' height='92'></center></td>";
    echo "<td width='194'><a href='subasta.php'><center><img src='img/sub.gif' width='230' height='94'></a></center></td>";
	echo "<td width='194'>&nbsp;</td>";
	}
	else if($_SESSION['nivel'] >= 1){
	echo "<td width='194'><center><img src='img/inibot.jpg' width='230' height='92'></center></td>";
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
    <td colspan="3"><table width="700" border="0">
      <tr>
        <td width="123" height="127">&nbsp;</td>
        <td colspan="3"><center>
        <label>Estas subastas las pujas se hacen por medio de creditos de donación.</label>
        </center></td>
        <td width="153">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan='3' rowspan="4">
        <?php
		if(!$_SESSION['valido']){
        echo "<form name='form1' method='post' action='logado.php'>
        <table width='401' height='258' border='0'>
            <tr>
              <td width='190'><center>Usuario:</center></td>
              <td width='195'><center><label><input type='text' name='usuario' id='usuario'></label></center></td>
            </tr>
            <tr>
              <td><center>Contraseña:</center></td>
              <td><center><label><input type='password' name='contra' id='contra'></label></center></td>
            </tr>
			<tr>
			<td><center>Servidor:</center></td>
			<td>
			<center>
			<select name='server'>
			<option value='aura'>Aura</option>
			<option value='uxia'>Uxia</option>
			</select>
			</center>
			</td>
			</tr>
            <tr>
              <td colspan='2'><center><label><input type='submit' name='button' id='button' value='Entrar'></label></center></td>
              </tr>
          </table>
          </form>";
		}else{
			echo "<form name='form1' method='post' action='cierrese.php'>";
			echo "<center><label><input type='submit' name='button' id='button' value='Cerrar sesion'></label></center>";
			echo "</form>";
		}
		?>
          </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td width="127">&nbsp;</td>
        <td width="76">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
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