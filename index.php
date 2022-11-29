<?php 
session_start();
$preferencias = false;
$nombre="";
$clave="";

if(isset($_COOKIE["c_preferencias"]) && $_COOKIE["c_preferencias"]!="") {
    $preferencias = true;
    $nombre = isset($_SESSION["s_usuario"])?$_SESSION["s_usuario"]:"";
    $clave = isset($_SESSION["s_clave"])?$_SESSION["s_clave"]:"";    
}

$idioma = (isset($_COOKIE["c_lang"]))?$_COOKIE["c_lang"]:"es";

?>
<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <h1>Login </h1>
        <form method ="POST" action="mipanel.php?lang=<?php echo $idioma;?>">
            <fieldset>
                Usuario: <br>
                <input type="text" name="usuario" value="<?php echo $nombre; ?>" required/><br>
                Password:<br>
                <input type="password" name="clave" value="<?php echo $clave; ?>" required/><br>
                <input type="checkbox" name="chkpreferencias"<?php echo ($preferencias)?"checked": ""; ?>> Recordarme
                <br><br>
                <input type="submit" value="Enviar"> 
            </fieldset>    
        </form>
    </body>
</html>
