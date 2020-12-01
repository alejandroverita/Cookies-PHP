<?php
//ver si creamos o no la cookie

if(!$_COOKIE["idioma_seleccionado"]){
    header("Location:idioma.php");
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
}else if ($_COOKIE["idioma_seleccionado"]=="es") {
    header("Location:spanish.php");

}else if($_COOKIE["idioma_seleccionado"]=="in") {
    header("Location:english.php");
}

?>