<?php
session_start();

if(!isset($_COOKIE["c_lang"])){
  setcookie("c_lang",$_GET["lang"],time()+(60*60*24));
}

if(isset($_GET["lang"])) {    
  if($_GET["lang"]=="es") {
      setcookie("c_lang","es",time()+(60*60*24));
  }else{
    setcookie("c_lang","en",time()+(60*60*24));
  }
}

if(isset($_POST["usuario"]) && isset($_POST["clave"])){
  $guardarPreferencias = (isset($_POST["chkpreferencias"]))?$_POST["chkpreferencias"]:"";
  if($guardarPreferencias != "") {
    setcookie("c_preferencias", $guardarPreferencias, 0);
  }else{
    setcookie("c_preferencias", "");
    setcookie("c_lang","es");
}}


if(isset($_POST["usuario"]) && isset($_POST["clave"])) {
    $_SESSION["s_usuario"] = $_POST["usuario"];
    $_SESSION["s_clave"] = $_POST["clave"];
}

function showES(){
    $lectura = fopen("categorias_es.txt","r") or die("No se puede leer");    
    while(!feof($lectura)){
      $obtener = fgets($lectura);
      $filas = nl2br($obtener);
      echo "$filas";
    }
    fclose($lectura);
  }

function showEN(){
    $lectura = fopen("categorias_en.txt","r") or die("No se puede leer");    
    while(!feof($lectura)){
      $obtener = fgets($lectura);
      $filas = nl2br($obtener);
      echo "$filas";
    }
    fclose($lectura);
}

$idioma = (isset($_COOKIE["c_lang"]))?$_COOKIE["c_lang"]:"es";

if(!isset($_SESSION["s_usuario"]) && !isset($_SESSION["s_clave"])) {
  header("Location: index.php");
}

?>
<html>
<head>
</head>
    <body>
        <h1>Panel principal</h1>
        <h2>Bienvenido Usuario: <?php echo $_SESSION["s_usuario"];?></h2>
        <br>
        <a href="mipanel.php?lang=es">ES(Español)</a>
        <a href="mipanel.php?lang=en">EN(English)</a>
        <br><br>
        <a href="cerrarsesion.php">Cerrar Sesion</a>
        <br><br>
        <h2><?php
            if(isset($_COOKIE["c_lang"])){ 
              if($_COOKIE["c_lang"]=="es"){
                echo "Lista de productos<br>";
              }else{
              echo "Product List<br>";
            }}
            else{
              echo "Lista de productos<br>";
            }
        ?></h2>

        <?php
        if(isset($_COOKIE["c_lang"]) && $_COOKIE["c_lang"]=="es"){
          showES();
        }elseif(isset($_COOKIE["c_lang"]) && $_COOKIE["c_lang"]=="en"){
          showEN();
        }
        elseif(!isset($_COOKIE["c_lang"])){
          showES();
        }
        ?>
      </body>
</html>

