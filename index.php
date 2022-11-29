<?php
$preferencias = false;
$nombre = "";
$clave = "";

if(isset($_COOKIE["cookie-preferencias"]) && $_COOKIE["cookie-preferencias"]!= ""){
    $preferencias = true;
    $nombre = isset($_COOKIE["cookie-nombre"])?$_COOKIE["cookie-nombre"] : "";
    $clave = isset($_COOKIE["cookie-clave"])?$_COOKIE["cookie-clave"] : "";
}

?>

<!DOCTYPE html>
<html>
    <head>  
        <body>
            <h1>Login</h1>
            <form method="POST" action="autorizar.php">
                <fieldset>
                    Usuario*: <br>
                    <input type="text" name="nombre" value="<?php echo $nombre; ?>"/><br>
                    Clave*: <br>
                    <input type="password" name="clave" value="<?php echo $clave; ?>"/><br>
                    <br>
                    <input type="checkbox" name="chkpreferencias" <?php echo ($preferencias)?"checked": "";?>> Recuérdame
                    <br>
                    <br>
                    <input type="submit" value="Enviar">
                </fieldset>
            </form>
        </body>
    </head>
</html>