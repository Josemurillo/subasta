<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['nuser']);
unset($_SESSION['nivel']);
unset($_SESSION['valido']);
unset($_SESSION['personaje']);
unset($_SESSION['subastado']);
 unset($_SESSION['server']);
session_destroy();
header('Location: index.php');
?>