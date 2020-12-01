<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

//rescata el valor encontrado en la URL selecionado de las banderas
setcookie("idioma_selecionado", $_GET["idioma"], time()+86400);

//redirecionamos al siguiente enlace
header("Location:ver_cookie.php");

?>
</body>
</html>