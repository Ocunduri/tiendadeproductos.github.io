<?php
session_start();

if(!isset($_COOKIE["c_preferencias"])){
    setcookie("c_lang","");
    session_destroy();
}

header("Location: index.php");


?>