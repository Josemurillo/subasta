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
  <tr>
    <td><center>Id pj</center></td>
    <td><center>Cantidad Inicial</center></td>
    <td><center>Puja Maxima</center></td>
    <td><center>Mes fin subasta</center></td>
    <td><center>Día fin de subasta</center></td>
    <td><center>Hora fin de subasta</center></td>
    <td><center>Minutos fin de subasta</center></td>
    <td><center>Segundos fin de subasta</center></td>
  </tr>
  <tr>
  <form name="form1" method="post" action="intpjres.php">
    <td><center><label><input type="text" name="id" id="id"></label></center></td>
    <td><center><label><input type="text" name="cantidadini" id="cantidadini"></label></center></td>
    <td><center><label><input type="text" name="cantidadfin" id="cantidadfin"></label></center></td>
    <td><center>
        <label>
          <select name="mes" id="mes">
          	<?php
			for($a = 1; $a<=12; $a++){
				if($a < 10){
					$ar = '0'.$a;
					echo "<option value='$ar'>$ar</option>";
				}
				else{
					echo "<option value='$a'>$a</option>";
				}
			}
			?>
          </select>
        </label></center></td>
    <td><center><label>
          <select name="dia" id="dia">
          <?php
		  for($i = 1; $i<=31; $i++){
			  if($i >= 0 && $i < 10){
					$ir = '0'.$i;
					echo "<option value='$ir'>$ir</option>";
				}
				else{
					echo "<option value='$i'>$i</option>";
				}
			  
		  }
		  ?>
          </select>
          </center></td>
    <td><center>
    		<select name="hora" id="hora">
            <?php
			for($b = 0; $b <=23; $b++){
				if($b >= 0 && $b < 10){
					$br = '0'.$b;
					echo "<option value='$br'>$br</option>";
				}
				else{
					echo "<option value='$b'>$b</option>";
				}
				
			}
			?>
            </select>
    </center></td>
    <td><center>
    		<select name="min" id="min">
            <?php
			for($m = 0; $m <=59; $m++){
				if($m >= 0 && $m < 10){
					$mr = '0'.$m;
					echo "<option value='$mr'>$mr</option>";
				}
				else{
					echo "<option value='$m'>$m</option>";
				}
				
			}
			?>
            </select>
    </center></td>
    <td><center>
    		<select name="seg" id="seg">
            <?php
			for($s = 0; $s <=59; $s++){
				if($s >= 0 && $s < 10){
					$rs = '0'.$s;
					echo "<option value='$rs'>$rs</option>";
				}
				else{
					echo "<option value='$s'>$s</option>";
				}
				
				
			}
			?>
            </select>
    </center></td>
  </tr>
  <tr><td colspan="7"><center><label><input type="submit" value="Registrar"></label></center></td></tr>
   </form>
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