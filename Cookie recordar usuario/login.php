<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1, h2{
            text-align:center;
        }

        table{
            width:25%;
            background-color:#FFC;
            border:2px dotted #F00;
            margin: auto;
        }
        .izq{
            text-align:right;
        }

        .der {
            text-align:left;
        }

        td{
            text-align:center;
            padding:10px;
        }


    </style>
</head>
<body>

<?php
if (isset($_POST["enviar"])) {
    

    try{

        //INSTANCIANDO clase PDO
        $base=new PDO("mysql:host=localhost; dbname=curso_sql", "root", "");

        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //SQL para ver si usuario existe o no existe en BBDD
        $sql="SELECT * FROM USUARIOS_PASS WHERE USUARIOS= :login AND PASSWORD= :password"; //:login es un marcador

        //consulta preparada con marcadores
        $resultado=$base->prepare($sql);

        //rescantado login y password
        $login=htmlentities(addslashes($_POST["login"])); //convierte cualquieer simbolo en html. Evitar inyeccion SQL

        $password=htmlentities(addslashes($_POST["password"]));

        //bindValue para cuando son marcadores
        $resultado->bindValue(":login", $login);
        $resultado->bindValue(":password", $password);

        //rowCount nos dice el numero de registros que devuelve una consulta

        $resultado->execute();

        $numero_registro=$resultado->rowCount();

        //Evaluando si usuario existe o no. Existe devuelve 1. No existe devuelve 0
        if($numero_registro!=0){
            

        }
        else
        {
            //redirigir a la misma pagina de registro
            //header("location:login.php");
            echo "Error. Usuario o contrasea incorrectos";
        }

    } catch (Exception $e) {

        die("Error: " . $e->getMessage()); //concatena mensaje de error

    }
}
?>
<?php

//solamente se carge si es que se ha iniciado sesion

if (!isset($_SESSION["usuario"])){//sino se ha iniciado sesion, no muestres formulario
    include("formulario.html");
} else {

    //usuario almacenado en $_SESSION
    echo "Usuario: " . $_SESSION["usuario"];
}
?>

    <h2>CONTENIDO DE LA WEB</h2> 
    <table width="800" border="0">
        <tr>
            <td><img src="gato1.jpg" width="300" height="166"></td>
            <td><img src="gato2.jpg" width="300" height="166"></td>
        </tr>
        <tr>
            <td><img src="gato3.jpg" width="300" height="166"></td>
            <td><img src="gato4.jpg" width="300" height="166"></td>
        </tr>
    </table>





</body>
</html>