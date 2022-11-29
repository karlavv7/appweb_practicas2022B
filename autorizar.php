<?php
session_start();

//Para iniciar sesion
if(isset($_POST)){
    $_SESSION['nombre'] = $_POST["nombre"];
    $_SESSION['clave'] = $_POST["clave"];
    header("Location:panelprincipal.php");
}else{
    header("Location:index.php");
}

var_dump($_POST);
$nombre = $_POST["nombre"];
$clave = $_POST["clave"];
$guardarPreferencias = (isset($_POST["chkpreferencias"]))?$_POST["chkpreferencias"]:"";

if($guardarPreferencias != ""){
    setcookie("cookie-nombre", $nombre, 0);
    setcookie("cookie-clave", $clave, 0);
    setcookie("cookie-preferencias", $guardarPreferencias, time()+(60*60*24*30));
}else{
    setcookie("cookie-nombre", "");
    setcookie("cookie-clave", "");
    setcookie("cookie-idioma", "");
    setcookie("cookie-preferencias", "");
}

?>