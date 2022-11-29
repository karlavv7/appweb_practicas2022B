<?php
session_start();

//Validar las sesiones existen y no son vacias
if($_SESSION["nombre"]=="" || $_SESSION["nombre"]== null){
    header("Location:index.php");
}

$idioma = "es";

if(isset($_GET["idioma"])){
    setcookie("cookie-idioma",$_GET["idioma"],time()+(60*60*24));
    $idioma = $_GET["idioma"];
}else{
    if(isset($_COOKIE["cookie-idioma"])){
        $idioma = $_COOKIE["cookie-idioma"];
    }
}

function mostrarListaEspanol(){
    $archivo = fopen("categorias_es.txt", "r");
            echo "<h1>Lista de Productos</h1>";
                while(!feof($archivo)){
                    $espanol = fgets($archivo); // Leyendo una linea
                    echo nl2br($espanol);// Imprimiendo una linea
                }
                fclose($archivo);  // Cerrando el archivo
}
function mostrarListaIngles(){
    $archivo = fopen("categorias_en.txt", "r");
            echo "<h1>Product List</h1>";
                while(!feof($archivo)){  
                    $ingles = fgets($archivo);  // Leyendo una linea
                    echo nl2br($ingles); // Imprimiendo una linea
                }
                fclose($archivo);  // Cerrando el archivo           
}

?>

<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <h1>PANEL PRINCIPAL</h1>
        <h1>Bienvenido usuario: <?php echo $_SESSION["nombre"]; ?></h1>
        <hr>
        <a href="panelprincipal.php?idioma=es"> ES (Español)</a> 
        | <a href="panelprincipal.php?idioma=en"> EN (English) </a> 
        
        <hr>
        <a href="cerrarsesion.php">Cerrar sesión</a>
        <?php 

        if($idioma=="es"){
            mostrarListaEspanol();
        }else{
            mostrarListaIngles(); 
        }            
        ?>
        <br>
    </body>
</html>