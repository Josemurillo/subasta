<?php
function Clear_Var($Var)
{
 $list = array('insert', 'select', 'update', 'delete','show','--','null');
 if(is_array($Var))
 {
  foreach ($Var as $v => $k)
   $Var[$v]=Clear_Var($k);
  return $Var;
 }else
 {
  $Var=addslashes($Var);
  $Var2 = str_replace ( $list, '', strtolower ( $Var ) );
  if(strcmp(strtolower($Var2),strtolower($Var))==0)
  {
   return $Var;
  }
  else
   return '';
 }
}


?>